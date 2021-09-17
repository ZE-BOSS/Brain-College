      <footer>
         <div class="main-footer">
            <div class="container">
               <div class="row">
                  <div class="footer-top clearfix">
                     <div class="col-md-2 col-sm-6">
                        <h4 style="color: white; font-weight: 45px;">Get Latest Updates From Us</h4>
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <div class="form-box">
                           <input type="text" placeholder="Enter yopur e-mail" />
                           <button>Continue</button>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-12">
                        <div class="help-box-f">
                           <h4>Need Help? Call us on {{$site->phoneno}} for assistance</h4>
                           <p></p>
                        </div>
                     </div>
                  </div>
                  <div class="footer-link-box clearfix">
                     <div class="col-md-6 col-sm-6">
                        <div class="left-f-box">
                           <div class="col-sm-6">
                              <h2>Students On {{$site->name}}</h2>
                              <ul>
                                 <li><a href="{{url('contactus')}}">Not Yet a Student? Contact us</a></li>
                                 <li><a href="{{url('student_portal')}}"> I am a Student | Login</a></li>
                              </ul>
                           </div>
                           <div class="col-sm-6">
                              <h2>Staffs On {{$site->name}}</h2>
                              <ul>
                                 <li><a href="{{url('contactus')}}">Want to be a Staff? Contact us</a></li>
                                 <li><a href="{{url('staff_portal')}}">I am a Staff | Login</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <div class="right-f-box">
                           <h2>{{$site->name}}</h2>
                           <ul class="col-sm-4">
                              <li><a href="{{url('aboutus')}}">About {{$site->name}}</a></li>
                              <li><a href="{{url('contactus')}}">Contact us</a></li>
                              <li><a href="{{url('services')}}">Services</a></li>
                              <li><a href="{{url('events')}}">Events</a></li>
                              <li><a href="{{url('galleries')}}">Gallery</a></li>
                           </ul>
                           <ul class="col-sm-4">
                              <li><a href="{{url('terms')}}">Terms of use</a></li>
                              <li><a href="{{url('privacies')}}">Privacy Policy</a></li>
                              <li><a href="{{url('Other_faq')}}">FAQs</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-8">
                     <p>
                        @if(!empty($site->image) &&  file_exists(storage_path().'/app/public/image/site/'.$site->image))
                           <a href="{{url('/')}}"><img width="90" src="{{asset('/storage/image/site/'.$site->image)}}" alt="{{$site->name}}" style="margin-top: -5px;" /> </a>
                        @else
                           <a href="{{url('/')}}"><img width="90" src="\site\images\idea.png" alt="{{$site->name}}" style="margin-top: -5px;" /> </a>
                        @endif
                        <?php 
                          use App\Model\site;

                          $site = site::find(1);

                          echo $site->footer;
                        ?>
                     </p>
                  </div>
                  <div class="col-md-4">
                     <ul class="list-inline socials">
                        @if(!empty($site->facebook))
                           <li><a href="{{$site->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        @endif
                        @if(!empty($site->twitter))
                           <li><a href="{{$site->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        @endif
                        @if(!empty($site->instagram))
                           <li><a href="{{$site->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        @endif
                        @if(!empty($site->linkin))
                           <li><a href="{{$site->linkin}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        @endif
                        @if(!empty($site->pinterest))
                           <li><a href="{{$site->pinterest}}" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        @endif
                        @if(!empty($site->youtube))
                           <li><a href="{{$site->youtube}}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        @endif
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>