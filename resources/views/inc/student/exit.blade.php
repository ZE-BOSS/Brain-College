<!-- Jquery JS-->
    <script src="/student/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/student/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/student/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/student/vendor/slick/slick.min.js">
    </script>
    <script src="/student/vendor/wow/wow.min.js"></script>
    <script src="/student/vendor/animsition/animsition.min.js"></script>
    <script src="/student/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/student/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/student/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/student/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/student/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/student/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/student/vendor/select2/select2.min.js">
    </script>
    <script src="/student/vendor/vector-map/jquery.vmap.js"></script>
    <script src="/student/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="/student/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/student/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="/student/js/main.js"></script>
    <!-- data table JS -->
    <script src="/student/data-table/js/bootstrap-table.js"></script>
    <script src="/student/data-table/js/tableExport.js"></script>
    <script src="/student/data-table/js/data-table-active.js"></script>
    <script src="/student/data-table/js/bootstrap-table-editable.js"></script>
    <script src="/student/data-table/js/bootstrap-editable.js"></script>
    <script src="/student/data-table/js/bootstrap-table-resizable.js"></script>
    <script src="/student/data-table/js/colResizable-1.5.source.js"></script>
    <script src="/student/data-table/js/bootstrap-table-export.js"></script>
        <!-- main JS -->

        @if(count($messages) > 0)
            @foreach($messages as $message)
                <script>
                    $(document).ready(function(){
                        var msg = $('#msg');
                        var viewmsg = $('#viewmsg');
                        var mainmsg = $('#mainmsg');
                        var id = $('#id').val();
                        $("#msg").on('click', function(e){
                            e.preventDefault();

                            $.ajax({
                                //type: 'PUT',
                                method: 'GET',
                                url: "{{route('message.show', $message->id)}}",
                                data: {
                                        id:id
                                },
                                success: function(response){
                                    //console.log(response);
                                    //alert('Message Sent Successfully');
                                },
                                error: function(error){
                                    //console.log(error);
                                    //alert('Unable to Send Message');
                                }
                            });

                            viewmsg.css({'display':'block'});
                        });
                        $("#bmsg").on('click', function(e){
                            e.preventDefault();

                            window.location.reload();
                            //viewmsg.css({'display':'none'});

                        });
                    });
                </script>
            @endforeach
        @endif