@extends('layouts.app')

   @section('content')
      <div class="main-template-about">
         <div class="section-gradient">
            <div style=" position: absolute; z-index: -1; width: 100%; top: 0; left: 0; height: 100%; background: rgba(0, 0, 0, 0.7);"></div>
            <div style=" position: absolute; z-index: -2; width: 100%; top: 0; left: 0; height: 100%; background: url('{{asset('/storage/image/site/'.$site->aui)}}') no-repeat center;"></div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow fadeIn" data-wow-delay="0.0s">
                        <h1>
                           About Us
                        </h1>
                  </div>
                  <div class="col-lg-12" style="color: white;">
                     <?php echo $site->aboutus; ?>
                  </div>
                  <div class="col-lg-12">
                     <br><br>
                     <div class="row">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                           <div class="rectange">
                              <h3 class="rectange_title">Join Our Team</h3>
                              <p class="rectange_text">Do you want to be a part of our hardworking and dedicated team?</p>
                              <a href="contactus" class="rectange_link">Contact Us</a>
                           </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                           <div class="rectange">
                              <h3 class="rectange_title">Contact Us</h3>
                              <p class="rectange_text">Have any questions or requests? Get in touch with us.</p>
                              <a href="contactus" class="rectange_link">Contact Us</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection