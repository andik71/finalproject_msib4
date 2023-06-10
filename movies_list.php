<section class="after-head d-flex section-text-white position-relative  pt-5" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Movies List</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <span>Movies</span>
            </div>
        </div>
    </div>
</section>

<!-- Movies List -->
<section class="bg-white pt-5 pb-5 ">
    <div class="container">
        <div class="section-pannel shadow-lg">
            <div class="grid row">
                <div class="col-md-10">
                    <form autocomplete="off">
                        <div class="row form-grid">
                            <div class="col-sm-6 col-lg-3">
                                <div class="input-view-flat input-group">
                                    <select class="form-control" name="genre">
                                        <option selected="true">genre</option>
                                        <option>Action</option>
                                        <option>Crime</option>
                                        <option>Thriller</option>
                                        <option>Adventure</option>
                                        <option>Fantasy</option>
                                        <option>Horror</option>
                                        <option>Biography</option>
                                        <option>History</option>
                                        <option>Family</option>
                                        <option>Drama</option>
                                        <option>Romance</option>
                                        <option>Comedy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="input-view-flat date input-group" data-toggle="datetimepicker" data-target="#release-year-field">
                                    <input class="datetimepicker-input form-control" id="release-year-field" name="releaseYear" type="text" placeholder="release year" data-target="#release-year-field" data-date-format="Y" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="input-view-flat input-group">
                                    <select class="form-control" name="sortBy">
                                        <option selected="true">sort by</option>
                                        <option>name</option>
                                        <option>release year</option>
                                        <option>rating</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 my-md-auto d-flex">
                    <span class="info-title d-md-none mr-3">Select view:</span>
                    <ul class="ml-md-auto h5 list-inline">
                        <li class="list-inline-item">
                            <a class="content-link transparent-link" href="movies-blocks.html"><i class="fas fa-th"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="content-link transparent-link active" href="movies-list.html"><i class="fas fa-th-list"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <article class="movie-line-entity bg-white shadow-lg">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="images/traintobusan.jpeg" alt="" />
                </div>
                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <div class="entity-play">
                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="ttps://www.youtube.com/watch?v=1ovgxN2VWNc" data-magnific-popup="iframe">
                            <span class="icon-content"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="entity-content">
                <h4 class="entity-title text-dark">
                    <a class="content-link " href="index.php?page=movie-info">Train To Busan</a>
                </h4>
                <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">horror</a>,
                    <a class="content-link" href="movies-blocks.html">action</a>
                </div>
                <div class="entity-info text-dark">
                    <div class="info-lines">
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text">8,1</span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text">125</span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text text-dark">Aenean molestie turpis eu aliquam bibendum. Nulla facilisi. Vestibulum quis risus in lorem suscipit tempor. Morbi consectetur enim vitae justo finibus consectetur. Mauris volutpat nunc dui, quis condimentum dolor efficitur et. Phasellus rhoncus porta nunc eu fermentum. Nullam vitae erat hendrerit, tempor arcu eget, eleifend tortor.
                </p>
            </div>
            <div class="entity-extra">
                <div class="text-uppercase entity-extra-title">Tags</div>
                <div class="entity-showtime">
                    <div class="showtime-wrap">
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Action</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Family</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Korea</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Fantasy</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Family</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Korea</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="movie-line-entity bg-white shadow-lg">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="images/spacesweepers.jpg" alt="" />
                </div>
                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <div class="entity-play">
                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=T0uRwQHQgEQ" data-magnific-popup="iframe">
                            <span class="icon-content"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="entity-content ">
                <h4 class="entity-title text-dark">
                    <a class="content-link" href="index.php?page=movie-info">Space Sweepers</a>
                </h4>
                <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">Action</a>,
                    <a class="content-link" href="movies-blocks.html">Adventure</a>
                </div>
                <div class="entity-info text-dark">
                    <div class="info-lines">
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text">6,8</span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text">95</span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                </p>
            </div>
            <div class="entity-extra">
                <div class="text-uppercase entity-extra-title">Tags</div>
                <div class="entity-showtime">
                    <div class="showtime-wrap">
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Drama</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Family</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Korea</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Fantasy</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Family</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Korea</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="movie-line-entity bg-white shadow-lg">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="images/hidayah.jpg" alt="" />
                </div>
                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <div class="entity-play">
                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=H1WYnJF1Pwo" data-magnific-popup="iframe">
                            <span class="icon-content"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="entity-content">
                <h4 class="entity-title text-dark">
                    <a class="content-link" href="index.php?page=movie-info">Hidayah</a>
                </h4>
                <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">Horror</a>,
                    <a class="content-link" href="movies-blocks.html">Family</a>
                </div>
                <div class="entity-info text-dark">
                    <div class="info-lines">
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text">8,7</span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text">130</span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                </p>
            </div>
            <div class="entity-extra">
                <div class="text-uppercase entity-extra-title">Tags</div>
                <div class="entity-showtime">
                    <div class="showtime-wrap">
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Horror</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Family</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Indo</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Drama</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">Family</a>
                        </div>
                        <div class="showtime-item">
                            <a class="btn-time btn" aria-disabled="false" href="#">RELIGI</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <div class="section-bottom">
            <div class="paginator">
                <a class="paginator-item" href="#"><i class="fas fa-chevron-left"></i></a>
                <a class="paginator-item" href="#">1</a>
                <span class="active paginator-item">2</span>
                <a class="paginator-item" href="#">3</a>
                <span class="paginator-item">...</span>
                <a class="paginator-item" href="#">10</a>
                <a class="paginator-item" href="#"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</section>