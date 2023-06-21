<!-- .End Main -->

</div>

</div>
</section>



<script>
    var showPasswordCheckbox = document.getElementById('showPassword');
    var passwordInput = document.getElementById('exampleInputPassword');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Mengubah tipe input password menjadi text untuk menampilkan password
            passwordInput.setAttribute('type', 'text');
        } else {
            // Mengubah tipe input password menjadi password untuk menyembunyikan password
            passwordInput.setAttribute('type', 'password');
        }
    });
</script>

<script>
    var showPasswordCheckbox = document.getElementById('showPassword');
    var passwordInput = document.getElementById('new_password');
    var passwordInput1 = document.getElementById('confirm_password');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Mengubah tipe input password menjadi text untuk menampilkan password
            passwordInput.setAttribute('type', 'text');
            passwordInput1.setAttribute('type', 'text');
        } else {
            // Mengubah tipe input password menjadi password untuk menyembunyikan password
            passwordInput.setAttribute('type', 'password');
            passwordInput1.setAttribute('type', 'password');
        }
    });
</script>

<!-- Mengimpor skrip JavaScript inti -->
<script src="../admin_panel/vendor/jquery/jquery.min.js"></script>
<script src="../admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Mengimpor skrip kustom untuk semua halaman -->
<script src="../admin_panel/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../admin_panel/js/sb-admin-2.min.js"></script>

</body>

</html>