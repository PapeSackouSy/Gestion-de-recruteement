<ul class="navbar-list">
    <li>
       <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">
          <img src="{{asset('Auth/Asset2/images/user/1.jpg')}}" class="img-fluid rounded mr-3" alt="user">
          <div class="caption">
             <h6 class="mb-0 line-height text-white">{{Auth::user()->nom}}</h6>
             <span class="font-size-12 text-white">{{Auth::user()->role}}</span>
          </div>
       </a>
       <div class="iq-sub-dropdown iq-user-dropdown">
          <div class="iq-card shadow-none m-0">
             <div class="iq-card-body p-0 ">
                <div class="bg-primary p-3">
                   <h5 class="mb-0 text-white line-height">{{Auth::user()->nom}}</h5>
                   <span class="text-white font-size-12">{{Auth::user()->role}}</span>
                </div>
                <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                   <div class="media align-items-center">
                      <div class="rounded iq-card-icon iq-bg-primary">
                         <i class="ri-file-user-line"></i>
                      </div>
                      <div class="media-body ml-3">
                         <h6 class="mb-0 ">My Profile</h6>
                         <p class="mb-0 font-size-12">View personal profile details.</p>
                      </div>
                   </div>
                </a>
                <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                   <div class="media align-items-center">
                      <div class="rounded iq-card-icon iq-bg-primary">
                         <i class="ri-profile-line"></i>
                      </div>
                      <div class="media-body ml-3">
                         <h6 class="mb-0 ">Edit Profile</h6>
                         <p class="mb-0 font-size-12">Modify your personal details.</p>
                      </div>
                   </div>
                </a>>
                <div class="d-inline-block w-100 text-center p-3">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('post')
                        <button class="btn btn-primary dark-btn-primary" type="submit">Deconnexion<i class="ri-login-box-line ml-2"></i></button>
                    </form>

                </div>
             </div>
          </div>
       </div>
    </li>
 </ul>
