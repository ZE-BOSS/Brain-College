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
	                <div class="col-xl-12">
                    	<div class="row">
	                        @if(count($events) > 0)
	                            @foreach($events as $event)
	                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
	                                    <div class="card card-figure">
	                                        <!-- .card-figure -->
	                                        <figure class="figure">
	                                            <div class="ellipsis row">
	                                                <div class="col-md-10">

	                                                </div>
	                                                <div class="col-md-2">
	                                                    <i class="fas fa-list linka" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-event-{{$event->id}}" aria-controls="submenu-event-{{$event->id}}"></i>
	                                                </div>
	                                            </div>
	                                            <div class="collapse submenu" id="submenu-event-{{$event->id}}">
	                                                <a class="dropdown-item" href="{{route('eventres', $event->id)}}"><i class="fas fa-eye"></i> &nbspRestore</a>
	                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalEvent{{$event->id}}"><i class=" fas fa-trash-alt"></i> &nbspDelete</a>
	                                            </div>
	                                            <!-- .figure-img -->
	                                            <div class="figure-img">
	                                                @if($event->type == 'image' && !empty($event->image))
	                                                    @if(file_exists(storage_path().'/app/public/image/event/'.$event->image))
	                                                        <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/event/'.$event->image)}}" alt="" class="img-fluid">
	                                                    @else
	                                                        <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
	                                                    @endif
	                                                @elseif($event->type == 'video' && !empty($event->image))
	                                                    @if(file_exists(storage_path().'/app/public/video/event/'.$event->video))
	                                                        @if(file_exists(storage_path().'/app/public/image/event/'.$event->image))
	                                                            <img style="width: 100%; height: 250px;"  src="{{asset('/storage/image/event/'.$event->image)}}" alt="" class="img-fluid">
	                                                        @else
	                                                            <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
	                                                        @endif
	                                                    @else
	                                                        <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
	                                                    @endif
	                                                @else
	                                                    <img src="/admin/assets/images/eco-product-img-1.png" alt="" class="img-fluid">
	                                                @endif
	                                                @if($event->type == 'image' && !empty($event->image))
	                                                    <div class="figure-description">
	                                                        <h4 class="figure-title">{{$event->title}}</h4>
	                                                        <p class="text-muted mb-0" style="font-size: 20px;">
	                                                            <small>{{$event->details}}</small>
	                                                        </p>
	                                                    </div>
	                                                    @if(date("Y/m/d") > $event->y.'/'.$event->m.'/'.$event->d)
	                                                        <div class="figure-tools">
	                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
	                                                            <span class="badge badge-danger">Closed</span>
	                                                        </div>
	                                                    @elseif(date("Y/m/d") < $event->y.'/'.$event->m.'/'.$event->d)
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
	                                                        <a href="{{route('events.show',$event->id)}}" class="btn btn-block btn-sm btn-primary">View More</a>
	                                                    </div>
	                                                @elseif($event->type == 'video' && !empty($event->image))
	                                                    <a href="{{route('events.show',$event->id)}}" class="img-link">
	                                                        <div class="tile tile-circle">
	                                                            <span><i style="font-size: 55px; color: white;" class="far fa-play-circle fa-2x"></i></span>
	                                                        </div>
	                                                    </a>
	                                                    @if(date("Y/m/d") > $event->y.'/'.$event->m.'/'.$event->d)
	                                                        <div class="figure-tools">
	                                                            <a href="#" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-data-transfer-download"></span></a>
	                                                            <span class="badge badge-danger">Closed</span>
	                                                        </div>
	                                                    @elseif(date("Y/m/d") < $event->y.'/'.$event->m.'/'.$event->d)
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
	                                                        <a class="btn btn-block btn-sm btn-primary" style="background-color: white; color: gray; border: 0px;">{{$event->details}}</a>
	                                                    </div>
	                                                @else

	                                                @endif
	                                            </div>
	                                            <!-- /.figure-img -->
	                                            <figcaption class="figure-caption">

	                                                <h5 class="figure-title"><a href="{{route('events.show',$event->id)}}">{{$event->title}}</a></h5>
	                                                @if(date("Y/m/d") > $event->y.'/'.$event->m.'/'.$event->d)
	                                                    <ul class="list-inline d-flex text-muted mb-0">
	                                                        <li class="list-inline-item mr-auto">
	                                                            <span class="oi oi-paperclip" style="color: red;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</span></li>
	                                                        <li class="list-inline-item">
	                                                            <span class="oi oi-calendar" style="color: red;">Time: {{$event->time}}</span>
	                                                        </li>
	                                                    </ul>
	                                                @elseif(date("Y/m/d") < $event->y.'/'.$event->m.'/'.$event->d)
	                                                    <ul class="list-inline d-flex text-muted mb-0">
	                                                        <li class="list-inline-item mr-auto">
	                                                            <span class="oi oi-paperclip" style="color: green;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</span></li>
	                                                        <li class="list-inline-item">
	                                                            <span class="oi oi-calendar" style="color: green;">Time: {{$event->time}}</span>
	                                                        </li>
	                                                    </ul>
	                                                @else
	                                                    <ul class="list-inline d-flex text-muted mb-0">
	                                                        <li class="list-inline-item mr-auto">
	                                                            <span class="oi oi-paperclip" style="color: orange;">Date: {{$event->d.'-'.$event->m.'-'.$event->y}}</span></li>
	                                                        <li class="list-inline-item">
	                                                            <span class="oi oi-calendar" style="color: orange;">Time: {{$event->time}}</span>
	                                                        </li>
	                                                    </ul>
	                                                @endif
	                                            </figcaption>
	                                        </figure>
	                                        <!-- /.card-figure -->
	                                    </div>
	                                </div>
	                                <div class="modal fade show" id="exampleModalEvent{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
	                                    <div class="modal-dialog" role="document">
	                                        <div class="modal-content">
	                                            <div class="modal-header">
	                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
	                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
	                                                    <span aria-hidden="true">×</span>
	                                                </a>
	                                            </div>
	                                            <div class="modal-body">
	                                                <p>Are you sure you want to delete this event Permanently?</p>
	                                            </div>
	                                            <div class="modal-footer">
	                                                <form id="delete-form-event-{{ $event->id }}" method="post" action="{{ route('eventdel',$event->id) }}" style="display: none">
	                                                  {{ csrf_field() }}
	                                                  {{ method_field('GET') }}
	                                                </form>
	                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
	                                                <a href="#" onclick="document.getElementById('delete-form-event-{{ $event->id }}').submit();" class="btn btn-primary">Confirm</a>
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
	                                    <h3>No event has been Deleted</h3>
	                                </div>
	                            </div>
	                        @endif
                    	</div>
                	</div>
	                <!-- ============================================================== -->
	                <!-- end campaign activities   -->
	                <!-- ============================================================== -->
	            </div>