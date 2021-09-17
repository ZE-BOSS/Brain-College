<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\student;
use App\Model\library;
use App\Model\staff;
use App\Model\clas;
use App\Model\subject;
use App\Model\session;
use App\Model\term;
use App\Model\allocate;
use Auth;

class LibrariesController extends Controller
{
    public function index()
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                
                $libraries = library::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                if(count($libraries) > 0){
                    foreach($libraries as $library){
                        $id = $library->id;
                    }
                }else{
                    $id = '';
                }
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/library/library')
                	->with('libraries', $libraries)
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
                $students = student::all()->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id);
                if(count($subjects) > 0){
                    $news = collect([]);
                    foreach ($subjects as $subject) {
                        $libraries = library::all()->where('subject', $subject->id)->where('status', 'Active')->sortBy('id', 0, 'desc');;
                        if(count($libraries) > 0){
                            foreach($libraries as $library){
                                $id = $library->id;
                            }
                        }else{
                            $id = '';
                        }
                        $news->add($library);
                    }
                    $libraries = $news;

                    return view('staff/library/library')
                        ->with('libraries', $libraries)
                        ->with('students', $students)
                        ->with('staff', $staff)
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
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                $libraries = library::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
                $students = student::all()->where('status', 'Active');
                $staffs = staff::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                if(count($libraries) > 0){
                    foreach($libraries as $library){
                        $id = $library->id;
                    }
                }else{
                    $id = '';
                }
                $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/library/create')
                    ->with('libraries', $libraries)
                    ->with('students', $students)
                    ->with('staffs', $staffs)
                    ->with('subjects', $subjects)
                    ->with('classes', $classes)
                    ->with('id', $id);
            }else{
                return redirect()->route('staff_library.index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function store(Request $request)
    {
        if(Auth::guard('staff')->check()){
            function add($request){
                $cl = library::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                if(count($cl) > 0){
                    return back()->with('error', 'This book already exists for this class in the library!');
                }else{
                    $this->validate($request,[
                        'name' => 'required'
                    ]);

                    $library = new library;
                    
                    $library->name = $request->input('name');
                    $library->classid = $request->input('class');
                    $library->subject = $request->input('subject');
                    $library->author = $request->input('author');
                    $library->edition = $request->input('edition');
                    $library->download = $request->input('download');
                    $library->remember_token = rand(111111111, 999999999);
                    $library->status = 'Active';
                    $library->time = date('h:i:s');//time();
                    $library->d = date('d');
                    $library->m = date('M');
                    $library->y = date('y');

                    $session = session::all()->where('status', 'Active')->where('category', 'Open');
                    $term = term::all()->where('status', 'Active')->where('category', 'Open');

                    if(count($session) > 0){
                        foreach($session as $sec){
                            if(count($term) > 0){
                                foreach($term as $ter){
                                    $library->session = $sec->id;
                                    $library->term = $ter->id;
                                }
                            }else{
                                return back()->with('error', 'term is to be added first!');
                            }
                        }
                    }else{
                        return back()->with('error', 'Session and term are to be added first!');
                    }

                    $library->save();

                    $not = library::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                    foreach($not as $nt){
                        $id = $nt->id;
                        //$account->name = $not->firstname.' '.$not->othernames;
                    }

                    return back()->with('success', 'Book added to library successfully');
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                add($request);
                if(session('success')){
                    return back()->with(session('success'));
                }else{
                    return back()->with(session('error'));
                }                
            }else{
                return redirect()->route('staff_library.index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    public function show($id)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                $library = library::find($id);
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $students = student::all()->where('librarysid', $id)->where('status', 'Active');
                $classes = clas::all()->where('id', $library->classid)->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');

                return view('staff/library/view')
                    ->with('library', $library)
                    ->with('students', $students)
                    ->with('classes', $classes)
                    ->with('subjects', $subjects)
                    ->with('term', $term)
                    ->with('session', $session)
                    ->with('id', $id);
            }else{
                $subjects = subject::all()->where('teacher', Auth::guard('staff')->user()->id);
                if(count($subjects) > 0){
                    foreach ($subjects as $subject) {
                        $library = library::find($id);
                        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                        $students = student::all()->where('librarysid', $id)->where('status', 'Active');
                        $classes = clas::all()->where('id', $library->classid)->where('status', 'Active');
                        $subjects = subject::all()->where('status', 'Active');
                    }

                    return view('staff/library/view')
                        ->with('library', $library)
                        ->with('students', $students)
                        ->with('classes', $classes)
                        ->with('subjects', $subjects)
                        ->with('term', $term)
                        ->with('session', $session)
                        ->with('id', $id); 
                }else{
                    return redirect()->route('staff_library.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                $library = library::find($id);
                $students = student::all()->where('status', 'Active');
                $subjects = subject::all()->where('status', 'Active');
                $classes = clas::all()->where('status', 'Active');
                
                return view('staff/library/edit')
                    ->with('library', $library)
                    ->with('classes', $classes)
                    ->with('subjects', $subjects)
                    ->with('id', $id);
            }else{
                return redirect()->route('staff_library.index')->with('error', 'Access Denied');
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
                $library = library::find($id);
                $cl = library::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                if(count($cl) > 1){
                    return back()->with('error', 'This Book already exists for this class in the library!');
                }else{
                    $this->validate($request,[
                        'name' => 'required'
                    ]);
                    
                    $library->name = $request->input('name');
                    $library->classid = $request->input('class');
                    $library->subject = $request->input('subject');
                    $library->author = $request->input('author');
                    $library->edition = $request->input('edition');
                    $library->download = $request->input('download');
                    $library->remember_token = rand(111111111, 999999999);
                    $library->save();

                    $not = library::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                    foreach($not as $nt){
                        $id = $nt->id;
                        //$account->name = $not->firstname.' '.$not->othernames;
                    }

                    return back()->with('success', 'Book Updated in the library successfully');
                }
            }
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                change($request, $id);
                if(session('success')){
                    return back()->with(session('success'));
                }else{
                    return back()->with(session('error'));
                }                
            }else{
                return redirect()->route('staff_library.index')->with('error', 'Access Denied');
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
            if(!empty($allocate) && $allocate->library == Auth::guard('staff')->user()->id){
                $st = library::where('id', '=', $id)->update(['status' => 'Deleted']);
                return back()->with('success', 'Library Data Deleted successfully');                
            }else{
                return redirect()->route('staff_library.index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
