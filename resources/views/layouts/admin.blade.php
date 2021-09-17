<!DOCTYPE html>
<html >
    <head>
        <?php
            use App\Model\site;
            $site = site::find(1);
            echo'<link rel="shortcut icon" type="image/x-icon" href="'.asset('/storage/image/site/'.$site->image).'">';

            use App\Model\staff;
            use App\Model\clas;
            use App\Model\payment;
            use App\Model\session;
            use App\Model\term;
            $staffs = staff::all()->where('status', 'Active')->sortBy('id',0, 'desc');
            $payms = payment::where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();
            if(!empty($payms)){
                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');
                foreach ($payms as $paymt) {
                    if($paymt->m.' '.$paymt->y == date('M').' '.date('Y')){
                        //echo 'Equal';
                    }else{
                        $pay = new payment;
                        $pay->classid = $paymt->classid;
                        $pay->name =  $paymt->name;
                        $pay->staffid =  $paymt->staffid;
                        $pay->to_pay =  $paymt->to_pay;
                        $pay->accounttype = $paymt->accounttype;
                        $pay->accountname = $paymt->accountname;
                        $pay->accountnumber = $paymt->accountnumber;
                        $pay->bank =$paymt->bank;
                        $pay->paymentstatus = $paymt->paymentstatus;
                        $pay->infostatus = $paymt->infostatus;
                        $pay->paymentstatus = $paymt->paymentstatus;
                            if(count($session) > 0){
                                foreach($session as $sec){
                                    if(count($term) > 0){
                                        foreach($term as $ter){
                                            $pay->session = $sec->id;
                                            $pay->term = $ter->id;
                                        }
                                    }else{
                                        $pay->term = $paymt->term;
                                    }
                                }
                            }else{
                                $pay->session = $paymt->session;
                            }
                        $pay->status = 'Active';
                        $pay->time = date('h:i:s');//time();
                        $pay->d = date('d');
                        $pay->m = date('M');
                        $pay->y = date('Y');
                        $pay->save();
                    }
                }
            }
        ?>
        @if(Request::is('main_controller_panel/dashboard'))
            @include('inc.admin.dashboard.index')
        @endif

        @if(Request::is('main_controller_panel/events'))
            @include('inc.admin.event.index')
        @endif
        @if(Request::is('main_controller_panel/events/create'))
            @include('inc.admin.event.create.index')
        @endif
        @if(Request::is('main_controller_panel/events/'.$id))
            @include('inc.admin.event.view.index')
        @endif
        @if(Request::is('main_controller_panel/events/'.$id.'/edit'))
            @include('inc.admin.event.edit.index')
        @endif

        @if(Request::is('main_controller_panel/news'))
            @include('inc.admin.new.index')
        @endif
        @if(Request::is('main_controller_panel/news/create'))
            @include('inc.admin.new.create.index')
        @endif
        @if(Request::is('main_controller_panel/news/'.$id))
            @include('inc.admin.new.view.index')
        @endif
        @if(Request::is('main_controller_panel/news/'.$id.'/edit'))
            @include('inc.admin.new.edit.index')
        @endif

        @if(Request::is('main_controller_panel/galleries'))
            @include('inc.admin.gallery.index')
        @endif
        @if(Request::is('main_controller_panel/galleries/create'))
            @include('inc.admin.gallery.create.index')
        @endif
        @if(Request::is('main_controller_panel/galleries/'.$id.'/edit'))
            @include('inc.admin.gallery.edit.index')
        @endif

        @if(Request::is('main_controller_panel/classes'))
            @include('inc.admin.class.index')
        @endif
        @if(Request::is('main_controller_panel/classes/create'))
            @include('inc.admin.class.create.index')
        @endif
        @if(Request::is('main_controller_panel/classes/'.$id))
            @include('inc.admin.class.view.index')
        @endif
        @if(Request::is('main_controller_panel/classes/'.$id.'/edit'))
            @include('inc.admin.class.edit.index')
        @endif

        @if(Request::is('main_controller_panel/attendances'))
            @include('inc.admin.attendance.index')
        @endif
        @if(Request::is('main_controller_panel/attendances/create'))
            @include('inc.admin.attendance.create.index')
        @endif
        @if(Request::is('main_controller_panel/attendances/'.$id))
            @include('inc.admin.attendance.view.index')
        @endif
        @if(Request::is('main_controller_panel/attendances/'.$id.'/edit'))
            @include('inc.admin.attendance.edit.index')
        @endif

        @if(Request::is('main_controller_panel/hostels'))
            @include('inc.admin.hostel.index')
        @endif
        @if(Request::is('main_controller_panel/hostels/create'))
            @include('inc.admin.hostel.create.index')
        @endif
        @if(Request::is('main_controller_panel/hostels/'.$id))
            @include('inc.admin.hostel.view.index')
        @endif
        @if(Request::is('main_controller_panel/hostels/'.$id.'/edit'))
            @include('inc.admin.hostel.edit.index')
        @endif

        @if(Request::is('main_controller_panel/library'))
            @include('inc.admin.library.index')
        @endif
        @if(Request::is('main_controller_panel/library/create'))
            @include('inc.admin.library.create.index')
        @endif
        @if(Request::is('main_controller_panel/library/'.$id))
            @include('inc.admin.library.view.index')
        @endif
        @if(Request::is('main_controller_panel/library/'.$id.'/edit'))
            @include('inc.admin.library.edit.index')
        @endif

        @if(Request::is('main_controller_panel/syllabus'))
            @include('inc.admin.syllabus.index')
        @endif
        @if(Request::is('main_controller_panel/syllabus/create'))
            @include('inc.admin.syllabus.create.index')
        @endif
        @if(Request::is('main_controller_panel/syllabus/'.$id))
            @include('inc.admin.syllabus.view.index')
        @endif
        @if(Request::is('main_controller_panel/syllabus/'.$id.'/edit'))
            @include('inc.admin.syllabus.edit.index')
        @endif

        @if(Request::is('main_controller_panel/books'))
            @include('inc.admin.book.index')
        @endif
        @if(Request::is('main_controller_panel/books/create'))
            @include('inc.admin.book.create.index')
        @endif
        @if(Request::is('main_controller_panel/books/'.$id))
            @include('inc.admin.book.view.index')
        @endif
        @if(Request::is('main_controller_panel/books/'.$id.'/edit'))
            @include('inc.admin.book.edit.index')
        @endif

        @if(Request::is('main_controller_panel/idcards'))
            @include('inc.admin.idcards.index')
        @endif
        @if(Request::is('main_controller_panel/idcards/'.$id))
            @include('inc.admin.idcards.single.index')
        @endif

        @if(Request::is('main_controller_panel/subjects'))
            @include('inc.admin.subject.index')
        @endif
        @if(Request::is('main_controller_panel/subjects/create'))
            @include('inc.admin.subject.create.index')
        @endif
        @if(Request::is('main_controller_panel/subjects/'.$id))
            @include('inc.admin.subject.view.index')
        @endif
        @if(Request::is('main_controller_panel/subjects/'.$id.'/edit'))
            @include('inc.admin.subject.edit.index')
        @endif

        @if(Request::is('main_controller_panel/staffs'))
            @include('inc.admin.staff.index')
        @endif
        @if(Request::is('main_controller_panel/staffs/create'))
            @include('inc.admin.staff.create.index')
        @endif
        @if(Request::is('main_controller_panel/staffs/'.$id))
            @include('inc.admin.staff.view.index')
        @endif
        @if(Request::is('main_controller_panel/staffs/'.$id.'/edit'))
            @include('inc.admin.staff.edit.index')
        @endif

        @if(Request::is('main_controller_panel/students'))
            @include('inc.admin.student.index')
        @endif
        @if(Request::is('main_controller_panel/students/create'))
            @include('inc.admin.student.create.index')
        @endif
        @if(Request::is('main_controller_panel/students/'.$id))
            @include('inc.admin.student.view.index')
        @endif
        @if(Request::is('main_controller_panel/students/'.$id.'/edit'))
            @include('inc.admin.student.edit.index')
        @endif

        @if(Request::is('main_controller_panel/messages'))
            @include('inc.admin.message.index')
        @endif

        @if(Request::is('main_controller_panel/payments'))
            @include('inc.admin.account.index')
        @endif

        @if(Request::is('main_controller_panel/settings'))
            @include('inc.admin.setting.index')
        @endif
        @if(Request::is('main_controller_panel/setting'))
            @include('inc.admin.setting.index')
        @endif

        @if(Request::is('main_controller_panel/trash'))
            @include('inc.admin.trash.index')
        @endif

        @if(Request::is('main_controller_panel/assignments'))
            @include('inc.admin.assignment.index')
        @endif
        @if(Request::is('main_controller_panel/assignments/create'))
            @include('inc.admin.assignment.create.index')
        @endif
        @if(Request::is('main_controller_panel/assignments/'.$id.'/edit'))
            @include('inc.admin.assignment.edit.index')
        @endif
        @if(Request::is('main_controller_panel/assignments/'.$id))
            @include('inc.admin.assignment.view.index')
        @endif
    </head>
    <body id="reload">
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            @include('inc.admin.navbar')
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            @include('inc.admin.sidebar')
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="dashboard-influence" id="load">
                    @yield('content')
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                @include('inc.admin.footer')
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        @if(Request::is('main_controller_panel/dashboard'))
            @include('inc.admin.dashboard.exit')
        @endif

        @if(Request::is('main_controller_panel/events'))
            @include('inc.admin.event.exit')
        @endif
        @if(Request::is('main_controller_panel/events/create'))
            @include('inc.admin.event.create.exit')
        @endif
        @if(Request::is('main_controller_panel/events/'.$id))
            @include('inc.admin.event.view.exit')
        @endif
        @if(Request::is('main_controller_panel/events/'.$id.'/edit'))
            @include('inc.admin.event.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/news'))
            @include('inc.admin.new.exit')
        @endif
        @if(Request::is('main_controller_panel/news/create'))
            @include('inc.admin.new.create.exit')
        @endif
        @if(Request::is('main_controller_panel/news/'.$id))
            @include('inc.admin.new.view.exit')
        @endif
        @if(Request::is('main_controller_panel/news/'.$id.'/edit'))
            @include('inc.admin.new.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/galleries'))
            @include('inc.admin.gallery.exit')
        @endif
        @if(Request::is('main_controller_panel/galleries/create'))
            @include('inc.admin.gallery.create.exit')
        @endif
        @if(Request::is('main_controller_panel/galleries/'.$id.'/edit'))
            @include('inc.admin.gallery.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/classes'))
            @include('inc.admin.class.exit')
        @endif
        @if(Request::is('main_controller_panel/classes/create'))
            @include('inc.admin.class.create.exit')
        @endif
        @if(Request::is('main_controller_panel/classes/'.$id))
            @include('inc.admin.class.view.exit')
        @endif
        @if(Request::is('main_controller_panel/classes/'.$id.'/edit'))
            @include('inc.admin.class.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/attendances'))
            @include('inc.admin.attendance.exit')
        @endif
        @if(Request::is('main_controller_panel/attendances/create'))
            @include('inc.admin.attendance.create.exit')
        @endif
        @if(Request::is('main_controller_panel/attendances/'.$id))
            @include('inc.admin.attendance.view.exit')
        @endif
        @if(Request::is('main_controller_panel/attendances/'.$id.'/edit'))
            @include('inc.admin.attendance.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/hostels'))
            @include('inc.admin.hostel.exit')
        @endif
        @if(Request::is('main_controller_panel/hostels/create'))
            @include('inc.admin.hostel.create.exit')
        @endif
        @if(Request::is('main_controller_panel/hostels/'.$id))
            @include('inc.admin.hostel.view.exit')
        @endif
        @if(Request::is('main_controller_panel/hostels/'.$id.'/edit'))
            @include('inc.admin.hostel.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/library'))
            @include('inc.admin.library.exit')
        @endif
        @if(Request::is('main_controller_panel/library/create'))
            @include('inc.admin.library.create.exit')
        @endif
        @if(Request::is('main_controller_panel/library/'.$id))
            @include('inc.admin.library.view.exit')
        @endif
        @if(Request::is('main_controller_panel/library/'.$id.'/edit'))
            @include('inc.admin.library.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/syllabus'))
            @include('inc.admin.syllabus.exit')
        @endif
        @if(Request::is('main_controller_panel/syllabus/create'))
            @include('inc.admin.syllabus.create.exit')
        @endif
        @if(Request::is('main_controller_panel/syllabus/'.$id))
            @include('inc.admin.syllabus.view.exit')
        @endif
        @if(Request::is('main_controller_panel/syllabus/'.$id.'/edit'))
            @include('inc.admin.syllabus.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/idcards'))
            @include('inc.admin.idcards.exit')
        @endif
        @if(Request::is('main_controller_panel/idcards/'.$id))
            @include('inc.admin.idcards.single.exit')
        @endif

        @if(Request::is('main_controller_panel/books'))
            @include('inc.admin.book.exit')
        @endif
        @if(Request::is('main_controller_panel/books/create'))
            @include('inc.admin.book.create.exit')
        @endif
        @if(Request::is('main_controller_panel/books/'.$id))
            @include('inc.admin.book.view.exit')
        @endif
        @if(Request::is('main_controller_panel/books/'.$id.'/edit'))
            @include('inc.admin.book.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/subjects'))
            @include('inc.admin.subject.exit')
        @endif
        @if(Request::is('main_controller_panel/subjects/create'))
            @include('inc.admin.subject.create.exit')
        @endif
        @if(Request::is('main_controller_panel/subjects/'.$id))
            @include('inc.admin.subject.view.exit')
        @endif
        @if(Request::is('main_controller_panel/subjects/'.$id.'/edit'))
            @include('inc.admin.subject.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/staffs'))
            @include('inc.admin.staff.exit')
        @endif
        @if(Request::is('main_controller_panel/staffs/create'))
            @include('inc.admin.staff.create.exit')
        @endif
        @if(Request::is('main_controller_panel/staffs/'.$id))
            @include('inc.admin.staff.view.exit')
        @endif
        @if(Request::is('main_controller_panel/staffs/'.$id.'/edit'))
            @include('inc.admin.staff.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/students'))
            @include('inc.admin.student.exit')
        @endif
        @if(Request::is('main_controller_panel/students/create'))
            @include('inc.admin.student.create.exit')
        @endif
        @if(Request::is('main_controller_panel/students/'.$id))
            @include('inc.admin.student.view.exit')
        @endif
        @if(Request::is('main_controller_panel/students/'.$id.'/edit'))
            @include('inc.admin.student.edit.exit')
        @endif

        @if(Request::is('main_controller_panel/messages'))
            @include('inc.admin.message.exit')
        @endif

        @if(Request::is('main_controller_panel/payments'))
            @include('inc.admin.account.exit')
        @endif

        @if(Request::is('main_controller_panel/settings'))
            @include('inc.admin.setting.exit')
        @endif       
        @if(Request::is('main_controller_panel/setting'))
            @include('inc.admin.setting.exit')
        @endif

        @if(Request::is('main_controller_panel/trash'))
            @include('inc.admin.trash.exit')
        @endif

        @if(Request::is('main_controller_panel/assignments'))
            @include('inc.admin.assignment.exit')
        @endif
        @if(Request::is('main_controller_panel/assignments/create'))
            @include('inc.admin.assignment.create.exit')
        @endif
        @if(Request::is('main_controller_panel/assignments/'.$id.'/edit'))
            @include('inc.admin.assignment.edit.exit')
        @endif
        @if(Request::is('main_controller_panel/assignments/'.$id))
            @include('inc.admin.assignment.view.exit')
        @endif
    </body>
</html>