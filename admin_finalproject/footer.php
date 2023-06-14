</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>2023 &copy; FilmKita. All right reserved </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Mengubah Format Input Tanggal -->
<script>
    // Mengambil elemen input tanggal
    var input1 = document.getElementById('birth');
    var input2 = document.getElementById('release_date');

    // Event listener saat nilai input berubah
    input1.addEventListener('input', function() {
        // Mengambil nilai tanggal dari input
        var date = input1.value;

        // Mengubah format tanggal menjadi d/m/y
        var tglArr = date.split('-');
        var formattedDate = tglArr[2] + '/' + tglArr[1] + '/' + tglArr[0];

        // Mengatur nilai input dengan format tanggal yang diubah
        input1.value = formattedDate;
    });

    input2.addEventListener('input', function() {
        // Mengambil nilai tanggal dari input
        var date = input2.value;

        // Mengubah format tanggal menjadi d/m/y
        var tglArr = date.split('-');
        var formattedDate = tglArr[2] + '/' + tglArr[1] + '/' + tglArr[0];

        // Mengatur nilai input dengan format tanggal yang diubah
        input2.value = formattedDate;
    });
</script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>