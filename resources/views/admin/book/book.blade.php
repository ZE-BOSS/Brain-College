
	@extends('layouts.admin')

		@section('content')
			<div class="container-fluid dashboard-content">
				<div class="row">
	                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="page-header">
	                        <h2 class="pageheader-title">Books</h2>
	                        <p class="pageheader-text"></p>
	                        <div class="page-breadcrumb">
	                            <nav aria-label="breadcrumb">
	                                <ol class="breadcrumb">
	                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
	                                    <li class="breadcrumb-item active" aria-current="page">Books</li>
	                                </ol>
	                            </nav>
	                        </div>
	                    </div>
	                </div>
	            </div>


	            <div class="row">
	                <div class="col-xl-8">
	                    <a href="{{url('main_controller_panel/books/create')}}" class="btn btn-success">Add New Book</a>
	                    <a href="#" class="btn btn-outline-light" onclick="select()" title="Select" id="select"><i class="fas fa-exchange-alt"></i></a>
	                    <a href="#" class="btn btn-outline-light" onclick="deselect()" style="display: none;" title="Select" id="deselect"><i class="fas fa-exchange-alt"></i></a>
	                </div>
	                <div class="col-xl-4" id="null">

	                </div>
	                <div class="col-xl-2" style="display: none;" id="all">
	                    
	                </div>
	                <div class="col-xl-2" style="display: none;" id="action">
	                    
	                </div>
	                <div class="col-md-12"><br>
	                    @if(count($errors) > 0)
	                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                            <strong>ERROR!</strong>
	                            @foreach($errors->all() as $error)
	                                {{$error}}<br/>
	                            @endforeach-->
	                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">??</span>
	                            </a>
	                        </div> 
	                    @endif
	                    @if(session('success'))
	                        <div class="alert alert-success alert-dismissible fade show" role="alert">
	                            <strong>SUCCESS!</strong> {{session('success')}}
	                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">??</span>
	                            </a>
	                        </div>
	                        
	                    @elseif(session('error'))
	                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                            <strong>ERROR!</strong> {{session('error')}}
	                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">??</span>
	                            </a>
	                        </div>
	                    @else

	                    @endif
	                </div>
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="datatable-dashv1-list custom-datatable-overright">
	                        	@if(count($books) > 0)
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
		                                        <th data-field="name" class="border-0">Name</th>
		                                        <th data-field="subject" class="border-0">Subject</th>
		                                        <th data-field="class" class="border-0">Class</th>
		                                        <th data-field="edition" class="border-0">Edition</th>
		                                        <th data-field="status" class="border-0">Status</th>
		                                        <th data-field="action" class="border-0">Action</th>
		                                    </tr>
		                                </thead>
		                                <tbody style="position: relative;">
		                                	@foreach($books as $book)
			                                    <tr>
			                                    	<td></td>
			                                        <td><a href="{{route('books.show', $book->id)}}">{{$book->name}}</a></td>
			                                        <td>
			                                        	@if(count($subjects) > 0)
			                                        		@foreach($subjects as $subject)
			                                        			@if($subject->id == $book->subject)
			                                        				<a href="{{route('subjects.show', $subject->id)}}">{{$subject->name}}</a>
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>
			                                        	@if(count($classes) > 0)
			                                        		@foreach($classes as $class)
			                                        			@if($class->id == $book->classid)
			                                        				<a href="{{route('classes.show', $class->id)}}">{{$class->name}}</a>
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>{{$book->edition}}</td>
			                                        <td>{{$book->status}}</td>
			                                        <td>
			                                            <div class="dropdown" style="text-align: center;">
			                                                <a href="#" class="dropdown-toggle" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$book->id}}" aria-controls="submenu-{{$book->id}}">
			                                                    <i class="fas fa-ellipsis-h"></i>
			                                                </a>
			                                            </div>
			                                            <div class="collapse submenu" id="submenu-{{$book->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
					                                        <!-- item-->
				                                            <a href="{{route('books.show', $book->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
				                                            <!-- item-->
				                                            <a href="{{route('books.edit', $book->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i>Edit</a>
				                                            <!-- item-->
				                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$book->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i>Delete</a>
				                                        </div>
			                                        </td>
			                                    </tr>
			                                    <div class="modal fade show" id="exampleModal{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
				                                    <div class="modal-dialog" role="document">
				                                        <div class="modal-content">
				                                            <div class="modal-header">
				                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
				                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                    <span aria-hidden="true">??</span>
				                                                </a>
				                                            </div>
				                                            <div class="modal-body">
				                                                <p>Are you sure you want to delete this Book?</p>
				                                            </div>
				                                            <div class="modal-footer">
				                                                <form id="delete-form-{{ $book->id }}" method="post" action="{{ route('books.destroy',$book->id) }}" style="display: none">
				                                                  {{ csrf_field() }}
				                                                  {{ method_field('DELETE') }}
				                                                </form>
				                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
				                                                <a href="#" onclick="document.getElementById('delete-form-{{ $book->id }}').submit();" class="btn btn-primary">Confirm</a>
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
                                            <div> No Book Has Been Registered Yet!</div>
                                        </i>
                                    </div>
	                            @endif
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> 
	    @endsection