<?php
require('theme/' . $_Serveur_['General']['theme'] . '/preload.php');
$configTheme = new Lire('theme/'.$_Serveur_['General']['theme'].'/config/config.yml');
$_Theme_ = $configTheme->GetTableau();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="msapplication-navbutton-color" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-statut-bar-style" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-capable" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">


    <!-- SEO -->
    <meta property="og:title" content="<?= $_Serveur_['General']['name'] ?>">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://<?= $_SERVER["SERVER_NAME"] ?>">
    <meta property="og:image" content="https://<?= $_SERVER["SERVER_NAME"] ?>/favicon.ico">
    <meta property="og:image:alt" content="<?= $_Serveur_['General']['description'] ?>">
    <meta property="og:description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta property="og:site_name" content="<?= $_Serveur_['General']['name'] ?>" />

    <meta name="twitter:title" content="<?= $_Serveur_['General']['name'] ?>">
    <meta name="twitter:description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta name="twitter:image" content="https://<?= $_SERVER["SERVER_NAME"] ?>/favicon.ico">

    <meta name="author" content="CraftMyWebsite, Teyir, <?= $_Serveur_['General']['name']; ?>" />
    <meta name="publisher" content="<?= $_SERVER["SERVER_NAME"] ?> [contact@<?= $_SERVER["SERVER_NAME"] ?>]"/>
    <meta name="description" content="<?= $_Serveur_['General']['description'] ?>">

    <meta name="copyright" content="CraftMyWebsite, Teyir, <?= $_Serveur_['General']['name']; ?>"/>

    <meta name="robots" content="follow, index, all">


    <!-- CSS -->
	<link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
	<link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/ionicons.min.css" rel="stylesheet" type="text/css">
	<link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/animate.css" rel="stylesheet" type="text/css">
	<link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/hover.min.css" rel="stylesheet" type="text/css">
	<link href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/custom.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/toastr.css">
	<link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/snarl.min.css">
	<link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/forum.css">



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


<link rel="stylesheet" href="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/css/font-awesome-animation.min.css">


	<?php
	if(file_exists('favicon.ico'))
			echo '<link rel="icon" type="image/x-icon" href="favicon.ico"></link>';
	?>

    <title>
        <?= $_Serveur_['General']['name'] . " | " . (isset($_GET["page"]) ? $_GET["page"] : $_Serveur_['General']['description']) ?>
    </title>


	<?php include('config.php'); ?>

    <!-- SCRIPTS -->
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/ckeditor.js"></script>
    <?php if(isset($_GET['page']) && $_GET['page'] == "voter") {
        echo '<script src="theme/'.$_Serveur_['General']['theme'].'/assets/js/voteControleur.js"></script>';
    } ?>
</head>

<body>
<script type="text/javascript">var _Jetons_ = "<?=$_Serveur_['General']['moneyName'];?>";</script>
<?php
//Verif Version
include("./include/version.php");
include("./include/version_distant.php");

if ($versioncms != $versioncmsrelease && Permission::getInstance()->verifPerm('PermsPanel', 'update', 'showPage')) : ?>

    <div class=" mb-0 rounded-0 text-center alert alert-main bg-lightest alert-dismissible text-shadow-none fade show sticky-top" role="alert">
        <h5 class="m-0">
            Une mise à jour est disponible <strong>(<a href="https://craftmywebsite.fr/telecharger" target="_blank" class="alert-link"><?= $versioncmsrelease ?></a>)</strong> !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: var(--base-color);">
                <span aria-hidden="true">&times;</span>
            </button>
        </h5>
    </div>

<?php endif; ?>


<!-- PRELOADER
	<div class="loader-wrapper">
		<div class="loaders">
			<div class="loader-logo-pulse">
				<img src="<?php echo $logo; ?>" alt=""> 
			</div>
			<div class="loader-1">
			</div>
		</div>
	</div>
	-->




<?php if (Permission::getInstance()->verifPerm("connect")) /* --> */ setcookie('pseudo', $_Joueur_['pseudo'], time() + 86400, null, null, false, true);

include('theme/' . $_Serveur_['General']['theme'] . '/entete.php'); //Header included
tempMess(); ?>

