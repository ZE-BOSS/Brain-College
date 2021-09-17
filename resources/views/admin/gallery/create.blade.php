@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Create Callery Media</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('galleries.index')}}" class="breadcrumb-link">Gallery</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                                    <a href="{{route('galleries.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                    <i class="mb-0" style="padding-right: 5px;"></i>
                                    <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Create gallery</i>
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
                                    <form action="{{ route('galleries.store') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Title" required="">
                                                <div class="invalid-feedback">
                                                    Valid Title is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="category">Category</label>
                                                <select class="custom-select d-block w-100" name="category" required="">
                                                    <option value="Non" selected="selected">Select...</option>
                                                    <option value="Cultural Day">Cultural Day</option>
                                                    <option value="Christmas Day">Christmas Day</option>
                                                    <option value="Excussion">Excussion</option>
                                                    <option value="Parents, Teachers & Administration(PTA) Metting">Parents, Teachers & Administration(PTA) Metting</option>
                                                    <option value="Fun Fair">Fun Fair</option>
                                                    <option value="Science Week">Science Week</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Category is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label>Details</label>
                                                <textarea class="form-control" name="details"></textarea>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="col-md-12" onloaddata="non()">
                                            <h4 class="mb-3">What file do you want to upload?</h4>
                                            <div class="row">
                                                <div class="d-block my-3 col-md-2">
                                                    <div class="custom-control custom-radio">
                                                        <input id="debit" name="file" value="image" onclick="img()" type="radio" class="custom-control-input" required="">
                                                        <label class="custom-control-label" for="debit">Image</label>
                                                    </div>
                                                </div>
                                                <div class="d-block my-3 col-md-2">
                                                    <div class="custom-control custom-radio">
                                                        <input id="paypal" name="file" value="video" onclick="vid()" type="radio" class="custom-control-input" required="">
                                                        <label class="custom-control-label" for="paypal">Video</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="image" style="display: none;">
                                            <div class="form-group">
                                                <label style="color: blue;">Image</label>
                                                <input type="file" class="form-control" style="border-color: blue;" name="image" placeholder="Choose Image">
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="video" style="display: none;">
                                            <div class="form-group">
                                                <label style="color: green;">Video</label>
                                                <input type="file" class="form-control" style="border-color: green;" name="video" placeholder="Choose Video">
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <button class="btn btn-primary btn-lg" type="submit">Add gallery</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection