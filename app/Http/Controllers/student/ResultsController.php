<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
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
	public function index(){
    	if(Auth::guard('student')->check()){
    		$students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	$student = student::find(Auth::guard('student')->user()->id);
	    	$session = session::all()->where('status', 'Active');
        	$term = term::all()->where('status', 'Active');
	    	$payments = account::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($payments) > 0){
		    	foreach ($payments as $payment) {
		    		$class = clas::all()->where('id', $payment->classid)->where('status', 'Active');
		    		if(count($class) > 0){
			    		foreach ($class as $clas) {
			    			$subjects = subject::all()->where('classid', $clas->id)->where('status', 'Active');
			    		}
			    	}else{
			    		$subjects = '';
			    	}
		    		$result = result::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
		    		$id = Auth::guard('student')->user()->id;
		    		$messages = message::all()->where('rcat', $id)->where('status', 'Active');
		    	}
		    }else{
		    	return view('student/login')->with('error', 'Sorry, this account is having some technical issues!');
		    }
	    	$sites = site::all()->where('id', 1)->where('status', 'Active');

	    	return view('student/result')
		    		->with('student', $student)
		    		->with('students', $students)
		    		->with('class', $class)
		    		->with('result', $result)
		    		->with('subjects', $subjects)
		    		->with('payments', $payments)
		    		->with('sites', $sites)
		    		->with('messages', $messages)
		    		->with('session', $session)
	            	->with('term', $term)
		    		->with('id', $id);
        }else{
            return redirect()->route('student_login');
        }
    }
    public function getCreate($id)
    {
    	if(Auth::guard('student')->check()){
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
	        $students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');;
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
	    	$payments = account::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($payments) > 0){
		    	foreach ($payments as $payment) {
		    		$messages = message::all()->where('rcat', $id)->where('status', 'Active');
		    	}
		    }else{
		    	return view('student/login')->with('error', 'Sorry, this account is having some technical issues!');
		    }
			//echo count($r_subs);
		    $id = $result->id;
	    	
	    	if($result->studentid == Auth::guard('student')->user()->id){
	            return view('student/view')
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
		        	->with('messages', $messages)
		        	->with('session', $session)
		            ->with('term', $term)
		        	->with('id', $id);
		    }else{
		    	return redirect()->route('result.index');
		    }
        }else{
            return redirect()->route('student_login');
        }
    	
    }
}
