<?php

/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout-credit.html.php');

?>

<?php if (!$this->success) { ?>

    <div class="stepper-wrapper container">
        <nav>
            <ul class="stepper-row">
                <li id="list-step1" class="active">
                    <span id="poin1" class="number">1</span>
                    <span class="text">Data Pemohon</span>
                </li>
                <li id="list-step2">
                    <span id="poin2" class="number">2</span>
                    <span class="text">Data Universitas</span>
                </li>
                <li id="list-step3">
                    <span id="poin3" class="number">3</span>
                    <span class="text">Data Akademik</span>
                </li>
                <li id="list-step4">
                    <span id="poin4" class="number">4</span>
                    <span class="text">Konfirmasi Data</span>
                </li>
            </ul>
        </nav>

        <div id="stepper">
            <?php if ($this->msg_error) {
                echo '<div class="alert alert-danger" role="alert">' . $msg_error . '</div>';
            } ?>
            <h3 id="step-title">Data Pemohon</h3>
            <p id="step-subtitle">Silahkan masukkan data diri anda</p>

            <form method="POST" name="scholarship" enctype="multipart/form-data">
                <div class="step-content" id="stepper-csr-1">
                    <div class="form-wrapper">
                        <div class="input-text-group">
                            <input name="scholarship[name]" id="name-input" class="style-input" type="text" onfocus="changeLabel(this.id)" onfocusout="deleteLabel(this.id)" required>
                            <label id="name-label" class="input-label">Masukkan nama lengkap anda</label>
                        </div>
                        <div class="input-text-group">
                            <input name="scholarship[email]" id="email-input" class="style-input" type="email" onfocus="changeLabel(this.id)" onfocusout="deleteLabel(this.id)" required>
                            <label id="email-label" class="input-label">Masukkan email anda</label>
                        </div>
                        <div class="input-text-group">
                            <input name="scholarship[phone]" id="phone-input" class="style-input formPhoneNumber" type="text" onfocus="changeLabel(this.id)" onfocusout="deleteLabel(this.id)" maxlength="13" required>
                            <label id="phone-label" class="input-label">Masukkan nomor handphone anda</label>
                        </div>
                        <div class="input-text-group">
                            <input name="scholarship[phone2]" id="alt-phone-input" class="style-input formPhoneNumber" type="text" onfocus="changeLabel(this.id)" onfocusout="deleteLabel(this.id)" maxlength="13">
                            <label id="alt-phone-label" class="input-label">Masukkan nomor handphone alternatif</label>
                        </div>
                        <div id="upload">
                            <h5 id="upload-text"><?= $this->translate('upload-photo-3x4') ?></h5>
                            <img id="preview-upload" src="">
                            <div class="upload-content-wrapper">
                                <div class="upload-btn-wrapper">
                                    <button id="upload-button" class="btn-upload">
                                        Pilih File
                                    </button>
                                    <input id="file-upload" class="hide-input" type="file" name="photo">
                                </div>
                                <span id="file-upload-filename"></span>
                            </div>
                            <!-- <p>Pastikan foto KTP terlihat jelas (max. ukuran file adalah 300kB)</p> -->
                            <p><?= $this->translate('upload-photo-max') ?></p>
                        </div>
                    </div>
                    <div id="step-1" class="next-prev-container">
                        <a href="#stepper-csr-2" class="btn-next-prev" onclick="nextToStep2()">
                            <span>SELANJUTNYA</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="step-content hide" id="stepper-csr-2">
                    <div class="form-wrapper">
                        <div class="input-text-group">
                            <input name="scholarship[university]" id="univ-input" class="style-input" type="text" onfocus="changeLabelAcademic(this.id)" onfocusout="deleteLabelAcademic(this.id)" required>
                            <label id="univ-label" class="input-label">Masukkan nama universitas anda</label>
                        </div>
                        <div class="input-text-group">
                            <input name="scholarship[nim]" id="nim-input" class="style-input" type="text" onfocus="changeLabelAcademic(this.id)" onfocusout="deleteLabelAcademic(this.id)" required>
                            <label id="nim-label" class="input-label">Masukkan nomor NIM / NPM</label>
                        </div>
                        <div class="input-text-group">
                            <input name="scholarship[faculty]" id="fak-input" class="style-input" type="text" onfocus="changeLabelAcademic(this.id)" onfocusout="deleteLabelAcademic(this.id)" required>
                            <label id="fak-label" class="input-label">Masukkan fakultas anda</label>
                        </div>
                        <div class="input-text-group">
                            <input name="scholarship[prodi]" id="prodi-input" class="style-input" type="text" onfocus="changeLabelAcademic(this.id)" onfocusout="deleteLabelAcademic(this.id)">
                            <label id="prodi-label" class="input-label">Masukkan program studi anda</label>
                        </div>
                        <div class="input-text-group">
                            <select class="semester style-input" name="scholarship[semester]">
                                <option></option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                            </select>
                            <label id="semester-label" class="input-label">Pilih Semester</label>
                        </div>
                    </div>
                    <div id="step-2" class="next-prev-container">
                        <a href="#stepper-csr-1" class="btn-next-prev" onclick="backToStep1()">
                            <i class="fa fa-chevron-left"></i>
                            <span>SEBELUMNYA</span>
                        </a>
                        <a href="#stepper-csr-3" class="btn-next-prev" onclick="nextToStep3()">
                            <span>SELANJUTNYA</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="step-content hide" id="stepper-csr-3">
                    <div class="form-wrapper" id="form-semester-ipk">

                        <!-- input template generated from js -->

                        <!-- input template generated from js -->

                        <div id="upload">
                            <h5 id="upload-pdf-text">Unggah Transkrip Nilai</h5>
                            <div id="show">
                                <img id="preview-pdf-upload" src="">
                                <span id="pdf-filename"></span>
                            </div>
                            <div class="upload-content-wrapper">
                                <div class="upload-btn-wrapper">
                                    <button id="upload-pdf-button" class="btn-upload">
                                        Pilih File
                                    </button>
                                    <input id="file-pdf-upload" class="hide-input" type="file" name="transcript">
                                </div>
                            </div>
                            <p>Mohon file disatukan dalam PDF (Ukuran Maksimal 5 MB)</p>
                        </div>
                    </div>
                    <div id="step-3" class="next-prev-container">
                        <a href="#stepper-csr-2" class="btn-next-prev" onclick="backToStep2()">
                            <i class="fa fa-chevron-left"></i>
                            <span>SEBELUMNYA</span>
                        </a>
                        <a href="#stepper-csr-4" class="btn-next-prev" onclick="nextToStep4()">
                            <span>SELANJUTNYA</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="step-content hide" id="stepper-csr-4">
                    <div class="form-wrapper">
                        <section id="data-pemohon" class="data-wrapper">
                            <div class="title-and-button">
                                <h4 class="point">A.</h4>
                                <h4 class="title">Data Pemohon</h4>
                                <a href="#stepper-csr-1" onclick="jumpToStep1()">
                                    <!-- <i class="fa fa-pencil"></i> -->
                                    <span>Ubah</span>
                                </a>
                            </div>
                            <div class="data-detail">
                                <div class="detail-wrapper">
                                    <span class="label">Nama Lengkap</span>
                                    <span id="nama-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">Email</span>
                                    <span id="email-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">Nomor Handphone</span>
                                    <span id="hp-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">Foto 3x4</span>
                                    <span id="foto-peserta" class="input">: PasPoto.jpg</span>
                                </div>
                            </div>
                        </section>
                        <hr>
                        <section id="data-universitas" class="data-wrapper">
                            <div class="title-and-button">
                                <h4 class="point">B.</h4>
                                <h4 class="title">Data Universitas</h4>
                                <a href="#stepper-csr-2" onclick="jumpToStep2()">
                                    <!-- <i class="fa fa-pencil"></i> -->
                                    <span>Ubah</span>
                                </a>
                            </div>
                            <div class="data-detail">
                                <div class="detail-wrapper">
                                    <span class="label">Universitas</span>
                                    <span id="univ-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">NIM / NPM</span>
                                    <span id="nim-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">Fakultas</span>
                                    <span id="fak-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">Jurusan</span>
                                    <span id="prodi-peserta" class="input"></span>
                                </div>
                                <div class="detail-wrapper">
                                    <span class="label">Semester</span>
                                    <span id="smt-peserta" class="input"></span>
                                </div>
                            </div>
                        </section>
                        <hr>
                        <section id="data-akademik" class="data-wrapper">
                            <div class="title-and-button">
                                <h4 class="point">C.</h4>
                                <h4 class="title">Data Akademik</h4>
                                <a href="#stepper-csr-3" onclick="jumpToStep3()">
                                    <!-- <i class="fa fa-pencil"></i> -->
                                    <span>Ubah</span>
                                </a>
                            </div>
                            <div id="list-ipk" class="data-detail">
                                <!-- Template sesuai dgn formstep4.js -->
                                <!-- <div class="detail-wrapper">
                                <span class="label">Semester</span>
                                <span class="input">: 1</span>
                            </div>
                            <div class="detail-wrapper">
                                <span class="label">IPK</span>
                                <span class="input">: 3.25</span>
                            </div> -->

                                <div class="detail-wrapper">
                                    <span class="label">Transkrip Nilai</span>
                                    <span id="transkrip-peserta" class="input"></span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="step-3" class="next-prev-container">
                        <a href="#stepper-csr-3" class="btn-next-prev" onclick="backToStep3()">
                            <i class="fa fa-chevron-left"></i>
                            <span>SEBELUMNYA</span>
                        </a>
                        <!-- <a href="#stepper-csr-4" class="btn-next-prev" onclick="nextToStep4()">
                        <span>SELESAI</span>
                        <i class="fa fa-chevron-right"></i>
                    </a> -->
                        <button class="btn-next-prev" type="submit">
                            <span>SELESAI</span>
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php $this->headScript()->prependFile('/static/js/Includes/pendaftaranCSR.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/Includes/formStep1.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/Includes/formStep2.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/Includes/formStep3.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/Includes/formStep4.js'); ?>


<?php } else { ?>
    <?= $this->template('Includes/success.html.php') ?>
<?php } ?>