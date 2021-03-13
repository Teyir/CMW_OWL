<?php
include('controleur/maintenance.php');

if($maintenance[$i]['maintenanceEtat'] == 0){
setTempMess("<script> $( document ).ready(function() { Snarl.addNotification({ title: '', text: 'La maintenance n\'est pas activée !', icon: '<span class=\'glyphicon glyphicon-cog\'></span>'});});</script>");
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Maintenance <?php echo $_Serveur_['General']['name']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/ionicons.min.css">
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/animate.css">
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/hover.min.css">
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/custom.css">
    
     <!-- Plugins CSS -->
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/magnific-popup/css/magnific-popup.css" />
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/swiper/css/swiper.css" />
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/youtube-player/css/YTPlayer.css" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/animate.min.css" />
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/ei-icon.css" />
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/main.css" />
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/custom.css" />
    
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/colors/blue.css" />


<link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/css/font-awesome-animation.min.css">

</head>
<body>
    <?php include('config.php'); ?>
	<section id="hero">
        <div class="fs-hero hero-img" style="background-image:url(<?php echo $image_fond_maintenance; ?>)">
                <div class="hero-caption center-left text-white">
                   <h2 class="font-weight-light lh-1-2 mrg-btm-30"><i class="fa fa-cog fa-spin"></i> Maintenance <?php echo $_Serveur_['General']['name']; ?> reviens très bientôt !</h2>
                    <hr>
                       <center> <p>
                            <?php echo $donnees['maintenanceMsg']; ?>
                        </p></center>
                          <hr><?php if($_Joueur_['rang'] != 1 AND $_PGrades_['PermsPanel']['access'] == false)
                    { ?>
                    <div class="card-footer text-muted" style="border:0px;">
                      <center>  <a class="btn btn-md btn-dark" data-toggle="modal" data-target="#loginAdmin">Connexion administrateur</a></center>
                    </div>
                </div>
            </div>
                </div>

                <div class="hero-caption btm-right exact-btm">
                    <ul class="social-btn mrg-top-30 text-right text-center-sm">
                       <?php if(!empty($facebook)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-facebook border-radius-round" href="<?php echo $facebook; ?>"><i class="ei ei-facebook"></i></a></li><?php } else {} ?>
                         <?php if(!empty($twitter)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-twitter border-radius-round" href="<?php echo $twitter; ?>"><i class="ei ei-twitter"></i></a></li><?php } else {} ?>
                         <?php if(!empty($mail)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-google-plus border-radius-round" href="mailto:<?php echo $mail; ?>"><i class="ei ei-email"></i></a></li><?php } else {} ?>
                        <?php if(!empty($skype)) {?><li><a class="btn icon-btn-md btn-white-inverse hover-skype border-radius-round" href="mailto:<?php echo $mail; ?>"><i class="ei ei-skype"></i></a></li><?php } else {} ?>

                    </ul>
                </div>
                <div style="color: white;" class="hero-caption btm-left exact-btm text-gray hidden-xs hidden-sm">
                    <small style="color: white;" class="lh-4"><?php include "include/version.php"; ?>
                Tous droits réservés, site créé pour le serveur <?php echo $_Serveur_['General']['name']; ?> avec <a href="http://craftmywebsite.fr" target="_blank" style="color: white;">CraftMyWebsite.fr</a></small>
                </div>

        </div>
    </div>
</section>
<div class="modal fade modal-center" id="loginAdmin" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">
            <div class="modal-content" style="width: 100%;">
                <div class="modal-body no-pdd">
                    <div class="login-panel pdd-horizon-15 pdd-vertical-30">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="width: 100%;">
                                <div class="left-panel">
                            <form method="post" action="?action=connection">
                            <h4><?php echo $donnees['maintenanceMsgAdmin']; ?></h4>
                            <div class="form-wrapper">
                                <label>Votre pseudonyme</label>
                                <input type="text" class="form-control" name="pseudo" id="PSEUDO" placeholder="Pseudonyme" style="border:0px;">
                            </div>
                            <div class="form-wrapper">
                                <label>Votre mot de passe</label>

                                <input type="password" name="mdp" class="form-control" id="MDP" placeholder="Mot de passe" style="border:0px;">
                            </div>
                               <input class="btn btn-md btn-theme mrg-vertical-20" type="submit" value="Connexion">
                           </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-close">
                        <button type="button" class="btn icon-btn-md icon-btn-round btn-dark lh-0" data-dismiss="modal"><i class="ei ei-close"></i></button>
                    </div>

                </div></div></div></div><?php 
                 }
                 else
                 {
                    ?><div class="card-footer text-muted" style="border: 0px;">
                      <center>  <a class="btn btn-md btn-dark" href="index.php">Accéder au site</a></center>
                    </div><?php 
                 }
                 ?>

	<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/popper.min.js"></script>
    <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/bootstrap.min.js"></script>
    <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/wow.min.js"></script>
    <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/custom.js"></script>
    <script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/js/snarl.min.js"></script>
    <!-- Jquery Plugins -->
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/smoothscroll/smoothscroll.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/easing/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/wow/wow.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/counter-up/waypoints.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/counter-up/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/youtube-player/js/jquery.mb.YTPlayer.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/parallax-scroll-master/jquery.parallax-scroll.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/plugins/validation/jquery.validate.min.js"></script>
       
   
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/email.js"></script>
    <script type="text/javascript" src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/main.js"></script>
</body>
</html>