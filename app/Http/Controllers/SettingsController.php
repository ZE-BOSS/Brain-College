<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\setting;
use App\Model\site;
use App\Model\session;
use App\Model\student;
use App\Model\staff;
use App\Model\book;
use App\Model\clas;
use App\Model\subject;
use App\Model\term;
use App\Model\account;
use App\Model\payment;
use App\Model\result;
use App\Model\pay;
use App\Model\branch;
use App\Model\service;
use App\Model\faq;
use App\Model\allocate;
use Auth; 

class SettingsController extends Controller
{
    public function index()
    {
    	$id = 1;
        $setting = setting::find($id);
        $site = site::find($id);
        $classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $pays = pay::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $staffs = staff::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $students = student::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $payments = payment::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $sessions = session::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $branches = branch::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $terms = term::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $faqs = faq::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $services = service::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $serves = service::all()->where('status', 'Active')->where('category', 'Head')->sortBy('created_at', 0, 'desc');
        $saves = service::all()->where('status', 'Active')->where('category', 'Body')->sortBy('created_at', 0, 'desc');
        $allocate = allocate::find($id);

        $set = setting::all();
    	if (count($set) < 1) {
    		$sett = new setting;
    		$sett->id = 1;
    		if(count($sessions) > 0){
                foreach($sessions as $sec){
                    if(count($terms) > 0){
                        foreach($terms as $ter){
                            $sett->session = $sec->id;
                            $sett->term = $ter->id;
                        }
                    }
                }
            }
    		$sett->save();
    	}
    	if (count($set) > 1) { 
    		$sett = setting::all()->where('id' != 1)->delete();
    	}

    	$sit = site::all();
    	if (count($sit) < 1) {
    		$sitt = new site;
    		$sitt->id = 1;
    		if(count($sessions) > 0){
                foreach($sessions as $sec){
                    if(count($terms) > 0){
                        foreach($terms as $ter){
                            $sitt->session = $sec->id;
                            $sitt->term = $ter->id;
                        }
                    }
                }
            }
    		$sitt->save();
    	}
    	if (count($sit) > 1) { 
    		$sitt = site::all()->where('id' != 1)->delete();
    	}
        // echo storage_path().'<br>';
        // echo app_path().'<br>';
        // echo database_path().'<br>';
        // echo public_path().'<br>';
        // echo resource_path().'<br>';
        // echo config_path().'<br>';

        //echo include(resource_path().'/views/inc/admin/setting/new.php');

        if(Auth::guard('admin')->check()){
            return view('admin/setting/settings')
	        	->with('id', $id)
	        	->with('setting', $setting)
	        	->with('site', $site)
	        	->with('classes', $classes)
	        	->with('pays', $pays)
	        	->with('staffs', $staffs)
	        	->with('students', $students)
	        	->with('payments', $payments)
	        	->with('branches', $branches)
	        	->with('sessions', $sessions)
	        	->with('faqs', $faqs)
	        	->with('services', $services)
	        	->with('serves', $serves)
	        	->with('saves', $saves)
	        	->with('allocate', $allocate)
	        	->with('terms', $terms);
        }else{
            return redirect()->route('login');
        }

    }

    public function enter()
    {
    	$id = 1;
        $setting = setting::find($id);
        $site = site::find($id);
        $classes = clas::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $pays = pay::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $staffs = staff::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $students = student::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $payments = payment::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $sessions = session::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $branches = branch::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $terms = term::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $faqs = faq::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $services = service::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        $serves = service::all()->where('status', 'Active')->where('category', 'Head')->sortBy('created_at', 0, 'desc');
        $saves = service::all()->where('status', 'Active')->where('category', 'Body')->sortBy('created_at', 0, 'desc');
        $allocate = allocate::find($id);

        // echo storage_path().'<br>';
        // echo app_path().'<br>';
        // echo database_path().'<br>';
        // echo public_path().'<br>';
        // echo resource_path().'<br>';
        // echo config_path().'<br>';

        //echo include(resource_path().'/views/inc/admin/setting/new.php');

        $set = setting::all();
    	if (count($set) < 1) {
    		$sett = new setting;
    		$sett->id = 1;
    		if(count($sessions) > 0){
                foreach($sessions as $sec){
                    if(count($terms) > 0){
                        foreach($terms as $ter){
                            $sett->session = $sec->id;
                            $sett->term = $ter->id;
                        }
                    }
                }
            }
    		$sett->save();
    	}
    	if (count($set) > 1) { 
    		$sett = setting::all()->where('id' != 1);
    		foreach ($sett as $se) {
    			$se->delete();
    		}
    	}

    	$sit = site::all();
    	if (count($sit) < 1) {
    		$sitt = new site;
    		$sitt->id = 1;
    		if(count($sessions) > 0){
                foreach($sessions as $sec){
                    if(count($terms) > 0){
                        foreach($terms as $ter){
                            $sitt->session = $sec->id;
                            $sitt->term = $ter->id;
                        }
                    }
                }
            }
    		$sitt->save();
    	}
    	if (count($sit) > 1) { 
    		$sitt = site::all()->where('id' != 1)->delete();
    	}

        if(Auth::guard('admin')->check()){
            return view('admin/setting/setting')
	        	->with('id', $id)
	        	->with('setting', $setting)
	        	->with('site', $site)
	        	->with('classes', $classes)
	        	->with('pays', $pays)
	        	->with('staffs', $staffs)
	        	->with('students', $students)
	        	->with('payments', $payments)
	        	->with('branches', $branches)
	        	->with('sessions', $sessions)
	        	->with('faqs', $faqs)
	        	->with('services', $services)
	        	->with('serves', $serves)
	        	->with('saves', $saves)
	        	->with('terms', $terms)
	        	->with('allocate', $allocate);
        }else{
            return redirect()->route('login');
        }

    }

