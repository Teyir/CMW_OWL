 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Ban-List</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Ban-List</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1">
	<div class="container">		
		<div class="row">
		<div class="col-md-12">
		<h3 class="header-bloc">Liste des joueurs bannis</h3>
		<div class="card padding-30 mrg-top-20">
		<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Pseudo</th>
				<th>Date</th>
				<th>Source</th>
				<th>Durée</th>
				<th>Raison</th>
			</tr>
			<?php
			if(count($banlist[0]) > 0) {
				foreach($banlist[0] as $cle => $element)
				{
					echo '<tr>';
					if(!is_string($element))
						foreach($banlist[0][$cle] as $cle2 => $element2)
						{
							echo '<td>'. $element2 .'</td>';
						}
					else
						echo '<td>'.$banlist[0][$cle].'</td><td>Date inconnue</td><td>(Unknown)</td><td>?</td><td>Bannis par un admin</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr><td colspan="5">Aucun joueur n\'a été banni à ce jour!</td></tr>';
			}
			?>
		</table>
		</div></div></div>
		</div>
	</div><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
</div>