<section class="section-1" id="page">
    <div class="container">
    <?php if($pages['titre'] == "" && $pageContenu[$j][0] == ""){ ?>
     <!-- Hero Start -->
        <section id="hero">
            <div class="fs-hero hero-img ">
                <div class="hero-caption center">
                    <div class="cliping-text">
                        <h1 class="font-size-200">404</h1>
                    </div>
                    <h3 class="font-primary mrg-btm-50">Oups ! Désolé mais la page demandé est introuvable ! :( </h3>
                    <div>
                        <a href="index.php" class="btn btn-md btn-dark">Retourner à l'accueil</a>
                    </div>
                </div>
            </div><!-- /hero-img -->
        </section>
        <!-- Hero End -->

    <?php } else { ?>
    <?php } ?>
    		<h1 class="titre"><?php echo $pages['titre']; ?></h1>
    			<?php for($j = 0; $j < count($pages['tableauPages']); $j++) { ?>
    				<h3><?php echo $pageContenu[$j][0]; ?></h3>
    				<div><?php echo $pageContenu[$j][1]; ?></div>		
    			<?php } ?>
    </div>
</section></div>