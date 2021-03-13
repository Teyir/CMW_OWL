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
                        $namesOfPlayers = $getcountLikesPlayers->fetchAll(PDO::FETCH_ASSOC);

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
									<h3 class="blog-tittle" >#<?php echo $news[$i]['id']; ?> <?php echo $news[$i]['titre']; ?></h3><br/>
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




							<?php }  }
						}
							else
								echo '<div class="col-md-12 col-lg-12 col-sm-12"><div class="alert alert-warning"><p class="text-center">Aucune news n\'a été créée à ce jour...</p></div></div>'; ?>
            </div>
            </div>
        </div>
    </section>


</div>