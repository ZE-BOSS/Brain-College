																				<div class="form-group col-sm-12" id="qt{{$i}}">
																					<div class="row">
																						<label class="col-sm-12" for="w3-type{{$i}}">Question Type</label>
																						<div class="col-sm-12">
																							<p>
																								@if($assignment->qtype == 'objective')</i>
																									<i>Objective</i>
																								@elseif($assignment->qtype == 'theory')
																									<i>Theory</i>
																								@elseif($assignment->qtype == 'gap')
																									<i>Fill in the gap</i>
																								@else
																									<i style="color: red;">None</i>
																								@endif
																							</p>
																						</div>
																					</div>
																				</div>
																				@if($assignment->qtype == 'objective')
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<i>{{$assignment->question}}</i>
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a{{$i}}">A</label>
																							<div class="col-sm-11">
																								<i>{{$assignment->opt_a}}</i>
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b{{$i}}">B</label>
																							<div class="col-md-11">
																								<i>{{$assignment->opt_b}}</i>
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c{{$i}}">C</label>
																							<div class="col-md-11">
																								<i>{{$assignment->opt_c}}</i>
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d{{$i}}">D</label>
																							<div class="col-md-11">
																								<i>{{$assignment->opt_d}}</i>
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer{{$i}}">Correct Answer</label>
																							<div class="col-sm-9">
																								<i>{{$assignment->correct_answer}}</i>
																							</div>
																						</div>
																					</div>
																				@elseif($assignment->qtype == 'theory')
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<i>{{$assignment->question}}</i>
																							</div>
																						</div>
																					</div>
																				@elseif($assignment->qtype == 'gap')
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<i>{{$assignment->question}}</i>
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer{{$i}}">Correct Answer</label>
																							<div class="col-sm-9">
																								<i>{{$assignment->correct_answer}}</i>
																							</div>
																						</div>
																					</div>
																				@else
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<i style="color: red;">None</i>
																							</div>
																						</div>
																					</div>
																				@endif