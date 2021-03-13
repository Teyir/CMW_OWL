<!-- Page Tittle Start -->
<section class="page-tittle page-tittle-md bg dark-overlay" style="background-image: url(<?php echo $image_entete_page; ?>)">
    <div class="container">                         
        <div class="page-tittle-head display-block text-center">
            <h2>Panier</h2>
        </div>
        <ol class="breadcrumb mrg-top-30 display-block text-center">
            <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
            <li class="breadcrumb-item active">Panier</li>
        </ol>
    </div>
</section>
<!-- Page Tittle End -->
<section class="section-1">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <h2 class="heading-1 text-center">Panier</h2>
                    <h5><center>Achetez plusieurs items en déboursant une seule fois</center></h5>
                </div>
            </div>
        </div>
        <br>
        <?php
            if(isset($_GET['success']) && $_GET['success'] == 'true')
            {
                echo ' <div class="alert alert-success"><center><strong>Votre achat a été effectué !</strong></center></div>';
            }
            ?>
        <div class="row">
                    <div class="col-md-8">
                        <div class="cart-table">
                            <table class="table">
                                <tbody>
                                	<?php $nbArticles = $_Panier_->compterArticle();
                                    $precedent = 0;
                                	if($nbArticles == 0 )
                                		echo '<tr><td colspan="6"><center>Votre panier est vide :\'( </center></td></tr>';
                                	else
                                	{
                    	            	for($i = 0; $i < $nbArticles; $i++)
                    	            	{
                    	            		?>
                    	            		<tr>
                                                <?php $_Panier_->infosArticle(htmlspecialchars($_SESSION['panier']['id'][$i]), $nom, $infos);?>
                                                <td class="product-img"><?php echo $infos; ?></td>
                    		                    <td class="product-info"><?php echo $nom; ?></td>
                    		                    <td><?php echo htmlspecialchars($_SESSION['panier']['quantite'][$i]); ?></td>
                    		                    <td><?php echo htmlspecialchars($_SESSION['panier']['prix'][$i]); ?> <i class="ei ei-money-2"></i></td>
                    		                    <td class="w-25 text-center"><?php $precedent = htmlspecialchars($_SESSION['panier']['prix'][$i])*htmlspecialchars($_SESSION['panier']['quantite'][$i]);
                            echo $precedent; ?> <i class="ei ei-money-2"></i></td>
                                                <td><a href="?action=supprItemPanier&id=<?php echo htmlspecialchars($_SESSION['panier']['id'][$i]); ?>" class="btn icon-btn-md btn-white hover-dribble icon-btn-round mrg-right-5 lh-1 link" title="supprimer l'item du panier"><i class="ei ei-close"></i></a></td>
                    		                </tr>
                    		               <?php
                    		            } 
                    		        }
                    		        ?>
                                </tbody>
                            </table>
                    </div>
            </div>

                     <div class="col-md-4">

                        <div class="card pdd-horizon-30 pdd-vertical-25 mrg-top-30">
                            <div class="border bottom">
                                <h3 class="mrg-btm-30">Summary</h3>
                                <p>Sous-Total: <span class="pull-right"><?php $precedent += htmlspecialchars($_SESSION['panier']['prix'][$i])*htmlspecialchars($_SESSION['panier']['quantite'][$i]);
                            echo $precedent; ?> <i class="ei ei-money-2"></i></span></p>
                                <p class="mrg-top-20">Réduction: <span class="pull-right"><?php if(!empty($_SESSION['panier']['reduction']))
                    {
                        echo '- '.$_SESSION['panier']['reduction']*100 .'% <a href="?action=retirerReduction" class="btn icon-btn-md btn-white hover-dribble icon-btn-round mrg-right-5 lh-1 link" title="supprimer la réduction"><i class="ei ei-close"></i></a>';
                    } else { echo "Pas de code";}
                ?></span></p>
                            </div>
                            <form class="form-inline" action="?action=ajouterCode" method="POST">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="codepromo" name="codepromo" placeholder="Code promo" style="border:0px;">
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark" style="border:0px;">Envoyer</button>
                            </form>
                            <p class="mrg-top-20">Total: <span class="pull-right text-dark font-size-18"><b><?php echo number_format($_Panier_->montantGlobal(), 0, ',', ' '); ?> <i class="ei ei-money-2"></i></b></span></p>
                            <div class="text-center mrg-top-30">
                                <a class="btn btn-dark btn-block" href="?action=achat">Payer</a>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
</div>