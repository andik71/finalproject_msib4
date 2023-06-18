<?php

$data_user = select("SELECT username, name, email, img FROM user WHERE id_user = '$id_user'");

$data_comments = select("SELECT u.name, r.date, r.comment, r.rating  FROM reviewer as r
                        INNER JOIN movie as m ON r.movie_id= m.id_movie 
                        INNER JOIN user as u ON r.user_id = u.id_user 
                     ");

?>
<section class="after-head d-flex section-text-white pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Edit Profile</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <a class="content-link" href="index.php?page=edit_profile">Profile</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container mt-5 mb-5">
        <form action="">
            <div class="row">

            </div>
        </form>
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100 mt-5">
                    <div class="card-body ">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-thumbnail">
                                    <br><br>
                                    <label class="form-label" for="formFile">Image</label>
                                    <input class="form-control-file" id="formFile" name="img" type="file" accept="image/png, image/jpg, image/jpeg" data-sb-validations="required" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100 mt-5">
                    <div class="card-body">
                        <form action="" method="post">
                            <h4 class="form-title text-uppercase">MY 
                                <span class="text-theme">account</span>
                            </h4>
                            <div class="mb-3">
                                <input class="form-control" id="id_user" type="hidden" name="id_actor" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" name="username" type="text" value="" placeholder="Username" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="username:required">userame is required.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" name="name" type="text" value="" placeholder="Name" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Name is required.</div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit" class="btn btn-secondary mt-3">Cancel</button>
                                        <button type="button" id="submit" name="submit" class="btn-theme btn mt-3">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>