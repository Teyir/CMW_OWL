 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Tokens</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Tokens</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1">
<div class="container">

	<?php if(isset($_GET['success']) AND $_GET['success'] == 'true'){ ?>
	<div class="alert alert-success">Votre code a bien été validé, vous avez été crédité de <?php echo $_GET['tokens']; ?>  Jetons ! </div>
	<?php } elseif(isset($_GET['success']) AND $_GET['success'] == 'false'){ ?>
	<div class="alert alert-danger">Le code entré est incorrect, vous n'avez pas été crédité...</div>
	<?php } 
	if($_Serveur_['Payement']['paypal'] == true) 
		{
			?>
	<div class="card"><br><br>
		<div class="container">
		    <div class="row">
		    	<div class="col-md-offset-1 col-md-10">
		        	<h2 class="heading-1 text-center">Payement par Paypal</h2>
		        </div>
		    </div>
		</div>
		<br><br>
		<div class="card">
			<div class="alert alert-success">Deux possibilités s'offrent à vous pour les dons, vous pouvez payer par PayPal, soit avec votre compte PayPal soit avec votre Carte Bleu de manière sécurisée depuis le site PayPal (le payement ne s'effectue donc pas sur notre serveur/site). L'avantage de PayPal est que le joueur reçoit plus de Jetons qu'avec un payement téléphonique (qui sont surtaxés).</div>
			<?php 
			require_once('controleur/tokens/paypal.php'); 
			?>
			<div class="row">
				<?php
				if(isset($offresTableau))
					for($i = 0; $i < count($offresTableau); $i++)
					{
						echo '
						<div class="col-md-4 mrg-btm-30" style="margin-left: 2%;">
								<div class="features-block-5">
									<div class="features-info">
									<i class="ei ei-paypal"></i>
									<h4 class="features-tittle">'. $offresTableau[$i]['nom'] .'</h4>
									<p>'.$offresTableau[$i]['description'].'</p>
								</div>
									
								';
								if(isset($_Joueur_)) {
										if($lienPaypal[$i] == 'viaMail')
											require('controleur/paypal/paypalMail.php');
										else
											echo '<a href="'. $lienPaypal[$i] .'" class="btn btn-sm btn-theme">Acheter !</a>';
									}
									else { echo'<a href="?&page=connection" class="btn btn-sm btn-theme">Connexion..</a>'; }
									echo '
									<button class="btn btn-sm btn-dark">' .$offresTableau[$i]['prix']. ' euro</button>
							</div>
								';
									
					}
					else
						echo '<div style="margin-left: 15px;margin-right: 15px;" class="alert alert-danger"><strong>Aucune offre de payement par paypal n\'est disponible pour le moment...</strong></div>';
					?>
				</div>
			</div>
		</div>
		<?php 
	}
	if($_Serveur_['Payement']['mcgpass'] == true)
		{
			?>
	<div class="card"><br><br>
			<div class="container">
		    <div class="row">
		    	<div class="col-md-offset-1 col-md-10">
		        	<h2 class="heading-1 text-center">Payement par MCGPass</h2>
		        </div>
			    </div>
			</div>
			<br><br>
			 <div class="panel-body">
					<div class="alert alert-success">Vous pouvez payer par MCGPass, vous paierez ainsi avec votre forfait téléphonique, c'est donc un avantage important. D'un autre côté, vous serez déversé de moins de tokens qu'avec un payement paypal (qui sont beaucoup moins taxés).</div>
							<iframe src="https://secure.mcgpass.com/script_mv/v1/script_payment?id=<?php echo $_Serveur_['Payement']['mcgpass_idSite']; ?>&merchant_data=" width="100%" height="400" marginheight="0" marginwidth="0" style="border:0px" scrolling="yes"></iframe>		
			</div>
		</div>
			<?php 
		}
		?>
</div>
</section></div>