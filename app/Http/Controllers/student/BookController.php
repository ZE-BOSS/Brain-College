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

class BookController extends Controller
{
    public function index(){
    	if(Auth::guard('student')->check()){
	    	$students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	$payments = account::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($payments) > 0){
		    	foreach ($payments as $payment) {
		    		$class = clas::all()->where('id', $payment->classid)->where('status', 'Active');
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
		    		$results = result::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
		    		$id = Auth::guard('student')->user()->id;
		    		$messages = message::all()->where('rcat', $id)->where('status', 'Active');
		    	}
		    }else{
		    	return view('student/login')->with('error', 'Sorry, this account is having some technical issues!');
		    }
	    	$sites = site::all()->where('id', 1)->where('status', 'Active');
			
			return view('student/book')
		    		->with('students', $students)
		    		->with('staffs', $staffs)
		    		->with('class', $class)
		    		->with('results', $results)
		    		->with('books', $books)
		    		->with('subjects', $subjects)
		    		->with('payments', $payments)
		    		->with('sites', $sites)
		    		->with('messages', $messages)
		    		->with('id', $id);
        }else{
            return redirect()->route('student_login');
        }
    }
}
