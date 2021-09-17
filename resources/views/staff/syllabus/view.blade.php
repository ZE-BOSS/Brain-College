


    @extends('layouts.staff')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Syllabus</h2>
                            <br><br>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('staff_syllabus.index')}}" class="btn btn-danger"> < Back </a>
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
                                            <a href="#">{{$syllabus->name}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">
                                            @if(count($classes) > 0)
                                                @foreach($classes as $class)
                                                    @if($class->id == $syllabus->classid)
                                                        <a href="{{route('staff_class.show', $class->id)}}">{{$class->name}}</a>
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
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> syllabus Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-left-0" id="price-tab-simple" data-toggle="tab" href="#price-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-clipboard-list"></i> Syllabus Topics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-file-alt"></i> Subject</p>
                                            <p>
                                                @if(count($subjects) > 0)
                                                    @foreach($subjects as $subject)
                                                        @if($subject->id == $syllabus->subjectid)
                                                            <a href="{{route('staff_subject.show', $subject->id)}}"> {{$subject->name}}</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-home"></i> Class</p>
                                            <p>
                                                @if(count($classes) > 0)
                                                    @foreach($classes as $class)
                                                        @if($class->id == $syllabus->classid)
                                                            <a href="{{route('staff_class.show', $class->id)}}"> {{$class->name}}</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-sort-numeric-up"></i> Number of Topics</p>
                                            <p>
                                                @php $i = 0 @endphp
                                                @if(count($syll_lists) > 0)
                                                    @foreach($syll_lists as $syllist)
                                                        @if($syllabus->id == $syllist->syllid)
                                                            @php $i++ @endphp
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
                                                        @if($sec->id == $syllabus->session)
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
                                                        @if($ter->id == $syllabus->term)
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
                                    @if(count($subjects) > 0 && count($classes) > 0)
                                        @foreach($classes as $class)
                                            @foreach($subjects as $subject)
                                                @if($subject->id == $syllabus->subjectid && $class->id == $syllabus->classid)
                                                    <p style="font-size: 30px; padding: 20px; text-align: center;">Syllabus For <a href="{{route('staff_subject.show', $subject->id)}}"> {{$subject->name}}</a>, <a href="{{route('staff_class.show', $class->id)}}"> {{$class->name}}</a></p>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @else
                                        <p style="color: red;">Subject</p>
                                    @endif
                                    @if(count($syll_lists) > 0)
                                        @php $i = 1; @endphp
                                        @foreach($syll_lists as $syll_list)
                                            <div class="row" style="padding-left: 20px;">
                                                <div class="col-md-1"><br>
                                                    <p class="lead" style="font-size: 20px;">{{$i}}.</p>
                                                </div>
                                                <div class="col-md-11"><br>
                                                    <p class="lead" style="font-size: 20px;">{{$syll_list->topic}}</p>
                                                    <p style="font-size: 15px;">{{$syll_list->subtopic}}</p>
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-10"><br>
                                                
                                            </div>
                                            <div class="col-md-2"><br>
                                                <a href="/staff_portal/staff_syllabi/print/{{$id}}" class="btn btn-success" target="_blank">Print</a>
                                            </div>
                                        </div>
                                    @endif
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
                                                <p><a href="{{route('staff_syllabus.edit', $syllabus->id)}}"><i class="fas fa-edit"></i> Edit Syllabus</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$syllabus->id}}"><i class="fas fa-trash-alt"></i> Delete Syllabus</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="exampleModal{{$syllabus->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
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
                            <form id="delete-form-{{ $syllabus->id }}" method="post" action="{{ route('staff_syllabus.destroy',$syllabus->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $syllabus->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection