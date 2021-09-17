	<!--main js--> 
	  <script src="/site/js/jquery-1.12.4.min.js"></script> 
	  <!--bootstrap js--> 
	  <script src="/site/js/bootstrap.min.js"></script> 
	  <script src="/site/js/bootstrap-select.min.js"></script>
	  <script src="/site/js/slick.min.js"></script> 
	  <script src="/site/js/wow.min.js"></script>
	  <!-- player js -->
        <script src="/site/player/scripts.js"></script>
        <script src="/site/player/fontawsome.js"></script>
	  @if(Request::is('services'))
            <script src="/site/js/index.js"></script>
      @endif
	  <!--custom js--> 
	  <script src="/site/js/custom.js"></script>
	  <script src="/site/js/swfobject.js"></script>
	  <script src="/site/js/modernizr.video.js"></script>
	  <script src="/site/js/video_background.js"></script>
	  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&amp;callback=initMap"></script>
	  <script>
        jQuery(document).ready(function($) {
            var Video_back = new video_background($("#main_vid"), { 
                "position": "absolute", //Follow page scroll
                "z-index": "-2",        //Behind everything
                "top": "70px",
			    "left": "0px",
			    "right": "0px",
			    "bottom": "99px",
			    "overflow": "hidden",
                "loop": true,           //Loop when it reaches the end
                "autoplay": true,       //Autoplay at start
                "muted": true,          //Muted at start
                "mp4":"{{asset('/storage/video/site/'.$site->background2)}}" ,     //Path to video mp4 format
                "video_ratio": 1.7778,              // width/height -> If none provided sizing of the video is set to adjust
                "fallback_image": "images/dummy.png",   //Fallback image path
                "priority": "html5"             //Priority for html5 (if set to flash and tested locally will give a flash security error)
            });
        });
    </script>
