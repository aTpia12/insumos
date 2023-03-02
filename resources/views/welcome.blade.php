<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>InsumosD&M</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/flaticon.css') }}">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/magnific-popup.css') }}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/nice-select.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/css/style.css') }}">
</head>

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="{{ asset('img/dym.jpg') }}" alt="logo" width="30%"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Insumos</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servicios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Servicio 1</a>
                                    <a class="dropdown-item" href="#">Servicio 2</a>
                                    <a class="dropdown-item" href="#">Servicio 3</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contacto</a>
                            </li>
                        </ul>
                    </div>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                                <!--(Route::has('register'))
                                    <a href="{{ route('register.store') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>-->

                            @endauth
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-5">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>Insumos D&M</h5>
                        <h1>Insumos D&M</h1>
                        <p style="text-align: justify">SOMOS UNA EMPRESA VERACRUZANA QUE SE DEDICA AL EQUIPAMIENTO MÉDICO – HOSPITALARIO, ASÍ COMO A LA DISTRIBUCIÓN DE INSTRUMENTAL E  INSUMOS MÉDICOS INCORPORADOS AL CUADRO BÁSICO Y ALTA ESPECIALIDAD.</p>
                        <p style="text-align: justify">FUE CREADA EN EL 2019 Y A LO LARGO DE ESTOS AÑOS HEMOS DESARROLLADO UNA DINÁMICA DE TRABAJO QUE GARANTIZA CALIDAD Y RESPONSABILIDAD PARA NUESTROS CLIENTES, BRINDANDO SOLUCIÓN Y RESPUESTA A SUS NECESIDADES EN POCO TIEMPO, CON UNA ATENCIÓN INIGUALABLE Y EL MEJOR SERVICIO.</p>
                        <a href="#" class="btn_2">Solicitar</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner_img">
                    <img src="{{ asset('img/banner_img.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- about us part start-->
<section class="about_us padding_top">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 col-lg-6">
                <div class="about_us_img">
                    <img src="{{ asset('img/top_service.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="about_us_text">
                    <h2>Nosotros</h2>
                    <p style="text-align: justify">NUESTRA POLÍTICA ES OFRECER CALIDAD, LA CUAL ESTÁ BASADA EN SATISFACER LAS NECESIDADES DE LOS CLIENTES ADAPTÁNDONOS A SUS REQUERIMIENTOS CON PRODUCTOS Y SERVICIOS DE LA MÁS ALTA CALIDAD, PARA CUBRIR LAS NECESIDADES DE SUS GRUPOS DE INTERÉS Y ASÍ CONTRIBUIR AL MEJORAMIENTO DE SU CALIDAD DE VIDA.</p>
                    <p style="text-align: justify">CONTAMOS CON UN EQUIPO INTEGRADO POR PERSONAS CON UN ALTO SENTIDO DE RESPONSABILIDAD Y EMPATÍA A FIN DE PROVEER INSUMOS DE CALIDAD PARA EL BIENESTAR DE LOS PACIENTES O CONSUMIDORES FINALES.</p>
                    <div class="banner_item">
                        <div class="single_item">
                            <img src="img/icon/banner_1.svg" alt="">
                            <h5>Misión</h5>
                            <p style="text-align: justify">PROPORCIONAR EQUIPAMIENTO E INSUMOS MÉDICOS A LAS INSTITUCIONES DE SALUD, ADAPTÁNDONOS A SUS REQUERIMIENTOS CON PRODUCTOS Y SERVICIOS DE LA MÁS ALTA CALIDAD, PARA SATISFACER LAS NECESIDADES DE SUS GRUPOS DE INTERES Y ASÍ CONTRIBUIR AL MEJORAMIENTO DE SU CALIDAD DE VIDA.</p>
                        </div>
                    </div>
                    <div class="banner_item">
                        <div class="single_item">
                            <img src="img/icon/banner_2.svg" alt="">
                            <h5>Visión</h5>
                            <p style="text-align: justify">SER LA EMPRESA LIDER, CONFIABLE Y COMPETITIVA EN EL MERCADO DE PRODUCTOS Y SERVICIOS CON LOS ESTÁNDARES MÁS ALTOS EN INSUMOS MEDICOS DEL ESTADO DE VERACRUZ, RECONOCIDA POR SU CALIDAD EN EL SERVICIO Y CREANDO VALOR A LARGO PLAZO PARA NUESTROS ACCIONISTAS, COLABORADORES Y CLIENTES.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us part end-->

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section_tittle text-center">
                    <h2>Insumos</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-3 col-sm-12">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><img src="img/icon/feature_1.svg" alt=""></span>
                        <h4>Better Future</h4>
                        <p>Darkness multiply rule Which from without life creature blessed
                            give moveth moveth seas make day which divided our have.</p>
                    </div>
                </div>
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><img src="img/icon/feature_2.svg" alt=""></span>
                        <h4>Better Future</h4>
                        <p>Darkness multiply rule Which from without life creature blessed
                            give moveth moveth seas make day which divided our have.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="single_feature_img">
                    <img src="{{ asset('img/service.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><img src="img/icon/feature_1.svg" alt=""></span>
                        <h4>Better Future</h4>
                        <p>Darkness multiply rule Which from without life creature blessed
                            give moveth moveth seas make day which divided our have.</p>
                    </div>
                </div>
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><img src="img/icon/feature_2.svg" alt=""></span>
                        <h4>Better Future</h4>
                        <p>Darkness multiply rule Which from without life creature blessed
                            give moveth moveth seas make day which divided our have.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature_part start-->

