																				<div class="form-group col-sm-12" id="qt{{$i}}">
																					<div class="row">
																						<label class="col-sm-12" for="w3-type{{$i}}">Question Type</label>
																						<div class="col-sm-12">
																							<select class="form-control input-sm valid" name="type{{$i}}" id="w3-type{{$i}}" onchange="getType{{$i}}()">
																								@if($assignment->qtype == 'objective')
																									<option value="" disabled="disabled">....Select....</option>
																									<option value="objective" selected="">Objective</option>
																									<option value="theory">Theory</option>
																									<option value="gap">Fill in the gap</option>
																								@elseif($assignment->qtype == 'theory')
																									<option value="" disabled="disabled">....Select....</option>
																									<option value="objective">Objective</option>
																									<option value="theory" selected="">Theory</option>
																									<option value="gap">Fill in the gap</option>
																								@elseif($assignment->qtype == 'gap')
																									<option value="" disabled="disabled">....Select....</option>
																									<option value="objective">Objective</option>
																									<option value="theory">Theory</option>
																									<option value="gap" selected="">Fill in the gap</option>
																								@else
																									<option value="" disabled="disabled" selected="">....Select....</option>
																									<option value="objective">Objective</option>
																									<option value="theory">Theory</option>
																									<option value="gap">Fill in the gap</option>
																								@endif
																							</select>
																						</div>
																					</div>
																				</div>
																				@if($assignment->qtype == 'objective')
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<input type="text" class="form-control input-sm valid" name="question{{$i}}" value="{{$assignment->question}}" id="w3-question{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a{{$i}}">A</label>
																							<div class="col-sm-11">
																								<input type="text" class="form-control input-sm valid" name="a{{$i}}" value="{{$assignment->opt_a}}" id="w3-a{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b{{$i}}">B</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="b{{$i}}" value="{{$assignment->opt_b}}" id="w3-b{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c{{$i}}">C</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="c{{$i}}" value="{{$assignment->opt_c}}" id="w3-c{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d{{$i}}">D</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="d{{$i}}" value="{{$assignment->opt_d}}" id="w3-d{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer{{$i}}">Correct Answer</label>
																							<div class="col-sm-9">
																								<input type="text" class="form-control input-sm valid" name="correct_answer{{$i}}" value="{{$assignment->correct_answer}}" id="w3-correct_answer{{$i}}">
																							</div>
																						</div>
																					</div>
																				@elseif($assignment->qtype == 'theory')
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<input type="text" class="form-control input-sm valid" name="question{{$i}}" value="{{$assignment->question}}" id="w3-question{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt{{$i}}" style="display: none;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a{{$i}}">A</label>
																							<div class="col-sm-11">
																								<input type="text" class="form-control input-sm valid" name="a{{$i}}" value="{{$assignment->opt_a}}" id="w3-a{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b{{$i}}">B</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="b{{$i}}" value="{{$assignment->opt_b}}" id="w3-b{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c{{$i}}">C</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="c{{$i}}" value="{{$assignment->opt_c}}" id="w3-c{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d{{$i}}">D</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="d{{$i}}" value="{{$assignment->opt_d}}" id="w3-d{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca{{$i}}" style="display: none;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer{{$i}}">Correct Answer</label>
																							<div class="col-sm-9">
																								<input type="text" class="form-control input-sm valid" name="correct_answer{{$i}}" value="{{$assignment->correct_answer}}" id="w3-correct_answer{{$i}}">
																							</div>
																						</div>
																					</div>
																				@elseif($assignment->qtype == 'gap')
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<input type="text" class="form-control input-sm valid" name="question{{$i}}" value="{{$assignment->question}}" id="w3-question{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt{{$i}}" style="display: none;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a{{$i}}">A</label>
																							<div class="col-sm-11">
																								<input type="text" class="form-control input-sm valid" name="a{{$i}}" value="{{$assignment->opt_a}}" id="w3-a{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b{{$i}}">B</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="b{{$i}}" value="{{$assignment->opt_b}}" id="w3-b{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c{{$i}}">C</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="c{{$i}}" value="{{$assignment->opt_c}}" id="w3-c{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d{{$i}}">D</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="d{{$i}}" value="{{$assignment->opt_d}}" id="w3-d{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca{{$i}}" style="display: inline;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer{{$i}}">Correct Answer</label>
																							<div class="col-sm-9">
																								<input type="text" class="form-control input-sm valid" name="correct_answer{{$i}}" value="{{$assignment->correct_answer}}" id="w3-correct_answer{{$i}}">
																							</div>
																						</div>
																					</div>
																				@else
																					<div class="form-group col-sm-12" id="q{{$i}}" style="display: none;">
																						<div class="row">
																							<label class="col-sm-12" for="w3-question{{$i}}">Question</label>
																							<div class="col-sm-12">
																								<input type="text" class="form-control input-sm valid" name="question{{$i}}" value="{{$assignment->question}}" id="w3-question{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="opt{{$i}}" style="display: none;">
																						<div class="row">
																							<label class="col-sm-1" for="w3-a{{$i}}">A</label>
																							<div class="col-sm-11">
																								<input type="text" class="form-control input-sm valid" name="a{{$i}}" value="{{$assignment->opt_a}}" id="w3-a{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-b{{$i}}">B</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="b{{$i}}" value="{{$assignment->opt_b}}" id="w3-b{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-c{{$i}}">C</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="c{{$i}}" value="{{$assignment->opt_c}}" id="w3-c{{$i}}">
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-md-1" for="w3-d{{$i}}">D</label>
																							<div class="col-md-11">
																								<input type="text" class="form-control input-sm valid" name="d{{$i}}" value="{{$assignment->opt_d}}" id="w3-d{{$i}}">
																							</div>
																						</div>
																					</div>
																					<div class="form-group col-sm-12" id="ca{{$i}}" style="display: none;">
																						<div class="row">
																							<label class="col-sm-3" for="w3-correct_answer{{$i}}">Correct Answer</label>
																							<div class="col-sm-9">
																								<input type="text" class="form-control input-sm valid" name="correct_answer{{$i}}" value="{{$assignment->correct_answer}}" id="w3-correct_answer{{$i}}">
																							</div>
																						</div>
																					</div>
																				@endif