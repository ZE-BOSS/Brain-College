      <meta charset="UTF-8">
      @if(Request::is('/'))
            <title>{{$site->name}}</title>
      @endif
      @if(Request::is('services'))
            <title>{{$site->name}} - Services</title>
      @endif
      @if(Request::is('gallery'))
            <title>{{$site->name}} - Gallery</title>
            <link rel="stylesheet" href="/site/fonts/fontawesome/css/fontawesome-all.css">
      @endif
      @if(Request::is('gallery_single/'.$id))
            <title>{{$site->name}} - Gallery</title>
            <link rel="stylesheet" href="/site/fonts/fontawesome/css/fontawesome-all.css">
      @endif
      @if(Request::is('news'))
            <title>{{$site->name}} - News</title>
            <link rel="stylesheet" href="/site/fonts/fontawesome/css/fontawesome-all.css">
      @endif
      @if(Request::is('news_single/'.$id))
            <title>{{$site->name}} - News</title>
            <link rel="stylesheet" href="/site/fonts/fontawesome/css/fontawesome-all.css">
      @endif
      @if(Request::is('event'))
            <title>{{$site->name}} - Events</title>
            <link rel="stylesheet" href="/site/fonts/fontawesome/css/fontawesome-all.css">
      @endif
      @if(Request::is('event_single/'.$id))
            <title>{{$site->name}} - Events</title>
            <link rel="stylesheet" href="/site/fonts/fontawesome/css/fontawesome-all.css">
      @endif
      @if(Request::is('aboutus'))
            <title>{{$site->name}} - About Us</title>
      @endif
      @if(Request::is('contactus'))
            <title>{{$site->name}} - Contact Us</title>
      @endif
      @if(Request::is('terms'))
            <title>{{$site->name}} - Terms & Conditions</title>
      @endif
      @if(Request::is('privacies'))
            <title>{{$site->name}} - Privacy Policies</title>
      @endif
      @if(Request::is('FAQs'))
            <title>{{$site->name}} - FAQs</title>
      @endif
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="/site/css/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="/site/css/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="/site/css/animate-wow.css">
      <!--main css-->
      <link rel="stylesheet" href="/site/css/style.css">
      <link rel="stylesheet" href="/site/css/bootstrap-select.min.css">
      <link rel="stylesheet" href="/site/css/slick.min.css">
      <!--responsive css-->
      <link rel="stylesheet" href="/site/css/responsive.css">
      <link rel="stylesheet" href="/site/player/style.css">
      @if(Request::is('services'))
            <link rel="stylesheet" href="/site/css/pricing.css">
      @endif
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>