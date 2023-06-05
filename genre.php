<section class="after-head d-flex section-text-white position-relative" style="background-image: url('images/image1.png');">
    <div class="d-background bg-black-50"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Genre</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="index.php?page=home">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <span>Action</span>
            </div>
        </div>
    </div>
</section>

<!-- Movies List -->
<section class="bg-white pt-5 pb-5 ">
    <div class="container">
        <div class="section-pannel">
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
        <article class="movie-line-entity bg-white">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="images/black.png" alt="" />
                </div>
                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <div class="entity-play">
                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=MXJYGdZlkXU" data-magnific-popup="iframe">
                            <span class="icon-content"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="entity-content">
                <h4 class="entity-title text-dark">
                    <a class="content-link " href="index.php?page=movies_detail">Black Panther: Wakanda Forever</a>
                </h4>
                <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">Laga</a>,
                    <a class="content-link" href="movies-blocks.html">Petualangan</a>,
                    <a class="content-link" href="movies-blocks.html">Drama</a>
                </div>
                <div class="entity-info text-dark">
                    <div class="info-lines">
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text">7,5</span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text">161</span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text text-dark">Dalam film ini, Ratu Ramonda, Shuri, M’Baku, Okoye, dan Dora Milaje berjuang untuk melindungi kerajaan Wakanda dari campur tangan kekuatan dunia. Setelah kematian King T’Challa, mereka harus bekerjasama dengan Nakia dan Everett Ross demi untuk menghadapi serangan Kerajaan Talokan dari bawah laut.
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
        <article class="movie-line-entity bg-white">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="images/northman.png" alt="" />
                </div>
                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <div class="entity-play">
                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=sbybtPx_WRU" data-magnific-popup="iframe">
                            <span class="icon-content"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="entity-content ">
                <h4 class="entity-title text-dark">
                    <a class="content-link" href="index.php?page=movies_detail">The Northman </a>
                </h4>
                <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">Laga</a>,
                    <a class="content-link" href="movies-blocks.html">Drama Sejarah</a>
                </div>
                <div class="entity-info text-dark">
                    <div class="info-lines">
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text">7,1</span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text">137</span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text text-dark">Film epik historical ini berkisah tentang seorang pangerang Viking bernama Amleth yang berusaha untuk balas dendam setelah kematian ayahnya. Pangeran Amleth pergi ke Islandia untuk mengambil alih semua yang telah pembunuh tersebut curi darinya.
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
        <article class="movie-line-entity bg-white">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="images/top.png" alt="" />
                </div>
                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <div class="entity-play">
                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=DoAL4AWy9Qs" data-magnific-popup="iframe">
                            <span class="icon-content"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="entity-content">
                <h4 class="entity-title text-dark">
                    <a class="content-link" href="index.php?page=movies_detail">Top Gun: Maverick</a>
                </h4>
                <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">Laga</a>,
                    <a class="content-link" href="movies-blocks.html">Petualangan</a>,
                    <a class="content-link" href="movies-blocks.html">Drama</a>
                </div>
                <div class="entity-info text-dark">
                    <div class="info-lines">
                        <div class="info info-short">
                        
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text">8,4</span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text">130</span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text text-dark">Film yang menampilkan aksi dari aktor ternama, Tom Cruise ini mengisahkan tentang kembalinya seorang pilot senior untuk melatih para pilot muda.Misi tersebut dalam rangka untuk memusnahkan persenjataan nuklir musuh pada lokasi yang sangat berbahaya.
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