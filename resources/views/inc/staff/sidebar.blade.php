        <aside class="menu-sidebar d-none d-lg-block">
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
            <?php 
                use App\Model\subject;
                use App\Model\allocate;
                use App\Model\clas;

                $allocate = allocate::find(1);
                $sujs = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $clss = clas::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
            ?>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{Request::is('staff_portal/staff_index') ? 'active' : ''}}">
                            <a href="{{route('staff_index')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        @if(!empty($allocate) && $allocate->news == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_news') ? 'active' : ''}} {{Request::is('staff_portal/staff_news/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_news/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_news/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_news.index')}}">
                                    <i class="fas fa-newspaper"></i>News
                                </a>
                            </li>
                        @endif
                        @if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_event') ? 'active' : ''}} {{Request::is('staff_portal/staff_event/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_event/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_event/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_event.index')}}">
                                    <i class="fas fa-th-large"></i>Event
                                </a>
                            </li>
                        @endif
                        @if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_gallery') ? 'active' : ''}} {{Request::is('staff_portal/staff_gallery/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_gallery/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_gallery/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_gallery.index')}}">
                                    <i class="fas fa-th"></i>Gallery
                                </a>
                            </li>
                        @endif
                        @if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_subject') ? 'active' : ''}} {{Request::is('staff_portal/staff_subject/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_subject/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_subject/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_subject.index')}}">
                                    <i class="fas fa-bookmark"></i>Subjects
                                </a>
                            </li>
                        @else
                            @if(count($sujs) > 0)
                                <li class="{{Request::is('staff_portal/staff_subject') ? 'active' : ''}} {{Request::is('staff_portal/staff_subject/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_subject/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_subject/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_subject.index')}}">
                                        <i class="fas fa-bookmark"></i>
                                        @if(count($clss) == 1)
                                            Subject
                                        @endif
                                        @if(count($clss) > 1)
                                            Subjects
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if(!empty($allocate) && $allocate->class == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_class') ? 'active' : ''}} {{Request::is('staff_portal/staff_class/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_class/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_class/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_class.index')}}">
                                    <i class="fas fa-warehouse"></i>Classes
                                </a>
                            </li>
                        @else
                            @if(count($clss) > 0)
                                <li class="{{Request::is('staff_portal/staff_class') ? 'active' : ''}} {{Request::is('staff_portal/staff_class/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_class/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_class/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_class.index')}}">
                                        <i class="fas fa-warehouse"></i>
                                        @if(count($clss) == 1)
                                            Class
                                        @endif
                                        @if(count($clss) > 1)
                                            Classes
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_student') ? 'active' : ''}} {{Request::is('staff_portal/staff_student/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_student/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_student/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_student.index')}}">
                                    <i class="fas fa-users"></i>Students
                                </a>
                            </li>
                        @else
                            @if(count($clss) > 0)
                                <li class="{{Request::is('staff_portal/staff_student') ? 'active' : ''}} {{Request::is('staff_portal/staff_student/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_student/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_student/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_student.index')}}">
                                        <i class="fas fa-users"></i>Students
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_staff') ? 'active' : ''}} {{Request::is('staff_portal/staff_staff/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_staff/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_staff/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_staff.index')}}">
                                    <i class="fas fa-user-md"></i>Staffs
                                </a>
                            </li>
                        @endif
                        @if(!empty($allocate) && $allocate->book == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_book') ? 'active' : ''}} {{Request::is('staff_portal/staff_book/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_book/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_book/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_bookt.index')}}">
                                    <i class="fas fa-book"></i>Books
                                </a>
                            </li>
                        @else
                            @if(count($sujs) > 0)
                                <li class="{{Request::is('staff_portal/staff_book') ? 'active' : ''}} {{Request::is('staff_portal/staff_book/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_book/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_book/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_book.index')}}">
                                        <i class="fas fa-book"></i>Books
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if(!empty($allocate) && $allocate->attendance == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_attendance') ? 'active' : ''}} {{Request::is('staff_portal/staff_attendance/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_attendance/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_attendance/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_attendance.index')}}">
                                    <i class="fas fa-check-square"></i>Attendances
                                </a>
                            </li>
                        @else
                            @if(count($clss) > 0)
                                <li class="{{Request::is('staff_portal/staff_attendance') ? 'active' : ''}} {{Request::is('staff_portal/staff_attendance/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_attendance/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_attendance/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_attendance.index')}}">
                                        <i class="fas fa-check-square"></i>Attendances
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if(!empty($allocate) && $allocate->payment == Auth::guard('staff')->user()->id)
                            <li>
                                <a href="{{route('staff_payment.index')}}">
                                    <i class="fas fa-fw fa-credit-card"></i>Payment
                                </a>
                            </li>
                        @endif
                        @if(!empty($allocate) && $allocate->message == Auth::guard('staff')->user()->id)
                            <li>
                                <a href="{{route('staff_message.index')}}">
                                    <i class="fas fa-envelope"></i>Messages
                                </a>
                            </li>
                        @endif
                        
                        @if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_syllabus') ? 'active' : ''}} {{Request::is('staff_portal/staff_syllabus/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_syllabus/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_syllabus/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_syllabus.index')}}">
                                    <i class="fas fa-archive"></i>Syllabus
                                </a>
                            </li>
                        @else
                            @if(count($sujs) > 0)
                                <li class="{{Request::is('staff_portal/staff_syllabus') ? 'active' : ''}} {{Request::is('staff_portal/staff_syllabus/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_syllabus/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_syllabus/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_syllabus.index')}}">
                                        <i class="fas fa-archive"></i>Syllabus
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if(!empty($allocate) && $allocate->hostel == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_hostel') ? 'active' : ''}} {{Request::is('staff_portal/staff_hostel/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_hostel/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_hostel/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_hostel.index')}}">
                                    <i class="fas fa-home"></i>Hostel
                                </a>
                            </li>
                        @endif
                        @if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id)
                            <li class="{{Request::is('staff_portal/staff_library') ? 'active' : ''}} {{Request::is('staff_portal/staff_library/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_library/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_library/'.$id.'/edit') ? 'active' : ''}}">
                                <a href="{{route('staff_library.index')}}">
                                    <i class="fas fa-book"></i>Library
                                </a>
                            </li>
                        @else
                            @if(count($sujs) > 0)
                                <li class="{{Request::is('staff_portal/staff_library') ? 'active' : ''}} {{Request::is('staff_portal/staff_library/create') ? 'active' : ''}} {{Request::is('staff_portal/staff_library/'.$id) ? 'active' : ''}} {{Request::is('staff_portal/staff_library/'.$id.'/edit') ? 'active' : ''}}">
                                    <a href="{{route('staff_library.index')}}">
                                        <i class="fas fa-book"></i>Library
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>