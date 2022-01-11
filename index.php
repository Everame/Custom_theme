<?php
    get_header();
?>
<section class="easyUsefull container-fluid" id="home">
        <div class="container align-items-center easyText">
            <h1 class="easyTitle">Easy & Useful</h1>
            <h4 class="easyh4">Project Management Tool</h4>
            <span class="easyDescr">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</br> nostrud 
            </span>
        </div>
        <div class="container cards-block">
            <?php
                $my_posts = get_posts( array(
                    'numberposts' => 3,
                    'category'    => 3,
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true // подавление работы фильтров изменения SQL запроса
                ) );

                $adventeges_count = get_category(3)->category_count;

                if($adventeges_count > 0){
                    foreach( $my_posts as $post ){
                        ?>
                        <div class="card col">
                            <?php the_post_thumbnail();?>
                            <h6 class="cardTitle"><?php the_title() ?></h6>
                            <span class="cardDescr"><?php the_content(); ?></span>
                        </div>
                        <?php
                    }
                }else{
            ?>
                <div class="card col">
                    <img src="<?php echo get_theme_file_uri();?>/assets/img/calendar.png" alt="avatar" class="avatar">
                    <h6 class="cardTitle">Title Goes Here</h6>
                    <span class="cardDescr">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua.</span>
                </div>
                <div class="card col">
                    <img src="<?php echo get_theme_file_uri();?>/assets/img/human.png" alt="avatar" class="avatar">
                    <h6 class="cardTitle">Title Goes Here</h6>
                    <span class="cardDescr">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua.</span>
                </div>
                <div class="card col">
                    <img src="<?php echo get_theme_file_uri();?>/assets/img/builder.png" alt="avatar" class="avatar">
                    <h6 class="cardTitle">Title Goes Here</h6>
                    <span class="cardDescr">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua.</span>
                </div>
            <?php } ?>
        </div>
        <div class="container btn-block">
            <a href="/pricing" class="btn-green">Get Started</a>
        </div>
    </section>
    <img src="<?php echo get_theme_file_uri();?>/assets/img/counts.png" alt="counts" class="counts">
    <section class="services container-fluid" id="services">
        <div class="container align-items-center easyText">
            <h1 class="easyTitle">Services</h1>
            <span class="easyDescr">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</br> incididunt ut labore et dolore magna
            </span>
        </div>
        <?php
                $services_posts = get_posts( array(
                    'numberposts' => 0,
                    'category'    => 4,
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true // подавление работы фильтров изменения SQL запроса
                ) );

                $services_count = get_category(4)->category_count;

                if($services_count > 0){
                    foreach( $services_posts as $post ){
                        ?>
                        <div class="container statistics selector">
                            <div class="btn-title" style="color:black">
                                <div class="left_content">
                                    <div class="i_container">
                                        <?php the_post_thumbnail( 'serviceThumb'); ?>
                                    </div>
                                    <span class="title-text uppercase"><?php the_title(); ?></span>
                                </div>
                                <span class="i_caretd">
                                    <i class="fas fa-caret-down stat"></i>
                                </span>
                            </div>
                            <div class="btn-descr statist" id="statist">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php
                    }
                }else{
            ?>
                <div class="container statistics selector">
                    <div class="btn-title" style="color:black">
                        <div class="left_content">
                            <div class="i_container">
                                <img src="<?php echo get_theme_file_uri();?>/assets/icons/rise.svg" alt="line_up" class="i_line">
                            </div>
                            <span class="title-text uppercase">Statistics</span>
                        </div>
                        <span class="i_caretd">
                                <i class="fas fa-caret-down stat"></i>
                            </span>
                    </div>
                    <div class="btn-descr statist">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/stat-pic.png" alt="picture" class="picture">
                        <div class="textPage">
                            <span class="parag-1 container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span>
                            <span class="parag-2 container">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </span>
                        </div>
                    </div>
                </div>
                <div class="container inbox selector">
                    <div class="btn-title" style="color:black">
                        <div class="left_content">
                            <div class="i_container">
                                <i class="fas fa-envelope i_font"></i>
                            </div>
                            <span class="title-text uppercase">Inbox</span>
                        </div>
                        <span class="i_caretd">
                                <i class="fas fa-caret-down stat"></i>
                            </span>
                    </div>
                    <div class="btn-descr statist">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/stat-pic.png" alt="picture" class="picture">
                        <div class="textPage">
                            <span class="parag-1 container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span>
                            <span class="parag-2 container">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </span>
                        </div>
                    </div>
                </div>
                <div class="container team selector">
                    <div class="btn-title" style="color:black">
                        <div class="left_content">
                            <div class="i_container">
                                <i class="fas fa-users i_font"></i>
                            </div>
                            <span class="title-text uppercase">Team</span>
                        </div>
                        <span class="i_caretd">
                                <i class="fas fa-caret-down stat"></i>
                            </span>
                    </div>
                    <div class="btn-descr statist">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/stat-pic.png" alt="picture" class="picture">
                        <div class="textPage">
                            <span class="parag-1 container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span>
                            <span class="parag-2 container">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </span>
                        </div>
                    </div>
                </div>
                <div class="container settings selector">
                    <div class="btn-title" style="color:black">
                        <div class="left_content">
                            <div class="i_container">
                                <i class="fas fa-cog i_font"></i>
                            </div>
                            <span class="title-text uppercase">Settings</span>
                        </div>
                        <span class="i_caretd">
                                <i class="fas fa-caret-down stat"></i>
                            </span>
                    </div>
                    <div class="btn-descr statist">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/stat-pic.png" alt="picture" class="picture">
                        <div class="textPage">
                            <span class="parag-1 container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span>
                            <span class="parag-2 container">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </span>
                        </div>
                    </div>
                </div>
                <div class="container feed selector">
                    <div class="btn-title" style="color:black">
                        <div class="left_content">
                            <div class="i_container">
                                <i class="fas fa-rss i_font"></i>
                            </div>
                            <span class="title-text uppercase">Feed</span>
                        </div>
                        <span class="i_caretd">
                            <i class="fas fa-caret-down stat"></i>
                        </span>
                    </div>
                    <div class="btn-descr statist">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/stat-pic.png" alt="picture" class="picture">
                        <div class="textPage">
                            <span class="parag-1 container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span>
                            <span class="parag-2 container">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </section>
    <section class="testimonials" style="background-image: url('<?php echo get_theme_file_uri();?>/assets/img/Testimontials-bg.png');" id="comments">
        <div class="container testiContent">
            <div class="testiText">
                <div class="testiMediaBlock">
                    <h1 class="testiTitle">What our customers have to say about us.</h1>
                    <span class="testiDescr">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna</span>
                </div>
                <a href="#" class="btn-blue uppercase w170 semiBold">Get Started</a>
            </div>
            <div class="testiSlider">
                <div class="wrapper">
                    <div class="slider-container">
                        <div class="slider-track">
                            <?php
                                $comments_posts = get_posts( array(
                                    'numberposts' => 0,
                                    'category'    => 5,
                                    'order'       => 'ASC',
                                    'post_type'   => 'post',
                                    'suppress_filters' => true // подавление работы фильтров изменения SQL запроса
                                ) );

                                $comments_count = get_category(5)->category_count;

                                if($comments_count > 0){
                                    foreach( $comments_posts as $post ){
                                        ?>
                                        <div class="slider-item">
                                            <div class="slider-avatar">
                                                <?php the_post_thumbnail( 'commentsThumb'); ?>
                                            </div>
                                            <div class="personCard">
                                                <span class="name"><?php the_title(); ?></span>
                                                <span class="statement"><?php the_content(); ?></span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                            ?>
                                    <div class="slider-item">
                                        <div class="slider-avatar">
                                            <img src="<?php echo get_theme_file_uri();?>/assets/img/Avatar_Joe.png" alt="avatar">
                                        </div>
                                        <div class="personCard">
                                            <span class="name">John Doe</span>
                                            <span class="statement">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</span>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="slider-avatar">
                                            <img src="<?php echo get_theme_file_uri();?>/assets/img/Khalessi.png" alt="avatar">
                                        </div>
                                        <div class="personCard">
                                            <span class="name">Khalessi</span>
                                            <span class="statement">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</span>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="slider-avatar">
                                            <img src="<?php echo get_theme_file_uri();?>/assets/img/Avatar_Joe.png" alt="avatar">
                                        </div>
                                        <div class="personCard">
                                            <span class="name">John Doe</span>
                                            <span class="statement">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</span>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="slider-avatar">
                                            <img src="<?php echo get_theme_file_uri();?>/assets/img/Khalessi.png" alt="avatar">
                                        </div>
                                        <div class="personCard">
                                            <span class="name">Khalessi</span>
                                            <span class="statement">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</span>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="slider-avatar">
                                            <img src="<?php echo get_theme_file_uri();?>/assets/img/Avatar_Joe.png" alt="avatar">
                                        </div>
                                        <div class="personCard">
                                            <span class="name">John Doe</span>
                                            <span class="statement">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</span>
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                        <div class="slider-btns">
                            <span class="nextItem">
                                <i class="fa fa-chevron-up next" aria-hidden="true"></i>
                            </span>
                            <span class="prevItem">
                                <i class="fa fa-chevron-down prev" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="teamSection">
        <div class="container align-items-center previewText">
            <h1 class="previewTitle">Our Team</h1>
            <span class="previewDescr">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</br> incididunt labore et dolore magna</span>
        </div>
        <div class="wrapper-avatars">
            <div class="slider-avatars">
                <div class="slider-track-avatars">
                <?php
                    $team_posts = get_posts( array(
                        'numberposts' => 0,
                        'category'    => 6,
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true // подавление работы фильтров изменения SQL запроса
                    ) );

                    $team_count = get_category(6)->category_count;
                    $current_numb = 0;

                    if($team_count > 0){
                        foreach( $team_posts as $post ){
                            $current_numb = $current_numb + 1;
                            ?>
                            <div class="slider-item-avatar-<?php echo $current_numb ?> item-avatar">
                                <?php the_post_thumbnail( 'teamThumb'); ?>
                            </div>
                            <?php
                        }
                    }else{
                ?>
                    <div class="slider-item-avatar-1 item-avatar">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/Jessica.png" alt="avatar">
                    </div>
                    <div class="slider-item-avatar-2 item-avatar">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/Sonya.png" alt="avatar">
                    </div>
                    <div class="slider-item-avatar-3 item-avatar">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/Jack.png" alt="avatar">
                    </div>
                    <div class="slider-item-avatar-4 item-avatar">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/Statham.png" alt="avatar">
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="controls-btns">
                <div class="whiteArea">
                    <div class="avatarPrev"></div>
                </div>
                <div class="avatarActive"></div>
                <div class="whiteArea">
                    <div class="avatarNext"></div>
                </div>
            </div>
        </div>
        <div class="wrapper-text">
            <div class="slider-text">
                <div class="slider-track-text">
                <?php
                    if($team_count > 0){
                        foreach( $team_posts as $post ){
                            ?>
                            <div class="slider-item-text-<?php echo $current_numb ?> item-text">
                                <h4 class="workerName"><?php the_title(); ?></h4>
                                <span class="workerDescr"><?php the_content(); ?></span>
                            </div>
                            <?php
                        }
                    }else{
                ?>
                    <div class="slider-item-text-1 item-text">
                        <h4 class="workerName">Jessica Tomson</h4>
                        <span class="workerDescr">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                            <div class="media-row">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </span>
                        
                    </div>
                    <div class="slider-item-text-2 item-text">
                        <h4 class="workerName">Sophie Turner</h4>
                        <span class="workerDescr">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                            <div class="media-row">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </span>
                    </div>
                    <div class="slider-item-text-3 item-text">
                        <h4 class="workerName">Jack Darrison</h4>
                        <span class="workerDescr">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                            <div class="media-row">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </span>
                    </div>
                    <div class="slider-item-text-4 item-text">
                        <h4 class="workerName">Jaison Statham</h4>
                        <span class="workerDescr">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                            <div class="media-row">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </span>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="contactUs" id="contacts">
        <div class="container align-items-center previewText">
            <h1 class="previewTitle">Contact Us</h1>
            <span class="previewDescrHelp">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</br> incididunt labore et dolore magna</span>
        </div>
        <div class="form conatainer">
            <form method="POST" name="form" id="formBody">
                <div class="formItem">
                    <input type="text" name="fName" id="formName" class="formInput req" placeholder="First Name">
                    <input type="text" name="lastName" id="formLast" class="formInput req" placeholder="Last Name">
                </div>
                <div class="formItem">
                    <input type="text" name="email" id="formEmail" class="formInput req" placeholder="Email">
                    <input type="text" name="phone" id="formPhone" class="formInput req" placeholder="Phone">
                </div>
                <div class="formItem">
                    <textarea name="message" id="formMessage" class="formInputMessage req" placeholder="Message"></textarea>
                </div>
                <div class="formItem">
                    <span class="error_inputForm">Oops! Something went wrong, fix the errors and try again ;)</span>
                </div>
                <div class="formItem">
                    <span class="error_notSended">Message not be sended! May be you are have some problem with internet connection...</span>
                </div>
                <div class="formItem">
                    <div class="agreement">
                        <input checked type="checkbox" name="checkbox" id="formCheckbox" class="formInputCh">
                        <label for="formCheckbox" class="agreementText ">subscribe to the newsletter</label>
                    </div>
                    <button type="submit" name="send" value="click" id="submitBtn" class="uppercase formBtn">SEND</button>
                </div>
                <div class="formItem">
                    <span class="success_message">Your message has been sent successfully!</span>
                </div>
            </form>
        </div>
    </section>
    <div class="comeToUp">
        <i class="fa fa-chevron-up up" aria-hidden="true"></i>
    </div>
<?php
    get_footer();
?>

