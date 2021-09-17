        <script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="/admin/assets/libs/js/main-js.js"></script>

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
                            url: "/main_controller_panel/resetPass/{{$id}}",
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