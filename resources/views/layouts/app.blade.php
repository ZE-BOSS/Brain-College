<!DOCTYPE html>
<html lang="en">
   <head>
   		<?php
            use App\Model\site;
            $site = site::find(1);
            echo'<link rel="shortcut icon" type="image/x-icon" href="'.asset('/storage/image/site/'.$site->image).'">';
        ?>
        @include('inc.site.index')
   </head>
   <body>
        @include('inc.site.navbar')

        @include('inc.site.sidebar')

        @yield('content')

        @include('inc.site.footer')

        @include('inc.site.exit')
   </body>
</html>