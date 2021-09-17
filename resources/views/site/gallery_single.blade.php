@extends('layouts.app')

   @section('content')  
      <div class="terms-conditions product-page">
         <div class="terms-title">
            <div class="container">
               <div class="row">
                  <ol class="breadcrumb">
                     <li><a href="/">Home </a></li>
                     <li class="active">Gallery</li>
                     <li class="active">{{$gallery->title}}</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="product-page-main">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-8">
                  <div class="md-prod-page">
                     <div class="md-prod-page-in">
                        <div class="page-preview">
                           <div class="preview">
                              <div class="preview-pic tab-content">
                                 <div class="tab-pane active" id="pic-1">
                                    @if($gallery->type == 'image')
                                       <img style="width: 100%; height: 500px;" src="{{asset('/storage/image/gallery/'.$gallery->image)}}" alt=""/>
                                    @elseif($gallery->type == 'video')
                                       <div class="player" style="width: 100%; height: 500px; background-color: black;">
                                           <i class="far fa-play-circle video-play" style="display: inline; color: aliceblue; font-size: 75px;" id="show"></i>
                                           <i class="far fa-pause-circle video-play-button" style="display: none; color: aliceblue; font-size: 75px;" id="show_pause"></i>
                                           <i class="far fa-play-circle video-play-button" style="display: none; color: aliceblue; font-size: 75px;" id="show_play"></i>
                                           <i class="fas fa-redo-alt video-play-button" style="display: none; color: aliceblue; font-size: 75px;" onclick="replay()" id="show_replay"></i>
                                           <i class="fas fa-redo-alt video-play" style="display: none; color: aliceblue; font-size: 75px;" id="replay"></i>
                                           <div id="over-lay" class="" style="cursor: pointer;">
                                               <video class="player__video viewer vid" style="height: 500px; width: 100%; cursor: hand; background-color: black;" onclick="showPlay()" onended="showReplay()" poster="{{asset('/storage/image/gallery/'.$gallery->image)}}">
                                                   <source src="{{asset('/storage/video/gallery/'.$gallery->video)}}">
                                               </video>
                                           </div>

                                            <div class="controls">
                                                <div class="timing">
                                                   <button style="color: white;" class="current">00:00</button>
                                                   <div class="progres">
                                                       <div class="progress__filled"></div>
                                                   </div>
                                                   <button style="color: white;" class="duration">00:00</button>
                                                </div>
                                               <button class="play" title="Play"  style="padding: 5px;" onclick="showPla()" id="main_play"><i class="ton far fa-play-circle"></i></button>
                                               <button class="play" title="Pause" onclick="showPla()" style="display: none; padding: 5px;"  id="main_pause"><i class="ton far fa-pause-circle"></i></button>
                                               <button class="play" title="Replay" onclick="showPla()" style="display: none; padding: 5px;" id="main_replay"><i class="ton fas fa-redo-alt"></i></button>
                                               <button data-skip="-10" class="play Backward" onclick="remove()"><i class="ton fas fa-backward"></i></button>
                                               <button class="play" title="Stop" onclick="stop()" style="padding: 5px;"  id="stop"><i class="ton fas fa-stop-circle"></i></button>
                                               <button data-skip="25" class="play Forward" onclick="remove()"><i class="ton fas fa-forward"></i></button>
                                               <div class="sound">
                                                   <button class="play unmute" title="Volume" id="unmute" onclick="mute()"><i class="ton fas fa-volume-up"></i></button>
                                                   <button class="play mute" title="Volume" style="display: none; padding: 5px;" id="mute" onclick="unmute()"><i class="ton fas fa-volume-off"></i></button>
                                                   <button class="play volume" title="volume" style="display: none;" onclick="mute()"><i class="ton fas fa-volume-down"></i></button>
                                                   <input type="range" style="" name="volume" class="player__slider" min="0" max="1" step="0.05" value="1" title="Volume" id="volume">
                                               </div>
                                               <button class="play fullscreen" title="Fullscreen" id="expand"><i class="ton fas fa-expand"></i></button>
                                               <button class="play exitscreen" title="Fullscreen" style="display: none;" id="collapse"><i class="ton fas fa-compress"></i></button>
                                          </div>
                                       </div>
                                    @else

                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="description-box">
                        <div class="dex-a">
                           <h4>{{$gallery->title}}</h4>
                           <p>{{$gallery->details}}</p><br>
                        </div>
                     </div>
                  </div>
                  @php $id = $gallery->id; @endphp
                  <div class="similar-box">
                     <h2>Related Gallery Media</h2>
                     <div class="row cat-pd">
                        @if(count($galleries) > 0)
                           @foreach($galleries as $gallery)
                              @if($gallery->id != $id)
                                 <div class="col-md-3 col-sm-6">
                                    <div class="small-box-c" onmouseenter="document.getElementById('gallery-lay{{$gallery->id}}').style.display = 'inline';" onmouseleave="document.getElementById('gallery-lay{{$gallery->id}}').style.display = 'none';">
                                       <div class="small-img-b">
                                          @if($gallery->type == 'image' && !empty($gallery->image))
                                              @if(file_exists(storage_path().'/app/public/image/gallery/'.$gallery->image))
                                                  <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/gallery/'.$gallery->image)}}" alt="" class="img-fluid">
                                              @else
                                                  <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                              @endif
                                          @elseif($gallery->type == 'video' && !empty($gallery->image))
                                              @if(file_exists(storage_path().'/app/public/video/gallery/'.$gallery->video))
                                                  @if(file_exists(storage_path().'/app/public/image/gallery/'.$gallery->image))
                                                      <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/gallery/'.$gallery->image)}}" alt="" class="img-fluid">
                                                  @else
                                                      <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                  @endif
                                              @else
                                                  <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                              @endif
                                          @else
                                              <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                          @endif
                                          @if($gallery->type == 'image')
                                             <a href="gallery_single/{{$gallery->id}}">
                                               <div class="cover-lay" id="gallery-lay{{$gallery->id}}">
                                                 <i style="color: white; padding-top: 50%;" class="fas fa-plus"></i>
                                               </div>
                                             </a>
                                          @elseif($gallery->type == 'video')
                                             <a href="gallery_single/{{$gallery->id}}">
                                                <div class="cover-lay" id="gallery-lay{{$gallery->id}}">
                                                   <i style="color: white; padding-top: 50%;" class="fas fa-play"></i>
                                                </div>
                                             </a>
                                          @else

                                          @endif
                                       </div>
                                       <div class="dit-t clearfix">
                                          <div class="left-ti">
                                             <h4>{{$gallery->title}}</h4>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              @endif
                           @endforeach
                        @else
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                              <h3>No gallery has been added to this site</h3>
                            </div>
                        @endif
                     </div>
                     <div class="loding-box">
                        <a href="#">
                           <div class="sk-wave">
                              <div class="sk-rect sk-rect1"></div>
                              <div class="sk-rect sk-rect2"></div>
                              <div class="sk-rect sk-rect3"></div>
                              <div class="sk-rect sk-rect4"></div>
                              <div class="sk-rect sk-rect5"></div>
                           </div>
                           <span>Loading more gallerys...</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection