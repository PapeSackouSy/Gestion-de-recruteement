<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
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
           <li><a href="#"><i class="ri-file-list-line"></i>Lister Departement</a></li>
        </ul>
      </li>
       <li><a href="calendar.html" class="iq-waves-effect"><i class="ri-calendar-2-line"></i><span>Calendar</span></a></li>
       <li><a href="chat.html" class="iq-waves-effect"><i class="ri-message-line"></i><span>Chat</span></a></li>


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
 </nav>
