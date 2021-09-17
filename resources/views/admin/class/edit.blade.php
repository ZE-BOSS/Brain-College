@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Class</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('classes.index')}}" class="breadcrumb-link">Class</a></li>
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
                                    <a href="{{route('classes.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit Class</i>
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
                                    <form action="{{ route('classes.update', $clas->id) }}" id="edit-form-{{ $clas->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Class Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$clas->name}}" placeholder="J.S.S 1" required="">
                                                <div class="invalid-feedback">
                                                    Class Name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Class Category</label>
                                                <input type="text" class="form-control" name="category" value="{{$clas->category}}" placeholder="GOLD">
                                                <i style="color: red;">NOTE: This input is required, but really useful if you have the same class with multiple name. If not just type in none.</i>
                                                <div class="invalid-feedback">
                                                    Class Category are required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Class Teacher</label>
                                                <select class="custom-select d-block w-100" name="teacher">
                                                    @if(count($staffs) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($staffs as $staff)
                                                            @if($staff->id == $clas->teacher)
                                                                <option selected="selected" value="{{$staff->id}}">{{$staff->firstname}} {{$staff->othernames}}</option>
                                                            @else
                                                                <option value="{{$staff->id}}">{{$staff->firstname}} {{$staff->othernames}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class Teacher is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Class Captain</label>
                                                <select class="custom-select d-block w-100" name="captain">
                                                    @if(count($students) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($students as $student)
                                                            @if($student->id == $clas->captain)
                                                                <option selected="selected" value="{{$student->id}}">{{$student->firstname}} {{$student->othernames}}</option>
                                                            @else
                                                                <option value="{{$student->id}}">{{$student->firstname}} {{$student->othernames}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class Teacher is required.
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#exampleModal{{$clas->id}}">Update Changes</a>
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
        <div class="modal fade show" id="exampleModal{{$clas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to make changes to this Class data?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a href="#" onclick="document.getElementById('edit-form-{{ $clas->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection