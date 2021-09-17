

    @extends('layouts.student')

        @section('content')
            <div class="container-fluid dashboard-content">
                <br><br>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-fluid">
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <!-- .user-avatar -->
                                        @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
                                            <a class="user-avatar user-avatar-floated user-avatar-xl" href="#" data-toggle="modal" data-target="#showModal{{$student->id}}">
                                                <img src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                            </a>
                                        @else
                                            <a class="user-avatar user-avatar-floated user-avatar-xl" href="#" data-toggle="modal" data-target="#showModal{{$student->id}}">
                                                <img src="/admin/assets/images/dribbble.png" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                            </a>
                                        @endif
                                        <!-- /.user-avatar -->
                                        <h3 class="card-title mb-2">
                                            <a href="#">{{$student->firstname}} {{$student->othernames}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">{{$student->username}}</h6>
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
                                                <p>{{$student->address}}</p>
                                            </div>
                                        </div>
                                        @if(!empty($student->address2))
                                            <hr class="mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="lead" style="background-color: #0b95c3; color: white;"><i class="
                                                    fas fa-address-card"></i> Address 2</p>
                                                    <p>{{$student->address2}}</p>
                                                </div>
                                            </div>
                                        @else

                                        @endif
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="lead" style="background-color: #0b95c3; color: white;">
                                                    <i class="fas fa-info-circle"></i> More Information</p>
                                                <p>{{$student->moreinfo}}</p>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-user"></i> Username</p>
                                    <p>{{$student->username}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-envelope"></i> Email</p>
                                    <p>{{$student->email}}</p>
                                </div>
                                <div class="col-md-4">
                                    @if(empty($student->phoneno2))
                                        <p class="lead"><i class="fas fa-phone-volume"></i> Phone Number</p>
                                        <p>{{$student->phoneno1}}</p>
                                    @else
                                        <p class="lead"><i class="fas fa-phone-volume"></i> Phone Number</p>
                                        <p>{{$student->phoneno1}} / {{$student->phoneno2}}</p>
                                    @endif
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="lead"><i class="far fa-calendar-alt"></i> Date Of Birth</p>
                                    <p>{{$student->dob}}</p>
                                </div>
                                <div class="col-md-4">
                                    @if($student->livewith == 'parents')
                                        <p class="lead"><i class="fas fa-male"></i> Father's Name</p>
                                        <p>{{$student->fname}}</p>
                                    @elseif($student->livewith == 'guidian')
                                        <p class="lead"><i class="fas fa-male"></i> first guidian's Name</p>
                                        <p>{{$student->fname}}</p>
                                    @else
                                        <p class="lead"><i class="fas fa-male"></i><i class="fas fa-female"></i> Parents</p>
                                        <p style="color: red;">None</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if($student->livewith == 'parents')
                                        <p class="lead"><i class="fas fa-female"></i> Mother's Name</p>
                                        <p>{{$student->mname}}</p>
                                    @elseif($student->livewith == 'guidian')
                                        <p class="lead"><i class="fas fa-female"></i> second guidian's Name</p>
                                        <p>{{$student->mname}}</p>
                                    @else
                                        <p class="lead"><i class="fas fa-male"></i><i class="fas fa-female"></i> Parents</p>
                                        <p style="color: red;">None</p>
                                    @endif
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-street-view"></i> Disable?</p>
                                    <p>{{$student->disability}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-industry"></i> Religion</p>
                                    <p>{{$student->religion}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-hand-holding-heart"></i> Hobby</p>
                                    <p>{{$student->hobby}}</p>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-baseball-ball"></i> Prefered Sport</p>
                                    <p>{{$student->sport}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class=" fas fa-user-md"></i> Position</p>
                                    <p>{{$student->position}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class=" fas fa-warehouse"></i> Class Category</p>
                                    <p>{{$student->category}}</p>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-map-marker-alt"></i> Country</p>
                                    <p>{{$student->country}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-location-arrow"></i> State</p>
                                    <p>{{$student->state}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class="fas fa-map"></i> L.G.A</p>
                                    <p>{{$student->lga}}</p>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="lead"><i class=" fas fa-qrcode"></i> Zipcode</p>
                                    @if(!empty($student->zipcode))
                                        <p>{{$student->zipcode}}</p>
                                    @else
                                        <p style="color: red;">None Entered</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <p class="lead"><i class="far fa-calendar-alt"></i> Started</p>
                                    <p>Date: {{$student->d}} {{$student->m}} {{$student->y}} / Time: {{$student->time}}</p>
                                </div>
                                <div class="col-md-4"><br>
                                    <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                    <p>
                                        @if(count($session) > 0)
                                            @foreach($session as $sec)
                                                @if($sec->id == $student->session)
                                                    {{$sec->name}}
                                                @endif
                                            @endforeach
                                        @else
                                            <p style="color: red;">None</p>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4"><br>
                                    <p class="lead"><i class="fas fa-user-circle"></i> Term Created</p>
                                    <p>
                                        @if(count($term) > 0)
                                            @foreach($term as $ter)
                                                @if($ter->id == $student->term)
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
                    </div>
                </div>
            </div>

            <div class="modal fade show" id="showModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a></h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
                                <img style="width: 100%;" src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="user" width="35">
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