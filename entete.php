<div class="wrapper">
<header id="menu" class="header header-sticky">
	<nav class="navbar">
        <div class="container">
			<div class="menu-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
				   <span class="top-bar"></span>
				   <span class="middle-bar"></span>
				   <span class="bottom-bar"></span>
				   <span class="sr-only">Toggle Dropdown</span>
				</button>

				<div class="nav-tools">
					<ul class="nav navbar-nav">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle" href="?page=panier"><i class="ei ei-shopping-cart"></i> <?php echo $_Panier_->compterArticle().($_Panier_->compterArticle()>1 ? '' : ' ') ?></a>
							<ul class="cart-menu dropdown-menu">
							<?php $nbArticles = $_Panier_->compterArticle();
				                $precedent = 0;
				            	if($nbArticles == 0 )
				            		echo '<li class="cart-menu-item">
				            				<a class="cart-menu-media">Panier vide..</a>
				            			  </li>';
				            	else
				            	{
					            	for($i = 0; $i < $nbArticles; $i++)
					            	{
					            		?>
					            		<li class="cart-menu-item">
						                    <div class="product-details">
						                    <a href="product-single.html" class="product-name"><?php $_Panier_->infosArticle(htmlspecialchars($_SESSION['panier']['id'][$i]), $nom, $infos); echo $nom; ?></a>
						                    <span class="price"><?php echo htmlspecialchars($_SESSION['panier']['prix'][$i]); ?> <i class="ei ei-money-2"></i> x <?php echo htmlspecialchars($_SESSION['panier']['quantite'][$i]); ?></a></span>
						                     <a class="remove" href="?action=supprItemPanier&id=<?php echo htmlspecialchars($_SESSION['panier']['id'][$i]); ?>"?><i class="ei ei-close"></i></a>
						                    </div>
						                </li>
						               <?php
						            } 
				                    if(!empty($_SESSION['panier']['reduction']))
				                    {
				                        echo '<tr><td>'.htmlspecialchars($_SESSION['panier']['code']).'</td><td>'.htmlspecialchars($_SESSION['panier']['reduction_titre']).'</td><td>1</td><td class="w-25 text-center">-'. $_SESSION['panier']['reduction']*100 .'%</td><td></td><td><a href="?action=retirerReduction" class="btn btn-danger link" title="supprimer la réduction"><i class="fa fa-trash"></i></a></td></tr>';
				                    }
						        }
						        ?>
								<li class="cart-menu-subtotal">
									<span>Total</span>
									<span class="amount"><?php echo number_format($_Panier_->montantGlobal(), 0, ',', ' '); ?> <i class="ei-money-2"></i></span>
								</li>
								<li class="cart-menu-bottom">
									<a class="btn check-out" href="?page=panier"><i class="ei ei-shopping-cart-dash pdd-horizon-5"></i> Voir Panier</a>
								</li>
							</ul>
						</li>
					</ul>
					<form action='#' id='search' method='get'>
						<div class="search-input">
							<div class="container">
								<input class="search" placeholder='Search...' type='text'>
								<button class="submit ei ei-search" type="submit" value="close"></button>
							</div>
						</div>
						<button class="ei ei-close" id="close" type="reset"></button>
					</form>    
				</div>
				<div class="nav-logo">

                <a class="logo" href="index.php"><img class="logo-dark" src="<?php echo $logo; ?>" alt="Logo"></a>
            </div>                    
            </div>
            <div class="collapse navbar-collapse nav-collapse">
                <ul class="nav navbar-nav" >
					<?php
					// Je rappelle que _Menu_ est une variable utilisable partout. Elle est générée en début d'index. 
					// Cette variable contient le texte des liens de la barre des menus, l'adresse des liens, les liste déroulantes etc...
					
					// Cette boucle affiche un lien / menu déroulant à chaque tour. On fait autant de tour qu'il y a de textes à afficher.
					for($i = 0; $i < count($_Menu_['MenuTexte']); $i++)
					{
						// Si il y a une liste déroulante contenant le texte du texte de ce tour de boucle, le lien devient un menu déroulant.
						if(isset($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]))
						{
							// On affiche la structure de base du menu déroulant de Bootstrap :
							?>
									<li class="nav-item dropdown">
									<a id="Listdefil<?php echo $i; ?>" class="dropdown-toggle" href="javascript:void(0);"><?php echo $_Menu_['MenuTexte'][$i]; ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
</a>
									 <ul class="dropdown-menu">
							<?php
						
							// On affiche la puce dans le menu déroulant depuis une boucle, qui fait autant de tour qu'il y a de lignes à afficher dans la liste déroulante.
							for($k = 0; $k < count($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]); $k++)
							{
								// Dans le cas où le texte de la puce vaut "-divider-", on met une ligne de division à la place du texte (fonctionnalité css de bootstrap). 
								
								if($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == '-divider-')
								{
									echo'<div class="dropdown-divider"></div>';
								}
								// Sinon on met un lien avec texte + adresse.
								else
								{
									echo '<li><a href="' .$_Menu_['MenuListeDeroulanteLien'][$_Menu_['MenuTexteBB'][$i]][$k]. '">' .$_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k]. '</a></li>';
								}
							}
							
							// On ferme la liste du déroulant, et on remonte à la premiere boucle :p.
							?>
									</ul>
									</li>
						<?php
						}
						
						// Si le lien n'est pas un menu déroulant, on l'affiche tout simplement, ou presque, il faut prévoir que si on est sur la page du lien, le lien doit être en foncé (class="active" fonction bootstrap).
						else
						{
							// Cette variable contient la valeur du lien de la puce(on enlève donc ?&page= en le remplaçant par '' et on garde que la fin.
							$quellePage = str_replace('index.php?&page=', '', $_Menu_['MenuLien'][$i]);
							$quellePage1 = str_replace('?&page=', '', $_Menu_['MenuLien'][$i]);
							$quellePage2 = str_replace('?page=', '', $_Menu_['MenuLien'][$i]);
							
							// Si le Get actuel est égal à la variable de la ligne précédente, la puce est active.
							if(isset($_GET['page']) AND ($quellePage == $_GET['page'] OR $quellePage1 == $_GET['page'] OR $quellePage2 == $_GET['page'])) 
								$active = ' active';
							
							// Si il n'y a pas de get(on est donc sur l'index) et qu'on est au premier tour de boucle --> le premier lien(souvent un lien vers l'accueil justement) est actif (foncé).
							elseif(!isset($_GET['page']) AND $i == 0) 
								$active = ' active';
							
							// On prévoit que quand il n'y a rien à afficher, la var est vide pour éviter l'erreur.
							else $active = ' ';
							
							// On affiche enfin la puce ! 
							echo '<li class="' .$active. '"><a href="' .$_Menu_['MenuLien'][$i]. '">' .$_Menu_['MenuTexte'][$i]. '</a></li>';
						}
					}
					if(isset($_Joueur_))
					{
					?>
					<li class="nav-item dropdown" role="group" aria-label="Dropdown Membres">
                        <a class="dropdown-toggle" href="javascript:void(0);"><img src="https://cravatar.eu/avatar/<?php echo $_Joueur_['pseudo']; ?>/20" style="margin-left: -10px"> <?php echo $_Joueur_['pseudo']; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
								<?php 
									$req_topic = $bddConnection->prepare('SELECT cmw_forum_topic_followed.pseudo, vu, cmw_forum_post.last_answer AS last_answer_pseudo 
										FROM cmw_forum_topic_followed
										INNER JOIN cmw_forum_post WHERE id_topic = cmw_forum_post.id AND cmw_forum_topic_followed.pseudo = :pseudo');
									$req_topic->execute(array(
										'pseudo' => $_Joueur_['pseudo']
									));
									$alerte = 0;
									while($td = $req_topic->fetch())
									{
										if($td['pseudo'] != $td['last_answer_pseudo'] AND $td['last_answer_pseudo'] != NULL AND $td['vu'] == 0)
										{
											$alerte++;
										}
									}
									$req_answer = $bddConnection->prepare('SELECT vu
									FROM cmw_forum_like INNER JOIN cmw_forum_answer WHERE id_answer = cmw_forum_answer.id
									AND cmw_forum_like.pseudo != :pseudo AND cmw_forum_answer.pseudo = :pseudo');
									$req_answer->execute(array(
										'pseudo' => $_Joueur_['pseudo'],
									));
									while($answer_liked = $req_answer->fetch())
									{
										if($answer_liked['vu'] == 0)
										{
											$alerte++;
										}
									}
									if($_PGrades_['PermsPanel']['access'] == "on" OR $_Joueur_['rang'] == 1)
										echo '<li><a href="admin.php" class="dropdown-item text-success"><i class="fas fa-tachometer-alt"></i> Administration</a></li>';
									if($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1)
									{
										$req_report = $bddConnection->query('SELECT id FROM cmw_forum_report WHERE vu = 0');
										$signalement = $req_report->rowCount();
										echo '<li><a href="?page=signalement" class="dropdown-item text-warning"><i class="fa fa-bell"></i> Signalement <span class="badge badge-pill badge-warning" id="signalement">' . $signalement . '</span></a></li>';
									}
								?>
								<li><a href="?page=profil&profil=<?php echo $_Joueur_['pseudo']; ?>"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="?page=alert"><i class="fa fa-envelope"></i> Alertes :  <span class="badge badge-pill badge-primary" id="alerts"><?php echo $alerte; ?></span></a></li>
                                <li><a class="dropdown-item" href="?page=token"><i class="ei ei-bill"></i> Mon solde : <?php if(isset($_Joueur_['tokens'])) echo $_Joueur_['tokens'] . ' '; ?><i class="ei ei-money-2"></i></a></li>
                                <li><a class="dropdown-item text-danger" href="?action=deco"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
                        </ul>
                    </li>
					<?php 
					}
					else
					{
						?>
						<li class="nav-item dropdown">
						    <a class="dropdown-toggle" href="javascript:void(0);">
						         <i class="fa fa-user"></i> Compte <i class="fa fa-angle-down" aria-hidden="true"></i>

						    </a>
						    <ul class="dropdown-menu">
						        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#ConnectionSlide"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
						        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#InscriptionSlide"><i class="fa fa-user-plus"></i> Inscription</a></li>
						    </ul>
						</li>
						<?php 
					}
					?>
                </ul>
            </div>
        </div>
    </nav>
</header>