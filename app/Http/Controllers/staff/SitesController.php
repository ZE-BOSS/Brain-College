<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\session;
use App\Model\term;
use Auth; 
use App\Model\staff;
use App\Model\clas;
use App\Model\payment;
use App\Model\message;
use App\Model\result;
use App\Model\branch;
use App\Model\hostel;
use App\Model\hostel_list;

class SitesController extends Controller
{
    function index()
    {
        if(Auth::guard('staff')->check()){
            return redirect()->route('staff_index');
        }else{
            return view('staff/login');
        }
    }

    public function __construct()     
    { 
        $this->middleware('guest:staff', ['except' => ['staff.logout'], ['/']]);
    }

    function login(Request $request)
    {
     //return true;
        $this->validate($request, [
          'username'   => 'required',
          'password'  => 'required'
        ]);

        if(Auth::guard('staff')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('staff_index'));
        }

        return redirect()->back()
            ->withInput($request->only('username', 'remember'))
            ->with('error', 'Wrong login Details!');
    }

    function logout()
    {
        Auth::guard('staff')->logout();
        return redirect()->route('staff_login');
    }

    public function getDashboard(Request $request)
    {
        if(Auth::guard('staff')->check()){
            $staff = staff::find(Auth::guard('staff')->user()->id);
            $hostels = hostel::all()->where('status', 'Active');
            $hostel_lists = hostel_list::all()->where('status', 'Active')->where('userid', Auth::guard('staff')->user()->id)->where('user_category', '=', 'Staff');
            $session = session::all()->where('status', 'Active');
            $branches = branch::all()->where('status', 'Active');
            $term = term::all()->where('status', 'Active');
            $class = clas::all()->where('status', 'Active');
            $payment = payment::where('staffid', Auth::guard('staff')->user()->id)->where('status', 'Active')->orderBy('id', 'desc')->take(1)->get();
            $pays = payment::all()->where('staffid', Auth::guard('staff')->user()->id)->where('status', 'Active')->sortBy('created_at', 0, 'desc');
            $message = message::all()->where('sender', Auth::guard('staff')->user()->id)->where('scat', 'staff')->where('status', 'Active');
            $id = Auth::guard('staff')->user()->id;

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
            return redirect()->route('staff_login');
        }
    }
}
