<?php
$data_genre = select("SELECT * from genre ORDER BY id_genre DESC");
?>

<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<footer class="section-text-white footer footer-links p-2">
    <div class="footer-body container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 pt-4">
                <a class="footer-logo" href="./">
                    <span class="logo-element">
                        <span class="logo-tape">
                            <img src="images/svg/logo-footer.png" alt="" srcset="" width="200px">
                        </span>
                    </span>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Movies</h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li>
                        <a class="content-link" href="index.php?page=movies_list">All Movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="index.php?page=home#upcoming">Upcoming movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="index.php?page=movies_top">Top 10 movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="index.php?page=home#new-movies">New Movies Update</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Genres</h5>
                <div class="row mt-3">
                    <?php foreach ($data_genre as $list) { ?>
                        <div class="col-sm-5 mt-2">
                            <ul class="list-unstyled list-wide">
                                <li>
                                    <a class="content-link" href="index.php?page=movies_list&id=<?= $list['id_genre'] ?>"><?= $list['genre'] ?></a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Follow</h5>
                <ul class="list-wide footer-content list-inline">
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-slack-hash"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-dribbble"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <center>
            <div class="container">&copy; 2023 by FILMKITA Movie. All rights reserved.</div>
        </center>
    </div>
</footer>

<!-- jQuery library -->
<script src="js/jquery-3.3.1.js"></script>
<!-- Bootstrap -->
<script src="bootstrap/js/bootstrap.js"></script>
<!-- Waypoints -->
<script src="waypoints/jquery.waypoints.min.js"></script>
<!-- Slick carousel -->
<script src="slick/slick.min.js"></script>
<!-- Magnific Popup -->
<script src="magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Inits product scripts -->
<script src="js/script.js"></script>
<script async defer src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493.94212418348434!2d112.61591113524486!3d-7.9433266018527355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788274e9c41b51%3A0xb66aa2d4fd7ab2e5!2sStudio%20Rupa%20Malang%20Store!5e0!3m2!1sid!2sid!4v1685096592149!5m2!1sid!2sid"></script>
<script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>

<!-- Contact Form Menggunakan formspree -->
<script>
    const contactForm = document.getElementById('contact-form');

    contactForm.addEventListener("submit", function(e) {
        e.preventDefault();

        const url = e.target.action;
        const formData = new FormData(contactForm);

        fetch(url, {
                method: "POST",
                body: formData,
                mode: "no-cors",
            })
            .then((e) => {
                alert("Successful To Send Message");
                window.location.href = 'index.php?page=contact'
            })
            .catch((e) => alert("Failed To Send Message"));
    })
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

</body>

</html>