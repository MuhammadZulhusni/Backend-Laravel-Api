<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="deznav"> {{-- Main navigation wrapper. --}}
    <div class="deznav-scroll"> {{-- Scrollable area for the navigation menu. --}}
        <ul class="metismenu" id="menu"> {{-- MetisMenu-enabled navigation list. --}}

            {{-- Dashboard Navigation Section --}}
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-tachometer-alt"></i> {{-- Font Awesome: Dashboard icon --}}
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li> {{-- Dashboard link. --}}
                </ul>
            </li>

            {{-- User Profile Navigation Section --}}
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> {{-- Font Awesome: User profile icon --}}
                    <span class="nav-text">User Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.profile') }}">User Profile</a></li> {{-- User Profile link. --}}
                    <li><a href="{{ route('change.password') }}">Change Password</a></li> {{-- Change Password link. --}}
                </ul>
            </li>

            {{-- Information Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-info-circle"></i> {{-- Font Awesome: Information icon --}}
                    <span class="nav-text">Information</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.information') }}">All Information</a></li> {{-- Link to view all information. --}}
                    <li><a href="{{ route('add.information') }}">Add Information </a></li> {{-- Link to add new information. --}}
                </ul>
            </li>

            {{-- Services Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-handshake"></i> {{-- Font Awesome: Handshake/Services icon --}}
                    <span class="nav-text">Services</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.services') }}">All Services</a></li> {{-- Link to view all services. --}}
                    <li><a href="{{ route('add.services') }}">Add Services </a></li> {{-- Link to add new services. --}}
                </ul>
            </li>

            {{-- Our Projects Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-project-diagram"></i> {{-- Font Awesome: Project diagram icon --}}
                    <span class="nav-text">Our Projects</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.projects') }}">All Projects</a></li> {{-- Link to view all projects. --}}
                    <li><a href="{{ route('add.projects') }}">Add Projects </a></li> {{-- Link to add new projects. --}}
                </ul>
            </li>

            {{-- Our Courses Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-graduation-cap"></i> {{-- Font Awesome: Graduation cap/Courses icon --}}
                    <span class="nav-text">Our Courses</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.courses') }}">All Courses</a></li> {{-- Link to view all courses. --}}
                    <li><a href="{{ route('add.courses') }}">Add Courses </a></li> {{-- Link to add new courses. --}}
                </ul>
            </li>

            {{-- Home Content Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-home"></i> {{-- Font Awesome: Home icon --}}
                    <span class="nav-text">Home Content</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.home.content') }}">All Home Content</a></li> {{-- Link to view all home content. --}}
                    <li><a href="{{ route('add.home.content') }}">Add Home Content </a></li> {{-- Link to add new home content. --}}
                </ul>
            </li>

            {{-- Client Review Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-comments"></i> {{-- Font Awesome: Comments/Review icon --}}
                        <span class="nav-text">Client Review </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.review') }}">All Review</a></li>
                    <li><a href="{{ route('add.review') }}">Add Review </a></li>    
                </ul>
            </li>

            {{-- Footer Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-shoe-prints"></i> {{-- Font Awesome: Shoe prints/Footer icon (conceptual for bottom of page) --}}
                            <span class="nav-text">Footer Content </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.footer.content') }}">All Footer Content</a></li>     
                </ul>
            </li>

            {{-- Chart Management Section --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chart-bar"></i> {{-- Font Awesome: Bar chart icon --}}
                        <span class="nav-text">Chart Content </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.chart.content') }}">All Chart Content</a></li>          
                </ul>
            </li>

            {{-- Contact Management --}}
            <li><a href="{{ route('contact.message') }}" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-envelope"></i> {{-- Font Awesome: Envelope icon for contact messages --}}
                    <span class="nav-text">Contact Message</span>
                </a>
            </li>
        </ul>
    </div>
</div>


<style>

/* For hover effect */
.deznav .metismenu a:hover,
.deznav .metismenu a:focus {
    color: #fff; /* Example color */
    background-color: #555; /* Example background */
}

/* For active link */
.deznav .metismenu .mm-active > a, /* For parent with children */
.deznav .metismenu a.active, /* For direct link */
.deznav .metismenu a.current-page { /* Another common class name */
    color: #fff;
    background-color: #6a0dad; /* A distinct purple for active */
    border-left: 4px solid #f0f0f0; /* Highlight on the side */
}

</style>