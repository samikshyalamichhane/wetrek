</div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->

    <script src="{{asset('/assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/admin/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{asset('/assets/admin/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/admin/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/admin/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('/assets/admin/js/app.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/admin/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>

    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{asset('/assets/admin/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('js/jquery.Jcrop.min.js')}}"> </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @stack('scripts')


    <script>
        $(document).ready( function () {
          
            //Update Admin sub admin Status
            $(".AdminStatus").change(function(){
              var id = $(this).attr('rel');
              if($(this).prop("checked")==true){
                 $.ajax({
                    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : 'post',
                    url : '/admin/update-admin-status',
                    data : {status:'1',id:id},
                    success:function(data){
                       $("#message_success").show();
                       setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                    },error:function(){
                       alert("Error");
                    }
                 });
  
              }else{
                 $.ajax({
                    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : 'post',
                    url : '/admin/update-admin-status',
                    data : {status:'0',id:id},
                    success:function(resp){
                       $("#message_error").show();
                       setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                    },error:function(){
                       alert("Error");
                    }
                 });
              }
            });

        });
     </script>
</body>

</html>
