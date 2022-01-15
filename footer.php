<footer>
        <div class="container">
            <div class="row  footerHead">
                <a href="<?php echo home_url(); ?>" class="brandlink">
                    <div class="brand">
                        <img class="footerLogo" src="<?php echo get_theme_file_uri();?>/assets/img/Logo.png" alt="Logo">
                        <div class="companyTitle">
                            <span class="light">Dart</span>
                            <span class="bold uppercase">Service manager</span>
                        </div>
                    </div>
                </a>

                <?php wp_nav_menu([
                    'theme_location'  => 'primaryMenu',
                    'menu'            => 'topMenu',
                    'container'       => NULL,
                    'menu_class'      => 'footerNav',
                    'menu_id'         => 'navMenu'
                ]); ?>

                <div class="burgSelector">
                    <i class="fa fa-bars bars" aria-hidden="true"></i>
                    <?php wp_nav_menu([
                        'theme_location'  => 'primaryMenu',
                        'menu'            => 'topMenu',
                        'container'       => NULL,
                        'menu_class'      => 'footNavItems navCheck',
                        'menu_id'         => 'navMenu'
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row  media-links">
                <ul class="ourLinks">
                    <li><a href=#>Privacy policy</a></li>
                    <li><a href=#>About us</a></li>
                    <li><a href=#>About us</a></li>
                </ul>

                <div class="media-row">
                    <a href="https://vk.com/i.tarasov1920"><i class="fab fa-twitter"></i></a>
                    <a href="https://github.com/Everame"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/Everame"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://vk.com/i.tarasov1920"><i class="fab fa-dribbble"></i></a>
                    <a href="https://vk.com/i.tarasov1920"><i class="fab fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="<?php echo get_theme_file_uri();?>/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_theme_file_uri();?>/js/index.js"></script>
<script src="<?php echo get_theme_file_uri();?>/js/worker-slider.js"></script>


</html>