<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Reactor - Bootstrap Admin Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('styles/webfont.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/climacons-font.css')}}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/font-awesome.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/card.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/sli.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/app.css')}}">
  <link rel="stylesheet" href="{{ asset('styles/app.skins.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <!-- endbuild -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app layout-fixed-header">
    <!-- sidebar panel -->
    <div class="sidebar-panel offscreen-left">
      <div class="brand">
        <!-- toggle small sidebar menu -->
        <a href="javascript:;" class="toggle-apps hidden-xs" data-toggle="quick-launch">
          <i class="icon-grid"></i>
        </a>
        <!-- /toggle small sidebar menu -->
        <!-- toggle offscreen menu -->
        <div class="toggle-offscreen">
          <a href="javascript:;" class="visible-xs hamburger-icon" data-toggle="offscreen" data-move="ltr">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
        <!-- /toggle offscreen menu -->
        <!-- logo -->
        <a class="brand-logo">
          <span>Reactor</span>
        </a>
        <a href="#" class="small-menu-visible brand-logo">R</a>
        <!-- /logo -->
      </div>
      <!-- main navigation -->
      <nav role="navigation">
        <ul class="nav">
          <!-- dashboard -->
          <li>
            <a href="index.html">
              <i class="icon-compass"></i>
              <span>Inicio</span>
            </a>
          </li>
          <!-- /dashboard -->
          <!-- customizer -->
          <li>
            <a href="javascript:;">
              <span class="badge pull-right">4</span>
              <i class="icon-drop"></i>
              <span>Indicações</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="cards-basic.html">
                  <span>Criar uma indicação(Google Maps)</span>
                </a>
              </li>
              <li>
                <a href="cards-basic.html">
                  <span>Criar uma indicação(Formulário)</span>
                </a>
              </li>
              <li>
                <a href="cards-portlets.html">
                  <span>Gerenciar Indicações</span>
                </a>
              </li>
              <li>
                <a href="cards-draggable.html">
                  <span>Visualizar Indicações</span>
                </a>
              </li>
            </ul>
          </li>
          <!--<li>
            <a href="javascript:;">
              <i class="icon-frame"></i>
              <span>Menu Level</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>Level</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <i class="toggle-accordion"></i>
                      <span>Level</span>
                    </a>
                    <ul class="sub-menu">
                      <li>
                        <a href="javascript:;">
                          <span>Level</span>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <span>Level</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Level</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <span>Level</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="http://reactor.nyasha.me/documentation" target="_blank">
              <i class="icon-layers"></i>
              <span>Documentation</span>
            </a>
          </li>
          <li>
            <a href="http://reactor.nyasha.me/angular" target="_blank">
              <i class="icon-control-play"></i>
              <span>Angular version</span>
            </a>
          </li>-->
          <!-- /static -->
        </ul>
      </nav>
      <!-- /main navigation -->
    </div>
    <!-- /sidebar panel -->
    <!-- content panel -->
    <div class="main-panel">
      <!-- top header -->
      <div class="header navbar">
        <div class="brand visible-xs">
          <!-- toggle offscreen menu -->
          <div class="toggle-offscreen">
            <a href="javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- /toggle offscreen menu -->
          <!-- logo -->
          <a class="brand-logo">
            <span>REACTOR</span>
          </a>
          <!-- /logo -->
        </div>
        <ul class="nav navbar-nav hidden-xs">
          <li>
            <a href="javascript:;" class="small-sidebar-toggle ripple" data-toggle="layout-small-menu">
              <i class="icon-toggle-sidebar"></i>
            </a>
          </li>     
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs">
          <li>
            <a href="javascript:;" class="ripple" data-toggle="dropdown">
              <img src="images/avatar.jpg" class="header-avatar img-circle" alt="user" title="user">
              <span>{{ Auth::user()->name }}</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:;">Settings</a>
              </li>
              <li>
                <a href="javascript:;">Upgrade</a>
              </li>
              <li>
                <a href="javascript:;">
                  <span class="label bg-danger pull-right">34</span>
                  <span>Notifications</span>
                </a>
              </li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="javascript:;">Help</a>
              </li>
              <li>
               <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" class="ripple" data-toggle="layout-chat-open">
              <i class="icon-user"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- /top header -->
      <!-- main area -->
      <div class="main-content">
          @yield('content')
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    <footer class="content-footer">
      <nav class="footer-right">
        <ul class="nav">
          <li>
            <a href="javascript:;">Feedback</a>
          </li>
          <li>
            <a href="javascript:;" class="scroll-up">
              <i class="fa fa-angle-up"></i>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="footer-left hidden-xs">
        <ul class="nav">
          <li>
            <a href="javascript:;"><span>About</span> Reactor</a>
          </li>
          <li>
            <a href="javascript:;">Privacy</a>
          </li>
          <li>
            <a href="javascript:;">Terms</a>
          </li>
          <li>
            <a href="javascript:;">Help</a>
          </li>
        </ul>
      </nav>
    </footer>
  </div>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="{{ asset('scripts/helpers/modernizr.js')}}"></script>
  <script src="{{ asset('vendor/jquery/dist/jquery.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
  <script src="{{ asset('vendor/fastclick/lib/fastclick.js')}}"></script>
  <script src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
  <script src="{{ asset('scripts/helpers/smartresize.js')}}"></script>
  <script src="{{ asset('scripts/constants.js')}}"></script>
  <script src="{{ asset('scripts/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


  @include('sweet::alert')

  @yield('scripts')
  <!-- endbuild -->
</body>

</html>