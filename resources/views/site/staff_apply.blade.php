@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Employ Staff</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('staffs.index')}}" class="breadcrumb-link">Staffs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Employ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12">
                    
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{route('staffs.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Employ Staff</i>
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
                                    <form action="{{ route('staffs.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" name="firstName" placeholder="First Name" required="">
                                                <div class="invalid-feedback">
                                                    Valid first name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Other Names</label>
                                                <input type="text" class="form-control" name="otherName" placeholder="Other Names" required="">
                                                <div class="invalid-feedback">
                                                    Other names are required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
                                                <div class="invalid-feedback">
                                                    Please enter a valid date of Birth.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Gender</label>
                                                <select class="custom-select d-block w-100" name="sex" required="">
                                                    <option selected="selected" disabled="disabled">Select...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Custom">Custom</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Gender.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Religion</label>
                                                <input type="text" class="form-control" placeholder="Religion" name="religion">
                                                <div class="invalid-feedback">
                                                    Please enter a valid Religion.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="hobby">Hobby</label>
                                                <input type="text" class="form-control" name="hobby" placeholder="Hobby" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid hobby.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="sport">Sport<span class="text-muted"> (Optional)</span></label>
                                                <input type="text" class="form-control" name="sport" placeholder="Sport">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="branch">School Branch (Address)</label>
                                                <select class="custom-select d-block w-100" name="branch" required="">
                                                    @if(count($branches) > 0)
                                                        <option selected="selected" disabled="disabled">Select...</option>
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Branch.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="username">Username</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                                                    <div class="invalid-feedback" style="width: 100%;">
                                                        Your username is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="password">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                                    <div class="invalid-feedback" style="width: 100%;">
                                                        Your Password is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                                <input type="email" class="form-control email-inputmask" name="email" placeholder="email@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control phone-inputmask" placeholder="(+123) 7856-4898-908" name="phoneno1" im-insert="true" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid Phone Number.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Phone 2 (Optional)</label>
                                                <input type="text" class="form-control phone-inputmask" placeholder="(+234) 0816-4898-908" name="phoneno2" im-insert="true">
                                                <div class="invalid-feedback">
                                                    Please enter your residential address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="No 34, Main St." required="">
                                                <div class="invalid-feedback">
                                                    Please enter your residential address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control" name="address2" placeholder="No 45, Optional St.">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100" name="country" required="">
                                                    <option value="">Choose...</option>
                                                    <option value="USA">USA (United States)</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="state">State</label>
                                                    <input type="text" class="form-control" name="state" placeholder="State" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="lga">Local Government Area</label>
                                                <input type="text" class="form-control" name="lga" placeholder="Local Government Area" required="">
                                                <div class="invalid-feedback">
                                                    Local Government Area required.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip Code <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control zip-inputmask" name="zip" placeholder="00000" required="">
                                                <div class="invalid-feedback">
                                                    Zip code required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="disable">Disable?</label>
                                                <select class="custom-select d-block w-100" name="disable" required="">
                                                    <option value="No" selected="selected">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="position">Position</label>
                                                <select class="custom-select d-block w-100" name="position" required="">
                                                    <option value="Non" selected="selected">Non</option>
                                                    <option value="Head Boy">Head Boy</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Position.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="category">Category</label>
                                                <select class="custom-select d-block w-100" name="category" required="">
                                                    <option value="Non" selected="selected">Select...</option>
                                                    <option value="Preparatory">Preparatory</option>
                                                    <option value="Nursery">Nursery</option>
                                                    <option value="Primary">Primary</option>
                                                    <option value="Junior Secondary">Junior Secondary</option>
                                                    <option value="Senior Secondary">Senior Secondary</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Category is required.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="class">Class</label>
                                                <select class="custom-select d-block w-100" name="class">
                                                    @if(count($classes) > 0)
                                                        <option selected="selected">Select...</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{$class->remember_token}}">{{$class->name}}</option>
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" class="form-control" name="profilepics" placeholder="Choose Photo" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About staff (Optional)</label>
                                                <textarea class="form-control" name="moreinfo"></textarea>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="card" style="border: 1px solid; border-color: blue;">
                                            <div class="card-header" id="headingFive" style="border-color: blue;">
                                                <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    <h5 class="mb-0">
                                                        Payments   
                                                    </h5>
                                                </a>
                                            </div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="accname">Account Name</label>
                                                            <input type="text" class="form-control" name="accname" placeholder="Samson Waters">
                                                            <small class="text-muted"></small>
                                                            <div class="invalid-feedback">
                                                                Account name is required
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="cc-number">Account Number</label>
                                                            <input type="text" class="form-control ccno-inputmask" name="accno" placeholder="">
                                                            <div class="invalid-feedback">
                                                                Account number is required
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="cc-expiration">Payment Type</label>
                                                            <input type="text" class="form-control" value="Bank Payment" name="acctype" placeholder="">
                                                            <small style="color: red;">Don edit of change this form input!</small>
                                                            <div class="invalid-feedback">
                                                                Payment Type required
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="cc-cvv">Bank</label>
                                                            <input type="text" class="form-control" name="bank" placeholder="">
                                                            <div class="invalid-feedback">
                                                                Bank name required
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <hr class="mb-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="save-info" name="infostatus" value="save">
                                                        <label class="custom-control-label" for="save-info">Save this payment information for next time</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary btn-lg" type="submit">Add staff</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection