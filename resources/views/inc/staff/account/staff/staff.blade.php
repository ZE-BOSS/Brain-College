					<div class="col-lg-12">
	                    <div class="card">
	                        <div class="datatable-dashv1-list custom-datatable-overright">
	                        	@if(count($payments) > 0)
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
		                                        <th data-field="name" class="border-0">staff's Name</th>
		                                        <th data-field="amount_to_pay" class="border-0">Amount to be paid</th>
		                                        <th data-field="amount_payed" class="border-0">Amount Paid</th>
		                                        <th data-field="action" class="border-0">Action</th>
		                                    </tr>
		                                </thead>
		                                <tbody style="position: relative;">
		                                	@foreach($payments as $payment)
			                                    <tr>
			                                    	<td></td>
			                                    	<td>
			                                        	@if(count($staffs) > 0)
			                                        		@foreach($staffs as $staff)
			                                        			@if($staff->id == $payment->staffid)
			                                        				<a href="{{route('staffs.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
			                                        			@else
			                                        				
			                                        			@endif
			                                        		@endforeach
			                                        	@else
			                                        		<a href="#" style="color: red;">None</a>
			                                        	@endif
			                                        </td>
			                                        <td>
			                                        	@if(!empty($payment->to_pay))
			                                        		<i>{{$payment->to_pay}}</i>
			                                        	@else
			                                        		<i style="color: red;">0</i>
			                                        	@endif
			                                        </td>
			                                        <td>
			                                        	@if($payment->payed >= $payment->to_pay && $payment->payed != 0)
			                                        		<i style="color: green;">{{$payment->payed}}</i>
			                                        	@elseif($payment->payed < $payment->to_pay && $payment->payed != 0)
			                                        		<i style="color: orange;">{{$payment->payed}}</i>
			                                        	@else
			                                        		<i style="color: red;">0</i>
			                                        	@endif
			                                        </td>
			                                        <td>
		                                                <a href="#" class="btn btn-outline-info btn-rounded btn-xs" href="#" data-toggle="modal" data-target="#staff_editModal{{$payment->id}}">
		                                                    View
		                                                </a>
			                                        </td>
			                                    </tr>
			                                    <div class="modal fade show" id="staff_editModal{{$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="staff_editModalLabel" style="display: none;">
				                                    <div class="modal-dialog" role="document">
				                                        <div class="modal-content">
				                                            <div class="modal-header">
				                                                <h5 class="modal-title" id="staff_exampleModalLabel">
				                                                	@if(count($staffs) > 0)
						                                        		@foreach($staffs as $staff)
						                                        			@if($staff->id == $payment->staffid)
						                                        				<a href="{{route('staffs.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
						                                        			@else
						                                        				
						                                        			@endif
						                                        		@endforeach
						                                        	@else
						                                        		<a href="#" style="color: red;">None</a>
						                                        	@endif
				                                                </h5>
				                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
				                                                    <span aria-hidden="true">×</span>
				                                                </a>
				                                            </div>
				                                            <div class="modal-body">
				                                            	<div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errmain{{$payment->id}}">
							                                        <strong>ERROR!</strong>
							                                        <p id="err{{$payment->id}}"></p>
							                                        <a href="#" class="close" onclick="document.getElementById('errmain{{$payment->id}}').style.display = 'none';" aria-label="Close">
							                                            <span aria-hidden="true">x</span>
							                                        </a>
							                                    </div>
							                                    <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucmain{{$payment->id}}">
							                                        <strong>SUCCESS!</strong>
							                                        <p id="suc{{$payment->id}}"></p>
							                                        <a href="#" class="close" onclick="document.getElementById('sucmain{{$payment->id}}').style.display = 'none';" aria-label="Close">
							                                            <span aria-hidden="true">x</span>
							                                        </a>
							                                    </div>
				                                            	<div class="row"  id="staff_sub">
				                                            		<div class="col-md-6">
					                                        			<strong style="font-size: 15px;">Amount to be paid: </strong>			
					                                        			@if(!empty($payment->to_pay))
							                                        		<i>{{$payment->to_pay}}</i>
							                                        	@else
							                                        		<i style="color: red;">0</i>
							                                        	@endif
					                                        		</div>
							                                        <div class="col-md-6">
					                                        			<strong style="font-size: 15px;">Amount paid: </strong>
					                                        			@if($payment->payed >= $payment->to_pay && $payment->payed != 0)
							                                        		<i style="color: green;">{{$payment->payed}}</i>
							                                        	@elseif($payment->payed < $payment->to_pay && $payment->payed != 0)
							                                        		<i style="color: orange;">{{$payment->payed}}</i>
							                                        	@else
							                                        		<i style="color: red;">0</i>
							                                        	@endif
					                                        		</div>
					                                        	</div><br>
					                                        	<div class="accrodion-regular">
									                                <div id="staff_accordion{{$payment->id}}">
									                                    <div class="card bg-success">
									                                        <div class="card-header" id="staff_headingTen{{$payment->id}}">
									                                            <h5 class="mb-0">
									                                               <button class="btn btn-link text-white collapsed" data-toggle="collapse" data-target="#staff_collapseTen{{$payment->id}}" aria-expanded="false" aria-controls="staff_collapseTen{{$payment->id}}" style="background-color: green; color: white;">
									                                                 <span class="fas fa-angle-down mr-3"></span>Edit staff Payment
									                                               </button>
									                                              </h5>
									                                        </div>
									                                        <div id="staff_collapseTen{{$payment->id}}" class="collapse" aria-labelledby="staff_headingTen{{$payment->id}}" data-parent="#staff_accordion{{$payment->id}}" style="">
									                                            <div class="card-body">
									                                            	<form id="staff_pays{{$payment->id}}">
									                                            		{{ csrf_field() }}
                                            											{{ method_field('PUT') }}
                                            											<input type="hidden" class="form-control" name="staff_id{{$payment->id}}" value="{{$payment->id}}"  id="staff_id{{$payment->id}}">
									                                            		<div class="row">
											                                            	<div class="col-md-4">
											                                        			<strong style="font-size: 15px; color: white;">Amount to be Paid: </strong>
											                                        		</div>
											                                        		<div class="col-md-8">
											                                        			<input type="number" id="amount_to_pay{{$payment->id}}" style="background-color: transparent;" class="form-control" name="amount_to_pay{{$payment->id}}">
											                                        		</div>
											                                        	</div>
											                                        	<div class="row">
											                                            	<div class="col-md-4">
											                                        			<strong style="font-size: 15px; color: white;">Amount Paid: </strong>
											                                        		</div>
											                                        		<div class="col-md-8">
											                                        			<input type="number" id="amount_payed{{$payment->id}}" style="background-color: transparent;" class="form-control" name="amount_payed{{$payment->id}}">
											                                        		</div>
											                                        	</div>
										                                        		<br>
										                                                <button class="btn btn-primary pull-right" style="margin-bottom: 15px;">Submit</button>
										                                            </form>
									                                            </div>
									                                        </div>
									                                    </div>
									                                </div>
									                            </div>   
				                                            </div>
				                                            <div class="modal-footer">
				                                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
			                                @endforeach
		                                </tbody>
		                            @else
		                            	<div style="text-align: center; font-size: 20px;">
	                                        <i>
	                                            <div>No Salary Has Been Payed For This Term!</div>
	                                        </i>
	                                    </div>
		                            @endif
	                            </table>
	                        </div>
	                    </div>
	                </div>