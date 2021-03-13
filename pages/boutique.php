 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Boutique</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Boutique</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->

          <!-- Dummy Content Start -->
		<section class="section-1" style="margin-bottom: -7%;">
            <div class="container">
                <div class="row">
                	<div class="col-md-offset-1 col-md-10">
                    	<h2 class="heading-1 text-center">Boutique</h2>
                    	<h5><center>Comment ça marche?</center></h5>
                        <p class="mrg-top-60"><span class="dropcap theme-color">L</span>a boutique permet d'acheter du contenu In-Game depuis le site grâce à de l'argent réel, cela sert à payer l'hébergement du serveur.
			La monnaie virtuelle utilisée sur la boutique est le "Jeton", vous pouvez obtenir des jetons en échange de dons <a href="?&page=token" style="color: #2e71f0;">sur cette page</a></p>
                    </div>
                </div>
            </div>
		<div class="container">
			<div class="text-center">
				<?php if(isset($_Joueur_)) { ?>
				<center>
				<hr>
					<h3>Bonjour <?php echo $_Joueur_['pseudo']; ?></h3>
						<h4>Vous avez <strong><?php if(isset($_Joueur_['tokens'])) echo $_Joueur_['tokens'] . ' <i class="ei ei-money-2"></i>'; ?></h4></strong>
						<a style="background-color:#2e71f0;" href="?page=panier" class="btn btn-primary btn-block">Votre panier contient <?php echo $_Panier_->compterArticle().($_Panier_->compterArticle()>1 ? ' articles' : ' article') ?> </a>
				</center>
				<?php } else { ?>
				<hr>
				<center>
				<h4>Veuillez vous connecter pour accéder à la boutique:</h4>
				<a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-warning btn-lg" ><span class="glyphicon glyphicon-user"></span> Connexion</a>
				</center>
				<?php } ?>
			</div>
			</br>

			</br>
			
		</section>


		<!-- Categories Start -->
		<section class="section-1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-3">
								<div class="shop-sidebar sidebar-left">
									<div class="widget widget-link">
										<h3 class="widget-tittle">Categories</h3>
										<ul class="link">
										<?php
											$j = 0;
											while($j < count($categories))
											{
											$categories[$j]['titre'] = str_replace(' ', '_', $categories[$j]['titre']);
											?>
												  
													<li>
														<a href="#categorie-<?php echo $j; ?>" data-toggle="tab" class="<?php if($j == 0) echo 'active'; ?>"><i class="ei-price-tag"></i>  <?php $categories[$j]['titre'] = str_replace('_', ' ', $categories[$j]['titre']); echo $categories[$j]['titre']; ?></a>
													</li>
										<?php $j++; } ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<p class="mrg-btm-20 text-dark font-size-20"><b>Produits</b></p>
									<div class="tab-content">
									<?php
									$j = 0;
									while($j < count($categories))
									{
									$categories[$j]['titre'] = str_replace(' ', '_', $categories[$j]['titre']);
									?>
									
									<div id="categorie-<?php echo $j; ?>" class="tab-pane fade <?php if($j==0) echo 'in active';?>" <?php if($j == 0) { echo 'aria-expanded="true"'; } else echo 'aria-expanded="false"'; ?>>
									<?php $categories[$j]['titre'] = str_replace('_', ' ', $categories[$j]['titre']); ?>
											<div class="panel-body">
												<?php if($categories[$j]['message'] == ""){ ?>
												<?php } else { ?>
												<p>
												<div class="alert alert-dismissable alert-success">
												<button type="button" class="close" data-dismiss="alert">×</button>
												<center><?php echo $categories[$j]['message']; ?></center>
												</div>
												</p>
												<?php } ?>
												<div class="row">
												<?php
													foreach($categories as $key => $value)
													{
														$categories[$key]['offres'] == 0;
													}
													for($i = 1; $i <= count($offresTableau); $i++)
													{
														if($offresTableau[$i]['categorie'] == $categories[$j]['id'])
														{
															echo '
															<div class="col-md-4">
																<div class="shop-product">
																		<a href="" class="product-name">'. $offresTableau[$i]['nom'] .'</a>
																		<div class="product-img img-responsive" style="height: 250px;width: 250px;">' .$offresTableau[$i]['description']. '</div>
																		<span class="price">' .$offresTableau[$i]['prix']. ' <i class="ei ei-money-2"></i></span>
																	
																	';
																		if(isset($_Joueur_)) {
																			echo '<div class="add-to-cart"><a href="?page=boutique&offre=' .$offresTableau[$i]['id']. '" class="btn icon-btn-md btn-white hover-dribble icon-btn-round mrg-right-5 lh-1" title="Voir la fiche produit"><i class="ei ei-search"></i></a>';
																		echo '<a href="?action=addOffrePanier&offre='. $offresTableau[$i]['id']. '&quantite=1" class="btn icon-btn-md btn-theme icon-btn-round lh-1" title="Ajouter directement au panier une unité"><i class="ei ei-shopping-basket"></i></a></div>';}
																		else { echo'<a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-warning btn-block" ><span class="glyphicon glyphicon-user"></span> Se connecter</a></div>'; }
															echo '</div>
																		</br>
																		</button>
																	
															</div>		';
															$categories[$j]['offres']++;
														}
													}
												?>
												</div>
												<?php 
												if($categories[$j]['offres'] == 0)
													echo '<div class="alert alert-dismissible alert-danger">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<center><strong>Oh zut !</strong> <a href="#" class="alert-link">'.$categories[$key]['titre'].'</a> est encore vide, ré-essayez plus tard !.</center>
													</div>';
												?>
											</div>
										</div>
									<?php $j++; } ?>	
								</div>
							</div>
							<?php
	if(isset($_GET['offre']))
	{
	?>
	<div class="modal fade modal-center" style="background: rgba(0, 0, 0, 0.5);"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-md bg">
		<div class="modal-content">
		  <div class="modal-body no-pdd bg">
		  <div class="modal-body no-pdd bg">
		   <?php echo  $infosOffre['offre']['description'];?>
		  <div class="pdd-vertical-70 pdd-horizon-30">
            <div class="row">
            	<div class="col-sm-offset-6 col-sm-6" >
				<p>
					<br />
					<h2 class="mrg-btm-15"><b>Achat de: <?php echo $infosOffre['offre']['nom']; ?></b></h2>
					Vous obtiendrez ce grade sur <?php echo $infosCategories['serveur']; ?>.<br />
					<?php
					$enLigne = false;
					if($infosCategories['serveurId'] == -2 OR $infosCategories['serveurId'] == -1)
						for($i = 0; $i < count($lecture['Json']); $i++)
						{
							if($enligne[$i])
							{
								echo '<p class="width-90">Vous êtes connecté sur le serveur:<br /> "'. $lecture['Json'][$i]['nom'] .'"</p>';
								$enLigne = true;
							}
							
						}
					else
						if($enligne[$infosCategories['serveurId']])
						{
							echo '<p class="width-90">Vous êtes connecté sur le serveur:<br /> "'. $lecture['Json'][$infosCategories['serveurId']]['nom'] .'"</p>';
							$enLigne = true;
						}
						
					if(!$enLigne AND $infosCategories['connection'])
						echo '<p class="width-90">Vous n\'êtes pas connecté sur le serveur !</p>';
					?>
					<br />
					<br />					
				</p>
		  </div></div></div>
		   <div class="modal-close">
                        <button type="button" class="btn icon-btn-md icon-btn-round btn-dark lh-0" data-dismiss="modal"><i class="ei ei-close"></i></button>
                    </div>
                </div>
		  </div>
		  <div class="modal-footer">
			<?php 	if(($enLigne AND $infosCategories['connection']) OR !$infosCategories['connection']) { ?>
							<form action="index.php" method="GET" class="form-inline">
								<input type="hidden" name="action" value="addOffrePanier"/>
								<input type="hidden" name="offre" value="<?php echo $_GET['offre']; ?>"/>
								<label for="quantite" class="form-control mb-1 mr-sm-1">Quantité: </label>
								<input type="number" class="form-control mb-1 mr-sm-1" id="quantite" min="0" name="quantite" value="1" />
								<button type="submit" class="btn btn-md btn-dark" style="margin-top: 1%;">Ajouter au panier</button>
							</form><?php } else{ ?>
							Connectez vous sur le serveur voulu... <?php } 
					?>
		  </div>
		</div>
	  </div>
	</div>
	<?php

	$modal = true;
	$idModal = 'myModal';

	}
	?>
						</div>
					</div>
				</div>
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</section>
		<!-- Categories End -->







</div>