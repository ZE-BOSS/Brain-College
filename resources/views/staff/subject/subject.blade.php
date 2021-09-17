
	@extends('layouts.staff')

		@section('content')
			<div class="container-fluid dashboard-content">
				<div class="row">
	                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="page-header">
	                        <h2 class="pageheader-title">Subjects</h2>
	                        <br><br>
	                    </div>
	                </div>
	            </div>


	            <div class="row">
	                <div class="col-xl-8">
	                    <?php 
	                		use App\Model\allocate;
	                		$allocate = allocate::find(1);
            				if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
	                    		echo '<a href="'.url('staff_portal/staff_subject/create').'" class="btn btn-success">Add New Subject</a>';
	                    	}
	                    ?>
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
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="datatable-dashv1-list custom-datatable-overright">
	                        	@if(count($subjects) > 0)
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
		                                        <th data-field="class" class="border-0">Class</th>
		                                        <th data-field="book" class="border-0">Book</th>
		                                        <th data-field="teacher" class="border-0">Teacher</th>
		                                        <th data-field="status" class="border-0">Status</th>
		                                        @if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id)
		                                        	<th data-field="action" class="border-0">Action</th>
		                                        @endif
		                                    </tr>
		                                </thead>
		                                <tbody style="position: relative;">
		                                	@foreach($subjects as $subject)
			                                    <tr>
			                                    	<td></td>
			                                        <td><a href="{{route('staff_subject.show', $subject->id)}}">{{$subject->name}}</a></td>
			                                        <td>
			                                        	@if(count($classes) > 0)
			                                        		@foreach($classes as $class)
			                                        			@if($class->id == $subject->classid)
			                                        				<a href="{{route('staff_class.show', $class->id)}}">{{$class->name}}</a>
			                                        			@else
			                                        			
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>
			                                        	@if(count($books) > 0)
			                                        		@foreach($books as $book)
			                                        			@if($book->subject == $subject->id)
			                                        				<a href="{{route('staff_book.show', $book->id)}}">{{$book->name}}</a><br>
			                                        			@else
			                                        				
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>
			                                        	@if(count($staffs) > 0)
			                                        		@foreach($staffs as $staff)
			                                        			@if($subject->teacher == $staff->id)
			                                        				<a href="{{route('staff_staff.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
			                                        			@else
			                                        				
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>{{$subject->status}}</td>
			                                        @if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id)
				                                        <td>
				                                            <div class="dropdown" style="text-align: center;">
				                                                <a href="#" class="dropdown-toggle" href="#" data-toggle="collapse" aria-expanded="false" data-target="#sub_submenu-{{$subject->id}}" aria-controls="sub_submenu-{{$subject->id}}">
				                                                    <i class="fas fa-ellipsis-h"></i>
				                                                </a>
				                                            </div>
				                                            <div class="collapse submenu" id="sub_submenu-{{$subject->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
						                                        <!-- item-->
					                                            <a href="{{route('staff_subject.show', $subject->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
					                                            <!-- item-->
					                                            <a href="{{route('staff_subject.edit', $subject->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i> Edit</a>
					                                            <!-- item-->
					                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$subject->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
					                                        </div>
				                                        </td>
				                                    @endif
			                                    </tr>
			                                    <div class="modal fade show" id="exampleModal{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
				                                    <div class="modal-dialog" role="document">
				                                        <div class="modal-content">
				                                            <div class="modal-header">
				                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
				                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                    <span aria-hidden="true">×</span>
				                                                </a>
				                                            </div>
				                                            <div class="modal-body">
				                                                <p>Are you sure you want to delete this subject?</p>
				                                            </div>
				                                            <div class="modal-footer">
				                                                <form id="delete-form-{{ $subject->id }}" method="post" action="{{ route('staff_subject.destroy',$subject->id) }}" style="display: none">
				                                                  {{ csrf_field() }}
				                                                  {{ method_field('DELETE') }}
				                                                </form>
				                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
				                                                <a href="#" onclick="document.getElementById('delete-form-{{ $subject->id }}').submit();" class="btn btn-primary">Confirm</a>
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
                                            <div> No Subject Has Been Added Yet!</div>
                                        </i>
                                    </div>
	                            @endif
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> 
	    @endsection