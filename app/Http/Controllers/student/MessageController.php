<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\student;
use App\Model\staff;
use App\Model\clas;
use App\Model\result;
use App\Model\book;
use App\Model\subject;
use App\Model\site;
use App\Model\message;
use App\Model\account;
use Auth;

class MessageController extends Controller
{
    public function index(){
    	if(Auth::guard('student')->check()){
	    	$students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($students) > 0){
		    	foreach ($students as $stud) {
		    		$class = clas::all()->where('id', $stud->classid)->where('status', 'Active');
		    		if(count($class) > 0){
			    		foreach ($class as $clas) {
			    			$subjects = subject::all()->where('classid', $clas->id)->where('status', 'Active');
			    				
			    			$books = book::all()->where('classid', $clas->id)->where('status', 'Active');

			    			$staffs = staff::all()->where('id', $clas->teacher)->where('status', 'Active');
			    		}
			    	}else{
			    		$subjects = '';
			    		$books = '';
			    		$staffs = '';
			    	}
		    		$results = result::all()->where('id', $stud->resultid)->where('status', 'Active');
		    		$payments = account::all()->where('id', $stud->paymentid)->where('status', 'Active');
		    		$id = $stud->id;
		    		$messages = message::all()->where('reciever', $id)->where('status', 'Active');
		    		$mstats = message::all()->where('reciever', $id)->where('msgstats', 'unread')->where('status', 'Active');
		    	}
		    }else{
		    	return view('student/login');
		    }
	    	$sites = site::all()->where('status', 'Active');

	    	return view('student/message')
	    		->with('students', $students)
	    		->with('staffs', $staffs)
	    		->with('class', $class)
	    		->with('results', $results)
	    		->with('books', $books)
	    		->with('subjects', $subjects)
	    		->with('payments', $payments)
	    		->with('sites', $sites)
	    		->with('messages', $messages)
	    		->with('mstats', $mstats)
	    		->with('id', $id);
	    }else{
            return redirect()->route('student_login');
        }
    }
    public function show($id){
    	$message = message::find($id);
    	$message->msgstats = 'read';
    	$message->save();
    }
}
