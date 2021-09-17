
    @extends('layouts.admin')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Assignments</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Assignments</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div><br><br>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('assignments.index')}}" class="btn btn-danger"> < Back </a>
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
                                            <a href="#">{{$ad->name}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">
                                            @if(count($classes) > 0)
                                                @foreach($classes as $class)
                                                    @if($class->id == $ad->classid)
                                                        <a href="{{route('classes.show', $class->id)}}">{{$class->name}}</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p style="color: red;">None</p>
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
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> Assignment Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-left-0" id="price-tab-simple" data-toggle="tab" href="#price-simple" role="tab" aria-controls="price" aria-selected="false"><i class="fas fa-info-circle"></i> Questions Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-check"></i> Assignment Done</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-file-alt"></i> Subject</p>
                                            <p>
                                                @if(count($subjects) > 0)
                                                    @foreach($subjects as $subject)
                                                        @if($subject->id == $ad->subjectid)
                                                            <a href="{{route('subjects.show', $subject->id)}}"> {{$subject->name}}</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="far fa-question-circle"></i> Number of Questions Added</p>
                                            <p>{{$ad->noofqa}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="far fa-question-circle"></i> Number of Questions to be Answered</p>
                                            <p>{{$ad->noofq}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-check-circle"></i> Mark Per Question</p>
                                            <p>{{$ad->mpq}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-check-circle"></i> Question Total Mark</p>
                                            <p>{{$ad->tm}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-calendar-alt"></i> Assignment Start Date</p>
                                            <p>{{$ad->start_date}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-calendar-alt"></i> Assignment End Date</p>
                                            <p>{{$ad->end_date}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-clock"></i> Assignment Start Time</p>
                                            <p>{{$ad->start_time}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-clock"></i> Assignment End Time</p>
                                            <p>{{$ad->end_time}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-user"></i> Question Status</p>
                                            <p>@if(!empty($ass_score->queststatus))
                                                    <i style="color: green;"> Completed </i>
                                                @else
                                                    <i style="color: red;"> Incomplete </i>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-user"></i> Assignment Status</p>
                                            <p>@if(!empty($ass_score->ass_status))
                                                    <i style="color: red;"> Closed </i>
                                                @else
                                                    <i style="color: green;"> Open </i>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="far fa-money-bill-alt"></i> Status</p>
                                            <p>{{$ad->status}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                            <p>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($sec->id == $ad->session)
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
                                                        @if($ter->id == $ad->term)
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
                                <div class="tab-pane fade" id="price-simple" role="tabpanel" aria-labelledby="price-tab-simple">
                                    <div class="row" id="assignment">
                                        <div class="col-md-12">
                                            <section class="panel form-wizard" id="w3">
                                                <header class="panel-heading">
                                                    <h2 class="panel-title">Edit Assignment Questions</h2>
                                                </header>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="wizard-progress">
                                                                <ul class="wizard-steps" id="decin">
                                                                    @if(count($assignments) > 0)
                                                                        @php $i = 1; @endphp
                                                                        @php $j = count($assignments); @endphp
                                                                        @while ($i <= $j) 
                                                                            @foreach($assignments as $assignment)
                                                                                @if($assignment->qno == $i)
                                                                                    @if($ad->id == $assignment->testid)
                                                                                        @if($i == 1)
                                                                                            <li class="active ">
                                                                                                <a href="#w3-{{$i}}" onclick="getPage{{$i}}()" data-toggle="tab" aria-expanded="false"><span>{{$i}}</span></a>
                                                                                            </li>
                                                                                        @else
                                                                                            <li class="">
                                                                                                <a href="#w3-{{$i}}" onclick="getPage{{$i}}()" data-toggle="tab" aria-expanded="false"><span>{{$i}}</span></a>
                                                                                            </li>
                                                                                        @endif
                                                                                        @php $i++; @endphp
                                                                                    @else
                                                                        
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endwhile
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8" style="border-left: 1px solid;">
                                                            <form class="form-horizontal" novalidate="novalidate">
                                                                <div class="tab-content">
                                                                    <input type="hidden" name="adid" id="adid" value="{{$ad->id}}">
                                                                    @if(count($assignments) > 0)
                                                                        @php $i = 1; @endphp
                                                                        @php $j = count($assignments); @endphp
                                                                        @while ($i <= $j) 
                                                                            @foreach($assignments as $assignment)
                                                                                @if($assignment->qno == $i)
                                                                                    @if($ad->id == $assignment->testid)
                                                                                        <input type="hidden" name="id_{{$i}}" id="id_{{$i}}" value="{{$assignment->id}}">
                                                                                        <input type="hidden" name="i_{{$i}}" id="i_{{$i}}" value="{{$i}}">
                                                                                        @php $i++; @endphp
                                                                                    @else
                                                                        
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endwhile
                                                                    @endif

                                                                    @if(count($assignments) > 0)
                                                                        @php $i = 1; @endphp
                                                                        @php $j = count($assignments); @endphp
                                                                        @while ($i <= $j) 
                                                                            @foreach($assignments as $assignment)
                                                                                @if($assignment->qno == $i)
                                                                                    @if($ad->id == $assignment->testid)
                                                                                        @if($i == 1)
                                                                                            <div id="w3-{{$i}}" class="tab-pane active">
                                                                                                @include('inc.admin.assignment.view.innertab')
                                                                                            </div>
                                                                                        @else
                                                                                            <div id="w3-{{$i}}" class="tab-pane">
                                                                                                @include('inc.admin.assignment.view.innertab')
                                                                                            </div>
                                                                                        @endif
                                                                                        @php $i++; @endphp
                                                                                    @else
                                                                        
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endwhile
                                                                    @endif
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <ul class="pager">
                                                        <li class="previous disabled">
                                                            <a><i class="fa fa-angle-left"></i> Previous</a>
                                                        </li>
                                                        <li class="finish hidden pull-right disabled">
                                                            <a>Next</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-angle-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                @if(count($ass_scores) > 0)
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
                                                                <th data-field="name" class="border-0">Student</th>
                                                                <th data-field="subject" class="border-0">No of Questions Answered</th>
                                                                <th data-field="edition" class="border-0">Status</th>
                                                                <th data-field="action" class="border-0">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="position: relative;">
                                                            @foreach($ass_scores as $ass_score)
                                                                <tr>
                                                                    <td>
                                                                        @if(count($students) > 0)
                                                                            @foreach($students as $student)
                                                                                @if($student->id == $ass_score->studentid)
                                                                                    <a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <a href="#" style="color: red;">None</a>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @php $i = 0; @endphp
                                                                        @if(count($students) > 0 && count($assignments) > 0)
                                                                            @foreach($students as $student)
                                                                                @if($student->id == $ass_score->studentid && $ass_score->testid == $ad->id)
                                                                                    @php $i++; @endphp
                                                                                @endif
                                                                            @endforeach
                                                                            ({{$i}} Of {{count($assignments)}})
                                                                        @else
                                                                            <a href="#" style="color: red;">None</a>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <i>{{$ass_score->status}}</i>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown" style="text-align: center;">
                                                                            <a href="#" class="dropdown-toggle" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$ass_score->id}}" aria-controls="submenu-{{$ass_score->id}}">
                                                                                <i class="fas fa-ellipsis-h"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="collapse submenu" id="submenu-{{$ass_score->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                            <!-- item-->
                                                                            <a href="{{url('/main_panel_controller/assignment/scoreview'.$ass_score->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                            <!-- item-->
                                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$ass_score->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <div class="modal fade show" id="exampleModal{{$ass_score->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this assignment answer?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form id="delete-form-{{ $ass_score->id }}" method="post" action="{{url('/main_panel_controller/assignment/scoredelete'.$ass_score->id)}}" style="display: none">
                                                                                  {{ csrf_field() }}
                                                                                  {{ method_field('DELETE') }}
                                                                                </form>
                                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                                <a href="#" onclick="document.getElementById('delete-form-{{ $ass_score->id }}').submit();" class="btn btn-primary">Confirm</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div style="text-align: center; font-size: 20px;">
                                                        <i>
                                                            <div> No Assignment Has Been Done Yet!</div>
                                                        </i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal{{$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
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
                            <form id="delete-form-{{ $ad->id }}" method="post" action="{{ route('assignments.destroy',$ad->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $ad->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection