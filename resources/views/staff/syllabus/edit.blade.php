@extends('layouts.staff')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Syllabus</h2>
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
                                    <a href="{{route('staff_syllabus.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit Syllabus</i>
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
                                    <form action="{{ route('staff_syllabus.update', $id) }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Subject</label>
                                                <select class="custom-select d-block w-100" name="subject">
                                                    @if(count($subjects) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($subjects as $subject)
                                                            @if($syllabus->subjectid == $subject->id)
                                                                <option selected="selected" value="{{$subject->id}}">{{$subject->name}}</option>
                                                            @else
                                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Subject is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Class</label>
                                                <select class="custom-select d-block w-100" name="class">
                                                    @if(count($classes) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($classes as $class)
                                                            @if($syllabus->classid == $class->id)
                                                                <option selected="selected" value="{{$class->id}}">{{$class->name}}</option>
                                                            @else
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endif
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
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="class">Number of topics to be added</label>
                                                <input type="number" class="form-control" value="{{count($syll_lists)}}" name="topics" required="" id="topics">
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="gettopic">
                                            @if(count($syll_lists) > 0)
                                                @php $i = 0; @endphp
                                                @foreach($syll_lists as $syll_list)
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                                <label for="topic">Topic</label>
                                                                <input type="text" class="form-control" name="topic{{$i}}" value="{{$syll_list->topic}}" placeholder="Topic"><br>
                                                                <label for="topic">Sub Topics</label>
                                                                <textarea class="col-md-12 mb-3" name="subtopic{{$i}}" placeholder="Enter sub topic here...">{{$syll_list->subtopic}}</textarea>
                                                                <div class="invalid-feedback">
                                                                    Sub Topic is required.
                                                                </div>                             
                                                            </div>
                                                            <div class="col-md-1" style="margin-top: 100px;">
                                                                <a href="#" id="remove_syll{{$i}}"><i class="fas fa-window-close" style="color: red;"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $i++; @endphp
                                                @endforeach
                                            @endif
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-9">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-primary btn-lg" type="submit">Update Syllabus</button>
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