<?php
//Verif Installation Folder is deleted
if (is_dir("installation")) {
    include('theme/' . $_Serveur_['General']['theme'] . '/pages/fichier_installation.php');
} else {
    include('controleur/page.php'); //Page included
}
include('theme/' . $_Serveur_['General']['theme'] . '/footer.php');  //Footer included
include('theme/' . $_Serveur_['General']['theme'] . '/formulaires.php'); //Forms included
?>


<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/popper.min.js"></script>
<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/wow.min.js"></script>
<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/custom.js"></script>
<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/toastr.min.js"></script>
<script src="theme/<?php echo $_Serveur_['General']['theme']; ?>/assets/js/snarl.min.js"></script>
<?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/ckeditorManager.php"; ?>
<?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/custom.php"; ?>
<?php if ($_Serveur_['Payement']['dedipass']) : //API DEDIPASS
?>
<script src="//api.mcgpass.com/v1/pay.js"></script>
<?php endif; ?>


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





<script>
function insertAtCaret (textarea, icon)
{ 
	if (document.getElementById(textarea).createTextRange && document.getElementById(textarea).caretPos)
	{ 
		var caretPos = document.getElementById(textarea).caretPos; 
		selectedtext = caretPos.text; 
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == '' ? icon + '' : icon; 
		caretPos.text = caretPos.text + selectedtext;
	}
	else if (document.getElementById(textarea).textLength > 0)
	{
		Deb = document.getElementById(textarea).value.substring( 0 , document.getElementById(textarea).selectionStart );
		Fin = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionEnd , document.getElementById(textarea).textLength );
		document.getElementById(textarea).value = Deb + icon + Fin;
	}
	else
	{
		document.getElementById(textarea).value = document.getElementById(textarea).value + icon;
	}
	
	document.getElementById(textarea).focus(); 
}


function ajout_text(textarea, entertext, tapetext, balise)
{
	if (document.selection && document.selection.createRange().text != '')
	{
		document.getElementById(textarea).focus();
		VarTxt = document.selection.createRange().text;
		document.selection.createRange().text = '['+balise+']'+VarTxt+'[/'+balise+']';
	}
	else if (document.getElementById(textarea).selectionEnd && (document.getElementById(textarea).selectionEnd - document.getElementById(textarea).selectionStart > 0))
	{
		valeurDeb = document.getElementById(textarea).value.substring( 0 , document.getElementById(textarea).selectionStart );
		valeurFin = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionEnd , document.getElementById(textarea).textLength );
		objectSelected = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionStart , document.getElementById(textarea).selectionEnd );
		document.getElementById(textarea).value = valeurDeb+'['+balise+']'+objectSelected+'[/'+balise+']'+valeurFin;
	}
	else
	{
		VarTxt = window.prompt(entertext,tapetext);
		if ((VarTxt != null) && (VarTxt != '')) insertAtCaret(textarea, '['+balise+']'+VarTxt+'[/'+balise+']');
	}
}

function ajout_text_complement(textarea, entertext, tapetext, balise, complementTxt, complementtape)
{
	if(balise == 'url')
	{	
		if (document.selection && document.selection.createRange().text != '')
		{
			complement = window.prompt(entertext, tapetext);
			document.getElementById(textarea).focus();
			VarTxt = document.selection.createRange().text;
			if(complement != null && complement != '')
				document.selection.createRange().text = '['+balise+'='+complement+']'+VarTxt+'[/'+balise+']';
			else
				document.selection.createRange().text = '['+balise+']'+VarTxt+'[/'+balise+']';
		}
		else if (document.getElementById(textarea).selectionEnd && (document.getElementById(textarea).selectionEnd - document.getElementById(textarea).selectionStart > 0))
		{
			complement = window.prompt(entertext, tapetext);
			valeurDeb = document.getElementById(textarea).value.substring( 0 , document.getElementById(textarea).selectionStart );
			valeurFin = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionEnd , document.getElementById(textarea).textLength );
			objectSelected = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionStart , document.getElementById(textarea).selectionEnd );
			if(complement != null && complement != '')
				document.getElementById(textarea).value = valeurDeb+'['+balise+'='+complement+']'+objectSelected+'[/'+balise+']'+valeurFin;
			else
				document.getElementById(textarea).value = valeurDeb+'['+balise+']'+objectSelected+'[/'+balise+']'+valeurFin;
		}
		else
		{
			VarTxt = window.prompt(complementTxt,complementtape);
			complement = window.prompt(entertext, tapetext);
			if ((VarTxt != null) && (VarTxt != '') && complement != null && complement != '') insertAtCaret(textarea, '['+balise+'='+complement+']'+VarTxt+'[/'+balise+']');
			else insertAtCaret(textarea, '['+balise+']'+VarTxt+'[/'+balise+']'); 
		}
	}
	else
	{
		if (document.selection && document.selection.createRange().text != '')
		{
			complement = window.prompt(complementTxt, complementtape);
			document.getElementById(textarea).focus();
			VarTxt = document.selection.createRange().text;
			if(complement != null && complement != '')
				document.selection.createRange().text = '['+balise+'='+complement+']'+VarTxt+'[/'+balise+']';
			else
				document.selection.createRange().text = '['+balise+']'+VarTxt+'[/'+balise+']';
		}
		else if (document.getElementById(textarea).selectionEnd && (document.getElementById(textarea).selectionEnd - document.getElementById(textarea).selectionStart > 0))
		{
			complement = window.prompt(complementTxt, complementtape);
			valeurDeb = document.getElementById(textarea).value.substring( 0 , document.getElementById(textarea).selectionStart );
			valeurFin = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionEnd , document.getElementById(textarea).textLength );
			objectSelected = document.getElementById(textarea).value.substring( document.getElementById(textarea).selectionStart , document.getElementById(textarea).selectionEnd );
			if(complement != null && complement != '')
				document.getElementById(textarea).value = valeurDeb+'['+balise+'='+complement+']'+objectSelected+'[/'+balise+']'+valeurFin;
			else
				document.getElementById(textarea).value = valeurDeb+'['+balise+']'+objectSelected+'[/'+balise+']'+valeurFin;
		}
		else
		{
			complement = window.prompt(complementTxt,complementtape);
			VarTxt = window.prompt(entertext, tapetext);
			if ((VarTxt != null) && (VarTxt != '') && complement != null && complement != '') insertAtCaret(textarea, '['+balise+'='+complement+']'+VarTxt+'[/'+balise+']');
			else insertAtCaret(textarea, '['+balise+']'+VarTxt+'[/'+balise+']');
		}
	}
}
</script>
<?php 
include('controleur/notifications.php');
if(isset($_Joueur_))
{
	?><script>
setInterval(ajax_alerts, 10000);
function ajax_alerts(){
	var url = '?action=get_alerts';
	$.post(url, function(data){
		alerts.innerHTML = data;
		ajax_new_alerts();
});
}
function ajax_new_alerts(){
	var url = '?action=new_alert';
	$.post(url, function(donnees){
		if(donnees > 0)
		{
			var message = "Vous avez ";
			message += donnees;
			message += " nouvelles alertes";
			toastr["success"](message, "Message Système")
			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": true,
			  "positionClass": "toast-bottom-left",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "1000",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		}
	 });
}
</script>
<?php }
if(isset($modal))
{
	?>
	<script>  	$('#myModal').modal('toggle') 	</script>	
	<?php
}
if($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1)
{
	?>
	<script>
	setInterval(ajax_signalement, 10000);
	function ajax_signalement(){
		var url = '?action=get_signalement';
		$.post(url, function(signalement){
			if(signalement > 0)
			{
				signalement.innerHTML = signalement;
				var message = "Il y'a ";
				message += signalement;
				message += ' nouveaux signalements !';
				toastr["error"](message, "Message système")
				toastr.options = {
				  "closeButton": true,
				  "debug": true,
				  "newestOnTop": false,
				  "progressBar": true,
				  "positionClass": "toast-top-left",
				  "preventDuplicates": false,
				  "onclick": null,
				  "showDuration": "1000",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				}
			}
		});
	}
	</script>
	<?php 
}
?>
<script>$('document').ready(function() {

    var checked = [];

    $("input:checkbox[name=selection]").each(function() {
        $(this).click(function() {

            checked = $("input:checkbox[name=selection]:checked");

            if (checked.length > 0) {
                $('#popover').removeClass('hide')
            }
            else {
                $('#popover').addClass('hide');
            }
        })
    });

    $('#sel-form').submit(function() {
        var $form = $(this);
        checked.each(function() {
            $('<input>').attr({
                type: 'hidden',
                name: 'id[]',
                value: $(this).val()
            }).appendTo($form);
        });
    });

});
</script>

</body>
