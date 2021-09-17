    <script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/admin/assets/vendor/select2/js/select2.min.js"></script>
    <script src="/admin/assets/vendor/summernote/js/summernote-bs4.js"></script>
    <script src="/admin/assets/libs/js/main-js.js"></script>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({ tags: true });
        });
    </script>
    <script>
        @if(count($msguser) > 0)
            @foreach($msguser as $muser)
                $(document).ready(function() {
                    $('#summernote{{$muser->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif

        @if(count($msgstudent) > 0)
            @foreach($msgstudent as $mstudent)
                $(document).ready(function() {
                    $('#summernote{{$mstudent->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif

        @if(count($msgstaff) > 0)
            @foreach($msgstaff as $mstaff)
                $(document).ready(function() {
                    $('#summernote{{$mstaff->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif

        @if(count($msgrequest) > 0)
            @foreach($msgrequest as $mrequest)
                $(document).ready(function() {
                    $('#summernote{{$mrequest->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif

        @if(count($msgsent) > 0)
            @foreach($msgsent as $msent)
                $(document).ready(function() {
                    $('#summernote{{$msent->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif

        @if(count($msgdraft) > 0)
            @foreach($msgdraft as $mdraft)
                $(document).ready(function() {
                    $('#summernote{{$mdraft->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif

        @if(count($msgtrash) > 0)
            @foreach($msgtrash as $mtrash)
                $(document).ready(function() {
                    $('#summernote{{$mtrash->id}}').summernote({
                        height: 300

                    });
                });
            @endforeach
        @else
                    
        @endif
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300

            });
        });
    </script>
    <script>
        $(document).ready(function(){
            var ctosd = $('#ctosd');
            var ctosf = $('#ctosf');
            var ctovs = $('#ctovs');
            var selcat =$('#selcat');
            var hid =$('#hid');
            $("#cstudent").on('click', function(e){
                e.preventDefault();

                ctosd.css({'display':'inline'});
                ctosf.css({'display':'none'});
                ctovs.css({'display':'none'});
                selcat.html('student');
                hid.val('student');
                selcat.css({'font-size':'15px', 'color':'green'});
            });
            $("#cstaff").on('click', function(e){
                e.preventDefault();

                ctosd.css({'display':'none'});
                ctosf.css({'display':'inline'});
                ctovs.css({'display':'none'});
                selcat.html('staff');
                hid.val('staff');
                selcat.css({'font-size':'15px', 'color':'blue'});
            });
            $("#cvisitor").on('click', function(e){
                e.preventDefault();

                ctosd.css({'display':'none'});
                ctosf.css({'display':'none'});
                ctovs.css({'display':'inline'});
                selcat.html('user');
                hid.val('user');
                selcat.css({'font-size':'15px', 'color':'red'});
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            var tosd = $('#tosd');
            var tosf = $('#tosf');
            var tovs = $('#tovs');
            $("#rstudent").on('click', function(e){
                e.preventDefault();

                tosd.css({'display':'inline'});
                tosf.css({'display':'none'});
                tovs.css({'display':'none'});
            });
            $("#rstaff").on('click', function(e){
                e.preventDefault();

                tosd.css({'display':'none'});
                tosf.css({'display':'inline'});
                tovs.css({'display':'none'});
            });
            $("#rvisitor").on('click', function(e){
                e.preventDefault();

                tosd.css({'display':'none'});
                tosf.css({'display':'none'});
                tovs.css({'display':'inline'});
            });
        });
    </script>
    <script>
    $(document).ready(function() {

        // binding the check all box to onClick event
        $(".chk_all").click(function() {

            var checkAll = $(".chk_all").prop('checked');
            if (checkAll) {
                $(".checkboxes").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }

        });

        // if all checkboxes are selected, then checked the main checkbox class and vise versa
        $(".checkboxes").click(function() {

            if ($(".checkboxes").length == $(".subscheked:checked").length) {
                $(".chk_all").attr("checked", "checked");
            } else {
                $(".chk_all").removeAttr("checked");
            }

        });

    });
    @if(count($msguser) > 0)
        @foreach($msguser as $muser)
            $(document).ready(function(){
                $("#viewh{{$muser->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$muser->id}} = $('#replied{{$muser->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$muser->id}} = $('#viewd{{$muser->id}}');

                    viewd{{$muser->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$muser->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgstudent) > 0)
        @foreach($msgstudent as $mstudent)
            $(document).ready(function(){
                $("#viewh{{$mstudent->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mstudent->id}} = $('#replied{{$mstudent->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mstudent->id}} = $('#viewd{{$mstudent->id}}');

                    viewd{{$mstudent->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mstudent->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgstaff) > 0)
        @foreach($msgstaff as $mstaff)
            $(document).ready(function(){
                $("#viewh{{$mstaff->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mstaff->id}} = $('#replied{{$mstaff->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mstaff->id}} = $('#viewd{{$mstaff->id}}');

                    viewd{{$mstaff->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mstaff->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgrequest) > 0)
        @foreach($msgrequest as $mrequest)
            $(document).ready(function(){
                $("#viewh{{$mrequest->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mrequest->id}} = $('#replied{{$mrequest->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mrequest->id}} = $('#viewd{{$mrequest->id}}');

                    viewd{{$mrequest->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mrequest->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgsent) > 0)
        @foreach($msgsent as $msent)
            $(document).ready(function(){
                $("#viewh{{$msent->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$msent->id}} = $('#replied{{$msent->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$msent->id}} = $('#viewd{{$msent->id}}');

                    viewd{{$msent->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$msent->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgdraft) > 0)
        @foreach($msgdraft as $mdraft)
            $(document).ready(function(){
                $("#viewh{{$mdraft->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mdraft->id}} = $('#replied{{$mdraft->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mdraft->id}} = $('#viewd{{$mdraft->id}}');

                    viewd{{$mdraft->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mdraft->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgtrash) > 0)
        @foreach($msgtrash as $mtrash)
            $(document).ready(function(){
                $("#viewh{{$mtrash->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mtrash->id}} = $('#replied{{$mtrash->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mtrash->id}} = $('#viewd{{$mtrash->id}}');

                    viewd{{$mtrash->id}}.css({'display':'block'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mtrash->id}}.css({'display':'none'});
                });
            });
        @endforeach
    @else
                
    @endif

    $(document).ready(function(){
        $("#composeh").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.addClass('active');
            studenth.removeClass('active');
            staffh.removeClass('active');
            requesth.removeClass('active');
            sentmh.removeClass('active');
            drafth.removeClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'none'});
            staffd.css({'display':'none'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'none'});
            trashd.css({'display':'none'});
            composed.css({'display':'block'});
        });
    });

    $(document).ready(function(){
        $("#inboxh").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.addClass('active');
            studenth.removeClass('active');
            staffh.removeClass('active');
            requesth.removeClass('active');
            sentmh.removeClass('active');
            drafth.removeClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'block'});
            studentd.css({'display':'none'});
            staffd.css({'display':'none'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'none'});
            trashd.css({'display':'none'});
            composed.css({'display':'none'});
        });
    });

    $(document).ready(function(){
        $("#studenth").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.removeClass('active');
            studenth.addClass('active');
            staffh.removeClass('active');
            requesth.removeClass('active');
            sentmh.removeClass('active');
            drafth.removeClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'block'});
            staffd.css({'display':'none'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'none'});
            trashd.css({'display':'none'});
            composed.css({'display':'none'});
        });
    });

    $(document).ready(function(){
        $("#staffh").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.removeClass('active');
            studenth.removeClass('active');
            staffh.addClass('active');
            requesth.removeClass('active');
            sentmh.removeClass('active');
            drafth.removeClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'none'});
            staffd.css({'display':'block'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'none'});
            trashd.css({'display':'none'});
            composed.css({'display':'none'});
        });
    });

    $(document).ready(function(){
        $("#requesth").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.removeClass('active');
            studenth.removeClass('active');
            staffh.removeClass('active');
            requesth.addClass('active');
            sentmh.removeClass('active');
            drafth.removeClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'none'});
            staffd.css({'display':'none'});
            requestd.css({'display':'block'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'none'});
            trashd.css({'display':'none'});
            composed.css({'display':'none'});
        });
    });

    $(document).ready(function(){
        $("#sentmh").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.removeClass('active');
            studenth.removeClass('active');
            staffh.removeClass('active');
            requesth.removeClass('active');
            sentmh.addClass('active');
            drafth.removeClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'none'});
            staffd.css({'display':'none'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'block'});
            draftd.css({'display':'none'});
            trashd.css({'display':'none'});
            composed.css({'display':'none'});
        });
    });

    $(document).ready(function(){
        $("#drafth").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.removeClass('active');
            studenth.removeClass('active');
            staffh.removeClass('active');
            requesth.removeClass('active');
            sentmh.removeClass('active');
            drafth.addClass('active');
            trashh.removeClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'none'});
            staffd.css({'display':'none'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'block'});
            trashd.css({'display':'none'});
            composed.css({'display':'none'});
        });
    });

    $(document).ready(function(){
        $("#trashh").on('click', function(e){
            e.preventDefault();
            var inboxh = $('#inbox');
            var studenth = $('#student');
            var staffh = $('#staff');
            var requesth = $('#request');
            var sentmh = $('#sentm');
            var drafth = $('#draft');
            var trashh = $('#trash');

            @include('inc.admin.message.message.all')

            var inboxd = $('#inboxd');
            var studentd = $('#studentd');
            var staffd = $('#staffd');
            var requestd = $('#requestd');
            var sentmd = $('#sentmd');
            var draftd = $('#draftd');
            var trashd = $('#trashd');
            var composed = $('#composed');

            inboxh.removeClass('active');
            studenth.removeClass('active');
            staffh.removeClass('active');
            requesth.removeClass('active');
            sentmh.removeClass('active');
            drafth.removeClass('active');
            trashh.addClass('active');

            inboxd.css({'display':'none'});
            studentd.css({'display':'none'});
            staffd.css({'display':'none'});
            requestd.css({'display':'none'});
            sentmd.css({'display':'none'});
            draftd.css({'display':'none'});
            trashd.css({'display':'block'});
            composed.css({'display':'none'});
        });
    });

    @if(count($msguser) > 0)
        @foreach($msguser as $muser)
            $(document).ready(function(){
                $("#replyh{{$muser->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$muser->id}} = $('#replied{{$muser->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$muser->id}} = $('#viewd{{$muser->id}}');

                    viewd{{$muser->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$muser->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgstudent) > 0)
        @foreach($msgstudent as $mstudent)
            $(document).ready(function(){
                $("#replyh{{$mstudent->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mstudent->id}} = $('#replied{{$mstudent->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mstudent->id}} = $('#viewd{{$mstudent->id}}');

                    viewd{{$mstudent->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mstudent->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgstaff) > 0)
        @foreach($msgstaff as $mstaff)
            $(document).ready(function(){
                $("#replyh{{$mstaff->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mstaff->id}} = $('#replied{{$mstaff->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mstaff->id}} = $('#viewd{{$mstaff->id}}');

                    viewd{{$mstaff->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mstaff->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgrequest) > 0)
        @foreach($msgrequest as $mrequest)
            $(document).ready(function(){
                $("#replyh{{$mrequest->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mrequest->id}} = $('#replied{{$mrequest->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mrequest->id}} = $('#viewd{{$mrequest->id}}');

                    viewd{{$mrequest->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mrequest->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgsent) > 0)
        @foreach($msgsent as $msent)
            $(document).ready(function(){
                $("#replyh{{$msent->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$msent->id}} = $('#replied{{$msent->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$msent->id}} = $('#viewd{{$msent->id}}');

                    viewd{{$msent->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$msent->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgdraft) > 0)
        @foreach($msgdraft as $mdraft)
            $(document).ready(function(){
                $("#replyh{{$mdraft->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mdraft->id}} = $('#replied{{$mdraft->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mdraft->id}} = $('#viewd{{$mdraft->id}}');

                    viewd{{$mdraft->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied.css({'display':'none'});
                    replied{{$mdraft->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif

    @if(count($msgtrash) > 0)
        @foreach($msgtrash as $mtrash)
            $(document).ready(function(){
                $("#replyh{{$mtrash->id}}").on('click', function(e){
                    e.preventDefault();
                    var inboxh = $('#inbox');
                    var studenth = $('#student');
                    var staffh = $('#staff');
                    var requesth = $('#request');
                    var sentmh = $('#sentm');
                    var drafth = $('#draft');
                    var trashh = $('#trash');
                    var composed = $('#composed');

                    var replied{{$mtrash->id}} = $('#replied{{$mtrash->id}}');
                    var inboxd = $('#inboxd');
                    var studentd = $('#studentd');
                    var staffd = $('#staffd');
                    var requestd = $('#requestd');
                    var sentmd = $('#sentmd');
                    var draftd = $('#draftd');
                    var trashd = $('#trashd');
                    var viewd{{$mtrash->id}} = $('#viewd{{$mtrash->id}}');

                    viewd{{$mtrash->id}}.css({'display':'none'});
                    inboxd.css({'display':'none'});
                    studentd.css({'display':'none'});
                    staffd.css({'display':'none'});
                    requestd.css({'display':'none'});
                    sentmd.css({'display':'none'});
                    draftd.css({'display':'none'});
                    trashd.css({'display':'none'});
                    composed.css({'display':'none'});
                    replied{{$mtrash->id}}.css({'display':'block'});
                });
            });
        @endforeach
    @else
                
    @endif
    </script>