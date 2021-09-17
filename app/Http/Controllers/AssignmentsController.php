<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\subject;
use App\Model\clas;
use App\Model\assignment;
use App\Model\ass_dec;
use App\Model\ass_score;
use App\Model\demo;
use App\Model\session;
use App\Model\term;
use Response;
use Auth;

class AssignmentsController extends Controller
{
	public function index(){
		$demos = demo::all()->where('id', 1);
		$ad = ass_dec::where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();
		$subjects = subject::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$assignments = assignment::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$ass_decs = ass_dec::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		if(count($ass_decs) > 0){
			foreach($ass_decs as $ass_dec){
				if(date('Y-m-d') >= $ass_dec->end_date && date('H:i', strtotime('+1 hour')) >= $ass_dec->end_time){
					$ass_dec->ass_status = 'Closed';
					$ass_dec->save();
				}else{
					$ass_dec->ass_status = '';
					$ass_dec->save();
				}
			}
		}
		$ass_scores = ass_score::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$id = '';

		if(Auth::guard('admin')->check()){
            return view('admin.assignment.assignment')
	    		->with('demos', $demos)
	    		->with('subjects', $subjects)
	            ->with('classes', $classes)
	            ->with('assignments', $assignments)
	            ->with('ass_decs', $ass_decs)
	            ->with('ad', $ad)
	            ->with('ass_scores', $ass_scores)
	    		->with('id', $id);
        }else{
            return redirect()->route('login');
        }
	}
	public function edit($id){
		$demos = demo::all()->where('id', 1);
		$ad = ass_dec::find($id);
		$subjects = subject::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$assignments = assignment::all()->where('testid', $id)->sortBy('created_at', 0, 'desc');
		$ass_decs = ass_dec::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$ass_scores = ass_score::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');

		if(Auth::guard('admin')->check()){
            return view('admin.assignment.edit')
	    		->with('demos', $demos)
	    		->with('subjects', $subjects)
	            ->with('classes', $classes)
	            ->with('assignments', $assignments)
	            ->with('ass_decs', $ass_decs)
	            ->with('ad', $ad)
	            ->with('ass_scores', $ass_scores)
	    		->with('id', $id);
        }else{
            return redirect()->route('login');
        }
	}
	public function show($id){
		$demos = demo::all()->where('id', 1);
		$ad = ass_dec::find($id);
		$subjects = subject::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$assignments = assignment::all()->where('testid', $id)->sortBy('created_at', 0, 'desc');
		$ass_decs = ass_dec::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$ass_scores = ass_score::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$session = session::all()->where('status', 'Active');
        $term = term::all()->where('status', 'Active');

		if(Auth::guard('admin')->check()){
            return view('admin.assignment.view')
	    		->with('demos', $demos)
	    		->with('subjects', $subjects)
	            ->with('classes', $classes)
	            ->with('assignments', $assignments)
	            ->with('ass_decs', $ass_decs)
	            ->with('session', $session)
	            ->with('term', $term)
	            ->with('ad', $ad)
	            ->with('ass_scores', $ass_scores)
	    		->with('id', $id);
        }else{
            return redirect()->route('login');
        }
	}
	public function sindex(){
			
	}
	public function getCreate(){
		$demos = demo::all()->where('id', 1);
		$subjects = subject::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$assignments = assignment::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$ass_decs = ass_dec::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$ass_scores = ass_score::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$id = '';

		if(Auth::guard('admin')->check()){
            return view('admin.assignment.qcreate')
	    		->with('demos', $demos)
	    		->with('subjects', $subjects)
	            ->with('classes', $classes)
	            ->with('assignments', $assignments)
	            ->with('ass_decs', $ass_decs)
	            ->with('ass_scores', $ass_scores)
	    		->with('id', $id);
        }else{
            return redirect()->route('login');
        }
	}
	public function getSub(Request $request){
		if(Auth::guard('admin')->check()){
            $class_val = $request->input('number');
			$demos = demo::all()->where('id', 1);
			if(count($demos) > 0){
				$demo = demo::where('id', 1)->update(['newid' => $class_val]);
			}else{
				$demo = new demo;
				$demo->newid = $class_val;
				$demo->save();
			}

			return Response::json($class_val);
        }else{
            return redirect()->route('login');
        }
	}
	public function getView(){
		$subjects = subject::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		$demos = demo::all()->where('id', 1);

		if(Auth::guard('admin')->check()){
            echo'<select id="w1-subject" class="form-control" required="" style="height: 40px">
					<option disabled selected>Select a Subject...</option>';
					if(count($subjects) > 0 && count($demos) > 0){
						foreach($subjects as $subject){
							foreach($demos as $demo){
								if($subject->classid == $demo->newid){
									echo'<option value="'.$subject->id.'">'.$subject->name.'</option>';
								}else{
									
								}
							}
						}
					}
			echo'</select>
				<label for="w1-subject" class="error">This field is required.</label>';
        }else{
            return redirect()->route('login');
        }

		//return Response::json([$subjects, $demos]);
	}
	public function getAssignment(){

		$ass_dec = ass_dec::where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();

		if(Auth::guard('admin')->check()){
            echo'<div class="col-md-12">
					<section class="panel form-wizard" id="w3">
						<header class="panel-heading">
							<h2 class="panel-title">Edit Assignment Questions</h2>
						</header>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="wizard-progress">
										<ul class="wizard-steps" id="decin">';
											if(count($ass_dec) > 0){
												foreach ($ass_dec as $ad) {
													$assignments = assignment::all()->where('testid', $ad->id)->sortBy('created_at', 0, 'desc');
													if(count($assignments) > 0){
														$i = 1;
														$j = count($assignments);
														while ($i <= $j) { 
															foreach($assignments as $assignment){
																if($ad->id == $assignment->testid){
																	if($assignment->qno == $i){
																		if($i == 1){
																			echo'<li class="active ">
																					<a href="#w3-'.$i.'" onclick="getPage'.$i.'()" data-toggle="tab" aria-expanded="false"><span>'.$i.'</span></a>
																				</li>';
																		}else{
																			echo'<li class="">
																					<a href="#w3-'.$i.'" onclick="getPage'.$i.'()" data-toggle="tab" aria-expanded="false"><span>'.$i.'</span></a>
																				</li>';
																		}
																		$i++;
																	}
																}
															}
														}
													}
												}
											}
			echo'						</ul>
									</div>
								</div>
								<div class="col-md-8" style="border-left: 1px solid;">
									<form class="form-horizontal" novalidate="novalidate">
										<div class="tab-content">
											<input type="hidden" name="adid" id="adid" value="'.$ad->id.'">';
											if(count($ass_dec) > 0){
												foreach ($ass_dec as $ad) {
													$assignments = assignment::all()->where('testid', $ad->id)->sortBy('created_at', 0, 'desc');
													if(count($assignments) > 0){
														$i = 1;
														$j = count($assignments);
														while ($i <= $j) { 
															foreach($assignments as $assignment){
																if($ad->id == $assignment->testid){
																	if($assignment->qno == $i){
																		echo'<input type="hidden" name="id_'.$i.'" id="id_'.$i.'" value="'.$assignment->id.'">
																			<input type="hidden" name="i_'.$i.'" id="i_'.$i.'" value="'.$i.'">';
																		$i++;
																	}
																}
															}
														}
													}
												}
											}
											if(count($ass_dec) > 0){
												foreach ($ass_dec as $ad) {
													$assignments = assignment::all()->where('testid', $ad->id)->sortBy('created_at', 0, 'desc');
													if(count($assignments) > 0){
														$i = 1;
														$j = count($assignments);
														while ($i <= $j) { 
															foreach($assignments as $assignment){
																if($ad->id == $assignment->testid){
																	if($assignment->qno == $i){
																		if($i == 1){
																			echo'<div id="w3-'.$i.'" class="tab-pane active">
																					<div class="form-group col-sm-12" id="qt'.$i.'">
																						<div class="row">
																							<label class="col-sm-12" for="w3-type'.$i.'">Question Type</label>
																							<div class="col-sm-12">
																								<select class="form-control input-sm valid" name="type'.$i.'" id="w3-type'.$i.'" onchange="getType'.$i.'()">
																									<option value="" disabled="disabled" selected="">....Select....</option>
																									<option value="objective">Objective</option>
																									<option value="theory">Theory</option>
																									<option value="gap">Fill in the gap</option>
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="q'.$i.'" style="display: none;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question'.$i.'">Question</label>
																							<div class="col-sm-12">
																								<input type="text" class="form-control input-sm valid" name="question'.$i.'" id="w3-question'.$i.'">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt'.$i.'" style="display: none;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a'.$i.'">A</label>
																							<div class="col-sm-11">
																								<input type="text" class="form-control input-sm valid" name="a'.$i.'" id="w3-a'.$i.'">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b'.$i.'">B</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="b'.$i.'" id="w3-b'.$i.'">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c'.$i.'">C</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="c'.$i.'" id="w3-c'.$i.'">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d'.$i.'">D</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="d'.$i.'" id="w3-d'.$i.'">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca'.$i.'" style="display: none;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer'.$i.'">Correct Answer</label>
																							<div class="col-sm-9">
																								<input type="text" class="form-control input-sm valid" name="correct_answer'.$i.'" id="w3-correct_answer'.$i.'">
																							</div>
																						</div>
																					</div>
																				</div>';
																		}else{
																			echo'<div id="w3-'.$i.'" class="tab-pane">
																					<div class="form-group col-sm-12" id="qt'.$i.'">
																						<div class="row">
																							<label class="col-sm-12" for="w3-type'.$i.'">Question Type</label>
																							<div class="col-sm-12">
																								<select class="form-control input-sm valid" name="type'.$i.'" id="w3-type'.$i.'" onchange="getType'.$i.'()">
																									<option value="" disabled="disabled" selected="">....Select....</option>
																									<option value="objective">Objective</option>
																									<option value="theory">Theory</option>
																									<option value="gap">Fill in the gap</option>
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="q'.$i.'" style="display: none;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question'.$i.'">Question</label>
																							<div class="col-sm-12">
																								<input type="text" class="form-control input-sm valid" name="question'.$i.'" id="w3-question'.$i.'">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt'.$i.'" style="display: none;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a'.$i.'">A</label>
																							<div class="col-sm-11">
																								<input type="text" class="form-control input-sm valid" name="a'.$i.'" id="w3-a'.$i.'">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b'.$i.'">B</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="b'.$i.'" id="w3-b'.$i.'">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c'.$i.'">C</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="c'.$i.'" id="w3-c'.$i.'">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d'.$i.'">D</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="d'.$i.'" id="w3-d'.$i.'">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca'.$i.'" style="display: none;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer'.$i.'">Correct Answer</label>
																							<div class="col-sm-9">
																								<input type="text" class="form-control input-sm valid" name="correct_answer'.$i.'" id="w3-correct_answer'.$i.'">
																							</div>
																						</div>
																					</div>
																				</div>';
																		}
																		$i++;
																	}
																}
															}
														}
													}
												}
											}
			echo'						</div>
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
									<a onclick="getFinish'.$i.'()">Finish</a>
								</li>
								<li class="next">
									<a onclick="'; 
										if(count($ass_dec) > 0){
											foreach ($ass_dec as $ad) {
												$assignments = assignment::all()->where('testid', $ad->id)->sortBy('created_at', 0, 'desc');
												if(count($assignments) > 0){
													$i = 1;
													$j = count($assignments);
													while ($i <= $j) { 
														foreach($assignments as $assignment){
															if($ad->id == $assignment->testid){
																if($assignment->qno == $i){
																	echo "getPage".$i."() ";
																	$i++;
																}
															}
														}
													}
												}
											}
										}
									echo'">Next <i class="fa fa-angle-right"></i></a>
								</li>
							</ul>
						</div>
					</section>
				</div>';
        }else{
            return redirect()->route('login');
        }
	}
	public function getQuestion(){

		$ass_dec = ass_dec::where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();

		if(Auth::guard('admin')->check()){
			if(count($ass_dec) > 0){
				foreach ($ass_dec as $ad) {
					$assignments = assignment::all()->where('testid', $ad->id)->sortBy('created_at', 0, 'desc');
					if(count($assignments) > 0){
						$i = 1;
						$j = count($assignments);
						while ($i <= $j) { 
							foreach($assignments as $assignment){
								if($ad->id == $assignment->testid){
									if($assignment->qno == $i){
										echo"
											<script type='text/javascript'>
												function getType".$i."(){
													var qt".$i." = document.getElementById('qt".$i."');
													var q".$i." = document.getElementById('q".$i."');
													var opt".$i." = document.getElementById('opt".$i."');
													var ca".$i." = document.getElementById('ca".$i."');
													var type".$i." = document.getElementById('w3-type".$i."');

													for (let option of Array.from(type".$i.".options)) { 
														if (option.selected) { 
															if(option.value == 'objective'){
																q".$i.".style.display = 'inline';
																opt".$i.".style.display = 'inline';
																ca".$i.".style.display = 'inline';
															}else if(option.value == 'theory'){
																q".$i.".style.display = 'inline';
																opt".$i.".style.display = 'none';
																ca".$i.".style.display = 'none';
															}else if(option.value == 'gap'){
																q".$i.".style.display = 'inline';
																opt".$i.".style.display = 'none';
																ca".$i.".style.display = 'inline';
															}else{

															}  
														} 
													} 
												}
											  	function getPage".$i."(){
													var adid = $('#adid').val();
													var id_".$i." = $('#id_".$i."').val();
													var i_".$i." = $('#i_".$i."').val();
													var type".$i." = $('#w3-type".$i."').val();
													var question".$i." = $('#w3-question".$i."').val();
													var a".$i." = $('#w3-a".$i."').val();
													var b".$i." = $('#w3-b".$i."').val();
													var c".$i." = $('#w3-c".$i."').val();
													var d".$i." = $('#w3-d".$i."').val();
													var correct_answer".$i." = $('#w3-correct_answer".$i."').val();
													var token = $('#token').val();

													$.ajax({
														type:'POST',
														//dataType:'json',
														headers: {'X-CSRF-TOKEN' : token},
														url: '/main_controller_panel/assignment/qpage/".$assignment->id."',
														success:'success',
														data: {
															adid:adid,
															id:id_".$i.",
															no:i_".$i.",
															type:type".$i.",
															question:question".$i.",
															a:a".$i.",
															b:b".$i.",
															c:c".$i.",
															d:d".$i.",
															ca:correct_answer".$i.",
														},
														//cache: false,
														success: function(html){
															// new PNotify({
															// 	title: 'Success',
															// 	text: 'Done',
															// 	type: 'custom',
															// 	addclass: 'notification-success',
															// 	icon: 'fa fa-check'
															// });
														},
														error: function(html){
															new PNotify({
																title: 'Error',
																text: 'Error Occurred',
																type: 'custom',
																addclass: 'notification-danger',
																icon: 'fa fa-check'
															});
														}
													});
												}
											</script>";
										$i++;
									}
								}
							}
						}
					}
				}
			}
			echo" <script type='text/javascript'>
					function getFinish".$i."(){
						var token = $('#token').val();
						var validated = $('#w3 form').valid();
						if(validated){
							$.ajax({
								type:'POST',
								//dataType:'json',
								headers: {'X-CSRF-TOKEN' : token},
								url: '/main_controller_panel/assignment/qfinish/".$ad->id."',
								success:'success',
								data: {},
								//cache: false,
								success: function(html){
									new PNotify({
										title: 'Success',
										text: 'All Questions Have Been Successfully Submitted',
										type: 'custom',
										addclass: 'notification-success',
										icon: 'fa fa-check'
									});";
									if(count($ass_dec) > 0){
										foreach ($ass_dec as $ad) {
											$assignments = assignment::all()->where('testid', $ad->id);
											if(count($assignments) > 0){
												$i = 1;
												$j = count($assignments);
												while ($i <= $j) { 
													foreach($assignments as $assignment){
														if($ad->id == $assignment->testid){
															if($assignment->qno == $i){
																echo"
																	getPage".$i."();";
																$i++;
															}
														}
													}
												}
											}
										}
									}
						echo"
								},
								error: function(html){
									new PNotify({
										title: 'Error',
										text: 'Error Occurred',
										type: 'custom',
										addclass: 'notification-danger',
										icon: 'fa fa-check'
									});
								}
							});
						}else{
							new PNotify({
								title: 'Error',
								text: 'Fill All Questions',
								type: 'custom',
								addclass: 'notification-danger',
								icon: 'fa fa-check'
							});
						}
					}
				</script>";
        }else{
            return redirect()->route('login');
        }
	}
	public function setAssignment(Request $request){
		if(Auth::guard('admin')->check()){
			$demos = demo::all()->where('id', 1);
			$session = session::all()->where('status', 'Active')->where('category', 'Open');
	        $term = term::all()->where('status', 'Active')->where('category', 'Open');
	        $ass_decs = ass_dec::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');

			$ass_dec = new ass_dec;
			$ass_dec->name = $request->input('name');
			$ass_dec->classid = $request->input('clas');
			$ass_dec->subjectid = $request->input('subject');
			$ass_dec->noofqa = $request->input('noqa');
			$demos = demo::all()->where('id', 1);
			if(count($demos) > 0){
				$demo = demo::where('id', 1)->update(['newno' => $ass_dec->noofqa]);
			}else{
				$demo = new demo;
				$demo->newno = $ass_dec->noofqa;
				$demo->save();
			}
			$ass_dec->noofq = $request->input('noq');
			$ass_dec->mpq = $request->input('mpq');
			$ass_dec->tm = $request->input('tm');
			$ass_dec->start_date = $request->input('start_date');
			$ass_dec->end_date = $request->input('end_date');
			$ass_dec->start_time = $request->input('start_time');
			$ass_dec->end_time = $request->input('end_time');
			$ass_dec->time = date('h:i:s');
			$ass_dec->d = date('d');
			$ass_dec->m = date('M');
			$ass_dec->y = date('Y');
			$ass_dec->status = 'Active';
			if(count($session) > 0){
	            foreach($session as $sec){
	                if(count($term) > 0){
	                    foreach($term as $ter){
	                        $ass_dec->session = $sec->id;
	                        $ass_dec->term = $ter->id;
	                    }
	                }else{
	                    return back()->with('error', 'term is to be added first!');
	                }
	            }
	        }else{
	            return back()->with('error', 'Session and term are to be added first!');
	        }
			$ass_dec->save();

			$ads = ass_dec::where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();
			if(count($ads) > 0){
				foreach ($ads as $ad) {
					$i = 1;
					$j = $ad->noofqa;
					while($i <= $j){
						$assignment = new assignment;
						$assignment->testid = $ad->id;
						$assignment->qno = $i;
						$assignment->classid = $ad->classid;
						$assignment->time = date('h:i:s');
						$assignment->d = date('d');
						$assignment->m = date('M');
						$assignment->y = date('Y');
						$assignment->status = 'Active';
						$assignment->save();
						$i++;
					}
				}
			}
        }else{
            return redirect()->route('login');
        }
	}
	public function setQuestion(Request $request, $id){
		if(Auth::guard('admin')->check()){
	        $ass_dec = ass_dec::find($id);
			$ass_dec->name = $request->input('name');
			$ass_dec->classid = $request->input('clas');
			$ass_dec->subjectid = $request->input('subject');
			$ass_dec->noofqa = $request->input('noqa');
			$demos = demo::all()->where('id', 1);
			if(count($demos) > 0){
				$demo = demo::where('id', 1)->update(['newno' => $ass_dec->noofqa]);
			}else{
				$demo = new demo;
				$demo->newno = $ass_dec->noofqa;
				$demo->save();
			}
			$ass_dec->noofq = $request->input('noq');
			$ass_dec->mpq = $request->input('mpq');
			$ass_dec->tm = $request->input('tm');
			$ass_dec->start_date = $request->input('start_date');
			$ass_dec->end_date = $request->input('end_date');
			$ass_dec->start_time = $request->input('start_time');
			$ass_dec->end_time = $request->input('end_time');
			$ass_dec->time = date('h:i:s');
			$ass_dec->d = date('d');
			$ass_dec->m = date('M');
			$ass_dec->y = date('Y');
			$ass_dec->status = 'Active';
			$ass_dec->save();
        }else{
            return redirect()->route('login');
        }
	}
	public function Qpage(Request $request, $id){
		if(Auth::guard('admin')->check()){
	        $assignment = assignment::find($id);
	        if($assignment->qno == $request->input('no')){
	        	if($request->input('type') == 'objective'){
					$assignment->qtype = $request->input('type');
					$assignment->question = $request->input('question');
					$assignment->opt_a = $request->input('a');
					$assignment->opt_b = $request->input('b');
					$assignment->opt_c = $request->input('c');
					$assignment->opt_d = $request->input('d');
					$assignment->correct_answer = $request->input('ca');
					$assignment->status = 'Active';
					$assignment->save();
				}elseif($request->input('type') == 'theory'){
					$assignment->qtype = $request->input('type');
					$assignment->question = $request->input('question');
					$assignment->status = 'Active';
					$assignment->save();
				}elseif($request->input('type') == 'gap'){
					$assignment->qtype = $request->input('type');
					$assignment->question = $request->input('question');
					$assignment->correct_answer = $request->input('ca');
					$assignment->status = 'Active';
					$assignment->save();
				}else{

				}
			}
        }else{
            return redirect()->route('login');
        }
	}
	public function Qfinish(Request $request, $id){
		if(Auth::guard('admin')->check()){
	        $ad = ass_dec::find($id);
	        $assignments = assignment::all()->where('testid', $id)->sortBy('created_at', 0, 'desc');
	        if(count($assignments) > 0){
	        	foreach ($assignments as $assignment) {
	        		if ($assignment->question == '') {
	        			$ad->queststatus = '';
	        			$ad->save();
	        		}else{
	        			$ad->queststatus = 'completed';
	        			$ad->save();
	        		}
	        	}
	        }
        }else{
            return redirect()->route('login');
        }
	}
	public function destroy($id){
		if(Auth::guard('admin')->check()){
            $st = ass_dec::where('id', '=', $id)->update(['status' => 'Deleted']);
            return back()->with('success', 'Assignment Data Deleted successfully');
        }else{
            return redirect()->route('login');
        }
	}
}
