<!-- jQuery 3 -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!--<script src="{{URL::asset('public/bower_components/jquery/dist/jquery.min.js')}}"></script>-->
<script src="{{URL::asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('public/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('public/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{URL::asset('public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{URL::asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{URL::asset('public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{URL::asset('public/bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::asset('public/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{URL::asset('public/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ url('public/js/main.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('public/dist/js/demo.js')}}"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>

@yield('javascript')