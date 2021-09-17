<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\student;
use App\Model\attendance;
use App\Model\account;
use App\Model\attendance_list;
use App\Model\staff;
use App\Model\clas;
use App\Model\demo;
use App\Model\subject;
use App\Model\session;
use App\Model\term;
use Auth; 

class AttendancesController extends Controller
{
    public function index()
    {
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        
        $attendances = attendance::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $attendance_lists = attendance_list::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        if(count($attendances) > 0){
            foreach($attendances as $attendance){
                $id = $attendance->id;
            }
        }else{
            $id = '';
        }
        $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

        if(Auth::guard('admin')->check()){
            return view('admin/attendance/attendance')
            	->with('attendances', $attendances)
                ->with('attendance_lists', $attendance_lists)
            	->with('students', $students)
            	->with('staffs', $staffs)
            	->with('subjects', $subjects)
            	->with('classes', $classes)
                ->with('session', $session)
                ->with('term', $term)
            	->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function getCreate()
    {
        $attendance_lists = attendance_list::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $attendances = attendance::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        if(count($attendances) > 0){
            foreach($attendances as $attendance){
                $id = $attendance->id;
            }
        }else{
            $id = '';
        }

        if(Auth::guard('admin')->check()){
            return view('admin/attendance/create')
                ->with('attendances', $attendances)
                ->with('subjects', $subjects)
                ->with('students', $students)
                ->with('staffs', $staffs)
                ->with('classes', $classes)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function getStudent(Request $request)
    {

        if(Auth::guard('admin')->check()){
            $students = student::all()->where('status', 'Active');
            $accounts = account::all()->where('status', 'Active');
            $demo = demo::find(1);
            //echo $i.' and '.$j;
            if(count($students) > 0 && count($accounts) > 0){
                foreach($students as $student) {
                    foreach($accounts as $account) {
                        if($account->studentid == $student->id && $account->classid == $demo->newclass){
                            echo'
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="attendance">'.$student->firstname.' '.$student->othernames.'</label>
                                    </div>
                                    <div class="col-md-7 mb-3">
                                        <select class="custom-select d-block w-100" name="attendance'.$student->id.'">
                                            <option selected="selected" disabled>Select...</option>
                                            <option value="Present">Present</option>
                                            <option value="Absent">Absent</option>
                                        </select>
                                    </div>
                                </div>
                            ';
                        }
                    }
                }
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function setStudent(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $input = $request->input('input');
            $demos = demo::all()->where('id', 1);
            if(count($demos) > 0){
                $demo = demo::where('id', 1)->update(['newclass' => $input]);
            }else{
                $demo = new demo;
                $demo->newclass = $input;
                $demo->save();
            }
        }else{
            return redirect()->route('login');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $cl = attendance::all()->where('d', date('d'))->where('m', date('M'))->where('y', date('Y'))->where('classid', $request->input('class'))->where('status', 'Active');
            if(count($cl) > 0){
                return back()->with('error', 'Today\'s attendance already exists for this class!');
            }else{
                $this->validate($request,[
                    'class' => 'required'
                ]);

                $attendance = new attendance;
                
                $attendance->classid = $request->input('class');
                $attendance->remember_token = rand(111111111, 999999999);
                $attendance->status = 'Active';
                $attendance->time = date('h:i:s');//time();
                $attendance->d = date('d');
                $attendance->m = date('M');
                $attendance->y = date('Y');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $attendance->session = $sec->id;
                                $attendance->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $attendance->save();


                $students = student::all()->where('status', 'Active');

                if(count($students) > 0){
                    foreach($students as $student){
                        if(count($session) > 0){
                            foreach($session as $sec){
                                if(count($term) > 0){
                                    foreach($term as $ter){
                                        $accounts = account::all()->where('status', 'Active')->where('studentid', $student->id)->where('session', $sec->id)->where('term', $ter->id)->where('classid', $request->input('class'));
                                        if(count($accounts) > 0){   
                                            foreach($accounts as $account){

                                                $attendance_list = new attendance_list;
                                        
                                                $attendance_list->attendanceid = $attendance->id;
                                                $attendance_list->studentid = $student->id;
                                                $attendance_list->attendance = $request->input('attendance'.$student->id);
                                                $attendance_list->remember_token = rand(111111111, 999999999);
                                                $attendance_list->status = 'Active';
                                                $attendance_list->time = date('h:i:s');//time();
                                                $attendance_list->d = date('d');
                                                $attendance_list->m = date('M');
                                                $attendance_list->y = date('y');
                                                $attendance_list->save();
                                                //echo "Save";
                                            }
                                        }else{
                                            return back()->with('error', 'Unable to completely save Attendance!');
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
                }else{
                    return back()->with('error', 'No student has been added!');
                }
                
                $id = $attendance->id;

                return back()->with('success', 'attendance added successfully');
            }
        }else{
            return redirect()->route('login');
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
        $attendance = attendance::find($id);
        $attendance_lists = attendance_list::all()->where('status', 'Active')->where('attendanceid', $id); 
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $students = student::all()->where('status', 'Active');
        $accounts = account::all()->where('status', 'Active');
        $classes = clas::all()->where('id', $attendance->classid)->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/attendance/view')
                ->with('attendance', $attendance)
                ->with('students', $students)
                ->with('accounts', $accounts)
                ->with('classes', $classes)
                ->with('attendance_lists', $attendance_lists)
                ->with('subjects', $subjects)
                ->with('term', $term)
                ->with('session', $session)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function edit($id)
    {
        $attendance = attendance::find($id);
        $students = student::all()->where('status', 'Active');
        $accounts = account::all()->where('status', 'Active');
        $attendance_lists = attendance_list::all()->where('status', 'Active')->where('attendanceid', $id);
        $students = student::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        $classes = clas::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/attendance/edit')
                ->with('attendance', $attendance)
                ->with('classes', $classes)
                ->with('attendance_lists', $attendance_lists)
                ->with('students', $students)
                ->with('accounts', $accounts)
                ->with('subjects', $subjects)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function download($id)
    {
        if(Auth::guard('admin')->check()){
                
        }else{
            return redirect()->route('login');
        }
    }

    public function singleDownload($id)
    {
        $attendance = attendance::find($id);
        $students = student::all()->where('status', 'Active');
        $accounts = account::all()->where('status', 'Active');
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $attendance_lists = attendance_list::all()->where('status', 'Active')->where('attendanceid', $id);
        $students = student::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        $classes = clas::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/attendance/print')
                ->with('attendance', $attendance)
                ->with('classes', $classes)
                ->with('attendance_lists', $attendance_lists)
                ->with('students', $students)
                ->with('accounts', $accounts)
                ->with('subjects', $subjects)
                ->with('term', $term)
                ->with('session', $session)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
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
        if(Auth::guard('admin')->check()){
            $cl = attendance::all()->where('d', date('d'))->where('m', date('M'))->where('y', date('Y'))->where('classid', $request->input('class'))->where('status', 'Active');
            if(count($cl) > 1){
                return back()->with('error', 'This attendance already exists for this class!');
            }else{
                $this->validate($request,[
                    'class' => 'required'
                ]);

                $attendance = attendance::find($id);
                
                //$attendance->classid = $request->input('class');
                $attendance->remember_token = rand(111111111, 999999999);
                $attendance->status = 'Active';

                $attendance->save();


                $attendance_lists = attendance_list::all()->where('attendanceid', $id);
                if(count($attendance_lists) > 0){
                    foreach($attendance_lists as $attendance_list){
                        if($request->input('student') == $attendance_list->studentid){
                            $attendance_list->attendance = $request->input('attendance'.$request->input('student'));
                            $attendance_list->remember_token = rand(111111111, 999999999);
                            $attendance_list->status = 'Active';
                            $attendance_list->save();
                        }
                    }
                }else{
                    $session = session::all()->where('status', 'Active')->where('category', 'Open');
                    $term = term::all()->where('status', 'Active')->where('category', 'Open');
                    $students = student::all()->where('status', 'Active');

                    if(count($students) > 0){
                        foreach($students as $student){
                            if(count($session) > 0){
                                foreach($session as $sec){
                                    if(count($term) > 0){
                                        foreach($term as $ter){
                                            $accounts = account::all()->where('status', 'Active')->where('studentid', $request->input('student'))->where('session', $sec->id)->where('term', $ter->id)->where('classid', $request->input('class'));
                                            if(count($accounts) > 0){   
                                                foreach($accounts as $account){
                                                    $attendance_list = new attendance_list;
                                            
                                                    $attendance_list->attendanceid = $id;
                                                    $attendance_list->studentid = $request->input('student');
                                                    $attendance_list->attendance = $request->input('attendance'.$request->input('student'));
                                                    $attendance_list->remember_token = rand(111111111, 999999999);
                                                    $attendance_list->status = 'Active';
                                                    $attendance_list->time = date('h:i:s');//time();
                                                    $attendance_list->d = date('d');
                                                    $attendance_list->m = date('M');
                                                    $attendance_list->y = date('y');
                                                    $attendance_list->save();
                                                }
                                            }else{
                                                return back()->with('error', 'Unable to completely save Attendance!');
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
                    }else{
                        return back()->with('error', 'No student has been added!');
                    }
                }

                return back()->with('success', 'attendance added successfully');
            }
        }else{
            return redirect()->route('login');
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
        if(Auth::guard('admin')->check()){
            $as = attendance::where('id', '=', $id)->update(['status' => 'Deleted']);
            $al = attendance_list::where('attendanceid', '=', $id)->update(['status' => 'Deleted']);
            return back()->with('success', 'attendance Data Deleted successfully');
        }else{
            return redirect()->route('login');
        }
    }
}
