<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\student;
use App\Model\clas;
use App\Model\account;
use App\Model\message;
use App\Model\result;
use App\Model\subject;
use App\Model\r_table;
use App\Model\r_sub;
use App\Model\session;
use App\Model\term;
use App\Model\branch;
use App\Model\setting;
use App\Model\site;
use Auth; 

class ResultsController extends Controller
{
    public function index()
    {
        //return view('admin/result/result');
        if(Auth::guard('admin')->check()){
            
        }else{
            return redirect()->route('login');
        }
    }
    public function getCreate($id)
    {
    	$result = result::find($id);
        $session = session::all()->where('status', 'Active');
        $term = term::all()->where('status', 'Active');
        $subjects = subject::all()->where('classid', $result->classid)->where('status', 'Active');
        $r_tables = r_table::all()->where('rand', $result->tablerand);
        if(count($r_tables) > 0){
			foreach ($r_tables as $r_table) {
				//echo $r_table;
				$r_subs = r_sub::all()->where('sub', $r_table->sub_no);
			}
		}else{
			$r_subs = r_sub::all();
		}
        $students = student::all()->where('id', $result->studentid)->where('status', 'Active');
        $branches = branch::all()->where('status', 'Active');
    	$classes = clas::all()->where('status', 'Active');
    	$sites = site::all()->where('status', 'Active')->where('id', 1);
    	if(count($classes) > 0){
			foreach ($classes as $class) {
				if(count($term) > 0){
					foreach ($term as $ter) {
						if($ter->category == 'Open'){
							$rescount = result::all()->where('classid', $class->id)->where('term', $ter->id)->where('status', 'Active');
						}
					}
				}
			}
		}else{
			$rescount = result::all()->where('status', 'Active');
		}
    	$settings = setting::all()->where('id', 1);
		//echo count($r_subs);
	    $id = $result->id;

	    if(Auth::guard('admin')->check()){
            return view('admin/result/create')
	        	->with('classes', $classes)
	        	->with('subjects', $subjects)
	        	->with('students', $students)
	        	->with('result', $result)
	        	->with('sites', $sites)
	        	->with('branches', $branches)
	        	->with('settings', $settings)
	        	->with('rescount', $rescount)
	        	->with('r_tables', $r_tables)
	        	->with('r_subs', $r_subs)
	        	->with('session', $session)
	            ->with('term', $term)
	        	->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    	
    }
    public function store(Request $request)
    {
    	if(Auth::guard('admin')->check()){   
	    	$id = $request->input('id');
	    	$result = result::find($id);
	    	$classes = clas::all()->where('status', 'Active');
		    $subjects = subject::all()->where('classid', $result->classid)->where('status', 'Active');
	    	$student = student::find($result->studentid);

			$result->tablerand = $id;
			//r_table
			$table = new r_table;
	    	$table->rand = $id;
			$table->sub_no = $id;
			$table->classid = $result->classid;

			$table->school_open = $request->input('school1');
			$table->sport_open = $request->input('sport1');
			$table->other_open = $request->input('ooa1');

			$table->school_present = $request->input('school2');
			$table->sport_present = $request->input('sport2');
			$table->other_present = $request->input('ooa2');

			$table->school_punctual = $request->input('school3');
			$table->sport_punctual = $request->input('sport3');
			$table->other_punctual = $request->input('ooa3');

			$table->school_absent = $request->input('school4');
			$table->sport_absent = $request->input('sport4');
			$table->other_absent = $request->input('ooa4');

			$table->loyalty = $request->input('loyalty');
			$table->honesty = $request->input('honesty');
			$table->cleaniness = $request->input('cleanliness');
			$table->punctuality = $request->input('punctuality');
			$table->regularity = $request->input('regularity');
			$table->conduct_comment = $request->input('conduct_comment');

			$table->b_height = $request->input('height1');
			$table->e_height = $request->input('height2');
			$table->b_weight = $request->input('weight1');
			$table->e_weight = $request->input('weight2');
			$table->illness_no = $request->input('illness1');
			$table->illness_nature = $request->input('illness2');

			$table->t_gross_score = $request->input('gs');
			$table->t_average = $request->input('ta');
			$table->c_score = $request->input('cums');
			$table->c_average = $request->input('cuma');
			$table->position = $request->input('position');

			$table->indoor_game = $request->input('ig');
			$table->ball_game = $request->input('bg');
			$table->combative_game = $request->input('cg');
			$table->track = $request->input('track');
			$table->jumps = $request->input('jumps');
			$table->throw = $request->input('throw');
			$table->swimming = $request->input('swimming');
			$table->weight_lifting = $request->input('weight');
			$table->sport_comment = $request->input('sport_comment');

			$table->organisation = $request->input('organisation');
			$table->office = $request->input('office');
			$table->contribution = $request->input('contribution');

			$table->teacher_comment = $request->input('teacher_comment');
			$table->principal_comment = $request->input('principal_comment');

			if (!empty($request->file('background'))) { 

	        	$image_ext = $request->file('background')->getCLientOriginalExtension();

	            $table->shool_signature =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('background')->move(
	            	storage_path().'/app/public/image/result/', $table->shool_signature 
	        	);
	        }

			$table->save();

			if(count($subjects) > 0){
				foreach ($subjects as $subject) {
					if($subject->classid == $result->classid){
						$sub = new r_sub;
						$sub->sub = $id;
						$sub->subjectid = $subject->id;
						$sub->s_attendance = $request->input($subject->id.'_attendance');
						$sub->s_test = $request->input($subject->id.'_test');
						$sub->s_exam = $request->input($subject->id.'_exam');
						$sub->s_total = $request->input($subject->id.'_total');
						$sub->s_forward = $request->input($subject->id.'_forward');
						$sub->s_average = $request->input($subject->id.'_wa');
	                    $sub->s_grade = $request->input($subject->id.'_grade');
	                    $sub->save();
					}
				}
			}else{
				$sub = new r_sub;
				$sub->sub = $id;
				$sub->save();
			}
			

			$result->save();

	        return back()->with('success', 'Result Has Been Saved Successfully');
        }else{
            return redirect()->route('login');
        }
    }
    public function update(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
            $result = result::find($id);
	    	$classes = clas::all()->where('status', 'Active');
		    $subjects = subject::all()->where('classid', $result->classid)->where('status', 'Active');
	    	$student = student::find($result->studentid);

			$result->tablerand = $id;

			$r_table = r_table::all()->where('rand', $result->tablerand);
			if(count($r_table) > 0){
				foreach ($r_table as $table) {
					$table->rand = $id;
					$table->sub_no = $id;
					$table->classid = $result->classid;

					$table->school_open = $request->input('school1');
					$table->sport_open = $request->input('sport1');
					$table->other_open = $request->input('ooa1');

					$table->school_present = $request->input('school2');
					$table->sport_present = $request->input('sport2');
					$table->other_present = $request->input('ooa2');

					$table->school_punctual = $request->input('school3');
					$table->sport_punctual = $request->input('sport3');
					$table->other_punctual = $request->input('ooa3');

					$table->school_absent = $request->input('school4');
					$table->sport_absent = $request->input('sport4');
					$table->other_absent = $request->input('ooa4');

					$table->loyalty = $request->input('loyalty');
					$table->honesty = $request->input('honesty');
					$table->cleaniness = $request->input('cleanliness');
					$table->punctuality = $request->input('punctuality');
					$table->regularity = $request->input('regularity');
					$table->conduct_comment = $request->input('conduct_comment');

					$table->b_height = $request->input('height1');
					$table->e_height = $request->input('height2');
					$table->b_weight = $request->input('weight1');
					$table->e_weight = $request->input('weight2');
					$table->illness_no = $request->input('illness1');
					$table->illness_nature = $request->input('illness2');

					$table->t_gross_score = $request->input('gs');
					$table->t_average = $request->input('ta');
					$table->c_score = $request->input('cums');
					$table->c_average = $request->input('cuma');
					$table->position = $request->input('position');

					$table->indoor_game = $request->input('ig');
					$table->ball_game = $request->input('bg');
					$table->combative_game = $request->input('cg');
					$table->track = $request->input('track');
					$table->jumps = $request->input('jumps');
					$table->throw = $request->input('throw');
					$table->swimming = $request->input('swimming');
					$table->weight_lifting = $request->input('weight');
					$table->sport_comment = $request->input('sport_comment');

					$table->organisation = $request->input('organisation');
					$table->office = $request->input('office');
					$table->contribution = $request->input('contribution');

					$table->teacher_comment = $request->input('teacher_comment');
					$table->principal_comment = $request->input('principal_comment');

					if (!empty($request->file('background'))) { 

			        	$image_ext = $request->file('background')->getCLientOriginalExtension();

			            $table->shool_signature =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

			            $request->file('background')->move(
			            	storage_path().'/app/public/image/result/', $table->shool_signature 
			        	);
			        }

					$r_sub = r_sub::all()->where('sub', $table->sub_no);
					if(count($r_sub) > 0){
						foreach ($r_sub as $sub) {
							if(count($subjects) > 0){
								foreach ($subjects as $subject) {
									if($subject->classid == $result->classid){
										$subub = $r_sub->pluck('subjectid');
										if($subub->contains($subject->id) && $subject->id == $sub->subjectid){
											$sub->s_attendance = $request->input($subject->id.'_attendance');
											$sub->s_test = $request->input($subject->id.'_test');
											$sub->s_exam = $request->input($subject->id.'_exam');
											$sub->s_total = $request->input($subject->id.'_total');
											$sub->s_forward = $request->input($subject->id.'_forward');
											$sub->s_average = $request->input($subject->id.'_wa');
			                                $sub->s_grade = $request->input($subject->id.'_grade');
			                                $sub->save();
			                            }elseif(!$subub->contains($subject->id) && $subject->id != $sub->subjectid){
			                            	$sub = new r_sub;
			                            	$sub->sub = $id;
			                            	$sub->subjectid = $subject->id;
											$sub->s_attendance = $request->input($subject->id.'_attendance');
											$sub->s_test = $request->input($subject->id.'_test');
											$sub->s_exam = $request->input($subject->id.'_exam');
											$sub->s_total = $request->input($subject->id.'_total');
											$sub->s_forward = $request->input($subject->id.'_forward');
											$sub->s_average = $request->input($subject->id.'_wa');
			                                $sub->s_grade = $request->input($subject->id.'_grade');
			                                $sub->save();
			                                $rs = r_sub::all()->where('subjectid', $subject->id);
			                                if(count($rs) > 1){
			                                	$rsz = r_sub::where('subjectid', $subject->id)->take(1)->get();
			                                	foreach ($rsz as $rsy) {
			                                		$rsy->delete();
			                                	}
			                                	//echo $rsz;
			                                }
			                            }else{
			                            	
			                            }
									}
								}
							}
						}
					}
					$table->save();
				}
			}
			// $result->save();

	        return back()->with('success', 'Result Has Been Updated Successfully');
        }else{
            return redirect()->route('login');
        }
    }
}
