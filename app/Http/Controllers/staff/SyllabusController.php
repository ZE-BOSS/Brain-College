<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\student;
use App\Model\syllabus;
use App\Model\syll_list;
use App\Model\staff;
use App\Model\clas;
use App\Model\subject;
use App\Model\session;
use App\Model\term;
use App\Model\demo;
use App\Model\allocate;
use Auth;

class SyllabusController extends Controller
{
    public function index()
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                
                $syllabi = syllabus::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                $syll_lists = syll_list::all()->where('status', 'Active');
                if(count($syllabi) > 0){
                    foreach($syllabi as $syllabus){
                        $id = $syllabus->id;
                    }
                }else{
                    $id = '';
                }
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/syllabus/syllabus')
                	->with('syllabi', $syllabi)
                    ->with('syll_lists', $syll_lists)
                	->with('students', $students)
                	->with('staffs', $staffs)
                	->with('subjects', $subjects)
                	->with('classes', $classes)
                    ->with('session', $session)
                    ->with('term', $term)
                	->with('id', $id);
            }else{
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($subjects) > 0){
                    $news = collect([]);
                    foreach ($subjects as $subject) {
                        $syllabi = syllabus::all()->where('subjectid', $subject->id)->where('status', 'Active');
                        if(count($syllabi) > 0){
                            $files = collect([]);
                            foreach($syllabi as $syllabus){
                                $id = $syllabus->id;
                                $news->add($syllabus);
                            }
                        }else{
                            $id = '';
                        }
                        
                    }
                    $syll_lists = syll_list::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                    $syllabi = $news;

                    return view('staff/syllabus/syllabus')
                        ->with('syllabi', $syllabi)
                        ->with('syll_lists', $syll_lists)
                        ->with('students', $students)
                        ->with('staffs', $staffs)
                        ->with('subjects', $subjects)
                        ->with('classes', $classes)
                        ->with('session', $session)
                        ->with('term', $term)
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
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
        
                $session = session::where('status', 'Active')->where('category', 'Closed')->orderBy('id', 'desc')->take(1)->get();
                $termo = term::where('status', 'Active')->where('category', 'open')->orderBy('id', 'desc')->take(1)->get();

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($termo) > 0){
                            foreach($termo as $tero){
                                $term = term::all()->where('status', 'Active')->where('category', 'Closed')->where('session', $sec->id)->where('name', $tero->name);
                                if(count($term) > 0){
                                    foreach($term as $ter){
                                            $sname = $sec->name;
                                            $tname = $ter->name;
                                    }   
                                }else{
                                    $sname = '';
                                    $tname = ''; 
                                }
                            }
                        }else{
                           $sname = $sec->name;
                           $tname = ''; 
                        }
                    }
                }else{
                    $sname = '';
                    $tname = ''; 
                }
                $syllabi = syllabus::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                if(count($syllabi) > 0){
                    foreach($syllabi as $syllabus){
                        $id = $syllabus->id;
                    }
                }else{
                    $id = '';
                }
                //$syll_lists = syll_list::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/syllabus/create')
                	->with('syllabi', $syllabi)
                    //->with('syll_lists', $syll_lists)
                	->with('students', $students)
                	->with('staffs', $staffs)
                	->with('subjects', $subjects)
                	->with('classes', $classes)
                    ->with('sname', $sname)
                    ->with('tname', $tname)
                	->with('id', $id);
            }else{
                $session = session::where('status', 'Active')->where('category', 'Closed')->orderBy('id', 'desc')->take(1)->get();
                $termo = term::where('status', 'Active')->where('category', 'open')->orderBy('id', 'desc')->take(1)->get();

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($termo) > 0){
                            foreach($termo as $tero){
                                $term = term::all()->where('status', 'Active')->where('category', 'Closed')->where('session', $sec->id)->where('name', $tero->name);
                                if(count($term) > 0){
                                    foreach($term as $ter){
                                            $sname = $sec->name;
                                            $tname = $ter->name;
                                    }   
                                }else{
                                    $sname = '';
                                    $tname = ''; 
                                }
                            }
                        }else{
                           $sname = $sec->name;
                           $tname = ''; 
                        }
                    }
                }else{
                    $sname = '';
                    $tname = ''; 
                }
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $classes = clas::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($subjects) > 0){
                    $news = collect([]);
                    foreach ($subjects as $subject) {
                        $syllabi = syllabus::all()->where('subjectid', $subject->id)->where('status', 'Active');
                        if(count($syllabi) > 0){
                            $files = collect([]);
                            foreach($syllabi as $syllabus){
                                $id = $syllabus->id;
                                $news->add($syllabus);
                            }
                        }else{
                            $id = '';
                        }
                        
                    }

                    $syllabi = $news;

                    return view('staff/syllabus/create')
                        ->with('syllabi', $syllabi)
                        //->with('syll_lists', $syll_lists)
                        ->with('students', $students)
                        ->with('staffs', $staffs)
                        ->with('subjects', $subjects)
                        ->with('classes', $classes)
                        ->with('sname', $sname)
                        ->with('tname', $tname)
                        ->with('id', $id);
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function show($id)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                $syllabus = syllabus::find($id);
                $syll_lists = syll_list::all()->where('syllid', $id);
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $classes = clas::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');

                return view('staff/syllabus/view')
                    ->with('syllabus', $syllabus)
                    ->with('syll_lists', $syll_lists)
                    ->with('classes', $classes)
                    ->with('subjects', $subjects)
                    ->with('term', $term)
                    ->with('session', $session)
                    ->with('id', $id);
            }else{
                $syllabus = syllabus::find($id);
                $syll_lists = syll_list::all()->where('syllid', $id);
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($subjects) > 0){
                    foreach ($subjects as $subject) {
                        if($syllabus->subjectid == $subject->id){
                            return view('staff/syllabus/view')
                                ->with('syllabus', $syllabus)
                                ->with('syll_lists', $syll_lists)
                                ->with('classes', $classes)
                                ->with('subjects', $subjects)
                                ->with('term', $term)
                                ->with('session', $session)
                                ->with('id', $id);
                        }
                    }
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function getTopic()
    {

        if(Auth::guard('staff')->check()){
            function topic(){
            	$demo = demo::find(1);
            	$i = $demo->newsyll;//$request->input('number');
            	$j = 0;
            	//echo $i.' and '.$j;
            	while($j < $i) {
            		echo'
    		        	<div class="col-md-12">
                            <label for="topic">Topic</label>
                            <input type="text" class="form-control" name="topic'.$j.'" placeholder="Topic"><br>
                            <label for="topic">Sub Topics</label>
                            <textarea class="col-md-12 mb-3" name="subtopic'.$j.'" placeholder="Enter sub topic here..."></textarea>
                            <div class="invalid-feedback">
                                Sub Topic is required.
                            </div>                             
                        </div>
    		        ';
    		        $j++;
            	}
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                topic();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    topic();
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function getList($id)
    {

        if(Auth::guard('staff')->check()){
            function listz(){
                $syll_lists = syll_list::all()->where('syllid', $id);
                //echo $i.' and '.$j;
                if(count($syll_lists) > 0){
                    $i = 0;
                    foreach($syll_lists as $syll_list) {
                        echo'
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-11">
                                        <label for="topic">Topic</label>
                                        <input type="text" class="form-control" name="topic'.$i.'" value="'.$syll_list->topic.'" placeholder="Topic"><br>
                                        <label for="topic">Sub Topics</label>
                                        <textarea class="col-md-12 mb-3" name="subtopic'.$i.'" placeholder="Enter sub topic here...">'.$syll_list->subtopic.'</textarea>
                                        <div class="invalid-feedback">
                                            Sub Topic is required.
                                        </div>                             
                                    </div>
                                    <div class="col-md-1" style="margin-top: 100px;">
                                        <a href="#" id="remove_syll'.$i.'"><i class="fas fa-window-close" style="color: red;"></i></a>
                                    </div>
                                </div>
                            </div>
                        ';
                        $i++;
                    }
                    $demo = demo::find(1);
                    $i = $demo->newsyll;//$request->input('number');
                    $j = 0;
                    //echo $i.' and '.$j;
                    while($j < $i) {
                        echo'
                            <div class="col-md-12">
                                <label for="topic">Topic</label>
                                <input type="text" class="form-control" name="topic'.$j.'" placeholder="Topic"><br>
                                <label for="topic">Sub Topics</label>
                                <textarea class="col-md-12 mb-3" name="subtopic'.$j.'" placeholder="Enter sub topic here..."></textarea>
                                <div class="invalid-feedback">
                                    Sub Topic is required.
                                </div>                             
                            </div>
                        ';
                        $j++;
                    }
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                listz();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    listz();
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function SetList(Request $request, $id)
    {

        if(Auth::guard('staff')->check()){
            function slist(){
                $syll_lists = syll_list::all()->where('syllid', $id);
                $input = $request->input('number') - count($syll_lists);
                $demos = demo::all()->where('id', 1);
                if(count($demos) > 0){
                    $demo = demo::where('id', 1)->update(['newsyll' => $input]);
                }else{
                    $demo = new demo;
                    $demo->newsyll = $input;
                    $demo->save();
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                slist();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    slist();
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function RemoveList($id)
    {

        if(Auth::guard('staff')->check()){
            function remove(){
                $syll_list = syll_list::find($id);
                $syll_list->delete();
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                remove();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    remove();
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function SetTopic(Request $request)
    {

        if(Auth::guard('staff')->check()){
            function stopic(){
            	$input = $request->input('number');
            	$demos = demo::all()->where('id', 1);
    			if(count($demos) > 0){
    				$demo = demo::where('id', 1)->update(['newsyll' => $input]);
    			}else{
    				$demo = new demo;
    				$demo->newsyll = $input;
    				$demo->save();
    			}
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                stopic();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    stopic();
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function store(Request $request)
    {

        if(Auth::guard('staff')->check()){
            function add($request){
                $request->validate([
                    'subject' => 'required',
                    'class' => 'required'
                ]);

                $syll_check = syllabus::all()->where('subjectid', $request->input('subject'))->where('classid', $request->input('class'));

                if(count($syll_check) > 0){
                    return back()->with('error', ' A syllabus has already been created for this class and subject!');
                }else{
                    $syllabus = new syllabus;

                    $syllabus->subjectid = $request->input('subject');
                    $syllabus->classid = $request->input('class');
                    $syllabus->download = $request->input('download');
                    $syllabus->remember_token = rand(111111111, 999999999);
                    $syllabus->status = 'Active';
                    $syllabus->time = date('h:i:s');//time();
                    $syllabus->d = date('d');
                    $syllabus->m = date('m');
                    $syllabus->y = date('y');

                    $session = session::all()->where('status', 'Active')->where('category', 'Open');
                    $term = term::all()->where('status', 'Active')->where('category', 'Open');
                    
                    if(count($session) > 0){
                        foreach($session as $sec){
                            if(count($term) > 0){
                                foreach($term as $ter){
                                    $syllabus->session = $sec->id;
                                    $syllabus->term = $ter->id;
                                }
                            }else{
                                return back()->with('error', 'term is to be added first!');
                            }
                        }
                    }else{
                        return back()->with('error', 'Session and term are to be added first!');
                    }

                    $syllabus->save();

                    $demo = demo::find(1);
                    $i = $demo->newsyll;//$request->input('number');
                    $j = 0;
                    //echo $i.' and '.$j;
                    while($j < $i) {
                        $syll_list = new syll_list;

                        $syll_list->syllid = $syllabus->id;
                        $syll_list->topic = $request->input('topic'.$j);
                        $syll_list->subtopic = $request->input('subtopic'.$j);
                        $syll_list->remember_token = rand(111111111, 999999999);
                        $syll_list->status = 'Active';
                        $syll_list->time = date('h:i:s');//time();
                        $syll_list->d = date('d');
                        $syll_list->m = date('m');
                        $syll_list->y = date('y');

                        $syll_list->save();
                        $j++;
                    }

                    return back()->with('success', ' syllabus added successfully');
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                add();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    add();
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
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                $session = session::where('status', 'Active')->where('category', 'Closed')->orderBy('id', 'desc')->take(1)->get();
                $termo = term::where('status', 'Active')->where('category', 'open')->orderBy('id', 'desc')->take(1)->get();

                if(count($session) > 0){
                    foreach($session as $sec){
                    	if(count($termo) > 0){
        	            	foreach($termo as $tero){
        	            		$term = term::all()->where('status', 'Active')->where('category', 'Closed')->where('session', $sec->id)->where('name', $tero->name);
        		                if(count($term) > 0){
        		                    foreach($term as $ter){
        			                        $sname = $sec->name;
        			        				$tname = $ter->name;
        			        		}	
        	                    }else{
        				            $sname = '';
        				            $tname = ''; 
        				        }
        	                }
                        }else{
                           $sname = $sec->name;
                           $tname = ''; 
                        }
                    }
                }else{
                    $sname = '';
                    $tname = ''; 
                }

                $syll_lists = syll_list::all()->where('syllid', $id);
                $input = 0;
                $demos = demo::all()->where('id', 1);
                if(count($demos) > 0){
                    $demo = demo::where('id', 1)->update(['newsyll' => $input]);
                }else{
                    $demo = new demo;
                    $demo->newsyll = $input;
                    $demo->save();
                }
                
                $syllabus = syllabus::find($id);
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/syllabus/edit')
                	->with('syllabus', $syllabus)
                    ->with('syll_lists', $syll_lists)
                	->with('students', $students)
                	->with('staffs', $staffs)
                	->with('subjects', $subjects)
                	->with('classes', $classes)
    				->with('sname', $sname)
                    ->with('tname', $tname)
                	->with('id', $id);
            }else{
                $session = session::where('status', 'Active')->where('category', 'Closed')->orderBy('id', 'desc')->take(1)->get();
                $termo = term::where('status', 'Active')->where('category', 'open')->orderBy('id', 'desc')->take(1)->get();

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($termo) > 0){
                            foreach($termo as $tero){
                                $term = term::all()->where('status', 'Active')->where('category', 'Closed')->where('session', $sec->id)->where('name', $tero->name);
                                if(count($term) > 0){
                                    foreach($term as $ter){
                                            $sname = $sec->name;
                                            $tname = $ter->name;
                                    }   
                                }else{
                                    $sname = '';
                                    $tname = ''; 
                                }
                            }
                        }else{
                           $sname = $sec->name;
                           $tname = ''; 
                        }
                    }
                }else{
                    $sname = '';
                    $tname = ''; 
                }

                $syll_lists = syll_list::all()->where('syllid', $id);
                $input = 0;
                $demos = demo::all()->where('id', 1);
                if(count($demos) > 0){
                    $demo = demo::where('id', 1)->update(['newsyll' => $input]);
                }else{
                    $demo = new demo;
                    $demo->newsyll = $input;
                    $demo->save();
                }
                
                $syllabus = syllabus::find($id);
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $classes = clas::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($subjects) > 0){

                    return view('staff/syllabus/edit')
                        ->with('syllabus', $syllabus)
                        ->with('syll_lists', $syll_lists)
                        ->with('students', $students)
                        ->with('staffs', $staffs)
                        ->with('subjects', $subjects)
                        ->with('classes', $classes)
                        ->with('sname', $sname)
                        ->with('tname', $tname)
                        ->with('id', $id);
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function print($id)
    {   
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                $syll_lists = syll_list::all()->where('syllid', $id);
                $syllabus = syllabus::find($id);
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/syllabus/print')
                    ->with('syllabus', $syllabus)
                    ->with('syll_lists', $syll_lists)
                    ->with('students', $students)
                    ->with('staffs', $staffs)
                    ->with('subjects', $subjects)
                    ->with('classes', $classes)
                    ->with('id', $id);
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($subjects) > 0){
                    $syll_lists = syll_list::all()->where('syllid', $id);
                    $syllabus = syllabus::find($id);
                    $students = student::all()->where('status', 'Active');
                    $staffs = staff::all()->where('status', 'Active');

                    return view('staff/syllabus/print')
                        ->with('syllabus', $syllabus)
                        ->with('syll_lists', $syll_lists)
                        ->with('students', $students)
                        ->with('staffs', $staffs)
                        ->with('subjects', $subjects)
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

    public function update(Request $request, $id)
    {
        
        if(Auth::guard('staff')->check()){
            function change(){
                $request->validate([
                    'subject' => 'required',
                    'class' => 'required'
                ]);

                $syll_check = syllabus::all()->where('subjectid', $request->input('subject'))->where('classid', $request->input('class'));

                if(count($syll_check) > 1){
                    return back()->with('error', ' A syllabus has already been created for this class and subject!');
                }else{
                    $syllabus = syllabus::find($id);

                    $syllabus->subjectid = $request->input('subject');
                    $syllabus->classid = $request->input('class');
                    $syllabus->download = $request->input('download');
                    $syllabus->remember_token = rand(111111111, 999999999);
                    $syllabus->status = 'Active';
                    $syllabus->time = date('h:i:s');//time();
                    $syllabus->d = date('d');
                    $syllabus->m = date('m');
                    $syllabus->y = date('y');

                    $syllabus->save();

                    $syll_lists = syll_list::all()->where('syllid', $id);
                    //echo $i.' and '.$j;
                    if(count($syll_lists) > 0){
                        $i = 0;
                        foreach($syll_lists as $syll_list) {

                            $syll_list->topic = $request->input('topic'.$i);
                            $syll_list->subtopic = $request->input('subtopic'.$i);

                            $syll_list->save();
                            $i++;
                        }
                        $demo = demo::find(1);
                        $i = $demo->newsyll;//$request->input('number');
                        $j = 0;
                        //echo $i.' and '.$j;
                        while($j < $i) {
                            $syll_list = new syll_list;

                            $syll_list->syllid = $id;
                            $syll_list->topic = $request->input('topic'.$j);
                            $syll_list->subtopic = $request->input('subtopic'.$j);
                            $syll_list->remember_token = rand(111111111, 999999999);
                            $syll_list->status = 'Active';
                            $syll_list->time = date('h:i:s');//time();
                            $syll_list->d = date('d');
                            $syll_list->m = date('m');
                            $syll_list->y = date('y');

                            $syll_list->save();
                            $j++;
                        }
                    }

                    return back()->with('success', ' syllabus added successfully');
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                change();
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    change();
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        } 

    }

    public function destroy($id)
    {   
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->syllabus == Auth::guard('staff')->user()->id){
                $st = syllabus::where('id', '=', $id)->update(['status' => 'Deleted']);
                $sl = syll_list::where('syllid', '=', $id)->update(['status' => 'Deleted']);
                return back()->with('success', 'Syllabus Data Deleted successfully');
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id)->where('status', 'Active');
                if(count($subjects) > 0){
                    $st = syllabus::where('id', '=', $id)->update(['status' => 'Deleted']);
                    $sl = syll_list::where('syllid', '=', $id)->update(['status' => 'Deleted']);
                    return back()->with('success', 'Syllabus Data Deleted successfully');
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
