


    @extends('layouts.admin')

        @section('content')
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Library</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
 

                <div class="row">
                    <div class="col-xl-8">
                        <a href="{{route('library.index')}}" class="btn btn-danger"> < Back </a>
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
                                            <a href="#">{{$library->name}}</a>
                                        </h3>
                                        <h6 class="card-subtitle text-muted mb-3">
                                            @if(count($classes) > 0)
                                                @foreach($classes as $class)
                                                    @if($class->id == $library->classid)
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
                                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="false"><i class="fas fa-info-circle"></i> Book Info</a>
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
                                                        @if($subject->id == $library->subject)
                                                            <a href="{{route('subjects.show', $subject->id)}}"> {{$subject->name}}</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p style="color: red;">None</p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="lead"><i class="fas fa-user"></i> Author</p>
                                            <p>{{$library->author}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fab fa-expeditedssl"></i> Edition</p>
                                            <p>{{$library->edition}}</p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-download"></i> Downloadable</p>
                                            <p>
                                                @if($library->download == 'Yes')
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <p class="lead"><i class="fas fa-user-circle"></i> Session Created</p>
                                            <p>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($sec->id == $library->session)
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
                                                        @if($ter->id == $library->term)
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
                                                <p><a href="{{route('library.edit', $library->id)}}"><i class="fas fa-edit"></i> Edit {{$library->name}}</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><a href="#" data-toggle="modal" data-target="#exampleModal{{$library->id}}"><i class="fas fa-trash-alt"></i> Delete {{$library->name}}</a></p>
                                            </div>
                                        </div>
                                    </div><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="exampleModal{{$library->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Book data?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="delete-form-{{ $library->id }}" method="post" action="{{ route('library.destroy',$library->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('delete-form-{{ $library->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection