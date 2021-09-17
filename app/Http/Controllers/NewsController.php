<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\news;
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
use Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        
        $session = session::all()->where('status', 'Active');
        $term = term::all()->where('status', 'Active');
        
        $news = news::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        if(count($news) > 0){
            foreach($news as $new){
                $id = $new->id;
            }
        }else{
            $id = '';
        }
        
        if(Auth::guard('admin')->check()){
            return view('admin/new/new')
                ->with('news', $news)
                ->with('session', $session)
                ->with('term', $term)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function getCreate()
    {
        $news = news::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
        if(count($news) > 0){
            foreach($news as $new){
                $id = $new->id;
            }
        }else{
            $id = '';
        }

        if(Auth::guard('admin')->check()){
            return view('admin/new/create')
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }
    
    public function store(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $this->validate($request,[
                'title' => 'required',
                'details' => 'required',
                'file' => 'required',
                'category' => 'required'
            ]);

            $new = new news;
            
            if($request->input('file') == 'image'){
                if (!empty($request->file('image'))) { 

                    $image_ext = $request->file('image')->getCLientOriginalExtension();

                    $new->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

                    $request->file('image')->move(
                        storage_path().'/app/public/image/new/', $new->image 
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
                    $new->image = $thumbnail;
                    $frame->save(storage_path().'/app/public/image/new/'.$thumbnail);


                    $new_ext = $request->file('video')->getCLientOriginalExtension();

                    $new->video =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $new_ext;

                    $request->file('video')->move(
                        storage_path().'/app/public/video/new/', $new->video 
                    );
                }
            }

            $new->name = rand(111111111, 999999999);
            $new->title = $request->input('title');
            $new->details = $request->input('details');
            $new->type = $request->input('file');
            $new->category = $request->input('category');
            $new->postid = Auth::guard('admin')->user()->id;
            $new->postcat = 'Admin';
            $new->status = 'Active';
            $new->time = date('h:i:s');//time();
            $new->d = date('d');
            $new->m = date('M');
            $new->y = date('Y');

            $session = session::all()->where('status', 'Active')->where('category', 'Open');
            $term = term::all()->where('status', 'Active')->where('category', 'Open');
            
            if(count($session) > 0){
                foreach($session as $sec){
                    if(count($term) > 0){
                        foreach($term as $ter){
                            $new->session = $sec->id;
                            $new->term = $ter->id;
                        }
                    }else{
                        return back()->with('error', 'term is to be added first!');
                    }
                }
            }else{
                return back()->with('error', 'Session and term are to be added first!');
            }

            $new->save();

            return back()
                ->with('success', ' new added successfully');
        }else{
            return redirect()->route('login');
        }
    }

    public function show($id)
    {
        $new = news::find($id);
        $snews = news::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        
        if(Auth::guard('admin')->check()){
            return view('admin/new/view')
                ->with('new', $new)
                ->with('session', $session)
                ->with('term', $term)
                ->with('snews', $snews)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function edit($id)
    {
        $new = news::find($id);
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

        if(Auth::guard('admin')->check()){
            return view('admin/new/edit')
                ->with('new', $new)
                ->with('session', $session)
                ->with('term', $term)
                ->with('id', $id);
        }else{
            return redirect()->route('login');
        }
    }

    public function update(Request $request, $id)
    {

        if(Auth::guard('admin')->check()){
            $this->validate($request,[
                'title' => 'required',
                'details' => 'required',
                'category' => 'required'
            ]);

            $new = news::find($id);

            if($request->input('file') == 'image'){
                if (!empty($request->file('image'))) { 

                    $image_ext = $request->file('image')->getCLientOriginalExtension();

                    $new->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

                    $request->file('image')->move(
                        storage_path().'/app/public/image/new/', $new->image 
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
                    $new->image = $thumbnail;
                    $frame->save(storage_path().'/app/public/image/new/'.$thumbnail);


                    $new_ext = $request->file('video')->getCLientOriginalExtension();

                    $new->video =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $new_ext;

                    $request->file('video')->move(
                        storage_path().'/app/public/video/new/', $new->video 
                    );
                }
            }

            $new->name = rand(111111111, 999999999);
            $new->title = $request->input('title');
            $new->details = $request->input('details');
            $new->category = $request->input('category');
            $new->status = 'Active';

            $new->save();

            return back()->with('success', 'new Updated Successfully');
        }else{
            return redirect()->route('login');
        }
    }
    
    public function destroy($id)
    {
        if(Auth::guard('admin')->check()){
            $new = news::find($id);
        
            $new->status = 'Deleted';

            $new->save();
            
            return back()->with('success','Temporarily Deleted Successfully');
        }else{
            return redirect()->route('login');
        }
    }
}
