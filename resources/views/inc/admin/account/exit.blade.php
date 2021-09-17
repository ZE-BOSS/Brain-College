        <script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="/admin/assets/libs/js/main-js.js"></script>
        <!-- data table JS -->
	    <script src="/admin/data-table/js/bootstrap-table.js"></script>
	    <script src="/admin/data-table/js/tableExport.js"></script>
	    <script src="/admin/data-table/js/data-table-active.js"></script>
	    <script src="/admin/data-table/js/bootstrap-table-editable.js"></script>
	    <script src="/admin/data-table/js/bootstrap-editable.js"></script>
	    <script src="/admin/data-table/js/bootstrap-table-resizable.js"></script>
	    <script src="/admin/data-table/js/colResizable-1.5.source.js"></script>
	    <script src="/admin/data-table/js/bootstrap-table-export.js"></script>
	    <!-- main JS -->
	    <script type="text/javascript">
	    	@if(count($accounts) > 0 && count($pays) && count($students) > 0 && count($classes) > 0)
	    		@foreach($pays as $pay)
                	@foreach($accounts as $account)
                		@foreach($students as $student)
                			@foreach($classes as $class)
                				@if($student->id == $account->studentid && $account->classid == $class->id && $pay->class == $class->id && $pay->term == $account->term && $pay->session == $account->session)
					                $(document).ready(function(){
					                    $("#pays{{$pay->id}}s{{$student->id}}").on('submit', function(e){
					                        e.preventDefault();
					                        var payment=$("#payment{{$pay->id}}s{{$student->id}}").val();
					                        var clas=$('#class{{$pay->id}}s{{$student->id}}').val();
					                        var student=$('#student{{$pay->id}}s{{$student->id}}').val();
					                        var pay=$('#pay{{$pay->id}}s{{$student->id}}').val();

					                        var err=$('#err{{$pay->id}}s{{$student->id}}');
					                        var suc=$('#suc{{$pay->id}}s{{$student->id}}');
					                        var errmain=$('#errmain{{$pay->id}}s{{$student->id}}');
					                        var sucmain=$('#sucmain{{$pay->id}}s{{$student->id}}');

					                        if(payment == ''){
					                            err.html('Enter amount to be paid before submitting');
					                            errmain.css({'display':'block', 'width':'100%'});
					                            sucmain.css({'display':'none', 'width':'100%'});
					                        }else if(clas == '' || student == '' || pay == ''){
					                        	err.html('An Error Occured!');
					                            errmain.css({'display':'block', 'width':'100%'});
					                            sucmain.css({'display':'none', 'width':'100%'});
					                        }else{
						                        $.ajax({
						                            //type: 'PUT',
						                            method: 'GET',
						                            url: "/main_controller_panel/pay/"+id+'',
						                            data: {
						                                    payment:payment,
						                                    clas:clas,
						                                    student:student,
						                                    pay:pay
						                            },
						                            success: function(response){
						                                //console.log(response);
						                                suc.html('Submitted Payment Successfully'); 
						                                sucmain.css({'display':'block', 'width':'100%'});
						                                errmain.css({'display':'none', 'width':'100%'});
						                                //$('#reload').load('{{route("payments.index")}}');
						                                window.location.reload();
						                                //alert(fees);
						                            },
						                            error: function(error){
						                                //console.log(error);
						                                err.html('Unable to Submit Payment');
						                                errmain.css({'display':'block', 'width':'100%'});
						                                sucmain.css({'display':'none', 'width':'100%'});
						                                //alert("/main_controller_panel/pay/"+id+'');
						                            }
						                        });
						                    }
					                    });
					                });
								@endif
		                    @endforeach
		                @endforeach
		            @endforeach
		        @endforeach
		    @endif
       	</script>
       	<script type="text/javascript">
       		@if(count($payments) > 0)
	    		@foreach($payments as $payment)
	    			$(document).ready(function(){
	                    $("#staff_pays{{$payment->id}}").on('submit', function(e){
	                        e.preventDefault();
	                        var staff_id=$("#staff_id{{$payment->id}}").val();
	                        var amount_to_pay=$('#amount_to_pay{{$payment->id}}').val();
	                        var amount_payed=$('#amount_payed{{$payment->id}}').val();

	                        var err=$('#err{{$payment->id}}');
	                        var suc=$('#suc{{$payment->id}}');
	                        var errmain=$('#errmain{{$payment->id}}');
	                        var sucmain=$('#sucmain{{$payment->id}}');

	                        if(amount_to_pay == '' && amount_payed == ''){
	                            err.html('Fill at least one(1) input before submitting');
	                            errmain.css({'display':'block', 'width':'100%'});
	                            sucmain.css({'display':'none', 'width':'100%'});
	                        }else if(staff_id == ''){
	                        	err.html('An Error Occured!');
	                            errmain.css({'display':'block', 'width':'100%'});
	                            sucmain.css({'display':'none', 'width':'100%'});
	                        }else{
		                        $.ajax({
		                            //type: 'PUT',
		                            method: 'GET',
		                            url: "/main_controller_panel/staff/"+{{$payment->id}}+'',
		                            data: {
		                                    staff_id:staff_id,
		                                    amount_to_pay:amount_to_pay,
		                                    amount_payed:amount_payed
		                            },
		                            success: function(response){
		                                //console.log(response);
		                                suc.html('Submitted Payment Successfully'); 
		                                sucmain.css({'display':'block', 'width':'100%'});
		                                errmain.css({'display':'none', 'width':'100%'});
		                                $('#reload').load('{{route("payments.index")}}');
		                                //window.location.reload();
		                                //alert('success');
		                            },
		                            error: function(error){
		                                //console.log(error);
		                                err.html('Unable to Submit Payment');
		                                errmain.css({'display':'block', 'width':'100%'});
		                                sucmain.css({'display':'none', 'width':'100%'});
		                                //alert("/main_controller_panel/pay/"+id+'');
		                            }
		                        });
		                    }
	                    });
	                });
	    		@endforeach
		    @endif
       	</script>
        <script type="text/javascript">
            // $(document).ready(function(){
            //         setInterval(function () {
            //                 $('#sub').load("{{route('payments.show', $id)}}")
            //         }, 1000);
            // });
        </script>