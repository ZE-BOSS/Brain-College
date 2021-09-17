<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\student;
use App\Model\clas;
use App\Model\account;
use App\Model\message;
use App\Model\result;
use App\Model\session;
use App\Model\term;
use App\Model\branch;
use App\Model\hostel;
use App\Model\hostel_list;
use App\Model\allocate;
use App\Model\staff;
use Auth; 

class StudentsController extends Controller
{
    public function index()
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($classes) > 0){
                    foreach($classes as $clas){
                        $id = $clas->id;
                    }
                }else{
                    $id = '';
                }

                return view('staff/student/student')
                    ->with('students', $students)
                    ->with('staffs', $staffs)
                    ->with('classes', $classes)
                    ->with('session', $session)
                    ->with('term', $term)
                    ->with('id', $id);
                
            }else{
                $staff = staff::find(Auth::guard('staff')->user()->id);
                $classes = clas::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $students = student::all()->where('status', 'Active');
                if(count($classes) > 0){
                    foreach ($classes as $clas) {
                        if(count($classes) > 0){
                            $news = collect([]);
                            foreach($classes as $clas){
                                $students = student::all()->where('status', 'Active');
                                if(count($students) > 0){
                                    foreach($students as $student){
                                        $accounts = account::all()->where('status', 'Active')->where('classid', $clas->id)->where('studentid', $student->id);
                                        if(count($accounts) > 0){
                                        	foreach($accounts as $account){
                                            	$news->add($student);
                                            }
                                        }else{
                                           //$news->add($student); 
                                        }
                                    }
                                }
                                $id = $student->id;
                            }
                        }else{
                            $students = student::all()->where('status', 'Active');
                            $id = '';
                        }
                    }
                    $students = $news;

                    return view('staff/student/student')
                        ->with('students', $students)
                        ->with('staff', $staff)
                        ->with('classes', $classes)
                        ->with('id', $id);
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }

            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }


    public function getCreate()
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
		    	$hostels = hostel::all()->where('status', 'Active');
		    	$session = session::all()->where('status', 'Active');
		        $term = term::all()->where('status', 'Active');
		        $classes = clas::all()->where('status', 'Active');
		        $branches = branch::all()->where('status', 'Active');
		        $students = student::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        if(count($students) > 0){
			        foreach($students as $student){
			            $id = $student->id;
			        }
			    }else{
			    	$id = '';
			    }

	            return view('staff/student/create')
		        	->with('classes', $classes)
		        	->with('hostels', $hostels)
		        	->with('session', $session)
		            ->with('term', $term)
		            ->with('branches', $branches)
		        	->with('id', $id);
		    }else{
                return redirect()->route('staff_student.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
	            $studs = student::all()->where('username', $request->input('username'));
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

			        $account = new account;

			        $account->classid = $request->input('class');
			        if(!empty($request->input('acctype')) && !empty($request->input('accname')) && !empty($request->input('accno')) && !empty($request->input('bank'))){
			        		$account->accounttype = $request->input('acctype');
					        $account->accountname = $request->input('accname');
					        $account->accountnumber = $request->input('accno');
					        $account->bank = $request->input('bank');
					        $account->paymentstatus = 'Pending';
					        $account->infostatus = $request->input('infostatus');
			        	}
			        else{
			        	$account->paymentstatus = 'Not Payed';
			        }
			        $account->status = 'Active';
			        $account->time = date('h:i:s');//time();
			        $account->d = date('d');
			        $account->m = date('M');
			        $account->y = date('y');

			        if(count($session) > 0){
		                foreach($session as $sec){
		                    if(count($term) > 0){
		                        foreach($term as $ter){
		                            $account->session = $sec->id;
		                            $account->term = $ter->id;
		                        }
		                    }else{
		                        return back()->with('error', 'term is to be added first!');
		                    }
		                }
		            }else{
		                return back()->with('error', 'Session and term are to be added first!');
		            }

			        $account->save();

			        $result = new result;
			        $result->classid = $request->input('class');
			        $result->status = 'Active';
			        $result->time = date('h:i:s');//time();
			        $result->d = date('d');
			        $result->m = date('M');
			        $result->y = date('y');

			        if(count($session) > 0){
		                foreach($session as $sec){
		                    if(count($term) > 0){
		                        foreach($term as $ter){
		                            $result->session = $sec->id;
		                            $result->term = $ter->id;
		                        }
		                    }else{
		                        return back()->with('error', 'term is to be added first!');
		                    }
		                }
		            }else{
		                return back()->with('error', 'Session and term are to be added first!');
		            }

			        $result->save();

			        $student = new student;
			        
			        
			        if (!empty($request->file('profilepics'))) { 

			        	$image_ext = $request->file('profilepics')->getCLientOriginalExtension();

			            $student->profilepics =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

			            $request->file('profilepics')->move(
			            	storage_path().'/app/public/image/student/', $student->profilepics 
			        	);
			        }

			        

			        
			        $student->firstname = $request->input('firstName');
			        $student->othernames = $request->input('otherName');
			        $student->livewith = $request->input('livewith');
			        if(!empty($request->input('fatherName')) && !empty($request->input('motherName'))){
			        	$student->fname = $request->input('fatherName');
			        	$student->mname = $request->input('motherName');
			        }else{
			        	$student->fname = $request->input('guidianName');
			        	$student->mname = $request->input('guidianName2');
			        }
			        $student->username = $request->input('username');
			        $student->dob = $request->input('dob');
			        $student->password = bcrypt($request->input('password'));
			        $student->email = $request->input('email');
			        $student->phoneno1 = $request->input('phoneno1');
			        $student->phoneno2 = $request->input('phoneno2');
			        $student->moreinfo = $request->input('moreinfo');
			        $student->address = $request->input('address');
			        $student->address2 = $request->input('address2');
			        $student->position = $request->input('position');
			        $student->category = $request->input('category');
			        $student->country = $request->input('country');
			        $student->state = $request->input('state');
			        $student->zipcode = $request->input('zip');
			        $student->studenttype = $request->input('studenttype');
			        $student->lga = $request->input('lga');
			        $student->hobby = $request->input('hobby');
			        $student->religion = $request->input('religion');
			        $student->disability = $request->input('disable');
			        $student->sport = $request->input('sport');
			        $student->branch = $request->input('branch');
			        $student->sex = $request->input('sex');
			        $student->admission_no = rand(111, 999);
			        //$student->paymentid = $accid;
			        //$student->resultid = $resid;
			        //$student->classid = $request->input('class');
			        $student->remember_token = rand(111111111, 999999999);
			        $student->status = 'Active';
			        $student->time = date('h:i:s');//time();
			        $student->d = date('d');
			        $student->m = date('M');
			        $student->y = date('y');

			        if(count($session) > 0){
		                foreach($session as $sec){
		                    if(count($term) > 0){
		                        foreach($term as $ter){
		                            $student->session = $sec->id;
		                            $student->term = $ter->id;
		                        }
		                    }else{
		                        return back()->with('error', 'term is to be added first!');
		                    }
		                }
		            }else{
		                return back()->with('error', 'Session and term are to be added first!');
		            }

			        $student->save();

			        $id = $student->id;

			        $ac = account::where('id', '=', $account->id)->update(['studentid' => $id]);
			        $re = result::where('id', '=', $result->id)->update(['studentid' => $id]);

			        $account->save();

			        if($request->input('studenttype') == 'Boarding'){
				        $hostel_list = new hostel_list;
				        $hostel_list->hostelid = $request->input('hostel');
				        $hostel_list->classid = $request->input('class');
				        $hostel_list->userid = $student->id;
				        $hostel_list->user_category = 'Student';
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


			        return back()->with('success', ' Student added successfully');
			    }
			}else{
                return redirect()->route('staff_student.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
                $student = student::find($id);
		        $hostels = hostel::all()->where('status', 'Active');
		        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('userid', $id)->where('user_category', '=', 'Student');
		        $session = session::all()->where('status', 'Active');
		        $term = term::all()->where('status', 'Active');
		        $branches = branch::all()->where('status', 'Active');
		        $account = account::all()->where('studentid', $id)->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $class = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $result = result::all()->where('studentid', $id)->where('status', 'Active')->sortBy('created_at', 0, 'desc');
		        $message = message::all()->where('sender', $id)->where('scat', 'student')->where('status', 'Active')->sortBy('created_at', 0, 'desc');

	            return view('staff/student/view')
	            	->with('hostels', $hostels)
		        	->with('hostel_lists', $hostel_lists)
		            ->with('student', $student)
		            ->with('class', $class)
		            ->with('account', $account)
		            ->with('result', $result)
		            ->with('session', $session)
		            ->with('term', $term)
		            ->with('branches', $branches)
		            ->with('message', $message)
		            ->with('id', $id);
            }else{
                $classes = clas::all()->where('teacher', Auth::guard('staff')->user()->id);
                if(count($classes) > 0){
                    $student = student::find($id);
			        $hostels = hostel::all()->where('status', 'Active');
			        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('userid', $id)->where('user_category', '=', 'Student');
			        $session = session::all()->where('status', 'Active');
			        $term = term::all()->where('status', 'Active');
			        $branches = branch::all()->where('status', 'Active');
			        $account = account::all()->where('studentid', $id)->where('status', 'Active')->sortBy('created_at', 0, 'desc');
			        $class = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
			        $result = result::all()->where('studentid', $id)->where('status', 'Active')->sortBy('created_at', 0, 'desc');
			        $message = message::all()->where('sender', $id)->where('scat', 'student')->where('status', 'Active')->sortBy('created_at', 0, 'desc');

		            return view('staff/student/view')
		            	->with('hostels', $hostels)
			        	->with('hostel_lists', $hostel_lists)
			            ->with('student', $student)
			            ->with('class', $class)
			            ->with('account', $account)
			            ->with('result', $result)
			            ->with('session', $session)
			            ->with('term', $term)
			            ->with('branches', $branches)
			            ->with('message', $message)
			            ->with('id', $id);
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }

            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    public function edit($id)
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
		        $student = student::find($id);
		        $hostels = hostel::all()->where('status', 'Active');
		        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('userid', $id)->where('user_category', '=', 'Student');
		        $branches = branch::all()->where('status', 'Active');
		        $classes = clas::all()->where('status', 'Active');
		        $session = session::all()->where('status', 'Active')->where('category', 'Open');
		        $term = term::all()->where('status', 'Active')->where('category', 'Open');
		        if(count($session) > 0){
		            foreach($session as $sec){
		                if(count($term) > 0){
		                    foreach($term as $ter){
		                        $accounts = account::all()->where('studentid', $id)->where('session', $sec->id)->where('term', $ter->id)->where('status', 'Active');
		                         $results = result::all()->where('studentid', $id)->where('session', $sec->id)->where('term', $ter->id)->where('status', 'Active');
		                    }
		                }else{
		                    $accounts = account::all()->where('studentid', $id)->where('status', 'Active');
		                }
		            }
		        }else{
		            $accounts = account::all()->where('studentid', $id)->where('status', 'Active');
		        }

			    return view('staff/student/edit')
			    	->with('hostels', $hostels)
			    	->with('hostel_lists', $hostel_lists)
			    	->with('student', $student)
			    	->with('classes', $classes)
			    	->with('accounts', $accounts)
			    	->with('results', $results)
			    	->with('branches', $branches)
			    	->with('id', $id);
			}else{
                return redirect()->route('staff_student.index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function resetPass(Request $request, $id)
    {
    	if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
                $student = student::find($id);

		        $student->password = bcrypt($request->input('pass'));

		        $student->save();

	        return response()->json(['success' => 'Sucessful']);
            }else{
                $classes = clas::all()->where('teacher', Auth::guard('staff')->user()->id);
                if(count($classes) > 0){
                    $student = student::find($id);

			        $student->password = bcrypt($request->input('pass'));

			        $student->save();

			        return response()->json(['success' => 'Sucessful']);
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
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
	            $student = student::find($id);
		        $studs = student::all()->where('username', $request->input('username'));
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

			        $account = account::find($request->input('acid'));

			        $account->classid = $request->input('class');
			        if(!empty($request->input('acctype')) && !empty($request->input('accname')) && !empty($request->input('accno')) && !empty($request->input('bank'))){
			        		$account->accounttype = $request->input('acctype');
					        $account->accountname = $request->input('accname');
					        $account->accountnumber = $request->input('accno');
					        $account->bank = $request->input('bank');
					        $account->paymentstatus = 'Pending';
					        $account->infostatus = $request->input('infostatus');
			        	}
			        else{
			        	$account->paymentstatus = 'Not Payed';
			        }

			        $account->save();

			        $result = result::find($request->input('resid'));
			        $result->classid = $request->input('class');
			        $result->save();

			        $acc = account::all()->where('id', '=', $request->input('acid'));
			        foreach($acc as $accnt){
			            $accid = $accnt->id;
			        }
			        $res = result::all()->where('id', '=', $request->input('resid'));
			        foreach($res as $resnt){
			            $resid = $resnt->id;
			        }
			        
			        
			        if (!empty($request->file('profilepics'))) { 

			        	$image_ext = $request->file('profilepics')->getCLientOriginalExtension();

			            $student->profilepics =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

			            $request->file('profilepics')->move(
			            	storage_path().'/app/public/image/student/', $student->profilepics 
			        	);
			        }
			        
			        $student->firstname = $request->input('firstName');
			        $student->othernames = $request->input('otherName');
			        $student->livewith = $request->input('livewith');
			        if(!empty($request->input('fatherName')) && !empty($request->input('motherName'))){
			        	$student->fname = $request->input('fatherName');
			        	$student->mname = $request->input('motherName');
			        }else{
			        	$student->fname = $request->input('guidianName');
			        	$student->mname = $request->input('guidianName2');
			        }
			        $student->username = $request->input('username');
			        $student->dob = $request->input('dob');
			        $student->password = bcrypt($request->input('password'));
			        $student->email = $request->input('email');
			        $student->phoneno1 = $request->input('phoneno1');
			        $student->phoneno2 = $request->input('phoneno2');
			        $student->moreinfo = $request->input('moreinfo');
			        $student->address = $request->input('address');
			        $student->address2 = $request->input('address2');
			        $student->position = $request->input('position');
			        $student->category = $request->input('category');
			        $student->country = $request->input('country');
			        $student->state = $request->input('state');
			        $student->zipcode = $request->input('zip');
			        $student->studenttype = $request->input('studenttype');
			        $student->lga = $request->input('lga');
			        $student->hobby = $request->input('hobby');
			        $student->religion = $request->input('religion');
			        $student->disability = $request->input('disable');
			        $student->sport = $request->input('sport');
			        $student->branch = $request->input('branch');
			        $student->sex = $request->input('sex');
			        //$student->paymentid = $accid;
			        //$student->resultid = $resid;
			        //$student->classid = $request->input('class');
			        $student->remember_token = rand(111111111, 999999999);

			        $student->save();

			        $not = student::all()->where('id', '=', $id);
			        foreach($not as $nt){
			            $id = $nt->id;
			            //$account->name = $not->firstname.' '.$not->othernames;
			        }

			        $ac = account::where('id', '=', $accid)->update(['studentid' => $id]);
			        $re = result::where('id', '=', $resid)->update(['studentid' => $id]);

			        $account->save();

			        $session = session::all()->where('status', 'Active')->where('category', 'Open');
		        	$term = term::all()->where('status', 'Active')->where('category', 'Open');

		        	if($request->input('studenttype') == 'Boarding'){
				        if(count($session) > 0){
			                foreach($session as $sec){
			                    if(count($term) > 0){
			                        foreach($term as $ter){
			                            $hostel_lists = hostel_list::all()->where('userid', $id)->where('user_category', '=', 'Student');
			                           	if(count($hostel_lists) > 0){
			                				foreach($hostel_lists as $hostel_list){
										        $hostel_list->hostelid = $request->input('hostel');
										        $hostel_list->classid = $request->input('class');
										        $hostel_list->userid = $student->id;
										        $hostel_list->user_category = 'Student';
										        $hostel_list->room = $request->input('room');
										        $hostel_list->save();
										    }
										}else{
											$hostel_list = new hostel_list;
									        $hostel_list->hostelid = $request->input('hostel');
									        $hostel_list->classid = $request->input('class');
									        $hostel_list->userid = $student->id;
									        $hostel_list->user_category = 'Student';
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

			        return back()->with('success', ' Student Data Updated successfully');
			    }
			}else{
                return redirect()->route('staff_student.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->student == Auth::guard('staff')->user()->id){
	            $stu = student::find($id);
		    	$st = student::where('id', '=', $id)->update(['status' => 'Deleted']);
		        $ac = account::where('studentid', '=', $id)->update(['status' => 'Deleted']);
			    $re = result::where('studentid', '=', $id)->update(['status' => 'Deleted']);
			    $hl = hostel_list::where('userid', '=', $id)->where('user_category', '=', 'Student')->update(['status' => 'Deleted']);

			    return back()->with('success', ' Student Data Deleted successfully');
			}else{
                return redirect()->route('staff_student.index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
