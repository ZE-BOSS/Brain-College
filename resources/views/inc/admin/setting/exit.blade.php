 	<script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/admin/assets/libs/js/main-js.js"></script>
    <script src="/admin/assets/vendor/parsley/parsley.js"></script>
	<script src="/admin/assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <!-- data table JS -->
    <script src="/admin/data-table/js/bootstrap-table.js"></script>
    <script src="/admin/data-table/js/tableExport.js"></script>
    <script src="/admin/data-table/js/data-table-active.js"></script>
    <script src="/admin/data-table/js/bootstrap-table-editable.js"></script>
    <script src="/admin/data-table/js/bootstrap-editable.js"></script>
    <script src="/admin/data-table/js/bootstrap-table-resizable.js"></script>
    <script src="/admin/data-table/js/colResizable-1.5.source.js"></script>
    <script src="/admin/data-table/js/bootstrap-table-export.js"></script>
    <script src="/admin/assets/vendor/summernote/js/summernote-bs4.js"></script>
    <!-- main JS -->

    <script>
        $('#form').parsley();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sim').summernote({
                height: 200

            });
        });
        $(document).ready(function() {
            $('#sam').summernote({
                height: 200

            });
        });
        $(document).ready(function() {
            $('#aboutus').summernote({
                height: 200

            });
        });
        $(document).ready(function() {
            $('#tc').summernote({
                height: 200

            });
        });
        $(document).ready(function() {
            $('#pp').summernote({
                height: 200

            });
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#p_event").on('input', function(e){
                e.preventDefault();
                var data = $("#p_event").val();
                var type = 'Event';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_news").on('input', function(e){
                e.preventDefault();
                var data = $("#p_news").val();
                var type = 'News';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                        //alert('ERROR!');
                    }
                });
            });
            $("#p_gallery").on('input', function(e){
                e.preventDefault();
                var data = $("#p_gallery").val();
                var type = 'Gallery';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_class").on('input', function(e){
                e.preventDefault();
                var data = $("#p_class").val();
                var type = 'Class';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_subject").on('input', function(e){
                e.preventDefault();
                var data = $("#p_subject").val();
                var type = 'Subject';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_book").on('input', function(e){
                e.preventDefault();
                var data = $("#p_book").val();
                var type = 'Book';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_staff").on('input', function(e){
                e.preventDefault();
                var data = $("#p_staff").val();
                var type = 'Staff';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_student").on('input', function(e){
                e.preventDefault();
                var data = $("#p_student").val();
                var type = 'Student';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_message").on('input', function(e){
                e.preventDefault();
                var data = $("#p_message").val();
                var type = 'Message';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_payment").on('input', function(e){
                e.preventDefault();
                var data = $("#p_payment").val();
                var type = 'Payment';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#p_trash").on('input', function(e){
                e.preventDefault();
                var data = $("#p_trash").val();
                var type = 'Trash';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                        //alert('ERROR!');
                    }
                });
            });
            $("#p_attendance").on('input', function(e){
                e.preventDefault();
                var data = $("#p_attendance").val();
                var type = 'Attendance';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                        //alert('ERROR!');
                    }
                });
            });
            $("#p_syllabus").on('input', function(e){
                e.preventDefault();
                var data = $("#p_syllabus").val();
                var type = 'Syllabus';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                        //alert('ERROR!');
                    }
                });
            });
            $("#p_hostel").on('input', function(e){
                e.preventDefault();
                var data = $("#p_hostel").val();
                var type = 'Hostel';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                        //alert('ERROR!');
                    }
                });
            });
            $("#p_library").on('input', function(e){
                e.preventDefault();
                var data = $("#p_library").val();
                var type = 'Library';
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "{{route('settings.show', $id)}}",
                    data: {
                        data:data,
                        type:type
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                        //alert('ERROR!');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#w_event").on('input', function(e){
                e.preventDefault();
                var data = $("#w_event").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_gallery").on('input', function(e){
                e.preventDefault();
                var data = $("#w_gallery").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_class").on('input', function(e){
                e.preventDefault();
                var data = $("#w_class").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_subject").on('input', function(e){
                e.preventDefault();
                var data = $("#w_subject").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_book").on('input', function(e){
                e.preventDefault();
                var data = $("#w_book").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_staff").on('input', function(e){
                e.preventDefault();
                var data = $("#w_staff").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_student").on('input', function(e){
                e.preventDefault();
                var data = $("#w_student").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_message").on('input', function(e){
                e.preventDefault();
                var data = $("#w_message").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
            $("#w_payment").on('input', function(e){
                e.preventDefault();
                var data = $("#w_payment").val();
                $.ajax({
                    //type: 'PUT',
                    method: 'GET',
                    url: "settings/dash/{{$id}}",
                    data: {
                            data:data
                    },
                    success: function(response){
                        //alert('SUCCESS!');
                        $('#reload').load('{{route("settings.index")}}');
                    },
                    error: function(error){
                    	//alert('ERROR!');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        function readURL(input){
    		if(input.files && input.files[0]){
    			var reader = new FileReader();
    			reader.onload = function(e){
    				$('#blah').attr('src', e.target.result).width(390).height(200);
    			};
    			$('#blah').css({'display':'inline'});
    			reader.readAsDataURL(input.files[0]);
    		}
    	}
        function readCUI(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#re_cui').attr('src', e.target.result).width(390).height(200);
                };
                $('#re_cui').css({'display':'inline'});
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readSBI(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#re_sbi').attr('src', e.target.result).width(390).height(200);
                };
                $('#re_sbi').css({'display':'inline'});
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readAUI(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#re_aui').attr('src', e.target.result).width(390).height(200);
                };
                $('#re_aui').css({'display':'inline'});
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readSAMI(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#re_sami').attr('src', e.target.result).width(390).height(200);
                };
                $('#re_sami').css({'display':'inline'});
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readSIMI(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#re_simi').attr('src', e.target.result).width(390).height(200);
                };
                $('#re_simi').css({'display':'inline'});
                reader.readAsDataURL(input.files[0]);
            }
        }
    	function readLink(input){
    		if(input.files && input.files[0]){
    			var reader = new FileReader();
    			reader.onload = function(e){
    				$('#blaw').attr('src', e.target.result).width(390).height(200);
    			};
    			$('#blaw').css({'display':'inline'});
    			reader.readAsDataURL(input.files[0]);
    		}
    	}
    	function readLin(input){
    		if(input.files && input.files[0]){
    			var reader = new FileReader();
    			reader.onload = function(e){
    				$('#blas').attr('src', e.target.result).width(390).height(200);
    			};
    			$('#blas').css({'display':'inline'});
    			reader.readAsDataURL(input.files[0]);
    		}
    	}
    	$(document).ready(function(){
            $("#img").on('input', function(e){
                e.preventDefault();

	            let img = document.querySelector("#img");
	            let vid = document.querySelector("#vid");

	            if(img = img.checked){
	            	vid.checked = false;
	            	$("#backg").css({'display':'inline'});
	                $("#backg2").css({'display':'none'});
	            }else{
	            	img.checked = false;
	            	$("#backg").css({'display':'none'});
	            }

            });
        });
        $(document).ready(function(){
            $("#vid").on('input', function(e){
                e.preventDefault();
                
                let vid = document.querySelector("#vid");
                let img = document.querySelector("#img");

	            if(vid = vid.checked){
	            	img.checked = false;
	                $("#backg").css({'display':'none'});
	                $("#backg2").css({'display':'inline'});
	            }else{
	            	vid.checked = false;
	                $("#backg2").css({'display':'none'});
	            }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#result").on('submit', function(e){
                e.preventDefault();
                var attendance=$("#attendance").val();
                var test=$("#test").val();
                var exam=$("#exam").val();
                var total=$("#total").val();
                var forward=$("#forward").val();
                var average=$("#average").val();
                var grade=$("#grade").val();
                var token = $("#token").val();

                var sum = attendance+test+exam+total+forward+average+grade;

                var e=$('#e');
                var s=$('#s');
                var emain=$('#emain');
                var smain=$('#smain');
                if(sum == ''){
                	e.html('Fill at least one(1) input field');
                    emain.css({'display':'block', 'width':'100%'});
                    smain.css({'display':'none', 'width':'100%'});
                }else{

	                $.ajax({
	                    type: 'POST',
	                    //method: 'POST',
	                    url: "/main_controller_panel/settings/result/{{$id}}",
	                    headers: {'X-CSRF-TOKEN' : token},
	                    data: {
	                            attendance:attendance,
	                            test:test,
	                            exam:exam,
	                            total:total,
	                            forward:forward,
	                            average:average,
	                            grade:grade
	                    },
	                    success: function(response){
	                        //console.log(response);
	                        //alert(sum)
	                        //$('#reload').load('{{route("settings.index")}}');

	                        s.html('Submitted Successfully'); 
	                        smain.css({'display':'block', 'width':'100%'});
	                        emain.css({'display':'none', 'width':'100%'});
	                    },
	                    error: function(error){
	                        //console.log(error);
	                        e.html('Unable to Submit');
	                        emain.css({'display':'block', 'width':'100%'});
	                        smain.css({'display':'none', 'width':'100%'});
	                    }
	                });
	            }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#session").on('submit', function(e){
                e.preventDefault();
                var sname=$("#sname").val();
                var sto=$("#sto").val();
                var sfrom=$("#sfrom").val();
                var token = $("#token").val();

                var esession=$('#esession');
                var ssession=$('#ssession');
                var errsession=$('#errsession');
                var sucsession=$('#sucsession');

                if(sname == '' || sto == '' || sfrom == ''){
                    esession.html('Fill all provided input field for this section');
                    errsession.css({'display':'block', 'width':'100%'});
                    sucsession.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/session",
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                                sname:sname,
                                sfrom:sfrom,
                                sto:sto
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            ssession.html('Submitted Successfully'); 
                            sucsession.css({'display':'block', 'width':'100%'});
                            errsession.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            esession.html('Unable to Submit');
                            errsession.css({'display':'block', 'width':'100%'});
                            sucsession.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
        });
        $(document).ready(function(){
            $("#term").on('submit', function(e){
                e.preventDefault();
                var sessionid=$("#sessionid").val();
                var tname=$("#tname").val();
                var tto=$("#tto").val();
                var tfrom=$("#tfrom").val();
                var token = $("#token").val();

                var eterm=$('#eterm');
                var sterm=$('#sterm');
                var errterm=$('#errterm');
                var sucterm=$('#sucterm');

                if(sessionid == '' || tname == '' || tto == '' || tfrom == ''){
                    eterm.html('Fill all provided input field for this section');
                    errterm.css({'display':'block', 'width':'100%'});
                    sucterm.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/session",
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                                sessionid:sessionid,
                                tname:tname,
                                tfrom:tfrom,
                                tto:tto
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            sterm.html('Submitted Successfully'); 
                            sucterm.css({'display':'block', 'width':'100%'});
                            errterm.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            eterm.html('Unable to Submit');
                            errterm.css({'display':'block', 'width':'100%'});
                            sucterm.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
        });
        @if(count($terms) > 0)
            @foreach($terms as $term)
                $(document).ready(function(){

                    var term=$("#term");
                    var ttable_view=$("#ttable_view");
                    var tView{{$term->id}}=$("#tView{{$term->id}}");
                    var upterm{{$term->id}}=$("#upterm{{$term->id}}");
                    var add_term_main=$("#add_term_main");
                    var back_term_main=$("#back_term_main");
                    var tdelete_form_{{$term->id}}=$("#tdelete-form-{{$term->id}}");

                    $("#add_term").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        term.css({'display':'inline'});
                        ttable_view.css({'display':'none'});
                        tView{{$term->id}}.css({'display':'none'});
                        upterm{{$term->id}}.css({'display':'none'});
                        add_term_main.css({'display':'none'});
                        back_term_main.css({'display':'inline'});
                    });
                    $("#term_view{{$term->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        term.css({'display':'none'});
                        ttable_view.css({'display':'none'});
                        tView{{$term->id}}.css({'display':'inline'});
                        upterm{{$term->id}}.css({'display':'none'});
                        add_term_main.css({'display':'none'});
                        back_term_main.css({'display':'inline'});
                    });
                    $("#term_edit{{$term->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        term.css({'display':'none'});
                        ttable_view.css({'display':'none'});
                        tView{{$term->id}}.css({'display':'none'});
                        upterm{{$term->id}}.css({'display':'inline'});
                        add_term_main.css({'display':'none'});
                        back_term_main.css({'display':'inline'});
                    });
                    $("#term_t_view{{$term->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        term.css({'display':'none'});
                        ttable_view.css({'display':'none'});
                        tView{{$term->id}}.css({'display':'inline'});
                        upterm{{$term->id}}.css({'display':'none'});
                        add_term_main.css({'display':'none'});
                        back_term_main.css({'display':'inline'});
                    });
                    $("#back_term").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        term.css({'display':'none'});
                        ttable_view.css({'display':'inline'});
                        tView{{$term->id}}.css({'display':'none'});
                        upterm{{$term->id}}.css({'display':'none'});
                        add_term_main.css({'display':'inline'});
                        back_term_main.css({'display':'none'});
                        //$('#reload').load(`{{route('settings.index')}}`);
                    });
                });
                $(document).ready(function(){
                    $("#upterm{{$term->id}}").on('submit', function(e){
                        e.preventDefault();
                        var upsessionid{{$term->id}}=$("#upsessionid{{$term->id}}").val();
                        var uptname{{$term->id}}=$("#uptname{{$term->id}}").val();
                        var uptto{{$term->id}}=$("#uptto{{$term->id}}").val();
                        var uptfrom{{$term->id}}=$("#uptfrom{{$term->id}}").val();
                        var token = $("#token").val();

                        var eterm=$('#eterm');
                        var sterm=$('#sterm');
                        var errterm=$('#errterm');
                        var sucterm=$('#sucterm');

                        if(upsessionid{{$term->id}} == '' || uptname{{$term->id}} == '' || uptto{{$term->id}} == '' || uptfrom{{$term->id}} == ''){
                            eterm.html('Fill all provided input field for this section');
                            errterm.css({'display':'block', 'width':'100%'});
                            sucterm.css({'display':'none', 'width':'100%'});
                        }else{

                            $.ajax({
                                type: 'POST',
                                //method: 'POST',
                                url: "/main_controller_panel/settings/session/view/{{$term->id}}",
                                headers: {'X-CSRF-TOKEN' : token},
                                data: {
                                        sessionid:upsessionid{{$term->id}},
                                        tname:uptname{{$term->id}},
                                        tfrom:uptfrom{{$term->id}},
                                        tto:uptto{{$term->id}}
                                },
                                success: function(response){
                                    //console.log(response);
                                    //alert(sum)
                                    //$('#reload').load('{{route("settings.index")}}');

                                    sterm.html('Submitted Successfully'); 
                                    sucterm.css({'display':'block', 'width':'100%'});
                                    errterm.css({'display':'none', 'width':'100%'});
                                },
                                error: function(error){
                                    //console.log(error);
                                    eterm.html('Unable to Submit');
                                    errterm.css({'display':'block', 'width':'100%'});
                                    sucterm.css({'display':'none', 'width':'100%'});
                                }
                            });
                        }
                    });
                });
                $(document).ready(function(){
                    $("#tdelete-form-{{$term->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        var eterm=$('#eterm');
                        var sterm=$('#sterm');
                        var errterm=$('#errterm');
                        var sucterm=$('#sucterm');

                        $.ajax({
                            type: 'POST',
                            //method: 'POST',
                            url: "/main_controller_panel/settings/term/delete/{{$term->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                //console.log(response);
                                //alert(sum)
                                //$('#reload').load('{{route("settings.index")}}');
                                $('#texampleModal{{$term->id}}').modal('hide');
                                //$('#texampleModal{{$term->id}}').css({'display':'none'});
                                sterm.html('Deleted Successfully'); 
                                sucterm.css({'display':'block', 'width':'100%'});
                                errterm.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                //console.log(error);
                                $('#texampleModal{{$term->id}}').modal('hide');
                                //$('#texampleModal{{$term->id}}').css({'display':'none'});
                                eterm.html('Unable to Delete');
                                errterm.css({'display':'block', 'width':'100%'});
                                sucterm.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
                $(document).ready(function(){
                    $("#tclose-form-{{$term->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        var eterm=$('#eterm');
                        var sterm=$('#sterm');
                        var errterm=$('#errterm');
                        var sucterm=$('#sucterm');

                        $.ajax({
                            type: 'POST',
                            //method: 'POST',
                            url: "/main_controller_panel/settings/term/close/{{$term->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                //console.log(response);
                                //alert(sum)
                                //$('#reload').load('{{route("settings.index")}}');
                                $('#tcloseModal{{$term->id}}').modal('hide');
                                //$('#tcloseModal{{$term->id}}').css({'display':'none'});
                                sterm.html('Closed Successfully'); 
                                sucterm.css({'display':'block', 'width':'100%'});
                                errterm.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                //console.log(error);
                                $('#tcloseModal{{$term->id}}').modal('hide');
                                //$('#tcloseModal{{$term->id}}').css({'display':'none'});
                                eterm.html('Unable to Close');
                                errterm.css({'display':'block', 'width':'100%'});
                                sucterm.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
            @endforeach
        @else
            $(document).ready(function(){

                var term=$("#term");
                var ttable_view=$("#ttable_view");
                var tView=$("#tView");
                var upterm=$("#upterm");
                var add_term_main=$("#add_term_main");
                var back_term_main=$("#back_term_main");
                var tdelete_form_=$("#tdelete-form-");

                $("#add_term").on('click', function(e){
                    e.preventDefault();
                    //e.html('Fill at least one(1) input field');
                    term.css({'display':'inline'});
                    ttable_view.css({'display':'none'});
                    tView.css({'display':'none'});
                    upterm.css({'display':'none'});
                    add_term_main.css({'display':'none'});
                    back_term_main.css({'display':'inline'});
                });
                $("#back_term").on('click', function(e){
                    e.preventDefault();
                    //e.html('Fill at least one(1) input field');
                    term.css({'display':'none'});
                    ttable_view.css({'display':'inline'});
                    tView.css({'display':'none'});
                    upterm.css({'display':'none'});
                    add_term_main.css({'display':'inline'});
                    back_term_main.css({'display':'none'});
                    //$('#reload').load(`{{route('settings.index')}}`);
                });
            });
        @endif
        @if(count($sessions) > 0)
            @foreach($sessions as $session)
                $(document).ready(function(){

                    var session=$("#session");
                    var stable_view=$("#stable_view");
                    var View{{$session->id}}=$("#View{{$session->id}}");
                    var upsession{{$session->id}}=$("#upsession{{$session->id}}");
                    var add_session_main=$("#add_session_main");
                    var back_session_main=$("#back_session_main");
                    var delete_form_{{$session->id}}=$("#delete-form-{{ $session->id }}");

                    $("#add_session").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        session.css({'display':'inline'});
                        stable_view.css({'display':'none'});
                        View{{$session->id}}.css({'display':'none'});
                        upsession{{$session->id}}.css({'display':'none'});
                        add_session_main.css({'display':'none'});
                        back_session_main.css({'display':'inline'});
                    });
                    $("#session_view{{$session->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        session.css({'display':'none'});
                        stable_view.css({'display':'none'});
                        View{{$session->id}}.css({'display':'inline'});
                        upsession{{$session->id}}.css({'display':'none'});
                        add_session_main.css({'display':'none'});
                        back_session_main.css({'display':'inline'});
                    });
                    $("#session_edit{{$session->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        session.css({'display':'none'});
                        stable_view.css({'display':'none'});
                        View{{$session->id}}.css({'display':'none'});
                        upsession{{$session->id}}.css({'display':'inline'});
                        add_session_main.css({'display':'none'});
                        back_session_main.css({'display':'inline'});
                    });
                    $("#session_t_view{{$session->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        session.css({'display':'none'});
                        stable_view.css({'display':'none'});
                        View{{$session->id}}.css({'display':'inline'});
                        upsession{{$session->id}}.css({'display':'none'});
                        add_session_main.css({'display':'none'});
                        back_session_main.css({'display':'inline'});
                    });
                    $("#session_s_view{{$session->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        session.css({'display':'none'});
                        stable_view.css({'display':'none'});
                        View{{$session->id}}.css({'display':'inline'});
                        upsession{{$session->id}}.css({'display':'none'});
                        add_session_main.css({'display':'none'});
                        back_session_main.css({'display':'inline'});
                    });
                    $("#back_session").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        session.css({'display':'none'});
                        stable_view.css({'display':'inline'});
                        View{{$session->id}}.css({'display':'none'});
                        upsession{{$session->id}}.css({'display':'none'});
                        add_session_main.css({'display':'inline'});
                        back_session_main.css({'display':'none'});
                        //$('#reload').load(`{{route('settings.index')}}`);
                    });
                });

                $(document).ready(function(){
                    $("#upsession{{$session->id}}").on('submit', function(e){
                        e.preventDefault();
                        var upsname{{$session->id}}=$("#upsname{{$session->id}}").val();
                        var upsto{{$session->id}}=$("#upsto{{$session->id}}").val();
                        var upsfrom{{$session->id}}=$("#upsfrom{{$session->id}}").val();
                        var token = $("#token").val();

                        var esession=$('#esession');
                        var ssession=$('#ssession');
                        var errsession=$('#errsession');
                        var sucsession=$('#sucsession');

                        if(upsname{{$session->id}} == '' || upsto{{$session->id}} == '' || upsfrom{{$session->id}} == ''){
                            esession.html('Fill all provided input field for this section');
                            errsession.css({'display':'block', 'width':'100%'});
                            sucsession.css({'display':'none', 'width':'100%'});
                        }else{

                            $.ajax({
                                type: 'POST',
                                //method: 'POST',
                                url: "/main_controller_panel/settings/session/view/{{$session->id}}",
                                headers: {'X-CSRF-TOKEN' : token},
                                data: {
                                        sname:upsname{{$session->id}},
                                        sfrom:upsfrom{{$session->id}},
                                        sto:upsto{{$session->id}}
                                },
                                success: function(response){
                                    //console.log(response);
                                    //alert(sum)
                                    //$('#reload').load('{{route("settings.index")}}');

                                    ssession.html('Submitted Successfully'); 
                                    sucsession.css({'display':'block', 'width':'100%'});
                                    errsession.css({'display':'none', 'width':'100%'});
                                },
                                error: function(error){
                                    //console.log(error);
                                    esession.html('Unable to Submit');
                                    errsession.css({'display':'block', 'width':'100%'});
                                    sucsession.css({'display':'none', 'width':'100%'});
                                }
                            });
                        }
                    });
                });
                $(document).ready(function(){
                    $("#delete-form-{{$session->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        var esession=$('#esession');
                        var ssession=$('#ssession');
                        var errsession=$('#errsession');
                        var sucsession=$('#sucsession');

                        $.ajax({
                            type: 'POST',
                            //method: 'POST',
                            url: "/main_controller_panel/settings/session/delete/{{$session->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                //console.log(response);
                                //alert(sum)
                                //$('#reload').load('{{route("settings.index")}}');
                                $('#exampleModal{{$session->id}}').modal('hide');
                                //$('#exampleModal{{$session->id}}').css({'display':'none'});
                                ssession.html('Deleted Successfully'); 
                                sucsession.css({'display':'block', 'width':'100%'});
                                errsession.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                //console.log(error);
                                $('#exampleModal{{$session->id}}').modal('hide');
                                //$('#exampleModal{{$session->id}}').css({'display':'none'});
                                esession.html('Unable to Delete');
                                errsession.css({'display':'block', 'width':'100%'});
                                sucsession.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
                $(document).ready(function(){
                    $("#close-form-{{$session->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        var esession=$('#esession');
                        var ssession=$('#ssession');
                        var errsession=$('#errsession');
                        var sucsession=$('#sucsession');

                        $.ajax({
                            type: 'POST',
                            //method: 'POST',
                            url: "/main_controller_panel/settings/session/close/{{$session->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                //console.log(response);
                                //alert(sum)
                                //$('#reload').load('{{route("settings.index")}}');
                                $('#closeModal{{$session->id}}').modal('hide');
                                //$('#closeModal{{$session->id}}').css({'display':'none'});
                                ssession.html('Close Successfully'); 
                                sucsession.css({'display':'block', 'width':'100%'});
                                errsession.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                //console.log(error);
                                $('#closeModal{{$session->id}}').modal('hide');
                                //$('#closeModal{{$session->id}}').css({'display':'none'});
                                esession.html('Unable to Close');
                                errsession.css({'display':'block', 'width':'100%'});
                                sucsession.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
            @endforeach
        @else
            $(document).ready(function(){

                var session=$("#session");
                var stable_view=$("#stable_view");
                var View=$("#View");
                var upsession=$("#upsession");
                var add_session_main=$("#add_session_main");
                var back_session_main=$("#back_session_main");
                var delete_form_=$("#delete-form-");

                $("#add_session").on('click', function(e){
                    e.preventDefault();
                    //e.html('Fill at least one(1) input field');
                    session.css({'display':'inline'});
                    stable_view.css({'display':'none'});
                    View.css({'display':'none'});
                    upsession.css({'display':'none'});
                    add_session_main.css({'display':'none'});
                    back_session_main.css({'display':'inline'});
                });
                $("#back_session").on('click', function(e){
                    e.preventDefault();
                    //e.html('Fill at least one(1) input field');
                    session.css({'display':'none'});
                    stable_view.css({'display':'inline'});
                    View.css({'display':'none'});
                    upsession.css({'display':'none'});
                    add_session_main.css({'display':'inline'});
                    back_session_main.css({'display':'none'});
                    //$('#reload').load(`{{route('settings.index')}}`);
                });
            });
        @endif
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#stf_payment").on('submit', function(e){
                e.preventDefault();
                var stf_staff=$("#stf_staff").val();
                var stf_salary=$("#stf_salary").val();
                var stf_bonus=$("#stf_bonus").val();
                var id=$("#stf_staff").val();
                var token = $("#token").val();

                var stf_err=$('#stf_err');
                var stf_suc=$('#stf_suc');
                var stf_error=$('#stf_error');
                var stf_success=$('#stf_success');

                if(stf_staff == '' || stf_salary == '' || stf_bonus == ''){
                    stf_err.html('Fill all provided input field for this section');
                    stf_error.css({'display':'block', 'width':'100%'});
                    stf_success.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/pay/"+id,
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                                stf_staff:stf_staff,
                                stf_salary:stf_salary,
                                stf_bonus:stf_bonus,
                                id:id
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            stf_suc.html('Submitted Successfully'); 
                            stf_success.css({'display':'block', 'width':'100%'});
                            stf_error.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            stf_err.html('Unable to Submit');
                            stf_error.css({'display':'block', 'width':'100%'});
                            stf_success.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
            $("#student_payment_info").on('submit', function(e){
                e.preventDefault();
                var acc_name=$("#acc_name").val();
                var acc_number=$("#acc_number").val();
                var acc_bank=$("#acc_bank").val();
                var spi_id=$("#spi_id").val();
                var token = $("#token").val();

                var spi_err=$('#spi_err');
                var spi_suc=$('#spi_suc');
                var spi_error=$('#spi_error');
                var spi_success=$('#spi_success');

                if(acc_name == '' || acc_number == '' || acc_bank == ''){
                    spi_err.html('Fill all provided input field for this section');
                    spi_error.css({'display':'block', 'width':'100%'});
                    spi_success.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/pay/"+spi_id,
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                                acc_name:acc_name,
                                acc_number:acc_number,
                                acc_bank:acc_bank,
                                spi_id:spi_id
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            spi_suc.html('Submitted Successfully'); 
                            spi_success.css({'display':'block', 'width':'100%'});
                            spi_error.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            spi_err.html('Unable to Submit');
                            spi_error.css({'display':'block', 'width':'100%'});
                            spi_success.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
            $("#student_payment_price").on('submit', function(e){
                e.preventDefault();
                var pay_class=$("#pay_class").val();
                var pay_name=$("#pay_name").val();
                var pay_price=$("#pay_price").val();
                var pay_discount=$("#pay_discount").val();
                var spp_id=$("#spi_id").val();
                var token = $("#token").val();

                var spp_err=$('#spp_err');
                var spp_suc=$('#spp_suc');
                var spp_error=$('#spp_error');
                var spp_success=$('#spp_success');

                if(pay_class == '' || pay_name == '' || pay_price == '' || pay_discount == ''){
                    spp_err.html('Fill all provided input field for this section');
                    spp_error.css({'display':'block', 'width':'100%'});
                    spp_success.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/pay/"+spp_id,
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                            pay_class:pay_class,
                            pay_name:pay_name,
                            pay_price:pay_price,
                            pay_discount:pay_discount,
                            spp_id:spp_id
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            spp_suc.html('Submitted Successfully'); 
                            spp_success.css({'display':'block', 'width':'100%'});
                            spp_error.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            spp_err.html('Unable to Submit');
                            spp_error.css({'display':'block', 'width':'100%'});
                            spp_success.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
            @if(count($pays) > 0)
                @foreach($pays as $pay)
                    $("#payment_btns{{$pay->id}}").on('click', function(e){
                        e.preventDefault();
                        var p_id{{$pay->id}}=$("#p_id{{$pay->id}}").val();
                        var token = $("#token").val();

                        var p_err=$('#p_err');
                        var p_suc=$('#p_suc');
                        var p_error=$('#p_error');
                        var p_success=$('#p_success');

                        if(p_id{{$pay->id}} == ''){
                            p_err.html("Error! Can't Delete");
                            p_error.css({'display':'block', 'width':'100%'});
                            p_success.css({'display':'none', 'width':'100%'});
                        }else{

                            $.ajax({
                                type: 'POST',
                                //method: 'POST',
                                url: "/main_controller_panel/settings/delpay/"+p_id{{$pay->id}},
                                headers: {'X-CSRF-TOKEN' : token},
                                data: {
                                    p_id:p_id{{$pay->id}}
                                },
                                success: function(response){
                                    //console.log(response);
                                    //alert(sum)
                                    //$('#reload').load('{{route("settings.index")}}');
                                    $('#spp_exampleModal'+p_id{{$pay->id}}).modal('hide');
                                    p_suc.html('Deleted Successfully'); 
                                    p_success.css({'display':'block', 'width':'100%'});
                                    p_error.css({'display':'none', 'width':'100%'});
                                },
                                error: function(error){
                                    //console.log(error);
                                    $('#spp_exampleModal'+p_id{{$pay->id}}).modal('hide');
                                    p_err.html('Unable to Delete');
                                    p_error.css({'display':'block', 'width':'100%'});
                                    p_success.css({'display':'none', 'width':'100%'});
                                }
                            });
                        }
                    });
                @endforeach
            @endif
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#branch").on('submit', function(e){
                e.preventDefault();
                var bname=$("#bname").val();
                var baddress=$("#baddress").val();
                var token = $("#token").val();

                var ebranch=$('#ebranch');
                var sbranch=$('#sbranch');
                var errbranch=$('#errbranch');
                var sucbranch=$('#sucbranch');

                if(bname == '' || baddress == ''){
                    ebranch.html('Fill all provided input field for this section');
                    errbranch.css({'display':'block', 'width':'100%'});
                    sucbranch.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/branch",
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                                bname:bname,
                                baddress:baddress
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            sbranch.html('Submitted Successfully'); 
                            sucbranch.css({'display':'block', 'width':'100%'});
                            errbranch.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            ebranch.html('Unable to Submit');
                            errbranch.css({'display':'block', 'width':'100%'});
                            sucbranch.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
        });
        @if(count($branches) > 0)
            @foreach($branches as $branch)
                $(document).ready(function(){

                    var branch=$("#branch");
                    var btable_view=$("#btable_view");
                    var bView{{$branch->id}}=$("#bView{{$branch->id}}");
                    var upbranch{{$branch->id}}=$("#upbranch{{$branch->id}}");
                    var add_branch_main=$("#add_branch_main");
                    var back_branch_main=$("#back_branch_main");
                    var bdelete_form_{{$branch->id}}=$("#bdelete-form-{{$branch->id}}");

                    $("#add_branch").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        branch.css({'display':'inline'});
                        btable_view.css({'display':'none'});
                        bView{{$branch->id}}.css({'display':'none'});
                        upbranch{{$branch->id}}.css({'display':'none'});
                        add_branch_main.css({'display':'none'});
                        back_branch_main.css({'display':'inline'});
                    });
                    $("#branch_view{{$branch->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        branch.css({'display':'none'});
                        btable_view.css({'display':'none'});
                        bView{{$branch->id}}.css({'display':'inline'});
                        upbranch{{$branch->id}}.css({'display':'none'});
                        add_branch_main.css({'display':'none'});
                        back_branch_main.css({'display':'inline'});
                    });
                    $("#branch_edit{{$branch->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        branch.css({'display':'none'});
                        btable_view.css({'display':'none'});
                        bView{{$branch->id}}.css({'display':'none'});
                        upbranch{{$branch->id}}.css({'display':'inline'});
                        add_branch_main.css({'display':'none'});
                        back_branch_main.css({'display':'inline'});
                    });
                    $("#branch_b_view{{$branch->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        branch.css({'display':'none'});
                        btable_view.css({'display':'none'});
                        bView{{$branch->id}}.css({'display':'inline'});
                        upbranch{{$branch->id}}.css({'display':'none'});
                        add_branch_main.css({'display':'none'});
                        back_branch_main.css({'display':'inline'});
                    });
                    $("#back_branch").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        branch.css({'display':'none'});
                        btable_view.css({'display':'inline'});
                        bView{{$branch->id}}.css({'display':'none'});
                        upbranch{{$branch->id}}.css({'display':'none'});
                        add_branch_main.css({'display':'inline'});
                        back_branch_main.css({'display':'none'});
                        //$('#reload').load(`{{route('settings.index')}}`);
                    });
                });
                $(document).ready(function(){
                    $("#upbranch{{$branch->id}}").on('submit', function(e){
                        e.preventDefault();
                        var upbname{{$branch->id}}=$("#upbname{{$branch->id}}").val();
                        var upbaddress{{$branch->id}}=$("#upbaddress{{$branch->id}}").val();
                        var token = $("#token").val();

                        var ebranch=$('#ebranch');
                        var sbranch=$('#sbranch');
                        var errbranch=$('#errbranch');
                        var sucbranch=$('#sucbranch');

                        if(upbname{{$branch->id}} == '' || upbaddress{{$branch->id}} == ''){
                            ebranch.html('Fill all provided input field for this section');
                            errbranch.css({'display':'block', 'width':'100%'});
                            sucbranch.css({'display':'none', 'width':'100%'});
                        }else{

                            $.ajax({
                                type: 'POST',
                                //method: 'POST',
                                url: "/main_controller_panel/settings/edbranch/{{$branch->id}}",
                                headers: {'X-CSRF-TOKEN' : token},
                                data: {
                                        bname:upbname{{$branch->id}},
                                        baddress:upbaddress{{$branch->id}}
                                },
                                success: function(response){
                                    //console.log(response);
                                    //alert(upbname{{$branch->id}}+' address: '+upbaddress{{$branch->id}})
                                    //$('#reload').load('{{route("settings.index")}}');

                                    sbranch.html('Submitted Successfully'); 
                                    sucbranch.css({'display':'block', 'width':'100%'});
                                    errbranch.css({'display':'none', 'width':'100%'});
                                },
                                error: function(error){
                                    //console.log(error);
                                    ebranch.html('Unable to Submit');
                                    errbranch.css({'display':'block', 'width':'100%'});
                                    sucbranch.css({'display':'none', 'width':'100%'});
                                }
                            });
                        }
                    });
                });
                $(document).ready(function(){
                    $("#bdelete-form-{{$branch->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        var ebranch=$('#ebranch');
                        var sbranch=$('#sbranch');
                        var errbranch=$('#errbranch');
                        var sucbranch=$('#sucbranch');

                        $.ajax({
                            type: 'POST',
                            url: "/main_controller_panel/settings/delbranch/{{$branch->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                $('#bexampleModal{{$branch->id}}').modal('hide');
                                sbranch.html('Deleted Successfully'); 
                                sucbranch.css({'display':'block', 'width':'100%'});
                                errbranch.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                $('#bexampleModal{{$branch->id}}').modal('hide');
                                ebranch.html('Unable to Delete');
                                errbranch.css({'display':'block', 'width':'100%'});
                                sucbranch.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
            @endforeach
        @else
            $(document).ready(function(){

                var branch=$("#branch");
                var btable_view=$("#btable_view");
                var bView=$("#bView");
                var upbranch=$("#upbranch");
                var add_branch_main=$("#add_branch_main");
                var back_branch_main=$("#back_branch_main");
                var bdelete_form_=$("#bdelete-form-");

                $("#add_branch").on('click', function(e){
                    e.preventDefault();
                    branch.css({'display':'inline'});
                    btable_view.css({'display':'none'});
                    bView.css({'display':'none'});
                    upbranch.css({'display':'none'});
                    add_branch_main.css({'display':'none'});
                    back_branch_main.css({'display':'inline'});
                });
                $("#back_branch").on('click', function(e){
                    e.preventDefault();
                    branch.css({'display':'none'});
                    btable_view.css({'display':'inline'});
                    bView.css({'display':'none'});
                    upbranch.css({'display':'none'});
                    add_branch_main.css({'display':'inline'});
                    back_branch_main.css({'display':'none'});
                });
            });
        @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var eservice=$('#eservice');
            var errservice=$('#errservice');
            var sservice=$('#sservice');
            var sucservice=$('#sucservice');
            $("#service_create").on('submit', function(e){
                e.preventDefault();
                var title=$("#serve_title").val();
                var details=$("#serve_details").val();
                var image=$("#serve_image");
                var token = $("#token").val();

                if(title == '' || details == ''){
                    eservice.html('Fill all provided input field for this section');
                    errservice.css({'display':'block', 'width':'100%'});
                    sucservice.css({'display':'none', 'width':'100%'});
                }else{
                    document.getElementById('service_create').submit();
                }
            });
        });
        @if(count($services) > 0)
            @foreach($services as $service)
                $(document).ready(function(){

                    var service=$("#service");
                    var serve_table_view = $("#serve_table_view");
                    var serve_View{{$service->id}} = $("#serve_View{{$service->id}}");
                    var upservice{{$service->id}} = $("#upservice{{$service->id}}");
                    var service_create = $("#service_create");
                    var add_service = $("#add_service");
                    var back_service = $("#back_service");
                    var service_delete{{$service->id}} = $("#service_delete{{$service->id}}");

                    $("#add_service_main").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        service_create.css({'display':'inline'});
                        serve_table_view.css({'display':'none'});
                        serve_View{{$service->id}}.css({'display':'none'});
                        upservice{{$service->id}}.css({'display':'none'});
                        add_service.css({'display':'none'});
                        back_service.css({'display':'inline'});
                    });
                    $("#service_serve_view{{$service->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        service_create.css({'display':'none'});
                        serve_table_view.css({'display':'none'});
                        serve_View{{$service->id}}.css({'display':'inline'});
                        upservice{{$service->id}}.css({'display':'none'});
                        add_service.css({'display':'none'});
                        back_service.css({'display':'inline'});
                    });
                    $("#service_view{{$service->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        service_create.css({'display':'none'});
                        serve_table_view.css({'display':'none'});
                        serve_View{{$service->id}}.css({'display':'inline'});
                        upservice{{$service->id}}.css({'display':'none'});
                        add_service.css({'display':'none'});
                        back_service.css({'display':'inline'});
                    });
                    $("#service_edit{{$service->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        service_create.css({'display':'none'});
                        serve_table_view.css({'display':'none'});
                        serve_View{{$service->id}}.css({'display':'none'});
                        upservice{{$service->id}}.css({'display':'inline'});
                        add_service.css({'display':'none'});
                        back_service.css({'display':'inline'});
                    });
                    $("#back_service_main").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        service_create.css({'display':'none'});
                        serve_table_view.css({'display':'inline'});
                        serve_View{{$service->id}}.css({'display':'none'});
                        upservice{{$service->id}}.css({'display':'none'});
                        add_service.css({'display':'inline'});
                        back_service.css({'display':'none'});
                        //$('#reload').load(`{{route('settings.index')}}`);
                    });
                });
                $(document).ready(function(){
                    var eservice=$('#eservice');
                    var errservice=$('#errservice');
                    var sservice=$('#sservice');
                    var sucservice=$('#sucservice');
                    $("#upservice{{$service->id}}").on('submit', function(e){
                        e.preventDefault();
                        var title{{$service->id}}=$("#upserve_title{{$service->id}}").val();
                        var details{{$service->id}}=$("#upserve_details{{$service->id}}").val();
                        var image=$("#upserve_image");
                        var token = $("#token").val();

                        if(title{{$service->id}} == '' || details{{$service->id}} == ''){
                            eservice.html('Fill all provided input field for this section');
                            errservice.css({'display':'block', 'width':'100%'});
                            sucservice.css({'display':'none', 'width':'100%'});
                        }else{
                            document.getElementById('upservice{{$service->id}}').submit();
                        }
                    });
                });
                $(document).ready(function(){
                    var eservice=$('#eservice');
                    var errservice=$('#errservice');
                    var sservice=$('#sservice');
                    var sucservice=$('#sucservice');
                    $("#service_delete{{$service->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        $.ajax({
                            type: 'POST',
                            url: "/main_controller_panel/settings/servicedel/{{$service->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                $('#serveexampleModal{{$service->id}}').modal('hide');
                                sservice.html('Deleted Successfully'); 
                                sucservice.css({'display':'block', 'width':'100%'});
                                errservice.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                $('#serveexampleModal{{$service->id}}').modal('hide');
                                eservice.html('Unable to Delete');
                                errservice.css({'display':'block', 'width':'100%'});
                                sucservice.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
                $(document).ready(function(){
                    var eservice=$('#eservice');
                    var errservice=$('#errservice');
                    var sservice=$('#sservice');
                    var sucservice=$('#sucservice');
                    $("#serve_main{{$service->id}}").on('input', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        let main = document.querySelector("#serve_main{{$service->id}}");
                        let sub = document.querySelector("#serve_sub{{$service->id}}");

                        if(main = main.checked){
                            sub.checked = false;
                            var category = 'Head';
                        }else{
                            main.checked = false;
                            var category = '';
                        }

                        $.ajax({
                            type: 'POST',
                            data: {category:category},
                            url: "/main_controller_panel/settings/servicehead/{{$service->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                
                            },
                            error: function(error){
                                
                            }
                        });
                    });
                });
                $(document).ready(function(){
                    var eservice=$('#eservice');
                    var errservice=$('#errservice');
                    var sservice=$('#sservice');
                    var sucservice=$('#sucservice');
                    $("#serve_sub{{$service->id}}").on('input', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        let main = document.querySelector("#serve_main{{$service->id}}");
                        let sub = document.querySelector("#serve_sub{{$service->id}}");

                        if(sub = sub.checked){
                            main.checked = false;
                            var category = 'Body';
                        }else{
                            sub.checked = false;
                            var category = '';
                        }

                        $.ajax({
                            type: 'POST',
                            data: {category:category},
                            url: "/main_controller_panel/settings/servicehead/{{$service->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                
                            },
                            error: function(error){
                                
                            }
                        });
                    });
                });
                $(document).ready(function(){
                    var eservice=$('#eservice');
                    var errservice=$('#errservice');
                    var sservice=$('#sservice');
                    var sucservice=$('#sucservice');
                    $("#serve_b_main{{$service->id}}").on('input', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        let main = document.querySelector("#serve_b_main{{$service->id}}");
                        let sub = document.querySelector("#serve_b_sub{{$service->id}}");

                        if(main = main.checked){
                            sub.checked = false;
                            var category = 'Head';
                        }else{
                            main.checked = false;
                            var category = '';
                        }

                        $.ajax({
                            type: 'POST',
                            data: {category:category},
                            url: "/main_controller_panel/settings/servicehead/{{$service->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                //alert('success')
                            },
                            error: function(error){
                                
                            }
                        });
                    });
                });
                $(document).ready(function(){
                    var eservice=$('#eservice');
                    var errservice=$('#errservice');
                    var sservice=$('#sservice');
                    var sucservice=$('#sucservice');
                    $("#serve_b_sub{{$service->id}}").on('input', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        let main = document.querySelector("#serve_b_main{{$service->id}}");
                        let sub = document.querySelector("#serve_b_sub{{$service->id}}");

                        if(sub = sub.checked){
                            main.checked = false;
                            var category = 'Body';
                        }else{
                            sub.checked = false;
                            var category = '';
                        }

                        $.ajax({
                            type: 'POST',
                            data: {category:category},
                            url: "/main_controller_panel/settings/servicehead/{{$service->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                $('#serveexampleModal{{$service->id}}').modal('hide');
                            },
                            error: function(error){
                                $('#serveexampleModal{{$service->id}}').modal('hide');
                            }
                        });
                    });
                });
            @endforeach
        @else
            $(document).ready(function(){

                var service=$("#service");
                var serve_table_view=$("#serve_table_view");
                var serve_View=$("#serve_View");
                var upservice=$("#upservice");
                var service_create=$("#service_create");
                var add_service=$("#add_service");
                var back_service=$("#back_service");
                var service_delete=$("#service_delete");

                $("#add_service").on('click', function(e){
                    e.preventDefault();
                    //e.html('Fill at least one(1) input field');
                    service_create.css({'display':'inline'});
                    serve_table_view.css({'display':'none'});
                    serve_View.css({'display':'none'});
                    upservice.css({'display':'none'});
                    add_service.css({'display':'none'});
                    back_service.css({'display':'inline'});
                });
                $("#back_service").on('click', function(e){
                    e.preventDefault();
                    //e.html('Fill at least one(1) input field');
                    serve_table_view.css({'display':'inline'});
                    service_create.css({'display':'none'});
                    serve_View.css({'display':'none'});
                    upservice.css({'display':'none'});
                    add_service.css({'display':'inline'});
                    back_service.css({'display':'none'});
                    //$('#reload').load(`{{route('settings.index')}}`);
                });
            });
        @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#faq").on('submit', function(e){
                e.preventDefault();
                var faqquestion=$("#faqquestion").val();
                var faqanswer=$("#faqanswer").val();
                var faqcategory=$("#faqcategory").val();
                var token = $("#token").val();

                var efaq=$('#efaq');
                var sfaq=$('#sfaq');
                var errfaq=$('#errfaq');
                var sucfaq=$('#sucfaq');

                if(faqquestion == '' || faqanswer == '' || faqcategory == ''){
                    efaq.html('Fill all provided input field for this section');
                    errfaq.css({'display':'block', 'width':'100%'});
                    sucfaq.css({'display':'none', 'width':'100%'});
                }else{

                    $.ajax({
                        type: 'POST',
                        //method: 'POST',
                        url: "/main_controller_panel/settings/faq",
                        headers: {'X-CSRF-TOKEN' : token},
                        data: {
                                question:faqquestion,
                                answer:faqanswer,
                                category:faqcategory
                        },
                        success: function(response){
                            //console.log(response);
                            //alert(sum)
                            //$('#reload').load('{{route("settings.index")}}');

                            sfaq.html('Submitted Successfully'); 
                            sucfaq.css({'display':'block', 'width':'100%'});
                            errfaq.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            efaq.html('Unable to Submit');
                            errfaq.css({'display':'block', 'width':'100%'});
                            sucfaq.css({'display':'none', 'width':'100%'});
                        }
                    });
                }
            });
        });
        @if(count($faqs) > 0)
            @foreach($faqs as $faq)
                $(document).ready(function(){

                    var faq=$("#faq");
                    var faq_table_view=$("#faq_table_view");
                    var faqView{{$faq->id}}=$("#faqView{{$faq->id}}");
                    var upfaq{{$faq->id}}=$("#upfaq{{$faq->id}}");
                    var add_faq_main=$("#add_faq_main");
                    var back_faq_main=$("#back_faq_main");
                    var faqdelete_form_{{$faq->id}}=$("#faqdelete-form-{{$faq->id}}");

                    $("#add_faq").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        faq.css({'display':'inline'});
                        faq_table_view.css({'display':'none'});
                        faqView{{$faq->id}}.css({'display':'none'});
                        upfaq{{$faq->id}}.css({'display':'none'});
                        add_faq_main.css({'display':'none'});
                        back_faq_main.css({'display':'inline'});
                    });
                    $("#faq_view{{$faq->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        faq.css({'display':'none'});
                        faq_table_view.css({'display':'none'});
                        faqView{{$faq->id}}.css({'display':'inline'});
                        upfaq{{$faq->id}}.css({'display':'none'});
                        add_faq_main.css({'display':'none'});
                        back_faq_main.css({'display':'inline'});
                    });
                    $("#faq_edit{{$faq->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        faq.css({'display':'none'});
                        faq_table_view.css({'display':'none'});
                        faqView{{$faq->id}}.css({'display':'none'});
                        upfaq{{$faq->id}}.css({'display':'inline'});
                        add_faq_main.css({'display':'none'});
                        back_faq_main.css({'display':'inline'});
                    });
                    $("#faq_f_view{{$faq->id}}").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        faq.css({'display':'none'});
                        faq_table_view.css({'display':'none'});
                        faqView{{$faq->id}}.css({'display':'inline'});
                        upfaq{{$faq->id}}.css({'display':'none'});
                        add_faq_main.css({'display':'none'});
                        back_faq_main.css({'display':'inline'});
                    });
                    $("#back_faq").on('click', function(e){
                        e.preventDefault();
                        //e.html('Fill at least one(1) input field');
                        faq.css({'display':'none'});
                        faq_table_view.css({'display':'inline'});
                        faqView{{$faq->id}}.css({'display':'none'});
                        upfaq{{$faq->id}}.css({'display':'none'});
                        add_faq_main.css({'display':'inline'});
                        back_faq_main.css({'display':'none'});
                        //$('#reload').load(`{{route('settings.index')}}`);
                    });
                });
                $(document).ready(function(){
                    $("#upfaq{{$faq->id}}").on('submit', function(e){
                        e.preventDefault();
                        var upfaqquestion{{$faq->id}}=$("#upfaqquestion{{$faq->id}}").val();
                        var upfaqanswer{{$faq->id}}=$("#upfaqanswer{{$faq->id}}").val();
                        var upfaqcategory{{$faq->id}}=$("#upfaqcategory{{$faq->id}}").val();
                        var token = $("#token").val();

                        var efaq=$('#efaq');
                        var sfaq=$('#sfaq');
                        var errfaq=$('#errfaq');
                        var sucfaq=$('#sucfaq');

                        if(upfaqquestion{{$faq->id}} == '' || upfaqanswer{{$faq->id}} == '' || upfaqcategory{{$faq->id}} == ''){
                            efaq.html('Fill all provided input field for this section');
                            errfaq.css({'display':'block', 'width':'100%'});
                            sucfaq.css({'display':'none', 'width':'100%'});
                        }else{

                            $.ajax({
                                type: 'POST',
                                //method: 'POST',
                                url: "/main_controller_panel/settings/faqup/{{$faq->id}}",
                                headers: {'X-CSRF-TOKEN' : token},
                                data: {
                                        question:upfaqquestion{{$faq->id}},
                                        answer:upfaqanswer{{$faq->id}},
                                        category:upfaqcategory{{$faq->id}}
                                },
                                success: function(response){
                                    //console.log(response);
                                    //alert(upbname{{$faq->id}}+' address: '+upbaddress{{$faq->id}})
                                    //$('#reload').load('{{route("settings.index")}}');

                                    sfaq.html('Submitted Successfully'); 
                                    sucfaq.css({'display':'block', 'width':'100%'});
                                    errfaq.css({'display':'none', 'width':'100%'});
                                },
                                error: function(error){
                                    //console.log(error);
                                    efaq.html('Unable to Submit');
                                    errfaq.css({'display':'block', 'width':'100%'});
                                    sucfaq.css({'display':'none', 'width':'100%'});
                                }
                            });
                        }
                    });
                });
                $(document).ready(function(){
                    $("#bdelete-form-{{$faq->id}}").on('click', function(e){
                        e.preventDefault();

                        var token = $("#token").val();

                        var efaq=$('#efaq');
                        var sfaq=$('#sfaq');
                        var errfaq=$('#errfaq');
                        var sucfaq=$('#sucfaq');

                        $.ajax({
                            type: 'POST',
                            url: "/main_controller_panel/settings/faqdel/{{$faq->id}}",
                            headers: {'X-CSRF-TOKEN' : token},
                            success: function(response){
                                $('#bexampleModal{{$faq->id}}').modal('hide');
                                sfaq.html('Deleted Successfully'); 
                                sucfaq.css({'display':'block', 'width':'100%'});
                                errfaq.css({'display':'none', 'width':'100%'});
                            },
                            error: function(error){
                                $('#bexampleModal{{$faq->id}}').modal('hide');
                                efaq.html('Unable to Delete');
                                errfaq.css({'display':'block', 'width':'100%'});
                                sucfaq.css({'display':'none', 'width':'100%'});
                            }
                        });
                    });
                });
            @endforeach
        @else
            $(document).ready(function(){

                var faq=$("#faq");
                var btable_view=$("#btable_view");
                var bView=$("#bView");
                var upfaq=$("#upfaq");
                var add_faq_main=$("#add_faq_main");
                var back_faq_main=$("#back_faq_main");
                var bdelete_form_=$("#bdelete-form-");

                $("#add_faq").on('click', function(e){
                    e.preventDefault();
                    faq.css({'display':'inline'});
                    btable_view.css({'display':'none'});
                    bView.css({'display':'none'});
                    upfaq.css({'display':'none'});
                    add_faq_main.css({'display':'none'});
                    back_faq_main.css({'display':'inline'});
                });
                $("#back_faq").on('click', function(e){
                    e.preventDefault();
                    faq.css({'display':'none'});
                    btable_view.css({'display':'inline'});
                    bView.css({'display':'none'});
                    upfaq.css({'display':'none'});
                    add_faq_main.css({'display':'inline'});
                    back_faq_main.css({'display':'none'});
                });
            });
        @endif
    </script>