<!DOCTYPE html>
<html >
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="/admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/admin/assets/libs/css/style.css">
        <link rel="stylesheet" href="/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <title>Print</title>
    </head>
    <body id="reload" style="background-color: white;">
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <div class="dashboard-wrapper">
                <div class="dashboard-influence" id="load">
                    <div class="container-fluid dashboard-content">
                        <div class="row" style="margin-right: 270px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <p class="lead col-md-7">
                                        @if(count($classes) > 0)
                                            @foreach($classes as $class)
                                                @if($class->id == $attendance->classid)
                                                    Attendance For <a href="{{route('staff_class.show', $class->id)}}">{{$class->name}}</a>
                                                @endif
                                            @endforeach
                                        @else
                                            <p style="color: red;">None</p>
                                        @endif
                                    </p>
                                    <p class="lead col-md-5">
                                        Date: {{$attendance->m}} {{$attendance->d}}, {{$attendance->y}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="col-md-12" style="border: 3px solid; border-color: lightgray;">
                                    <thead>
                                        <tr style="border: 3px solid; border-color: lightgray;">
                                            <th style="border: 3px solid; border-color: lightgray; text-align: center;">Names</th>
                                            <th style="border: 3px solid; border-color: lightgray; text-align: center;">Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: 3px solid; border-color: lightgray;">
                                        @if(count($students) > 0 && count($accounts) > 0)
                                            @foreach($students as $student) 
                                                @foreach($accounts as $account) 
                                                    @if($account->studentid == $student->id && $account->classid == $attendance->classid)
                                                        <tr style="border: 3px solid; border-color: lightgray;">
                                                            <td style="border: 3px solid; border-color: lightgray; text-align: center;">
                                                                {{$student->firstname}} {{$student->othernames}}
                                                            </td>
                                                            <td style="border: 3px solid; border-color: lightgray; text-align: center;"> 
                                                                @if(count($attendance_lists) > 0)
                                                                    @foreach($attendance_lists as $attendance_list)
                                                                        @if($attendance_list->attendance == 'Present')
                                                                            <p style="color: green;">Present</p>
                                                                        @elseif($attendance_list->attendance == 'Absent')
                                                                           <p style="color: red;">Absent</p>
                                                                        @else
                                                                           <p style="color: blue;">Not Specified</p>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table><br>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <p>
                                            @if(count($session) > 0)
                                                @foreach($session as $sec)
                                                    @if($sec->id == $attendance->session)
                                                        Session: {{$sec->name}}
                                                    @endif
                                                @endforeach
                                            @else
                                                <p style="color: red;">None</p>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>
                                            @if(count($term) > 0)
                                                @foreach($term as $ter)
                                                    @if($ter->id == $attendance->term)
                                                        Term: {{$ter->name}}
                                                    @endif
                                                @endforeach
                                            @else
                                                <p style="color: red;">None</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-10"><br>
                                        
                                    </div>
                                    <div class="col-md-2"><br>
                                        <a href="" style="padding: 10px; padding-left: 20px; padding-right: 20px; margin-bottom: 20px;" class="btn btn-success">Dowload</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="/admin/assets/libs/js/main-js.js"></script>
    </body>
</html>
                                