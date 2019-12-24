<?php $q = htmlentities($this->getParam("q"));?>

<form action="/search">
    <section id="banner-result">
        <div class="container">
            <div class="banner-title">
                <div class="heading-1"><h1><?= $this->t("search-result");?></h1></div>
                <div class="search">
                    <div class="form-group">
                        <div class="search-form">

                            <input type="text" name="q" value="<?=$q?>"><i class="flaticon-search"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php
dump($this->document["items"]);
dump($this->blog["items"]);exit;

?>

<!-- TEMPLATE -->
<section id="search">
    <div class="container">
        <div class="search-wrapper">
            <input id="search-input" class="input-search" type="text" placeholder="Search Here...">
            <button id="search-on" onclick="search(this.id)">
                <img id="button-search" src="/static/images/icon/search.png" widht="36" height="36">
            </button>
        </div>
        <p id="search-result"></p>

        <ul id="result-list" class="hide">
            <a href="">
                <li id="result-wrapper">
                    <h6>Produk</h6>
                    <h3>Pembiayaan dengan Jaminan BPKB <span class="highlight">Motor</span></h3>
                    <p><span class="highlight">Kredit Motor</span> kini lebih mudah dengan pembiayaan BFI hingga 4 tahun. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum excepturi dolor voluptate sint magnam! Officiis eaque totam aspernatur quam neque dicta, maiores iure, voluptatum quidem molestiae aperiam, tenetur placeat. Ipsa!</p>
                </li>
            </a>
            <a href="">
                <li id="result-wrapper">
                    <h6>Produk</h6>
                    <h3>Pembiayaan dengan Jaminan BPKB <span class="highlight">Motor</span></h3>
                    <p><span class="highlight">Kredit Motor</span> kini lebih mudah dengan pembiayaan BFI hingga 4 tahun. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum excepturi dolor voluptate sint magnam! Officiis eaque totam aspernatur quam neque dicta, maiores iure, voluptatum quidem molestiae aperiam, tenetur placeat. Ipsa!</p>
                </li>
            </a>
            <a href="">
                <li id="result-wrapper">
                    <h6>Produk</h6>
                    <h3>Pembiayaan dengan Jaminan BPKB <span class="highlight">Motor</span></h3>
                    <p><span class="highlight">Kredit Motor</span> kini lebih mudah dengan pembiayaan BFI hingga 4 tahun. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum excepturi dolor voluptate sint magnam! Officiis eaque totam aspernatur quam neque dicta, maiores iure, voluptatum quidem molestiae aperiam, tenetur placeat. Ipsa!</p>
                </li>
            </a>
        </ul>
    </div>
</section>

<?php $this->headScript()->prependFile('/static/js/Includes/search.js'); ?>
<!-- TEMPLATE -->
