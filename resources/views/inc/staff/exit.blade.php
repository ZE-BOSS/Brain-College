<!-- Jquery JS-->
    <script src="/staff/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/staff/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/staff/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/staff/vendor/slick/slick.min.js">
    </script>
    <script src="/staff/vendor/wow/wow.min.js"></script>
    <script src="/staff/vendor/animsition/animsition.min.js"></script>
    <script src="/staff/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/staff/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/staff/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/staff/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/staff/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/staff/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/staff/vendor/select2/select2.min.js"></script>
    
    <script src="/staff/vendor/vector-map/jquery.vmap.js"></script>
    <script src="/staff/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="/staff/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/staff/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="/staff/js/main.js"></script>
    <!-- data table JS -->
    <script src="/staff/data-table/js/bootstrap-table.js"></script>
    <script src="/staff/data-table/js/tableExport.js"></script>
    <script src="/staff/data-table/js/data-table-active.js"></script>
    <script src="/staff/data-table/js/bootstrap-table-editable.js"></script>
    <script src="/staff/data-table/js/bootstrap-editable.js"></script>
    <script src="/staff/data-table/js/bootstrap-table-resizable.js"></script>
    <script src="/staff/data-table/js/colResizable-1.5.source.js"></script>
    <script src="/staff/data-table/js/bootstrap-table-export.js"></script>
    <script src="/staff/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>

    @if(Request::is('staff_portal/staff_student/create') || Request::is('staff_portal/staff_student/'.$id.'/edit') || Request::is('staff_portal/staff_staff/create') || Request::is('staff_portal/staff_staff/'.$id.'/edit'))
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
        <script>
            $(function(e) {
                "use strict";
                $(".date-inputmask").inputmask("99/99/9999"),
                    $(".phone-inputmask").inputmask("(+999) 999-9999-999"),
                    $(".zip-inputmask").inputmask("9999999"),
                    $(".international-inputmask").inputmask("+9(999)999-9999"),
                    $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
                    $(".purchase-inputmask").inputmask("aaaa 9999-****"),
                    $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
                    $(".ssn-inputmask").inputmask("999-99-9999"),
                    $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
                    $(".currency-inputmask").inputmask("$9999"),
                    $(".cvv-inputmask").inputmask("999"),
                    $(".expiration-inputmask").inputmask("99/9999"),
                    $(".ccno-inputmask").inputmask("9999-9999-9999-9999"),
                    $(".percentage-inputmask").inputmask("99%"),
                    $(".decimal-inputmask").inputmask({
                        alias: "decimal",
                        radixPoint: "."
                    }),

                    $(".email-inputmask").inputmask({
                        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                        greedy: !1,
                        onBeforePaste: function(n, a) {
                            return (e = e.toLowerCase()).replace("mailto:", "")
                        },
                        definitions: {
                            "*": {
                                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                                cardinality: 1,
                                casing: "lower"
                            }
                        }
                    })
            });
        </script>
        <script type="text/javascript">
            function non(){
                var parents = document.getElementById("parents");
                var guidian = document.getElementById("guidian");

                parents.style.display = "none";
                guidian.style.display = "none";
            }
            function parents(){
                var parents = document.getElementById("parents");
                var guidian = document.getElementById("guidian");

                parents.style.display = "inline";
                guidian.style.display = "none";
                //parents.style.color = "red";
            }
            function guidian(){
                var parents = document.getElementById("parents");
                var guidian = document.getElementById("guidian");

                parents.style.display = "none";
                guidian.style.display = "inline";
                //guidian.style.color = "blue";
            }
        </script>
        @if(Request::is('staff_portal/staff_student/create') || Request::is('staff_portal/staff_student/'.$id.'/edit'))
            <script type="text/javascript">
                function getHostel(){
                    var studenttype = document.getElementById('studenttype'); 
                    var typeClass = document.getElementById('typeClass');                                                           
                    for (let option of Array.from(studenttype.options)) { 
                        if (option.selected) { 
                            if(option.value == 'Boarding'){
                                typeClass.className = "col-md-6";
                                document.getElementById('hostel').style.display = 'inline';
                            }else{
                                typeClass.className = "col-md-12";
                                document.getElementById('hostel').style.display = 'none';
                            }
                        } 
                    }
                }
            </script>
        @endif

        @if(Request::is('staff_portal/staff_staff/create') || Request::is('staff_portal/staff_staff/'.$id.'/edit'))
            <script type="text/javascript">
                function getHostel(){
                    var stafftype = document.getElementById('stafftype'); 
                    var typeClass = document.getElementById('typeClass');                                                           
                    for (let option of Array.from(stafftype.options)) { 
                        if (option.selected) { 
                            if(option.value == 'Boarding'){
                                typeClass.className = "col-md-6";
                                document.getElementById('hostel').style.display = 'inline';
                            }else{
                                typeClass.className = "col-md-12";
                                document.getElementById('hostel').style.display = 'none';
                            }
                        } 
                    }
                }
            </script>
        @endif
    @endif
    
    <script src="/admin/assets/vendor/player/scripts.js"></script>
    <script src="/admin/assets/vendor/player/fontawsome.js"></script>

    @if(Request::is('staff_portal/staff_event/'.$id.'/edit') || Request::is('staff_portal/staff_event/create'))
        <script type="text/javascript">
            function non(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "none";
                video.style.display = "none";
            }
            function img(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "inline";
                video.style.display = "none";
                //parents.style.color = "red";
            }
            function vid(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "none";
                video.style.display = "inline";
                //guidian.style.color = "blue";
            }
        </script>
    @endif

    @if(Request::is('staff_portal/staff_news/'.$id.'/edit') || Request::is('staff_portal/staff_news/create'))
        <script type="text/javascript">
            function non(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "none";
                video.style.display = "none";
            }
            function img(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "inline";
                video.style.display = "none";
                //parents.style.color = "red";
            }
            function vid(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "none";
                video.style.display = "inline";
                //guidian.style.color = "blue";
            }
        </script>
    @endif

    @if(Request::is('staff_portal/staff_gallery/'.$id.'/edit') || Request::is('staff_portal/staff_gallery/create'))
        <script type="text/javascript">
            function non(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "none";
                video.style.display = "none";
            }
            function img(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "inline";
                video.style.display = "none";
                //parents.style.color = "red";
            }
            function vid(){
                var image = document.getElementById("image");
                var video = document.getElementById("video");

                image.style.display = "none";
                video.style.display = "inline";
                //guidian.style.color = "blue";
            }
        </script>
    @endif

    @if(Request::is('staff_portal/staff_student/'.$id) || Request::is('staff_portal/staff_staff/'.$id))
        <script type="text/javascript">
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
                $("#passbtn").on('click', function(e){
                    e.preventDefault();
                    var pass=$("#pass").val();
                    var id=$("#id").val();
                    var cpass=$("#cpass").val();
                    var err=$('#err');
                    var suc=$('#suc');
                    var errmain=$('#errmain');
                    var sucmain=$('#sucmain');
                    $('#resetModal').modal('hide');
                    $.ajax({
                        //type: 'PUT',
                        method: 'GET',
                        @if(Request::is('staff_portal/staff_student/'.$id))
                            url: "/staff_portal/staff_resetPass/{{$id}}",
                        @endif
                        @if(Request::is('staff_portal/staff_staff/'.$id))
                            url: "/staff_portal/staff_reset/{{$id}}",
                        @endif
                        data: {
                                pass:pass,
                                id:id
                        },
                        success: function(response){
                            //console.log(response);
                            suc.html('Reset Password Successfully'); 
                            sucmain.css({'display':'block', 'width':'100%'});
                            errmain.css({'display':'none', 'width':'100%'});
                        },
                        error: function(error){
                            //console.log(error);
                            err.html('Unable to Reset Password');
                            errmain.css({'display':'block', 'width':'100%'});
                            sucmain.css({'display':'none', 'width':'100%'});
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            function reset(){
                var pass=$("#pass").val();
                var cpass=$("#cpass").val();
                var err=$('#err');
                var suc=$('#suc');
                var errmain=$('#errmain');
                var sucmain=$('#sucmain');
                var sub=$('#sub');
                if(pass == '' || cpass == ''){
                        //window.location.reload();
                        err.html('Enter Password in the Provided Spaces Below');
                        errmain.css({'display':'block', 'width':'100%'});
                        sucmain.css({'display':'none', 'width':'100%'});
                }else{
                        if(pass != cpass){
                                err.html('Password Mismatch');
                                errmain.css({'display':'block', 'width':'100%'});
                                sucmain.css({'display':'none', 'width':'100%'});
                        }else{
                             $('#resetModal').modal('show');    
                        } 
                }
            }
        </script>
        <script type="text/javascript">
            const sub = document.querySelector('.sub');
            sub.addEventListener('click', reset);
            // $(document).ready(function() {
            //         setInterval(function () {
            //                 $('#reload').load("{{route('students.show', $id)}}")
            //         }, 1000);
            // });
        </script>
    @endif
    @if(Request::is('staff_portal/staff_attendance/create'))
        <script type="text/javascript">
            function getStudents(){
                let input = 0; 
                var class_val = document.getElementById('class');                                                          
                for (let option of Array.from(class_val.options)) { 
                    if (option.selected) { 
                        input += Number(option.value); 
                    } 
                } 
                $.ajax({
                    type:'GET',
                    url: '/staff_portal/staff_attend/students/set',
                    data: {input:input},
                    success: function(html){
                        //alert('success!');
                        $('#gstudents').load('/staff_portal/staff_attend/students/get');
                    },
                    error: function(html){
                        //alert('Error!');
                    }
                });
            }
        </script>
    @endif
    @if(Request::is('staff_portal/staff_syllabus/create') || Request::is('staff_portal/staff_syllabus/'.$id.'/edit'))
        @if(Request::is('staff_portal/staff_syllabus/create'))
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#topics").on('keyup', function(e){
                        e.preventDefault();
                        var topics = $('#topics').val();
                        var gettopic = document.getElementById('gettopic');
                        let number = 0;
                        number += Number(topics);
                        gettopic.style.display = 'inline';
                        $.ajax({
                            type:'GET',
                            url: '/main_controller_panel/syllabi/gettopic/set/',
                            data: {number:number},
                            success: function(response){                    
                                //alert(number+' success');
                                $('#gettopic').load('/main_controller_panel/syllabi/gettopic/get/');
                            },
                            error: function(response){
                                //alert(number+' error');
                            }
                        }); 
                    });
                });
            </script>
        @endif
        @if(Request::is('staff_portal/staff_syllabus/'.$id.'/edit'))
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#topics").on('keyup', function(e){
                        e.preventDefault();
                        var topics = $('#topics').val();
                        var gettopic = document.getElementById('gettopic');
                        let number = 0;
                        number += Number(topics);
                        gettopic.style.display = 'inline';
                        $.ajax({
                            type:'GET',
                            url: '/staff_portal/staff_syllabi/getlist/set/{{$id}}',
                            data: {number:number},
                            success: function(response){                    
                                //alert(number+' success');
                                $('#gettopic').load('/staff_portal/staff_syllabi/getlist/get/{{$id}}');
                            },
                            error: function(response){
                                //alert(number+' error');
                            }
                        }); 
                    });
                });
                @if(count($syll_lists) > 0)
                    @php $i = 0; @endphp
                    @foreach($syll_lists as $syll_list)
                        $(document).ready(function(){
                            $("#remove_syll{{$i}}").on('click', function(e){
                                e.preventDefault();
                                $.ajax({
                                    type:'GET',
                                    url: '/staff_portal/staff_syllabi/removelist/remove/{{$id}}',
                                    success: function(response){                    
                                        //alert(number+' success');
                                        $('#reload').load('/staff_portal/staff_syllabus/{{$id}}/edit');
                                    },
                                    error: function(response){
                                        //alert(number+' error');
                                    }
                                }); 
                            });
                        });
                        @php $i++; @endphp
                    @endforeach
                @endif
            </script>
        @endif
    @endif
    @if(Request::is('staff_portal/staff_attendance/create'))
        <script type="text/javascript">
            function getStudents(){
                let input = 0; 
                var class_val = document.getElementById('class');                                                          
                for (let option of Array.from(class_val.options)) { 
                    if (option.selected) { 
                        input += Number(option.value); 
                    } 
                } 
                $.ajax({
                    type:'GET',
                    url: '/main_controller_panel/attend/students/set',
                    data: {input:input},
                    success: function(html){
                        //alert('success!');
                        $('#gstudents').load('/main_controller_panel/attend/students/get');
                    },
                    error: function(html){
                        //alert('Error!');
                    }
                });
            }
        </script>
    @endif
    @if(Request::is('staff_portal/staff_payment'))
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
    @endif

    @if(Request::is('staff_portal/staff_message'))
        @include('inc.staff.message.exit')
    @endif