@extends('layouts.app')

   @section('content') 
      <div class="product-profile-box">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-8">
                  <div class="profile-pro-right">
                     <div class="panel with-nav-tabs panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab1default">
                                 <div class="product-box-main row">
                                    @if(count($news) > 0)
                                       @foreach($news as $new)
                                          <div class="col-md-3 col-sm-6">
                                             <div class="small-box-c" onmouseenter="document.getElementById('new-lay{{$new->id}}').style.display = 'inline';" onmouseleave="document.getElementById('new-lay{{$new->id}}').style.display = 'none';">
                                                <div class="small-img-b">
                                                   @if($new->type == 'image' && !empty($new->image))
                                                       @if(file_exists(storage_path().'/app/public/image/new/'.$new->image))
                                                           <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/new/'.$new->image)}}" alt="" class="img-fluid">
                                                       @else
                                                           <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                       @endif
                                                   @elseif($new->type == 'video' && !empty($new->image))
                                                       @if(file_exists(storage_path().'/app/public/video/new/'.$new->video))
                                                           @if(file_exists(storage_path().'/app/public/image/new/'.$new->image))
                                                               <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/new/'.$new->image)}}" alt="" class="img-fluid">
                                                           @else
                                                               <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                           @endif
                                                       @else
                                                           <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                       @endif
                                                   @else
                                                       <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                   @endif
                                                   @if($new->type == 'image')
                                                      <a href="news_single/{{$new->id}}">
                                                        <div class="cover-lay" id="new-lay{{$new->id}}">
                                                          <i style="color: white; padding-top: 50%;" class="fas fa-plus"></i>
                                                        </div>
                                                      </a>
                                                   @elseif($new->type == 'video')
                                                      <a href="news_single/{{$new->id}}">
                                                         <div class="cover-lay" id="new-lay{{$new->id}}">
                                                            <i style="color: white; padding-top: 50%;" class="fas fa-play"></i>
                                                         </div>
                                                      </a>
                                                   @else

                                                   @endif
                                                </div>
                                                <div class="dit-t clearfix">
                                                   <div class="left-ti">
                                                      <h4>{{$new->title}}</h4>
                                                      <p>
                                                         @if(strlen($new->details) > 100)
                                                            {{substr($new->details, 0, 100).'....'}}
                                                         @else
                                                            {{$new->details}}
                                                         @endif
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       @endforeach
                                    @else
                                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                          <h3>No new has been added to this site</h3>
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
                                       <span>Loading more news...</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection