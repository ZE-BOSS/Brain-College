@extends('layouts.app')

   @section('content')  
      <div class="terms-conditions">
         <div class="terms-title">
            <div class="container">
               <div class="row">
                  <ol class="breadcrumb">
                     <li><a href="/">Home </a></li>
                     <li class="active">Terms and conditions</li>
                  </ol>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="terms-box">
                     <?php echo $site->tc; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection