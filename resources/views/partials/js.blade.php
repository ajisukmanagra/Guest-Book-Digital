    <!-- Jquery Core Js -->
    <script src="{{ asset('bsb/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('bsb/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('bsb/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('bsb/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('bsb/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('bsb/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('bsb/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script>
        var t = $('#table').DataTable({
            responsive: true,
            "lengthChange": false,
            "order": [
                [5, "desc"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": [
                    0,
                    6
                ],
            }]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    </script>

    <!-- Custom Js -->
    <script src="{{ asset('bsb/js/admin.js') }}"></script>
    <script src="{{ asset('bsb/js/pages/index.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('bsb/js/demo.js') }}"></script>