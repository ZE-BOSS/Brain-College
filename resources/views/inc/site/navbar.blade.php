      <header id="header" class="top-head">
         <!-- Static navbar -->
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-3 col-sm-12 left-rs">
                     <div class="navbar-header">
                        <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        </button>
                        @if(!empty($site->image) &&  file_exists(storage_path().'/app/public/image/site/'.$site->image))
                           <a href="{{url('/')}}" class="navbar-brand"><img style="width: 90px; height: 70px; padding: 5px;" src="{{asset('/storage/image/site/'.$site->image)}}" alt="{{$site->name}}"/></a>
                        @else
                           <a href="{{url('/')}}" class="navbar-brand"><img width="90" src="\site\images\idea.png" alt="{{$site->name}}"/></a>
                        @endif
                     </div>
                  </div>
                  <div class="col-md-9 col-sm-12">
                     <div class="right-nav">
                        <div class="login-sr">
                           <div class="login-signup">
                              <ul>
                                 <li><a href="#"><a data-toggle="modal" data-target="#myModal" href="#"><img width="20" src="/site/images/list-img-06.png" alt="" /> <span>Login</span></a></a></li>
                                 <li><a class="custom-b" href="student_apply">Apply</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="nav-b hidden-xs">
                           <div class="nav-box">
                              <ul>
                                 <li><a href="{{url('/')}}">Home</a></li>
                                 <li><a href="{{url('services')}}">Services</a></li>
                                 <li><a href="{{url('news')}}">News</a></li>
                                 <li><a href="{{url('event')}}">Events</a></li>
                                 <li><a href="{{url('gallery')}}">Gallery</a></li>
                                 <li><a href="{{url('aboutus')}}">About Us</a></li>
                                 <li><a href="{{url('contactus')}}">Contact Us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--/.container-fluid --> 
         </nav>
      </header>
      <!-- Modal -->
      <div class="modal fade lug" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Login</h4>
               </div>
               <div class="modal-body">
                  <ul>
                     <li><a href="student_portal"><img src="/site/images/icon-b2.png" alt="" /> Student</a></li>
                     <li><a href="staff_portal"><img src="/site/images/works-icon-03.png" alt="" /> Staff</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>