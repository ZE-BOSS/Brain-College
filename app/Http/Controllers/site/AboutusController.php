<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\session;
use App\Model\term;
use App\Model\event;
use App\Model\site;
use App\Model\setting;
use App\Model\gallery;
use App\Model\staff;
use App\Model\faq;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use GifCreator\GifCreator;
use FFprobe;
use FFMpeg;
use Coordinate\TimeCode;
use Auth; 

class AboutusController extends Controller
{
    function index()
    {
        $session = session::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        $term = term::all()->where('status', 'Active')->sortBy('id', 0, 'desc');
        
        $events = event::all()->where('status', 'Active')->sortBy('id', 0, 'desc'); 
        $galleries = gallery::all()->where('status', 'Active');
        $site = site::find(1);
        $setting = setting::find(1);
        $staffs = staff::all()->where('status', 'Active');
	    $faqs = faq::all()->where('status', 'Active');
        $id = $site->id;

        return view('site/aboutus')
        	->with('session', $session)
        	->with('term', $term)
        	->with('staffs', $staffs)
        	->with('events', $events)
        	->with('galleries', $galleries)
        	->with('site', $site)
        	->with('setting', $setting)
            ->with('faqs', $faqs)
            ->with('id', $id);
    }
}
