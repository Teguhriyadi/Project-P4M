<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/backend/template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ url('/backend/template') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ url('/backend/template') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/backend/template') }}/dist/js/adminlte.min.js"></script>
<script src="{{ url('/backend/template') }}/dist/js/jquery.validate.min.js"></script>
<script src="{{ url('/backend/template') }}/dist/js/additional-methods.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/backend/template') }}/dist/js/demo.js"></script>

<script src="{{ url('/backend/template') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/backend/template') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ url('/backend/template') }}/bower_components/select2/dist/js/select2.full.js"></script>
<script src="{{ url('/backend/template') }}/dist/js/sweetalert.min.js"></script>
{{-- <script src="{{ url('/backend/template') }}/dist/js/my-validate.js"></script> --}}
<script src="{{ url('/frontend/js/chart/loader.js') }}"></script>
<script src="{{ url('/frontend/highcharts/highcharts.js') }}"></script>
<script src="{{ url('/frontend/highcharts/highcharts-3d.js') }}"></script>
<script src="{{ url('/frontend/highcharts/exporting.js') }}"></script>
<script src="{{ url('/frontend/highcharts/highcharts-more.js') }}"></script>
<script src="{{ url('/frontend/highcharts/sankey.js') }}"></script>
<script src="{{ url('/frontend/highcharts/organization.js') }}"></script>
<script src="{{ url('/frontend/highcharts/accessibility.js') }}"></script>
<script src="{{ url('backend/template/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('backend/template/plugins/timepicker/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    $(function() {
        $(".select2").select2()
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        });

        $('.sidebar-menu').tree()
    })
</script>
<script>
    $(function () {
        $('#example1').DataTable({
            scrollX: true,
        }),
        $('#example3').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
