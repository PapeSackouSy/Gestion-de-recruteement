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
             <li><a href="profile.html"><i class="ri-profile-line"></i>User Profile</a></li>
             <li><a href="profile-edit.html"><i class="ri-file-edit-line"></i>User Edit</a></li>
             <li><a href="add-user.html"><i class="ri-user-add-line"></i>User Add</a></li>
             <li><a href="user-list.html"><i class="ri-file-list-line"></i>User List</a></li>
          </ul>
       </li>
       <li><a href="calendar.html" class="iq-waves-effect"><i class="ri-calendar-2-line"></i><span>Calendar</span></a></li>
       <li><a href="chat.html" class="iq-waves-effect"><i class="ri-message-line"></i><span>Chat</span></a></li>

       <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Pages</span></li>
       <li>
          <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line"></i><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
          <ul id="authentication" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
             <li><a href="sign-in.html"><i class="ri-login-box-line"></i>Login</a></li>
             <li><a href="sign-up.html"><i class="ri-login-circle-line"></i>Register</a></li>
             <li><a href="pages-recoverpw.html"><i class="ri-record-mail-line"></i>Recover Password</a></li>
             <li><a href="pages-confirm-mail.html"><i class="ri-file-code-line"></i>Confirm Mail</a></li>
             <li><a href="pages-lock-screen.html"><i class="ri-lock-line"></i>Lock Screen</a></li>
          </ul>
       </li>
       <li>
          <a href="#map-page" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-map-pin-user-line"></i><span>Maps</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
          <ul id="map-page" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
             <li><a href="pages-map.html"><i class="ri-google-line"></i>Google Map</a></li>
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
       @endif

       @endauth

    </ul>
 </nav>
