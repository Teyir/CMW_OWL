 <div class="modal fade modal-center" style="background: rgba(0, 0, 0, 0.5);"  id="ConnectionSlide" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body no-pdd">
                    <div class="login-panel">
                        <div class="content-block-2">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <div class="text-content pdd-horizon-60">
                                            <h3 class="mrg-btm-30 mrg-top-15">Connexion</h3>
                                            <form class="form-signin" role="form" method="post" action="?&action=connection">
                                                <div class="form-wrapper">
                                                    <label><b>Pseudo</b></label>
                                                    <input type="text" name="pseudo" class="form-control" id="PseudoConectionForm" placeholder="Pseudo" required autofocus>
                                                </div>
                                                <div class="form-wrapper">
                                                    <label><b>Mot de passe</b></label>
                                                    <input type="password" name="mdp" class="form-control" id="MdpConnectionForm" placeholder="Votre mot de passe" required>
                                                </div>
                                                <div>
                                                <a href="#" data-target="#passRecover" data-toggle="modal">Mot de passe oublié ?</a>
                                                </div>
                                                <input class="btn btn-md btn-theme mrg-vertical-20" type="submit" value="Connexion">
                                            </form>
                                        </div><!-- /content -->
                                    </div>
                                </div>
                            </div>  
                            <div class="image-container col-md-5 hidden-xs hidden-sm">
                                <div class="background-holder theme-overlay has-content" style="background-image:url(assets/images/bg-18.jpg)">
                                    <div class="content pdd-horizon-50">
                                        <h3 class="mrg-btm-20 text-white">Connexion</h3>
                                        <p class="text-white font-size-14">Des soucis ? Veuillez nous contacter si dessous !</p>
                                        <ul class="social-btn mrg-top-30">
                                            <?php if(!empty($facebook)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-facebook border-radius-round" href="<?php echo $facebook; ?>"><i class="ei ei-facebook"></i></a></li><?php } else {} ?>
                                             <?php if(!empty($twitter)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-twitter border-radius-round" href="<?php echo $twitter; ?>"><i class="ei ei-twitter"></i></a></li><?php } else {} ?>
                                             <?php if(!empty($mail)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-google-plus border-radius-round" href="mailto:<?php echo $mail; ?>"><i class="ei ei-email"></i></a></li><?php } else {} ?>
                                        </ul>
                                    </div><!-- content -->
                                </div><!-- /background-holder -->
                            </div><!-- /image-container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="modal fade" id="passRecover" tabindex="-1" style="background: rgba(0, 0, 0, 0.5);" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form class="-signin" role="form" method="post" action="?&action=passRecover">
      <div class="modal-body">
        <div class="row">
			<p class="text-justify text-center">Merci d'indiquer votre email utilisé à l'inscription , vous recevrez un lien pour réinitialiser votre mot de passe.</p>
			<div class="offset-md-2 col-md-8"><input type="email" name="email" class="form-control" id="EmailRecoverForm" placeholder="Email" required autofocus></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
	  </form>
    </div>
  </div>
</div>




<!-- Modal Start -->
		<!-- use data-backdrop="static" & data-keyboard="false" to lock modal -->
		<div class="modal fade modal-center" style="background: rgba(0, 0, 0, 0.5);" id="InscriptionSlide" role="dialog" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body no-pdd">
                       <div class="login-panel">
							<div class="content-block-2">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-7 col-md-offset-5">
											<div class="text-content pdd-horizon-60 pdd-vertical-60">
	 											 <form role="form" method="post" action="?&action=inscription">
													<div class="row">
														<div class="col-md-12 pdd-horizon-5">
															<div class="form-wrapper">
																<label><b>Pseudo In-Game</b></label>
																<input type="text" name="pseudo" class="form-control" id="PseudoInscriptionForm" placeholder="Votre pseudo exact In-Game">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 pdd-horizon-5">
															<div class="form-wrapper">
																<label><b>Email</b></label>
																<input type="email" name="email" class="form-control" id="EmailInscriptionForm" placeholder="Merci d'entrer une adresse email valide">
															</div>	
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 pdd-horizon-5">
															<div class="form-wrapper">
																<label><b>Mot de passe</b></label>
																<input type="password" name="mdp" class="form-control" id="MdpInscriptionForm" placeholder="Votre mot de passe">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 pdd-horizon-5">
															<div class="form-wrapper">
																<label><b>Confirmation mot de passe</b></label>
																<input type="password" name="mdpConfirm" class="form-control" id="MdpConfirmInscriptionForm" placeholder="Confirmez-le">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 pdd-horizon-5">
															<div class="form-wrapper">
																<label><b>Captcha</b></label><br/><br/>
																<input type='text' name='CAPTCHA' placeholder='captcha' class="form-control"/>
																<button type="button" onclick='var t=document.getElementById("captcha"); t.src=t.src+"&amp;"+Math.random();' href="" class="btn btn-md btn-theme"><i class="fa fa-refresh"></i> Recharger le captcha</button><br>	
																<img id='captcha' src='include/purecaptcha/purecaptcha_img.php?t=login_form' style="width: 100%;height: 100px;position: inherit;"/>
																<br/>
															</div>
														</div>
													</div>
													<div class="row mrg-top-10">
														<div class="col-md-12 pdd-horizon-5">
															<div class="form-wrapper">	
																<input class="btn btn-md btn-dark pull-right" type="submit" value="S'inscrire">
															</div>
														</div>
													</div>
												</form>
											</div><!-- /content -->
										</div>
									</div>
								</div>  
								<div class="image-container col-md-5 hidden-xs hidden-sm">
									<div class="background-holder theme-overlay has-content" style="background-image:url(assets/images/bg-18.jpg)">
										<div class="content pdd-horizon-50">
											<img class="img-responsive mrg-btm-20" src="assets/images/logo/logo-1.png" alt="">
	                                        <h3 class="mrg-btm-20 text-white">Inscription</h3>
											<p class="text-white">Créez un compte et rejoignez l'aventure !</p>
										</div><!-- content -->
									</div><!-- /background-holder -->
								</div><!-- /image-container -->
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Modal End -->






<div class="modal fade" id="InscriptionSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form role="form" method="post" action="?&action=inscription">
      <div class="modal-body">
		<center><p><div class="alert alert-warning" style="text-align: center;">Veuillez mettre une adresse email correcte !</div></p></center>
		<div class="form-group row">
			<label for="PseudoInscriptionForm" class="col-md-2 col-form-label">Pseudo</label>
			<div class="col-md-8">
				<input type="text" name="pseudo" class="form-control" id="PseudoInscriptionForm" placeholder="Votre pseudo exact In-Game">
			</div>
		</div>
		<div class="form-group row">
			<label for="EmailInscriptionForm" class="col-md-2 col-form-label">Email</label>
			<div class="col-md-8">
				<input type="email" name="email" class="form-control" id="EmailInscriptionForm" placeholder="Merci d'entrer une adresse email valide">
			</div>
		</div>
		<div class="form-group row">
			<label for="MdpInscriptionForm" class="col-md-2 col-form-label">Mot de passe</label>
			<div class="col-md-8">
				<input type="password" name="mdp" class="form-control" id="MdpInscriptionForm" placeholder="Votre mot de passe">
			</div>
		</div>
		<div class="form-group row">
			<label for="MdpConfirmInscriptionForm" class="col-md-2 col-form-label">Mot de passe</label>
			<div class="col-md-8">
				<input type="password" name="mdpConfirm" class="form-control" id="MdpConfirmInscriptionForm" placeholder="Confirmez-le">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-6">
			  <div class="form-check">
				<label class="form-check-label">
				  <input type="checkbox" name="souvenir" checked> S'inscrire à la newsletter.
				</label>
			  </div>
			</div>
		</div>	
		<div class="form-group row">
			<div class="col-md-6">
				<label>Captcha:</label>
				<input type='text' name='CAPTCHA' placeholder='captcha' class="form-control"/>
			</div>
			<div class="col-md-6">
				<img id='captcha' src='include/purecaptcha/purecaptcha_img.php?t=login_form' style="width: 100%;height: 100px;"/>
				<br/>
				<button type="button" onclick='var t=document.getElementById("captcha"); t.src=t.src+"&amp;"+Math.random();' href="" class="btn btn-info"><i class="fa fa-refresh"></i> Recharger le captcha</button>
				<br/>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </div>
	  </form>
    </div>
  </div>
</div>