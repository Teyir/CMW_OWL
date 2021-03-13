 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Voter</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Voter</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1">
<div class="container">
				<?php
				if(isset($_GET['erreur']))
				{
					if($_GET['erreur'] == 1)
					{
						?><div class="alert alert-danger">Vous devez encore attendre <?php echo $_GET['time']; ?> avant de pouvoir voter sur ce site !<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a><script>$(".alert").alert()</script></div><?php
					}
					if($_GET['erreur'] == 2)
					{
						?><div class="alert alert-danger">Vous devez vous connecter si vous voulez gagner une récompense...<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a><script>$(".alert").alert()</script></div><?php
					}
				}
				elseif(isset($_GET['success']))
				{
					?><div class="alert alert-success">Votre récompense arrive, si vous n'avez pas vu de fenêtre s'ouvrir pour voter, la fenêtre à dû s'ouvrir derrière votre navigateur, validez le vote et profitez de votre récompense In-Game !<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a><script>$(".alert").alert()</script></div><?php
				}
				?>	
<div class="container">
    <div class="row">
    	<div class="col-md-offset-1 col-md-10">
        	<h2 class="heading-1 text-center"><?php echo $_Serveur_['General']['name']; ?> a besoin de vous !</h2>
            <p class="mrg-top-60" style="margin-left: 5%;"><span class="dropcap theme-color">V</span>oter pour le serveur permet d'améliorer son référencement ! Les votes sont récompensés par des items In-Game.</p>
        </div>
    </div>
</div>
<br><br>

			<h3 class="header-bloc">Voter pour votre serveur :</h3>
			<div class="tabbable">
				<form action="?&action=voter" method="post">
				<ul class="nav nav-tabs" style="margin-bottom:1vh;">
                
				<?php 
                if(!isset($jsonCon) OR empty($jsonCon))
                    echo '<p>Veuillez relier votre serveur à votre site avec JsonAPI depuis le panel pour avoir les liens de vote !</p>';
                
                for($i = 0; $i < count($jsonCon); $i++) { ?>
					
					<li class="nav-item"><a href="#voter<?php echo $i; ?>" data-toggle="tab" class="nav-link <?php if($i == 0) echo ' active'; ?>"><?php echo $lecture['Json'][$i]['nom']; ?></a></li>
					
				<?php } ?>
				</ul>
				
				<?php if(isset($_Joueur_))
				{ ?>
				<div class="tab-content">
				<?php for($i = 0; $i < count($jsonCon); $i++) { ?>
				
					<div id="voter<?php echo $i; ?>" class="tab-pane fade <?php if($i==0) echo 'in active show';?>" <?php if($i == 0) { echo 'aria-expanded="true"'; } else echo 'aria-expanded="false"'; ?>>  
						<div class="panel-body">
							<div class="alert alert-dismissable alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<center>Bienvenue dans la catégorie de vote pour le serveur : <?=$lecture['Json'][$i]['nom'];?></center>
							</div>
                    
					<?php  $req_vote->execute(array('serveur' => $i));
							$count_req->execute(array('serveur' => $i));
							$data_count = $count_req->fetch();
							if($data_count['count'] > 0)
							{
								while($liensVotes = $req_vote->fetch())
								{
									?>
										<button type="submit" class="btn btn-primary bouton-vote" name="site" value="<?php echo $liensVotes['id']; ?>" onclick="window.open('<?php echo $liensVotes['lien']; ?>','Fiche','toolbar=no,status=no,width=1350 ,height=900,scrollbars=yes,location=no,resize=yes,menubar=yes')" >
											<?php echo $liensVotes['titre']; ?>
				                        </button>					
								<?php								
								}
							}
							else
								echo '</br><p>Aucun lien de vote n\'est disponible pour ce serveur...</p>';
                    ?>
					
					</div>
				</div>
				
				<?php } ?>
				</div>
				<?php
			}
			else
				{
					?><center>
		<h4>Veuillez vous connecter pour accéder à la boutique:</h4>
		<a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-warning btn-lg" ><span class="glyphicon glyphicon-user"></span> Connexion</a>
		</center><?php
				} ?>				
				</form>				
				
			</div>
			<br/>	

			<h3 class="header-bloc">Top voteurs</h3>
			<div class="col-md-12">
			<div class="card padding-30 mrg-top-20">
				<div class="table-responsive">
					<table class="table table-hover">

					<thead>
						<tr><th>#</th><th>Pseudo</th><th>Votes</th></tr>
					</thead>
				
						<?php for($i = 0; $i < count($topVoteurs) AND $i < 10; $i++) { ?>
						<tr><td><?php echo $i ?></td><td><img src="http://cravatar.eu/head/<?=$topVoteurs[$i]['pseudo'];?>/30" alt="none" /> <strong><?php echo $topVoteurs[$i]['pseudo']; ?></strong></td><td><?php echo $topVoteurs[$i]['nbre_votes']; ?></td></tr>
						<?php }?>
				</table>
			</div>
		</div>
		</div>
</div>
</section>
</div>