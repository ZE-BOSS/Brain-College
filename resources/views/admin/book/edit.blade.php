@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Book</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('books.index')}}" class="breadcrumb-link">Book</a></li>
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
                                    <a href="{{route('books.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Edit Book</i>
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
                                    <form action="{{ route('books.update', $book->id) }}" id="edit-form-{{ $book->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Book Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$book->name}}" placeholder="New English" required="">
                                                <div class="invalid-feedback">
                                                    Book Name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="otherName">Subject</label>
                                                <select class="custom-select d-block w-100" name="subject">
                                                    @if(count($subjects) > 0)
                                                        <option selected="selected" disabled>Select...</option>
                                                        @foreach($subjects as $subject)
                                                            @if($book->subject == $subject->id)
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
                                                            @if($book->classid == $class->id)
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
                                                <input type="text" class="form-control" name="author" value="{{$book->author}}" placeholder="O. E. Maxwell" required="">
                                                <div class="invalid-feedback">
                                                    Book Author is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Edition(Optional)</label>
                                                <input type="text" class="form-control" name="edition" value="{{$book->edition}}" placeholder="1st Edition">
                                                <div class="invalid-feedback">
                                                    Book Edition is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="class">Price(Optional)</label>
                                                <input type="text" class="form-control" name="price" value="{{$book->price}}" placeholder="1,000">
                                                <div class="invalid-feedback">
                                                    Book Price is required.
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#exampleModal{{$book->id}}">Update Changes</a>
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
        <div class="modal fade show" id="exampleModal{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
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
                            <a href="#" onclick="document.getElementById('edit-form-{{ $book->id }}').submit();" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection