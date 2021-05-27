<footer class="footer">
    <div class="w-100 clearfix">
        <span class="text-center text-sm-left d-md-inline-block">Aplikacja stworzona na potrzeby przedmiotu
            fakultatywnego Billennium</span>
        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center" style="display:none">Crafted with <i
                class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark"
                target="_blank">Lavalite</a></span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write(
        '<script src="{{ asset('template/src/js/vendor/jquery-3.3.1.min.js') }}"><\/script>')

</script>
<script src="{{ asset('template/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}">
</script>

<script src="{{ asset('template/js/tables.js') }}"></script>
<script src="{{ asset('template/js/widgets.js') }}"></script>
<script src="{{ asset('template/dist/js/theme.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
    $(document).ready(function() {
        $('#patient_table').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Brak danych w tabeli",
                "info": "Wyświetlono od _START_ do _END_  (liczba pacjentów: _TOTAL_ )",
                "infoEmpty": "Wyświetlono od 0 do 0 z 0 pacjentów",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Pokaż _MENU_ pacjentów",
                "loadingRecords": "Ładowanie...",
                "processing": "Przetwarzanie...",
                "search": "Szukaj:",
                "zeroRecords": "Nie znaleziono pasujących pacjentów",
                "paginate": {
                    "first": "Pierwsza",
                    "last": "Ostatnia",
                    "next": "Następna",
                    "previous": "Poprzednia"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
    $("#datepicker").datetimepicker({
        format: "YYYY-MM-DD"
    });
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            startDate: new Date(),
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#prescription_table').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Brak danych w tabeli",
                "info": "Wyświetlono od _START_ do _END_  (liczba recept: _TOTAL_ )",
                "infoEmpty": "Wyświetlono od 0 do 0 z 0 recept",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Pokaż _MENU_ recept",
                "loadingRecords": "Ładowanie...",
                "processing": "Przetwarzanie...",
                "search": "Szukaj:",
                "zeroRecords": "Nie znaleziono pasujących recept",
                "paginate": {
                    "first": "Pierwsza",
                    "last": "Ostatnia",
                    "next": "Następna",
                    "previous": "Poprzednia"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
<script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');

</script>
</body>
@stack('scripts')

</html>
