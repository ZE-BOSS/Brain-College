<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active">
                            <a href="{{route('staff_index')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_event.index')}}">
                                <i class="fas fa-table"></i>Event
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_gallery.index')}}">
                                <i class="fas fa-table"></i>Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_subject.index')}}">
                                <i class="fas fa-file-text"></i>Subjects
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_class.index')}}">
                                <i class="fas fa-table"></i>Classes
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_student.index')}}">
                                <i class="fas fa-users"></i>Students
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_staff.index')}}">
                                <i class="fas fa-users"></i>Staffs
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_book.index')}}">
                                <i class="fas fa-book"></i>Books
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_attendance.index')}}">
                                <i class="fas fa-check-square"></i>Attendance
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_assignment.index')}}">
                                <i class="fas fa-list-alt"></i>Assignments
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-desktop"></i>CBT Test
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_message.index')}}">
                                <i class="fas fa-comment"></i>Messages
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_syllabus.index')}}">
                                <i class="fas fa-archive"></i>Syllabus
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_hostel.index')}}">
                                <i class="fas fa-home"></i>Hostel
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff_library.index')}}">
                                <i class="fas fa-tasks"></i>Library
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-laptop"></i>E-Learning
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#"><i class="fas fa-video-camera"></i>Live Video Class</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-comments"></i>Live Chat Class</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-edit (alias)"></i>Tutorials</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>