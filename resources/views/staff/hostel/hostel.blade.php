
	@extends('layouts.staff')

		@section('content')
			<div class="container-fluid dashboard-content">
				<div class="row">
	                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="page-header">
	                        <h2 class="pageheader-title">Hostels</h2>
	                        <br><br>
	                    </div>
	                </div>
	            </div>


	            <div class="row">
	                <div class="col-xl-8">
	                	<?php 
	                		use App\Model\allocate;
	                		$allocate = allocate::find(1);
            				if(!empty($allocate) && $allocate->hostel == Auth::guard('staff')->user()->id){
	                    		echo '<a href="'.url('staff_portal/staff_hostel/create').'" class="btn btn-success">Add New Hostel</a>';
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
	                        	@if(count($hostels) > 0)
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
		                                        <th data-field="subject" class="border-0">Number of Rooms</th>
		                                        <th data-field="class" class="border-0">Number Students In Hostel</th>
		                                        <th data-field="edition" class="border-0">Hostel Master</th>
		                                        <th data-field="status" class="border-0">Status</th>
		                                        @if(!empty($allocate) && $allocate->book == Auth::guard('staff')->user()->id)
		                                        	<th data-field="action" class="border-0">Action</th>
		                                        @endif
		                                    </tr>
		                                </thead>
		                                <tbody style="position: relative;">
		                                	@foreach($hostels as $hostel)
			                                    <tr>
			                                    	<td></td>
			                                        <td><a href="{{route('staff_hostel.show', $hostel->id)}}">{{$hostel->name}}</a></td>
			                                        <td>{{$hostel->no_of_rooms}}</td>
			                                        <td>
			                                        	@if(count($hostel_lists) > 0)
			                                        		@php $i = 0; @endphp
			                                        		@foreach($hostel_lists as $hostel_list)
			                                        			@if($hostel_list->hostelid == $hostel->id)
			                                        				@php $i++; @endphp
			                                        			@endif
			                                        		@endforeach
			                                        		({{$i}})
			                                        	@else
			                                        		<a href="#" style="color: red;">(0)</a>
			                                        	@endif
			                                        </td>
			                                        <td>
			                                        	@if(count($staffs) > 0)
			                                        		@foreach($staffs as $staff)
			                                        			@if($staff->id == $hostel->hostel_master)
			                                        				<a href="{{route('staff_staff.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>{{$hostel->status}}</td>
			                                        @if(!empty($allocate) && $allocate->book == Auth::guard('staff')->user()->id)
				                                        <td>
				                                            <div class="dropdown" style="text-align: center;">
				                                                <a href="#" class="dropdown-toggle" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$hostel->id}}" aria-controls="submenu-{{$hostel->id}}">
				                                                    <i class="fas fa-ellipsis-h"></i>
				                                                </a>
				                                            </div>
				                                            <div class="collapse submenu" id="submenu-{{$hostel->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
						                                        <!-- item-->
					                                            <a href="{{route('staff_hostel.show', $hostel->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
					                                            <!-- item-->
					                                            <a href="{{route('staff_hostel.edit', $hostel->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i>Edit</a>
					                                            <!-- item-->
					                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$hostel->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i>Delete</a>
					                                        </div>
				                                        </td>
				                                    @endif
			                                    </tr>
			                                    <div class="modal fade show" id="exampleModal{{$hostel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
				                                    <div class="modal-dialog" role="document">
				                                        <div class="modal-content">
				                                            <div class="modal-header">
				                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
				                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                    <span aria-hidden="true">×</span>
				                                                </a>
				                                            </div>
				                                            <div class="modal-body">
				                                                <p>Are you sure you want to delete this hostel?</p>
				                                            </div>
				                                            <div class="modal-footer">
				                                                <form id="delete-form-{{ $hostel->id }}" method="post" action="{{ route('staff_hostel.destroy',$hostel->id) }}" style="display: none">
				                                                  {{ csrf_field() }}
				                                                  {{ method_field('DELETE') }}
				                                                </form>
				                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
				                                                <a href="#" onclick="document.getElementById('delete-form-{{ $hostel->id }}').submit();" class="btn btn-primary">Confirm</a>
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
                                            <div> No hostel Has Been Registered Yet!</div>
                                        </i>
                                    </div>
	                            @endif
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> 
	    @endsection