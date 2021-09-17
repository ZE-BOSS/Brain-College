@extends('layouts.app')

   @section('content')
      <div class="faq-box wow fadeIn" data-wow-delay="0.0s">
         <div class="container">
            <div class="row">
               <div class="faq-main-box">
                  <h2>Frequestly Asked Questions And Answers</h2>
                  @if(count($faqs) > 0)
                     @foreach($faqs as $faq)
                        <div class="col-md-6">
                           <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="heading-faq-{{$faq->id}}">
                                    <h4 class="panel-title">
                                       <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#faq-{{$faq->id}}" aria-expanded="true" aria-controls="faq-{{$faq->id}}">
                                          {{$faq->question}}
                                       </a>
                                    </h4>
                                 </div>
                                 <div id="faq-{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-faq-{{$faq->id}}">
                                    <div class="panel-body">{{$faq->answer}}</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  @else
                     <div class="col-md-12">
                        <p>There Are No Frequently Asked Questions.</p>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   @endsection