<?php 

if(isset($_Joueur_) AND ($_PGrades_['PermsForum']['moderation']['seeSignalement'] == true OR $_Joueur_['rang'] == 1))
{
	$req = $bddConnection->query('SELECT * FROM cmw_forum_report WHERE vu = 0');
	?>
 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Signalement</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Signalement</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1">
<div class="container">
    <div class="row">
    	<div class="col-md-offset-1 col-md-10">
        	<h2 class="heading-1 text-center">Gestion des signalements</h2>
        </div>
    </div>
</div>
	<div class="container">
	<table class="table table-striped">
		<tr>
			<th>Type de report</th>
			<th>Raison</th>
			<th>Reporteur</th>
			<th>Lien</th>
		</tr>
	<?php 
	while($data = $req->fetch())
	{
		?><tr>
			<td><?php if($data['type'] == 0)
			{
				echo 'Topic';
			}
			else
			{
				echo 'Réponse';
			}
			?></td>
			<td><?php echo $data['reason']; ?></td>
			<td><?php echo $data['reporteur']; ?></td>
			<td><?php 
			if($data['type'] == 0)
			{
				?><a href="index.php?action=r_t_vu&id=<?php echo $data['id_topic_answer']; ?>">Voir le topic</a><?php
				
			}
			else
			{
				$req_topic = $bddConnection->prepare('SELECT * FROM cmw_forum_answer WHERE id = :id');
				$req_topic->execute(array(
					'id' => $data['id_topic_answer']
				));
				$id = $req_topic->fetch();
				$req_page = $bddConnection->prepare('SELECT * FROM cmw_forum_answer WHERE id_topic = :id');
				$req_page->execute(array(
					'id' => $id['id_topic']
				));
				$d_page = $req_page->fetchAll();
				foreach($d_page as $key => $value)
				{
					if($d_page[$key]['id'] == $data['id_topic_answer'])
					{
						$ligne = $key;
					}
				}
				$ligne++;
				$tour = 1;
				unset($d);
				unset($page);
				while($d != TRUE)
				{
					$nb = 20 * $tour;
					if($nb >= $ligne)
					{
						$page = $tour;
						$d = TRUE;
					}
					else
					{
						$tour++;
					}
				}
				?><a href="index.php?action=r_a_vu&id_a=<?php echo $data['id_topic_answer']; ?>&id=<?php echo $id['id_topic']; ?>&page_post=<?php echo $page; ?>">Lien vers la réponse</a><?php
			}
			?></td>
		</tr><?php
	}
	?></table>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br></section></div><?php 
}
