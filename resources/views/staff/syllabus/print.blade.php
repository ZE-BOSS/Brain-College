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
                                <div class="simple-card">
                                    @if(count($subjects) > 0 && count($classes) > 0)
                                        @foreach($classes as $class)
                                            @foreach($subjects as $subject)
                                                @if($subject->id == $syllabus->subjectid && $class->id == $syllabus->classid)
                                                    <p style="font-size: 35px; padding: 20px; text-align: center;">Syllabus For <a href="{{route('staff_subject.show', $subject->id)}}"> {{$subject->name}}</a>, <a href="{{route('staff_class.show', $class->id)}}"> {{$class->name}}</a></p>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @else
                                        <p style="color: red;">Subject</p>
                                    @endif
                                    @if(count($syll_lists) > 0)
                                        @php $i = 1; @endphp
                                        @foreach($syll_lists as $syll_list)
                                            <div class="row" style="padding-left: 20px;">
                                                <div class="col-md-1"><br>
                                                    <p class="lead" style="font-size: 20px;">{{$i}}.</p>
                                                </div>
                                                <div class="col-md-11"><br>
                                                    <p class="lead" style="font-size: 20px;">{{$syll_list->topic}}</p>
                                                    <p style="font-size: 15px;">{{$syll_list->subtopic}}</p>
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-10"><br>
                                                
                                            </div>
                                            <div class="col-md-2"><br>
                                                <a href="" style="padding: 10px; margin-bottom: 20px;" class="btn btn-success">Download</a>
                                            </div>
                                        </div>
                                    @endif
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
                                