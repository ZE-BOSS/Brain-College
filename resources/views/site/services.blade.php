@extends('layouts.app')

   @section('content')      
      <div class="page-template-pricing">
         <div class="section-pricing">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 text-center">
                     <h2>Our Services</h2>
                  </div>
               </div>
               <div class="row pricing-f-b">
                  @if(count($services) > 0)
                     @foreach($services as $service)
                        <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.{{$service->id}}s">
                           <div class="panel panel-default">
                              <div class="panel-body">
                                 <img src="{{asset('/storage/image/service/'.$service->image)}}" style="width: 100%; height: 250px;" class="icon-small" alt=""><br><br>
                                 <h4 style="font-weight: 30px;">{{$service->title}}</h4><br>
                                 <p style="color: gray;">{{$service->details}}</p>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  @else
                     <div class="col-md-12 text-center">
                        <h5>Services Unavailable!</h5>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   @endsection