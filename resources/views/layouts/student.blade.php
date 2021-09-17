@if(count($students) > 0)
    @foreach($students as $student)
        
    @endforeach
@else

@endif
<!DOCTYPE html>
<html>
    <head>
        <?php
            use App\Model\site;
            $site = site::find(1);
            echo'<link rel="shortcut icon" type="image/x-icon" href="'.asset('/storage/image/site/'.$site->image).'">';
        ?>
        @include('inc.student.index')
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            @include('inc.student.sidebar')

            <!-- PAGE CONTAINER-->
            <div class="page-container2">
                <!-- HEADER DESKTOP-->
                @include('inc.student.navbar')
                @include('inc.student.mobile')
                <!-- END HEADER DESKTOP-->

                <!-- BREADCRUMB-->
                @include('inc.student.crumb')
                <!-- END BREADCRUMB-->

                @yield('content')


                @include('inc.student.footer')
                <!-- END PAGE CONTAINER-->
            </div>

        </div>
        @include('inc.student.exit')
    </body>
</html>
    