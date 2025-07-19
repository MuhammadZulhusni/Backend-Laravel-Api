<div class="nav-header">
    <a href="#" class="brand-logo">
        {{-- Dashboard logo --}}
        <img src="{{ asset('backend/images/api-backend.png')}}" alt="Dashboard Logo" class="img-fluid">
    </a>

    {{-- Hamburger icon for toggling the sidebar on smaller screens --}}
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    {{-- This area can be used for search bars, breadcrumbs, or other left-aligned elements --}}
                </div>

                <ul class="navbar-nav header-right main-notification">
                    {{-- User Profile Dropdown --}}
                    <li class="nav-item dropdown header-profile">
                        {{-- PHP block to retrieve authenticated user data --}}
                        @php
                            $id = Auth::user()->id;
                            $user = App\Models\User::find($id);
                        @endphp

                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{-- Display user's profile image with a fallback to a default image --}}
                            <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" width="20" alt="User Profile" class="img-fluid rounded-circle">
                            <div class="header-info">
                                <span class="text-capitalize">{{ $user->name }}</span> {{-- Display user's name --}}
                                <small>Super Admin</small> {{-- Display user's role --}}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- Dropdown item for viewing user profile --}}
                            <a href="{{ route('user.profile') }}" class="dropdown-item ai-icon">
                                <i class="fa fa-user-circle"></i>
                                <span class="ml-2">Profile</span>
                            </a>
                            {{-- Dropdown item for changing password --}}
                            <a href="{{ route('change.password') }}" class="dropdown-item ai-icon">
                                <i class="fa fa-key"></i>
                                <span class="ml-2">Change Password</span>
                            </a>
                            {{-- Dropdown item for logging out --}}
                            <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>