		<script src="/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="/admin/assets/libs/js/main-js.js"></script>
        <!-- player js -->
        <script src="/admin/assets/vendor/player/scripts.js"></script>
        <script src="/admin/assets/vendor/player/fontawsome.js"></script>

		    
        <!-- 
        @if(count($events) > 0)
        	@foreach($events as $event)
		        <script type="text/javascript">
			        function select(){
			            var single = document.getElementById("single");
			            var all = document.getElementById("all");
			            var action = document.getElementById("action");
			            var select = document.getElementById("select");
			            var deselect = document.getElementById("deselect");
			            var nulls = document.getElementById("null");

		            	single.style.display = "inline";
		            	all.style.display = "inline";
		            	action.style.display = "inline";
		            	nulls.style.display = "none";
		            	select.style.display = "none";
		            	deselect.style.display = "inline";
			        }
			        function deselect(){
			            var single = document.getElementById("single");
			            var all = document.getElementById("all");
			            var action = document.getElementById("action");
			            var select = document.getElementById("select");
			            var deselect = document.getElementById("deselect");
			            var nulls = document.getElementById("null");

		            	single.style.display = "none";
		            	all.style.display = "none";
		            	action.style.display = "none";
		            	nulls.style.display = "inline";
		            	select.style.display = "inline";
		            	deselect.style.display = "none";

			        }
			        function action(){
			            var boda = document.getElementById("boda{{$event->id}}");
			            var dots = document.getElementById("dots{{$event->id}}");
			            var points = document.getElementById("points{{$event->id}}");

			            if(boda.style.display = "inline"){
			            	boda.style.display = "none";
			            	dots.style.display = "inline";
			            	points.style.display = "none";
			            }else{
			            	boda.style.display = "inline";
			            	dots.style.display = "none";
			            	points.style.display = "inline";
			            }
			        }
		    	</script>
		    @endforeach
		@else

		@endif
    	 -->