				<div class="row">
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
	                        	@if(count($students) > 0)
	                        		<div id="toolbar1" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;" class="">
	                        			<div class="row">
                                            <div class="col-lg-12" style="margin-left: 0px;">
                                                <select class="form-control">
                                                    <option value="">Export Basic</option>
                                                    <option value="all">Export All</option>
                                                    <option value="selected">Export Selected</option>
                                                </select>
                                            </div>
                                        </div>
		                            </div>
		                            <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
		                                <thead>
		                                    <tr class="border-0">
		                                    	<th data-field="state" data-checkbox="true"></th>
		                                        <th data-field="photo" class="border-0">Photo</th>
		                                        <th data-field="username" class="border-0">User Name</th>
		                                        <th data-field="fullname" class="border-0">Full Name</th>
		                                        <th data-field="email" class="border-0">Email</th>
		                                        <th data-field="phonenumber" class="border-0">Phone Number</th>
		                                        <th data-field="status" class="border-0">Status</th>
		                                        <th data-field="action" class="border-0">Action</th>
		                                    </tr>
		                                </thead>
		                                <tbody style="position: relative;">
		                                	@foreach($students as $student)
			                                    <tr>
			                                    	<td></td>
			                                        <td>
	                                                    @if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
	                                                    	<a href="#" data-toggle="modal" data-target="#showModalStudent{{$student->id}}">
	                                                    		<div class="m-r-10">
	                                                    			<img src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="user" width="35">
	                                                    		</div>
	                                                    	</a>
	                                                    @else
	                                                    	<a href="#" data-toggle="modal" data-target="#showModalStudent{{$student->id}}">
		                                                        <div class="m-r-10">
		                                                        	<img src="/admin/assets/images/dribbble.png" alt="user" width="35">
		                                                        </div>
		                                                    </a>
	                                                    @endif
			                                        </td>
			                                        <td><a href="{{route('students.show', $student->id)}}">{{$student->username}}</a></td>
			                                        <td><a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a></td>
			                                        <td>{{$student->email}}</td>
			                                        <td>{{$student->phoneno1}} / {{$student->phoneno2}}</td>
			                                        <td>{{$student->status}}</td>
			                                        <td>
			                                            <div class="dropdown" style="text-align: center;">
			                                                <a href="#" class="dropdown-toggle card-drop" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-student-{{$student->id}}" aria-controls="submenu-student-{{$student->id}}">
			                                                    <i class="fas fa-ellipsis-h"></i>
			                                                </a>
			                                            </div>
			                                            <div class="collapse submenu" id="submenu-student-{{$student->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
					                                        <!-- item-->
				                                            <a href="{{route('studentres', $student->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> Restore</a>
				                                            <!-- item-->
				                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$student->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i>Delete</a>
				                                        </div>
			                                        </td>
			                                    </tr>
			                                    <div class="modal fade show" id="exampleModalStudent{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
				                                    <div class="modal-dialog" role="document">
				                                        <div class="modal-content">
				                                            <div class="modal-header">
				                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
				                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                    <span aria-hidden="true">×</span>
				                                                </a>
				                                            </div>
				                                            <div class="modal-body">
				                                                <p>Are you sure you want to delete this student data Permanently?</p>
				                                            </div>
				                                            <div class="modal-footer">
				                                                <form id="delete-form-student-{{ $student->id }}" method="post" action="{{ route('studentdel',$student->id) }}" style="display: none">
				                                                  {{ csrf_field() }}
				                                                  {{ method_field('GET') }}
				                                                </form>
				                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
				                                                <a href="#" onclick="document.getElementById('delete-form-student-{{ $student->id }}').submit();" class="btn btn-primary">Confirm</a>
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="modal fade show" id="showModalStudent{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" style="display: none;">
				                                    <div class="modal-dialog" role="document">
				                                        <div class="modal-content">
				                                            <div class="modal-header">
				                                                <h5 class="modal-title" id="exampleModalLabel"><a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a></h5>
				                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                    <span aria-hidden="true">×</span>
				                                                </a>
				                                            </div>
				                                            <div class="modal-body">
				                                            	@if(!empty($student->profilepics) &&  file_exists(storage_path().'/app/public/image/student/'.$student->profilepics))
			                                                    	<img style="width: 100%;" src="{{asset('/storage/image/student/'.$student->profilepics)}}" alt="user" width="35">
			                                                    @else
				                                                    <img style="width: 100%;" src="/admin/assets/images/dribbble.png" alt="user" width="35">
			                                                    @endif
				                                            </div>
				                                            <div class="modal-footer">
				                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
			                                @endforeach
		                                </tbody>
		                            @else
	                                    <div style="text-align: center; font-size: 20px;">
	                                        <i>
	                                            <div> No Student Has Been Deleted Yet!</div>
	                                        </i>
	                                    </div>
		                            @endif
	                            </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- ============================================================== -->
	                <!-- end campaign activities   -->
	                <!-- ============================================================== -->
	            </div>