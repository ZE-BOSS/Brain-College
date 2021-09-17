@extends('layouts.app')

   @section('content') 
      <div class="cooming-soon-box">
         <div class="soon-gradient">
            <div style=" position: absolute; z-index: -1; width: 100%; top: 0; left: 0; height: 100%; background: rgba(0, 0, 0, 0.7);"></div>
            <div style=" position: absolute; z-index: -2; width: 100%; top: 0; left: 0; height: 100%; background: url('{{asset('/storage/image/site/'.$site->cui)}}') no-repeat center;"></div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-lg-offset-3">
                     <div class="top-soon clearfix">
                        
                     </div>
                     <div class="expand">
                        <h2>Contact Us</h2>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="section contact_section">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="full">
                                    <div class="row">
                                       <div class="col-sm-12 col-md-10 offset-lg-1">
                                          <div class="full contact_form">
                                             <form class="contact_form_inner" action="#">
                                                <fieldset>
                                                   <div class="field">
                                                      <input type="text" name="name" placeholder="Your name">
                                                   </div>
                                                   <div class="field">
                                                      <input type="email" name="email" placeholder="Email">
                                                   </div>
                                                   <div class="field">
                                                      <input type="text" name="phone_no" placeholder="Phone number">
                                                   </div>
                                                   <div class="field">
                                                      <textarea placeholder="Message"></textarea>
                                                   </div><br>
                                                   <div class="field center">
                                                      <button class="margin-top_30">SEND</button>
                                                   </div>
                                                </fieldset>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 padding_0">
                                 <div class="full">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="full map_section">
                                             <div id="map">
                                                <div id="googleMap" style="width:100%;height:440px;"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <footer class="footer-box">
                        <div class="container" style="color: white;">
                           <div class="row">
                              <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                                 <div class="full footer_blog f_icon_1">
                                    <p>
                                       @if(count($branches) > 0)
                                          @foreach($branches as $branch)
                                             @if($site->address == $branch->id)
                                                {{$branch->name}}<br>
                                                {{$branch->address}}
                                             @endif
                                          @endforeach
                                       @endif
                                    </p>
                                 </div>
                              </div>

                              <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                                 <div class="full footer_blog f_icon_2">
                                    <p>Phone<br><small>{{$site->phoneno}}<br>Monday - Friday<br>08:00 am - 05:00 pm</small></p>
                                 </div>
                              </div>

                              <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                                 <div class="full footer_blog f_icon_3">
                                     <p>Email<br><small>{{$site->email}}</small></p>
                                 </div>
                              </div>

                              <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
                                 <div class="full footer_blog_last">
                                    <p>Social media</p>
                                    <p>
                                       <ul class="list-inline socials">
                                          @if(!empty($site->facebook))
                                             <li><a href="{{$site->facebook}}" style="color: white;" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                          @endif
                                          @if(!empty($site->twitter))
                                             <li><a href="{{$site->twitter}}" style="color: white;" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                          @endif
                                          @if(!empty($site->instagram))
                                             <li><a href="{{$site->instagram}}" style="color: white;" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                          @endif
                                          @if(!empty($site->linkin))
                                             <li><a href="{{$site->linkin}}" style="color: white;" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                          @endif
                                          @if(!empty($site->pinterest))
                                             <li><a href="{{$site->pinterest}}" style="color: white;" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                          @endif
                                          @if(!empty($site->youtube))
                                             <li><a href="{{$site->youtube}}" style="color: white;" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                          @endif
                                       </ul>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </footer>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection