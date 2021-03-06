@extends('layouts.admin')

    @section('content')
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" id="top">
                                <h2 class="pageheader-title">Event</h2>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Event</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{$event->title}}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- image cards  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong>
                                            @foreach($errors->all() as $error)
                                                {{$error}}<br/>
                                            @endforeach-->
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">??</span>
                                            </a>
                                        </div> 
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>SUCCESS!</strong> {{session('success')}}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">??</span>
                                            </a>
                                        </div>
                                        
                                    @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong> {{session('error')}}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">??</span>
                                            </a>
                                        </div>
                                    @else

                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="row" style="padding: 5px;">
                                            <div class="col-md-11">
                                                
                                            </div>
                                            <div class="col-md-1">
                                                <i class="fas fa-list linka" href="#" style="color: gray; font-size: 15px;" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$id}}" aria-controls="submenu-{{$id}}"></i>  
                                            </div>
                                        </div>
                                        <div class="collapse submenu" id="submenu-{{$id}}">
                                            <a class="dropdown-item" href="{{route('events.edit', $id)}}"><i class="fas fa-edit" style="color: gray; font-size: 15px;"></i> &nbspEdit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt" style="color: gray; font-size: 15px;"></i> &nbspDelete</a>
                                        </div>
                                        @if($event->type == 'image' && !empty($event->image))
                                            @if(file_exists(storage_path().'/app/public/image/event/'.$event->image))
                                                <img class="d-block img-fluid" style="width: 100%; height: 370px;" src="{{asset('/storage/image/event/'.$event->image)}}" alt="Card image cap">
                                            @else
                                                <img style="width: 100%; height: 370px;" src="/admin/assets/images/eco-product-img-1.png" alt="Card image cap" class="img-fluid">
                                            @endif
                                        @elseif($event->type == 'video' && !empty($event->video))
                                            @if(file_exists(storage_path().'/app/public/video/event/'.$event->video))
                                                <div class="player" style="width: 100%; height: 370px;">
                                                    <i class="far fa-play-circle video-play" style="display: inline; color: aliceblue; font-size: 75px;" id="show"></i>
                                                    <i class="far fa-pause-circle video-play-button" style="display: none; color: aliceblue; font-size: 75px;" id="show_pause"></i>
                                                    <i class="far fa-play-circle video-play-button" style="display: none; color: aliceblue; font-size: 75px;" id="show_play"></i>
                                                    <i class="fas fa-redo-alt video-play-button" style="display: none; color: aliceblue; font-size: 75px;" onclick="replay()" id="show_replay"></i>
                                                    <i class="fas fa-redo-alt video-play" style="display: none; color: aliceblue; font-size: 75px;" id="replay"></i>
                                                    <div id="overlay" class="overlay">
                                                        <video class="player__video viewer vid" style="height: 370px; width: 100%; background-color: black;" onclick="showPlay()" onended="showReplay()" poster="{{asset('/storage/image/event/'.$event->image)}}">
                                                            <source src="{{asset('/storage/video/event/'.$event->video)}}">
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
                                        <div class="card-body">
                                            <h3 class="card-title">{{$event->title}}</h3>
                                            <p class="card-text">{{$event->details}}</p>
                                            <p class="text-muted">
                                                <ul class="list-unstyled arrow">
                                                    @if(date("Y/m/d") > $event->y.'/'.$event->m.'/'.$event->d)
                                                        <li style="color: red;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</li>
                                                        <li style="color: red;">Time: {{$event->time}}</li>
                                                    @elseif(date("Y/m/d") < $event->y.'/'.$event->m.'/'.$event->d)
                                                        <li style="color: green;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</li>
                                                        <li style="color: green;">Time: {{$event->time}}</li>
                                                    @else
                                                        <li style="color: orange;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</li>
                                                        <li style="color: orange;">Time: {{$event->time}}</li>
                                                    @endif
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @php $i=0; @endphp
                            @if(count($sevents) > 0)
                                @foreach($sevents as $sevent)
                                    @if(count($sevents) > 0 && $i < 3)
                                        @if($id == $sevent->id)

                                        @else
                                            @if(date("Y/m/d") < $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                <div class="col-md-12">
                                                    <div class="card card-figure">
                                                        <!-- .card-figure -->
                                                        <figure class="figure">
                                                            <div class="ellipsis row">
                                                                <div class="col-md-10">

                                                                </div>
                                                                <div class="col-md-2">
                                                                    <i class="fas fa-list linka" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$sevent->id}}" aria-controls="submenu-{{$sevent->id}}"></i>
                                                                </div>
                                                            </div>
                                                            <div class="collapse submenu" id="submenu-{{$sevent->id}}">
                                                                <a class="dropdown-item" href="{{route('events.show', $sevent->id)}}"><i class="fas fa-eye"></i> &nbspView</a>
                                                                <a class="dropdown-item" href="{{route('events.edit', $sevent->id)}}"><i class="fas fa-edit"></i> &nbspEdit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal{{$sevent->id}}"><i class=" fas fa-trash-alt"></i> &nbspDelete</a>
                                                            </div>
                                                            <!-- .figure-img -->
                                                            <div class="figure-img">
                                                                @if($sevent->type == 'image' && !empty($sevent->image))
                                                                    @if(file_exists(storage_path().'/app/public/image/event/'.$sevent->image))
                                                                        <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/event/'.$sevent->image)}}" alt="" class="img-fluid">
                                                                    @else
                                                                        <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
                                                                    @endif
                                                                @elseif($sevent->type == 'video' && !empty($sevent->image))
                                                                    @if(file_exists(storage_path().'/app/public/video/event/'.$sevent->video))
                                                                        @if(file_exists(storage_path().'/app/public/image/event/'.$sevent->image))
                                                                            <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/event/'.$sevent->image)}}" alt="" class="img-fluid">
                                                                        @else
                                                                            <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
                                                                        @endif
                                                                    @else
                                                                        <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
                                                                    @endif
                                                                @else
                                                                    <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
                                                                @endif
                                                                @if($sevent->type == 'image' && !empty($sevent->image))
                                                                    <div class="figure-description">
                                                                        <h4 class="figure-title">{{$sevent->title}}</h4>
                                                                        <p class="text-muted mb-0" style="font-size: 20px;">
                                                                            <small>{{$sevent->details}}</small>
                                                                        </p>
                                                                    </div>
                                                                    @if(date("Y/m/d") > $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                                        <div class="figure-tools">
                                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                                                            <span class="badge badge-danger">Closed</span>
                                                                        </div>
                                                                    @elseif(date("Y/m/d") < $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                                        <div class="figure-tools">
                                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                                                            <span class="badge badge-success">Open</span>
                                                                        </div>
                                                                    @else
                                                                        <div class="figure-tools">
                                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                                                            <span class="badge badge-warning">Ongoing</span>
                                                                        </div>
                                                                    @endif
                                                                    <div class="figure-action">
                                                                        <a href="{{route('events.show',$sevent->id)}}" class="btn btn-block btn-sm btn-primary">View More</a>
                                                                    </div>
                                                                @elseif($sevent->type == 'video' && !empty($sevent->image))
                                                                    <a href="{{route('events.show',$sevent->id)}}" class="img-link">
                                                                        <div class="tile tile-circle">
                                                                            <span><i style="font-size: 55px; color: white;" class="far fa-play-circle fa-2x"></i></span>
                                                                        </div>
                                                                    </a>
                                                                    @if(date("Y/m/d") > $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                                        <div class="figure-tools">
                                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                                                            <span class="badge badge-danger">Closed</span>
                                                                        </div>
                                                                    @elseif(date("Y/m/d") < $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                                        <div class="figure-tools">
                                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                                                            <span class="badge badge-success">Open</span>
                                                                        </div>
                                                                    @else
                                                                        <div class="figure-tools">
                                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
                                                                            <span class="badge badge-warning">Ongoing</span>
                                                                        </div>
                                                                    @endif
                                                                    <div class="figure-action">
                                                                        <a class="btn btn-block btn-sm btn-primary" style="background-color: white; color: gray; border: 0px;">{{$sevent->details}}</a>
                                                                    </div>
                                                                @else
                                                                    <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
                                                                @endif
                                                            </div>
                                                            <!-- /.figure-img -->
                                                            <figcaption class="figure-caption">

                                                                <h5 class="figure-title"><a href="{{route('events.show',$event->id)}}">{{$sevent->title}}</a></h5>
                                                                @if(date("Y/m/d") > $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                                    <ul class="list-inline d-flex text-muted mb-0">
                                                                        <li class="list-inline-item mr-auto">
                                                                            <span class="oi oi-paperclip" style="color: red;">Date: {{$sevent->d.'-'.$sevent->m.'-'.$sevent->y}}</span></li>
                                                                        <li class="list-inline-item">
                                                                            <span class="oi oi-calendar" style="color: red;">Time: {{$sevent->time}}</span>
                                                                        </li>
                                                                    </ul>
                                                                @elseif(date("Y/m/d") < $sevent->y.'/'.$sevent->m.'/'.$sevent->d)
                                                                    <ul class="list-inline d-flex text-muted mb-0">
                                                                        <li class="list-inline-item mr-auto">
                                                                            <span class="oi oi-paperclip" style="color: green;">Date: {{$sevent->d.'-'.$sevent->m.'-'.$sevent->y}}</span></li>
                                                                        <li class="list-inline-item">
                                                                            <span class="oi oi-calendar" style="color: green;">Time: {{$sevent->time}}</span>
                                                                        </li>
                                                                    </ul>
                                                                @else
                                                                    <ul class="list-inline d-flex text-muted mb-0">
                                                                        <li class="list-inline-item mr-auto">
                                                                            <span class="oi oi-paperclip" style="color: orange;">Date: {{$sevent->d.'-'.$sevent->m.'-'.$sevent->y}}</span></li>
                                                                        <li class="list-inline-item">
                                                                            <span class="oi oi-calendar" style="color: orange;">Time: {{$sevent->time}}</span>
                                                                        </li>
                                                                    </ul>
                                                                @endif
                                                            </figcaption>
                                                        </figure>
                                                        <!-- /.card-figure -->
                                                    </div>
                                                </div>
                                                <div class="modal fade show" id="exampleModal{{$sevent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">??</span>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this event?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="delete-form-{{ $sevent->id }}" method="post" action="{{ route('events.destroy',$sevent->id) }}" style="display: none">
                                                                  {{ csrf_field() }}
                                                                  {{ method_field('DELETE') }}
                                                                </form>
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                <a href="#" onclick="document.getElementById('delete-form-{{ $event->id }}').submit();" class="btn btn-primary">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             @endif
                                        @endif
                                        @php $i++; @endphp
                                    @endif 
                                @endforeach
                            @else
                                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div style="text-align: center; padding:10px; background-color: white;">
                                        <h3>No event to display</h3>
                                    </div>
                                </div>
                            @endif                    
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end image cards  -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this event?</p>
                    </div>
                    <div class="modal-footer">
                        <form id="delete-form-{{ $event->id }}" method="post" action="{{ route('events.destroy',$event->id) }}" style="display: none">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <a href="#" onclick="document.getElementById('delete-form-{{ $event->id }}').submit();" class="btn btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection