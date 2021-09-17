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
use App\Model\session;
use App\Model\term;
use Auth;

class StudentController extends Controller
{
	function index()
    {
    	if(Auth::guard('student')->check()){
        	return redirect()->route('student_dashboard');
        }else{
            return view('student/login');
        }
    }

    public function __construct()     
    { 
        $this->middleware('guest:student', ['except' => ['logout'], ['/']]);
    }

    function login(Request $request)
    {
     //return true;
        $this->validate($request, [
          'username'   => 'required',
          'password'  => 'required'
        ]);

        if(Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('student_dashboard'));
        }

        return redirect()->back()
            ->withInput($request->only('username', 'remember'))
            ->with('error', 'Wrong Login Details!');
    }

    function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student_login');
    }
    public function getDashboard(){
    	if(Auth::guard('student')->check()){
	    	$students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	$account = account::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($account) > 0){
	    		$student = student::find(Auth::guard('student')->user()->id);
		    	foreach ($account as $acc) {
		    		$class = clas::all()->where('id', $acc->classid)->where('status', 'Active');
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
		    		$result = result::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
		    		$id = Auth::guard('student')->user()->id;
		    		$messages = message::all()->where('rcat', $id)->where('status', 'Active');
		    	}
		    }else{
		    	return view('student/login')->with('error', 'Sorry, this account is having some technical issues!');
		    }
	    	$sites = site::all()->where('id', 1)->where('status', 'Active');
	    	$student = student::find(Auth::guard('student')->user()->id);
	    	$session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        	$term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

	        return view('student/profile')
	    		->with('students', $students)
	    		->with('student', $student)
	    		->with('staffs', $staffs)
	    		->with('class', $class)
	    		->with('result', $result)
	    		->with('books', $books)
	    		->with('subjects', $subjects)
	    		->with('account', $account)
	    		->with('session', $session)
	    		->with('term', $term)
	    		->with('sites', $sites)
	    		->with('messages', $messages)
	    		->with('id', $id);
	    }else{
            return redirect()->route('student_login');
        }
    }

    public function student(){
    	if(Auth::guard('student')->check()){
	    	$students = student::all()->where('id', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	$account = account::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
	    	if(count($account) > 0){
	    		$student = student::find(Auth::guard('student')->user()->id);
		    	foreach ($account as $acc) {
		    		$class = clas::all()->where('id', $acc->classid)->where('status', 'Active');
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
		    		$result = result::all()->where('studentid', Auth::guard('student')->user()->id)->where('status', 'Active');
		    		$id = Auth::guard('student')->user()->id;
		    		$messages = message::all()->where('rcat', $id)->where('status', 'Active');
		    	}
		    }else{
		    	return view('student/login')->with('error', 'Sorry, this account is having some technical issues!');
		    }
	    	$sites = site::all()->where('id', 1)->where('status', 'Active');
	    	$student = student::find(Auth::guard('student')->user()->id);
	    	$session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        	$term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

	        return view('student/profile')
	    		->with('students', $students)
	    		->with('student', $student)
	    		->with('staffs', $staffs)
	    		->with('class', $class)
	    		->with('result', $result)
	    		->with('books', $books)
	    		->with('subjects', $subjects)
	    		->with('account', $account)
	    		->with('session', $session)
	    		->with('term', $term)
	    		->with('sites', $sites)
	    		->with('messages', $messages)
	    		->with('id', $id);
	    }else{
            return redirect()->route('student_login');
        }
    }
}
