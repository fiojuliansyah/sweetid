<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    @if(Auth::user()->profile?->avatar != null)
                    <img src="{{ Storage::url(Auth::user()->profile->avatar) }}" width="20" alt="">    
                    @else
                    <img src="{{asset('/storage/avatars/default.png')}}"  alt="">      
                    @endif
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi, <b>{{ Auth::user()->name }}</b></span>
                        <small class="text-end font-w400">{{ Auth::user()->email }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="ms-2">Logout </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <li>
                <a href="{{ route('member.dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.market') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Class Market</span>
                </a>
            </li>
            <div class="copyright">
                <p><strong>Admin Side</strong></p>
            </div>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transactions.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">Transaction</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Courses & Sessions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('classtypes.index') }}">Class Types</a></li>
                    <li><a href="{{ route('categories.index') }}">Class Categories</a></li>
                    <li><a href="{{ route('rooms.index') }}">Class Room</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Add New</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('roles.index') }}">Online Course</a></li>
                            <li><a href="{{ route('roles.index') }}">Training Session</a></li>
                            <li><a href="{{ route('roles.index') }}">Training Session Online</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <div class="copyright">
                <p><strong>Server Side</strong></p>
            </div>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-050-info"></i>
                    <span class="nav-text">Server Side</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('cruds.index') }}">CRUD Module</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Roles & Permissions</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li><a href="#">Permissions</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
