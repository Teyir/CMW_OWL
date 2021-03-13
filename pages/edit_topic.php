<?php 

if(isset($_Joueur_) AND isset($_POST['id_topic']))
{
	$id = htmlspecialchars($_POST['id_topic']);
	$req = $bddConnection->prepare('SELECT * FROM cmw_forum_post WHERE id = :id');
	$req->execute(array(
		'id' => $id
	));
	$donnee = $req->fetch();
	?>

	 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Edition du topic :<?php echo $donnee['nom']; ?></h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
				  <li class="breadcrumb-item"><a href="?page=forum">Forum</a></li>
				  <li class="breadcrumb-item"><a href="?&page=forum_categorie&id=<?php echo $topicd['id_categorie']; ?>"><?php echo $topicd['nom_categorie']; ?></a></li>
				  <li class="breadcrumb-item"><?php echo $topicd['nom']; ?></li>
				  <li class="breadcrumb-item active">Edition du topic :<?php echo $donnee['nom']; ?></li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1"><form action="?action=edit_topic" method="POST">
	<div class="container">
        <input type="hidden" name="id_topic" value="<?php echo $id; ?>"/>
        <label for="contenue" class="control-label">Editez votre contenu</label><br/>
        <textarea name="contenue" maxlength="10000" class="form-control" id="contenue" rows="20"><?php echo $donnee['contenue']; ?></textarea>
        <hr>
        <button type="submit" class="btn btn-sm btn-theme">Envoyer</button>
      </div>
	  </form><br><br><br><br><br><br></section></div>
      <?php 
}
else
	header('Location: ?page=erreur&erreur=0');