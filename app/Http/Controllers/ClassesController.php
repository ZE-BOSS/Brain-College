<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\student;
use App\Model\clas;
use App\Model\staff;
use App\Model\message;
use App\Model\result;
use App\Model\session;
use App\Model\account;
use App\Model\term;
use Auth; 

class ClassesController extends Controller
{
    public function index(Request $request)
    {
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
    
        $classes = clas::all()->where('status', 'Active')->sortBy('name', 0, 'desc');
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        if(count($classes) > 0){
            foreach($classes as $clas){
                $id = $clas->id;
            }
        }else{
            $id = '';
        } 

        if(Auth::guard('admin')->check()){
            return view('admin/class/class')
                ->with('classes', $classes)
                ->with('students', $students)
                ->with('staffs', $staffs)
                ->with('session', $session)
                ->with('term', $term)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function getCreate()
    {
        $classes = clas::all()->where('status', 'Active')->sortBy('name', 0, 'desc');
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        if(count($classes) > 0){
            foreach($classes as $clas){
                $id = $clas->id;
            }
        }else{
            $id = '';
        } 
        
        if(Auth::guard('admin')->check()){
            return view('admin/class/create')
                ->with('classes', $classes)
                ->with('students', $students)
                ->with('staffs', $staffs)
                ->with('id', $id);
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
        $cl = clas::all()->where('name', $request->input('name'))->where('category', $request->input('category'));
        
        if(Auth::guard('admin')->check()){
            if(count($cl) > 0){
                return back()->with('error', 'This class already exists for this category!');
            }else{
                $this->validate($request,[
                    'name' => 'required',
                    'category' => 'required'
                ]);

                $clas = new clas;
                
                $clas->name = $request->input('name');
                $clas->category = $request->input('category');
                if(!empty($request->input('teacher'))){
                    $clas->teacher = $request->input('teacher');
                }else{
                    $clas->teacher = '';
                }
                if(!empty($request->input('captain'))){
                    $clas->captain = $request->input('captain');
                }else{
                    $clas->captain = '';
                }
                $clas->remember_token = rand(111111111, 999999999);
                $clas->status = 'Active';
                $clas->time = date('h:i:s');//time();
                $clas->d = date('d');
                $clas->m = date('M');
                $clas->y = date('y');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $clas->session = $sec->id;
                                $clas->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $clas->save();

                $not = clas::all()->where('username', '=', $request->input('username'));
                foreach($not as $nt){
                    $id = $nt->id;
                    //$account->name = $not->firstname.' '.$not->othernames;
                }

                return back()->with('success', 'Class added successfully');
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
        $clas = clas::find($id);
        $students = student::all()->where('status', 'Active');
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $staffs = staff::all()->where('status', 'Active');
        $result = result::all()->where('status', 'Active');
        if(count($students) > 0){
            foreach ($students as $student) {
                $accounts = account::all()->where('studentid', $student->id)->where('status', 'Active');
            }
        }else{
            $accounts = account::all()->where('status', 'Active');
        }

        if(Auth::guard('admin')->check()){
            return view('admin/class/view')
                ->with('clas', $clas)
                ->with('students', $students)
                ->with('staffs', $staffs)
                ->with('result', $result)
                ->with('term', $term)
                ->with('session', $session)
                ->with('accounts', $accounts)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }  
    }
    public function edit($id)
    {
    	global $stud;
    	global $stuid;
    	global $stad;
    	global $staid;
        $clas = clas::find($id);
        $students = student::all()->where('status', 'Active');
        if(count($students) > 0){
        	foreach($students as $student){
        		if($clas->captain == $student->id){
        			$stud = $student->firstname.' '.$student->othernames;
        			$stuid = $student->id;
        		}else{
		        	$stud = '';
		        	$stuid = '';
		        }
        	}
        }else{
        	$stud = '';
        	$stuid = '';
        }
        $staffs = staff::all()->where('status', 'Active');
        if(count($staffs) > 0){
        	foreach($staffs as $staff){
        		if($clas->teacher == $staff->id){
        			$stad = $staff->firstname.' '.$staff->othernames;
        			$staid = $staff->id;
        		}else{
		        	$stad = '';
		        	$staid = '';
		        }
        	}
        }else{
        	$stad = '';
        	$staid = '';
        }

        if(Auth::guard('admin')->check()){
            return view('admin/class/edit')
                ->with('clas', $clas)
                ->with('students', $students)
                ->with('stud', $stud)
                ->with('stuid', $stuid)
                ->with('stad', $stad)
                ->with('staid', $staid)
                ->with('staffs', $staffs)
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
    	$clas = clas::find($id);
        $studs = clas::all()->where('name', $request->input('name'))->where('category', $request->input('category'));

        if(Auth::guard('admin')->check()){
            if(count($studs) > 1){
                return back()->with('error', 'This class already exists for this category!');
            }else{
                $this->validate($request,[
                    'name' => 'required',
                    'category' => 'required'
                ]);
                
                $clas->name = $request->input('name');
                $clas->category = $request->input('category');
                if(!empty($request->input('teacher'))){
                    $clas->teacher = $request->input('teacher');
                }else{
                    $clas->teacher = '';
                }
                if(!empty($request->input('captain'))){
                    $clas->captain = $request->input('captain');
                }else{
                    $clas->captain = '';
                }
                $clas->remember_token = rand(111111111, 999999999);

                $clas->save();

                $not = clas::all()->where('username', '=', $request->input('username'));
                foreach($not as $nt){
                    $id = $nt->id;
                    //$account->name = $not->firstname.' '.$not->othernames;
                }

                return back()->with('success', 'Class Updated successfully');
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
            $st = clas::where('id', '=', $id)->update(['status' => 'Deleted']);
            return back()->with('success', 'Class Data Deleted successfully');
        }else{
            return redirect()->route('login');
        }
    }
}
