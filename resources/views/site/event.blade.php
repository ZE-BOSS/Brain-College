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
                                    @if(count($events) > 0)
                                       @foreach($events as $event)
                                          <div class="col-md-3 col-sm-6">
                                             <div class="small-box-c" onmouseenter="document.getElementById('event-lay{{$event->id}}').style.display = 'inline';" onmouseleave="document.getElementById('event-lay{{$event->id}}').style.display = 'none';">
                                                <div class="small-img-b">
                                                   @if($event->type == 'image' && !empty($event->image))
                                                       @if(file_exists(storage_path().'/app/public/image/event/'.$event->image))
                                                           <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/event/'.$event->image)}}" alt="" class="img-fluid">
                                                       @else
                                                           <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                       @endif
                                                   @elseif($event->type == 'video' && !empty($event->image))
                                                       @if(file_exists(storage_path().'/app/public/video/event/'.$event->video))
                                                           @if(file_exists(storage_path().'/app/public/image/event/'.$event->image))
                                                               <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/event/'.$event->image)}}" alt="" class="img-fluid">
                                                           @else
                                                               <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                           @endif
                                                       @else
                                                           <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                       @endif
                                                   @else
                                                       <img src="/site/images/150x150.png" alt="" class="img-fluid">
                                                   @endif
                                                   @if($event->type == 'image')
                                                      <a href="event_single/{{$event->id}}">
                                                        <div class="cover-lay" id="event-lay{{$event->id}}">
                                                          <i style="color: white; padding-top: 50%;" class="fas fa-plus"></i>
                                                        </div>
                                                      </a>
                                                   @elseif($event->type == 'video')
                                                      <a href="event_single/{{$event->id}}">
                                                         <div class="cover-lay" id="event-lay{{$event->id}}">
                                                            <i style="color: white; padding-top: 50%;" class="fas fa-play"></i>
                                                         </div>
                                                      </a>
                                                   @else

                                                   @endif
                                                </div>
                                                <div class="dit-t clearfix">
                                                   <div class="left-ti">
                                                      <h4>{{$event->title}}</h4>
                                                      <p>
                                                         @if(strlen($event->details) > 100)
                                                            {{substr($event->details, 0, 100).'....'}}
                                                         @else
                                                            {{$event->details}}
                                                         @endif
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="prod-btn">
                                                   @if(date("Y/m/d") > $event->y.'/'.$event->m.'/'.$event->d)
                                                      <a class="wis" style="color: red;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</a>
                                                      <a class="thi" style="color: red;">Time: {{$event->time}}</a>
                                                   @elseif(date("Y/m/d") < $event->y.'/'.$event->m.'/'.$event->d)
                                                      <a class="wis" style="color: green;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</a>
                                                      <a class="thi" style="color: green;">Time: {{$event->time}}</a>
                                                   @else
                                                      <a class="wis" style="color: orange;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</a>
                                                      <a class="thi" style="color: orange;">Time: {{$event->time}}</a>
                                                   @endif
                                                </div>
                                             </div>
                                          </div>
                                       @endforeach
                                    @else
                                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                          <h3>No event has been added to this site</h3>
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
                                       <span>Loading more Events...</span>
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