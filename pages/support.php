 <!-- Page Tittle Start -->
		<section class="page-tittle page-tittle-lg bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
			<div class="container">
				<div class="page-tittle-head">
					<h2>Support</h2>
				</div>
			    <ol class="breadcrumb pull-right mrg-top-30">
				  <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				  <li class="breadcrumb-item active">Support</li>
				</ol>
			</div>
		</section>
        <!-- Page Tittle End -->
<section class="section-1">
<div class="container">
    <div class="row">
    	<div class="col-md-offset-1 col-md-10">
        	<h2 class="heading-1 text-center">Support communautaire</h2>
           <p class="mrg-top-60" style="margin-left: 10%;"><span class="dropcap theme-color">P</span>ostez des tickets, lisez ceux des autres, répondez à la communauté et discutez avec l'équipe du serveur !</p>
        </div>
    </div>
</div><br><br>
<div class="container">
	<div class="col-md-12">
	  <div class="card padding-30 mrg-top-20">
	  		<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['displayTicket'] == true) { echo '<th style="text-align: center;">Visuel</th>'; } ?>
							<th>Pseudo</th>
							<th>Titre</th>
							<th>Date</th>
							<th>Action</th>
                            <th>Status </th>
							<?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['closeTicket'] == true) { echo '<th style="text-align: center;">Modification</th>'; } ?>
						</tr>
					</thead>
					<tbody>
					<?php $j = 0;
					while($tickets = $ticketReq->fetch()) { ?>
						<tr>
						    <?php if($tickets['ticketDisplay'] == 0 OR $tickets['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['displayTicket'] == true) {
						    if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['displayTicket'] == true) { ?>
						    <td class="align-middle">
						        <?php if($tickets['ticketDisplay'] == "0") {
						                echo '<span><i class="glyphicon glyphicon-eye-open"></i> Public</span>';
						            } else {
								        echo '<span ><i class="glyphicon glyphicon-eye-close"></i> Privé</span>';
								} ?>
							</td>
							<?php } ?>

							<td>
								<a href="index.php?&page=profil&profil=<?php echo $tickets['auteur'] ?>"><img class="icon-player-topbar" src="https://cravatar.eu/head/<?php echo $tickets['auteur']; ?>/32" /> <?php echo $tickets['auteur'] ?></a>
							</td>
						
							<td>
								<?php echo $tickets['titre'] ?>​
							</td>
						
							<td>
								<?php echo $tickets['jour']. '/' .$tickets['mois']. ' à ' .$tickets['heure']. ':' .$tickets['minute']; ?>
							</td>
						
							<td>
								<a class="btn btn-sm btn-dark" data-toggle="modal" href="#" data-target="#<?php echo $tickets['id']; ?>Slide">
									Voir <i class="ei-open-book"></i>
								</a>
							</td>
                            
                            <td>
                                <?php
                                    $ticketstatus = $tickets['etat'];
                                    if($ticketstatus == "1"){
                                        echo '<button class="btn btn-success">Résolu <span class="glyphicon glyphicon-ok"></span></button>';
                                    } else {
                                        echo '<button class="btn btn-danger">Non Résolu <span class="glyphicon glyphicon-remove"></span></button>';
                                    }
                                ?>
                            </td>

							<?php if($_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['closeTicket'] == true) { ?>
								<td>
									<form class="form-horizontal default-form" method="post" action="?&action=ticketEtat&id=<?php echo $tickets['id']; ?>">
										<?php if($tickets['etat'] == 0){ 
											echo '<button type="submit" name="etat" class="btn btn-sm btn-dark" value="1" />Fermer le ticket</button>';
										}else{
											echo '<button type="submit" name="etat" class="btn btn-sm btn-theme" value="0" />Ouvrir le ticket</button>';
										} ?>
									</form>
								</td>
							<?php }
							} ?>
						</tr>
						
					<?php if($tickets['ticketDisplay'] == "0" OR $tickets['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['displayTicket'] == true) { ?>
					<!-- Modal -->
					<div class="modal fade" id="<?php echo $tickets['id']; ?>Slide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: rgba(0, 0, 0, 0.5);margin-top: 10%;">
						<div class="modal-dialog modal-support">
							<div class="modal-content">
							
								<div class="modal-header" style="background-color: #2e71f0;">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel" style="color: white;" ><?php echo $tickets['titre']; ?></h4>
                                <?php
                                    $ticketstatus = $tickets['etat'];
                                    if($ticketstatus == "1"){
                                        echo '<div class="ribbon-wrapper-green"><div class="ribbon-green">Résolu !</div></div>';
                                    } else {
                                        echo '';
                                    }
                                ?>
								</div>
								
								<div class="modal-body">
									<p class="corp-ticket" style="text-overflow: clip; word-wrap: break-word;"><?php 
									unset($message);
									$message = espacement($tickets['message']);
									$message = BBCode($message, $bddConnection);
									echo $message; ?></p>
									<p class="text-right">Ticket de : <img src="https://cravatar.eu/avatar/<?php echo $tickets['auteur']; ?>/16" alt="none" /> <?php echo $tickets['auteur']; ?></p>
									</br>
									<hr>
									
									<?php
									$commentaires = 0;
									if(isset($ticketCommentaires[$tickets['id']]))
									{
										echo '<h3 class="ticket-commentaire-titre"><center>' .count($ticketCommentaires[$tickets['id']]). ' Commentaires</center></h3>';
										for($i = 0; $i < count($ticketCommentaires[$tickets['id']]); $i++)
										{
											$get_idComm = $bddConnection->prepare('SELECT id FROM cmw_support_commentaires WHERE auteur LIKE :auteur AND id_ticket LIKE :id_ticket');
											$get_idComm->bindParam(':auteur', $ticketCommentaires[$tickets['id']][$i]['auteur']);
											$get_idComm->bindParam(':id_ticket', $tickets['id']);
											$get_idComm->execute();
											$req_idComm = $get_idComm->fetch();
									?>
									<div class="panel panel-default">
										<div class="panel-body">
    										<div class="ticket-commentaire">
											<div class="left-ticket-commentaire">
												<span class="img-ticket-commentaire"><img src="https://cravatar.eu/head/<?php echo $ticketCommentaires[$tickets['id']][$i]['auteur']; ?>/32" alt="none" /></span>
												<span class="desc-ticket-commentaire">
													<span class="ticket-commentaire-auteur"><?php echo $ticketCommentaires[$tickets['id']][$i]['auteur']; ?></span>
													<span class="ticket-commentaire-date"><?php echo 'Le ' .$ticketCommentaires[$tickets['id']][$i]['jour']. '/' .$ticketCommentaires[$tickets['id']][$i]['mois']. ' à ' .$ticketCommentaires[$tickets['id']][$i]['heure']. ':' .$ticketCommentaires[$tickets['id']][$i]['minute']; ?></span>
													<?php if(isset($_Joueur_) && (($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['deleteMemberComm'] == true) OR ($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['editMemberComm'] == true))) { ?>
							                             <span class="dropdown" style="padding-left: 40%">
								                                <a type="button" class="btn btn-warning collapsed" data-toggle="dropdown">Action <b class="caret"></b></a>
								                                <ul class="dropdown-menu">
									                                <?php if($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['deleteMemberComm'] == true) {
										                                echo '<li><a href="?&action=delete_support_commentaire&id_comm='.$req_idComm['id'].'&id_ticket='.$tickets['id'].'&auteur='.$ticketCommentaires[$tickets['id']][$i]['auteur'].'">Supprimer</a></li>';
									                                } if($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['editMemberComm'] == true) {
									                                	echo '<li><a href="#editComm-'.$req_idComm['id'].'" data-toggle="modal" data-target="#editComm-'.$req_idComm['id'].'" >Editer</a></li>';
									                                }?>
								                                </ul>
							                             </span>
						                            <?php } ?>
												</span>
												
											</div>
											<div class="right-ticket-commentaire"><div style="text-overflow: clip; word-wrap: break-word;">
												<?php unset($message);
												$message = espacement($ticketCommentaires[$tickets['id']][$i]['message']);
												$message = BBCode($message, $bddConnection);
												echo $message;  ?></div>
											</div>
										</div>
										</div>
									</div>
									
									

									<?php
										}
									}		
									else
										echo '<h3 class="ticket-commentaire-titre">0 Commentaire</h3>';
									?>
									
									
									
								</div>
								<?php
								if($tickets['etat'] == "0"){
									echo '<form action="?&action=post_ticket_commentaire" method="post"><div class="modal-footer">
												<input type="hidden" name="id" value="'.$tickets['id'].'" /><div class="row">
												<div class="col-md-12 text-center">';
												$smileys = getDonnees($bddConnection);
												for($y = 0; $y < count($smileys['symbole']); $y++)
												{
													echo '<a href="javascript:insertAtCaret(\'ticket'.$tickets['id'].'\',\' '.$smileys['symbole'][$y].' \')"><img src="'.$smileys['image'][$y].'" alt="'.$smileys['symbole'][$y].'" title="'.$smileys['symbole'][$y].'" /></a>';
												}
												?>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="italique"><i class="fas fa-italic"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="souligné"><i class="fas fa-underline"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="barré"><i class="fas fa-strikethrough"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="aligné à gauche"><i class="fas fa-align-left"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="centré"><i class="fas fa-align-center"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="aligné à droite"><i class="fas fa-align-right"></i></a>
												<a href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="justifié"><i class="fas fa-align-justify"></i></a>
												<a href="javascript:ajout_text_complement('ticket<?=$tickets['id'];?>', 'Ecrivez ici l\'adresse de votre lien', 'https://craftmywebsite.fr/forum', 'url', 'Entrez le titre de votre lien', 'CraftMyWebsite')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
												<a href="javascript:ajout_text_complement('ticket<?=$tickets['id'];?>', 'Ecrivez ici l\'adresse de votre image', 'https://craftmywebsite.fr/img/cat6.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter)', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
												<a href="javascript:ajout_text_complement('ticket<?=$tickets['id'];?>', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
												<a href="javascript:ajout_text_complement('ticket<?=$tickets['id'];?>', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
												<div class="dropdown">
												  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												   	 <i class="fas fa-text-height"></i>
												  	</a>
													<div class="dropdown-menu" aria-labelledby="font">
												   		<a class="dropdown-item" href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
												   		<a class="dropdown-item" href="javascript:ajout_text('ticket<?=$tickets['id'];?>', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
												  	</div>
												</div>
											</div><div class="col-md-12">
												<textarea name="message" id="ticket<?=$tickets['id'];?>" class="form-control" rows="3" cols="60"></textarea>
												</br></div></div>
										  </div>
										  <button type="submit" style="margin-left: 1%;" class="btn btn-sm btn-theme">Commenter</button>
											</form>
											<?php 
								} else {
									echo '<div class="modal-footer">
											<form action="" method="post">
												<textarea style="text-align: center;"name="message" class="form-control" rows="2" placeholder="Ticket résolu ! Merci de contacter un administrateur pour réouvrir votre ticket." disabled></textarea>
											</form>
										  </div>';
								}
								?>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

					<?php if($ticketCommentaires[$tickets['id']][$i]['auteur'] == $_Joueur_['pseudo'] OR $_Joueur_['rang'] == 1 OR $_PGrades_['PermsDefault']['support']['editMemberComm'] == true) {
						for($i = 0; $i < count($ticketCommentaires[$tickets['id']]); $i++) {
							$get_idComm = $bddConnection->prepare('SELECT id FROM cmw_support_commentaires WHERE auteur LIKE :auteur AND id_ticket LIKE :id_ticket');
							$get_idComm->bindParam(':auteur', $ticketCommentaires[$tickets['id']][$i]['auteur']);
							$get_idComm->bindParam(':id_ticket', $tickets['id']);
							$get_idComm->execute();
							$req_idComm = $get_idComm->fetch(); ?>
					<div class="modal fade" id="editComm-<?php echo $req_idComm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editComm">
					    <form method="POST" action="?&action=edit_support_commentaire&id_comm=<?php echo $req_idComm['id']; ?>&id_ticket=<?php echo $tickets['id']; ?>&auteur=<?php echo $ticketCommentaires[$tickets['id']][$i]['auteur']; ?>">
				        <div class="modal-dialog modal-lg" role="document">
					        <div class="modal-content">
						        <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title text-center" id="editComm">Edition du commentaire</h4>
						        </div>
						        <div class="modal-body">
						            <div class="col-lg-12 text-center">
						            	<div class="row">
						            		<textarea name="editMessage" class="form-control" rows="3" style="resize: none;"><?php echo $ticketCommentaires[$tickets['id']][$i]['message']; ?></textarea>
						            	</div>
						            </div>
						        </div>
						        <div class="modal-footer">
						        	<div class="col-lg-12 text-center">
						        		<div class="row">
						        			<button type="submit" class="btn btn-primary">Valider !</button>
						        		</div>
						        	</div>
						        </div>
						    </div>
						</div>
						</form>
				    </div>
				    <?php }
				       }
				    }
					$j++; } ?>
					</tbody>
			</table>

	</div>
				<div class="card-footer">
				<?php
					if(!isset($_Joueur_)) 
						echo '<a data-toggle="modal" data-target="#ConnectionSlide" class="btn btn-warning btn-block" ><span class="glyphicon glyphicon-user"></span> Se connecter pour ouvrir un ticket</a>'; 
					else 
					{
				?>
				<a data-toggle="collapse" data-parent="#ticketCree" href="#ticketCree" class="btn btn-sm btn-theme"><i class="ei ei-pencil"></i> Poster un ticket !</a>
				</div>
		  </div>

				<div class="collapse" id="ticketCree">
					<div class="card">
						<form action="" method="post" onSubmit="envoie_ticket();">
							<div class="card-block">
								<div class="row">
									<div class="col-sm-8">
										<div class="form-group" style="margin-left: 2%;margin-top: 2%;">
											<label class="control-label">Sujet</label>
											<div class="form-group">
												<div class="input-group">
													<input type="text" id="titre_ticket" class="form-control" name="titre" placeholder="Sujet">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group" style="margin-right: 2%;margin-top: 2%;">
											<label for="exampleSelect1">Visibilité</label>
											<select class="form-control" id="vu_ticket" name="ticketDisplay">
												<option value="0">Publique</option>
												<option value="1">Privée</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 text-center">
									<?php 
										$smileys = getDonnees($bddConnection);
										for($i = 0; $i < count($smileys['symbole']); $i++)
										{
											echo '<a href="javascript:insertAtCaret(\'message\',\' '.$smileys['symbole'][$i].' \')"><img src="'.$smileys['image'][$i].'" alt="'.$smileys['symbole'][$i].'" title="'.$smileys['symbole'][$i].'" /></a>';
										}
									?>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en gras', 'ce texte sera en gras', 'b')" style="text-decoration: none;" title="gras"><i class="fas fa-bold" aria-hidden="true"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en italique', 'ce texte sera en italique', 'i')" style="text-decoration: none;" title="italique"><i class="fas fa-italic"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en souligné', 'ce texte sera en souligné', 'u')" style="text-decoration: none;" title="souligné"><i class="fas fa-underline"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en barré', 'ce texte sera barré', 's')" style="text-decoration: none;" title="barré"><i class="fas fa-strikethrough"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en aligné à gauche', 'ce texte sera aligné à gauche', 'left')" style="text-decoration: none" title="aligné à gauche"><i class="fas fa-align-left"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en centré', 'ce texte sera centré', 'center')" style="text-decoration: none" title="centré"><i class="fas fa-align-center"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en aligné à droite', 'ce texte sera aligné à droite', 'right')" style="text-decoration: none" title="aligné à droite"><i class="fas fa-align-right"></i></a>
									<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en justifié', 'ce texte sera justifié', 'justify')" style="text-decoration: none" title="justifié"><i class="fas fa-align-justify"></i></a>
									<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre lien', 'https://craftmywebsite.fr/forum', 'url', 'Entrez le titre de votre lien', 'CraftMyWebsite')" style="text-decoration: none" title="lien"><i class="fas fa-link"></i></a>
									<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici l\'adresse de votre image', 'https://craftmywebsite.fr/img/cat6.png', 'img', 'Entrez ici le titre de votre image (laisser vide si vous ne voulez pas compléter', 'Titre')" style="text-decoration: none" title="image"><i class="fas fa-image"></i></a>
									<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre texte en couleur', 'Ce texte sera coloré', 'color', 'Entrer le nom de la couleur en anglais ou en hexaécimal avec le  # : http://www.code-couleur.com/', 'red ou #40A497')" style="text-decoration: none" title="couleur"><i class="fas fa-font"></i></a>
									<a href="javascript:ajout_text_complement('contenue', 'Ecrivez ici votre message caché', 'contenue du spoiler', 'spoiler', 'Entrer le titre du message caché (si la case est vide le titre sera \'Spoiler\'', 'Spoiler')" style="text-decoration: none" title="spoiler"><i class="fas fa-flag"></i></a>
									<div class="dropdown">
									  	<a href="#" role="button" id="font" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									   	 <i class="fas fa-text-height"></i>
									  	</a>
										<div class="dropdown-menu" aria-labelledby="font">
									   		<a class="dropdown-item" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en taille 2', 'ce texte sera en taille 2', 'font=2')"><span style="font-size: 2em;">2</span></a>
									   		<a class="dropdown-item" href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en taille 5', 'ce texte sera en taille 5', 'font=5')"><span style="font-size: 5em;">5</span></a>
									  	</div>
									</div>
									<!--<a href="javascript:ajout_text('message', 'Ecrivez ici ce que vous voulez mettre en rouge', 'ce texte sera en rouge', 'color=red')" class="redactor_color_link" style="background-color: rgb(255, 0, 0);"></a>-->
								</div>
									<label style="margin-left: 2%;margin-top: 2%;" for="message_ticket">Description détaillée</label>
									<textarea style="width: 98%;margin-left: 1%;" class="form-control" id="message_ticket" name="message" placeholder="Description détaillée de votre problème" rows="3"></textarea>
								</div>
							</div>
							<div class="card-footer">
								<button style="margin-left: 1%;" type="submit" class="btn btn-sm btn-theme">Envoyer</button>
							</div>
						</form>
					</div>
				</div>
				<?php } ?>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>

</section></div>
<script>
var nbEnvoie = 0
	function envoie_ticket()
	{
		if(nbEnvoie>0)
			return false;
		else
		{
			var data_titre = document.getElementById("titre_ticket").value;
			var data_message = document.getElementById("message_ticket").value;
			var data_vu = document.getElementById("vu_ticket").value;
			$.ajax({
				url  : 'index.php?action=post_ticket',
				type : 'POST',
				data : 'titre=' + data_titre + '&message=' + data_message + '&ticketDisplay=' + data_vu,
				dataType: 'html'
			});
			nbEnvoie++;
			return true;
		}
	}
</script>