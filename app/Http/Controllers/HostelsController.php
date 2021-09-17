<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\student;
use App\Model\hostel;
use App\Model\hostel_list;
use App\Model\staff;
use App\Model\clas;
use App\Model\subject;
use App\Model\session;
use App\Model\term;
use Auth;

class HostelsController extends Controller
{
    
    public function index()
    {
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        
        $hostels = hostel::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $hostel_lists = hostel_list::all()->where('status', 'Active'); 
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        if(count($hostels) > 0){
            foreach($hostels as $hostel){
                $id = $hostel->id;
            }
        }else{
            $id = '';
        }
        $classes = clas::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

        if(Auth::guard('admin')->check()){
            return view('admin/hostel/hostel')
            	->with('hostels', $hostels)
            	->with('hostel_lists', $hostel_lists)
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
        $hostels = hostel::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $hostel_lists = hostel_list::all()->where('status', 'Active'); 
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        if(count($hostels) > 0){
            foreach($hostels as $hostel){
                $id = $hostel->id;
            }
        }else{
            $id = '';
        }

        if(Auth::guard('admin')->check()){
            return view('admin/hostel/create')
                ->with('hostels', $hostels)
                ->with('hostel_lists', $hostel_lists)
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
            $cl = hostel::all()->where('name', $request->input('name'));
            if(count($cl) > 0){
                return back()->with('error', 'This hostel already exists!');
            }else{
                $this->validate($request,[
                    'name' => 'required'
                ]);

                $hostel = new hostel;
                
                $hostel->name = $request->input('name');
                $hostel->no_of_rooms = $request->input('nor');
                $hostel->hostel_master = $request->input('hostel_master');
                $hostel->remember_token = rand(111111111, 999999999);
                $hostel->status = 'Active';
                $hostel->time = date('h:i:s');//time();
                $hostel->d = date('d');
                $hostel->m = date('M');
                $hostel->y = date('y');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $hostel->session = $sec->id;
                                $hostel->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $hostel->save();

                $id = $hostel->id;

                return back()->with('success', 'hostel added successfully');
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
        $hostel = hostel::find($id);
        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('hostelid', $id); 
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $students = student::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        $classes = clas::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/hostel/view')
                ->with('hostel', $hostel)
                ->with('hostel_lists', $hostel_lists)
                ->with('students', $students)
                ->with('staffs', $staffs)
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
        $hostel = hostel::find($id);
        $hostel_lists = hostel_list::all()->where('status', 'Active')->where('hostelid', $id); 
        $students = student::all()->where('status', 'Active');
        $subjects = subject::all()->where('status', 'Active');
        $staffs = staff::all()->where('status', 'Active');
        $classes = clas::all()->where('status', 'Active');

        if(Auth::guard('admin')->check()){
            return view('admin/hostel/edit')
                ->with('hostel', $hostel)
                ->with('classes', $classes)
                ->with('staffs', $staffs)
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
        
        if(Auth::guard('admin')->check()){
            $cl = hostel::all()->where('name', $request->input('name'));
            if(count($cl) > 1){
                return back()->with('error', 'This hostel already exists!');
            }else{
                $this->validate($request,[
                    'name' => 'required'
                ]);

                $hostel = hostel::find($id);
                
                $hostel->name = $request->input('name');
                $hostel->no_of_rooms = $request->input('nor');
                $hostel->hostel_master = $request->input('hostel_master');
                $hostel->remember_token = rand(111111111, 999999999);
                $hostel->status = 'Active';
                $hostel->time = date('h:i:s');//time();
                $hostel->d = date('d');
                $hostel->m = date('M');
                $hostel->y = date('y');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');

                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $hostel->session = $sec->id;
                                $hostel->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $hostel->save();

                return back()->with('success', 'hostel added successfully');
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
            $st = hostel::where('id', '=', $id)->update(['status' => 'Deleted']);
            $hl = hostel_list::where('hostelid', '=', $id)->update(['status' => 'Deleted']);
            return back()->with('success', 'hostel Data Deleted successfully');
        }else{
            return redirect()->route('login');
        }
    }
}
