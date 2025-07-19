<div class="deznav"> {{-- Main navigation wrapper. --}}
    <div class="deznav-scroll"> {{-- Scrollable area for the navigation menu. --}}
        <ul class="metismenu" id="menu"> {{-- MetisMenu-enabled navigation list. --}}

            {{-- Dashboard Navigation Section --}}
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html">Dashboard</a></li> {{-- Dashboard link. --}}
                </ul>
            </li>

            {{-- User Profile Navigation Section --}}
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">User Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.profile') }}">User Profile</a></li> {{-- User Profile link. --}}
                    <li><a href="{{ route('change.password') }}">Change Password</a></li> {{-- Change Password link. --}}
                </ul>
            </li>

            {{-- Information Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-061-puzzle"></i>
                    <span class="nav-text">Information</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.information') }}">All Information</a></li> {{-- Link to view all information. --}}
                    <li><a href="{{ route('add.information') }}">Add Information </a></li> {{-- Link to add new information. --}}
                </ul>
            </li>

            {{-- Services Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-003-diamond"></i>
                    <span class="nav-text">Services</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.services') }}">All Services</a></li> {{-- Link to view all services. --}}
                    <li><a href="{{ route('add.services') }}">Add Services </a></li> {{-- Link to add new services. --}}
                </ul>
            </li>

            {{-- Our Projects Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                    <span class="nav-text">Our Projects</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.projects') }}">All Projects</a></li> {{-- Link to view all projects. --}}
                    <li><a href="{{ route('add.projects') }}">Add Projects </a></li> {{-- Link to add new projects. --}}
                </ul>
            </li>

            {{-- Our Courses Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                    <span class="nav-text">Our Courses</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.courses') }}">All Courses</a></li> {{-- Link to view all courses. --}}
                    <li><a href="{{ route('add.courses') }}">Add Courses </a></li> {{-- Link to add new courses. --}}
                </ul>
            </li>

            {{-- Home Content Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                    <span class="nav-text">Home Content</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.home.content') }}">All Home Content</a></li> {{-- Link to view all home content. --}}
                    <li><a href="{{ route('add.home.content') }}">Add Home Content </a></li> {{-- Link to add new home content. --}}
                </ul>
            </li>

            {{-- Client Review Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                        <span class="nav-text">Client Review </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.review') }}">All Review</a></li>
                    <li><a href="{{ route('add.review') }}">Add Review </a></li>    
                </ul>
            </li>

            {{-- Footer Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                            <span class="nav-text">Footer Content </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.footer.content') }}">All Footer Content</a></li>     
                </ul>
            </li>

            {{-- Chart Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                        <span class="nav-text">Chart Content </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.chart.content') }}">All Chart Content</a></li>          
                </ul>
            </li>

            {{-- Contact Management --}}
            <li><a href="{{ route('contact.message') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Contact Message</span>
                </a>
            </li>
        </ul>

        {{-- Copyright Information Section --}}
        <div class="copyright">
            <p><strong>Easy React Admin Dashboard</strong> © 2021 All Rights Reserved</p> {{-- Copyright text. --}}
            <p class="fs-12">Made with <span class="heart"></span> by Zulhusni</p> {{-- Attribution text. --}}
        </div>
    </div>
</div>