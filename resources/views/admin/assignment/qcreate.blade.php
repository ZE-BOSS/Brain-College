		@extends('layouts.admin')

			@section('content')
				<section role="main" class="content-body">
					<!-- start: page -->
					<div class="col-md-12" id="back" style="display: none;">
						<a href="#" onclick="mainBack()" class="btn btn-danger">
							< Back
						</a><br><br>
					</div>
					<div class="row" id="declare">
						<div class="col-lg-12">
							<section class="panel form-wizard" id="w1">
								<header class="panel-heading">
									<h2 class="panel-title">Create New Assignment</h2>
								</header>
								<div class="panel-body panel-body-nopadding" style="padding: 25px;">
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
														<input type="text" class="form-control input-sm" name="name" id="w1-name" required="">
														<label for="w1-name" class="error">This field is required.</label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" id="dec_class">
														<div class="form-group has-error">
															<label class="col-sm-12" for="w1-class">Class</label>
															<div class="col-sm-12">
																<select id="w1-class" class="form-control" onchange="getSubject()" required="" style="height: 40px">
																	<option disabled selected>Select a Class...</option>
																	@forelse($classes as $class)
																		<option value="{{$class->id}}">{{$class->name}}</option>
																	@empty
																		
																	@endforelse
																</select>
																<label for="w1-class" class="error">This field is required.</label>
															</div>
														</div>
													</div>
													<div class="col-md-6" id="dec_subject" style="display: none;">
														<div class="form-group has-error">
															<label class="col-sm-12" for="w1-subject">Subject</label>
															<div class="col-sm-12" id="new_select">
																
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
																<input type="number" class="form-control input-sm" name="noqa" id="w1-noqa" required="">
															</div>
															<div class="col-sm-4">
																<input type="number" class="form-control input-sm" name="noq" id="w1-noq" required="">
															</div>
															<div class="col-sm-4">
																<input type="number" class="form-control input-sm" name="mpq" id="w1-mpq" required=""><br>
															</div>
															<label class="col-sm-12" for="w1-tm">Assignment Total Mark?</label>
															<div class="col-sm-4">
																<input type="number" class="form-control input-sm" name="tm" id="w1-tm" required="">
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
																<input type="date" class="form-control input-sm" value="<?php echo date('Y-m-d'); ?>" name="start_date" id="w1-start_date" required="">
															</div>
															<div class="col-sm-4">
																<input type="time" class="form-control input-sm" value="<?php echo date('H:i', strtotime('+1 hour')); ?>" name="start_time" id="w1-start_time" required="">
															</div>
															<div class="col-sm-4">
																<input type="date" class="form-control input-sm" name="end_date" id="w1-end_date" required=""><br>
															</div>
															<label class="col-sm-12" for="w1-end_time">Assignment Submittion Time</label>
															<div class="col-sm-4">
																<input type="time" class="form-control input-sm" name="end_time" id="w1-end_time" required="">
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
						
					</div>
					<!-- end: page -->
				</section>
			@endsection