@extends('layouts.app')

   @section('content') 
      <div class="terms-conditions">
         <div class="terms-title">
            <div class="container">
               <div class="row">
                  <ol class="breadcrumb">
                     <li><a href="/">Home</a></li>
                     <li class="active">Privacy Policies</li>
                  </ol>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="terms-box">
                     <?php echo $site->pp; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection