<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\gallery;
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

class GalleriesController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::guard('staff')->check()){
            $allocate = allocate::find(1);
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active');
                $term = term::all()->where('status', 'Active');

                $galleries = gallery::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
                if(count($galleries) > 0){
                    foreach($galleries as $gallery){
                        $id = $gallery->id;
                    }
                }else{
                    $id = '';
                }

                return view('staff/gallery/gallery')
                    ->with('galleries', $galleries)
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
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){
                $session = session::all()->where('status', 'Active');
                $term = term::all()->where('status', 'Active');

                $galleries = gallery::all()->where('status', 'Active')->sortBy('created_at', 0, 'desc');
                if(count($galleries) > 0){
                    foreach($galleries as $gallery){
                        $id = $gallery->id;
                    }
                }else{
                    $id = '';
                }

                return view('staff/gallery/create')
                    ->with('galleries', $galleries)
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
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){
                $this->validate($request,[
                    'title' => 'required',
                    'details' => 'required',
                    'file' => 'required',
                    'category' => 'required'
                ]);

                $gallery = new gallery;
                
                if($request->input('file') == 'image'){
                    if (!empty($request->file('image'))) { 

                        $image_ext = $request->file('image')->getCLientOriginalExtension();

                        $gallery->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

                        $request->file('image')->move(
                            storage_path().'/app/public/image/gallery/', $gallery->image 
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
                        $gallery->image = $thumbnail;
                        $frame->save(storage_path().'/app/public/image/gallery/'.$thumbnail);


                        $gallery_ext = $request->file('video')->getCLientOriginalExtension();

                        $gallery->video =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $gallery_ext;

                        $request->file('video')->move(
                            storage_path().'/app/public/video/gallery/', $gallery->video 
                        );
                    }
                }

                $gallery->name = rand(111111111, 999999999);
                $gallery->title = $request->input('title');
                $gallery->details = $request->input('details');
                $gallery->type = $request->input('file');
                $gallery->category = $request->input('category');
                $gallery->postid = Auth::guard('staff')->user()->id;
                $gallery->postcat = 'staff';
                $gallery->status = 'Active';
                $gallery->time = date('h:i:s');//time();
                $gallery->d = date('d');
                $gallery->m = date('m');
                $gallery->y = date('y');

                $session = session::all()->where('status', 'Active')->where('category', 'Open');
                $term = term::all()->where('status', 'Active')->where('category', 'Open');
                
                if(count($session) > 0){
                    foreach($session as $sec){
                        if(count($term) > 0){
                            foreach($term as $ter){
                                $gallery->session = $sec->id;
                                $gallery->term = $ter->id;
                            }
                        }else{
                            return back()->with('error', 'term is to be added first!');
                        }
                    }
                }else{
                    return back()->with('error', 'Session and term are to be added first!');
                }

                $gallery->save();

                return back()
                    ->with('success', ' gallery added successfully');
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
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){

                $gallery = gallery::find($id);
                $sgalleries = gallery::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/gallery/view')
                    ->with('gallery', $gallery)
                    ->with('sgalleries', $sgalleries)
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
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){

                $gallery = gallery::find($id);
                $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
                $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');

                return view('staff/gallery/edit')
                    ->with('gallery', $gallery)
                    ->with('term', $term)
                    ->with('session', $session)
                    ->with('id', $id);
                    
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
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){
                $this->validate($request,[
                    'title' => 'required',
                    'details' => 'required',
                    'category' => 'required'
                ]);

                $gallery = gallery::find($id);

                if($request->input('file') == 'image'){
                    if (!empty($request->file('image'))) { 

                        $image_ext = $request->file('image')->getCLientOriginalExtension();

                        $gallery->image =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $image_ext;

                        $request->file('image')->move(
                            storage_path().'/app/public/image/gallery/', $gallery->image 
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
                        $gallery->image = $thumbnail;
                        $frame->save(storage_path().'/app/public/image/gallery/'.$thumbnail);


                        $gallery_ext = $request->file('video')->getCLientOriginalExtension();

                        $gallery->video =  str_replace('_', '_', rand(11111, 99999)). '_' . date('h_i_s') . '_' . time() . '.' . $gallery_ext;

                        $request->file('video')->move(
                            storage_path().'/app/public/video/gallery/', $gallery->video 
                        );
                    }
                }

                $gallery->name = rand(111111111, 999999999);
                $gallery->title = $request->input('title');
                $gallery->details = $request->input('details');
                $gallery->category = $request->input('category');
                $gallery->status = 'Active';

                $gallery->save();

                return back()->with('success', 'gallery Updated Successfully');
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
            if(!empty($allocate) && $allocate->gallery == Auth::guard('staff')->user()->id){

                $gallery = gallery::find($id);
        
                $gallery->status = 'Deleted';

                $gallery->save();
            
                return back()->with('success','Temporarily Deleted Successfully'); 

            }else{
                return redirect()->route('staff_index')->with('error', 'Access Denied');
            }
        }else{
            return redirect()->route('staff_index')->with('error', 'Access Denied');
        }
    }
}
