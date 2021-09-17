<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\student;
use App\Model\staff;
use App\Model\User;
use App\Model\clas;
use App\Model\account;
use App\Model\message;
use App\Model\result;
use App\Model\site;
use App\Model\session;
use App\Model\term;
use App\Model\allocate;
use Auth;

class MessagesController extends Controller
{
    public function index()
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->message == Auth::guard('staff')->user()->id){
		        $session = session::all()->where('status', 'Active');
		        $term = term::all()->where('status', 'Active');
		           
		        $messages = message::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');

		        $msguser = message::all()->where('status', 'Active')->where('scat', 'user')->where('msgcat', 'user')->sortBy('id', 0, 'desc');
		        $msgstudent = message::all()->where('status', 'Active')->where('scat', 'student')->where('msgcat', 'student')->sortBy('created_at', 0, 'desc');
		        $msgstaff = message::all()->where('status', 'Active')->where('scat', 'staff')->where('msgcat', 'staff')->sortBy('created_at', 0, 'desc');
		        $msgrequest = message::all()->where('status', 'Active')->where('scat', 'staff')->where('msgcat', 'request')->sortBy('created_at', 0, 'desc');
		        $msgsent = message::all()->where('status', 'Active')->where('scat', 'staff')->where('msgcat', 'staff')->sortBy('created_at', 0, 'desc');
		        $msgdraft = message::all()->where('status', 'Drafted')->sortBy('created_at', 0, 'desc');
		        $msgtrash = message::all()->where('status', 'Deleted')->sortBy('created_at', 0, 'desc');


		        $msgusernot = message::all()->where('status', 'Active')->where('scat', 'user')->where('msgstats', 'unread')->where('msgcat', 'user')->sortBy('created_at', 0, 'desc');
		        $msgstudentnot = message::all()->where('status', 'Active')->where('scat', 'student')->where('msgstats', 'unread')->where('msgcat', 'student')->sortBy('created_at', 0, 'desc');
		        $msgstaffnot = message::all()->where('status', 'Active')->where('scat', 'staff')->where('msgstats', 'unread')->where('msgcat', 'staff')->sortBy('created_at', 0, 'desc');
		        $msgrequestnot = message::all()->where('status', 'Active')->where('scat', 'staff')->where('msgcat', 'request')->where('msgstats', 'unread')->sortBy('created_at', 0, 'desc');
		        $msgsentnot = message::all()->where('status', 'Active')->where('scat', 'staff')->where('msgcat', 'staff')->where('msgstats', 'unread')->sortBy('created_at', 0, 'desc');
		        $msgdraftnot = message::all()->where('status', 'Drafted')->where('msgstats', 'unread')->sortBy('created_at', 0, 'desc');
		        $msgtrashnot = message::all()->where('status', 'Deleted')->where('msgstats', 'unread')->sortBy('created_at', 0, 'desc');


		        $students = student::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $staffs = staff::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $users = User::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $accounts = account::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $results = result::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $staffs = staff::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $sites = site::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');

		        if(count($messages) > 0){
		            foreach($messages as $message){
		                $id = $message->id;
		            }
		        }else{
		            $id = '';
		        }

	            return view('staff/message/message')
	            	->with('messages', $messages)

	            	->with('msguser', $msguser)
	            	->with('msgstudent', $msgstudent)
	            	->with('msgstaff', $msgstaff)
	            	->with('msgrequest', $msgrequest)
	            	->with('msgsent', $msgsent)
	            	->with('msgdraft', $msgdraft)
	            	->with('msgtrash', $msgtrash)

	            	->with('msgusernot', $msgusernot)
	            	->with('msgstudentnot', $msgstudentnot)
	            	->with('msgstaffnot', $msgstaffnot)
	            	->with('msgrequestnot', $msgrequestnot)
	            	->with('msgsentnot', $msgsentnot)
	            	->with('msgdraftnot', $msgdraftnot)
	            	->with('msgtrashnot', $msgtrashnot)

	            	->with('students', $students)
	            	->with('staffs', $staffs)
	            	->with('users', $users)
	            	->with('accounts', $accounts)
	            	->with('results', $results)
	            	->with('classes', $classes)
	                ->with('staffs', $staffs)
	                ->with('sites', $sites)
	                ->with('session', $session)
	                ->with('term', $term)
	            	->with('id', $id);
	        }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        } 
    }
    public function create(Request $request)
    {
        if(Auth::guard('staff')->check()){
        	$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->message == Auth::guard('staff')->user()->id){
	            //echo('From: '.$request->input('cfrom').'; Category:' .$request->input('hid').'; To: '.$to.'; Subject: '.$request->input('csub').'; Message: '.$request->input('editordata'));
	            if(!empty($request->input('hid'))){

	                $message = new message;

	                if($request->input('hid') == 'student'){
	                    $to = $request->input('ctosd');
	                }elseif($request->input('hid') == 'staff'){
	                    $to = $request->input('ctosf');
	                }elseif($request->input('hid') == 'user'){
	                    $to = $request->input('ctovs');
	                }else{
	                    $to = '';
	                }
	                echo $to;
	                // if(!empty($to)){
	                //     $message->reciever = $to;
	                //     $message->sender = $request->input('cfrom');
	                //     $message->scat = 'staff';
	                //     $message->rcat = $request->input('hid');
	                //     $message->title = $request->input('csub');
	                //     $message->msg = $request->input('editordata');
	                //     $message->msgcat = 'staff';
	                //     $message->msgstats = 'read';
	                //     $message->time = date('h:i:s');
	                //     $message->d = date('d');
	                //     $message->m = date('M');
	                //     $message->y = date('Y');
	                //     $message->status = 'Active';

	                //     $session = session::all()->where('status', 'Active')->where('category', 'Open');
	                //     $term = term::all()->where('status', 'Active')->where('category', 'Open');
	                    
	                //     if(count($session) > 0){
	                //         foreach($session as $sec){
	                //             if(count($term) > 0){
	                //                 foreach($term as $ter){
	                //                     $message->session = $sec->id;
	                //                     $message->term = $ter->id;
	                //                 }
	                //             }else{
	                //                 return back()->with('error', 'term is to be added first!');
	                //             }
	                //         }
	                //     }else{
	                //         return back()->with('error', 'Session and term are to be added first!');
	                //     }

	                //     //$message->save();
	                // }else{
	                //     return back()->with('error', 'Fill All Provided Inputs');
	                // }
	            }else{
	                return back()->with('error', 'Fill All Required Inputs');
	            }
	        }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index');
        }

        //return back()->with('success', 'Successfully Sent');
    }
    public function reply(Request $request, $id)
    {
        if(Auth::guard('staff')->check()){
        	$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->message == Auth::guard('staff')->user()->id){
	            $mess = message::find($id);

	            $message = new message;

	            $message->sender = $mess->reciever;
	            $message->reciever = $mess->sender;
	            $message->scat = 'staff';
	            $message->rcat = $mess->rcat;
	            $message->title = 'Re: '.$request->input('sub');
	            $message->msg = 'Replied Your message<br><div style="border: 1px solid;">'.$mess->msg.'</div><br>'.$request->input('msg');
	            $message->msgcat = $mess->msgcat;
	            $message->msgstats = 'read';
	            $message->time = date('h:i:s');
	            $message->d = date('d');
	            $message->m = date('M');
	            $message->y = date('Y');
	            $message->status = 'Active';

	            if(count($session) > 0){
	                foreach($session as $sec){
	                    if(count($term) > 0){
	                        foreach($term as $ter){
	                            $message->session = $sec->id;
	                            $message->term = $ter->id;
	                        }
	                    }else{
	                        return back()->with('error', 'term is to be added first!');
	                    }
	                }
	            }else{
	                return back()->with('error', 'Session and term are to be added first!');
	            }

	            $message->save();

	            return response()->json(['success' => 'Successfully Sent']);
	        }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index');
        }
    }
}
