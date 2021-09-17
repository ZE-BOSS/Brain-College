<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
        use App\Model\site;
        $site = site::find(1);
        echo'<link rel="shortcut icon" type="image/x-icon" href="'.asset('/storage/image/site/'.$site->image).'">';
    ?>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
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
                <span class="splash-description">Please enter your admin information.</span>
            </div>
            <div class="card-body">
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
                <form action="{{ route('admin.login') }}" class="needs-validation" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off" required="">
                        <div class="invalid-feedback">
                            Username is required.
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" required="">
                        <div class="invalid-feedback">
                            Password is required.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0 ">
                
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

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
    </script>
</body>
 
</html>