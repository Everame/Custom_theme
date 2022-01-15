<?php
    get_header('short');
    /* Template Name: pricing */
?>
<section class="pricingSec">
    <div class="container align-items-center easyText">
            <h1 class="easyTitle">Choose your plan</h1>
        </div>
    <div class="container buyPlans">
        <?php
            $plans_posts = get_posts( array(
                'numberposts' => 0,
                'order'       => 'ASC',
                'post_type'   => 'products_plans',
                'suppress_filters' => true // подавление работы фильтров изменения SQL запроса
            ) );

            $published_posts = wp_count_posts('products_plans')->publish;

            if($published_posts > 0){
                foreach( $plans_posts as $post ){
            ?>
            <div class="planContainer">
                <div class="imgPlan">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="planContent">
                    <span class="titlePlan">
                        <?php the_title(); ?>
                    </span>
                    <?php the_content(); ?>
                </div>
                <a href="<?php echo get_theme_file_uri();?>/products/Free Programm.txt" class="linkBtn" id="freeProg" download>
                    <div class="btnContainer">
                        <span class="buyBtn">Buy <span><?php echo get_post_meta( $post->ID, "price_of_plan", true ) ?></span></span>
                    </div>
                </a>
            </div>
            <?php
                }
            }else{
        ?>
        <div class="planContainer">
            <div class="imgPlan">
                <img src="<?php echo get_theme_file_uri();?>/assets/img/freePlan.jpg" alt="Free plan">
            </div>
            <div class="planContent">
                <span class="titlePlan">
                    Free
                </span>
                <p>
                    A complete package of data required to demonstrate the capabilities of the program.
                </p>
                <p>
                    Limited access to all functions and features.
                </p>
            </div>
            <a href="<?php echo get_theme_file_uri();?>/products/Free Programm.txt" class="linkBtn" id="freeProg" download>
                <div class="btnContainer">
                    <span class="buyBtn">Buy <span>Free</span></span>
                </div>
            </a>
        </div>
        <div class="planContainer">
            <div class="imgPlan">
                <img src="<?php echo get_theme_file_uri();?>/assets/img/professionalPlan.jpg" alt="Professional plan">
            </div>
            <div class="planContent">
                <span class="titlePlan">
                    Professional
                </span>
                <p>
                    A complete package of data required to demonstrate the capabilities of the program.
                </p>
                <p>
                    Access to all functions and features
                </p>
                <p>
                    A business user has access to a self-service portal and the ability to use a catalog of services, a knowledge base, as well as, among other things, create, update and confirm requests
                </p>
                <p>
                    A user with administrator rights has access to ITSM, ITAM and SM SMAX modules, applications, functions and S MAX Studio to create applications in accordance with the conditions and requirements of the company's business processes
                </p>
            </div>
            <a href="#" class="linkBtn" id="paidProg">
                <div class="btnContainer">
                    <span class="buyBtn">Buy <span>for 10$</span> </span>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</section>
<div class="bgDark">
        <div class="modal freeModal">
            <div class="modalContent">
                <p>
                    Thank you for download our product! We will happy, if you are wrote comments about us =)
                </p>
                <a href="#" class='btn-blue freeClose'>OK</a>
            </div>
            <div class="circleClose freeClose">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="modal buyModal">
            <div class="buyModalContent">
            <p class="successMessage">
                Thank you for buy our product! It's help do our work better. We will happy, if you are wrote comments about us =)
            </p>
            <p class="buyDescr">
                Specify the details of your card and mail, where the link to download the application will come
            </p>
            <form method="post" id="buyForm">
                <input type="text" name="dataCard" class="formInput res" placeholder="Enter the card number">
                <input type="text" name="mail"  class="formInput res" id="mail" placeholder="Enter the email">
                <span class="error_inputForm">Oops! Something went wrong, fix the errors and try again ;)</span>
                <span class="error_notSended">Message not be sended! May be you are have some problem with internet connection...</span>
                <small>
                    **Do not enter the data of a real card! The modal window is made only in order to create the appearance of payment, the message will come to the mail in any case**
                </small>
                <button type="submit" class="formBtn" id="buyBtn">OK</button>
            </form>
        </div>
        <div class="circleClose paidClose">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
</div>
<?php
    get_footer();
?>