@extends('Template.Dashboardtemp')
@section('name-containt2')
<div class="wrapper">
    <div class="iq-sidebar">
       <div class="iq-sidebar-logo d-flex justify-content-between">
          <a href="{{route('layout')}}">
          <div class="iq-light-logo">
             <div class="iq-light-logo">
                <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" class="img-fluid" alt="">
              </div>
                <div class="iq-dark-logo">
                   <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" class="img-fluid" alt="">
                </div>
          </div>
          <div class="iq-dark-logo">
             <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" class="img-fluid" alt="">
          </div>
          <span>UADB</span>
          </a>
          <div class="iq-menu-bt-sidebar">
             <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                   <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                   <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                </div>
             </div>
          </div>
       </div>
       <div id="sidebar-scrollbar">
  <nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        @auth
        @if (Auth::user()->role=="administrateur")
       <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Home</span></li>
       <li class="active">
          <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
       </li>
       <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>

       <li><a href="todo.html" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i><span>Todo</span></a></li>
       <li>
          <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
          <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
             <li><a href="{{route('afficherUser')}}"><i class="ri-file-list-line"></i>User List</a></li>
          </ul>
       </li>
       <li>
        <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>Departement</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
        <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
           <li><a href="{{route('afficherDep')}}"><i class="ri-file-list-line"></i>Ajouter Departement</a></li>
           <li><a href="{{route('listeDep')}}"><i class="ri-file-list-line"></i>Lister Departement</a></li>
        </ul>
     </li>
       <li>
        <a href="#drhaffiche" c class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i  class="ri-user-line"></i><span>DRH</span></a>
        <ul id="drhaffiche" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
            <li><a href="{{route('drhafficher')}}"><i class="ri-file-list-line"></i>Ajouter DRH</a></li>
         </ul>
      </li>
      <li>
        <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Offre</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
        <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
           <li>
            <li><a href="{{route('listeOffre')}}"><i class="ri-file-list-line"></i>Lister Offres</a></li>
            <li><a href="{{route('AfficherOffres')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i> <span>Definir Offres</span></a></li>
          </li>
        </ul>
     </li>
       <li>
          <a href="#map-page" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-map-pin-user-line"></i><span>Maps</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
          <ul id="map-page" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
             <li><a href="https://www.google.com/maps/dir/Senegal/Universit%C3%A9+de+Bambey,+Bambey,+Senegal/@14.2792088,-15.9764608,9z/data=!4m13!4m12!1m5!1m1!1s0xec172f5b3c5bb71:0x5a46a55099615940!2m2!1d-14.452362!2d14.497401!1m5!1m1!1s0xeea09719f211b75:0x90dc153ff6216750!2m2!1d-16.4783497!2d14.6959099?hl=en&entry=ttu"><i class="ri-google-line"></i>Google Map</a></li>
          </ul>
       </li>
       <li>
          <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>UFR</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
          <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
             <li><a href="{{route('ufr')}}"><i class="ri-price-tag-2-line"></i>Ajouter UFR</button>
                <a href="{{route('afficher')}}"><i class="ri-price-tag-2-line"></i>Afficher UFR</a>
            </li>
          </ul>
       </li>
    </ul>
            @include('Template2.NavbarAdmin')
            @include('Template2.Statistic')
@elseif (Auth::user()->role == "Directeur_UFR" )
            @foreach ($usecase as $user)
                    @if ($user->responsable_ufr_id == Auth::user()->id)
        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Home</span></li>
        <li class="active">
           <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
        </li>
        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>

        <li><a href="todo.html" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i><span>Todo</span></a></li>
        <li>
           <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span></span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
           <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
              <li><a href="#"><i class="ri-file-list-line"></i></a></li>
           </ul>
        </li>
        <li><a href="calendar.html" class="iq-waves-effect"><i class="ri-calendar-2-line"></i><span>Calendar</span></a></li>
        <li><a href="chat.html" class="iq-waves-effect"><i class="ri-message-line"></i><span>Chat</span></a></li>
      </nav>
        @include('Template2.NavbarAdmin')
    @endif
     @endforeach
@elseif (Auth::user()->role == "responsable_departement" )
            @foreach ($usecaseDep as $user)
                @if ($user->responsable_departement_id == Auth::user()->id)
                            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Home</span></li>
                            <li class="active">
                                <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</i> </a>
                            </li>
                            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>
                            <li><a href="{{route('AfficherOffres')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i> <span>Definir Offres</span></a></li>
                      </nav>
                    @include('Template2.NavbarAdmin')
                @endif
            @endforeach
@elseif (Auth::user()->role =="DRH")
@foreach ($usecaseDRH as $user)
    @if ($user->email == Auth::user()->email)
                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Home</span></li>
                <li class="active">
                    <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</i> </a>
                </li>
                            <li>
                                <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Offre</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li>
                                    <li><a href="{{route('listeOffre')}}"><i class="ri-file-list-line"></i>Lister Offres</a></li>
                                    <li><a href="{{route('AfficherOffres')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i> <span>Definir Offres</span></a></li>
                                </li>
                                </ul>
                            </li>
                        </nav>
                        @include('Template2.NavbarAdmin')
                    @endif
                @endforeach
            @endif
        @endauth
    </div>
</div>
@endsection
