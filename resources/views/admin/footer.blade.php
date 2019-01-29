<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 5.7.0
  </div>
  <strong>Copyright &copy; 2017-{{ Carbon\carbon::now()->year }} <a href="https:excellentloaded.com">Laravel Blog</a>.</strong> All rights
  reserved.
</footer>

      <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery 3 -->
      <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
      <!-- FastClick -->
      <script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
      <!-- Sparkline -->
      <script src="{{asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
      <!-- jvectormap  -->
      <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
      <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
      <!-- SlimScroll -->
      <script src="{{asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
      <!-- ChartJS -->
      <script src="{{asset('admin/bower_components/chart.js/Chart.js')}}"></script>
      @section('footercontent')
      @show
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      {{-- <script src="dist/js/pages/dashboard2.js"></script> --}}
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>