<footer class="footer py-4">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                    document.write(new Date().getFullYear())
                    </script></i> by
                    Gina Rahmah Yulia | E-Surat.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="" class="nav-link text-muted" target="_blank">Creative</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</main>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src=" https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- <script src=" https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> -->
<script src=" https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js">
</script>

<!--   Core JS Files   -->
<script src="/aev/assets/js/core/popper.min.js"></script>
<script src="/aev/assets/js/core/bootstrap.min.js"></script>
<script src="/aev/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/aev/assets/js/plugins/smooth-scrollbar.min.js"></script>




<script>
var win = navigator.platform.indexOf("Win") > -1;
if (win && document.querySelector("#sidenav-scrollbar")) {
    var options = {
        damping: "0.5",
    };
    Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
}

// $(document).ready(function() {
//     $('#example').DataTable({
//         "paging": true, // memungkinkan pagination
//         "searching": true, // memungkinkan pencarian
//         "pageLength": 5, // menentukan jumlah data per halaman
//         "lengthMenu": [5, 10, 25, 50, 75, 100], // menentukan opsi jumlah data per halaman
//         "language": { // konfigurasi bahasa
//             "lengthMenu": "Tampilkan _MENU_ data per halaman",
//             "zeroRecords": "Data tidak ditemukan",
//             "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
//             "infoEmpty": "Data tidak tersedia",
//             "infoFiltered": "(difilter dari _MAX_ total data)",
//             "search": "Cari:",
//             "paginate": {
//                 "first": "Awal",
//                 "last": "Akhir",
//                 "next": "Berikutnya",
//                 "previous": "Sebelumnya"
//             }
//         }
//     });
// });

$(document).ready(function() {
    $('#example').DataTable({
        "paging": true,
        "searching": true,
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 75, 100],
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data tidak tersedia",
            "infoFiltered": "(difilter dari _MAX_ total data)",
            "search": "Cari:",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "Berikutnya",
                "previous": "Sebelumnya"
            }
        },
        responsive: true
    });
});
</script>




<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->


<script src="/aev/assets/js/material-dashboard.min.js?v=3.0.4"></script>

<script src="../../assets/js/modal-enable-otp.js"></script>

<!-- // JAVASCRIPT ONLINE // <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>  -->

</body>

</html>