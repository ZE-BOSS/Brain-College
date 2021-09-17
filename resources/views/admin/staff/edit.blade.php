@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Staff</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('staffs.index')}}" class="breadcrumb-link">Staffs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit Staff</i>
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
                                    <form action="{{ route('staffs.update', $id) }}" class="needs-validation" novalidate="" id="edit-form-{{ $staff->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" name="firstName" value="{{$staff->firstname}}" placeholder="First Name" required="">
                                                <div class="invalid-feedback">
                                                    Valid first name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Other Names</label>
                                                <input type="text" class="form-control" name="otherName" value="{{$staff->othernames}}" placeholder="Other Names" required="">
                                                <div class="invalid-feedback">
                                                    Other names are required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control" name="dob" value="{{$staff->dob}}" placeholder="Date of Birth">
                                                <div class="invalid-feedback">
                                                    Please enter a valid date of Birth.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Gender</label>
                                                <select class="custom-select d-block w-100" name="sex" required="">
                                                    <option selected="selected" disabled="disabled">Select...</option>
                                                    @if($staff->sex == 'Male')
                                                        <option selected="selected" value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Custom">Custom</option>
                                                    @elseif($staff->sex == 'Female')
                                                        <option value="Male">Male</option>
                                                        <option selected="selected" value="Female">Female</option>
                                                        <option value="Custom">Custom</option>
                                                    @elseif($staff->sex == 'Custom')
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option selected="selected" value="Custom">Custom</option>
                                                    @else
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Custom">Custom</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Gender.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Religion</label>
                                                <input type="text" class="form-control" placeholder="Religion" value="{{$staff->religion}}" name="religion">
                                                <div class="invalid-feedback">
                                                    Please enter a valid Religion.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="hobby">Hobby</label>
                                                <input type="text" class="form-control" name="hobby" value="{{$staff->hobby}}" placeholder="Hobby" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid hobby.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="sport">Sport<span class="text-muted"> (Optional)</span></label>
                                                <input type="text" class="form-control" name="sport" value="{{$staff->sport}}" placeholder="Sport">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="branch">School Branch (Address)</label>
                                                <select class="custom-select d-block w-100" name="branch" required="">
                                                    @if(count($branches) > 0)
                                                        <option selected="selected" disabled="disabled">Select...</option>
                                                        @foreach($branches as $branch)
                                                            @if($staff->branch == $branch->id)
                                                                <option selected="selected" value="{{$branch->id}}">{{$branch->name}}</option>
                                                            @else
                                                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Branch.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="username">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" value="{{$staff->username}}" placeholder="Username" required="">
                                                    <div class="invalid-feedback" style="width: 100%;">
                                                        Your username is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                                <input type="email" class="form-control email-inputmask" name="email" value="{{$staff->email}}" placeholder="email@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control phone-inputmask" value="{{$staff->phoneno1}}" placeholder="(+123) 7856-4898-908" name="phoneno1" im-insert="true" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid Phone Number.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Phone 2 (Optional)</label>
                                                <input type="text" class="form-control phone-inputmask" value="{{$staff->phoneno2}}" placeholder="(+234) 0816-4898-908" name="phoneno2" im-insert="true">
                                                <div class="invalid-feedback">
                                                    Please enter your residential address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{$staff->address}}" placeholder="No 34, Main St." required="">
                                                <div class="invalid-feedback">
                                                    Please enter your residential address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control" name="address2" value="{{$staff->address2}}" placeholder="No 45, Optional St.">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100" name="country" required="">
                                                    <option value="{{$staff->country}}">{{$staff->country}}</option>
                                                    <option value="USA">USA (United States)</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="state">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{$staff->state}}" placeholder="State" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="lga">Local Government Area</label>
                                                <input type="text" class="form-control" name="lga" value="{{$staff->lga}}" placeholder="Local Government Area" required="">
                                                <div class="invalid-feedback">
                                                    Local Government Area required.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip Code <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control zip-inputmask" name="zip" value="{{$staff->zipcode}}" placeholder="00000" required="">
                                                <div class="invalid-feedback">
                                                    Zip code required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="disable">Disable?</label>
                                                <select class="custom-select d-block w-100" name="disable" required="">
                                                    <option value="{{$staff->disability}}" selected="selected">{{$staff->disability}}</option>
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
                                                    <option selected="selected" value="{{$staff->position}}">{{$staff->position}}</option>
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
                                                    <option value="{{$staff->category}}" selected="selected">{{$staff->category}}</option>
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
                                            <input type="hidden" name="payid" id="payid">
                                            <script type="text/javascript">
                                                @if(count($payments) > 0)
                                                    @foreach($payments as $payment)
                                                        document.getElementById('payid').value = {{$payment->id}};
                                                    @endforeach
                                                @endif
                                            </script>
                                            @if($staff->stafftype == 'Boarding')
                                                <div class="col-md-6 mb-3" id="typeClass">
                                                    <label for="stafftype">Staff Type</label>
                                                    <select class="custom-select d-block w-100" name="stafftype" required id="stafftype" onchange="getHostel()">
                                                        <option value="Day">Day</option>
                                                        <option value="Boarding" selected="selected">Boarding</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Staff Type is required.
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12 mb-3" id="typeClass">
                                                    <label for="stafftype">Staff Type</label>
                                                    <select class="custom-select d-block w-100" name="stafftype" required id="stafftype" onchange="getHostel()">
                                                        <option value="Day" selected="selected">Day</option>
                                                        <option value="Boarding">Boarding</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Staff Type is required.
                                                    </div>
                                                </div>
                                            @endif
                                            @if($staff->stafftype == 'Boarding')
                                                <div class="col-md-6 mb-3" id="hostel">
                                            @else
                                                <div class="col-md-6 mb-3" style="display: none;" id="hostel">
                                            @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="class">Hostel</label>
                                                        <select class="custom-select d-block w-100" name="hostel">
                                                            @if(count($hostels) > 0)
                                                                <option selected="selected" disabled>Select...</option>
                                                                @foreach($hostels as $hostel)
                                                                    @if(count($hostel_lists) > 0)
                                                                        @foreach($hostel_lists as $hostel_list)
                                                                            @if($hostel_list->hostelid == $hostel->id && $hostel_list->userid == $staff->id && $hostel_list->user_category == 'Staff')
                                                                                <option value="{{$hostel->id}}" selected="selected">{{$hostel->name}}</option>
                                                                            @else
                                                                                <option value="{{$hostel->id}}">{{$hostel->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <option value="{{$hostel->id}}">{{$hostel->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option selected="selected" disabled>Select...</option>
                                                            @endif
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Hostel is required.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="room">Room</label>
                                                        @if(count($hostels) > 0 && count($hostel_lists) > 0)
                                                            @foreach($hostels as $hostel)
                                                                @foreach($hostel_lists as $hostel_list)
                                                                    @if($hostel_list->hostelid == $hostel->id && $hostel_list->userid == $staff->id && $hostel_list->user_category == 'Staff')
                                                                        <input type="text" value="{{$hostel_list->room}}" class="form-control" name="room" placeholder="Room">
                                                                    @else
                                                                        <input type="text" class="form-control" name="room" placeholder="Room">
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @else
                                                            <input type="text" class="form-control" name="room" placeholder="Room">
                                                        @endif
                                                        <div class="invalid-feedback">
                                                            Room is required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" class="form-control" name="profilepics" placeholder="Choose Photo">
                                                <input type="text" class="form-control" value="staff's Photo : {{$staff->profilepics}}" placeholder="Choose Photo">
                                                <i style="color: red;">If you click on the photo file input, you will have to reupload staff's photo</i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About staff (Optional)</label>
                                                <textarea class="form-control" name="moreinfo">{{$staff->moreinfo}}</textarea>
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
                                                @if(count($payments) > 0)
                                                    @foreach($payments as $payment)
                                                        @if($payment->id == $staff->paymentid)
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="accname">Account Name</label>
                                                                        <input type="text" class="form-control" value="{{$payment->accountname}}" name="accname" placeholder="Samson Waters">
                                                                        <small class="text-muted">Full name as displayed on card</small>
                                                                        <div class="invalid-feedback">
                                                                            Account name is required
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="cc-number">Account Number</label>
                                                                        <input type="text" class="form-control ccno-inputmask" value="{{$payment->accountnumber}}" name="accno" placeholder="">
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
                                                                        <input type="text" class="form-control" value="{{$payment->bank}}" name="bank" placeholder="">
                                                                        <div class="invalid-feedback">
                                                                            Bank name required
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <hr class="mb-4">
                                                                <div class="custom-control custom-checkbox">
                                                                    @if(empty($payment->infostatus))
                                                                        <input type="checkbox" class="custom-control-input" id="save-info" name="infostatus" value="save">
                                                                    @else
                                                                        <input type="checkbox" checked class="custom-control-input" id="save-info" name="infostatus" value="save">
                                                                    @endif
                                                                    <label class="custom-control-label" for="save-info">Save this payment information for next time</label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
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
                                                            <div class="col-md-1 mb-3">
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
                                                @endif
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#exampleModal{{$staff->id}}">Update Changes</a>
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
        <div class="modal fade show" id="exampleModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to make changes to this staff data?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('edit-form-{{ $staff->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection