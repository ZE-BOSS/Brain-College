<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\event;
use App\Model\site;
use App\Model\setting;
use App\Model\clas;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use GifCreator\GifCreator;
use FFprobe;
use FFMpeg;
use Coordinate\TimeCode;
use App\Model\session;
use App\Model\term;
use App\Model\allocate;
use Auth; 

class EventsController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active');
                $term = term::all()->where('status', 'Active');
                
                $events = event::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
                if(count($events) > 0){
                    foreach($events as $event){
                        $id = $event->id;
                    }
                }else{
                    $id = '';
                }

                return view('staff/event/event')
                    ->with('events', $events)
                    ->with('session', $session)
                    ->with('term', $term)
                    ->with('id', $id);
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function getCreate()
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active');
                $term = term::all()->where('status', 'Active');
                
                $events = event::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
                if(count($events) > 0){
                    foreach($events as $event){
                        $id = $event->id;
                    }
                }else{
                    $id = '';
                }

                return view('staff/event/create')
                    ->with('events', $events)
                    ->with('session', $session)
                    ->with('term', $term)
                    ->with('id', $id);
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    
    public function store(Request $request)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $this->validate($request,[
                    'title' => 'required',
                    'details' => 'required',
                    'file' => 'required',
                    'category' => 'required'
                ]);

                $event = new event;
                
                if($request->input('file') == 'image'){
                    if (!empty($request->file('image'))) { 

                        $image_ext = $request->file('image')->getCLientOriginalExtension();

                        $event->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

                        $request->file('image')->move(
                            storage_path().'/app/public/image/event/', $event->image 
                        );
                    }
                }else{
                    if (!empty($request->file('video'))) { 

                        $logger = `Psr\Logger\LoggerInterface`;
                        $sec = 10;
                        $video = $request->file('video');
                        $thumbnail = str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.'.'png';

                        $ffmpeg = FFMpeg\FFMpeg::create(array(
                            'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
                            'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe',
                            'timeout'          => 3600, // The timeout for the underlying process
                            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
                        ), $logger);
                        $vid = $ffmpeg->open($video);
                        $frame = $vid->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
                        $event->image = $thumbnail;
                        $frame->save(storage_path().'/app/public/image/event/'.$thumbnail);


                        $event_ext = $request->file('video')->getCLientOriginalExtension();

                        $event->video =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $event_ext;

                        $request->file('video')->move(
                            storage_path().'/app/public/video/event/', $event->video 
                        );
                    }
                }

                $event->name = rand(111111111, 999999999);
                $event->title = $request->input('title');
                $event->details = $request->input('details');
                $event->type = $request->input('file');
                $event->category = $request->input('category');
                $event->postid = Auth::guard('staff')->user()->id;
                $event->postcat = 'staff';
                $event->status = 'Active';
                $event->time = $request->input('time').' '.$request->input('tcat');//time();
                $event->d = $request->input('day');
                $event->m = $request->input('month');
                $event->y = $request->input('year');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');
                
                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $event->session = $sec->id;
                                $event->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $event->save();

                return back()->with('success', ' Event added successfully');
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function show($id)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $event = event::find($id);
                $sevents = event::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                
                return view('staff/event/view')
                    ->with('event', $event)
                    ->with('session', $session)
                    ->with('term', $term)
                    ->with('sevents', $sevents)
                    ->with('id', $id);
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }

    }

    public function edit($id)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $event = event::find($id);
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                if(Auth::guard('staff')->check()){
                    return view('staff/event/edit')
                        ->with('event', $event)
                        ->with('session', $session)
                        ->with('term', $term)
                        ->with('id', $id);
                }else{
                    return redirect()->route('staff_index')->with('error', 'Access Denied');
                }
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }

    public function update(Request $request, $id)
    {

        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $this->validate($request,[
                    'title' => 'required',
                    'details' => 'required',
                    'category' => 'required'
                ]);

                $event = event::find($id);

                if($request->input('file') == 'image'){
                    if (!empty($request->file('image'))) { 

                        $image_ext = $request->file('image')->getCLientOriginalExtension();

                        $event->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

                        $request->file('image')->move(
                            storage_path().'/app/public/image/event/', $event->image 
                        );
                    }
                }else{
                    if (!empty($request->file('video'))) { 

                        $logger = `Psr\Logger\LoggerInterface`;
                        $sec = 10;
                        $video = $request->file('video');
                        $thumbnail = str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.'.'png';

                        $ffmpeg = FFMpeg\FFMpeg::create(array(
                            'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
                            'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe',
                            'timeout'          => 3600, // The timeout for the underlying process
                            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
                        ), $logger);
                        $vid = $ffmpeg->open($video);
                        $frame = $vid->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
                        $event->image = $thumbnail;
                        $frame->save(storage_path().'/app/public/image/event/'.$thumbnail);


                        $event_ext = $request->file('video')->getCLientOriginalExtension();

                        $event->video =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $event_ext;

                        $request->file('video')->move(
                            storage_path().'/app/public/video/event/', $event->video 
                        );
                    }
                }

                $event->name = rand(111111111, 999999999);
                $event->title = $request->input('title');
                $event->details = $request->input('details');
                $event->category = $request->input('category');
                $event->status = 'Active';
                $event->time = $request->input('time').' '.$request->input('tcat');//time();
                $event->d = $request->input('day');
                $event->m = $request->input('month');
                $event->y = $request->input('year');

                $event->save();

                return back()->with('success', 'Event Updated Successfully');
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
    
    public function destroy($id)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->event == Auth::guard('staff')->user()->id){
                $event = event::find($id);
            
                $event->status = 'Deleted';

                $event->save();
                
                return back()->with('success','Temporarily Deleted Successfully');
            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
