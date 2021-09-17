				<div class="row">
	                <div class="col-md-12"><br>
	                    @if(count($errors) > 0)
	                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                            <strong>ERROR!</strong>
	                            @foreach($errors->all() as $error)
	                                {{$error}}<br/>
	                            @endforeach-->
	                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">×</span>
	                            </a>
	                        </div> 
	                    @endif
	                    @if(session('success'))
	                        <div class="alert alert-success alert-dismissible fade show" role="alert">
	                            <strong>SUCCESS!</strong> {{session('success')}}
	                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">×</span>
	                            </a>
	                        </div>
	                        
	                    @elseif(session('error'))
	                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                            <strong>ERROR!</strong> {{session('error')}}
	                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">×</span>
	                            </a>
	                        </div>
	                    @else

	                    @endif
	                </div>
	                <div class="col-xl-12"><br>
		                <div class="row">
		                    @if(count($galleries) > 0)
		                        @foreach($galleries as $gallery)
		                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
		                                <div class="card card-figure">
		                                    <!-- .card-figure -->
		                                    <figure class="figure">
		                                        <div class="ellipsis row">
		                                            <div class="col-md-10">

		                                            </div>
		                                            <div class="col-md-2">
		                                                <i class="fas fa-list linka" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-gallery-{{$gallery->id}}" aria-controls="submenu-gallery-{{$gallery->id}}"></i>
		                                            </div>
		                                        </div>
		                                        <div class="collapse submenu" id="submenu-gallery-{{$gallery->id}}">
		                                            <a class="dropdown-item" href="{{route('galleryres', $gallery->id)}}"><i class="fas fa-edit"></i> &nbspRestore</a>
		                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalGallery{{$gallery->id}}"><i class=" fas fa-trash-alt"></i> &nbspDelete</a>
		                                        </div>
		                                        <!-- .figure-img -->
		                                        <div class="figure-img">
		                                            @if($gallery->type == 'image' && !empty($gallery->image))
		                                                @if(file_exists(storage_path().'/app/public/image/gallery/'.$gallery->image))
		                                                    <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/gallery/'.$gallery->image)}}" alt="" class="img-fluid">
		                                                @else
		                                                    <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
		                                                @endif
		                                            @elseif($gallery->type == 'video' && !empty($gallery->image))
		                                                @if(file_exists(storage_path().'/app/public/video/gallery/'.$gallery->video))
		                                                    @if(file_exists(storage_path().'/app/public/image/gallery/'.$gallery->image))
		                                                        <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/gallery/'.$gallery->image)}}" alt="" class="img-fluid">
		                                                    @else
		                                                        <img style="width: 100%; height: 250px;" src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
		                                                    @endif
		                                                @else
		                                                    <img style="width: 100%; height: 250px;" src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
		                                                @endif
		                                            @else
		                                                <img style="width: 100%; height: 250px;" src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
		                                            @endif
		                                            @if($gallery->type == 'image' && !empty($gallery->image))
		                                                <div class="figure-action">
		                                                    <a href="#" data-toggle="modal" data-target="#showModalGallery{{$gallery->id}}" class="btn btn-block btn-sm btn-primary">View Photo</a>
		                                                </div>
		                                            @elseif($gallery->type == 'video' && !empty($gallery->image))
		                                                <a href="#" data-toggle="modal" data-target="#showModalGallery{{$gallery->id}}" class="img-link">
		                                                    <div class="tile tile-circle">
		                                                        <span><i style="font-size: 55px; color: white;" class="far fa-play-circle fa-2x"></i></span>
		                                                    </div>
		                                                </a>
		                                            @else

		                                            @endif
		                                        </div>
		                                        <!-- /.figure-img -->
		                                        <figcaption class="figure-caption">
		                                            <h5 class="figure-title"><a href="#" data-toggle="modal" data-target="#showModal{{$gallery->id}}" class="img-link">{{$gallery->title}}</a></h5>
		                                        </figcaption>
		                                    </figure>
		                                    <!-- /.card-figure -->
		                                </div>
		                            </div>
		                            <div class="modal fade show" id="exampleModalGallery{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
		                                <div class="modal-dialog" role="document">
		                                    <div class="modal-content">
		                                        <div class="modal-header">
		                                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
		                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
		                                                <span aria-hidden="true">×</span>
		                                            </a>
		                                        </div>
		                                        <div class="modal-body">
		                                            <p>Are you sure you want to delete this gallery Permanently?</p>
		                                        </div>
		                                        <div class="modal-footer">
		                                            <form id="delete-form-gallery-{{ $gallery->id }}" method="post" action="{{ route('gallerydel',$gallery->id) }}" style="display: none">
		                                              {{ csrf_field() }}
		                                              {{ method_field('GET') }}
		                                            </form>
		                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
		                                            <a href="#" onclick="document.getElementById('delete-form-gallery-{{ $gallery->id }}').submit();" class="btn btn-primary">Confirm</a>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="modal fade show" id="showModalGallery{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" style="display: none;">
		                                <div class="modal-dialog" role="document">
		                                    <div class="modal-content">
		                                        <div class="modal-header">
		                                            <h5 class="modal-title" id="exampleModalLabel"><a href="#">{{$gallery->title}}</a></h5>
		                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
		                                                <span aria-hidden="true">×</span>
		                                            </a>
		                                        </div>
		                                        <div class="modal-body">
		                                            @if($gallery->type == 'image' && !empty($gallery->image))
		                                                @if(file_exists(storage_path().'/app/public/image/gallery/'.$gallery->image))
		                                                    <img class="d-block img-fluid" style="width: 100%; height: 370px;" src="{{asset('/storage/image/gallery/'.$gallery->image)}}" alt="Card image cap">
		                                                @else
		                                                    <img style="width: 100%; height: 370px;" src="/admin/assets/images/eco-product-img-1.png" alt="Card image cap" class="img-fluid">
		                                                @endif
		                                            @elseif($gallery->type == 'video' && !empty($gallery->video))
		                                                @if(file_exists(storage_path().'/app/public/video/gallery/'.$gallery->video))
		                                                    <div class="player" style="width: 100%; height: 370px;">
		                                                        <i class="far fa-play-circle video-play" style="display: inline; color: aliceblue; font-size: 75px;" id="show"></i>
		                                                        <i class="far fa-pause-circle video-play-button" style="display: none; color: aliceblue; font-size: 75px;" id="show_pause"></i>
		                                                        <i class="far fa-play-circle video-play-button" style="display: none; color: aliceblue; font-size: 75px;" id="show_play"></i>
		                                                        <i class="fas fa-redo-alt video-play-button" style="display: none; color: aliceblue; font-size: 75px;" onclick="replay()" id="show_replay"></i>
		                                                        <i class="fas fa-redo-alt video-play" style="display: none; color: aliceblue; font-size: 75px;" id="replay"></i>
		                                                        <div id="overlay" class="overlay">
		                                                            <video class="player__video viewer vid" style="height: 370px; width: 100%; background-color: black;" onclick="showPlay()" onended="showReplay()" poster="{{asset('/storage/image/gallery/'.$gallery->image)}}">
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
		                                                    <img style="width: 100%; height: 450px;" src="/admin/assets/images/eco-product-img-1.png" alt="Card image cap" class="img-fluid">
		                                                @endif
		                                            @else
		                                                <img style="width: 100%; height: 450px;" src="/admin/assets/images/eco-product-img-1.png" alt="Card image cap" class="img-fluid">
		                                            @endif
		                                        </div>
		                                        <div class="col-md-12">
		                                            {{$gallery->details}}
		                                        </div>
		                                        <div class="modal-footer">
		                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        @endforeach
		                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                            <nav aria-label="Page navigation example">
		                                <ul class="pagination">
		                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
		                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
		                                    <li class="page-item active"><a class="page-link " href="#">2</a></li>
		                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
		                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
		                                </ul>
		                            </nav>
		                        </div>
		                    @else
		                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
		                            <div style="text-align: center; padding:10px; background-color: white;">
		                                <h3>No gallery has been Deleted</h3>
		                            </div>
		                        </div>
		                    @endif
		                </div>
		            </div>
	                <!-- ============================================================== -->
	                <!-- end campaign activities   -->
	                <!-- ============================================================== -->
	            </div>