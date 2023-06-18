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
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Mengubah Format Input Tanggal -->
<script>
    // Mengambil elemen input tanggal
    var inputdate = document.getElementById('birth');

    // Event listener saat nilai input berubah
    input1.addEventListener('input', function() {
        // Mengambil nilai tanggal dari input
        var date = inputdate.value;

        // Mengubah format tanggal menjadi d/m/y
        var dateParts = date.split('/');
        var day = dateParts[0];
        var month = dateParts[1];
        var year = dateParts[2];

        // Mengecek apakah nilai day , month , year tidak undifinied atau kosong
        if (day && month && year) {
            //mengatur nilai inpur dengan format tanggah yang diubah
            inputdate.value = year + '-' + month + '-' + day;
        }
    });
</script>

<!-- Mengubah Format Input Tanggal 2-->
<script>
    // Mengambil elemen input tanggal
    var inputdate = document.getElementById('release_date');

    // Event listener saat nilai input berubah
    input1.addEventListener('input', function() {
        // Mengambil nilai tanggal dari input
        var date = inputdate.value;

        // Mengubah format tanggal menjadi d/m/y
        var dateParts = date.split('/');
        var day = dateParts[0];
        var month = dateParts[1];
        var year = dateParts[2];

        // Mengecek apakah nilai day , month , year tidak undifinied atau kosong
        if (day && month && year) {
            //mengatur nilai inpur dengan format tanggah yang diubah
            inputdate.value = year + '-' + month + '-' + day;
        }
    });
</script>

<script>
     // Fungsi untuk preview img
     function previewImage(event) {
        const img = document.querySelector('#formFile');
        const imgPreview = document.querySelector('.img-thumbnail');

        const reader = new FileReader();
        reader.onload = function(event) {
            imgPreview.src = event.target.result;
        };

        if (img.files[0]) {
            reader.readAsDataURL(img.files[0]);
        }
    }
</script>

<!-- Skrip untuk memanggil CKEditor -->

<script>
    // CKEDITOR 4
    CKEDITOR.replace('bio');
    CKEDITOR.replace('synopsis');
</script>

<!-- CDN CK Editor 4 -->
<script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>

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