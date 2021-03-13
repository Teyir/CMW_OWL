<!-- Hero Start -->
        <section id="hero">
            <div class="fs-hero hero-img" style="background-image:url(<?php echo $slider_img; ?>)">
                <div class="hero-caption center-left text-white">
					<h2 class="font-weight-light mrg-btm-20"><?php echo $slider_titre; ?></h2>
					<p><?php echo $slider_texte; ?></p>
					<div class="mrg-top-30">
						<a href="<?php echo $slider_lien_boutton; ?>" class="btn btn-md btn-white"> <?php echo $slider_texte_boutton; ?></a>
					</div>
				</div>
            </div><!-- /hero-img -->
        </section>
        <!-- Hero End -->





    <!--Page-->
	 <!-- About Start -->
        <section id="about" class="section-1">
            <div class="container">
                <div class="content-block-1 row">
                    <div class="col-md-6">
                        <div class="text-content">
                            <h2 class="heading-1"><?php echo $titre_noir_1; ?> <span class="theme-color"><?php echo $titre_bleu_1; ?></span></h2>
                            <p><?php echo $text1; ?></p>
                        </div><!-- /text-content -->
                    </div>
                    <div class="col-md-6">
                        <div class="img-style-1">
                            <img class="img-responsive no-mobile-parallax" src="<?php echo $image_pres_1; ?>" alt="" data-parallax='{"y": 30}'>
                        </div><!-- img-style-1 -->
                    </div>
                </div>
                
                <div class="content-block-1 row">
                    <div class="col-md-6">
                        <div class="img-style-1 left">
                            <img class="img-responsive no-mobile-parallax" src="<?php echo $image_pres_2; ?>" alt="" data-parallax='{"y": -30}'>
                        </div><!-- img-style-1 -->
                    </div>
                    <div class="col-md-6">
                        <div class="text-content-right">
                            <h2 class="heading-1 right"><?php echo $titre_noir_2; ?> <span class="theme-color"><?php echo $titre_bleu_2; ?></span></h2>
                            <p><?php echo $text2; ?> </p>
                        </div><!-- /padding -->
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->

    <!--Page-->
    <section class="section-1" style="padding: 0;">
        <div class="container">
            <div class="text-center">
                <h2 class="heading-1 text-center">Informations</h2>
                <p>Suivez notre fil d'actualité</p>
                <hr>
            </div>
            <div class="blog blog-list">
            <div class="blog-item">
			<?php 
			$i = 0;
				if(isset($news) && count($news) > 0)
				{
					for($i = 0; $i < 10; $i++)
					{
						if($i < count($news))
						{
							$getCountCommentaires = $accueilNews->countCommentaires($news[$i]['id']);
							$countCommentaires = $getCountCommentaires->rowCount();

							$getcountLikesPlayers = $accueilNews->countLikesPlayers($news[$i]['id']);
							$countLikesPlayers = $getcountLikesPlayers->rowCount();
							$namesOfPlayers = $getcountLikesPlayers->fetchAll();

							$getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
							?>
						 <div class="row">

                            <div class="col-md-4">
                                <div class="blog-media">
                                    <a href="single-post-full-width.html"><img class="img-responsive" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/images/blog/blog-3.jpg" alt=""></a>
                                </div>
                            </div>
							<div class="<?php if(count($news) == 1) echo 'col-md-8'; elseif(count($news) >= 2) echo 'col-md-8'; ?>">
								<div class="blog-content" style="margin-bottom:10%;">
									<h3 class="blog-tittle style="color:white;">#<?php echo $news[$i]['id']; ?> <?php echo $news[$i]['titre']; ?></h3><br/>
									<div class="blog-meta">
                                        <span class="author">Par <a class="theme-color" href="blog-classic-left-sidebar.html"><a href="?page=profil&profil=<?php echo $news[$i]['auteur']; ?>" alt="aller voir le profil de l'auteur"><img src="https://cravatar.eu/avatar/<?php echo $news[$i]['auteur']; ?>/24" alt="auteur"/> <?php echo $news[$i]['auteur']; ?></a></a>,</span>
                                        <span class="date"><?php echo ''.date('d/m/Y', $news[$i]['date']).' &agrave; '.date('H:i:s', $news[$i]['date']); ?></span>
                                    </div>
										<p class="card-text"><?php echo $news[$i]['message']; ?>

										
										<!--<a href="news.html" class="card-link btn btn-primary">Lire plus</a>-->
										<div class="blog-action">
										<?php
											if(isset($_Joueur_)) {
												$reqCheckLike = $accueilNews->checkLike($_Joueur_['pseudo'], $news[$i]['id']);
												$getCheckLike = $reqCheckLike->fetch();
												$checkLike = $getCheckLike['pseudo'];
												if($_Joueur_['pseudo'] == $checkLike) {
													echo '<span class="comments"><a href="javascript:void(0);" data-toggle="modal" data-target="#news'.$news[$i]['id'].'" class="card-link"><i class="ei ei-speech-bubble"></i> '.$countCommentaires.'</a></span>';
												} else {
													echo '<span class="comments"><a href="#" class="card-link" data-toggle="modal" data-target="#news'.$news[$i]['id'].'"><i class="ei ei-speech-bubble"></i>  '.$countCommentaires.'</a></span>

													<span class="likes"><a href="?&action=likeNews&id_news='.$news[$i]['id'].'" class="card-link"><i class="ei ei-heart"></i> '.$countLikesPlayers.'</a></span>

													';
												}
											} else {
												echo '<span class="comments"><a href="javascript:void(0);" data-toggle="modal" class="card-link" data-target="#news'.$news[$i]['id'].'"><i class="ei ei-speech-bubble"></i> '.$countCommentaires.'</a></span>';
											}
											
											if($countLikesPlayers != 0) {
												echo '<span class="likes"><a href="javascript:void(0);"><i class="ei ei-heart"></i> '.$countLikesPlayers.'</a></span>';
												//foreach ($namesOfPlayers as $likesPlayers) {
												//	echo $likesPlayers['pseudo'];
												//}
												
											}
											?>
										</div>
									</div>
								</div>
								</div>

							<?php if(isset($_Joueur_)) {
								$getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
								while($newsComments = $getNewsCommentaires->fetch()) {
									$reqEditCommentaire = $accueilNews->editCommentaire($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
									$getEditCommentaire = $reqEditCommentaire->fetch();
									$editCommentaire = $getEditCommentaire['commentaire'];
									if($newsComments['pseudo'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1) {  ?>
										<div class="modal fade" style="background: rgba(0, 0, 0, 0.5);z-index: 1202;" id="news<?php echo $news[$i]['id'].'-'.$newsComments['id'].'-edit'; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-support">
												<div class="modal-content modal-lg">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<center><h4 class="modal-title" id="myModalLabel">Edition du commentaire</h4></center>
													</div>
													<form action="?&action=edit_news_commentaire&id_news=<?php echo $news[$i]['id'].'&auteur='.$newsComments['pseudo'].'&id_comm='.$newsComments['id']; ?>" method="post">
														<div class="modal-body">
															<textarea name="edit_commentaire" class="form-control" rows="3" style="resize: none;" maxlength="255" required><?php echo $editCommentaire; ?></textarea>
														</div>
														<div class="modal-footer">
															<center><h4><B>Minimum de 6 caractères<br>Maximum de 255 caractères</B></h4></center></br>
															<center><button type="submit" class="btn btn-primary btn-block">Valider la modification</button></center>
														</div>
													</form>
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
										<?php }
									}
								} ?>
							<div class="modal fade" style="background: rgba(0, 0, 0, 0.5);" id="<?php echo "news".$news[$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-support">
								<div class="modal-content modal-lg">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<center><h4 class="modal-title" id="myModalLabel"><B><?php echo $news[$i]['titre']; ?></B></h4></center>
									</div> <!-- Modal-Header -->
									<div class="modal-body">
									</br>
									<?php
									$getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
									while($newsComments = $getNewsCommentaires->fetch()) {
										if(isset($_Joueur_)) {
											
											$getCheckReport = $accueilNews->checkReport($_Joueur_['pseudo'], $newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
											$checkReport = $getCheckReport->rowCount();

											$getCountReportsVictimes = $accueilNews->countReportsVictimes($newsComments['pseudo'], $news[$i]['id'], $newsComments['id']);
											$countReportsVictimes = $getCountReportsVictimes->rowCount();
										}
										?>

										<div class="container">
											<div class="row">
													<div class="col-md-4 col-lg-4 col-sm-12">
														<img class="rounded" style="margin-left: auto; margin-right: auto; display: block;" src="https://cravatar.eu/head/<?php echo $newsComments['pseudo']; ?>/64" alt="Auteur" />
														<p class="text-muted text-center username"><?php echo '<B> '.$newsComments['pseudo'].'</B>'; ?><br/>
															<?php echo  '<b>'.gradeJoueur($newsComments['pseudo'], $bddConnection).'</b><br/>'; ?>
															<?php echo '<B>Le '.date('d/m', $newsComments['date_post']).' à '.date('H:i:s', $newsComments['date_post']).'</B>'; ?></p>
														<?php if(isset($_Joueur_)) { ?>
															<span style="color: red;"><?php if($newsComments['nbrEdit'] != "0"){echo 'Nombre d\'édition: '.$newsComments['nbrEdit'].' | ';}if($countReportsVictimes != "0"){echo '<B>'.$countReportsVictimes.' Signalement</B> |';} ?></span>
															<div class="dropdown">
																<button class="btn btn-info" data-toggle="dropdown" style="font-size: 10px;">Action <b class="caret"></b></button>
																<ul class="dropdown-menu">
																	<?php if($newsComments['pseudo'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1) {
																		echo '<li><a href="#" data-toggle="modal" data-target="#news'.$news[$i]['id'].'-'.$newsComments['id'].'-edit">Editer</a></li>';
																		echo '<li><a href="?&action=delete_news_commentaire&id_comm='.$newsComments['id'].'&id_news='.$news[$i]['id'].'&auteur='.$newsComments['pseudo'].'">Supprimer</a></li>';
																	}
																	if($newsComments['pseudo'] != $_Joueur_['pseudo']) {
																		if($checkReport == "0") {
																			echo '<li><a href="?&action=report_news_commentaire&id_news='.$news[$i]['id'].'&id_comm='.$newsComments['id'].'&victime='.$newsComments['pseudo'].'">Signaler</a></li>';
																		} else {
																			echo '<li><a href="#">Déjà report</a></li>';
																		}
																	} ?>
																</ul>
															</div> <!-- dropdown -->
															<?php } ?>
													</div>
													<div class="col-md-6 col-lg-6 col-sm-12">
														<?php $com = espacement($newsComments['commentaire']); echo BBCode($com, $bddConnection); ?>
													</div>
											</div> <!-- Ticket-Commentaire-->
										</div> <!-- Panel Panel-Default -->
											<?php } ?>
									</div> <!-- Modal-Body -->
										<?php
										if(isset($_Joueur_)) { ?>
											<div class="modal-footer w-100">
												<form action="?&action=post_news_commentaire&id_news=<?php echo $news[$i]['id']; ?>" method="post" class="w-100">
													<textarea name="commentaire" class="form-control w-100" required></textarea>
													<center><h4><B>Minimum de 6 caractères<br>Maximum de 255 caractères</B></h4></center>
												</br>
												<center><button type="submit" class="btn btn-primary btn-block">Commenter</button></center>
												</form>
											</div>
									<?php } else { ?>
										<div class="modal-footer">
											<center><div class="alert alert-danger">Veuillez-vous connecter pour mettre un commentaire.</div></center>
											<center><a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-warning">Connexion</a></center>
										</div> <!-- Modal-Footer -->
										<?php } ?>
									</div><!-- Modal-Footer -->
									</div> <!-- Modal-Content -->
						</div>

							<?php }  }
						}
							else
								echo '<div class="col-md-12 col-lg-12 col-sm-12"><div class="alert alert-warning"><p class="text-center">Aucune news n\'a été créée à ce jour...</p></div></div>'; ?>
            </div>
            </div>
            <?php  if(count($news) > 3 ) echo '<a href="?page=blog" class="btn btn-primary btn-block">Afficher plus</a>'; ?>
        </div>
    </section>
</div>