     <!-- Footer Start -->
    <section class="footer-default footer-reveal">
        <div class="footer-reveal-wrapper">
            <div class="container">
                <div class="row mrg-btm-30">
                    <div class="col-md-3">
                        <div class="widget widget-about">
                            <img class="img-responsive" src="<?php echo $logo_footer; ?>" alt="">
                            <p class="mrg-top-30"><?php echo $description_footer; ?></p>
                        </div><!-- /widget-about -->
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="widget widget-link">
                            <h3 class="widget-tittle">Liens Utiles</h3>
                            <div class="row mrg-btm-30">
                                <div class="col-md-6">
                                    <ul class="link">
                                        <li><a href="index.php">Accueil</a></li>
                                        <li><a href="?page=boutique">Boutique</a></li>
                                        <li><a href="?page=support">Support</a></li>
                                        <li><a href="?page=forum">Forum</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="widget widget-news">
                            <h3 class="widget-tittle">Notre Discord</h3>
                            <iframe src="https://discordapp.com/widget?id=<?php echo $id_serveur_discord; ?>&theme=dark" width="350" height="250" allowtransparency="true" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">


                    <span class="copyright"><img class="pdd-right-10" src="<?php echo $logo_copyright; ?>" alt="logo"> Copyright ?? <?php echo date('Y');?> <?php echo $_Serveur_['General']['name']; ?>. Site r??alis?? avec <a href="http://craftmywebsite.fr" target="_blank">CraftMyWebsite.fr.</a> Th??me r??alis?? avec <i class="ei ei-heart-full" aria-hidden="true"></i> par BLX et repris par <a href="https://teyir.fr" target="_blank">Teyir</a></span>
                    <ul class="social-btn pull-right mrg-top-5">
                        <?php if(!empty($facebook)) { ?><li><a href="<?php echo $facebook; ?>" target="_blank" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-facebook"></i></a></li><?php } else {} ?>
                        <?php if(!empty($twitter)) { ?><li><a href="<?php echo $twitter; ?>" target="_blank" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-twitter"></i></a></li><?php } else {} ?>
                        <?php if(!empty($youtube)) { ?><li><a href="<?php echo $youtube; ?>" target="_blank" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-youtube"></i></a></li><?php } else {} ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->