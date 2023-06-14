<?php
if (isset($_POST['save'])) {
    if (add_director($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = 'index.php?page=director';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            window.location.href = 'index.php?page=director';
        </script>";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
    <p class="mb-4">Add Data director</p>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Add Data</h4>
        </div>
        <div class="card-body">

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="birth">Birth</label>
                    <input class="form-control" id="birth" name="birth" type="date" placeholder="Birth" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="birth:required">Birth is required.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bio">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" type="text" placeholder="Bio" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <div class="invalid-feedback" data-sb-feedback="bio:required">Bio is required.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="formFile">Image</label>
                    <input class="form-control-file" id="formFile" name="img" type="file" data-sb-validations="required" />
                </div>
                <div class="d-grid">
                    <button class="btn btn-success btn-icon-split btn-sm" id="submitButton" name="save" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Submit</span>
                    </button>
                    <button class="btn btn-secondary btn-icon-split btn-sm" id="resetButton" type="reset">
                        <span class="icon text-white-50">
                            <i class="fas fa-undo"></i>
                        </span>
                        <span class="text">Reset</span>
                    </button>
                    <a class="btn btn-danger btn-icon-split btn-sm" id="resetButton" href="index.php?page=director">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->