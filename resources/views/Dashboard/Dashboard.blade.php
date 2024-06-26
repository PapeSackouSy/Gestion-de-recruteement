@extends('Template.Dashboardtemp')
@section('name-containt2')
@include('Dashboard.TempDash2')
        @auth
        @if (Auth::user()->role=="administrateur")
          <a href="{{route('sta')}}" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
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
        <a href="#drhaffiche" c class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i  class="ri-user-line"></i><span>Vice-Recteur</span></a>
        <ul id="drhaffiche" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
            <li><a href="{{route('Viceafficher')}}"><i class="ri-file-list-line"></i>Ajouter Vice-Recteur</a></li>
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
@elseif (Auth::user()->role == "Directeur_UFR" )
            @foreach ($usecase as $user)
                    @if ($user->responsable_ufr_id == Auth::user()->id)
           <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
        </li>
        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>

        <li><a href="todo.html" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i><span>Todo</span></a></li>
       <li><a href="#extra-pages"  data-toggle="collapse" aria-expanded="false"><i  class="ri-file-list-line"></i><span>Commission</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a></li>
         <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
        <li>
            <a href="{{route('afficherCommission')}}" class="iq-waves-effect"><i class="ri-file-list-line"></i><span>Cree une Commission</span></a>
            <a href="{{route('showCommission')}}" class="iq-waves-effect"><i class="ri-file-list-line"></i><span>Liste des Commission</span></a>
        </li>
        </ul>

        <li><a href="#extra-pages"  data-toggle="collapse" aria-expanded="false"><i  class="ri-file-list-line"></i><span>Membre</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a></li>
         <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
        <li>
            <a href="{{route('affichermembre')}}" class="iq-waves-effect"><i class="ri-file-list-line"></i><span>Ajouter  Membre</span></a>
            <a href="{{route('showmembre')}}" class="iq-waves-effect"><i class="ri-file-list-line"></i><span>Liste des Membres</span></a>
        </li>
        </ul>
      </nav>
        @include('Template2.NavbarAdmin')
    @endif
     @endforeach
@elseif (Auth::user()->role == "responsable_departement" )
            @foreach ($usecaseDep as $user)
                @if ($user->responsable_departement_id == Auth::user()->id)
                                <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</i> </a>
                            </li>
                            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>
                            <li><a href="{{route('indexPers')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i> <span>Definir Offres</span></a></li>
                            <li><a href="{{route('listerROffres')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i> <span>Lister Offres</span></a></li>
                        </nav>
                    @include('Template2.NavbarAdmin')
                @endif
            @endforeach
            @elseif (Auth::user()->role =="DRH")
                @foreach ($usecaseDRH as $user)
                       @if ($user->email == Auth::user()->email)
                                    <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</i> </a>
                                          </li>
                                            <li>
                                                <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Offre</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                                <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                                <li>
                                                    <li><a href="{{route('listeOffre')}}"><i class="ri-file-list-line"></i>Lister Offres</a></li>
                                                    <li><a href="{{route('AfficherOffres')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-file-list-line"></i> <span>Definir Offres</span></a></li>
                                                    <li><a href="{{route('listeOffresPers')}}" class="iq-waves-effect" aria-expanded="false"><i class="ri-file-list-line"></i><span>Liste Offres Pers</span></a></li>
                                                </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Avis de recrutement</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                                <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                                <li>
                                                    <li><a href="{{route('listeAvis')}}"><i class="ri-file-list-line"></i>Lister Avis</a></li>
                                                </li>
                                                </ul>
                                            </li>
                                        </nav>
                                        @include('Template2.NavbarAdmin')
                        @endif
                @endforeach
                @elseif (Auth::user()->role =="Vice_Recteur")
                @foreach ($usecaseVice as $user)
                       @if ($user->email == Auth::user()->email)
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
                @elseif(Auth::user()->role =="Candidat")
                    <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</i> </a>
                </li>
                            <li>
                                <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Offre</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li>
                                    <li><a href="{{route('candidature')}}"><i class="ri-file-list-line"></i>Voire Offres</a></li>
                                </li>
                                </ul>
                            </li>
                        </nav>
            @endif
        @endauth
    </div>
</div>
@endsection
