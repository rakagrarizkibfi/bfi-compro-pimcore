<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<?php

/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout-credit.html.php');
$this->headScript()
    ->offsetSetFile(100, '/static/js/Includes/mobil.js');
$this->headScript()
    ->offsetSetFile(101, '/static/js/Includes/general-form.js');
$this->headScript()
    ->offsetSetFile(102, '/static/js/Includes/general-otp.js');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 no-padding">
            <div class="tab-get--credit">
                <nav class="step-list">
                    <ul class="nav nav-tab">
                        <li class="nav-item-2 active">
                            <a>
                                <span class="nav-icon">
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                    <b><i class="fas fa-file-signature"></i></b>
                                </span>
                                <div class="nav-content">
                                    <span class="nav-step-text">Step 1</span>
                                    <p class="nav-step-desc"><?= $this->translate('data-ndfc-step-1') ?></p>
                                    <span class="nav-step-tag"><?= $this->translate('state-step') ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item-3">
                            <a>
                                <span class="nav-icon">
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                    <b><i class="fas fa-house-user"></i></b>
                                </span>
                                <div class="nav-content">
                                    <span class="nav-step-text">Step 2</span>
                                    <p class="nav-step-desc"><?= $this->translate('data-ndfc-step-2') ?></p>
                                    <span class="nav-step-tag"><?= $this->translate('state-step') ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item-4">
                            <a>
                                <span class="nav-icon">
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                    <b><i class="fas fa-calculator"></i></b>
                                </span>
                                <div class="nav-content">
                                    <span class="nav-step-text">Step 3</span>
                                    <p class="nav-step-desc"><?= $this->translate('data-ndfc-step-3') ?></p>
                                    <span class="nav-step-tag"><?= $this->translate('state-step') ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item-5">
                            <a>
                                <span class="nav-icon">
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                    <b><i class="fas fa-calculator" aria-hidden="true"></i></b>
                                </span>
                                <div class="nav-content">
                                    <span class="nav-step-text">Step 4</span>
                                    <p class="nav-step-desc"><?= $this->translate('data-ndfc-step-4') ?></p>
                                    <span class="nav-step-tag"><?= $this->translate('state-step') ?></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <form action="#" id="getCredit" method="POST" class="form-get--credit" role="form">
                    <input type="hidden" id="jenis_form" name="jenis_form" value="MOBIL">
                    <input type="hidden" id="ndf_max_fund" name="max_fund" value="<?= $maxFundPercentage; ?>">
                    <div class="tab-content">
                        <div id="menu2" class="tab-pane fade in active">
                            <div class="form-body--credit">
                                <div class="text-head">
                                    <h1 class="text-center">
                                        <?= $this->translate('ndfc-title-step-1') ?>
                                    </h1>
                                    <p class="text-center"><?= $this->translate('data-name-sub') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap"><?= $this->translate('form-name') ?></label>
                                    <input type="text" class="form-control formRequired formAlphabet" name="nama_lengkap" id="nama_lengkap" placeholder="<?= $this->translate('placeholder-name') ?>">
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="idnumber"><?= $this->translate('form-idnumber') ?></label>
                                    <input type="text" class="form-control formIdnumber" name="idnumber" id="idnumber" placeholder="<?= $this->translate('placeholder-idnumber') ?>" maxlength="16">
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="no_handphone"><?= $this->translate('form-hp') ?></label>
                                    <input type="tel" pattern="\d*" class="form-control formPhoneNumber" name="no_handphone" id="no_handphone" maxlength="13" placeholder="<?= $this->translate('placeholder-hp') ?>">
                                    <div class="error-wrap"></div>
                                    <span><?=$this->translate('form-handphone-helper') ?></span>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('is-wa-number') ?></label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="is-wa-number"
                                                name="is-wa-number" value="true">
                                            <label
                                                for="is-wa-number"><?=$this->translate('option-text-yes') ?></label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="is-wa-number1"
                                                name="is-wa-number" value="false">
                                            <label
                                                for="is-wa-number1"><?=$this->translate('option-text-no') ?></label>
                                        </div>
                                        <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group wa-numbers" hidden>
                                    <label for="wa_number"><?= $this->translate('label-wa-number') ?></label>
                                    <input type="tel" pattern="\d*" class="form-control formPhoneNumber" name="wa-number" id="wa_number" maxlength="13" placeholder="<?= $this->translate('placeholder-wa-number') ?>">
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email"><?= $this->translate('form-email') ?></label>
                                    <input type="email" class="form-control formRequired formEmail" name="email" id="email_pemohon" placeholder="<?= $this->translate('placeholder-email') ?>">
                                    <div class="error-wrap"></div>
                                    <span><?=$this->translate('form-email-helper') ?></span>
                                    <div class="label-cekLogin hide"><?= $this->translate('text-cekLogin') ?><a href="#" class="logout" onclick="return logout('id');"><?= $this->translate('status-login') ?></a></div>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="utm_source">utm_source</label>
                                    <input type="utm_source" class="form-control" name="utm_source" id="utm_source" placeholder="utm_source" readonly>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="utm_campaign">utm_campaign</label>
                                    <input type="utm_campaign" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="utm_campaign" readonly>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="utm_term">utm_term</label>
                                    <input type="utm_term" class="form-control" name="utm_term" id="utm_term" placeholder="utm_term" readonly>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="utm_medium">utm_medium</label>
                                    <input type="utm_medium" class="form-control" name="utm_medium" id="utm_medium" placeholder="utm_medium" readonly>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="utm_content">utm_content</label>
                                    <input type="utm_content" class="form-control" name="utm_content" id="utm_content" placeholder="utm_content" readonly>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group form-btn side-right">
                                    <button class="cta cta-primary cta-big cta-see buttonnext" id="next1"
                                        type="button"><?=$this->translate('next') ?></button>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane slide-left">
                            <div class="form-body--credit">
                                <div class="text-head">
                                    <h2 class="text-center">
                                        <?= $this->translate('ndfc-title-step-2') ?>
                                    </h2>
                                    <p class="text-center"><?= $this->translate('ndfc-subtitle-step-2') ?></p>
                                </div>
                                <div class="text-title-form">
                                    <h3><?= $this->translate('data-address-title') ?></h3>
                                    <p><?= $this->translate('data-address-subtitle') ?></p>
                                </div>
                                <!-- <div class="form-group">
                                    <button type="button" class="cta cta-primary cta-block" id="address-btn" data-toggle="modal" data-target="#addressModal"><i class="fas fa-search"></i> CARI ALAMAT</button>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="kelurahan2"><?= $this->translate('label-kelurahan') ?></label>
                                    <input type="text" class="form-control formRequired formAlphabet" name="kelurahan2" id="kelurahan2" placeholder="<?= $this->translate('placeholder-kelurahan') ?>" readonly>
                                    <div class="error-wrap"></div>
                                </div> -->
                                <div class="form-group">
                                    <label for="provinsi"><?=$this->translate('label-provinsi') ?></label>
                                    <select class="form-control inputs formRequired" id="provinsi"
                                        name="provinsi" placeholder="<?=$this->translate('placeholder-provinsi') ?>"
                                        multiple="multiple" >
                                    <option value="" disabled selected>Provinsi</option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label><?=$this->translate('label-kota') ?></label>
                                    <select class="form-control inputs formRequired" id="kota" name="kota"
                                        placeholder="<?=$this->translate('placeholder-kota') ?>"
                                        multiple="multiple" />
                                    <option value="" disabled selected>
                                        <?=$this->translate('choose-kota') ?>
                                    </option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label><?=$this->translate('label-kecamatan') ?></label>
                                    <select class="form-control inputs formRequired" id="kecamatan"
                                        name="kecamatan"
                                        placeholder="<?=$this->translate('placeholder-kecamatan') ?>"
                                        multiple="multiple" />
                                    <option value="" disabled selected>
                                        <?=$this->translate('choose-kecamatan') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label><?=$this->translate('label-kelurahan') ?></label>
                                    <select class="form-control inputs formRequired" id="kelurahan"
                                        name="kelurahan"
                                        placeholder="<?=$this->translate('placeholder-kelurahan') ?>"
                                        multiple="multiple" />
                                    <option value="" disabled selected>
                                        <?=$this->translate('choose-kelurahan') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos"><?=$this->translate('label-postcode') ?></label>
                                    <input type="text" class="form-control inputs formKodePos" name="kode_pos"
                                        id="kode_pos"
                                        placeholder="<?=$this->translate('placeholder-postcode') ?>" readonly>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label class="label-place" for="alamat_lengkap"><?= $this->translate('label-place') ?></label>
                                    <textarea class="form-control formRequired formAddress" name="alamat_lengkap" id="alamat_lengkap" placeholder="<?= $this->translate('placeholder-place') ?> Contoh: Jalan Rajawali 1 Blok A no.11 RT 01 RW 02"></textarea>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="text-title-form">
                                    <h3><?= $this->translate('data-ndfc-title') ?></h3>
                                    <p><?= $this->translate('data-ndfc-subtitle') ?></p>
                                </div>
                                <div class="form-group">
                                    <label><?= $this->translate('label-merk') ?></label>
                                    <select class="c-custom-select-trans form-control formRequired" placeholder="<?= $this->translate('placeholder-merk') ?>" id="merk_kendaraan" name="merk_kendaraan" multiple="multiple">
                                        <option value="" disabled> <?= $this->translate('placeholder-merk') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label><?= $this->translate('label-type') ?></label>
                                    <select class="c-custom-select-trans form-control formRequired" placeholder="<?= $this->translate('placeholder-type') ?>" id="type_kendaraan" name="type_kendaraan" multiple="multiple">
                                        <option value="" disabled selected> <?= $this->translate('placeholder-type') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label><?= $this->translate('label-model') ?></label>
                                    <select class="c-custom-select-trans form-control formRequired" placeholder="<?= $this->translate('placeholder-model') ?>" id="model_kendaraan" name="model_kendaraan" multiple="multiple">
                                        <option value="" disabled> <?= $this->translate('placeholder-model') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                    <span><?= $this->translate('model-helper') ?></span>
                                </div>
                                <div class="form-group">
                                    <label><?= $this->translate('label-tahun') ?></label>
                                    <select class="c-custom-select-trans form-control formRequired" placeholder="<?= $this->translate('placeholder-tahun') ?>" id="tahun_kendaraan" name="tahun_kendaraan" multiple="multiple">
                                        <option value="" disabled> <?= $this->translate('placeholder-tahun') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="tahun_kendaraan_text"><?= $this->translate('label-tahun') ?></label>
                                    <input type="text" class="form-control formYear formRequired" maxlength="4" name="tahun_kendaraan_text" id="tahun_kendaraan_text" maxlength="4" placeholder="<?= $this->translate('placeholder-tahun-text') ?>">
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="plat-no"><?= $this->translate('label-number-plat') ?></label>
                                    <input type="text" class="form-control formRequired formLicensePlate" name="plat-no" id="plat-no" placeholder="<?= $this->translate('placeholder-number-plat') ?>">
                                    <div class="error-wrap"></div>
                                    <span><?=$this->translate('form-plat-number-helper') ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="kepemilikan_bpkb"><?= $this->translate('label-bpkb-ownership') ?></label>
                                    <select class="c-custom-select-trans form-control formRequired" placeholder="<?= $this->translate('placeholder-bpkb-ownership') ?>" id="kepemilikan_bpkb" name="kepemilikan_bpkb" multiple="multiple" >
                                        <option value="" disabled selected> <?= $this->translate('placeholder-bpkb-ownership') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group form-btn side-right">
                                   <button class="cta cta-primary cta-big cta-see buttonnext" id="next2"
                                        type="button"><?=$this->translate('next') ?></button>
                                </div>
                            </div>
                        </div>
                        <div id="menu4" class="tab-pane slide-left">
                            <div class="form-body--credit">
                                <div class="text-head">
                                    <h2 class="text-center"><?= $this->translate('ndfc-title-step-3') ?></h2>
                                    <p class="text-center"><?= $this->translate('ndfc-subtitle-step-3') ?></p>
                                </div>
                                <div class="text-title-form">
                                    <h3><?= $this->translate('additional-data-title') ?></h3>
                                    <p><?= $this->translate('additional-data-subtitle') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="kepemilikan_rumah"><?= $this->translate('label-house-ownership') ?></label>
                                    <select class="c-custom-select-trans form-control formRequired" placeholder="<?= $this->translate('placeholder-house-ownership') ?>" id="kepemilikan_rumah" name="kepemilikan_rumah" multiple="multiple">
                                        <option value="" disabled selected></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('title-form-address-asset') ?></label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="addres_same"
                                                name="addres_same" value="true">
                                            <label
                                                for="addres_same"><?=$this->translate('option-text-yes') ?></label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="addres_same1"
                                                name="addres_same" value="false">
                                            <label
                                                for="addres_same1"><?=$this->translate('option-text-no') ?></label>
                                        </div>
                                         <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('label-work') ?></label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="occupation"
                                                name="occupation" value="Karyawan">
                                            <label
                                                for="occupation">Karyawan</label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="occupation1"
                                                name="occupation" value="Wiraswasta">
                                            <label
                                                for="occupation1">Wiraswasta</label>
                                        </div>
                                         <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label for="marital_status"><?= $this->translate('label-marital-state') ?></label>
                                    <select class="form-control inputs formRequired" id="marital_status"
                                        name="marital_status" placeholder="<?= $this->translate('placeholder-marital-state') ?>"
                                        multiple="multiple">
                                        <option value="" disabled selected><?= $this->translate('placeholder-marital-state') ?></option>
                                    </select>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan"><?=$this->translate('label-income') ?></label>
                                    <input type="text"
                                        class="formatRibuan formMaxSalary form-control inputs formRequired"
                                        name="penghasilan" id="penghasilan"
                                        placeholder="<?=$this->translate('placeholder-income') ?>">
                                    <div class="error-wrap"></div>
                                    <span><?=$this->translate('helper-income') ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <label for="tgl_lahir"><?= $this->translate('form-birthDate') ?></label>
                                        <input type="text" class="iptDate form-control formRequired" name="tgl_lahir" id="tgl_lahir" placeholder="<?= $this->translate('placeholder-birthDate') ?>">
                                    </div>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="text-title-form">
                                    <h3><?= $this->translate('label-financing-calculation') ?></h3>
                                </div>
                                <div class="form-group  simulasi-group rincian">
                                    <div class="total-estimate ndfc-simulasi">
                                        <div class="simulasi-header">
                                            <h4><?= $this->translate('guaranteed-car') ?></h4>
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <p class="title"><?= $this->translate('brand') ?></p>
                                                    <p class="subtitle" id="brand-caption"><?= $this->translate('brand') ?></p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <p class="title"><?= $this->translate('model') ?></p>
                                                    <p class="subtitle" id="model-caption"><?= $this->translate('model') ?></p>
                                                </div>
                                                <div class="col-xs-3">
                                                    <p class="title"><?= $this->translate('year') ?></p>
                                                    <p class="subtitle" id="year-caption"><?= $this->translate('year') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="title-angsuran text-center"><?= $this->translate('label-max-financing') ?></p>
                                        <p class="total text-center">Rp 0</p>
                                    </div>
                                </div>
                                <div class="form-group simulasi-group sliderGroup inputsimulasi">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                                        <label for="pembiayaan"><?= $this->translate('desired-financing') ?></label>
                                        <input type="tel" pattern="\d*" id="pembiayaan"
                                            class="form-control inputs minFundingNdfc formatRibuan formRequired c-input-trans"
                                            aria-describedby="basic-addon1"
                                            placeholder="<?= $this->translate('desired-financing') ?>">
                                    </div>
                                    <div class="slidecontainer ">
                                        <div class="value-left valuemin min-fund">Rp 10.000.000</div>
                                        <div class="value-right valuemax max-fund">Rp 64.190.000</div>
                                        <input id="funding" class="customslide" type="range"
                                            data-slider-handle="custom" data-slider-tooltip="hide" />
                                    </div>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group simulasi-group sliderGroup inputsimulasi">
                                    <label for="tenor"><?= $this->translate('desired-tenor') ?></label>
                                    <input type="tel" pattern="\d*" id="tenor"
                                        class="form-control inputs formRequired c-input-trans"
                                        aria-describedby="basic-addon1"
                                        placeholder="<?= $this->translate('desired-tenor') ?>" disabled>
                                    <div class="slidecontainer ">
                                        <div class="value-left valuemin min-tenor">12 Bulan</div>
                                        <div class="value-right valuemax max-tenor">18 Bulan</div>
                                        <input id="tenor2" class="customslide" type="range"
                                            data-slider-handle="custom" data-slider-tooltip="hide" />
                                    </div>
                                    <div class="error-wrap"></div>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('assurance-year') ?> 1</label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="allRisk1"
                                                name="assurance1" value="ARK">
                                            <label
                                                for="allRisk1">All Risk</label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="totalLost1"
                                                name="assurance1" value="TLO">
                                            <label
                                                for="totalLost1">Total Lost Only</label>
                                        </div>
                                         <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('assurance-year') ?> 2</label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="allRisk2"
                                                name="assurance2" value="ARK">
                                            <label
                                                for="allRisk2">All Risk</label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="totalLost2"
                                                name="assurance2" value="TLO">
                                            <label
                                                for="totalLost2">Total Lost Only</label>
                                        </div>
                                         <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('assurance-year') ?> 3</label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="allRisk3"
                                                name="assurance3" value="ARK">
                                            <label
                                                for="allRisk3">All Risk</label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="totalLost3"
                                                name="assurance3" value="TLO">
                                            <label
                                                for="totalLost3">Total Lost Only</label>
                                        </div>
                                         <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group radio-group">
                                    <label><?= $this->translate('assurance-year') ?> 4</label>
                                    <div class="radio-button">
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="allRisk4"
                                                name="assurance4" value="ARK">
                                            <label
                                                for="allRisk4">All Risk</label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input type="radio" class="inputs formRequired" id="totalLost4"
                                                name="assurance4" value="TLO">
                                            <label
                                                for="totalLost4">Total Lost Only</label>
                                        </div>
                                         <div class="error-wrap"></div>
                                    </div>
                                </div>
                                <div class="form-group  simulasi-group rincian">
                                    <div class="total-estimate">
                                        <p class="title-angsuran"><?= $this->translate('estimated-monthly-installment') ?></p>
                                        <p class="total estimate-installment">Rp 0</p>
                                        <button class="cta cta-primary cta-big absolutebutcalc" id="calcLoan"
                                            type="button" disabled><?=$this->translate('hitung') ?></button>
                                        <div class="error-wrap" id="warning-calc" hidden></div>
                                    </div>
                                    <p class="infotext"><?= $this->translate('installment-disclaimer') ?></p>
                                </div>
                                <div class="form-group form-btn space-btn">
                                    <button class="cta cta-primary-outline cta-big cta-back buttonback"
                                        id="back3" type="button"><?=$this->translate('before') ?>
                                    </button>
                                    <button class="cta cta-primary cta-big cta-see buttonnext" id="next3"
                                        type="button" disabled><?=$this->translate('next') ?></button>
                                </div>
                            </div>
                        </div>
                        <div id="menu5" class="tab-pane slide-left">
                            <div class="form-body--credit">
                                <h2 class="text-center"><?=$this->translate('confirmation-otp') ?></h2>
                                <p class="text-center"><?=$this->translate('text-confirmation-otp') ?></p>
                                <div class="otp-number form-group">
                                    <div class="otp-number__verify">
                                        <input type="tel" pattern="\d*" class="input-number formRequired"
                                            maxlength="1" name="otp1">
                                        <input type="tel" pattern="\d*" class="input-number formRequired"
                                            maxlength="1" name="otp2">
                                        <input type="tel" pattern="\d*" class="input-number formRequired"
                                            maxlength="1" name="otp3">
                                        <input type="tel" pattern="\d*" class="input-number formRequired"
                                            maxlength="1" name="otp4">
                                    </div>
                                    <div class="error-wrap"></div>
                                    <div class="otp-number__text">
                                        <p class="otp-wait"><?= $this->translate('wait-otp')?> <span id="otp-counter" class="countdown"></span> </p>
                                        <p class="otp-resend"><?= $this->translate('dont-get-otp')?> <span id="resendOTP" class="countdown">Resend</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="button-area text-center">
                                <button class="cta cta-primary cta-big cta-see buttonnext" id="next5"
                                    type="button"><?=$this->translate('verifikasi') ?></button>
                            </div>
                        </div>
                        <div id="success" class="success-wrapper">
                            <div class="wrapper">
                                <div class="img-wrap">
                                    <img class="icon-thank-page" src="/static/images/icon/m_thank_you.png"
                                        alt="">
                                </div>
                                <div class="text-wrap text-center">
                                    <h3><?=$this->translate('data-step-finish') ?></h3>
                                    <p><?=$this->translate('sub-step-finish') ?></p>
                                </div>
                                <div id="box-document">
                                    <p><?=$this->translate('dokumen-persyaratan') ?></p>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('id-card') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('kk-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('stnk-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('bpkb-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('npwp-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('rek-six-month-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('akta-nikah-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class=" box-item">
                                                <div class="wrap-icon">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="wrap-text">
                                                    <p><?=$this->translate('slip-gaji-text') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-button">
                                    <p><?=$this->translate('pertanyaan-wa') ?></p>
                                    <div class="button-area text-center">
                                        <a href="/id/" class="cta cta-success cta-big">
                                            <i class="fab fa-whatsapp"></i>
                                            <span><?=$this->translate('wa-number') ?></span></a>
                                    </div>
                                    <div class="button-area text-center">
                                        <a href="#" id="btn-check" class="cta cta-primary-outline cta-big ">
                                            <span><?=$this->translate('cek-pengajuan-text') ?></span></a>
                                    </div>
                                    <div class="button-area text-center">
                                        <a href="<?php echo "/" . $this->getLocale() . '/' . $link; ?>" class="cta cta-primary-text cta-big ">
                                            <span><?=$this->translate('backtohome') ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Address Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content address-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModalLabel"><?= $this->translate('search-address') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" name="search-address" id="search-address-input" placeholder="<?= $this->translate('placeholder-search-address') ?>">
            <button class="cta cta-primary" id="search-address-btn"><i class="fas fa-search"></i></button>
        </div>
        <div class="row result-address">
            <div class="col-xs-12">
                <div id="data-container"></div>
                <div id="pagination-container"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal timeout -->
<div class="modal fade" id="modal-timeout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-body-title"><?= $this->translate('timeout-title') ?></h4>
                <p class="modal-body-text"><?= $this->translate('timeout-description') ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="cta cta-primary go-to-home" data-dismiss="modal" ><?=$this->translate('backtohome') ?></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal notcover -->
<div class="modal fade" id="modal-not-cover" tabindex="-1" role="dialog" aria-labelledby="AssetNotCover" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-body-title"><?=$this->translate('asset-not-cover-text') ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="cta cta-primary go-to-home" data-dismiss="modal" ><?=$this->translate('backtohome') ?></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-body-title"><?=$this->translate('confirmation-text') ?></h4>
                <p class="modal-body-text"><?=$this->translate('recheck-text') ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="cta cta-block cta-primary-outline" data-dismiss="modal"><?=$this->translate('recheck-btn') ?></button>
                <button type="button" class="cta cta-block cta-primary" data-dismiss="modal" id="confirm-data"><?=$this->translate('next-step-text') ?></button>
            </div>
        </div>
    </div>
</div>

<div id="wrongOtp" class="modal modal--failed fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content text-center">
            <div class="modal-body">
                <p><?= $this->translate('wrong-otp') ?></p>
                <button type="button" class="cta cta-orange" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div id="failedOtp" class="modal modal--failed fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content text-center">
            <div class="modal-body">
                <p><?= $this->translate('wrong-server') ?></p>
                <button type="button" class="cta cta-orange" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-branch -->
<div class="modal fade" id="modal-branch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content branch">
            <div class="modal-body">
                <h4><?= $this->translate('Branch not available'); ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?= $this->translate('close'); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal branch -->

<!-- Modal-pricing -->
<div class="modal fade" id="modal-pricing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content branch">
            <div class="modal-body">
                <h4><?= $this->translate('pricing-not-found'); ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?= $this->translate('close'); ?></button>
            </div>
        </div>
    </div>
</div>