<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web Empresarial</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="{{ asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{ asset('assets/css/lib/helper.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
                    <ul>
                        <li class="label">Main</li>
                        <li class="active"><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>



                            </ul>
                        </li>

                        <li class="label">Appicações</li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-view-list-alt"></i>  Cadastros  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{route('categorias.index')}}">Categorias</a></li>
                                <li><a href="chart-morris.html">Morris</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="chartist.html">Chartist</a></li>
                                <li><a href="chart-peity.html">Peity</a></li>
                                <li><a href="chart-sparkline.html">Sparkle</a></li>
                                <li><a href="chart-knob.html">Knob</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>  Relatórios  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="chart-flot.html">Flot</a></li>
                                <li><a href="chart-morris.html">Morris</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="chartist.html">Chartist</a></li>
                                <li><a href="chart-peity.html">Peity</a></li>
                                <li><a href="chart-sparkline.html">Sparkle</a></li>
                                <li><a href="chart-knob.html">Knob</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-slice"></i>  Pedidos  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="chart-flot.html">Flot</a></li>
                                <li><a href="chart-morris.html">Morris</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="chartist.html">Chartist</a></li>
                                <li><a href="chart-peity.html">Peity</a></li>
                                <li><a href="chart-sparkline.html">Sparkle</a></li>
                                <li><a href="chart-knob.html">Knob</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-money"></i>  Financeiro  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="chart-flot.html">Flot</a></li>
                                <li><a href="chart-morris.html">Morris</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="chartist.html">Chartist</a></li>
                                <li><a href="chart-peity.html">Peity</a></li>
                                <li><a href="chart-sparkline.html">Sparkle</a></li>
                                <li><a href="chart-knob.html">Knob</a></li>
                            </ul>
                        </li>
                        <li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calendário </a></li>
                        <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
                        <li><a href="app-profile.html"><i class="ti-user"></i> Perfil</a></li>
                        <li><a><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>


<div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <ul>

                                <li class="header-icon dib"><i class="ti-bell"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">Recent Notifications</span>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">5 members joined today </div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mariam</div>
                                                    <div class="notification-text">likes a photo of you</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Tasnim</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-icon dib"><i class="ti-email"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">2 New Messages</span>
                                            <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-icon dib"><span class="user-avatar">John <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">Upgrade Now</span>
                                            <p class="trial-day">30 Days Trail</p>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                                <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>

                                                <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>


            @yield('content-wrap')

        <!-- jquery vendor -->
        <script src="{{ asset('assets/js/lib/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
        <!-- nano scroller -->
        <script src="{{ asset('assets/js/lib/menubar/sidebar.js')}}"></script>
        <script src="{{ asset('assets/js/lib/preloader/pace.min.js')}}"></script>
        <!-- sidebar -->
        <script src="{{ asset('assets/js/lib/bootstrap.min.js')}}"></script>

        <!-- bootstrap -->

        <script src="{{ asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>

        <script src="{{ asset('assets/js/lib/morris-chart/raphael-min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/morris-chart/morris.js')}}"></script>
        <script src="{{ asset('assets/js/lib/morris-chart/morris-init.js')}}"></script>

        <!--  flot-chart js -->
        <script src="{{ asset('assets/js/lib/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{ asset('assets/js/lib/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{ asset('assets/js/lib/flot-chart/flot-chart-init.js')}}"></script>
        <!-- // flot-chart js -->


        <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.algeria.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.argentina.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.brazil.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.france.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.germany.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.greece.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.iran.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.iraq.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.russia.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.tunisia.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.europe.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.usa.js')}}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/js/lib/vector-map/vector.init.js')}}"></script>

        <script src="{{ asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/weather/weather-init.js')}}"></script>
        <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>
        <!-- scripit init-->

        </body>
