<?php

/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');
?>

<style>

</style>

<div class="container profile">
    <div class="row">
        <article class="sect-title text-center">
            <h2 class="margin-top-10">Profile Anda</h2>
            <p>Berikut ini adalah profile Anda</p>
        </article>
    </div>
    <div class="row">
        <div class="sect-list">
            <h3>Daftar Kontrak</h3>
            <div class="list contract">
                <ol>
                    <!-- here position list from API -->
                </ol>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="sect-list">
            <h3>Data Pemohon</h3>
            <div class="list profile">
                <div class="detail-wrapper">
                    <span class="label">Nama Lengkap</span>
                    <span class="value-data name">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Email</span>
                    <span class="value-data email">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Nomor Handphone</span>
                    <span class="value-data phone">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Nomor KTP</span>
                    <span class="value-data identity-number">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Foto Ktp</span>
                    <span class="value-data identity-img">
                        <!-- here position list from API --></span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="sect-list">
            <h3>Data Tempat Tinggal</h3>
            <div class="list profile-address">
                <div class="detail-wrapper">
                    <span class="label">Provinsi</span>
                    <span class="value-data province">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Kota</span>
                    <span class="value-data city">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Kecamatan</span>
                    <span class="value-data district">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Kelurahan</span>
                    <span class="value-data subdistrict">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Kode Pos</span>
                    <span class="value-data zip-code">
                        <!-- here position list from API --></span>
                </div>
                <div class="detail-wrapper">
                    <span class="label">Alamat</span>
                    <span class="value-data address">
                        <!-- here position list from API --></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-update">
            <div class="icon">
                <img class="imggetcredit" src="/_default_upload_bucket/form_credit/Mobil.png" alt="">
            </div>
            <div class="content-text">
                <div class="title-update">
                    <h3>Update Data Anda</h3>
                </div>
                <div class="text">
                    <p><span>
                            Jika ada perubahan data profil Anda,
                            silahkan datang ke cabang BFI terdekat
                        </span></p>
                </div>
            </div>
            <div class="button-cabang">
                <button class="cta cta-primary cta-big">Lihat Cabang</button>
            </div>
        </div>
    </div>
</div>

<?php $this->headScript()->prependFile('/static/js/Includes/profile.js'); ?>