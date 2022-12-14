<?php

/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout-credit.html.php');
$this->headScript()->offsetSetFile(100, '/static/js/Includes/travel.js');
$this->headScript()->offsetSetFile(101, '/static/js/Includes/general-form.js');
$this->headScript()->offsetSetFile(102, '/static/js/Includes/general-otp.js');

$blogList = new Pimcore\Model\DataObject\BlogArticle\Listing();
$blogList->setOrderKey("Date");
$blogList->setOrder("desc");
$blogList->setLimit(4);
?>

<div class="container">
    <div class="">

        <form id="getCredit" class="form-get--credit" action="#">
            <input type="hidden" id="jenis_form" name="jenis_form" value="TRAVEL">

            <!-- STEP 1 -->
            <h3><?= $this->translate('data-name') ?></h3>
            <fieldset class="form-body--credit">
                <div class="text-head">
                    <h2 class="text-center"><?= $this->translate('data-name'), $this->translate('data-name-travel') ?></h2>
                    <h2 class="text-center-edit"><?= $this->translate('change-data-name') ?></h2>
                    <p class="text-center"><?= $this->translate('input-data-name') ?></p>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap"><?= $this->translate('form-name') ?></label>
                    <input type="text" class="form-control formRequired formAlphabet" name="nama_lengkap" id="nama_lengkap" placeholder="<?= $this->translate('placeholder-name') ?>">
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label for="email_pemohon"><?= $this->translate('form-email') ?></label>
                    <input type="email" class="form-control formRequired formEmail" name="email_pemohon" id="email_pemohon" placeholder="<?= $this->translate('placeholder-email') ?>">
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label for="no_handphone"><?= $this->translate('form-hp') ?></label>
                    <input type="tel" pattern="\d*" class="form-control formPhoneNumber" name="no_handphone" id="no_handphone" maxlength="13" placeholder="<?= $this->translate('placeholder-hp') ?>">
                    <div class="error-wrap"></div>
                </div>
                <!--<div class="form-group upload-image">
                    <label><?= $this->translate('label-ktp-new') ?></label>
                    <div class="upload-file">
                        <img src="" />
                        <div class="upload-btn">
                            <input type="file" class="file-input" accept="image/*" data-id="ktp" onchange=" document.getElementById('upload-ktp-button').innerHTML = '<?= $this->translate('Ubah Foto KTP') ?>';"/>
                            <button type="button" id="upload-ktp-button"><?= $this->translate('form-ktp') ?></button>
                            <b></b>
                        </div>
                    </div>
                    <input type="hidden" class="form-control formRequired" name="ktp" id="ktp">
                    <div class="error-wrap"></div>
                    <span class="notif-ktp"><?= $this->translate('placeholderNoktp') ?></span>
                    <div class="label-cekLogin hide"><?= $this->translate('text-cekLogin') ?><a href="#" class="logout" onclick="return logout('id');"><?= $this->translate('status-login') ?></a></div>
                    <!-- <span>Pastikan foto KTP terlihat jelas (max. ukuran file adalah 1MB)</span> ->
                </div>-->

            </fieldset>

            <!-- STEP 2 -->
            <h3><?= $this->translate('data-place') ?></h3>
            <fieldset class="form-body--credit">
                <div class="text-head">
                    <h2 class="text-center"><?= $this->translate('data-place') ?></h2>
                    <h2 class="text-center-edit"><?= $this->translate('change-data-place') ?></h2>
                    <p class="text-center"><?= $this->translate('input-data-place') ?></p>
                </div>
                <div class="form-group">
                    <label><?= $this->translate('label-provinsi') ?></label>
                    <select class="form-control formRequired" id="provinsi" name="provinsi" placeholder="<?= $this->translate('choose-provinsi') ?>" multiple="multiple">
                    </select>
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label><?= $this->translate('label-kota') ?></label>
                    <select class="form-control formRequired" id="kota" name="kota" placeholder="<?= $this->translate('choose-kota') ?>" multiple="multiple">
                        <option value="" class="placeholder" disabled selected><?= $this->translate('choose-kota') ?></option>
                    </select>
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label><?= $this->translate('label-kecamatan') ?></label>
                    <select class="form-control formRequired" id="kecamatan" name="kecamatan" placeholder="<?= $this->translate('choose-kecamatan') ?>" multiple="multiple">
                        <option value="" disabled selected><?= $this->translate('choose-kecamatan') ?></option>
                    </select>
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label><?= $this->translate('label-kelurahan') ?></label>
                    <select class="form-control formRequired" id="kelurahan" name="kelurahan" placeholder="<?= $this->translate('choose-kelurahan') ?>" multiple="multiple">
                        <option value="" disabled selected><?= $this->translate('choose-kelurahan') ?></option>
                    </select>
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label for="kode_pos"><?= $this->translate('label-postcode') ?></label>
                    <input type="text" class="form-control formKodePos" name="kode_pos" id="kode_pos" placeholder="<?= $this->translate('placeholder-postcode') ?>" disabled>
                    <div class="error-wrap"></div>
                </div>
                <div class="form-group">
                    <label class="label-place" id="label_alamat" for="alamat_lengkap"><?= $this->translate('label-place') ?></label>
                    <textarea class="form-control formRequired formAddress" name="alamat_lengkap" id="alamat_lengkap" placeholder="<?= $this->translate('placeholder-place') ?> Contoh: Jalan Rajawali 1 Blok A no.11 RT 01 RW 02" onfocus="alamatFocus()"></textarea>
                    <div class="error-wrap"></div>
                </div>
            </fieldset>

            <!-- STEP 3 -->
            <h3><?= $this->translate('data-funding') ?></h3>
            <fieldset>
                <div class="form-body--credit-simulasi row">
                    <div class="text-head">
                        <h2 class="text-center"><?= $this->translate('data-funding') ?></h2>
                        <h2 class="text-center-edit"><?= $this->translate('change-data-funding') ?></h2>
                        <p class="text-center"><?= $this->translate('count-estimated-installment') ?></p>
                    </div>

                    <div class="col-md-6 no-padding-mobile">
                        <div class="form-group sliderGroup inputsimulasi">
                            <label for="jml-biaya"><?= $this->translate('travel-package-price') ?></label>
                            <div class="input-group inputform">
                                <span class="input-group-addon" id="basic-addon1">Rp</span>
                                <input type="tel" pattern="\d*" id="ex7SliderVal" class="form-control formRequired formPrice c-input-trans main-package-price" style="text-align: right;" aria-describedby="basic-addon1">

                                <div class="error-wrap"></div>

                            </div>
                            <div class="slidecontainer ">
                                <input id="calcSlider" class="calcslide" type="tel" pattern="\d*" data-slider-handle="custom" data-slider-tooltip="hide" />
                                <div class="value-left valuemin"></div>
                                <div class="value-right valuemax"></div>
                                <input type="hidden" id="otr">
                            </div>
                        </div>
                        <div class="form-group inputsimulasi mesin-down-payment">
                            <label for="down_payment"><?= $this->translate('down-payment-to-institution') ?></label>
                            <div class="input-group inputform">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" id="down_payment" name="down_payment" class="form-control minDownPayment formatRibuan">
                            </div>
                            <div><?= $this->translate('min-10-from-package-price') ?></div>
                            <div class="error-wrap"></div>
                        </div>
                        <div class="form-group sliderGroup inputsimulasi">
                            <label for="jangka-waktu"><?= $this->translate('label-travel-jangka-waktu')?></label>
                            <div>
                                <select class="c-custom-select-trans form-control formRequired" id="jangka_waktu" name="jangka-waktu" multiple="multiple" placeholder="<?= $this->translate('jangka-waktu') ?>">
                                </select>
                            </div>
                            <div class="error-wrap"></div>
                        </div>
                        <div class="form-group sliderGroup inputsimulasi">
                            <label for="jml-biaya"><?= $this->translate('pocket-money') ?></label>
                            <div class="input-group inputform">
                                <span class="input-group-addon" id="basic-addon1">Rp</span>
                                <input type="tel" pattern="\d*" id="pocket_money" class="form-control formRequired formatRibuan maxPocketMoney main-package-price c-input-trans" style="text-align: right;" aria-describedby="basic-addon1">
                            </div>
                            <div><?= $this->translate('max-20-from-package-price'), $this->websiteConfig('valuePercentage'), $this->translate('max-20-from-package-price2') ?></div>
                            <div class="error-wrap"></div>
                        </div>
                    </div>
                    <div class="col-md-6 no-padding-mobile">
                        <div class="rincian">
                            <div class="rincian--content">
                                <p class="title-angsuran"><?= $this->translate('label-rincian') ?></p>
                                <table class="tableangsuran">
                                    <tr>
                                        <td>
                                            <?= $this->translate('total-finance') ?>
                                        </td>
                                        <td class="currency" tahun="0">
                                            Rp <span id="totalFinance">0</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $this->translate('pocket-money') ?>
                                        </td>
                                        <td class="currency" tahun="0">
                                            Rp <span id="pocketMoney">0</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $this->translate('label-total') ?>
                                        </td>
                                        <td class="currency" tahun="0">
                                            Rp <span id="labelTotal">0</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $this->translate('administrative-code') ?>
                                        </td>
                                        <td class="currency" tahun="0">
                                            Rp <span id="administrativeCode">0</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $this->translate('life-insurance') ?>
                                        </td>
                                        <td class="currency" tahun="0">
                                            Rp <span id="lifeInsurance">0</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="total-estimate total-estimate-travel">
                                <p class="title-angsuran"><?= $this->translate('total-installment-permonth') ?></p>
                                <p class="total">Rp <span id="totalMonthly">0</span></p>
                                <button class="cta cta-primary cta-big absolutebutcalc" id="recalc" type="button"><?= $this->translate('count-installment') ?></button>
                            </div>
                        </div>
                        <div class="warning-calculate hide"><label><?= $this->translate("calculate-again"); ?></label></div>
                    </div>

                </div>
            </fieldset>

            <!-- STEP 4 -->
            <h3><?= $this->translate('data-confirmation') ?></h3>
            <fieldset>
                <div id="step-summary" class="form-body--credit-simulasi">
                    <div class="text-head">
                        <h2 class="text-center"><?= $this->translate('label-confirmation') ?></h2>
                        <p class="text-center"><?= $this->translate('text-confirmation') ?></p>
                    </div>
                    <div class="biaya-agunan">
                        <div class="cont-agunan">
                            <p class="title-agunan">
                                A. <?= $this->translate('data-name') ?>
                            </p>
                            <div class="button-area text-right button-angsur">
                                <button id="btnDataPemohon" onclick="editStep(0)" class="cta cta-primary cta-ubah" type="button"><i class="fa fa-pencil" aria-hidden="true"></i><b><?= $this->translate('ubah') ?></b></button>
                            </div>
                            <table>
                                <tr>
                                    <td><?= $this->translate('fullname') ?></td>

                                    <td id="showFullName" class="nama_lengkap"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('email') ?></td>

                                    <td id="showEmail" class="email"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('handphone') ?></td>

                                    <td id="showPhone" class="email"></td>
                                </tr>
                                <!-- <tr>
                              <td>Unggah Foto KTP</td>

                              <td class="unggah"></td>
                          </tr> -->
                            </table>
                        </div>

                    </div>
                    <div class="biaya-agunan">
                        <div class="cont-agunan">
                            <p class="title-agunan">
                                B. <?= $this->translate('data-place') ?>
                            </p>
                            <div class="button-area text-right button-angsur">
                                <button id="btnDataTempatTinggal" onclick="editStep(1)" class="cta cta-primary cta-ubah" type="button"><i class="fa fa-pencil" aria-hidden="true"></i><b><?= $this->translate('ubah') ?></b></button>
                            </div>
                            <table>
                                <tr>
                                    <td><?= $this->translate('provinsi') ?></td>

                                    <td id="showProvinsi" class="provinsi"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('kota') ?></td>

                                    <td id="showKota" class="kota"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('kecamatan') ?></td>

                                    <td id="showKecamatan" class="kecamatan"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('kelurahan') ?></td>

                                    <td id="showKelurahan" class="kelurahan"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('postcode') ?></td>

                                    <td id="showKodePos" class="kodepos"></td>
                                </tr>
                                <tr>
                                    <td><?= $this->translate('address') ?></td>

                                    <td id="showAddress" class="address"></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="biaya-agunan">
                        <div class="cont-agunan">
                            <p class="title-agunan">
                                C. <?= $this->translate('data-funding') ?>
                            </p>
                            <div class="button-area text-right button-angsur">
                                <button id="btnJumlahPembiayaan" onclick="editStep(2)" class="cta cta-primary cta-ubah" type="button"><i class="fa fa-pencil" aria-hidden="true"></i><b><?= $this->translate('ubah') ?></b></button>
                            </div>
                            <table class="tablebiaya">
                                <tr>
                                    <td class="long"><?= $this->translate('label-travel-angsuran-bulanan') ?></td>

                                    <td id="summary-angsuran-bulanan"></td>
                                </tr>
                                <tr>
                                    <td class="long"><?= $this->translate('label-travel-jangka-waktu') ?></td>

                                    <td id="summary-jangka-waktu"></td>
                                </tr>
                                <tr>
                                    <td class="long separate-column"><?= $this->translate('label-travel-downpayment') ?></td>

                                    <td id="summary-downpayment"></td>
                                </tr>
                                <tr>
                                    <td class="long"><?= $this->translate('label-travel-total-pembiayaan') ?></td>

                                    <td id="summary-total-pembiayaan"></td>
                                </tr>
                                <tr>
                                    <td class="long">&#x25A0; <?= $this->translate('label-travel-harga-paket-pendidikan') ?></td>

                                    <td id="summary-harga-paket-pendidikan"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="biaya-agunan">
                        <div class="form-group">
                            <input type="checkbox" id="agreement1" name="agreement1" class="agreement formRequired">
                            <label for="agreement1" class="label-agreement"><?= $this->translate('term-condition') ?></label>
                            <div class="error-wrap"></div>
                        </div>
                        <!-- <div class="form-group">
                      <input type="checkbox" id="agreement2" class="agreement">
                      <label for="agreement2" class="label-agreement">Lorem ipsum dolor sit
                          amet, consectetur
                          adipisicing elit. Odio reprehenderit iusto libero aliquid
                          temporibus vero, optio eveniet et, adipisci natus rem enim sequi
                          saepe expedita qui sunt exercitationem delectus. In?</label>
                      <div class="error-wrap"></div>
                  </div> -->
                    </div>
                </div>
                <div id="step-otp" class="form-body--credit">
                    <h2 class="text-center"><?= $this->translate('confirmation-otp') ?></h2>
                    <p class="text-center"><?= $this->translate('text-confirmation-otp') ?></p>

                    <div class="otp-number form-group">
                        <div class="otp-number__verify">
                            <input type="tel" pattern="\d*" placeholder="0" class="input-number formRequired" maxlength="1" name="otp1">
                            <input type="tel" pattern="\d*" placeholder="0" class="input-number formRequired" maxlength="1" name="otp2">
                            <input type="tel" pattern="\d*" placeholder="0" class="input-number formRequired" maxlength="1" name="otp3">
                            <input type="tel" pattern="\d*" placeholder="0" class="input-number formRequired" maxlength="1" name="otp4">
                        </div>
                        <div class="error-wrap"></div>
                        <div class="otp-number__text">
                            <p class="otp-wait"><?= $this->translate('wait-otp') ?> <span id="otp-counter" class="countdown"></span> </p>
                            <p class="otp-resend"><?= $this->translate('dont-get-otp') ?> <span id="otp-resend" class="countdown">Resend</span></p>
                        </div>
                        <!-- <div id="wrongOtp" class="warning-otp hide"> <?= $this->translate('warning-otp'); ?></div> -->
                        <div class="otp-button margin-top-50">
                            <button class="cta cta-orange cta-big btn-verifikasi buttonnext" id="otp-verification" type="button" style="background-color: rgb(221, 221, 221); border-color: rgb(221, 221, 221);" disabled="disabled"><?= $this->translate('verifikasi') ?></button>
                        </div>
                    </div>
                </div>

                <div id="otp-success" class="success-wrapper">
                    <div class="wrapper">
                        <div class="img-wrap">
                            <img class="icon-thank-page" src="/static/images/icon/m_thank_you.png" alt="">
                        </div>
                        <div class="text-wrap text-center">
                            <h3><?= $this->translate('tq-text-1') ?></h3>
                            <p><?= $this->translate('tq-text-2') ?></p>
                        </div>
                        <div class="button-area text-center backtohome">
                            <button class="cta cta-primary cta-big cta-see buttonnext backtohome" id="button7" 
                                type="button" onclick="return checkStatusPengajuan()"><?= $this->translate('cek-status-aplikasi') ?></button>
                        </div>
                    </div>
                    <div class="blog-promo">
                        <article class="sect-title text-center">
                            <h2 class="title"><?= $this->t('berita_head'); ?></h2>
                            <p class="subtitle"><?= $this->t('berita_sub_head'); ?></p>
                        </article>
                        <div class="list-card success-news">
                            <?php foreach($blogList as $blog) : ?>
                                <a href="<?= '/' . $this->getLocale() . '/blog/' . $blog->getSlug(); ?>" class="card-item">
                                    <picture>
                                        <img src="<?= $blog->getImage(); ?>" alt="">
                                    </picture>
                                    <div class="caption">
                                        <h3 class="tag"><?= $blog->getBlogCategory()->getName(); ?></h3>
                                        <h2 class="title"><?= $blog->getTitle(); ?></h2>
                                        <p class="date"><?= date('d.m.y', strtotime($blog->getDate())); ?> | <i class="fa fa-eye"></i> <?= $blog->getViews(); ?></p>
                                        <!-- <div class="dateview">
                                            <span class="date"></?= date('d.m.y', strtotime($blog->getDate())); ?></span>
                                            <span class="view"><i class="fa fa-eye"></i></?= $blog->getViews(); ?></span>
                                        </div> -->
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="button-area text-center btn-beranda">
                            <a href="<?php echo "/" . $this->getLocale() . '/' . $link; ?>" class="cta cta-primary cta-big cta-see buttonnext backtohome">
                                <span><?= $this->translate('backtohome') ?></span></a>
                        </div>
                    </div>
                </div>
            </fieldset>

        </form>

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

<?= $this->template('Includes/request-otp.html.php'); ?>