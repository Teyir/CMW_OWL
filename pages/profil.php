<?php	$getprofil = $_GET['profil'];
?>
 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Compte</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Compte</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1">
	<div class="container">
	<?php
	if(isset($_Joueur_) AND $_GET['profil'] == $_Joueur_['pseudo'])
	{
	?>	
	<div class="container">
	    <div class="row">
	    	<div class="col-md-offset-1 col-md-10">
	        	<h2 class="heading-1 text-center">Profil de <?php echo htmlspecialchars($getprofil); ?></h2>
	        </div>
	    </div>
	</div>
	<br><br><br><br>
			<div class="card">
			<div class="col-lg-12 col-lg-offset-1" style="margin-left: 11.333%;">
			<div class="categories-edit">
				<ul class="nav nav-tabs tab-style-3 theme-style item-4">
					<li class="active"><a href="#infos" data-toggle="tab"><i class="ei ei-id-card"></i> Mes infos</a></li>
					<li><a href="#autres" data-toggle="tab"><i class="ei ei-list"></i> Autres</a></li>
					<li><a href="#serveur" data-toggle="tab"><i class="ei ei-money-2"></i> Donner des jetons</a></li>
				</ul>
			</div></div>
				<?php 
				if(isset($_GET['erreur']))
				{
					if($_GET['erreur'] == 1)
						echo '<div class="alert alert-danger"><center>Erreur, l\'email rentré est vide</center></div>';
					elseif($_GET['erreur'] == 2)
						echo '<div class="alert alert-danger"><center>Erreur, un des champs est trop court ( < à 4caractères)</center></div>';
					elseif($_GET['erreur'] == 3)
						echo '<div class="alert alert-danger"><center>Erreur, le mot de passe rentré ne correspond pas à celui associé à votre compte</center></div>';
					elseif($_GET['erreur'] == 4)
						echo '<div class="alert alert-danger">Vous n\'avez pas assez de tokens :( </div>';
					elseif($_GET['erreur'] == 5)
						echo '<div class="alert alert-danger">Pseudo inconnu ... </div>';
					else
						echo '<div class="alert alert-danger"><center>Erreur indéterminé</center></div>';
				}
				elseif (isset($_GET['success'])) {
					if($_GET['success'] == 'true')
						echo '<div class="alert alert-success"><center>Vos informations ont bien été changé ! :)</center></div>';
					elseif($_GET['success'] == "jetons")
						echo '<div class="alert alert-success"><center>Vous venez d\'envoyer '.htmlspecialchars($_GET['montant']).' jetons à '.htmlspecialchars($_GET['pseudo']).'</center></div>';
				}
				?>
				<div class="tab-content pdd-horizon-30">

					<div class="tab-pane fade in active" id="infos">
					

					<form class="form-horizontal" style="margin-top: 10%;" method="post" action="?&action=changeProfil" role="form">
						

						<div class="form-group">
							<div class="row">
								<label for="pseudo" class="col-md-4 control-label">Pseudo</label>
								<div class="col-md-6">
									<p class="form-control-static"><?php echo $_Joueur_['pseudo']; ?></p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">Mot de Passe</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpAncien" placeholder="Ancien Mot de Passe">
								</div>
							</div>
							<div class="row">
								<label class="col-md-4 control-label">Nouveau</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpNouveau" placeholder="Nouveau Mot de Passe">
								</div>
							</div>
							<div class="row">
								<label class="col-md-4 control-label">Confirmation</label>
								<div class="col-md-6 changer-mdp-champ">
									<input type="password" class="form-control" name="mdpConfirme" placeholder="Confirmez-le">
								</div>
							</div>
						</div>
					  <div class="form-group">
						<div class="row">
							<label for="inputPassword3" class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
							  <input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo $joueurDonnees['email']; ?>">
							</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-offset-5 col-md-5">
							  <button type="submit" class="btn btn-md btn-theme">Valider mes changements</button>
							</div>
						</div>
					  </div>
					</form>				

					</div>
					<div class="tab-pane fade in" id="autres">


						<form style="margin-top: 10%;" class="form-horizontal" method="post" action="?&action=changeProfilAutres" role="form">
							

							<div class="form-group">
								<label for="pseudo" class="col-sm-4 control-label">Skype</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="skype" placeholder="Votre nom d'utilisateur Skype" value="<?php if($joueurDonnees['skype'] != 'inconnu') echo $joueurDonnees['skype']; ?>">
								</div>
							</div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-4 control-label">Age</label>
						    <div class="col-sm-6">
						      <input type="number" name="age"class="form-control" placeholder="17" value="<?php if($joueurDonnees['age'] != 'inconnu') echo $joueurDonnees['age']; ?>" >
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-5 col-sm-5">
						      <button type="submit" class="btn btn-md btn-theme">Valider champs facultatifs</button>
						    </div>
						  </div>
						</form>			
		
					</div>
					<div class="tab-pane fade in" id="serveur">
						<form style="margin-top: 10%;" class="form-horizontal" method="post" action="?&action=give_jetons" role="form">
							

							<div class="form-group">
								<label for="pseudo" class="col-sm-4 control-label">Pseudo du receveur</label>
								<div class="col-sm-6">
									<input type="text" require class="form-control" name="pseudo" placeholder="Le nom de la personne a qui vous souhaiter donner des jetons" id="pseudo">
								</div>
							</div>
						  <div class="form-group">
						    <label for="montant" class="col-sm-4 control-label">Montant</label>
						    <div class="col-sm-6">
						      <input type="number" require name="montant" class="form-control" placeholder="0" min="0"/>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-5 col-sm-5">
						      <button type="submit" class="btn btn-md btn-theme">Envoyer</button>
						    </div>
						  </div>
						</form>	
					</div>
					<hr>
				</div>
				</div>
	<?php
	}
	?>
<div class="card">
  <div class="panel-body">
		<div class="row">
			<div class="col-md-6 unite-bloc">
				<h3>Statistiques</h3>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<td>Status</td>
							<td><?php echo $serveurProfil['status']; ?></td>
						</tr>
						</tr>
							<td>Age</td>
							<td><?php echo $joueurDonnees['age']; ?> ans.</td>
						</tr>
						<tr>
							<td>Pseudo</td>
							<td><?php echo htmlspecialchars($getprofil); ?></td>
						</tr>
							<td>Grade Site</td>
							<td><?php echo $gradeSite; ?></td>
						</tr>
							<td>Inscription</td>
							<td><?php echo 'Le '.date('d/m/Y', $joueurDonnees['anciennete']).' &agrave; '.date('H:i:s', $joueurDonnees['anciennete']); ?></td>
						</tr>
							<td>Email</td>
							<td><?php echo $joueurDonnees['email']; ?></td>
						</tr>
							<td>Skype</td>
							<td><?php echo $joueurDonnees['skype']; ?></td>
						</tr>
					</table>
				</div>
				<div class="footer-bloc">
				</div>
			</div>
			<div class="col-md-6 unite-bloc">
				<h3 class="header-bloc"><?php echo htmlspecialchars($getprofil); ?></h3>
					<img src="https://minotar.net/body/<?php echo htmlspecialchars($getprofil); ?>/200.png" style="padding-left: 30%;" alt="none" />
				<div class="footer-bloc">
				</div>
			</div>
		</div>
  </div>
</div>
<script>
  $(function () {
    $('#modifProfil a:first').tab('show')
  })
</script>
</div></section></div>