@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Syllabus</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('syllabus.index')}}" class="breadcrumb-link">Syllabus</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                                    <a href="{{route('syllabus.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Add Syllabus</i>
                                    @if(!empty($tname && !empty($sname)))
                                        <a href="{{route('syllabus.index')}}" class="btn-success" style="padding: 10px; margin-left: 10%;">Import from {{$tname}} term {{$sname}} session</a>
                                    @else

                                    @endif
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
                                    <form action="{{ route('syllabus.store') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Subject</label>
                                                <select class="custom-select d-block w-100" name="subject">
                                                    @if(count($subjects) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
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
                                                            <option value="{{$class->id}}">{{$class->name}}</option>
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
                                                <input type="number" class="form-control" name="topics" required="" id="topics">
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="gettopic">
                                            
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary btn-lg" type="submit">Add syllabus</button>
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