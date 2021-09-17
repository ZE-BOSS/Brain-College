<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <?php
        use App\Model\site;
        $site = site::find(1);
        echo'<link rel="shortcut icon" type="image/x-icon" href="'.asset('/storage/image/site/'.$site->image).'">';
    ?>
    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="/student/css/font-face.css" rel="stylesheet" media="all">
    <link href="/student/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/student/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/student/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/student/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/student/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/student/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/student/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/student/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/student/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/student/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/student/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/student/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
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
                        <div class="login-form">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>ERROR!</strong>
                                    @foreach($errors->all() as $error)
                                        {{$error}}<br/>
                                    @endforeach-->
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div> 
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>SUCCESS!</strong> {{session('success')}}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                
                            @elseif(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>ERROR!</strong> {{session('error')}}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                            @else

                            @endif
                            <form action="{{route('student.login')}}" class="needs-validation" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required="">
                                    <div class="invalid-feedback">
                                        Username is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required="">
                                    <div class="invalid-feedback">
                                        Password is required.
                                    </div>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#" id="click" onclick="show()">Forgotten Password?</a>
                                    </label>
                                </div>
                                <label style="color: red; display: none;" id="show">
                                    If you have forgotten your password, contact the school administration.                                        
                                </label>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Not a Student Yet?
                                    <a href="#">Register Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/student/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/student/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/student/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/student/vendor/slick/slick.min.js">
    </script>
    <script src="/student/vendor/wow/wow.min.js"></script>
    <script src="/student/vendor/animsition/animsition.min.js"></script>
    <script src="/student/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/student/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/student/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/student/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/student/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/student/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/student/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/student/js/main.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function show(){
            var click = document.getElementById('click');
            var show = document.getElementById('show');

            if(show.style.display == 'none'){
                show.style.display = 'inline';
            }else{
                show.style.display = 'none';
            }
        }
    </script>

</body>

</html>
<!-- end document-->