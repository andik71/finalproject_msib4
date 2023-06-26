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
                <h5 class="modal-title" id="exampleModalLabel">Mau Logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol logout untuk keluar dari aplikasi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Mengubah Format Input Tanggal -->
<script>
    // Function to format date
    function formatDate(inputDate) {
        // Mengambil nilai tanggal dari input
        var date = inputDate.value;

        // Mengubah format tanggal menjadi yyyy-MM-dd
        var dateParts = date.split('/');
        var day = dateParts[0];
        var month = dateParts[1];
        var year = dateParts[2];

        // Mengecek apakah nilai day, month, dan year tidak undefined atau kosong
        if (day && month && year) {
            // Mengatur nilai input dengan format tanggal yang diubah
            inputDate.value = day + '-' + month + '-' + year;
        }
    }

    // Wait for the DOM to load before accessing the elements
    document.addEventListener('DOMContentLoaded', function() {
        // Mengambil elemen input tanggal
        var inputDate1 = document.getElementById('birth');
        var inputDate2 = document.getElementById('release_date');

        // Check if the elements exist before attaching the event listeners
        if (inputDate1) {
            // Event listener saat nilai input berubah
            inputDate1.addEventListener('input', function() {
                formatDate(inputDate1);
            });
        }

        if (inputDate2) {
            // Event listener saat nilai input berubah
            inputDate2.addEventListener('input', function() {
                formatDate(inputDate2);
            });
        }
    });
</script>

<!-- Preview Image -->
<script>
    // Fungsi untuk preview gambar
    function previewImage(event) {
        const img = document.querySelector('#formFile');
        const imgPreview = document.querySelector('.img-thumbnail');

        const reader = new FileReader();
        reader.onload = function(event) {
            imgPreview.src = event.target.result;
        };

        if (img.files && img.files[0]) {
            reader.readAsDataURL(img.files[0]);
        }
    }
</script>

<!-- CKEditor Initialization - 'bio' element Integrated with CKFinder-->
<script>
    // Wait for the DOM to load before accessing the element
    document.addEventListener('DOMContentLoaded', function() {
        // Retrieve the element with ID 'bio'
        var element = document.getElementById('bio');

        // Check if the element exists before initializing CKEditor
        if (element) {
            // Replace the 'bio' textarea with CKEditor instance
            CKEDITOR.replace('bio', {
                filebrowserBrowseUrl: 'vendor/ckfinder/ckfinder.html',
                filebrowserUploadUrl: 'vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                height: '400px'
            });
        }
    });
</script>


<!-- CKEditor Initialization - 'synopsis' element Integrated with CKFinder-->
<script>
    // Wait for the DOM to load before accessing the element
    document.addEventListener('DOMContentLoaded', function() {
        // Retrieve the element with ID 'synopsis'
        var element = document.getElementById('synopsis');

        // Check if the element exists before initializing CKEditor
        if (element) {
            // Replace the 'synopsis' textarea with CKEditor instance
            CKEDITOR.replace('synopsis', {
                filebrowserBrowseUrl: 'vendor/ckfinder/ckfinder.html',
                filebrowserUploadUrl: 'vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                height: '400px'
            });
        }
    });
</script>

<!-- SB Form Builder CDN -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

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