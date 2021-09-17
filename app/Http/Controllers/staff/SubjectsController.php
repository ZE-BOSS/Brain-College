<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\student;
use App\Model\subject;
use App\Model\clas;
use App\Model\staff;
use App\Model\message;
use App\Model\book;
use App\Model\session;
use App\Model\term;
use App\Model\allocate;
use Auth; 

class SubjectsController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                
                $books = book::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                if(count($books) > 0){
                    foreach($books as $book){
                        $id = $book->id;
                    }
                }else{
                    $id = '';
                }
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                //echo Auth::guard('staff')->user()->id;
                return view('staff/subject/subject')
                    ->with('books', $books)
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
                $subjects = subject::all()->where('status', 'Active');
                $staff = staff::find(Auth::guard('staff')->user()->id);
                $staffs = staff::all()->where('status', 'Active');
                $students = student::all()->where('status', 'Active');
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id);
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                if(count($subjects) > 0){
                    $news = collect([]);
                    foreach ($subjects as $subject) {
                        $books = book::all()->where('subject', $subject->id)->where('status', 'Active')->sortBy('id', 0, 'desc');
                        if(count($books) > 0){
                            foreach($books as $book){
                                $id = $book->id;
                            }
                        }else{
                            $id = '';
                        }
                        $news->add($book);
                    }
                    $books = $news;

                    return view('staff/subject/subject')
                        ->with('books', $books)
                        ->with('students', $students)
                        ->with('staff', $staff)
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
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
                $subjects = subject::all()->where('status', 'Active')->sortBy('name', 0, 'desc'); 
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $books = book::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                if(count($subjects) > 0){
                    foreach($subjects as $subject){
                        $id = $subject->id;
                    }
                }else{
                    $id = '';
                }
                $classes = clas::all()->where('status', 'Active')->sortBy('name', 0, 'desc');

                return view('staff/subject/create')
                    ->with('subjects', $subjects)
                    ->with('classes', $classes)
                    ->with('staffs', $staffs)
                    ->with('books', $books)
                    ->with('id', $id);
            }else{
                return redirect()->route('staff_subject.index')->with('error', 'Access Denied');
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
            function add($request){
                $cl = subject::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                if(count($cl) > 0){
                    return back()->with('error', 'This Subject already exists for this class!');
                }else{
                    $this->validate($request,[
                        'name' => 'required'
                    ]);

                    $subject = new subject;
                    
                    $subject->name = $request->input('name');
                    $subject->classid = $request->input('class');
                    $subject->teacher = $request->input('teacher');
                    $subject->remember_token = rand(111111111, 999999999);
                    $subject->status = 'Active';
                    $subject->time = date('h:i:s');//time();
                    $subject->d = date('d');
                    $subject->m = date('M');
                    $subject->y = date('y');

                    $session = session::all()->where('status', 'Active')->where('category', 'Open');
                    $term = term::all()->where('status', 'Active')->where('category', 'Open');
                    
                    if(count($session) > 0){
                        foreach($session as $sec){
                            if(count($term) > 0){
                                foreach($term as $ter){
                                    $subject->session = $sec->id;
                                    $subject->term = $ter->id;
                                }
                            }else{
                                return back()->with('error', 'term is to be added first!');
                            }
                        }
                    }else{
                        return back()->with('error', 'Session and term are to be added first!');
                    }

                    $subject->save();

                    $not = subject::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                    foreach($not as $nt){
                        $id = $nt->id;
                        //$account->name = $not->firstname.' '.$not->othernames;
                    }

                    return back()->with('success', 'subject added successfully');
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
                add($request);
                if(session('success')){
                    return back()->with(session('success'));
                }else{
                    return back()->with(session('error'));
                }                
            }else{
                return redirect()->route('staff_subject.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
                $subject = subject::find($id);
                $staffs = staff::all()->where('id', $subject->teacher)->where('status', 'Active');
                $classes = clas::all()->where('id', $subject->classid)->where('status', 'Active');
                $books = book::all()->where('subject', $subject->id)->where('status', 'Active');
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/subject/view')
                    ->with('subject', $subject)
                    ->with('staffs', $staffs)
                    ->with('classes', $classes)
                    ->with('books', $books)
                    ->with('session', $session)
                    ->with('term', $term)
                    ->with('id', $id);
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id);
                if(count($subjects) > 0){
                    foreach ($subjects as $sub) {
                        if($sub->id == $id){
                            $subject = subject::find($id);
                            $staffs = staff::all()->where('id', $subject->teacher)->where('status', 'Active');
                            $classes = clas::all()->where('id', $subject->classid)->where('status', 'Active');
                            $books = book::all()->where('subject', $subject->id)->where('status', 'Active');
                            $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                            $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                            return view('staff/subject/view')
                                ->with('subject', $subject)
                                ->with('staffs', $staffs)
                                ->with('classes', $classes)
                                ->with('books', $books)
                                ->with('session', $session)
                                ->with('term', $term)
                                ->with('id', $id);
                        }
                    }
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
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){    
                $subject = subject::find($id);
                $staffs = staff::all()->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active');

                return view('staff/subject/edit')
                    ->with('subject', $subject)
                    ->with('classes', $classes)
                    ->with('staffs', $staffs)
                    ->with('id', $id);            
            }else{
                return redirect()->route('staff_subject.index')->with('error', 'Access Denied');
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
            function change($request, $id){
                $subject = subject::find($id);
                $cl = subject::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                if(count($cl) > 1){
                    return back()->with('error', 'This subject already exists for this class!');
                }else{
                    $this->validate($request,[
                        'name' => 'required'
                    ]);
                    
                    $subject->name = $request->input('name');
                    $subject->classid = $request->input('class');
                    $subject->teacher = $request->input('teacher');
                    $subject->remember_token = rand(111111111, 999999999);
                    $subject->save();

                    $not = subject::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                    foreach($not as $nt){
                        $id = $nt->id;
                        //$account->name = $not->firstname.' '.$not->othernames;
                    }

                    return back()->with('success', 'subject added successfully');
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
                change($request, $id);
                if(session('success')){
                    return back()->with(session('success'));
                }else{
                    return back()->with(session('error'));
                }                
            }else{
                return redirect()->route('staff_subject.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->subject == Auth::guard('staff')->user()->id){
                $st = subject::where('id', '=', $id)->update(['status' => 'Deleted']);
                return back()->with('success', 'subject Data Deleted successfully');           
            }else{
                return redirect()->route('staff_subject.index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
