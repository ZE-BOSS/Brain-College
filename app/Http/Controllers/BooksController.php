<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\student;
use App\Model\book;
use App\Model\staff;
use App\Model\clas;
use App\Model\subject;
use App\Model\session;
use App\Model\term;
use Auth; 

class BooksController extends Controller
{
    public function index()
    {
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

        if(Auth::guard('admin')->check()){
            return view('admin/book/book')
            	->with('books', $books)
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
        $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
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

        if(Auth::guard('admin')->check()){
            return view('admin/book/create')
                ->with('books', $books)
                ->with('subjects', $subjects)
                ->with('students', $students)
                ->with('staffs', $staffs)
                ->with('classes', $classes)
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
        if(Auth::guard('admin')->check()){
            $cl = book::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
            if(count($cl) > 0){
                return back()->with('error', 'This book already exists for this class!');
            }else{
                $this->validate($request,[
                    'name' => 'required'
                ]);

                $book = new book;
                
                $book->name = $request->input('name');
                $book->classid = $request->input('class');
                $book->subject = $request->input('subject');
                $book->author = $request->input('author');
                $book->edition = $request->input('edition');
                $book->price = $request->input('price');
                $book->remember_token = rand(111111111, 999999999);
                $book->status = 'Active';
                $book->time = date('h:i:s');//time();
                $book->d = date('d');
                $book->m = date('M');
                $book->y = date('y');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $book->session = $sec->id;
                                $book->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $book->save();

                $not = book::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                foreach($not as $nt){
                    $id = $nt->id;
                    //$account->name = $not->firstname.' '.$not->othernames;
                }

                return back()->with('success', 'Book added successfully');
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
        $book = book::find($id);
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $students = student::all()->where('booksid', $id)->where('status', 'Active');
        $classes = clas::all()->where('id', $book->classid)->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/book/view')
                ->with('book', $book)
                ->with('students', $students)
                ->with('classes', $classes)
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
        $book = book::find($id);
        $students = student::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        $classes = clas::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/book/edit')
                ->with('book', $book)
                ->with('classes', $classes)
                ->with('subjects', $subjects)
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
    	$book = book::find($id);
    	$cl = book::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
        
        if(Auth::guard('admin')->check()){
            if(count($cl) > 1){
                return back()->with('error', 'This book already exists for this class!');
            }else{
                $this->validate($request,[
                    'name' => 'required'
                ]);
                
                $book->name = $request->input('name');
                $book->classid = $request->input('class');
                $book->subject = $request->input('subject');
                $book->author = $request->input('author');
                $book->edition = $request->input('edition');
                $book->price = $request->input('price');
                $book->remember_token = rand(111111111, 999999999);
                $book->save();

                $not = book::all()->where('name', $request->input('name'))->where('classid', $request->input('class'));
                foreach($not as $nt){
                    $id = $nt->id;
                    //$account->name = $not->firstname.' '.$not->othernames;
                }

                return back()->with('success', 'Book added successfully');
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
            $st = book::where('id', '=', $id)->update(['status' => 'Deleted']);
            return back()->with('success', 'Book Data Deleted successfully');
        }else{
            return redirect()->route('login');
        }
    }
}
