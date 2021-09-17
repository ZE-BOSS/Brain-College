@extends('layouts.staff')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Student</h2>
                        <br><br>
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
                                    <a href="{{route('staff_student.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit Students</i>
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
                                    <form action="{{ route('staff_student.update', $id) }}" class="needs-validation" novalidate="" id="edit-form-{{ $student->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" name="firstName" value="{{$student->firstname}}" placeholder="First Name" required="">
                                                <div class="invalid-feedback">
                                                    Valid first name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Other Names</label>
                                                <input type="text" class="form-control" name="otherName" value="{{$student->othernames}}" placeholder="Other Names" required="">
                                                <div class="invalid-feedback">
                                                    Other names are required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control" name="dob" value="{{$student->dob}}" placeholder="Date of Birth">
                                                <div class="invalid-feedback">
                                                    Please enter a valid date of Birth.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Gender</label>
                                                <select class="custom-select d-block w-100" name="sex" required="">
                                                    <option selected="selected" disabled="disabled">Select...</option>
                                                    @if($student->sex == 'Male')
                                                        <option selected="selected" value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Custom">Custom</option>
                                                    @elseif($student->sex == 'Female')
                                                        <option value="Male">Male</option>
                                                        <option selected="selected" value="Female">Female</option>
                                                        <option value="Custom">Custom</option>
                                                    @elseif($student->sex == 'Custom')
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
                                                <input type="text" class="form-control" placeholder="Religion" value="{{$student->religion}}" name="religion">
                                                <div class="invalid-feedback">
                                                    Please enter a valid Religion.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="hobby">Hobby</label>
                                                <input type="text" class="form-control" name="hobby" value="{{$student->hobby}}" placeholder="Hobby" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid hobby.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="sport">Sport<span class="text-muted"> (Optional)</span></label>
                                                <input type="text" class="form-control" name="sport" value="{{$student->sport}}" placeholder="Sport">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="branch">School Branch (Address)</label>
                                                <select class="custom-select d-block w-100" name="branch" required="">
                                                    @if(count($branches) > 0)
                                                        <option selected="selected" disabled="disabled">Select...</option>
                                                        @foreach($branches as $branch)
                                                            @if($student->branch == $branch->id)
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
                                                    <input type="text" class="form-control" name="username" value="{{$student->username}}" placeholder="Username" required="">
                                                    <div class="invalid-feedback" style="width: 100%;">
                                                        Your username is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                                <input type="email" class="form-control email-inputmask" name="email" value="{{$student->email}}" placeholder="email@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control phone-inputmask" value="{{$student->phoneno1}}" placeholder="(+123) 7856-4898-908" name="phoneno1" im-insert="true" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid Phone Number.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Phone 2 (Optional)</label>
                                                <input type="text" class="form-control phone-inputmask" value="{{$student->phoneno2}}" placeholder="(+234) 0816-4898-908" name="phoneno2" im-insert="true">
                                                <div class="invalid-feedback">
                                                    Please enter your residential address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{$student->address}}" placeholder="No 34, Main St." required="">
                                                <div class="invalid-feedback">
                                                    Please enter your residential address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control" name="address2" value="{{$student->address2}}" placeholder="No 45, Optional St.">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100" name="country" required="">
                                                    <option value="{{$student->country}}">{{$student->country}}</option>
                                                    <option value="USA">USA (United States)</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="state">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{$student->state}}" placeholder="State" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="lga">Local Government Area</label>
                                                <input type="text" class="form-control" name="lga" value="{{$student->lga}}" placeholder="Local Government Area" required="">
                                                <div class="invalid-feedback">
                                                    Local Government Area required.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip Code <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control zip-inputmask" name="zip" value="{{$student->zipcode}}" placeholder="00000" required="">
                                                <div class="invalid-feedback">
                                                    Zip code required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="disable">Disable?</label>
                                                <select class="custom-select d-block w-100" name="disable" required="">
                                                    <option value="{{$student->disability}}" selected="selected">{{$student->disability}}</option>
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
                                                    <option selected="selected" value="{{$student->position}}">{{$student->position}}</option>
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
                                                    <option value="{{$student->category}}" selected="selected">{{$student->category}}</option>
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
                                            <input type="hidden" name="acid" id="acid">
                                            <input type="hidden" name="resid" id="resid">
                                            <script type="text/javascript">
                                                @if(count($accounts) > 0)
                                                    @foreach($accounts as $account)
                                                        document.getElementById('acid').value = {{$account->id}};
                                                    @endforeach
                                                @endif
                                                @if(count($results) > 0)
                                                    @foreach($results as $result)
                                                        document.getElementById('resid').value = {{$result->id}};
                                                    @endforeach
                                                @endif
                                            </script>
                                            <div class="col-md-3 mb-3">
                                                <label for="class">Class</label>
                                                <select class="custom-select d-block w-100"  name="class">
                                                    @if(count($classes) > 0 && count($accounts) > 0)
                                                        <option selected disabled>Select...</option>
                                                         @foreach($accounts as $account)
                                                            @foreach($classes as $class)
                                                                @if($account->classid == $class->id && $account->studentid == $student->id)
                                                                    <option selected="selected" value="{{$class->id}}">{{$class->name}}</option>
                                                                @else
                                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endforeach  
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class is required.
                                                </div>
                                            </div>
                                            @if($student->studenttype == 'Boarding')
                                                <div class="col-md-6 mb-3" id="typeClass">
                                                    <label for="studenttype">Student Type</label>
                                                    <select class="custom-select d-block w-100" name="studenttype" required id="studenttype" onchange="getHostel()">
                                                        <option value="Day">Day</option>
                                                        <option value="Boarding" selected="selected">Boarding</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Student Type is required.
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12 mb-3" id="typeClass">
                                                    <label for="studenttype">Student Type</label>
                                                    <select class="custom-select d-block w-100" name="studenttype" required id="studenttype" onchange="getHostel()">
                                                        <option value="Day" selected="selected">Day</option>
                                                        <option value="Boarding">Boarding</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Student Type is required.
                                                    </div>
                                                </div>
                                            @endif
                                            @if($student->studenttype == 'Boarding')
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
                                                                            @if($hostel_list->hostelid == $hostel->id && $hostel_list->userid == $student->id && $hostel_list->user_category == 'Student')
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
                                                                    @if($hostel_list->hostelid == $hostel->id && $hostel_list->userid == $student->id && $hostel_list->user_category == 'Student')
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
                                            <h4 class="mb-3">Who do you live with?</h4>
                                            <div class="row">
                                                <div class="my-3 col-md-2">
                                                    <div class="custom-control custom-radio">
                                                        @if(empty($student->livewith))
                                                            <input id="credit" name="livewith" value="none" onclick="non()" type="radio" class="custom-control-input" checked="" required="">
                                                        @else
                                                            <input id="credit" name="livewith" value="none" onclick="non()" type="radio" class="custom-control-input" required="">
                                                        @endif
                                                        <label class="custom-control-label" for="credit">None</label>
                                                    </div>
                                                </div>
                                                <div class="d-block my-3 col-md-2">
                                                    <div class="custom-control custom-radio">
                                                        @if($student->livewith == 'parents')
                                                            <input id="debit" name="livewith" value="parents" onclick="parents()" type="radio" class="custom-control-input" checked="" required="">
                                                        @else
                                                            <input id="debit" name="livewith" value="parents" onclick="parents()" type="radio" class="custom-control-input" required="">
                                                        @endif
                                                        <label class="custom-control-label" for="debit">Parents</label>
                                                    </div>
                                                </div>
                                                <div class="d-block my-3 col-md-2">
                                                    <div class="custom-control custom-radio">
                                                        @if($student->livewith == 'guidian')
                                                            <input id="paypal" name="livewith" value="guidian" onclick="guidian()" type="radio" class="custom-control-input" checked required="">
                                                        @else
                                                            <input id="paypal" name="livewith" value="guidian" onclick="guidian()" type="radio" class="custom-control-input" required="">
                                                        @endif
                                                        <label class="custom-control-label" for="paypal">Guidian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($student->livewith == 'parents')
                                            <div class="col-md-12" id="parents" style="">
                                        @else
                                            <div class="col-md-12" id="parents" style="display: none;">
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="fatherName">Father Name</label>
                                                    @if($student->livewith == 'parents')
                                                        <input type="text" class="form-control" value="{{$student->fname}}" name="fatherName" placeholder="Father Name">
                                                    @else
                                                        <input type="text" class="form-control" name="fatherName" placeholder="Father Name">
                                                    @endif
                                                    <div class="invalid-feedback">
                                                        Valid father name is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="motherName">Mother Name</label>
                                                    @if($student->livewith == 'parents')
                                                        <input type="text" class="form-control" value="{{$student->mname}}" name="motherName" placeholder="Mother Name">
                                                    @else
                                                        <input type="text" class="form-control" value="" name="motherName" placeholder="Mother Name">
                                                    @endif
                                                    <div class="invalid-feedback">
                                                        Valid mother name is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($student->livewith == 'guidian')
                                            <div class="col-md-12" id="guidian" style="">
                                        @else
                                            <div class="col-md-12" id="guidian" style="display: none;">
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="guidianName">Guidian Name</label>
                                                    @if($student->livewith == 'guidian')
                                                        <input type="text" class="form-control" value="{{$student->fname}}" name="guidianName" placeholder="Guidian Name">
                                                    @else
                                                        <input type="text" class="form-control" name="guidianName" placeholder="Guidian Name">
                                                    @endif
                                                    <div class="invalid-feedback">
                                                        Valid guidian name is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="guidianName2">Guidian Name 2</label>
                                                    @if($student->livewith == 'guidian')
                                                        <input type="text" class="form-control" value="{{$student->mname}}" name="guidianName2" placeholder="Guidian Name 2">
                                                    @else
                                                        <input type="text" class="form-control" name="guidianName2" placeholder="Guidian Name 2">
                                                    @endif
                                                    <div class="invalid-feedback">
                                                        Valid guidian name 2 is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" class="form-control" name="profilepics" placeholder="Choose Photo">
                                                <input type="text" class="form-control" value="Student's Photo : {{$student->profilepics}}" placeholder="Choose Photo">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Student (Optional)</label>
                                                <textarea class="form-control" name="moreinfo">{{$student->moreinfo}}</textarea>
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
                                                @if(count($accounts) > 0)
                                                    @foreach($accounts as $account)
                                                        @if($account->id == $student->paymentid)
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="accname">Name on card</label>
                                                                        <input type="text" class="form-control" value="{{$account->accountname}}" name="accname" placeholder="Samson Waters">
                                                                        <small class="text-muted">Full name as displayed on card</small>
                                                                        <div class="invalid-feedback">
                                                                            Name on card is required
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="cc-number">Credit card number</label>
                                                                        <input type="text" class="form-control ccno-inputmask" value="{{$account->accountnumber}}" name="accno" placeholder="">
                                                                        <div class="invalid-feedback">
                                                                            Credit card number is required
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <label for="cc-expiration">Expiration</label>
                                                                        <input type="text" class="form-control expiration-inputmask" value="{{$account->accounttype}}" name="acctype" placeholder="">
                                                                        <div class="invalid-feedback">
                                                                            Expiration date required
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 mb-3">
                                                                        <label for="cc-cvv">CVV</label>
                                                                        <input type="text" class="form-control cvv-inputmask" value="{{$account->bank}}" name="bank" placeholder="">
                                                                        <div class="invalid-feedback">
                                                                            Security code required
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <hr class="mb-4">
                                                                <div class="custom-control custom-checkbox">
                                                                    @if(empty($account->infostatus))
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
                                                                <label for="accname">Name on card</label>
                                                                <input type="text" class="form-control" name="accname" placeholder="Samson Waters">
                                                                <small class="text-muted">Full name as displayed on card</small>
                                                                <div class="invalid-feedback">
                                                                    Name on card is required
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="cc-number">Credit card number</label>
                                                                <input type="text" class="form-control ccno-inputmask" name="accno" placeholder="">
                                                                <div class="invalid-feedback">
                                                                    Credit card number is required
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-3">
                                                                <label for="cc-expiration">Expiration</label>
                                                                <input type="text" class="form-control expiration-inputmask" name="acctype" placeholder="">
                                                                <div class="invalid-feedback">
                                                                    Expiration date required
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 mb-3">
                                                                <label for="cc-cvv">CVV</label>
                                                                <input type="text" class="form-control cvv-inputmask" name="bank" placeholder="">
                                                                <div class="invalid-feedback">
                                                                    Security code required
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
                                            <div class="col-md-9">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#exampleModal{{$student->id}}">Update Changes</a>
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
        <div class="modal fade show" id="exampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to make changes to this student data?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('edit-form-{{ $student->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection