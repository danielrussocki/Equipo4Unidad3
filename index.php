<?php
require_once("backend/includes/_db.php");
global $mysqli;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <link rel="stylesheet" href="css/jquery-multitabs.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
</head>

<body>
    <header class="header-principal">
            <nav class="nav-header">
                <ul>
                    <li class="active"><a href="#home">Home</a></li>
                    <li><a href="#whatwedo">What we do?</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contactUs">Contact us</a></li>
                </ul>
                <a href="#" class="logo">Switch</a>
                <div class="d-form">
                    <form class="search-right">
                        <input type="text" placeholder="Search...">
                        <button type="submit"><img src="img/lupa.png" alt="search-btn" class="search-img"></button>
                    </form>
                </div>
                <div class="more">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
    </header>
    <?php
    $consulta_main_principal = "SELECT * FROM header LIMIT 1";
    $resp_consulta_main = $mysqli->query($consulta_main_principal);
    while($fila_consulta_main = mysqli_fetch_array($resp_consulta_main)){
    ?>
    <main id="home" class="principal" style="background:url('<?php echo $fila_consulta_main['header_background'];?>') no repeat;">
        <!-- <h1 class="h1-main">Art is eternal happiness</h1> -->
        <h1 class="h1-main"><?php echo $fila_consulta_main['header_title'];?></h1>
        <!-- <button class="mybtn">Work with us</button> -->
        <button class="mybtn" role="link" onclick="window.location='<?php echo $fila_consulta_main['header_href'];?>'"><?php echo $fila_consulta_main['header_button'];?></button>
        <button class="scroll-down">Scroll Down<i class="fas fa-arrow-down"></i></button>
    </main>
    <?php   
        }
    ?>
    <!-- WHAT WE DO -->
    <section class="whatwedo" id="whatwedo">
            <div class="section-what-we-do">
             <div class="container container-centered">
               <h2 id="what-we-do" class="section-title">What we do</h2>
               <!-- <hr class="linea"> -->
               <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor aliquet.</p>
               <div class="lorem">
                 <div class="lorem-logo lorem-camera"></div>
                 <h3>Lorem Ipsum</h3>
                 <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
                 <a class="learn_more" href="#">Learn more</a>
               </div>
               <div class="lorem">
                 <div class="lorem-logo lorem-speed"></div>
                 <h3>Lorem Ipsum</h3>
                 <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
                 <a class="learn_more" href="#">Learn more</a>
               </div>
               <div class="lorem">
                 <div class="lorem-logo lorem-case"></div>
                 <h3>Lorem Ipsum</h3>
                 <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
                 <a class="learn_more" href="#">Learn more</a>
               </div>
             </div>
            </div>
          </section>
    <!--OUR LATEST WORKS-->
    <div class="section-our-latest-works">
        <div class="container container-centered">
            <h2 class="section-title-green">Our latest work</h2>
            <!-- <hr class="line"> -->
            <p class="section-description-green">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor aliquet.</p>
            <div class="tab2">
                <div data-child="false" class="tab__header">
                    <div class="tab__header-1 tab__header--active">Photography</div>
                    <div class="tab__header-2">Design</div>
                    <div class="tab__header-3">Print</div>
                </div>

                <div class=" tab__content">
                    <div class="tab__content-1 tab__content--active">
                        <img src="img/works/work-1.png" alt="Trees">
                        <img src="img/works/work-2.png" alt="Computer">
                        <img src="img/works/work-3.png" alt="Cake">
                        <img src="img/works/work-4.png" alt="Cat">
                        <img src="img/works/work-5.png" alt="Code">
                        <img src="img/works/work-6.png" alt="Work">
                        <img src="img/works/work-7.png" alt="Yummy">
                        <img src="img/works/work-8.png" alt="Grey">
                        <img src="img/works/work-9.png" alt="Bedronka">
                        <img src="img/works/work-10.png" alt="Green">
                    </div>
                    <div class="tab__content-2 ">
                        <img src="img/works/work-1.png" alt="Trees">
                        <img src="img/works/work-2.png" alt="Computer">
                        <img src="img/works/work-3.png" alt="Cake">
                        <img src="img/works/work-4.png" alt="Cat">
                        <img src="img/works/work-6.png" alt="Work">
                        <img src="img/works/work-7.png" alt="Yummy">
                        <img src="img/works/work-8.png" alt="Grey">
                        <img src="img/works/work-9.png" alt="Bedronka">
                        <img src="img/works/work-10.png" alt="Green">
                    </div>
                    <div class="tab__content-3">
                        <img src="img/works/work-1.png" alt="Trees">
                        <!-- <img src="img/works/work-2.png" alt="Computer"> -->
                        <img src="img/works/work-3.png" alt="Cake">
                        <img src="img/works/work-4.png" alt="Cat">
                        <!-- <img src="img/works/work-5.png" alt="Code"> -->
                        <img src="img/works/work-6.png" alt="Work">
                        <img src="img/works/work-7.png" alt="Yummy">
                        <img src="img/works/work-8.png" alt="Grey">
                        <img src="img/works/work-9.png" alt="Bedronka">
                        <img src="img/works/work-10.png" alt="Green">
                    </div>
                </div>
            </div>
            <a class="view-more" href="#">View more work <img src="img/view-more-bg.png" alt="view-more"></a>
        </div>
    </div>

    <!---------------------->

    <!---TESTIMONIALS-->

    <div class="lSSlideOuter section-testimonials" id="testimonials">
        <div class="lSSlideWrapper usingCss container container-centered">
            <h2 class="section-title">Testimonials</h2>
            <ul id="responsive" class="gallery content-slider list-unstyled clearfix lightSlider lsGrab lSSlide"
                style="width: 2463.33px; height: 165px; padding-bottom: 0%; transform: translate3d(0px, 0px, 0px);">
                <li class="lslide active" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->
                    <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor
                        aliquet.</p>

                    <p class="testimonials-quotes">“Awalnya saya tidak menderita penyakit apapun,</br>
                        namun setelah saya tidak berobat ke klinik tongfang, saya dinyatakan</br>
                        tidak menderita penyakit apapun!”</p>

                    <div class="testimonials-client">
                        <img src="img/Herp.png" alt="Herp">
                        <p class="testimonials-client-name">Mr. Herp</p>
                        <p class="testimonials-client-company">CEO of Meme, Inc.</p>

                </li>
                <li class="lslide" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->
                    <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor
                        aliquet.</p>

                    <p class="testimonials-quotes">“Awalnya saya tidak menderita penyakit apapun,</br>
                        namun setelah saya tidak berobat ke klinik tongfang, saya dinyatakan</br>
                        tidak menderita penyakit apapun!”</p>

                    <div class="testimonials-client">
                        <img src="img/Herp.png" alt="Herp">
                        <p class="testimonials-client-name">Mr. Herp</p>
                        <p class="testimonials-client-company">CEO of Meme, Inc.</p>
                </li>
                <li class="lslide" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->
                    <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor
                        aliquet.</p>

                    <p class="testimonials-quotes">“Awalnya saya tidak menderita penyakit apapun,</br>
                        namun setelah saya tidak berobat ke klinik tongfang, saya dinyatakan</br>
                        tidak menderita penyakit apapun!”</p>

                    <div class="testimonials-client">
                        <img src="img/Herp.png" alt="Herp">
                        <p class="testimonials-client-name">Mr. Herp</p>
                        <p class="testimonials-client-company">CEO of Meme, Inc.</p>
                </li>
                <li class="lslide" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->
                    <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor
                        aliquet.</p>

                    <p class="testimonials-quotes">“Awalnya saya tidak menderita penyakit apapun,</br>
                        namun setelah saya tidak berobat ke klinik tongfang, saya dinyatakan</br>
                        tidak menderita penyakit apapun!”</p>

                    <div class="testimonials-client">
                        <img src="img/Herp.png" alt="Herp">
                        <p class="testimonials-client-name">Mr. Herp</p>
                        <p class="testimonials-client-company">CEO of Meme, Inc.</p>
                </li>
            </ul>
        </div>
    </div>
    <!-------------------------->

    <!--HAAPPY CLIENTS-->
    <div class="section-happy-clients" id="happyClients">
        <div class="container container-centered">
            <h2 class="section-title">Our happy client</h2>
            <!-- <hr class="line"> -->
            <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor aliquet.</p>
        </div>
        <div class="happy-clients-images">
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/Google-logo.png" alt="Google">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/Yahoo_Logo.png" alt="Yahoo">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/MSFT_logo.png" alt="Microsoft">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/Intel-logo.png" alt="Intel">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/qualcomm-logo.png" alt="Qualcomm">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/cisco-logo.png" alt="Cisco">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/Apple-logo.png" alt="Apple">
            </div>
            <div class="happy-clients-wrap">
                <img src="img/logo-clients/ASUS_Logo.png" alt="ASUS">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="img/logo-clients/sega_logo.png" alt="SEGA">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="img/logo-clients/3bar_logo.png" alt="3bar">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="img/logo-clients/amazon_logo.png" alt="Amazon">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="img/logo-clients/abanlex.png" alt="Abanlex">
            </div>
        </div>
        <a class="all-clients" id="allClients">See all clients</a>
    </div>
    <!-- MEET THE TEAM -->
    <div class="section-team">
            <div class="container container-centered">
              <h2 class="section-title-green">Meet the team</h2>
              <!-- <hr class="line"> -->
              <p class="section-description-green">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor aliquet.</p>
              <div class="team-people">
                <div class="team-people-wrap">
                  <img src="img/E1.png" alt="first">
                  <div class="vertical-line"></div>
                  <h2 class="team-names">Krisna Wijaya</h2>
                  <div class="team-icons">
                    <img src="img/ball.png" alt="ball">
                    <img src="img/be.png" alt="bе">
                    <img src="img/twitter.png" alt="twitter">
                  </div>
                </div>
                <div class="team-people-wrap">
                   <img src="img/E2.png" alt="second">
                   <div class="vertical-line"></div>
                   <h2 class="team-names">Gabriel Yoshua</h2>
                   <div class="team-icons">
                     <img src="img/ball.png" alt="ball">
                     <img src="img/be.png" alt="bе">
                     <img src="img/twitter.png" alt="twitter">
                   </div>
                </div>
                <div class="team-people-wrap">
                   <img src="img/E3.png" alt="third">
                   <div class="vertical-line"></div>
                   <h2 class="team-names">Adik N.K.L</h2>
                   <div class="team-icons">
                     <img src="img/ball.png" alt="ball">
                     <img src="img/be.png" alt="bе">
                     <img src="img/twitter.png" alt="twitter">
                   </div>
                </div>
                <div class="team-people-wrap">
                   <img src="img/E4.png" alt="fourth">
                   <div class="vertical-line"></div>
                   <h2 class="team-names">Zan D.J</h2>
                   <div class="team-icons">
                     <img src="img/ball.png" alt="ball">
                     <img src="img/be.png" alt="bе">
                     <img src="img/twitter.png" alt="twitter">
                   </div>
                </div>
                <div class="team-people-wrap">
                   <img src="img/E5.png" alt="fifth">
                   <div class="vertical-line"></div>
                   <h2 class="team-names">Faizal Febri</h2>
                   <div class="team-icons">
                     <img src="img/ball.png" alt="ball">
                     <img src="img/be.png" alt="bе">
                     <img src="img/twitter.png" alt="twitter">
                   </div>
                </div>
              </div>
            </div>
          </div>
          <div class="work-with-us-bg">
            <button class="work-with-us">Work with us</button>
          </div>
    <!--------------------->
    <section class="footer-1" id="contactUs">
        <?php
        $consulta_about_us = "SELECT * FROM aboutUs WHERE footer_status = 1 LIMIT 1";
        $respuesta_about_us = $mysqli->query($consulta_about_us);
        while($fila_about_us = mysqli_fetch_array($respuesta_about_us)){
        ?>
        <div class="sect">
            <h2 class="h2-sect">About us</h2>
            <div class="footer-section">
                <div class="contenido">
                    <p><?php echo $fila_about_us['footer_content'];?></p>
                </div>
                <ul class="social-media">
                    <li><a href="#"><img src="img/ball.png" alt="ball"></a></li>
                    <li><a href="#"><img src="img/facebook.png" alt="facebook"></a></li>
                    <li><a href="#"><img src="img/twitter.png" alt="twitter"></a></li>
                </ul>
            </div>
        </div>
        <?php
            }
        ?>
        <div class="sect">
            <h2 class="h2-sect">Recent posts</h2>
            <div class="footer-section">
                <div class="contenido">
                    <ul class="posts">
                        <?php
                        $consulta_recent_posts = "SELECT * FROM recentPosts";
                        $respuesta_recent_posts = $mysqli->query($consulta_recent_posts);
                        $color_class = "verde";
                        while($fila_recent_posts = mysqli_fetch_array($respuesta_recent_posts)){
                            switch($fila_recent_posts['post_category']){
                                case 'PHOTOGRAPHY':
                                $color_class = "azul";
                                break;
                                case 'BOOK':
                                $color_class = "naranja";
                                break;
                                case 'UI DESIGN':
                                $color_class = "amarillo";
                                break;
                                case 'MAGAZINE':
                                $color_class = "verde";
                                break;
                                default:
                                $color_class = "verde";
                                break;
                            }
                        ?>
                        <li>
                            <img src="<?php echo $fila_recent_posts['post_file'];?>" alt="<?php echo $fila_recent_posts['post_text'];?>">
                            <p><?php echo $fila_recent_posts['post_text'];?></p>
                            <span class="bg-<?php echo $color_class; ?>"><?php echo $fila_recent_posts['post_category'];?></span>
                        </li>
                        <?php
                            }
                        ?>
                        <!-- <li>
                            <img src="img/post2.png" alt="post2">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <span class="bg-amarillo">Ui design</span>
                        </li>
                        <li>
                            <img src="img/post3.png" alt="post3">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <span class="bg-azul">Photography</span>
                        </li>
                        <li>
                            <img src="img/post4.png" alt="post4">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <span class="bg-naranja">Book</span>
                        </li>
                        <li>
                            <img src="img/post5.png" alt="post5">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <span class="bg-amarillo">Ui design</span>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $consulta_contact_us = "SELECT * FROM contactUs LIMIT 1";
        $respuesta_contact_us = $mysqli->query($consulta_contact_us);
        while($fila_contact_us=mysqli_fetch_array($respuesta_contact_us)){
        ?>
        <div class="sect">
            <h2 class="h2-sect">Contact us</h2>
            <div class="footer-section">
                <div class="contact-section">
                    <!-- <p>10044 West 23th street, suite 721</p>
                    <p>New york NY 10010</p>
                    <p>Email: Username@email.com</p>
                    <p>Phone: +1 (0) 123 4567 890</p>
                    <p>Fax: +1 (0) 321 4567 890</p> -->
                    <p><?php echo $fila_contact_us['contact_address'];?></p>
                    <p><?php echo $fila_contact_us['contact_location'];?></p>
                    <p>Email: <?php echo $fila_contact_us['contact_email'];?></p>
                    <p>Phone: <?php echo $fila_contact_us['contact_phone'];?></p>
                    <p>Fax: <?php echo $fila_contact_us['contact_fax'];?></p>
                    <form class="contact-form" if="contactForm">
                        <input type="text" placeholder="Your name..." id="formName">
                        <input type="email" placeholder="Your email..." id="formEmail">
                        <textarea id="formMessage" cols="30" rows="10" placeholder="Your message..."></textarea>
                        <button type="button" id="submitForm">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/lightslider.js"></script>
    <script src="js/jquery-multitabs.js"></script>
    <script type="text/javascript">

        $('.tab2').multitabs();

        $(document).ready(function () {
            $('#responsive').lightSlider({
                item: 1,
                loop: false,
                slideMove: 1,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600,
                responsive: [
                    {
                        breakpoint: 800,
                        settings: {
                            item: 1,
                            slideMove: 1,
                            slideMargin: 6,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            item: 1,
                            slideMove: 1
                        }
                    }
                ]
            });
        });
        $('#submitForm').click(function(){
            let formName = $('#formName').val();
            let formEmail = $('#formEmail').val();
            let formMessage = $('#formMessage').val();
            let obj = {
                "accion":"form_contact",
                "form_name":formName,
                "form_email":formEmail,
                "form_message":formMessage
            };
            $("#contactForm").find("input").each(function() {
                $(this).removeClass("has-error");
                if ($(this).val() != "") {
                    obj[$(this).prop("name")] = $(this).val();
                } else {
                    $(this).addClass("has-error");
                    return false;
                }
            });
            $.post("backend/includes/_funciones.php",obj,function(e){
                if (e == 0) {
                    alert("Campos vacíos");
                }
                if (e == 1) {
                    location.reload();
                }
            });
        });
    </script>
</body>

</html>