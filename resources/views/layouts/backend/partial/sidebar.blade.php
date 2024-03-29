

<style>
    /* Add this CSS to your styles */
    .list {
list-style: circle;
padding: 0;
}

.list li {
margin: 0;
padding: 5px;
}

.has-submenu .arrow {
float: right;
transition: transform 0.3s ease; /* Add smooth transition */
}

.submenu {
display: none;
}

.submenu.active {
display: block;
}

.submenu.active + .toggle-submenu .arrow {
transform: rotate(180deg);
}




</style>
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <!-- <div class="image">
            <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}" width="48" height="48" alt="User" />
        </div> -->
        {{-- <div class="name btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; opacity: 75%;">{{ Auth::user()->name }}</div> --}}
       
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION  <div style="margin-left: 180px" class="info-container">
            
                <!-- <div class="email">{{ Auth::user()->email }}</div> -->
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-left">
    
                        <li>
                            <div class="name btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; opacity: 75%;">{{ Auth::user()->name }}</div>
                        </li>
    
                        <li role="seperator" class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Sign Out
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div></li>

            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.patients.index') }}">
                        <i class="material-icons">book</i>
                        <span>Bookings</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('admin.payments.index') }}">
                        <i class="material-icons">payment</i>
                        <span>Payment</span>
                    </a>
                </li> --}}
                <hr>
                <li>
                    <a href="{{ route('admin.appointment-types.index') }}">
                        <i class="material-icons">photo_album</i>
                        <span>Appointment Type</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.service-names.index') }}">
                        <i class="material-icons">book</i>
                        <span>Service Name</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.companies.index') }}">
                        <i class="material-icons">local_library</i>
                        <span>Company</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.durations.index') }}">
                        <i class="material-icons">watch_later</i>
                        <span>Duration</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}">
                        <i class="material-icons">medical_services</i>
                        <span>Service</span>
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="#" class="toggle-submenu">
                        <i class="material-icons">pages</i>
                        <span>Pages</span>
                        <span class="arrow">&#9654;</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('admin.home') }}">
                                
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.about') }}">
                               
                                <span>About</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.contact') }}">
                               
                                <span>Contact</span>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.teams.index') }}">
                        <i class="material-icons">slideshow</i>
                        <span>Team</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.slider') }}">
                        <i class="material-icons">slideshow</i>
                        <span>Slider</span>
                    </a>
                </li>
              
                <li>
                    <a href="{{ route('admin.contacts.index') }}">
                        <i class="material-icons">contact_emergency</i>
                        <span>Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="material-icons">group</i>
                        <span>User</span>
                    </a>
                </li>
           
                 
              
                {{-- <li>
                    <a href="{{ route('admin.about') }}">
                        <i class="material-icons">group</i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="material-icons">group</i>
                        <span>Home</span>
                    </a>
                </li> --}}
                {{-- <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tag.index') }}">
                        <i class="material-icons">label</i>
                        <span>Tag</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <i class="material-icons">apps</i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.pending') }}">
                        <i class="material-icons">library_books</i>
                        <span>Pending Posts</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/favorite') ? 'active' : '' }}">
                    <a href="{{ route('admin.favorite.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favorite Posts</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/comments') ? 'active' : '' }}">
                    <a href="{{ route('admin.comment.index') }}">
                        <i class="material-icons">comment</i>
                        <span>Comments</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/authors') ? 'active' : '' }}">
                    <a href="{{ route('admin.author.index') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Authors</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <i class="material-icons">subscriptions</i>
                        <span>Subscribers</span>
                    </a>
                </li>
                <li class="header">System</li>

                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
         
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
             <i class="material-icons">input</i>
             <span>Logout</span>
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
        </div>
        {{-- <div class="version">
            <b>Version: </b> 1.0.5
        </div> --}}
    </div>
    <!-- #Footer -->
</aside>
<script>
                  
    document.addEventListener("DOMContentLoaded", function() {
var submenuItems = document.querySelectorAll('.has-submenu > a');

submenuItems.forEach(function(item) {
item.addEventListener('click', function(e) {
e.preventDefault();
var submenu = this.parentElement.querySelector('.submenu');
toggleSubMenu(submenu);
});
});

function toggleSubMenu(submenu) {
submenu.classList.toggle('active');
}
});

  </script>