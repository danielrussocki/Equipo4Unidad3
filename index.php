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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
    <main id="home" class="principal">
        <h1 class="h1-main">Art is eternal happiness</h1>
        <button class="mybtn">Work with us</button>
        <button class="scroll-down">Scroll Down<i class="fas fa-arrow-down"></i></button>
    </main>
    <!-- WHAT WE DO -->
    <section class="whatwedo" id="whatwedo">
        <div class="section-what-we-do">
            <div class="container container-centered">
                <h2 id="what-we-do" class="section-title">What we do</h2>
                <!-- <hr class="linea"> -->
                <p class="section-description">Lorem ipsum dolor sit amet. Proin gravida nibh vel velit auctor aliquet.
                </p>
                <div class="lorem">
                    <div class="lorem-logo lorem-camera"></div>
                    <h3>Lorem Ipsum</h3>
                    <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                        sollicitudin, lorem quis bibendum auctor.</p>
                    <a class="learn_more" href="#">Learn more</a>
                </div>
                <div class="lorem">
                    <div class="lorem-logo lorem-speed"></div>
                    <h3>Lorem Ipsum</h3>
                    <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                        sollicitudin, lorem quis bibendum auctor.</p>
                    <a class="learn_more" href="#">Learn more</a>
                </div>
                <div class="lorem">
                    <div class="lorem-logo lorem-case"></div>
                    <h3>Lorem Ipsum</h3>
                    <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                        sollicitudin, lorem quis bibendum auctor.</p>
                    <a class="learn_more" href="#">Learn more</a>
                </div>
            </div>
        </div>
    </section>
    <!--OUR LATEST WORKS-->
    <?php
    include_once("backend/includes/_db.php");
    $query = "SELECT * FROM works ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $work1 = mysqli_fetch_assoc($res);
    $query = "SELECT * FROM works ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $work2 = mysqli_fetch_assoc($res);
    $query = "SELECT * FROM works ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $work3 = mysqli_fetch_assoc($res);
    ?>
    <div class="section-our-latest-works">
        <div class="container container-centered">
            <h2 class="section-title-green"><?php echo $work1['works_title']; ?></h2>
            <!-- <hr class="line"> -->
            <p class="section-description-green"><?php echo $work1['works_description']; ?></p>
            <div class="tab2">
                <div data-child="false" class="tab__header">
                    <div class="tab__header-1 tab__header--active"><?php echo $work1['works_tab1']; ?></div>
                    <div class="tab__header-2"><?php echo $work1['works_tab2']; ?></div>
                    <div class="tab__header-3"><?php echo $work2['works_tab3']; ?></div>
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
    <?php
    include_once("backend/includes/_db.php");
    $query = "SELECT * FROM testimonials ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $one = mysqli_fetch_assoc($res);
    $query = "SELECT * FROM testimonials ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $two = mysqli_fetch_assoc($res);
    $query = "SELECT * FROM testimonials ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $tre = mysqli_fetch_assoc($res);
    ?>
    <div class="lSSlideOuter section-testimonials" id="testimonials">
        <div class="lSSlideWrapper usingCss container container-centered">
            <h2 class="section-title">Testimonials</h2>
            <p class="section-description"><?php echo $one['test_description']; ?></p>

            <ul id="responsive" class="gallery content-slider list-unstyled clearfix lightSlider lsGrab lSSlide" style="width: 2463.33px; height: 165px; padding-bottom: 0%; transform: translate3d(0px, 0px, 0px);">
                <li class="lslide active" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->

                    <p class="testimonials-quotes"><?php echo $one['test_quote']; ?></p>

                    <div class="testimonials-client">
                        <img src="backend/<?php echo $one['test_img']; ?>" alt="Herp">
                        <p class="testimonials-client-name"><?php echo $one['test_name']; ?></p>
                        <p class="testimonials-client-company"><?php echo $one['test_puesto']; ?></p>

                </li>
                <li class="lslide" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->

                    <p class="testimonials-quotes"><?php echo $two['test_quote']; ?></p>

                    <div class="testimonials-client">
                        <img src="backend/<?php echo $two['test_img']; ?>" alt="Herp">
                        <p class="testimonials-client-name"><?php echo $two['test_name']; ?></p>
                        <p class="testimonials-client-company"><?php echo $two['test_puesto']; ?></p>
                </li>
                <li class="lslide" style="width: 240.333px; margin-right: 6px;">
                    <!-- <hr class="line"> -->

                    <p class="testimonials-quotes"><?php echo $tre['test_quote']; ?></p>

                    <div class="testimonials-client">
                        <img src="backend/<?php echo $tre['test_img']; ?>" alt="Herp">
                        <p class="testimonials-client-name"><?php echo $tre['test_name']; ?></p>
                        <p class="testimonials-client-company"><?php echo $tre['test_puesto']; ?></p>
                </li>
            </ul>
        </div>
    </div>
    <!-------------------------->

    <!--HAAPPY CLIENTS-->
    <?php
    include_once("backend/includes/_db.php");
    $query = "SELECT * FROM clients ORDER BY rand() LIMIT 1";
    $res = mysqli_query($mysqli, $query) or die(mysql_error());
    $one = mysqli_fetch_assoc($res);
    ?>
    <div class="section-happy-clients" id="happyClients">
        <div class="container container-centered">
            <h2 class="section-title"><?php echo $one['client_title']; ?></h2>
            <!-- <hr class="line"> -->
            <p class="section-description"><?php echo $one['client_description']; ?></p>
        </div>

        <div class="happy-clients-images">
            <?php
            include_once("backend/includes/_db.php");
            $query = "SELECT * FROM clients_img ORDER BY rand() LIMIT 8";
            $res = mysqli_query($mysqli, $query);
            $arreglo = [];
            while ($fila = mysqli_fetch_array($res)) {
                array_push($arreglo, $fila); ?>
                <div class="happy-clients-wrap">
                    <img src="backend/<?php echo $fila['clientimg_route']; ?>">
                </div>
            <?php
        }
        ?>

            <div class="happy-clients-wrap dnone">
                <img src="backend/<?php echo $fila['clientimg_route']; ?>">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="backend/<?php echo $fila['clientimg_route']; ?>">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="backend/<?php echo $fila['clientimg_route']; ?>">
            </div>
            <div class="happy-clients-wrap dnone">
                <img src="backend/<?php echo $fila['clientimg_route']; ?>">
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
        <div class="sect">
            <h2 class="h2-sect">About us</h2>
            <div class="footer-section">
                <div class="contenido">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa maxime sequi quo saepe harum
                        quidem. Similique numquam saepe optio, quasi perspiciatis dicta repudiandae pariatur soluta
                        deleniti illum nisi, dolorem aliquam. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Veritatis aliquam tempora at itaque qui repellendus, quidem accusamus? Expedita itaque
                        accusamus, totam asperiores numquam doloribus a, dignissimos quo similique eius et?</p>
                </div>
                <ul class="social-media">
                    <li><a href="#"><img src="img/ball.png" alt="ball"></a></li>
                    <li><a href="#"><img src="img/facebook.png" alt="facebook"></a></li>
                    <li><a href="#"><img src="img/twitter.png" alt="twitter"></a></li>
                </ul>
            </div>
        </div>
        <div class="sect">
            <h2 class="h2-sect">Recent posts</h2>
            <div class="footer-section">
                <div class="contenido">
                    <ul class="posts">
                        <li>
                            <img src="img/post1.png" alt="post1">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <span class="bg-verde">Magazine</span>
                        </li>
                        <li>
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sect">
            <h2 class="h2-sect">Contact us</h2>
            <div class="footer-section">
                <div class="contact-section">
                    <p>10044 West 23th street, suite 721</p>
                    <p>New york NY 10010</p>
                    <p>Email: Username@email.com</p>
                    <p>Phone: +1 (0) 123 4567 890</p>
                    <p>Fax: +1 (0) 321 4567 890</p>
                    <form class="contact-form" if="contactForm">
                        <input type="text" placeholder="Your name..." id="formName">
                        <input type="email" placeholder="Your email..." id="formEmail">
                        <textarea id="formMessage" cols="30" rows="10" placeholder="Your message..."></textarea>
                        <button type="button" id="submitForm">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/lightslider.js"></script>
    <script src="js/jquery-multitabs.js"></script>
    <script>
        $('.tab2').multitabs();

        $(document).ready(function() {
            $('#responsive').lightSlider({
                item: 1,
                loop: false,
                slideMove: 1,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600,
                responsive: [{
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
        $('#submitForm').click(function() {
            let formName = $('#formName').val();
            let formEmail = $('#formEmail').val();
            let formMessage = $('#formMessage').val();
            let obj = {
                "accion": "form_contact",
                "form_name": formName,
                "form_email": formEmail,
                "form_message": formMessage
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
            $.post("backend/includes/_funciones.php", obj, function(e) {
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