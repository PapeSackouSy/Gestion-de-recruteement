@extends('Template.Dashboardtemp')
@section('name-containt2')
      <div class="wrapper">
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.html">
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
              @include('Template2.nav2')
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <div class="iq-light-logo">
                  <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" class="img-fluid" alt="">
               </div>
               <div class="iq-dark-logo">
                  <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" class="img-fluid" alt="">
               </div>
                     <span>vito</span>
                     </a>
                  </div>
               </div>
              @include('Template2.NavbarAdmin')
            </div>
         </div>
         @yield('containe2-page2')
@endsection
