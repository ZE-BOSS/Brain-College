<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\student;
use App\Model\staff;
use App\Model\User;
use App\Model\account;
use App\Model\event;
use App\Model\gallery;
use App\Model\result;
use App\Model\Admin;
use App\Model\site;
use App\Model\book;
use App\Model\subject;
use App\Model\clas;
use App\Model\payment;
use App\Model\session;
use App\Model\term;
use Auth;

class trashController extends Controller
{
	public function index(){    
	    $students = student::all()->where('status', 'Deleted')->sortBy('id', 0, 'desc');
	    $staffs = staff::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $users = User::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $accounts = account::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $results = result::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $classes = clas::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $admins = Admin::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $sites = site::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $events = event::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $galleries = gallery::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $books = book::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $subjects = subject::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $payments = payment::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');
	    $session = session::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
	    $term = term::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
	    $id = '';

	    if(Auth::guard('admin')->check()){
	    	return view('admin/trash/trash')
	    	->with('students', $students)
	    	->with('staffs', $staffs)
	    	->with('accounts', $accounts)
	    	->with('results', $results)
	    	->with('classes', $classes)
	    	->with('admins', $admins)
	    	->with('sites', $sites)
	    	->with('events', $events)
	    	->with('galleries', $galleries)
	    	->with('books', $books)
	    	->with('subjects', $subjects)
	    	->with('payments', $payments)
	    	->with('users', $users)
	    	->with('session', $session)
	    	->with('term', $term)
	    	->with('id', $id);
	    }else{
            return redirect()->route('login');
        }
	}
	//Student
	public function studentres($id){  
		if(Auth::guard('admin')->check()){  
		    $student = student::find($id);
	        $payment = account::find($student->paymentid);
	        $result = result::find($student->resultid);

	        $student->status = 'Active';

	        if(!empty($payment->id)){
	            $payment->status = 'Active';

	            $payment->save();
	        }

	        if(!empty($result->id)){
	            $result->status = 'Active';

	            $result->save();
	        }

	        $student->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function studentdel($id){    
		if(Auth::guard('admin')->check()){
		    $student = student::find($id);
	        $payment = account::find($student->paymentid);

	        $student->delete();

	        if(!empty($payment->id)){
	            $payment->delete();
	        }

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//Staff
	public function staffres($id){    
		if(Auth::guard('admin')->check()){
		    $staff = staff::find($id);
	        $payment = payment::find($staff->paymentid);

	        $staff->status = 'Active';

	        if(!empty($payment->id)){
	            $payment->status = 'Active';

	            $payment->save();
	        }
	        $staff->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function staffdel($id){   
		if(Auth::guard('admin')->check()){ 
		    $staff = staff::find($id);
	        $payment = payment::find($staff->paymentid);

	        $staff->delete();

	        if(!empty($payment->id)){
	            $payment->delete();
	        }

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//User
	public function userres($id){  
		if(Auth::guard('admin')->check()){  
		    $user = user::find($id);

	        $user->status = 'Active';

	        $user->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function userdel($id){  
		if(Auth::guard('admin')->check()){  
		    $user = user::find($id);

	        $user->delete();

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//Class
	public function classres($id){    
		if(Auth::guard('admin')->check()){
		    $class = clas::find($id);

	        $class->status = 'Active';

	        $class->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function classdel($id){ 
		if(Auth::guard('admin')->check()){   
		    $class = clas::find($id);

	        $class->delete();

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//Subject
	public function subjectres($id){  
		if(Auth::guard('admin')->check()){  
		    $subject = subject::find($id);

	        $subject->status = 'Active';

	        $subject->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function subjectdel($id){    
		if(Auth::guard('admin')->check()){
		    $subject = subject::find($id);

	        $subject->delete();

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//Book
	public function bookres($id){  
		if(Auth::guard('admin')->check()){  
		    $book = book::find($id);

	        $book->status = 'Active';

	        $book->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function bookdel($id){    
		if(Auth::guard('admin')->check()){
		    $book = book::find($id);

	        $book->delete();

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//Event
	public function eventres($id){  
		if(Auth::guard('admin')->check()){  
		    $event = event::find($id);

	        $event->status = 'Active';

	        $event->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function eventdel($id){ 
		if(Auth::guard('admin')->check()){   
		    $event = event::find($id);

	        $event->delete();

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	//User
	public function galleryres($id){   
		if(Auth::guard('admin')->check()){ 
		    $gallery = gallery::find($id);

	        $gallery->status = 'Active';

	        $gallery->save();

	        return redirect(route('trash.index'))->with('delete','Restored successfully');
	    }else{
            return redirect()->route('login');
        }
	}
	public function gallerydel($id){  
		if(Auth::guard('admin')->check()){  
		    $gallery = gallery::find($id);

	        $gallery->delete();

	        return redirect(route('trash.index'))->with('restore','Deleted successfully');
	    }else{
            return redirect()->route('login');
        }
	}
}
