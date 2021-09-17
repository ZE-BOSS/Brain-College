				<section role="main" class="content-body">
					<!-- start: page -->
					<div class="col-md-12" id="back" style="display: none;">
						<a href="#" onclick="mainBack()" class="btn btn-danger">
							< Back
						</a><br><br>
					</div>
					<div class="row" id="declare" style="display: inline;">
						<div class="col-lg-12">
							<section class="panel form-wizard" id="w1">
								<header class="panel-heading">
									<h2 class="panel-title">Edit Assignment</h2>
								</header>
								<div class="panel-body panel-body-nopadding">
									<div class="wizard-tabs">
										<ul class="wizard-steps">
											<li class="active">
												<a href="#w1-account" data-toggle="tab" class="text-center">
													<span class="badge hidden-xs">1</span>
													Information
												</a>
											</li>
											<li>
												<a href="#w1-profile" data-toggle="tab" class="text-center">
													<span class="badge hidden-xs">2</span>
													Mark
												</a>
											</li>
											<li>
												<a href="#w1-confirm" data-toggle="tab" class="text-center">
													<span class="badge hidden-xs">3</span>
													Date
												</a>
											</li>
										</ul>
									</div>
									<form class="form-horizontal" novalidate="novalidate">
										<input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
										<div class="tab-content">
											<div id="w1-account" class="tab-pane active">
												<div class="form-group has-error">
													<label class="col-sm-12" for="w1-name">Assignment Name</label>
													<div class="col-sm-12">
														<input type="text" class="form-control input-sm" value="{{$ad->name}}" name="name" id="w1-name" required="">
														<label for="w1-name" class="error">This field is required.</label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6" id="dec_class">
														<div class="form-group has-error">
															<label class="col-sm-12" for="w1-class">Class</label>
															<div class="col-sm-12">
																<select id="w1-class" class="form-control" onchange="getSubject()" required="" style="height: 40px">
																	<option disabled selected>Select a Class...</option>
																	@forelse($classes as $class)
																		@if($ad->classid == $class->id)
																			<option value="{{$class->id}}" selected="selected">{{$class->name}}</option>
																		@else
																			<option value="{{$class->id}}">{{$class->name}}</option>
																		@endif
																	@empty
																		
																	@endforelse
																</select>
																<label for="w1-class" class="error">This field is required.</label>
															</div>
														</div>
													</div>
													<div class="col-md-6" id="dec_subject">
														<div class="form-group has-error">
															<label class="col-sm-12" for="w1-subject">Subject</label>
															<div class="col-sm-12" id="new_select">
																<select id="w1-subject" class="form-control" required="" style="height: 40px">
																	<option disabled selected>Select a Subject...</option>';
																	@if(count($subjects) > 0 && count($demos) > 0)
																		@foreach($subjects as $subject)
																			@foreach($demos as $demo){
																				@if($subject->classid == $demo->newid)
																					@if($ad->subjectid == $subject->id)
																						<option value="{{$subject->id}}" selected="selected">{{$subject->name}}</option>
																					@else
																						<option value="{{$subject->id}}">{{$subject->name}}</option>
																					@endif
																				@else
																					
																				@endif
																			@endforeach
																		@endforeach
																	@endif
																</select>
																<label for="w1-subject" class="error">This field is required.</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="w1-profile" class="tab-pane">
												<div class="form-group">
													<div class="col-md-12">
														<div class="row">
															<label class="col-sm-4" for="w1-noqa">Number of questions to be added?</label>
															<label class="col-sm-4" for="w1-noq">Number of questions to be answer?</label>
															<label class="col-sm-4" for="w1-mpq">Mark Per Question?</label>
															<div class="col-sm-4">
																<input type="number" value="{{$ad->noofqa}}" class="form-control input-sm" name="noqa" id="w1-noqa" required="">
															</div>
															<div class="col-sm-4">
																<input type="number" value="{{$ad->noofq}}" class="form-control input-sm" name="noq" id="w1-noq" required="">
															</div>
															<div class="col-sm-4">
																<input type="number" value="{{$ad->mpq}}" class="form-control input-sm" name="mpq" id="w1-mpq" required=""><br>
															</div>
															<label class="col-sm-12" for="w1-tm">Assignment Total Mark?</label>
															<div class="col-sm-4">
																<input type="number" value="{{$ad->tm}}" class="form-control input-sm" name="tm" id="w1-tm" required="">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="w1-confirm" class="tab-pane">
												<div class="form-group">
													<div class="col-md-12">
														<div class="row">
															<label class="col-sm-4" for="w1-start_date">Assignment Creation Date</label>
															<label class="col-sm-4" for="w1-start_time">Assignment Creation Time</label>
															<label class="col-sm-4" for="w1-end_date">Assignment Submittion Date</label>
															<div class="col-sm-4">
																<input type="date" value="{{$ad->start_date}}" class="form-control input-sm" name="start_date" id="w1-start_date" required="">
															</div>
															<div class="col-sm-4">
																<input type="time" value="{{$ad->start_time}}" class="form-control input-sm" name="start_time" id="w1-start_time" required="">
															</div>
															<div class="col-sm-4">
																<input type="date" value="{{$ad->end_date}}" class="form-control input-sm" name="end_date" id="w1-end_date" required=""><br>
															</div>
															<label class="col-sm-12" for="w1-end_time">Assignment Submittion Time</label>
															<div class="col-sm-4">
																<input type="time" value="{{$ad->end_time}}" class="form-control input-sm" name="end_time" id="w1-end_time" required="">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="panel-footer">
									<ul class="pager">
										<li class="previous disabled">
											<a><i class="fa fa-angle-left"></i> Previous</a>
										</li>
										<li class="finish hidden pull-right">
											<a>Finish</a>
										</li>
										<li class="next">
											<a>Next <i class="fa fa-angle-right"></i></a>
										</li>
									</ul>
								</div>
							</section>
						</div>
					</div>
					<div class="row" id="assignment" style="display: none;">
						<div class="col-md-12">
							<section class="panel form-wizard" id="w3">
								<header class="panel-heading">
									<h2 class="panel-title">Edit Assignment Questions</h2>
								</header>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<div class="wizard-progress">
												<ul class="wizard-steps" id="decin">
													@if(count($assignments) > 0)
														@php $i = 1; @endphp
														@php $j = count($assignments); @endphp
														@while ($i <= $j) 
															@foreach($assignments as $assignment)
																@if($assignment->qno == $i)
																	@if($ad->id == $assignment->testid)
																		@if($i == 1)
																			<li class="active ">
																				<a href="#w3-{{$i}}" onclick="getPage{{$i}}()" data-toggle="tab" aria-expanded="false"><span>{{$i}}</span></a>
																			</li>
																		@else
																			<li class="">
																				<a href="#w3-{{$i}}" onclick="getPage{{$i}}()" data-toggle="tab" aria-expanded="false"><span>{{$i}}</span></a>
																			</li>
																		@endif
																		@php $i++; @endphp
																	@else
														
																	@endif
																@endif
															@endforeach
														@endwhile
													@endif
												</ul>
											</div>
										</div>
										<div class="col-md-8" style="border-left: 1px solid;">
											<form class="form-horizontal" novalidate="novalidate">
												<div class="tab-content">
													<input type="hidden" name="adid" id="adid" value="{{$ad->id}}">
													@if(count($assignments) > 0)
														@php $i = 1; @endphp
														@php $j = count($assignments); @endphp
														@while ($i <= $j) 
															@foreach($assignments as $assignment)
																@if($assignment->qno == $i)
																	@if($ad->id == $assignment->testid)
																		<input type="hidden" name="id_{{$i}}" id="id_{{$i}}" value="{{$assignment->id}}">
																		<input type="hidden" name="i_{{$i}}" id="i_{{$i}}" value="{{$i}}">
																		@php $i++; @endphp
																	@else
														
																	@endif
																@endif
															@endforeach
														@endwhile
													@endif

													@if(count($assignments) > 0)
														@php $i = 1; @endphp
														@php $j = count($assignments); @endphp
														@while ($i <= $j) 
															@foreach($assignments as $assignment)
																@if($assignment->qno == $i)
																	@if($ad->id == $assignment->testid)
																		@if($i == 1)
																			<div id="w3-{{$i}}" class="tab-pane active">
																				@include('inc.admin.assignment.edit.innertab')
																			</div>
																		@else
																			<div id="w3-{{$i}}" class="tab-pane">
																				@include('inc.admin.assignment.edit.innertab')
																			</div>
																		@endif
																		@php $i++; @endphp
																	@else
														
																	@endif
																@endif
															@endforeach
														@endwhile
													@endif
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<ul class="pager">
										<li class="previous disabled">
											<a><i class="fa fa-angle-left"></i> Previous</a>
										</li>
										<li class="finish hidden pull-right">
											<a onclick="getFinish{{$i}}()">Finish</a>
										</li>
										<li class="next">
											<a onclick="
												@if(count($assignments) > 0)
													@php $i = 1; @endphp
													@php $j = count($assignments); @endphp
													@while ($i <= $j) 
														@foreach($assignments as $assignment)
															@if($assignment->qno == $i)
																@if($ad->id == $assignment->testid)
																	getPage{{$i}}()
																	@php $i++; @endphp
																@endif
															@endif
														@endforeach
													@endwhile
												@endif
											">Next <i class="fa fa-angle-right"></i></a>
										</li>
									</ul>
								</div>
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>