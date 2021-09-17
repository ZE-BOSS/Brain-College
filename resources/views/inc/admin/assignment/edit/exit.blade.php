		<!-- Main -->
		<script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	    <!-- bootstap bundle js-->
	    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	    <!-- slimscroll js-->
	    <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
	    <!-- main js-->
	    <script src="/admin/assets/libs/js/main-js.js"></script>

	    <script src="/admin/assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>

		<!-- Vendor -->
		<script src="/admin/test/assets/vendor/jquery/jquery.js"></script>
		<script src="/admin/test/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/admin/test/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/admin/test/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/admin/test/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/admin/test/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="/admin/test/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="/admin/test/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="/admin/test/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="/admin/test/assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/admin/test/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/admin/test/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/admin/test/assets/javascripts/theme.init.js"></script>

		<!-- Examples -->
		<script src="/admin/test/assets/javascripts/forms/examples.wizard.js"></script>

	    <script>
	        $('.collapse').on('shown.bs.collapse', function() {
	            $(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");
	        }).on('hidden.bs.collapse', function() {
	            $(this).parent().find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");
	        });

	        $('.panel-heading a').click(function() {
	            $('.panel-heading').removeClass('active');

	            //If the panel was open and would be closed by this click, do not active it
	            if (!$(this).closest('.panel').find('.panel-collapse').hasClass('in'))
	                $(this).parents('.panel-heading').addClass('active');
	        });
	    </script>
	    <script type="text/javascript">
	    	function mainBack(){
		    	var declare = document.getElementById('declare');
		    	var back = document.getElementById('back');
				var assignment = document.getElementById('assignment');
				declare.style.display = 'inline';
				assignment.style.display = 'none';
				back.style.display = 'none';
			}
	    </script>
	    <script type="text/javascript">
			function getSubject(){
				var gclass = document.getElementById('dec_class');
				var gsubject = document.getElementById('dec_subject');
				let number = 0; 
				var class_val = document.getElementById('w1-class');
				var view_class = document.getElementById('view_class');
				gclass.className = "col-md-6";
				gsubject.style.display = 'inline';															
				for (let option of Array.from(class_val.options)) { 
					if (option.selected) { 
						number += Number(option.value); 
					} 
				} 
				//view_class.textContent = number; 
				$.ajax({
					type:'GET',
					dataType:'json',
					url: '/main_controller_panel/assignment/getsub/',
					success:'success',
					data: {number:number},
					cache: false,
					success: function(html){
						// new PNotify({
						// 	title: 'Success',
						// 	text: 'Done',
						// 	type: 'custom',
						// 	addclass: 'notification-success',
						// 	icon: 'fa fa-check'
						// });
						//alert(number);
						$('#new_select').load('/main_controller_panel/assignment/getview');
					},
					error: function(html){
						new PNotify({
							title: 'Error',
							text: 'Error Occurred',
							type: 'custom',
							addclass: 'notification-danger',
							icon: 'fa fa-check'
						});
					}
				});
			}
		</script>
		<script type="text/javascript">

		</script>
		<script type="text/javascript">
			var $w1finish = $('#w1').find('ul.pager li.finish'),
				$w1validator = $("#w1 form").validate({
				highlight: function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function(element) {
					$(element).closest('.form-group').removeClass('has-error');
					$(element).remove();
				},
				errorPlacement: function( error, element ) {
					element.parent().append( error );
				}
			});
			$w1finish.on('click', function( ev ) {
				ev.preventDefault();
				var validated = $('#w1 form').valid();
				var name = $('#w1-name').val();
				var clas = $('#w1-class').val();
				var subject = $('#w1-subject').val();
				var noqa = $('#w1-noqa').val();
				var noq = $('#w1-noq').val();
				var mpq = $('#w1-mpq').val();
				var tm = $('#w1-tm').val();
				var start_date = $('#w1-start_date').val();
				var start_time = $('#w1-start_time').val();
				var end_date = $('#w1-end_date').val();
				var end_time = $('#w1-end_time').val();
				var token = $('#token').val();
				if ( validated ) {
					$.ajax({
						headers: {'X-CSRF-TOKEN' : token},
						type: 'POST',
						url: "/main_controller_panel/assignment/setquestion/{{$ad->id}}",
						data: {
							name:name,
							clas:clas,
							subject:subject,
							noqa:noqa,
							noq:noq,
							mpq:mpq,
							tm:tm,
							start_date:start_date,
							start_time:start_time,
							end_date:end_date,
							end_time:end_time,
						},
						success: function(response){
							new PNotify({
								title: 'Success',
								text: 'You have successfully Updated Assignment, now it is time to update the questions',
								type: 'custom',
								addclass: 'notification-success',
								icon: 'fa fa-check'
							});
							var declare = document.getElementById('declare');
							var assignment = document.getElementById('assignment');
							var back = document.getElementById('back');
							declare.style.display = 'none';
							assignment.style.display = 'inline';
							back.style.display = 'inline';
							
							//$('#assignment').load('/main_controller_panel/assignment/getquestion/{{$ad->id}}');
						},
						error: function(error){
							new PNotify({
								title: 'Error',
								text: 'Unable to update, an error occured!',
								type: 'custom',
								addclass: 'notification-danger',
								icon: 'fa fa-check'
							});
						}
					});
				}
			});
		</script>
		@if(count($assignments) > 0)
			@php $i = 1; @endphp
			@php $j = count($assignments); @endphp
			@while ($i <= $j) 
				@foreach($assignments as $assignment)
					@if($assignment->qno == $i)
						@if($ad->id == $assignment->testid)
							<script type="text/javascript">
								function getType{{$i}}(){
									var qt{{$i}} = document.getElementById('qt{{$i}}');
									var q{{$i}} = document.getElementById('q{{$i}}');
									var opt{{$i}} = document.getElementById('opt{{$i}}');
									var ca{{$i}} = document.getElementById('ca{{$i}}');
									var type{{$i}} = document.getElementById('w3-type{{$i}}');

									for (let option of Array.from(type{{$i}}.options)) { 
										if (option.selected) { 
											if(option.value == 'objective'){
												q{{$i}}.style.display = 'inline';
												opt{{$i}}.style.display = 'inline';
												ca{{$i}}.style.display = 'inline';
											}else if(option.value == 'theory'){
												q{{$i}}.style.display = 'inline';
												opt{{$i}}.style.display = 'none';
												ca{{$i}}.style.display = 'none';
											}else if(option.value == 'gap'){
												q{{$i}}.style.display = 'inline';
												opt{{$i}}.style.display = 'none';
												ca{{$i}}.style.display = 'inline';
											}else{

											}  
										} 
									} 
								
								}
								function getPage{{$i}}(){
									var adid = $('#adid').val();
									var id_{{$i}} = $('#id_{{$i}}').val();
									var i_{{$i}} = $('#i_{{$i}}').val();
									var type{{$i}} = $('#w3-type{{$i}}').val();
									var question{{$i}} = $('#w3-question{{$i}}').val();
									var a{{$i}} = $('#w3-a{{$i}}').val();
									var b{{$i}} = $('#w3-b{{$i}}').val();
									var c{{$i}} = $('#w3-c{{$i}}').val();
									var d{{$i}} = $('#w3-d{{$i}}').val();
									var correct_answer{{$i}} = $('#w3-correct_answer{{$i}}').val();
									var token = $('#token').val();
									//view_class.textContent = number; 
									$.ajax({
										type:'POST',
										//dataType:'json',
										headers: {'X-CSRF-TOKEN' : token},
										url: '/main_controller_panel/assignment/qpage/{{$assignment->id}}',
										success:'success',
										data: {
											adid:adid,
											id:id_{{$i}},
											no:i_{{$i}},
											type:type{{$i}},
											question:question{{$i}},
											a:a{{$i}},
											b:b{{$i}},
											c:c{{$i}},
											d:d{{$i}},
											ca:correct_answer{{$i}}
										},
										//cache: false,
										success: function(html){
											// new PNotify({
											// 	title: 'Success',
											// 	text: 'Done',
											// 	type: 'custom',
											// 	addclass: 'notification-success',
											// 	icon: 'fa fa-check'
											// });
											//alert(number);
											//$('#new_select').load('/main_controller_panel/assignment/getview');
										},
										error: function(html){
											new PNotify({
												title: 'Error',
												text: 'Error Occurred',
												type: 'custom',
												addclass: 'notification-danger',
												icon: 'fa fa-check'
											});
										}
									});
								}
							</script>
							@php $i++; @endphp
						@else
			
						@endif
					@endif
				@endforeach
			@endwhile
		@endif
		<script type="text/javascript">
			function getFinish{{$i}}(){
				var token = $('#token').val();
				var validated = $('#w3 form').valid();
				if(validated){
					$.ajax({
						type:'POST',
						//dataType:'json',
						headers: {'X-CSRF-TOKEN' : token},
						url: '/main_controller_panel/assignment/qfinish/{{$ad->id}}',
						success:'success',
						data: {},
						//cache: false,
						success: function(html){
							new PNotify({
								title: 'Success',
								text: 'All Questions Have Been Successfully Submitted',
								type: 'custom',
								addclass: 'notification-success',
								icon: 'fa fa-check'
							});
							@if(count($assignments) > 0)
								@php $i = 1; @endphp
								@php $j = count($assignments); @endphp
								@while ($i <= $j) 
									@foreach($assignments as $assignment)
										@if($assignment->qno == $i)
											@if($ad->id == $assignment->testid)
												getPage{{$i}}();
												@php $i++; @endphp
											@else
								
											@endif
										@endif
									@endforeach
								@endwhile
							@endif
							//alert(number);
							//$('#new_select').load('/main_controller_panel/assignment/getview');
						},
						error: function(html){
							new PNotify({
								title: 'Error',
								text: 'Error Occurred',
								type: 'custom',
								addclass: 'notification-danger',
								icon: 'fa fa-check'
							});
						}
					});
				}else{
					new PNotify({
						title: 'Error',
						text: 'Fill All Questions',
						type: 'custom',
						addclass: 'notification-danger',
						icon: 'fa fa-check'
					});
				}
			}
		</script>