    public function show(Request $request, $id)
    {

		if(Auth::guard('admin')->check()){
            $allocate = allocate::find(1);

	        $data = $request->input('data');
	        $type = $request->input('type');

		    if(!empty($allocate) && $type == 'Event'){
		    	$allocate->event = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Event'){
		    		$allocate = new allocate;
			    	$allocate->event = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Gallery'){
		    	$allocate->gallery = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Gallery'){
		    		$allocate = new allocate;
			    	$allocate->gallery = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'News'){
		    	$allocate->news = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'News'){
		    		$allocate = new allocate;
			    	$allocate->news = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Class'){
		    	$allocate->class = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Class'){
		    		$allocate = new allocate;
			    	$allocate->class = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Subject'){
		    	$allocate->subject = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Subject'){
		    		$allocate = new allocate;
			    	$allocate->subject = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Book'){
		    	$allocate->book = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Book'){
		    		$allocate = new allocate;
			    	$allocate->book = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Staff'){
		    	$allocate->staff = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Staff'){
		    		$allocate = new allocate;
			    	$allocate->staff = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Student'){
		    	$allocate->student = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Student'){
		    		$allocate = new allocate;
			    	$allocate->student = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Message'){
		    	$allocate->message = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Message'){
		    		$allocate = new allocate;
			    	$allocate->message = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Payment'){
		    	$allocate->payment = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Payment'){
		    		$allocate = new allocate;
			    	$allocate->payment = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Trash'){
		    	$allocate->trash = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Trash'){
		    		$allocate = new allocate;
			    	$allocate->trash = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Attendance'){
		    	$allocate->attendance = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Attendance'){
		    		$allocate = new allocate;
			    	$allocate->attendance = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Syllabus'){
		    	$allocate->syllabus = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Syllabus'){
		    		$allocate = new allocate;
			    	$allocate->syllabus = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Hostel'){
		    	$allocate->hostel = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Hostel'){
		    		$allocate = new allocate;
			    	$allocate->hostel = $data;
			    	$allocate->save();
			    }
		    }

		    if(!empty($allocate) && $type == 'Library'){
		    	$allocate->library = $data;
		    	$allocate->save();
		    }else{
		    	if($type == 'Library'){
		    		$allocate = new allocate;
			    	$allocate->library = $data;
			    	$allocate->save();
			    }
		    }
			
			return back();
        }else{
            return redirect()->route('login');
        }
    }

    public function wig(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
            $setting = setting::find($id);

	        $data = $request->input('data');

		    if($setting->dash_wig1 == $data){
		    	$setting->dash_wig1 = '';
		    	$setting->save();
		    }elseif($setting->dash_wig2 == $data){
		    	$setting->dash_wig2 = '';
		    	$setting->save();
		    }elseif($setting->dash_wig3 == $data){
		    	$setting->dash_wig3 = '';
		    	$setting->save();
		    }elseif($setting->dash_wig4 == $data){
		    	$setting->dash_wig4 = '';
		    	$setting->save();
		    }else{
		    	if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4)){

		        }else{
		        	if(empty($setting->dash_wig1)){
		        		$setting->dash_wig1 = $data;
		        		$setting->save();
		        	}elseif(empty($setting->dash_wig2)){
		        		$setting->dash_wig2 = $data;
		        		$setting->save();
		        	}elseif(empty($setting->dash_wig3)){
		        		$setting->dash_wig3 = $data;
		        		$setting->save();
		        	}elseif(empty($setting->dash_wig4)){
		        		$setting->dash_wig4 = $data;
		        		$setting->save();
		        	}else{

		        	}
		        }
		    }
			
			return back();
        }else{
            return redirect()->route('login');
        }
        
    }

    public function sitep(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
            
        }else{
            return redirect()->route('login');
        }
    }

    public function site(Request $request)
    {
    	if(Auth::guard('admin')->check()){
            $site = site::find(1);

	        if(!empty($request->input('name'))){
		        $site->name = $request->input('name');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('motor'))){
		        $site->title = $request->input('motor');
		        echo 1;
			}else{
		    	echo 0;
		    }
			if(!empty($request->input('email'))){
		        $site->email = $request->input('email');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('footer'))){
		        $site->footer = $request->input('footer');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('facebook'))){
		        $site->facebook = $request->input('facebook');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('instagram'))){
		        $site->instagram = $request->input('instagram');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('twitter'))){
		        $site->twitter = $request->input('twitter');
		        echo 1;
		   	}else{
		    	echo 0;
		    }
		   	if(!empty($request->input('youtube'))){
		        $site->youtube = $request->input('youtube');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('pinterest'))){
		        $site->pinterest = $request->input('pinterest');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('linkin'))){
		        $site->linkin = $request->input('linkin');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('address'))){
		        $site->address = $request->input('address');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('day'))){
		        $site->d = $request->input('day');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('admission_no_prefix'))){
		        $site->admission_no_prefix = $request->input('admission_no_prefix');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('month'))){
		        $site->m = $request->input('month');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('year'))){
		        $site->y = $request->input('year');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('phone'))){
		        $site->phoneno = $request->input('phone');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('sim'))){
		        $site->sim = $request->input('sim');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('sam'))){
		        $site->sam = $request->input('sam');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('aboutus'))){
		        $site->aboutus = $request->input('aboutus');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('tc'))){
		        $site->tc = $request->input('tc');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if(!empty($request->input('pp'))){
		        $site->pp = $request->input('pp');
		        echo 1;
		    }else{
		    	echo 0;
		    }
		    if($request->hasFile('image')){
		    	$image_ext = $request->file('image')->getCLientOriginalExtension();

	            $site->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('image')->move(
	            	storage_path().'/app/public/image/site/', $site->image 
	        	);
	        	echo 1;
		    }else{
		    	echo 0;
		    }
			if($request->input('type') == 'video'){
		        $site->type = $request->input('type');

		        if(!empty($request->hasFile('background2'))){
			    	$image_ext_back2 = $request->file('background2')->getCLientOriginalExtension();

		            $site->background2 =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext_back2;

		            $request->file('background2')->move(
		            	storage_path().'/app/public/video/site/', $site->background2 
		        	);
		        	echo 1;
		        }else{
			    	echo 0;
			    }
		    }else{
		    	echo 0;
		    }
		    if($request->input('type') == 'image'){
		        $site->type = $request->input('type');

		        if(!empty($request->hasFile('background'))){
			    	$image_ext_back = $request->file('background')->getCLientOriginalExtension();

		            $site->background =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext_back;

		            $request->file('background')->move(
		            	storage_path().'/app/public/image/site/', $site->background 
		        	);
		        	echo 1;
			    }else{
			    	echo 0;
			    }
		    }else{
		    	echo 0;
		    }
		    if($request->hasFile('cui')){
		    	$image_ext = $request->file('cui')->getCLientOriginalExtension();

	            $site->cui =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('cui')->move(
	            	storage_path().'/app/public/image/site/', $site->cui 
	        	);
	        	echo 1;
		    }else{
		    	echo 0;
		    }
		    if($request->hasFile('aui')){
		    	$image_ext = $request->file('aui')->getCLientOriginalExtension();

	            $site->aui =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('aui')->move(
	            	storage_path().'/app/public/image/site/', $site->aui 
	        	);
	        	echo 1;
		    }else{
		    	echo 0;
		    }
		    if($request->hasFile('sbi')){
		    	$image_ext = $request->file('sbi')->getCLientOriginalExtension();

	            $site->sbi =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('sbi')->move(
	            	storage_path().'/app/public/image/site/', $site->sbi 
	        	);
	        	echo 1;
		    }else{
		    	echo 0;
		    }
		    if($request->hasFile('simi')){
		    	$image_ext = $request->file('simi')->getCLientOriginalExtension();

	            $site->simi =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('simi')->move(
	            	storage_path().'/app/public/image/site/', $site->simi 
	        	);
	        	echo 1;
		    }else{
		    	echo 0;
		    }
		    if($request->hasFile('sami')){
		    	$image_ext = $request->file('sami')->getCLientOriginalExtension();

	            $site->sami =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('sami')->move(
	            	storage_path().'/app/public/image/site/', $site->sami 
	        	);
	        	echo 1;
		    }else{
		    	echo 0;
		    }

	        $site->status = 'Active';
	        $site->save();

	        
			return back();
        }else{
            return redirect()->route('login');
        }
        
    }

    public function result(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
            $setting = setting::find($id);

	        if(!empty($request->input('attendance'))){
		        $setting->m_attendance = $request->input('attendance');
		    }
		    if(!empty($request->input('test'))){
		        $setting->m_test = $request->input('test');
			}
			if(!empty($request->input('exam'))){
		        $setting->m_exam = $request->input('exam');
		    }
		    if(!empty($request->input('total'))){
		        $setting->m_total = $request->input('total');
		    }
		    if(!empty($request->input('forward'))){
		        $setting->m_forward = $request->input('forward');
		    }
		    if(!empty($request->input('average'))){
		        $setting->m_average = $request->input('average');
		    }
		    if(!empty($request->input('grade'))){
		        $setting->m_grade = $request->input('grade');
		    }

	        $setting->save();
        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function upsession(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
            if(!empty($request->input('sname')) && !empty($request->input('sfrom')) && !empty($request->input('sto'))){

	        	$session = session::find($id);

		        if(!empty($request->input('sname'))){
			        $session->name = $request->input('sname');
			    }
			    if(!empty($request->input('sfrom'))){
			        $session->from = $request->input('sfrom');
				}
				if(!empty($request->input('sto'))){
			        $session->to = $request->input('sto');
			    }

		        $session->save();
		    }

		    if(!empty($request->input('sessionid')) && !empty($request->input('tname')) && !empty($request->input('tfrom')) && !empty($request->input('tto'))){

		    	$term = term::find($id);

		        if(!empty($request->input('tname'))){
			        $term->name = $request->input('tname');
			    }
			    if(!empty($request->input('sessionid'))){
			        $term->session = $request->input('sessionid');
			    }
			    if(!empty($request->input('tfrom'))){
			        $term->from = $request->input('tfrom');
				}
				if(!empty($request->input('tto'))){
			        $term->to = $request->input('tto');
			    }
			        
		        $term->save();
		    }
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function session(Request $request)
    {
    	if(Auth::guard('admin')->check()){
            if(!empty($request->input('sname')) && !empty($request->input('sfrom')) && !empty($request->input('sto'))){

	        	$sec = session::all()->where('status', 'Active')->where('category', 'Open')->sortBy('created_at', 0, 'desc');
	        	if(count($sec) > 0){
			    	foreach($sec as $se){
			    		$se->category = 'Closed';
			    		$se->view = 1;

			    		$ter = term::all()->where('session', $se->id)->where('status', 'Active')->where('category', 'Open')->sortBy('created_at', 0, 'desc');
				    	if(count($ter) > 0){
					        foreach($ter as $te){
					    		$te->category = 'Closed';
					    		$te->view = 1;
					    		$te->save();
					    	}
					    }
					    $se->save();

					    $term = new term;
				        $term->name = 'First';
				        $ses = session::all()->where('status', 'Active')->where('category', 'Open')->sortBy('created_at', 0, 'desc');
			        	if(count($ses) > 0){
					    	foreach($ses as $se){
				        		$term->session = $se->id;
				        	}
				        }
				        $term->from = $request->input('tfrom');
				        $term->to = $request->input('tto');
					    $term->status = 'Active';
					    $term->view = 1;
				        $term->time = date('h:i:s');
				        $term->d = date('d');
				        $term->m = date('M');
				        $term->y = date('y');
					    $term->category = 'Open';
				        $term->save();
			    	}
			    }

		        $session = new session;

		        if(!empty($request->input('sname'))){
			        $session->name = $request->input('sname');
			    }
			    if(!empty($request->input('sfrom'))){
			        $session->from = $request->input('sfrom');
				}
				if(!empty($request->input('sto'))){
			        $session->to = $request->input('sto');
			    }

			    $session->status = 'Active';
			    $session->view = 1;
		        $session->time = date('h:i:s');
		        $session->d = date('d');
		        $session->m = date('M');
		        $session->y = date('y');
			    $session->category = 'Open';
				$session->save();
		        //include(resource_path().'/views/inc/admin/setting/new_sess.php');
		    }

		    if(!empty($request->input('sessionid')) && !empty($request->input('tname')) && !empty($request->input('tfrom')) && !empty($request->input('tto'))){

		    	$ter = term::all()->where('status', 'Active')->where('category', 'Open')->sortBy('created_at', 0, 'desc');
		    	if(count($ter) > 0){
			        foreach($ter as $te){
			    		$te->category = 'Closed';
			    		$te->view = 1;
			    		$te->save();
			    	}
			    }

		    	$term = new term;

		        if(!empty($request->input('tname'))){
			        $term->name = $request->input('tname');
			    }
			    if(!empty($request->input('sessionid'))){
			        $term->session = $request->input('sessionid');
			    }
			    if(!empty($request->input('tfrom'))){
			        $term->from = $request->input('tfrom');
				}
				if(!empty($request->input('tto'))){
			        $term->to = $request->input('tto');
			    }
			        
			    $term->status = 'Active';
			    $term->view = 1;
		        $term->time = date('h:i:s');
		        $term->d = date('d');
		        $term->m = date('M');
		        $term->y = date('y');
			    $term->category = 'Open';
		        $term->save();

		        $session = session::all()->where('status', 'Active')->where('category', 'Open');
			    $term = term::all()->where('status', 'Active')->where('category', 'Open');

				$students = student::all()->where('status', 'Active');
			    if(count($students) > 0){
			    	foreach($students as $student){
				        if(count($session) > 0){
			                foreach($session as $sec){
			                    if(count($term) > 0){
			                        foreach($term as $ter){

			                        	$account = new account;
								        $account->studentid =  $student->id;
								        $account->name =  $student->username;
								        if(!empty($request->input('acctype')) && !empty($request->input('accname')) && !empty($request->input('accno')) && !empty($request->input('bank'))){
							        		$account->accounttype = $request->input('acctype');
									        $account->accountname = $request->input('accname');
									        $account->accountnumber = $request->input('accno');
									        $account->bank = $request->input('bank');
									        $account->paymentstatus = 'Pending';
									        $account->infostatus = $request->input('infostatus');
							        	}else{
								        	$account->paymentstatus = 'Not Payed';
								        }
								        $account->status = 'Active';
								        $account->time = date('h:i:s');//time();
								        $account->d = date('d');
								        $account->m = date('M');
								        $account->y = date('y');
								        $account->session = $sec->id;
			                            $account->term = $ter->id;
			                            $account->save();

								        $result = new result;
								        $result->studentid =  $student->id;
								        $result->status = 'Active';
								        $result->time = date('h:i:s');//time();
								        $result->d = date('d');
								        $result->m = date('M');
								        $result->y = date('y');
			                            $result->session = $sec->id;
			                            $result->term = $ter->id;
			            				$result->save();
			                        }
			                    }else{
			                        
			                    }
			                }
			            }else{
			                
			            }
			    	}
			    }else{
			        	
				}
		        //include(resource_path().'/views/inc/admin/setting/new.php');
		    }
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function closesession($id)
    {
    	if(Auth::guard('admin')->check()){
            $session = session::find($id);

	        $session->category = 'Close';

	        $session->save();

			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function closeterm($id)
    {
    	if(Auth::guard('admin')->check()){
            $term = term::find($id);

	        $term->category = 'Close';

	        $term->save();
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function delsession($id)
    {
    	if(Auth::guard('admin')->check()){
            $session = session::find($id);

	        $session->delete();

			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function delterm($id)
    {
    	if(Auth::guard('admin')->check()){
            $term = term::find($id);

	        $term->delete();
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function pay(Request $request, $id)
    {
        
        if(Auth::guard('admin')->check()){
            if(!empty($request->input('acc_name')) && !empty($request->input('acc_number')) && !empty($request->input('acc_bank'))){
	        	$site = site::find($id);
		        $site->acc_name = $request->input('acc_name');
		        $site->acc_number = $request->input('acc_number');
		        $site->acc_bank = $request->input('acc_bank');
		        $site->status = 'Active';
	        	$site->save();
		    }
		    if(!empty($request->input('pay_class')) && !empty($request->input('pay_name')) && !empty($request->input('pay_price'))){
		    	$pay = new pay;
		        $pay->class = $request->input('pay_class');
		        $pay->name = $request->input('pay_name');
		        $pay->price = $request->input('pay_price');
		        $pay->discount = $request->input('pay_discount');

		        $session = session::all()->where('status', 'Active')->where('category', 'Open');
		        $term = term::all()->where('status', 'Active')->where('category', 'Open');

		        if(count($session) > 0){
		            foreach($session as $sec){
		                if(count($term) > 0){
		                    foreach($term as $ter){
		                        $pay->session = $sec->id;
		                        $pay->term = $ter->id;
		                    }
		                }else{
		                    return back()->with('error', 'term is to be added first!');
		                }
		            }
		        }else{
		            return back()->with('error', 'Session and term are to be added first!');
		        }
		        $pay->d = date('d');
		        $pay->m = date('m');
		        $pay->y = date('y');
		        $pay->status = 'Active';
		        $pay->save();
		    }

		    if(!empty($request->input('stf_staff')) && !empty($request->input('stf_salary'))){

		    	$staff = staff::find($id);
		    	$payms = payment::all()->where('status', 'Active')->where('staffid', $id)->where('m', date('M'))->where('y', date('Y'));
		    	if(count($payms) > 0){
		    		foreach($payms as $paym){
				    	if($staff->id == $paym->staffid){
					    	$payment = payment::find($paym->id);
					        $payment->staffid = $request->input('stf_staff');
					        $payment->to_pay = $request->input('stf_salary');
					        $payment->bonus = $request->input('stf_bonus');
					        $payment->status = 'Active';
				        	$payment->save();
				        }
				    }
				}else{
					echo 'none';
				}
		    }

			return back();
        }else{
            return redirect()->route('login');
        }

    }
    public function delpay($id)
    {
    	if(Auth::guard('admin')->check()){
            $pay = pay::find($id);

	        $pay->delete();
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function branch(Request $request)
    {
    	if(Auth::guard('admin')->check()){
            if(!empty($request->input('bname')) && !empty($request->input('baddress'))){

		        $branch = new branch;

		        if(!empty($request->input('bname'))){
			        $branch->name = $request->input('bname');
			    }
			    if(!empty($request->input('baddress'))){
			        $branch->address = $request->input('baddress');
				}

				$session = session::all()->where('status', 'Active')->where('category', 'Open');
		        $term = term::all()->where('status', 'Active')->where('category', 'Open');

		        if(count($session) > 0){
		            foreach($session as $sec){
		                if(count($term) > 0){
		                    foreach($term as $ter){
		                        $branch->session = $sec->id;
		                        $branch->term = $ter->id;
		                    }
		                }else{
		                    return back()->with('error', 'term is to be added first!');
		                }
		            }
		        }else{
		            return back()->with('error', 'Session and term are to be added first!');
		        }

			    $branch->status = 'Active';
		        $branch->time = date('h:i:s');
		        $branch->d = date('d');
		        $branch->m = date('M');
		        $branch->y = date('y');
				$branch->save();
		    }
	        
			return back();
        }else{
            return redirect()->route('login');
        }

    }
    public function edbranch(Request $request, $id)
    {

    	if(Auth::guard('admin')->check()){
            if(!empty($request->input('bname')) && !empty($request->input('baddress'))){

		        $branch = branch::find($id);

		        if(!empty($request->input('bname'))){
			        $branch->name = $request->input('bname');
			    }
			    if(!empty($request->input('baddress'))){
			        $branch->address = $request->input('baddress');
				}

			    $branch->status = 'Active';
				$branch->save();
		    }
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function delbranch($id)
    {
    	if(Auth::guard('admin')->check()){
            $branch = branch::find($id);

	        $branch->delete();
	        
			return back();
        }else{
            return redirect()->route('login');
        }
    }
    public function faq(Request $request)
    {
    	if(Auth::guard('admin')->check()){

	    	if(!empty($request->input('question')) && !empty($request->input('answer')) && !empty($request->input('category'))){
		    	$faq = new faq;
		    	$faq->question = $request->input('question');
		    	$faq->answer = $request->input('answer');
		    	$faq->category = $request->input('category');
		    	$faq->status = 'Active';
	        	$faq->save();
	        	echo 1;
		    }else{
		    	echo 0;
		    }

        }else{
            return redirect()->route('login');
        }
    }
    public function faqup(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
            if(!empty($request->input('question')) && !empty($request->input('answer')) && !empty($request->input('category'))){
		    	$faq = faq::find($id);
		    	$faq->question = $request->input('question');
		    	$faq->answer = $request->input('answer');
		    	$faq->category = $request->input('category');
		    	$faq->status = 'Active';
	        	$faq->save();
	        	echo 1;
		    }else{
		    	echo 0;
		    }
        }else{
            return redirect()->route('login');
        }
    }
    public function faqdel($id)
    {
    	if(Auth::guard('admin')->check()){
    		$faq = faq::find($id);
    		$faq->delete();
        	return back()->with('success', 'Service Deleted Successfully');
        }else{
            return redirect()->route('login');
        }
    }
    public function service(Request $request)
    {
    	if(Auth::guard('admin')->check()){
	    	if($request->hasFile('serve_image') && !empty($request->input('serve_title')) && !empty($request->input('serve_details'))){

	    		$service = new service;

	    		$service->title = $request->input('serve_title');
	    		$service->details = $request->input('serve_details');

		    	$image_ext = $request->file('serve_image')->getCLientOriginalExtension();

	            $service->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

	            $request->file('serve_image')->move(
	            	storage_path().'/app/public/image/service/', $service->image 
	        	);

	        	$service->status = 'Active';
	        	$service->save();

	        	return back()->with('success', 'Service Created Successfully');
		    }else{
		    	return back()->with('error', 'Error! Unable to Create Service');
		    }
        }else{
            return redirect()->route('login');
        }
    }
    public function servicedel($id)
    {
    	if(Auth::guard('admin')->check()){
    		$service = service::find($id);
    		$service->delete();
        	return back()->with('success', 'Service Deleted Successfully');
        }else{
            return redirect()->route('login');
        }
    }
    public function servicehead(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
    		$service = service::find($id);
    		$service->category = $request->input('category');
    		$service->save();
        }else{
            return redirect()->route('login');
        }
    }
    public function serviceup(Request $request, $id)
    {
    	if(Auth::guard('admin')->check()){
	    	if(!empty($request->input('upserve_title'.$id)) && !empty($request->input('upserve_details'.$id))){

	    		$service = service::find($id);

	    		$service->title = $request->input('upserve_title'.$id);
	    		$service->details = $request->input('upserve_details'.$id);

	    		if($request->hasFile('upserve_image'.$id)){
			    	$image_ext = $request->file('upserve_image'.$id)->getCLientOriginalExtension();

		            $service->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

		            $request->file('upserve_image'.$id)->move(
		            	storage_path().'/app/public/image/service/', $service->image 
		        	);
		        } 

	        	$service->status = 'Active';
	        	$service->save();

	        	return back()->with('success', 'Service Updated Successfully');
		    }else{
		    	return back()->with('error', 'Error! Unable to Update Service');
		    }
        }else{
            return redirect()->route('login');
        }
    }
}

