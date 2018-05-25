<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>{{Auth::user()->retorna_dados_configuracao->titulo_site_interno}}</title>
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
      <div class="brand" style="height: 6.438rem">
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
          <img src="{{Auth::user()->retorna_dados_configuracao->logo}}" style="max-width: 150px">
        </a>
        <a href="#" class="small-menu-visible brand-logo">
          <img src="{{Auth::user()->retorna_dados_configuracao->logo}}" style="max-width: 30px">
        </a>
        <!-- /logo -->
      </div>
      <!-- main navigation -->
      <nav role="navigation">
        <ul class="nav">
          <!-- dashboard -->
          <li>
            <a href="index.html">
              <i class="icon-home"></i>
              <span>Inicio</span>
            </a>
          </li>
          <!-- /dashboard -->
          <!-- customizer -->
          <li>
            <a href="javascript:;">
              <i class="icon-users"></i>
              <span>Contatos</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="cards-basic.html">
                  <span>Cadastro Rápido</span>
                </a>
              </li>
              <li>
                <a href="cards-basic.html">
                  <span>Cadastro Completo</span>
                </a>
              </li>
              <li>
                <a href="cards-basic.html">
                  <span>Gerenciar Contatos</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <i class="icon-pin"></i>
              <span>Indicações</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{route('mapa_visualiza')}}">
                  <span>Criar uma indicação(Google Maps)</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span>Criar uma indicação(Formulário)</span>
                </a>
              </li>
              <li>
                 <a href="{{route('lista_indicacao')}}">
                  <span>Gerenciar Indicações</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <i class="icon-drop"></i>
              <i class="toggle-briefcase"></i>
              <span>Mala Direta</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>Cartas</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <span>Impressão de Etiquetas</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Templates de Cartas</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>SMS</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <span>Template de SMS</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Envio de SMS</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>E-Mail</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <span>Templates de E-Mail</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Envio de E-Mails</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="http://reactor.nyasha.me/documentation" target="_blank">
              <i class="icon-notebook"></i>
              <span>Agenda</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="icon-list"></i>
              <span>Relatórios</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="cards-basic.html">
                  <span>Filtro de Contatos</span>
                </a>
              </li>
              <li>
                <a href="cards-basic.html">
                  <span>Geocalização de Contatos</span>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>Indicações</span>
                </a>
                <ul class="sub-menu">
                 <li>
                  <a href="cards-basic.html">
                    <span>Workflow de Indicações</span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                    <span>Geocalização das Indicações</span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                    <span>Indicações por Ementa</span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                    <span>Indicações por Bairro</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;">
            <i class="icon-settings"></i>
            <span>Configurações</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="cards-basic.html">
                <span>Cadastro de Ementas</span>
              </a>
            </li>
            <li>
              <a href="cards-basic.html">
                <span>Cadastro de Despachos</span>
              </a>
            </li>
            <li>
              <a href="cards-basic.html">
                <span>Gerenciar Usuários</span>
              </a>
            </li>
            <li>
              <a href="cards-basic.html">
                <span>Upgrades</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
            <a href="http://reactor.nyasha.me/angular" target="_blank">
              <i class="icon-control-play"></i>
              <span>Suporte</span>
            </a>
          </li>
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