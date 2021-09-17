    <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    @if(!empty($site->image) &&  file_exists(storage_path().'/app/public/image/site/'.$site->image))
                        <div class="m-r-10">
                            <img src="{{asset('/storage/image/site/'.$site->image)}}" alt="user" width="50">
                        </div>
                    @else
                        <div class="m-r-10">
                            <img src="/admin/assets/images/dribbble.png" alt="user" width="50">
                        </div>
                    @endif
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
                        <div class="image img-cir img-120">
                            <img src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="John Doe">
                        </div>
                    @else
                        <div class="image img-cir img-120">
                            <img src="/student/images/icon/avatar-big-01.jpg" alt="John Doe">
                        </div>
                    @endif
                    <h4 class="name">{{$student->firstname}} {{$student->othernames}}</h4>
                    <a href="{{route('student.logout')}}">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{Request::is('student_portal/student') ? 'active' : ''}}">
                            <a class="js-arrow" href="{{route('student_dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="{{Request::is('student_portal/class') ? 'active' : ''}}">
                            <a href="{{route('class.index')}}">
                                <i class="fas fa-group"></i>Class
                            </a>
                        </li>
                        <li class="{{Request::is('student_portal/subject') ? 'active' : ''}}">
                            <a href="{{route('subject.index')}}">
                                <i class="fas fa-paste"></i>Subjects
                            </a>
                        </li>
                        <li class="{{Request::is('student_portal/book') ? 'active' : ''}}">
                            <a class="js-arrow" href="{{route('book.index')}}">
                                <i class="fas fa-book"></i>Books
                            </a>
                        </li>
                        <li class="{{Request::is('student_portal/message') ? 'active' : ''}}">
                            <a class="js-arrow" href="{{route('message.index')}}">
                                <i class="fas fa-envelope"></i>Message
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->