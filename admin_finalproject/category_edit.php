<?php
// Tangkap ID berdasarkan URL
$id_category = (int)$_GET['id'];

// Query Select
$data_genre = select("SELECT * FROM genre ORDER BY id_genre DESC");
$data_tag = select("SELECT * FROM tag ORDER BY id_tag DESC");
$data_category = select("SELECT * FROM category WHERE id_category = '$id_category'")[0];

if (isset($_POST['save'])) {
    if (edit_category($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = 'index.php?page=category';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            window.location.href = 'index.php?page=category';
        </script>";
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Add Data tag</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Add Data</h4>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-0">
                    <input type="hidden" class="form-control" name="id_category" value="<?= $data_category['id_category'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="genreName">Genre Name</label>
                    <select class="form-control form-select" id="genreName" name="id_genre" aria-label="Genre Name">
                        <?php
                        foreach ($data_genre as $dg) {
                            $selected = ($dg['id_genre'] == $data_category['genre_id']) ? 'selected' : '';
                            echo '<option ' . $selected . ' value="' . $dg['id_genre'] . '">' . $dg['genre'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tagsName">Tags Name</label>
                    <select class="form-control form-select" id="tagsName" name="id_tag" aria-label="Tags Name">
                        <?php
                        foreach ($data_tag as $dt) {
                            $selected = ($dt['id_tag'] == $data_category['tag_id']) ? 'selected' : '';
                            echo '<option ' . $selected . ' value="' . $dt['id_tag'] . '">' . $dt['tags'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-sm" id="submitButton" name="save" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-sm" id="resetButton" type="reset">Reset</button>
                    <a class="btn btn-warning btn-sm" id="resetButton" href="index.php?page=category">Go Back</a>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->