<!-- our depertment part start-->
<section class="our_depertment section_padding">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-12">
                <div class="depertment_content">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <h2>Servicios</h2>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_our_depertment">
                                                <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                                                       alt=""></span>
                                        <h4>Better Future</h4>
                                        <p>Darkness multiply rule Which from without life creature blessed
                                            give moveth moveth seas make day which divided our have.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_our_depertment">
                                                <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                                                       alt=""></span>
                                        <h4>Better Future</h4>
                                        <p>Darkness multiply rule Which from without life creature blessed
                                            give moveth moveth seas make day which divided our have.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_our_depertment">
                                                <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                                                       alt=""></span>
                                        <h4>Better Future</h4>
                                        <p>Darkness multiply rule Which from without life creature blessed
                                            give moveth moveth seas make day which divided our have.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_our_depertment">
                                                <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                                                       alt=""></span>
                                        <h4>Better Future</h4>
                                        <p>Darkness multiply rule Which from without life creature blessed
                                            give moveth moveth seas make day which divided our have.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- our depertment part end-->


<!--::blog_part start::-->
<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section_tittle text-center">
                    <h2>Contacto</h2>
                </div>
            </div>
        </div>
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 480px;"></div>
            <script>
                function initMap() {
                    var uluru = {
                        lat: -25.363,
                        lng: 131.044
                    };
                    var grayStyles = [{
                        featureType: "all",
                        stylers: [{
                            saturation: -90
                        },
                            {
                                lightness: 50
                            }
                        ]
                    },
                        {
                            elementType: 'labels.text.fill',
                            stylers: [{
                                color: '#ccdee9'
                            }]
                        }
                    ];
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -31.197,
                            lng: 150.744
                        },
                        zoom: 9,
                        styles: grayStyles,
                        scrollwheel: false
                    });
                }
            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
            </script>

        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Escribenos</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                      novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                              <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensaje'"
                                        placeholder='Mensaje'></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Ingresa tu nombre'" placeholder='Ingresa tu nombre'>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Ingresa tu correo'" placeholder='Ingresa tu correo'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Asunto'" placeholder='Asunto'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_1">Enviar mensaje</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Fracc. Reforma</h3>
                        <p>Veracruz, Ver., CA 91919</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>(229) 375 4414</h3>
                        <p>Lun a Vie 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>dyminstrumentalmedico@hotmail.com</h3>
                        <p>Contáctanos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::blog_part end::-->

<!-- footer part start-->
<footer class="footer-area">
    <div class="footer section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                    <a href="#" class="footer_logo"> <img src="{{ asset('img/dym.jpg') }}" alt="#" width="80%"> </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
                    <div class="social_logo">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                    <h4>Ejemplo</h4>
                    <ul>
                        <li><a href="#">Ejemplo</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                    <h4>Ejemplo</h4>
                    <ul>
                        <li><a href="#">Ejemplo</a></li>

                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-6 single-footer-widget">
                    <h4>Ejemplo</h4>
                    <ul>
                        <li><a href="#">Ejemplo</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
                    <h4>Ejemplo</h4>
                    <p>Seed good winged wherein which night multiply
                        midst does not fruitful</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Ingresa tu correo"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu correo'"
                                   required="" type="email">
                            <button class="click-btn btn btn-default text-uppercase"> <i class="ti-angle-right"></i>
                            </button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                       type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Consultores Tyren de México</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"> <i class="ti-twitter"></i> </a>
                    <a href="#"><i class="ti-instagram"></i></a>
                    <a href="#"><i class="ti-skype"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer part end-->

<!-- jquery plugins here-->

<script src="{{ asset('js/index/js/jquery-1.12.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('js/index/js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('js/index/js/bootstrap.min.js') }}"></script>
<!-- owl carousel js -->
<script src="{{ asset('js/index/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/index/js/jquery.nice-select.min.js') }}"></script>
<!-- contact js -->
<script src="{{ asset('js/index/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/index/js/jquery.form.js') }}"></script>
<script src="{{ asset('js/index/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/index/js/mail-script.js') }}"></script>
<script src="{{ asset('js/index/js/contact.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('js/index/js/custom.js') }}"></script>
</body>
</html>
