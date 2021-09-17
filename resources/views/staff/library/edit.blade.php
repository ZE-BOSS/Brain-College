@extends('layouts.staff')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Library</h2>
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
                                    <a href="{{route('staff_library.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit Library</i>
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
                                    <form action="{{ route('staff_library.update', $library->id) }}" id="edit-form-{{ $library->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Book Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$library->name}}" placeholder="New English" required="">
                                                <div class="invalid-feedback">
                                                    library Name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Subject</label>
                                                <select class="custom-select d-block w-100" name="subject">
                                                    @if(count($subjects) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($subjects as $subject)
                                                            @if($library->subject == $subject->id)
                                                                <option selected="selected"  value="{{$subject->id}}">{{$subject->name}}</option>
                                                            @else
                                                                <option  value="{{$subject->id}}">{{$subject->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled>Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Subject are required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Class</label>
                                                <select class="custom-select d-block w-100" name="class">
                                                    @if(count($classes) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($classes as $class)
                                                            @if($library->classid == $class->id)
                                                                <option selected="selected" value="{{$class->id}}">{{$class->name}}</option>
                                                            @else
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option selected="selected" disabled id="opt">Select...</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Author</label>
                                                <input type="text" class="form-control" name="author" value="{{$library->author}}" placeholder="O. E. Maxwell" required="">
                                                <div class="invalid-feedback">
                                                    library Author is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Edition(Optional)</label>
                                                <input type="text" class="form-control" name="edition" value="{{$library->edition}}" placeholder="1st Edition">
                                                <div class="invalid-feedback">
                                                    library Edition is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="download">Downloadable</label>
                                                <select class="custom-select d-block w-100" name="download">
                                                    @if($library->download == 'Yes')
                                                        <option value="Yes" selected="selected">Yes</option>
                                                        <option value="No">No</option>
                                                    @else
                                                        <option value="Yes">Yes</option>
                                                        <option value="No" selected="selected">No</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-9">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#exampleModal{{$library->id}}">Update Changes</a>
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
                        <p>Are you sure you want to make changes to this Class data?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <a href="#" onclick="document.getElementById('edit-form-{{ $library->id }}').submit();" class="btn btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
@endsection