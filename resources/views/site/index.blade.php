@extends('layouts.app')

   @section('content')
      <div class="page-content-product">
         @if($site->type == 'image')
            <div class="main-product" style="background-image: url('{{asset('/storage/image/site/'.$site->background)}}')">
         @elseif($site->type == 'video')
            <div class="main-product" id="main_vid">
               <div class="overlay"></div>
         @else

         @endif
            <div class="container">
               <div class="row clearfix">
                  <div class="find-box">
                     <h1>Welcome To<br>{{$site->name}}</h1>
                     <h4>{{$site->title}}</h4>
                  </div>
               </div>
               <div class="row clearfix">
                  
               </div>
            </div>
         </div>
      </div>
      <div class="cat-main-box">
         <div class="container">
            <div class="row panel-row">
               @if(count($services) > 0)
                  @foreach($services as $service)
                     @if($service->category == 'Head')
                        <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.{{$service->id}}s">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <img src="{{asset('/storage/image/service/'.$service->image)}}" style="width: 100%; height: 150px;" class="icon-small" alt="">
                                 <h4>{{$service->title}}</h4>
                                 <p>{{$service->details}}</p>
                              </div>
                           </div>
                        </div>
                     @endif
                  @endforeach
               @endif
            </div>
         </div>
      </div>
      <div class="start-free-box">
         <div class="container">
            <div class="row">
               <div class="container">
                  <div class="main-start-box">
                     <div class="free-box-a clearfix">
                        <div class="col-md-6 col-sm-6">
                           <div class="left-a-f">
                              <h3>
                                 Who are we? <br>
                                 What do we stand for?<br>
                                 Why should you trust us?<br>
                              </h3>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                           <div class="right-a-f">
                              <p>
                                 Do you want to know who we are? what we stand for? and why you should trust us with helping your child be the best at what he or she wants to be?<br><br>
                                 <a class="btn btn-success btn-large" style="padding: 12px 23px;" href="aboutus">Get to know us</a>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="main-start-box">
                  <div class="bg_img_left"><img src="{{asset('/storage/image/site/'.$site->sbi)}}" style="height: 100%; width: 100%;" alt="" /></div>
                  <div class="container">
                     <div class="buyer-box clearfix">
                        <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                           <div class="left-buyer">
                              <img class="img-responsive" style="height: 300px; width: 100%;" src="{{asset('/storage/image/site/'.$site->simi)}}" alt="" />
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                           <div class="right-buyer">
                              <h4>Welcome</h4>
                              <?php echo $site->sim; ?>
                              <a href="contactus">Contact Us</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="bg_img_right"><img src="{{asset('/storage/image/site/'.$site->sbi)}}" style="height: 100%; width: 100%;" alt="" /></div>
               <div class="main-start-box">
                  <div class="container">
                     <div class="supplier clearfix">
                        <div class="col-md-5 col-sm-6">
                           <div class="left-supplier">
                              <h4>Apply</h4>
                              <?php echo $site->sam; ?>
                              <a href="#">Apply Now</a>
                           </div>
                        </div>
                        <div class="col-md-7 col-sm-6">
                           <div class="right-supplier">
                              <img class="img-responsive" style="height: 300px; width: 100%;" src="{{asset('/storage/image/site/'.$site->sami)}}" alt="" />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="products_exciting_box">
         <div class="container">
            <h2 style="text-align: center;"></h2>
            <div class="row">
               @if(count($services) > 0)
                  @foreach($services as $service)
                     @if($service->category == 'Body')
                        <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-delay="0.{{$service->id}}s">
                           <div class="exciting_box">
                              <div class="row" style="border: 10px solid; border-color: white; background-color: white;">
                                 <div class="col-md-6 col-sm-6">
                                    <img src="{{asset('/storage/image/service/'.$service->image)}}"  style="width: 100%; height:250px;" class="icon-small" alt="" />
                                 </div>
                                 <div class="col-md-6 col-sm-6">
                                    <h4><br>{{$service->title}}</h4>
                                    <p><br>{{$service->details}}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endif
                  @endforeach
               @endif
            </div>
         </div>
      </div>
      <div class="products">
         <div class="main-products">
            <h2>News Update</h2>
            <div class="product-slidr">
               <div class="slider">
                  @if(count($news) > 0)
                     @foreach($news as $new)
                        <div>
                           <div class="prod-box">
                              <div class="prod-i" onmouseenter="document.getElementById('new-lay{{$new->id}}').style.display = 'inline';" onmouseleave="document.getElementById('new-lay{{$new->id}}').style.display = 'none';">
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
                                    <a href="new_single/{{$new->id}}">
                                      <div class="cover-lay" id="new-lay{{$new->id}}">
                                        <i style="color: white; padding-top: 50%;" class="fas fa-plus"></i>
                                      </div>
                                    </a>
                                 @elseif($new->type == 'video')
                                    <a href="new_single/{{$new->id}}">
                                       <div class="cover-lay" id="new-lay{{$new->id}}">
                                          <i style="color: white; padding-top: 50%;" class="fas fa-play"></i>
                                       </div>
                                    </a>
                                 @else

                                 @endif
                              </div>
                              <div class="prod-dit clearfix">
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
                        </div>
                     @endforeach
                  @else
                      <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                        <h3>No News has been added to this site</h3>
                      </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <div class="products">
         <div class="main-products">
            <h2>Gallery</h2>
            <div class="product-slidr">
               <div class="slider">
                  @if(count($galleries) > 0)
                     @foreach($galleries as $gallery)
                        <div>
                           <div class="prod-box">
                              <div class="prod-i" onmouseenter="document.getElementById('gallery-lay{{$gallery->id}}').style.display = 'inline';" onmouseleave="document.getElementById('gallery-lay{{$gallery->id}}').style.display = 'none';">
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
                                       <div class="cover-lay" id="cover-lay">
                                          <i style="color: white; padding-top: 50%;" class="fas fa-play"></i>
                                       </div>
                                    </a>
                                 @else

                                 @endif
                              </div>
                              <div class="prod-dit clearfix">
                                 <div class="dit-t clearfix">
                                    <div class="left-ti">
                                       <h4>{{$gallery->title}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  @else
                      <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                          <div style="text-align: center; padding:10px; background-color: white;">
                              <h3>No gallery has been added to this site</h3>
                          </div>
                      </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <div class="products">
         <div class="main-products">
            <h2>Latest Events</h2>
            <div class="product-slidr">
               <div class="slider">
                  @if(count($events) > 0)
                     @foreach($events as $event)
                        <div>
                           <div class="prod-box">
                              <div class="prod-i" onmouseenter="document.getElementById('event-lay{{$event->id}}').style.display = 'inline';" onmouseleave="document.getElementById('event-lay{{$event->id}}').style.display = 'none';">
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
                              <div class="prod-dit clearfix">
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
                                 <div class="dit-btn clearfix">
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
                        </div>
                     @endforeach
                  @else
                      <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                        <h3>No event has been added to this site</h3>
                      </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   @endsection