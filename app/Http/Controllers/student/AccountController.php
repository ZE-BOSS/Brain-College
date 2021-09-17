<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\clas;
use App\Model\staff;
use App\Model\student;
use App\Model\payment;
use App\Model\account;
use App\Model\session;
use App\Model\term;
use App\Model\pay;
use App\Model\payed;
use App\Model\site;
use App\Model\message;
use App\Model\book;
use App\Model\subject;
use App\Model\result;
use Auth;

class AccountController extends Controller
{
    public function index(){
    	if(Auth::guard('student')->check()){
	    	$students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	$pays = pay::all()->where('status', 'Active');
        	$payeds = payed::all()->where('status', 'Active');
	    	$accounts = account::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($accounts) > 0){
		    	foreach ($accounts as $account) {
		    		$classes = clas::all()->where('id', $account->classid)->where('status', 'Active');
		    		if(count($classes) > 0){
			    		foreach ($classes as $clas) {
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
			
			return view('student/account')
		    		->with('students', $students)
		    		->with('staffs', $staffs)
		    		->with('classes', $classes)
		    		->with('results', $results)
		    		->with('books', $books)
		    		->with('subjects', $subjects)
		    		->with('accounts', $accounts)
		    		->with('pays', $pays)
                	->with('payeds', $payeds)
		    		->with('sites', $sites)
		    		->with('messages', $messages)
		    		->with('id', $id);
        }else{
            return redirect()->route('student_login');
        }
    }
}
