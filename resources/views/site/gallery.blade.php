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
                                    @if(count($galleries) > 0)
                                       @foreach($galleries as $gallery)
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
               </div>
            </div>
         </div>
      </div>
   @endsection