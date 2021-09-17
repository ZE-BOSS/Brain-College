<script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js-->
    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js-->
    <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>

    <script src="../assets/vendor/parsley/parsley.js"></script>
    <!-- main js-->
    <script src="/admin/assets/libs/js/main-js.js"></script>

    <script src="/admin/assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script src="/admin/assets/vendor/select2/js/select2.min.js"></script>
    <script src="/admin/assets/vendor/summernote/js/summernote-bs4.js"></script>

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
    <script type="text/javascript">
        /*$(document).ready(function(){
            $("#students").on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{route('students.store')}}",
                    data: $('#students').serialize(),
                    //method: 'POST',
                    success: function(response){
                        //console.log(response);
                        alert('success'); 
                    },
                    error: function(error){
                        //console.log(error);
                        alert('error');
                    }
                });
            });
        });*/
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
            $(".year-inputmask").inputmask("9999"),
            $(".time-inputmask").inputmask("99:99"),
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
        $(document).ready(function() {
            $('#details').summernote({
                height: 300

            });
        });
    </script>