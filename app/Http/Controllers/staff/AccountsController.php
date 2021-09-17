<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\clas;
use App\Model\staff;
use App\Model\student;
use App\Model\payment;
use App\Model\account;
use App\Model\session;
use App\Model\term;
use App\Model\pay;
use App\Model\payed;
use App\Model\allocate;
use Auth;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->account == Auth::guard('staff')->user()->id){
		        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
		        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
		        $classes = clas::all()->where('status', 'Active')->sortBy('name', 0, 'desc');
		        $students = student::all()->where('status', 'Active');
		        $staffs = staff::all()->where('status', 'Active');
		        $payments = payment::all()->where('status', 'Active');
		        $pays = pay::all()->where('status', 'Active');
		        $payeds = payed::all()->where('status', 'Active');
		        $accounts = account::all()->where('status', 'Active');
		        if(count($accounts) > 0){
		            foreach($accounts as $acc){
		                $id = $acc->id;
		            }
		        }else{
		            $id = '';
		        }

	        	return view('staff/account/account')
	                ->with('classes', $classes)
	                ->with('students', $students)
	                ->with('staffs', $staffs)
	                ->with('payments', $payments)
	                ->with('pays', $pays)
	                ->with('payeds', $payeds)
	                ->with('accounts', $accounts)
	                ->with('session', $session)
	                ->with('term', $term)
	                ->with('id', $id);
	        }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff(Request $request)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->account == Auth::guard('staff')->user()->id){
		        $payment = payment::find($request->input('staff_id'));
		        $payment->to_pay = $request->input('amount_to_pay');
		        $payment->payed = $request->input('amount_payed');
		        $payment->save();
        	}else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index');
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
    	if(Auth::guard('staff')->check()){
    		$allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->account == Auth::guard('staff')->user()->id){
		        $payeds = payed::all()->where('payid', $request->input('pay'))->where('studentid', $request->input('student'))->where('classid', $request->input('clas'))->where('status', 'Active');

		        //echo($account);
		        if(count($payeds) > 0){
		            foreach ($payeds as $payed) {
		                $payed->amount_payed = $request->input('payment');
		                $payed->save();
		            }
		        }else{
		            $payed = new payed;
		            $payed->payid = $request->input('pay');
		            $payed->studentid = $request->input('student');
		            $payed->classid = $request->input('clas');
		            $payed->amount_payed = $request->input('payment');

		            $session = session::all()->where('status', 'Active')->where('category', 'Open');
		            $term = term::all()->where('status', 'Active')->where('category', 'Open');

		            if(count($session) > 0){
		                foreach($session as $sec){
		                    if(count($term) > 0){
		                        foreach($term as $ter){
		                            $payed->session = $sec->id;
		                            $payed->term = $ter->id;
		                        }
		                    }else{
		                        return back()->with('error', 'term is to be added first!');
		                    }
		                }
		            }else{
		                return back()->with('error', 'Session and term are to be added first!');
		            }
		            $payed->d = date('d');
		            $payed->m = date('m');
		            $payed->y = date('y');
		            $payed->status = 'Active';
		            $payed->save();
		        }
		    }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index');
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
    	
    }
}
