<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\staff;
use App\Model\clas;
use App\Model\payment;
use App\Model\message;
use App\Model\result;
use App\Model\session;
use App\Model\term;
use App\Model\branch;
use App\Model\hostel;
use App\Model\hostel_list;
use App\Model\allocate;
use DB;
use Auth; 

class StaffsController extends Controller
{
    public function index()
    {	
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
		    	$staffs = staff::all()->where('status', 'Active')->sortBy('id',0, 'desc');
		        $payments = payment::where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();
		        if(!empty($payments)){
		        	$session = session::all()->where('status', 'Active')->where('category', 'Open');
		        	$term = term::all()->where('status', 'Active')->where('category', 'Open');
		        	foreach ($payments as $payment) {
		        		if($payment->m.' '.$payment->y == date('M').' '.date('Y')){
		        			//echo 'Equal';
		        		}else{
		        			$pay = new payment;
		        			$pay->classid = $payment->classid;
					        $pay->name =  $payment->name;
					        $pay->staffid =  $payment->staffid;
					        $pay->to_pay =  $payment->to_pay;
			        		$pay->accounttype = $payment->accounttype;
					        $pay->accountname = $payment->accountname;
					        $pay->accountnumber = $payment->accountnumber;
					        $pay->bank =$payment->bank;
					        $pay->paymentstatus = $payment->paymentstatus;
					        $pay->infostatus = $payment->infostatus;
				        	$pay->paymentstatus = $payment->paymentstatus;
				        		if(count($session) > 0){
					                foreach($session as $sec){
					                    if(count($term) > 0){
					                        foreach($term as $ter){
					                            $pay->session = $sec->id;
					                            $pay->term = $ter->id;
					                        }
					                    }else{
					                        $pay->term = $payment->term;
					                    }
					                }
					            }else{
					                $pay->session = $payment->session;
					            }
					        $pay->status = 'Active';
					        $pay->time = date('h:i:s');//time();
					        $pay->d = date('d');
					        $pay->m = date('M');
					        $pay->y = date('Y');
					        $pay->save();
					        //echo $pay->id;
		        			//echo 'Not Equal: '.$payment->m.' '.$payment->y.' Not Equal: '.date('M').' '.date('Y');
		        		}
		        	}
		        }
		        $session = session::all()->where('status', 'Active');
		        $term = term::all()->where('status', 'Active');
		        if(count($staffs) > 0){
			        foreach($staffs as $staff){
			            $id = $staff->id;
			        }
			    }else{
			    	$id = '';
			    }

			    
		        return view('staff/staff/staff')
		        	->with('staffs', $staffs)
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

    public function getCreate()
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
		    	$hostels = hostel::all()->where('status', 'Active');
		    	$session = session::all()->where('status', 'Active');
		    	$branches = branch::all()->where('status', 'Active');
		        $term = term::all()->where('status', 'Active');
		        $classes = clas::all()->where('status', 'Active');
		        $staffs = staff::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        if(count($staffs) > 0){
			        foreach($staffs as $staff){
			            $id = $staff->id;
			        }
			    }else{
			    	$id = '';
			    }

	            return view('staff/staff/create')
		        	->with('classes', $classes)
		        	->with('hostels', $hostels)
		        	->with('session', $session)
		            ->with('term', $term)
		            ->with('branches', $branches)
		        	->with('id', $id);
		    }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
	            $studs = staff::all()->where('username', $request->input('username'));
		        if(count($studs) > 0){
		        	return back()->with('error', 'Username already exists');
		        }else{
		        	$this->validate($request,[
			            'firstName' => 'required',
			            'otherName' => 'required',
			            'username' => 'required',
			            'category' => 'required',
			            //'class' => 'required',
			            'position' => 'required',
			            'phoneno1' => 'required'
			        ]);

			        $session = session::all()->where('status', 'Active')->where('category', 'Open');
		        	$term = term::all()->where('status', 'Active')->where('category', 'Open');

			        $payment = new payment;

			        $payment->name =  $request->input('username');
			        if(!empty($request->input('acctype')) && !empty($request->input('accname')) && !empty($request->input('accno')) && !empty($request->input('bank'))){
			        		$payment->accounttype = $request->input('acctype');
					        $payment->accountname = $request->input('accname');
					        $payment->accountnumber = $request->input('accno');
					        $payment->bank = $request->input('bank');
					        $payment->paymentstatus = 'Pending';
					        $payment->infostatus = $request->input('infostatus');
			        	}
			        else{
			        	$payment->paymentstatus = 'Not Payed';
			        }

			        $payment->status = 'Active';
			        $payment->time = date('h:i:s');//time();
			        $payment->d = date('d');
			        $payment->m = date('M');
			        $payment->y = date('Y');
		            
		            if(count($session) > 0){
		                foreach($session as $sec){
		                    if(count($term) > 0){
		                        foreach($term as $ter){
		                            $payment->session = $sec->id;
		                            $payment->term = $ter->id;
		                        }
		                    }else{
		                        return back()->with('error', 'term is to be added first!');
		                    }
		                }
		            }else{
		                return back()->with('error', 'Session and term are to be added first!');
		            }

			        $payment->save();

			        $acc = payment::all()->where('name', '=', $request->input('username'));
			        foreach($acc as $accnt){
			            $accid = $accnt->id;
			        }

			        $staff = new staff;
			        
			        
			        if (!empty($request->file('profilepics'))) { 

			        	$image_ext = $request->file('profilepics')->getCLientOriginalExtension();

			            $staff->profilepics =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

			            $request->file('profilepics')->move(
			            	storage_path().'/app/public/image/staff/', $staff->profilepics 
			        	);
			        }

			        

			        
			        $staff->firstname = $request->input('firstName');
			        $staff->othernames = $request->input('otherName');
			        $staff->username = $request->input('username');
			        $staff->dob = $request->input('dob');
			        $staff->password = bcrypt($request->input('password'));
			        $staff->email = $request->input('email');
			        $staff->phoneno1 = $request->input('phoneno1');
			        $staff->phoneno2 = $request->input('phoneno2');
			        $staff->moreinfo = $request->input('moreinfo');
			        $staff->address = $request->input('address');
			        $staff->address2 = $request->input('address2');
			        $staff->position = $request->input('position');
			        $staff->category = $request->input('category');
			        $staff->country = $request->input('country');
			        $staff->state = $request->input('state');
			        $staff->zipcode = $request->input('zip');
			        $staff->lga = $request->input('lga');
			        $staff->hobby = $request->input('hobby');
			        $staff->religion = $request->input('religion');
			        $staff->disability = $request->input('disable');
			        $staff->sport = $request->input('sport');
			        $staff->branch = $request->input('branch');
			        $staff->sex = $request->input('sex');
			        $staff->stafftype = $request->input('stafftype');
			        $staff->remember_token = rand(111111111, 999999999);
			        $staff->status = 'Active';
			        $staff->time = date('h:i:s');//time();
			        $staff->d = date('d');
			        $staff->m = date('M');
			        $staff->y = date('y');
		            
		            if(count($session) > 0){
		                foreach($session as $sec){
		                    if(count($term) > 0){
		                        foreach($term as $ter){
		                            $staff->session = $sec->id;
		                            $staff->term = $ter->id;
		                        }
		                    }else{
		                        return back()->with('error', 'term is to be added first!');
		                    }
		                }
		            }else{
		                return back()->with('error', 'Session and term are to be added first!');
		            }

			        $staff->save();

			        $id = $staff->id;

			        $ac = payment::where('id', '=', $payment->id)->update(['staffid' => $id]);

			        $payment->save();

			        if($request->input('stafftype') == 'Boarding'){
				        $hostel_list = new hostel_list;
				        $hostel_list->hostelid = $request->input('hostel');
				        $hostel_list->userid = $staff->id;
				        $hostel_list->user_category = 'Staff';
				        $hostel_list->room = $request->input('room');
				        $hostel_list->remember_token = rand(111111111, 999999999);
				        $hostel_list->status = 'Active';
				        $hostel_list->time = date('h:i:s');//time();
				        $hostel_list->d = date('d');
				        $hostel_list->m = date('M');
				        $hostel_list->y = date('y');

				        if(count($session) > 0){
			                foreach($session as $sec){
			                    if(count($term) > 0){
			                        foreach($term as $ter){
			                            $hostel_list->session = $sec->id;
			                            $hostel_list->term = $ter->id;
			                        }
			                    }else{
			                        return back()->with('error', 'term is to be added first!');
			                    }
			                }
			            }else{
			                return back()->with('error', 'Session and term are to be added first!');
			            }

				        $hostel_list->save();
				    }

			        return back()->with('success', ' Staff added successfully');
			    }
			}else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
		        $staff = staff::find($id);
		        $hostels = hostel::all()->where('status', 'Active');
		        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('userid', $id)->where('user_category', '=', 'Staff');
		        $session = session::all()->where('status', 'Active');
		        $branches = branch::all()->where('status', 'Active');
		        $term = term::all()->where('status', 'Active');
		        $class = clas::all()->where('status', 'Active');
		        $payment = payment::where('staffid', $id)->where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();
		        $pays = payment::all()->where('staffid', $id)->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $message = message::all()->where('sender', $id)->where('scat', 'staff')->where('status', 'Active');

	            return view('staff/staff/view')
	            	->with('hostels', $hostels)
		        	->with('hostel_lists', $hostel_lists)
		            ->with('staff', $staff)
		            ->with('session', $session)
		            ->with('term', $term)
		            ->with('class', $class)
		            ->with('payment', $payment)
		            ->with('pays', $pays)
		            ->with('message', $message)
		            ->with('branches', $branches)
		            ->with('id', $id);
		    }else{
	            return redirect()->route('staff_index')->with('error', 'Access Denied');
	        }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }

    }

    public function edit($id)
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
		        $staff = staff::find($id);
		        $hostels = hostel::all()->where('status', 'Active');
		        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('userid', $id)->where('user_category', '=', 'Staff');
		        $classes = clas::all()->where('status', 'Active');
		        $session = session::all()->where('status', 'Active')->where('category', 'Open');
		        $term = term::all()->where('status', 'Active')->where('category', 'Open');
		        $branches = branch::all()->where('status', 'Active');
				if(count($session) > 0){
			        foreach($session as $sec){
			            if(count($term) > 0){
			                foreach($term as $ter){
			                    $payments = payment::all()->where('staffid', $id)->where('session', $sec->id)->where('term', $ter->id)->where('m', date('M'))->where('y', date('Y'))->where('status', 'Active');
			                }
			            }else{
			                $payments = payment::all()->where('staffid', $id)->where('status', 'Active');
			            }
			        }
			    }else{
			        $payments = payment::all()->where('staffid', $id)->where('status', 'Active');
			    }

	            return view('staff/staff/edit')
	            	->with('hostels', $hostels)
		        	->with('hostel_lists', $hostel_lists)
		        	->with('staff', $staff)
		        	->with('classes', $classes)
		        	->with('payments', $payments)
		        	->with('branches', $branches)
		        	->with('id', $id);
		    }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function reset(Request $request, $id)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
		        $staff = staff::find($id);

		        $staff->password = bcrypt($request->input('pass'));

		        $staff->save();
		    }else{
		    	if($id == Auth::guard('staff')->user()->id){
		    		$staff = staff::find($id);

			        $staff->password = bcrypt($request->input('pass'));

			        $staff->save();
		    	}else{
                	return redirect()->route('staff_index')->with('error', 'Access Denied');
		    	}
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
	            $staff = staff::find($id);
		        $studs = staff::all()->where('username', $request->input('username'));
		        if(count($studs) > 1){
		        	return back()->with('error', 'Username already exists');
		        }else{
		        	$this->validate($request,[
			            'firstName' => 'required',
			            'otherName' => 'required',
			            'username' => 'required',
			            'category' => 'required',
			            //'class' => 'required',
			            'position' => 'required',
			            'phoneno1' => 'required'
			        ]);
			        
			        if (!empty($request->file('profilepics'))) { 

			        	$image_ext = $request->file('profilepics')->getCLientOriginalExtension();

			            $staff->profilepics =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

			            $request->file('profilepics')->move(
			            	storage_path().'/app/public/image/staff/', $staff->profilepics 
			        	);
			        }
			        
			        $staff->firstname = $request->input('firstName');
			        $staff->othernames = $request->input('otherName');
			        $staff->username = $request->input('username');
			        $staff->dob = $request->input('dob');
			        $staff->password = bcrypt($request->input('username').'@crestgate.staff');
			        $staff->email = $request->input('email');
			        $staff->phoneno1 = $request->input('phoneno1');
			        $staff->phoneno2 = $request->input('phoneno2');
			        $staff->moreinfo = $request->input('moreinfo');
			        $staff->address = $request->input('address');
			        $staff->address2 = $request->input('address2');
			        $staff->position = $request->input('position');
			        $staff->category = $request->input('category');
			        $staff->country = $request->input('country');
			        $staff->state = $request->input('state');
			        $staff->zipcode = $request->input('zip');
			        $staff->lga = $request->input('lga');
			        $staff->hobby = $request->input('hobby');
			        $staff->religion = $request->input('religion');
			        $staff->disability = $request->input('disable');
			        $staff->sport = $request->input('sport');
			        $staff->remember_token = rand(111111111, 999999999);
			        $staff->branch = $request->input('branch');
			        $staff->sex = $request->input('sex');
			        $staff->stafftype = $request->input('stafftype');
			        $staff->save();

			        $payment = payment::find($request->input('payid'));

			        $payment->classid = $request->input('class');
			        $payment->name =  $request->input('username');
			        if(!empty($request->input('acctype')) && !empty($request->input('accname')) && !empty($request->input('accno')) && !empty($request->input('bank'))){
			        		$payment->accounttype = $request->input('acctype');
					        $payment->accountname = $request->input('accname');
					        $payment->accountnumber = $request->input('accno');
					        $payment->bank = $request->input('bank');
					        $payment->paymentstatus = 'Pending';
					        $payment->infostatus = $request->input('infostatus');
			        	}
			        else{
			        	$payment->paymentstatus = 'Not Payed';
			        }

			        $payment->status = 'Active';
			        $payment->time = date('h:i:s');//time();
			        $payment->d = date('d');
			        $payment->m = date('M');
			        $payment->y = date('Y');
					$payment->save();

					$session = session::all()->where('status', 'Active')->where('category', 'Open');
		        	$term = term::all()->where('status', 'Active')->where('category', 'Open');

		        	if($request->input('stafftype') == 'Boarding'){
				        if(count($session) > 0){
			                foreach($session as $sec){
			                    if(count($term) > 0){
			                        foreach($term as $ter){
			                            $hostel_lists = hostel_list::all()->where('userid', $id)->where('user_category', '=', 'Staff');
			                           	if(count($hostel_lists) > 0){
			                				foreach($hostel_lists as $hostel_list){
										        $hostel_list->hostelid = $request->input('hostel');
										        $hostel_list->userid = $staff->id;
										        $hostel_list->user_category = 'Staff';
										        $hostel_list->room = $request->input('room');
										        $hostel_list->save();
										    }
										}else{
											$hostel_list = new hostel_list;
									        $hostel_list->hostelid = $request->input('hostel');
									        $hostel_list->userid = $staff->id;
									        $hostel_list->user_category = 'Staff';
									        $hostel_list->room = $request->input('room');
									        $hostel_list->remember_token = rand(111111111, 999999999);
									        $hostel_list->status = 'Active';
									        $hostel_list->time = date('h:i:s');//time();
									        $hostel_list->d = date('d');
									        $hostel_list->m = date('M');
									        $hostel_list->y = date('y');
				                            $hostel_list->session = $sec->id;
				                            $hostel_list->term = $ter->id;
									        $hostel_list->save();
										}
			                        }
			                    }else{
			                        return back()->with('error', 'term is to be added first!');
			                    }
			                }
			            }else{
			                return back()->with('error', 'Session and term are to be added first!');
			            }
			        }

			        return back()->with('success', ' Staff Data Updated successfully');
			    }
			}else{
            	return redirect()->route('staff_index')->with('error', 'Access Denied');
	    	}
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->staff == Auth::guard('staff')->user()->id){
	            $sta = staff::find($id);
		    	$st = staff::where('id', '=', $id)->update(['status' => 'Deleted']);
		        $ac = payment::where('staffid', '=', $id)->update(['status' => 'Deleted']);
		        $hl = hostel_list::where('userid', '=', $id)->where('user_category', '=', 'Staff')->update(['status' => 'Deleted']);

			    return back()->with('success', ' Staff Data Deleted successfully');
			}else{
            	return redirect()->route('staff_index')->with('error', 'Access Denied');
	    	}
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
