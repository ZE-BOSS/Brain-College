


    @extends('layouts.admin')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Staffs</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Staffs</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('staffs.index')}}" class="btn btn-danger"> < Back </a>
                    </div>
                    <div class="col-xl-4" id="null">

                    </div>
                    <div class="col-md-12"><br>
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
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-fluid">
                                    <div class="card-img-top" style='height: 190px; width: 100%;'>
                                        <img src="/admin/assets/images/dribbble.png" style='height: 200px; width: 100%;' alt="" class=" img-fluid">
                                    </div>
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <!-- .user-avatar -->
                                        @if(!empty($staff->profilepics) &&  file_exists(storage_path().'/app/public/image/staff/'.$staff->profilepics))
                                            <a class="user-avatar user-avatar-floated user-avatar-xl" href="#" data-toggle="modal" data-target="#showModal{{$staff->id}}">
                                                <img src="{{asset('/storage/image/staff/'.$staff->profilepics)}}" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                            </a>
                                        @else
                                            <a class="user-avatar user-avatar-floated user-avatar-xl" href="#" data-toggle="modal" data-target="#showModal{{$staff->id}}">
                                                <img src="/admin/assets/images/dribbble.png" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                            </a>
                                        @endif
                                        <!-- /.user-avatar -->
                                        <h3 class="card-title mb-2">
                                            <a href="#">{{$staff->firstname}} {{$staff->othernames}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">{{$staff->username}}</h6>
                                        <!-- grid row -->
                                        <div class="row">
                                            <!-- grid column -->
                                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <!-- .metric -->
                                                <div class="metric">
                                                    <p class="metric-label">Salary</p>
                                                    @if(count($payment) > 0)
                                                        @foreach($payment as $acc)
                                                            @if(empty($acc->to_pay) || $acc->to_pay = 0)
                                                                <h6 class="metric-value" style="color: red;"> Amount not specified</h6>
                                                            @elseif($acc->to_pay < $acc->payed && $acc->payed > 0)
                                                                <h6 class="metric-value" style="color: orange;">Payed Part</h6>
                                                            @elseif($acc->to_pay >= $acc->payed)
                                                                <h6 class="metric-value" style="color: green;">Payed</h6>
                                                            @else
                                                                <h6 class="metric-value" style="color: lightblue;">Not Payed</h6>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <h6 class="metric-value" style="color: red;">No Payment Account</h6>
                                                    @endif
                                                </div>
                                                <!-- /.metric -->
                                            </div>
                                            <!-- /grid column -->
                                            <!-- grid column -->
                                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <!-- .metric -->
                                                <div class="metric">
                                                    <p class="metric-label" id="insert_n"></p>
                                                    @if(count($class) > 0)
                                                        @foreach($class as $cls)
                                                            @if($cls->teacher == $staff->id)
                                                                <script type="text/javascript">
                                                                    let name = document.getElementById('insert_n').innerHTML = 'Class';
                                                                </script>
                                                                <h6 class="metric-value" style="color: green;">{{$cls->name}}</h6>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <script type="text/javascript">
                                                            let name = document.getElementById('insert_n').innerHTML = 'Class';
                                                        </script>
                                                        <h6 class="metric-value" style="color: red;" id="insert_msg"></h6>
                                                    @endif
                                                </div>
                                                <!-- /.metric -->
                                            </div>
                                            <!-- /grid column -->
                                        </div>
                                        <!-- /grid row -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-fluid">
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="lead" style="background-color: #0b95c3; color: white;"><i class="
                                                fas fa-address-card"></i> Address</p>
                                                <p>{{$staff->address}}</p>
                                            </div>
                                        </div>
                                        @if(!empty($staff->address2))
                                            <hr class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="lead" style="background-color: #0b95c3; color: white;"><i class="
                                                    fas fa-address-card"></i> Address 2</p>
                                                    <p>{{$staff->address2}}</p>
                                                </div>
                                            </div>
                                        @else

                                        @endif
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="lead" style="background-color: #0b95c3; color: white;">
                                                    <i class="fas fa-info-circle"></i> More Information</p>
                                                <p>{{$staff->moreinfo}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                        <div class="simple-card">
                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> staff Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="msg-tab-simple" data-toggle="tab" href="#msg-simple" role="tab" aria-controls="msg" aria-selected="false"><i class="fas fa-envelope"></i> Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="salary-tab-simple" data-toggle="tab" href="#salary-simple" role="tab" aria-controls="salary" aria-selected="false"><i class="fas fa-money-bill-alt"></i> Salary</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-user"></i> Username</p>
                                            <p>{{$staff->username}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-envelope"></i> Email</p>
                                            <p>{{$staff->email}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            @if(empty($staff->phoneno2))
                                                <p class="lead"><i class="fas fa-phone-volume"></i> Phone Number</p>
                                                <p>{{$staff->phoneno1}}</p>
                                            @else
                                                <p class="lead"><i class="fas fa-phone-volume"></i> Phone Number</p>
                                                <p>{{$staff->phoneno1}} / {{$staff->phoneno2}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-street-view"></i> Disable?</p>
                                            <p>{{$staff->disability}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-industry"></i> Religion</p>
                                            <p>{{$staff->religion}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-hand-holding-heart"></i> Hobby</p>
                                            <p>{{$staff->hobby}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-baseball-ball"></i> Prefered Sport</p>
                                            <p>{{$staff->sport}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class=" fas fa-user-md"></i> Position</p>
                                            <p>{{$staff->position}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class=" fas fa-warehouse"></i> Class Category</p>
                                            <p>{{$staff->category}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-map-marker-alt"></i> Country</p>
                                            <p>{{$staff->country}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-location-arrow"></i> State</p>
                                            <p>{{$staff->state}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="fas fa-map"></i> L.G.A</p>
                                            <p>{{$staff->lga}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="lead"><i class=" fas fa-qrcode"></i> Zipcode</p>
                                            @if(!empty($staff->zipcode))
                                                <p>{{$staff->zipcode}}</p>
                                            @else
                                                <p style="color: red;">None Entered</p>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="far fa-calendar-alt"></i> Date Of Birth</p>
                                            <p>{{$staff->dob}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="lead"><i class="far fa-calendar-alt"></i> Started</p>
                                            <p>Date: {{$staff->d}} {{$staff->m}} {{$staff->y}} / Time: {{$staff->time}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                            <p>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($sec->id == $staff->session)
                                                            {{$sec->name}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-4"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Term Created</p>
                                            <p>
                                                @if(count($term) > 0)
                                                    @foreach($term as $ter)
                                                        @if($ter->id == $staff->term)
                                                            {{$ter->name}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errmain">
                                        <strong>ERROR!</strong>
                                        <p id="err"></p>
                                        <a href="#" class="close" onclick="document.getElementById('errmain').style.display = 'none';" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </a>
                                    </div>
                                    <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucmain">
                                        <strong>SUCCESS!</strong>
                                        <p id="suc"></p>
                                        <a href="#" class="close" onclick="document.getElementById('sucmain').style.display = 'none';" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="lead"><i class=" fas fa-qrcode"></i> Options</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><a href="{{route('staffs.edit', $staff->id)}}"><i class="fas fa-edit"></i> Edit {{$staff->firstname}} Profile</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$staff->id}}"><i class="fas fa-trash-alt"></i> Delete {{$staff->firstname}} Profile</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                    <div class="col-md-12 reload">
                                        <p class="lead"><i class="fas fa-cogs"></i> Reset Password</p>
                                        <form id="passform">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="pass">Password</label>
                                                    <input type="hidden" class="form-control" name="id" value="{{$staff->id}}"  id="id">
                                                    <input type="text" class="form-control" name="pass" placeholder="Password" id="pass">
                                                    <div class="invalid-feedback">
                                                        Password is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="cpass">Confirm Password</label>
                                                    <input type="text" class="form-control" name="cpass" placeholder="Confirm Password" id="cpass">
                                                    <div class="invalid-feedback">
                                                        Password is required.
                                                    </div><br/>
                                                </div>
                                                <div class="col-md-9">
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="#" class="btn btn-primary btn-lg sub" id="sub">Submit</a>
                                                    <br/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="salary-simple" role="tabpanel" aria-labelledby="salary-tab-simple">
                                    @if(count($pays) > 0)
                                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="accrodion-regular">
                                                <div id="accordion3">
                                                    @foreach($pays as $pay)
                                                        <div class="card">
                                                            <div class="card-header" id="heading{{$pay->id}}">
                                                                <h5 class="mb-0">
                                                                   <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$pay->id}}" aria-expanded="false" aria-controls="collapse{{$pay->id}}">
                                                                     <span class="fas fa-angle-down mr-3"></span> {{$pay->m}} {{$pay->y}} 
                                                                   </button>
                                                                  </h5>
                                                            </div>
                                                            <div id="collapse{{$pay->id}}" class="collapse" aria-labelledby="heading{{$pay->id}}" data-parent="#accordion3">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p class="lead">Amount to pay</p>
                                                                            <p>
                                                                                @if(!empty($pay->to_pay))
                                                                                    {{$pay->to_pay}}
                                                                                @else
                                                                                    Amount not specified
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p class="lead">Amount payed</p>
                                                                            <p>
                                                                                @if(!empty($pay->payed))
                                                                                    {{$pay->payed}}
                                                                                @else
                                                                                    0
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>No salary has been payed to this staff.</p>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="msg-simple" role="tabpanel" aria-labelledby="msg-tab-simple">
                                    @if(count($message) > 0)
                                        @foreach($message as $msg)
                                            <div class="email-list-item">
                                                <div class="email-list-actions">
                                                    <label class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkboxes" type="checkbox" value="cb{{$msg->id}}" id="cb{{$msg->id}}"><span class="custom-control-label"></span></a>
                                                </div>
                                                <div class="email-list-detail"><span class="date float-right">{{$msg->d}} {{$msg->m}} {{$msg->y}}</span><span class="from">{{$msg->sender}}</span>
                                                    <p class="msg">{{$msg->title}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No message has been sent by this staff.</p>
                                    @endif
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
                            <p>Are you sure you want to delete this staff data?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="delete-form-{{ $staff->id }}" method="post" action="{{ route('staffs.destroy',$staff->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $staff->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade show" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resetModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to changes this staff password?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" id="passbtn" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade show" id="showModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><a href="{{route('staffs.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a></h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            @if(!empty($staff->profilepics) &&  file_exists(storage_path().'/app/public/image/staff/'.$staff->profilepics))
                                <img style="width: 100%;" src="{{asset('/storage/image/staff/'.$staff->profilepics)}}" alt="user" width="35">
                            @else
                                <img style="width: 100%;" src="/admin/assets/images/dribbble.png" alt="user" width="35">
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection