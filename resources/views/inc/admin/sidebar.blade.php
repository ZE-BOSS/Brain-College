<div class="nav-left-sidebar sidebar-dark" style="padding-bottom: 100px;">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{Request::is('main_controller_panel/dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}">
                            <i class=" fas fa-tachometer-alt"></i> Dashboard 
                            <span class="badge badge-success">6</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/galleries') ? 'active' : ''}} {{Request::is('main_controller_panel/galleries/create') ? 'active' : ''}} {{Request::is('main_controller_panel/galleries/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/galleries/'.$id.'/edit') ? 'active' : ''}}" href="{{route('galleries.index')}}">
                            <i class="fas fa-fw fa-th"></i> Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/news') ? 'active' : ''}} {{Request::is('main_controller_panel/news/create') ? 'active' : ''}} {{Request::is('main_controller_panel/news/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/news/'.$id.'/edit') ? 'active' : ''}}" href="{{route('news.index')}}">
                            <i class="fa fa-fw fa-newspaper"></i> News
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/events') ? 'active' : ''}} {{Request::is('main_controller_panel/events/create') ? 'active' : ''}} {{Request::is('main_controller_panel/events/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/events/'.$id.'/edit') ? 'active' : ''}}" href="{{route('events.index')}}">
                            <i class="fa fa-fw fa-th-large"></i> Events
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{Request::is('main_controller_panel/classes') ? 'active' : ''}} {{Request::is('main_controller_panel/classes/create') ? 'active' : ''}} {{Request::is('main_controller_panel/clssses/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/classes/'.$id.'/edit') ? 'active' : ''}}" href="{{route('classes.index')}}">
                            <i class="fas fa-warehouse"></i> Classes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/subjects') ? 'active' : ''}} {{Request::is('main_controller_panel/subjects/create') ? 'active' : ''}} {{Request::is('main_controller_panel/subjects/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/subjects/'.$id.'/edit') ? 'active' : ''}}" href="{{route('subjects.index')}}">
                            <i class="fas fa-fw fa-bookmark"></i> Subjects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/books') ? 'active' : ''}} {{Request::is('main_controller_panel/books/create') ? 'active' : ''}} {{Request::is('main_controller_panel/books/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/books/'.$id.'/edit') ? 'active' : ''}}" href="{{route('books.index')}}">
                            <i class="fas fa-fw fa-book"></i> Books 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/staffs') ? 'active' : ''}} {{Request::is('main_controller_panel/staffs/create') ? 'active' : ''}} {{Request::is('main_controller_panel/staffs/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/staffs/'.$id.'/edit') ? 'active' : ''}}" href="{{route('staffs.index')}}">
                            <i class="fas fa-fw fa-user-md"></i> Staffs 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/students') ? 'active' : ''}} {{Request::is('main_controller_panel/students/create') ? 'active' : ''}} {{Request::is('main_controller_panel/students/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/students/'.$id.'/edit') ? 'active' : ''}}" href="{{route('students.index')}}">
                            <i class="fas fa-fw fa-users"></i> Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/messages') ? 'active' : ''}}" href="{{route('messages.index')}}">
                            <i class="fas fa-fw fa-envelope"></i> Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/payments') ? 'active' : ''}}" href="{{route('payments.index')}}">
                            <i class="fas fa-fw fa-credit-card"></i> Payments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/trash') ? 'active' : ''}}" href="{{route('trash.index')}}">
                            <i class="fas fa-trash-alt"></i> Trash
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/hostels') ? 'active' : ''}} {{Request::is('main_controller_panel/hostels/create') ? 'active' : ''}} {{Request::is('main_controller_panel/hostels/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/hostels/'.$id.'/edit') ? 'active' : ''}}" href="{{route('hostels.index')}}">
                            <i class="fas fa-fw fa-home"></i> Hostel
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/library') ? 'active' : ''}} {{Request::is('main_controller_panel/library/create') ? 'active' : ''}} {{Request::is('main_controller_panel/library/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/library/'.$id.'/edit') ? 'active' : ''}}" href="{{route('library.index')}}">
                            <i class="fas fa-fw fa-book"></i> Library
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/attendances') ? 'active' : ''}} {{Request::is('main_controller_panel/attendances/create') ? 'active' : ''}} {{Request::is('main_controller_panel/attendances/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/attendances/'.$id.'/edit') ? 'active' : ''}}" href="{{route('attendances.index')}}">
                            <i class="fas fa-fw fa-check"></i> Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/syllabus') ? 'active' : ''}} {{Request::is('main_controller_panel/syllabus/create') ? 'active' : ''}} {{Request::is('main_controller_panel/syllabus/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/syllabus/'.$id.'/edit') ? 'active' : ''}}" href="{{route('syllabus.index')}}">
                            <i class="fas fa-fw fa-archive"></i> Syllabus
                        </a>
                    </li>
                    <li class="nav-divider">
                        Other Features
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('main_controller_panel/assignments') ? 'active' : ''}} {{Request::is('main_controller_panel/assignments/create') ? 'active' : ''}} {{Request::is('main_controller_panel/assignments/'.$id) ? 'active' : ''}} {{Request::is('main_controller_panel/assignments/'.$id.'/edit') ? 'active' : ''}}" href="{{route('assignments.index')}}">
                            <i class="fab fa-fw fa-wpforms"></i> Assignment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('#') ? 'active' : ''}}" href="#">
                            <i class="fas fa-fw fa-percent"></i> CBT Tests
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#tmubmenu-1" aria-controls="tmubmenu-1"><i class="fas fa-fw fa-laptop"></i>E-learning</a>
                        <div id="tmubmenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('#') ? 'active' : ''}}" href="#">
                                        <i class="fas fa-fw fa-video"></i> Live Video Class
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('#') ? 'active' : ''}}" href="#">
                                        <i class="fab fa-fw fa-rocketchat"></i> Live Chat Class
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('#') ? 'active' : ''}}" href="#">
                                        <i class="fas fa-fw fa-file-pdf"></i> Tutorials
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>