<!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Staff</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Staff</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
		<section class="section-1">
		<div class="container">
	    <div class="row">
	    	<div class="col-md-offset-1 col-md-10">
	        	<h2 class="heading-1 text-center">Notre Staff</h2>
	        </div>
		    </div>
		</div>
		<?php 
				if ($activeStaff != 0) { ?>
				<br><br><div class="container">		
				<div class="row">
					<div class="col-md-12">
						<div class="swiper-3 swiper-container static ">
                            <div class="swiper-wrapper">
                                
                            <?php
                            	if (!empty($nombre_membre)) {
                            		for ($i=1; $i <=$nombre_membre; $i++) { 

                            	
                             ?>


                                <div class="swiper-slide">
									<div class="card">
										<div class="padding-30 border bottom">
											<img class="img-responsive mrg-horizon-auto border-radius-round" src="<?php echo $image_membre[$i]; ?>" alt="">
											<div class="text-center mrg-top-30">
												<h4 class="mrg-btm-5"><?php echo $pseudo_membre[$i]; ?></h4>
												<p><?php echo $role_membre[$i]; ?></p>
											</div>
											<ul class="social-btn mrg-top-20 text-center">
												<li><a class="btn icon-btn-md btn-white hover-twitter icon-btn-round" target="_blank" href="<?php echo $twitter_membre[$i]; ?>"><i class="ei ei-twitter"></i></a></li>
												<li><a class="btn icon-btn-md btn-white hover-skype icon-btn-round" href="skype:<?php echo $skype_membre[$i]; ?>?add;"><i class="ei ei-skype"></i></a></li>
												<li><a class="btn icon-btn-md btn-white hover-google-plus icon-btn-round" href="mailto:<?php echo $email_membre[$i]; ?>"><i class="ei ei-email"></i></a></li>
											</ul>
										</div>
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6 border right">
												<div class="pdd-vertical-15 text-center">
													<h3 class="no-mrg-vertical"><?php echo $age_membre[$i]; ?></h3>
													<p>Âge</p>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="pdd-vertical-15 text-center">
													<h3 class="no-mrg-vertical"><?php echo $pays_membre[$i]; ?></h3>
													<p>Pays</p>
												</div>
											</div>
										</div>
									</div>
								</div>



							<?php } } ?>



                            </div>
							<div class="swiper-navigation navigation-2">
								<div class="swiper-button-next-3"><i class="ei ei-right-chevron"></i></div>
								<div class="swiper-button-prev-3"><i class="ei ei-left-chevron"></i></div>
							</div>
							<div class="swiper-pagination-3 swiper-bullet-1"></div>
                        </div>
					</div>
				</div>
				</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<?php } else { ?>
				<br><br><div class="container">		
				<div class="row">
			    	<div class="col-md-offset-1 col-md-10">
			        	<center><p>Plugin désactivé</p></center>
			        </div>
			    </div>
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<?php }  ?>
			
		</section>
</div>