<div class="col-lg-12">
    <div class="card">
        <div class="datatable-dashv1-list custom-datatable-overright">
        	@if(count($accounts) > 0 && count($pays) && count($students) > 0 && count($classes) > 0)
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
                            <th data-field="name" class="border-0">Student's Name</th>
                            <th data-field="class" class="border-0">Class</th>
                            <th data-field="fees" class="border-0">Payment</th>
                            <th data-field="party" class="border-0">Amount to be Payed</th>
                            <th data-field="excursion" class="border-0">Amount Payed</th>
                            <th data-field="other" class="border-0">Amount Remaining</th>
                            <th data-field="action" class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody style="position: relative;">
                    	@foreach($students as $student)
	                    	@foreach($pays as $pay)
	                        	@foreach($accounts as $account)
                        			@foreach($classes as $class)
                        				@if($student->id == $account->studentid && $account->classid == $class->id && $pay->class == $class->id && $pay->term == $account->term && $pay->session == $account->session)
		                                    <tr>
		                                    	<td></td>
		                                    	<td>
                                        			<a href="#" data-toggle="modal" data-target="#editModal{{$account->id}}">{{$student->firstname}} {{$student->othernames}}</a>
		                                        </td>
		                                        <td>
		                                        	<a href="{{route('class.index')}}">{{$class->name}}</a>
		                                        </td>
		                                        <td>
		                                        	<a href="#">{{$pay->name}}</a>
		                                        </td>
		                                        <td>
		                                        	<a href="#">{{$pay->price - $pay->discount}}</a>
		                                        </td>
		                                        <td>
		                                        	@if(count($payeds) > 0)
		                                        		@foreach($payeds as $payed)
		                                        			@if($payed->payid == $pay->id && $payed->studentid == $student->id && $payed->classid == $class->id)
		                                        				@if($payed->amount_payed >= $pay->price - $pay->discount)
		                                        					<a href="#" style="color: green;">{{$payed->amount_payed}}</a>
		                                        				@elseif($payed->amount_payed < $pay->price - $pay->discount && $payed->amount_payed > 0)
		                                        					<a href="#" style="color: orange;">{{$payed->amount_payed}}</a>
		                                        				@else
		                                        					<a href="#" style="color: red;">{{$payed->amount_payed}}</a>
		                                        				@endif
		                                        			@endif
		                                        		@endforeach
		                                        	@else
		                                        		<a href="#" style="color: red;">0</a>
		                                        	@endif
		                                        </td>
		                                        <td>
		                                        	@if(count($payeds) > 0)
		                                        		@foreach($payeds as $payed)
		                                        			@if($payed->payid == $pay->id && $payed->studentid == $student->id && $payed->classid == $class->id)
			                                        			@if($pay->price - $pay->discount - $payed->amount_payed > 0)
			                                        				<a href="#" style="color: red;">{{$pay->price - $pay->discount - $payed->amount_payed}}</a>
			                                        			@else
			                                        				<a href="#" style="color: green;">{{$pay->price - $pay->discount - $payed->amount_payed}}</a>
			                                        			@endif
		                                        			@endif
		                                        		@endforeach
		                                        	@else
		                                        		<a href="#" style="color: red;">0</a>
		                                        	@endif
		                                        </td>
		                                        <td>
	                                                <a href="#" class="btn btn-outline-info btn-rounded btn-xs" href="#" data-toggle="modal" data-target="#editModal{{$pay->id}}s{{$student->id}}">
	                                                    View
	                                                </a>
		                                        </td>
		                                    </tr>
		                                    <div class="modal fade show" id="editModal{{$pay->id}}s{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" style="display: none;">
			                                    <div class="modal-dialog" role="document">
			                                        <div class="modal-content">
			                                            <div class="modal-header">
			                                                <h5 class="modal-title" id="exampleModalLabel{{$pay->id}}s{{$student->id}}">
					                                        	<a href="{{route('account.index')}}">{{$student->firstname}} {{$student->othernames}}</a>
			                                                </h5>
			                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
			                                                    <span aria-hidden="true">×</span>
			                                                </a>
			                                            </div>
			                                            <div class="modal-body">
			                                            	<div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errmain{{$pay->id}}s{{$student->id}}">
						                                        <strong>ERROR!</strong>
						                                        <p id="err{{$pay->id}}s{{$student->id}}"></p>
						                                        <a href="#" class="close" onclick="document.getElementById('errmain{{$pay->id}}s{{$student->id}}').style.display = 'none';" aria-label="Close">
						                                            <span aria-hidden="true">x</span>
						                                        </a>
						                                    </div>
						                                    <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucmain{{$pay->id}}s{{$student->id}}">
						                                        <strong>SUCCESS!</strong>
						                                        <p id="suc{{$pay->id}}s{{$student->id}}"></p>
						                                        <a href="#" class="close" onclick="document.getElementById('sucmain{{$pay->id}}s{{$student->id}}').style.display = 'none';" aria-label="Close">
						                                            <span aria-hidden="true">x</span>
						                                        </a>
						                                    </div>
			                                            	<div class="row"  id="sub">
			                                            		<div class="col-md-6"> 
					                                                <strong style="font-size: 15px;">Class: </strong>
						                                        	<a href="{{route('class.index')}}">{{$class->name}}</a>
						                                        </div>
						                                        <div class="col-md-6">
				                                        			<strong style="font-size: 15px;">Payment: </strong>
				                                        			<a href="#">{{$pay->name}}</a>
				                                        		</div>
				                                        		<div class="col-md-6">
				                                        			<strong style="font-size: 15px;">Ammount to be payed: </strong><a href="#">{{$pay->price - $pay->discount}}</a>
				                                        		</div>
				                                        		<div class="col-md-6">
				                                        			<strong style="font-size: 15px;">Amount Payed: </strong>
				                                        			@if(count($payeds) > 0)
						                                        		@foreach($payeds as $payed)
						                                        			@if($payed->payid == $pay->id && $payed->studentid == $student->id && $payed->classid == $class->id)
						                                        				@if($payed->amount_payed >= $pay->price - $pay->discount)
						                                        					<a href="#" style="color: green;">{{$payed->amount_payed}}</a>
						                                        				@elseif($payed->amount_payed < $pay->price - $pay->discount && $payed->amount_payed > 0)
						                                        					<a href="#" style="color: orange;">{{$payed->amount_payed}}</a>
						                                        				@endif
						                                        			@endif
						                                        		@endforeach
						                                        	@else
						                                        		<a href="#" style="color: red;">0</a>
						                                        	@endif
				                                        		</div>
				                                        		<div class="col-md-6">
				                                        			<strong style="font-size: 15px;">Amount Remaining: </strong>
				                                        			@if(count($payeds) > 0)
						                                        		@foreach($payeds as $payed)
						                                        			@if($payed->payid == $pay->id && $payed->studentid == $student->id && $payed->classid == $class->id)
							                                        			@if($pay->price - $pay->discount - $payed->amount_payed > 0)
							                                        				<a href="#" style="color: red;">{{$pay->price - $pay->discount - $payed->amount_payed}}</a>
							                                        			@else
							                                        				<a href="#" style="color: green;">0</a>
							                                        			@endif
						                                        			@endif
						                                        		@endforeach
						                                        	@else
						                                        		<a href="#" style="color: red;">0</a>
						                                        	@endif
				                                        		</div>
				                                        	</div> 
			                                            </div>
			                                            <div class="modal-footer">
			                                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            @endif
			                        @endforeach
	                            @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                @else
                	<div style="text-align: center; font-size: 20px;">
                        <i>
                            <div> No Payment Has Been Made For This Term!</div>
                        </i>
                    </div>
                @endif
            </table>
        </div>
    </div>
</div>