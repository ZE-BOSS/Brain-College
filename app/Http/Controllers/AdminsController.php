<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\session;
use App\Model\term;
use Auth; 
use App\Model\Admin;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('dashboard');
        }else{
            return view('admin/login');
        }
    }

    public function __construct()     
    { 
        $this->middleware('guest:admin', ['except' => ['logout'], ['/']]);
    }

    function login(Request $request)
    {
     //return true;
        $this->validate($request, [
          'username'   => 'required',
          'password'  => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()
            ->withInput($request->only('username', 'remember'))
            ->with('error', 'Wrong Login Details!');
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
    public function getDashboard(Request $request)
    {
        if(!empty($request->input('nav_session'))){
            $sessionv = session::where('category', 'Open');
            $sessionv->update(['view' => $request->input("nav_session")]);

            $session = session::all()->where('status', 'Active')->where('view', $request->input('nav_session'));
        }else{
            $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        }

        if(!empty($request->input('nav_term'))){
            $termv = term::where('category', 'Open');
            $termv->update(['view' => $request->input("nav_term")]);

            $term = term::all()->where('status', 'Active')->where('view', $request->input('nav_term'));
        }else{
            $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        }

        if(count($session) > 0){
            foreach($session as $sec){
                if(count($term) > 0){
                    foreach($term as $ter){
                        if($sec->category == 'Open' && $ter->category == 'Open'){
                            if(!empty($sec->view) && !empty($ter->view)){
                                $tid = $ter->view;
                                $sid = $sec->view;
                            }else{
                                $tid = $ter->id;
                                $sid = $sec->id; 
                            }
                        }else{
                            $tid = $ter->id;
                            $sid = $sec->id;
                        }
                    }
                }else{
                    $tid = '';
                    $sid = $sec->view;
                }
            }
        }else{
            $tid = '';
            $sid = '';
        }
        $id = "";

        if(Auth::guard('admin')->check()){
            return view('admin/dashboard/dashboard')
                ->with('session', $session)
                ->with('term', $term)
                ->with('tid', $tid)
                ->with('sid', $sid)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }
}
