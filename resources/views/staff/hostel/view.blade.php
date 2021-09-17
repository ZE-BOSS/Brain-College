
    @extends('layouts.staff')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Hostels</h2>
                            <br><br>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('staff_hostel.index')}}" class="btn btn-danger"> < Back </a>
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
                                    <!-- .card-body -->
                                    <div class="card-body text-center">
                                        <!-- /.user-avatar -->
                                        <h3 class="card-title mb-2">
                                            <a href="#">{{$hostel->name}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">
                                            @if(count($staffs) > 0)
                                                @foreach($staffs as $staff)
                                                    @if($staff->id == $hostel->hostel_master)
                                                        <a href="{{route('staff_staff.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option selected="selected" disabled>Select...</option>
                                            @endif
                                        </h6>
                                        <!-- /grid row -->
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
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> hostel Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="occupy-tab-simple" data-toggle="tab" href="#occupy-simple" role="tab" aria-controls="occupy" aria-selected="false"><i class="fas fa-info-circle"></i> hostel Occupants</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-file-alt"></i> Number of Rooms</p>
                                            <p>{{$hostel->no_of_rooms}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-user"></i> Number Students In Hostel</p>
                                            <p>
                                                @if(count($hostel_lists) > 0)
                                                    @php $i = 0; @endphp
                                                    @foreach($hostel_lists as $hostel_list)
                                                        @if($hostel_list->hostelid == $hostel->id)
                                                            @php $i++; @endphp
                                                        @endif
                                                    @endforeach
                                                    ({{$i}})
                                                @else
                                                    <a href="#" style="color: red;">0</a>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                            <p>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($sec->id == $hostel->session)
                                                            {{$sec->name}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Term Created</p>
                                            <p>
                                                @if(count($term) > 0)
                                                    @foreach($term as $ter)
                                                        @if($ter->id == $hostel->term)
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
                                <div class="tab-pane fade" id="occupy-simple" role="tabpanel" aria-labelledby="occupy-tab-simple">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                @if(count($hostel_lists) > 0 && count($session) > 0 && count($term) > 0)
                                                    <div id="toolbar" class="">
                                                        <select class="form-control">
                                                            <option value="">Export Basic</option>
                                                            <option value="all">Export All</option>
                                                            <option value="selected">Export Selected</option>
                                                        </select>
                                                    </div>
                                                    <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                        <thead>
                                                            <tr class="border-0">
                                                                <th data-field="state" data-checkbox="true"></th>
                                                                <th data-field="user" class="border-0">User</th>
                                                                <th data-field="category" class="border-0">Category</th>
                                                                <th data-field="room" class="border-0">Room</th>
                                                                <th data-field="class" class="border-0">Class</th>
                                                                <th data-field="status" class="border-0">Status</th>
                                                                <th data-field="action" class="border-0">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="position: relative;">
                                                            @foreach($hostel_lists as $hostel_list)
                                                                @foreach($session as $sec)
                                                                    @foreach($term as $ter)
                                                                        @if($hostel_list->term == $ter->id && $ter->category == 'Open' && $hostel_list->session == $sec->id && $sec->category == 'Open')
                                                                            @include('inc.staff.hostel.lists')
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div style="text-align: center; font-size: 20px;">
                                                        <i>
                                                            <div> No hostel Has Been Registered Yet!</div>
                                                        </i>
                                                    </div>
                                                @endif
                                            </div>
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
                                        <p class="lead"><i class=" fas fa-qrcode"></i> Options</p><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><a href="{{route('staff_hostel.edit', $hostel->id)}}"><i class="fas fa-edit"></i> Edit {{$hostel->name}}</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$hostel->id}}"><i class="fas fa-trash-alt"></i> Delete {{$hostel->name}}</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="exampleModal{{$hostel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Class data?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="delete-form-{{ $hostel->id }}" method="post" action="{{ route('staff_hostel.destroy',$hostel->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $hostel->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection