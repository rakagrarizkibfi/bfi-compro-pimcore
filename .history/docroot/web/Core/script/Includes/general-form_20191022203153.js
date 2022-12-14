var retryLimit = 3;

function retryAjax(_this, xhr) {
  if (xhr.status == 500) {
    _this.tryCount++;
    if (_this.tryCount <= _this.retryLimit) {
      // console.log("TRY " + _this.tryCount);
      //try again
      $.ajax(_this);
      return;
    } else {
      // console.log("LAST TRY");
      // _this.url = '/credit/save-car-leads1';
      return;
    }
  }
}

function postOTP(url, data) {
  var _ret;
  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    dataType: 'json',
    // tryCount: 0,
    // retryLimit: retryLimit,
    async: false,
    error: function (xhr, textStatus, errorThrown) {
      // retryAjax(this, xhr);
    },
    fail: function (xhr, textStatus, error) {
      // retryAjax(this, xhr);
    },
    success: function (result) {
      // console.log("RESULT", result);
      if (result.success === "1") {
        _ret = result;
      } else {
        // console.log('error' + result.message);
      }
    }
  })
  return _ret;
}

function postData(url, data) {
  var _ret;
  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    dataType: 'json',
    tryCount: 0,
    retryLimit: retryLimit,
    async: false,
    error: function (xhr, textStatus, errorThrown) {
      retryAjax(this, xhr);
    },
    fail: function (xhr, textStatus, error) {
      retryAjax(this, xhr);
    },
    success: function (result) {
      // console.log("RESULT", result);
      if (result.success === "1") {
        _ret = result;
      } else {
        // console.log('error' + result.message);
      }
    }
  })
  return _ret;
}

function getData(url, data, cb) {
  var _ret;
  $.ajax({
    type: 'GET',
    url: url,
    data: data,
    dataType: 'json',
    tryCount: 0,
    retryLimit: retryLimit,
    async: false,
    error: function (xhr, textStatus, errorThrown) {
      retryAjax(this, xhr);
    },
    fail: function (xhr, textStatus, error) {
      retryAjax(this, xhr);
    },
    success: function (result) {
      if (result.success === "1") {
        _ret = result;
      } else {
        console.log('error' + result.message);
      }
    }
  })
  return _ret;
}

function getProvince() {
  var url = "/credit/get-province";
  var data = {};
  return transformData(getData(url, data).data);
}

function getCity(provinceId) {
  if (provinceId) {
    var url = "/credit/get-city";
    var data = { "province_id": provinceId };
    return transformData(postData(url, data).data);
  } else {
    return false;
  }
}

function getDistrict(cityId) {
  if (cityId) {
    var url = "/credit/get-district";
    var data = { "city_id": cityId };
    return transformData(postData(url, data).data);
  } else {
    return false;
  }
}

function getSubdistrict(districtId) {
  if (districtId) {
    var url = "/credit/get-subdistrict";
    var data = { "district_id": districtId };
    return transformData(postData(url, data).data);
  } else {
    return false;
  }
}

function getZipcode(subdistrictId) {
  if (subdistrictId) {
    var url = "/credit/get-zipcode";
    var data = { "subdistrict_id": subdistrictId };
    return postData(url, data).data;
  } else {
    return false;
  }
}

function transformData(data) {
  var ret = [];
  $.each(data, function (idx, item) {
    ret.push({
      id: item.id,
      text: item.desc
    });
  })
  return ret;
}

function separatordot(o) {
  var bilangan = Math.ceil(o);

  var number_string = bilangan.toString(),
    sisa = number_string.length % 3,
    rupiah = number_string.substr(0, sisa),
    ribuan = number_string.substr(sisa).match(/\d{3}/g);

  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  return rupiah;
}

function showOtp() {
  $(".wizard .steps, .wizard .actions").hide();
  $("#otp-success").hide();
  $("#step-summary").hide();
  $("#step-otp").show();
  showOtpWait();
  startOtp();
}

function showOtpWait() {
  $(".otp-number__text .otp-resend").hide();
  $(".otp-number__text .otp-wait").show();
}

function showOtpResend() {
  $(".otp-number__text .otp-resend").show();
  $(".otp-number__text .otp-wait").hide();
}

function showSuccessOtp() {
  $("#otp-success").show();
  $("#step-summary").hide();
  $("#step-otp").hide();
}

function requestOTP(cb) {
  var _data = {
    phone_number: $('#no_handphone').val().toString()
  }
  postOTP("/otp/send-otp", _data);
  cb();
}

var otpTimeout = 90;
var otpTimeRemain = 0;
function startOtp() {
  otpTimeRemain = otpTimeout;
  requestOTP(otpCountDown);
}

function otpCountDown() {
  var timeElm = $("#otp-counter");
  timeElm.text(otpTimeRemain + " detik");
  setTimeout(function () {
    otpTimeRemain--
    timeElm.text(otpTimeRemain + " detik");
    if (otpTimeRemain >= 0) {
      otpCountDown();
    } else {
      showOtpResend();
    }
  }, 1000);
}

function otpResend() {
  startOtp();
  showOtpWait();
}

function otpVerified() {
  var otp1Value = $('input[name=otp1]').val().toString(),
    otp2Value = $('input[name=otp2]').val().toString(),
    otp3Value = $('input[name=otp3]').val().toString(),
    otp4Value = $('input[name=otp4]').val().toString(),
    no_handphone = $('#no_handphone').val().toString();

  var _data = {
    phone_number: no_handphone,
    otp_code: otp1Value + otp2Value + otp3Value + otp4Value
  }
  var verifiedOtp = postOTP("/otp/validate-otp", _data);
  if (verifiedOtp.success === "1") {
    successOTP();
  } else {
    $('#wrongOtp').modal('show');
  }
}

function successOTP() {
  var _data = getDataRegister();
  var register = postData("/register", _data);
  if (register.success === "1") {
    showSuccessOtp();
  } else {
    $('#failedOtp').modal('show');
  }
}

(function ($) {

  $(document).on("click", "#otp-resend", otpResend);
  $(document).on("click", "#otp-verification", otpVerified)

  $(document).on('click', '.countdown--reload', function (e) {
    e.preventDefault();
    countDown();
    requestOtp(credits);
    $('.countdown').removeClass('countdown--reload');
  })

  $("input.form-control").on('focus', function () {
    if ($(this).attr("id") !== "ex7SliderVal" && $(this).attr("id") !== "down_payment") {
      $(this).prev().css({
        'display': 'block',
        'padding': '15px 15px 5px'
      });
      $(this).css({
        'padding-top': '35px',
        'padding-bottom': '15px'
      });
    }
  });

  $("input.form-control").on('focusout', function () {
    if ($(this).val() == "") {
      $(this).prev().css("display", "none");
      $(this).css({
        'padding-top': '20px',
        'padding-bottom': '20px'
      });
    }
  });

  $(document).on('focus', '.select2', function (e) {
    $(this).parent().find("label").css({
      'display': 'block',
      'padding': '12px 15px'
    });
  });

  $(".file-input").change(function (e) {
    var sizeLimit = 1000000;
    var parent = $(this).parents(".upload-image");
    var preview = parent.find("img")[0];
    var label = parent.find("b")[0];
    var file = e.target.files[0];
    var iptFrm = $(this).data("id");
    var isImage = (file.type.match("image") ? true : false);

    if (file.size <= sizeLimit && isImage) {
      var reader = new FileReader();
      reader.addEventListener("load", function () {
        if (typeof (preview) !== "undefined") {
          $("#" + iptFrm).val(reader.result).trigger("change");
          // $("#" + iptFrm).val("/test/test.png").trigger("change");
          $(label).text(file.name);
          preview.src = reader.result;
        }
      }, false);

      if (file) {
        $(preview).show();
        reader.readAsDataURL(file);
      } else {
        $(preview).hide();
      }
    } else {
      var errorMsg = '';
      switch (false) {
        case (file.size <= sizeLimit):
          errorMsg = 'File size must be less than 1 MB.';
          break;
        case isImage:
          errorMsg = 'Please choose image file.';
          break;
      }
      parent.find(".error-wrap").html('<label id="ktp-error" class="error" for="ktp" style="display: inline-block;">' + errorMsg + '</label>')
    }
  });

  $(".upload-btn button").click(function () {
    var parent = $(this).parents(".upload-image");
    parent.find(".file-input").click();
  });

  // PHONE NUMBER formPhoneNumber
  $('.formPhoneNumber').focus(function () {
    if ($.trim($(this).val()) == "") {
      $(this).val("0");
    }
  });

  $(".formPhoneNumber").on("keydown", function (e) {
    if (e.which != 8 && e.which != 0 && e.which != 144 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105)) {
      return false;
    }
    if (($(this).get(0).selectionStart == 0 && (e.keyCode < 35 || e.keyCode > 40)) ||
      ($(this).get(0).selectionStart == 1 && e.keyCode == 8)) {
      return false;
    }
  });

  $('.formPhoneNumber').on('input propertychange paste', function (e) {
    var reg = /^00+/gi;
    var reg2 = /^[+62]+/gi;
    if (this.value.match(reg)) {
      this.value = this.value.replace(reg, '0');
    }
    if (this.value.match(reg2)) {
      this.value = this.value.replace(reg2, '0');
    }
  });

  $(".formPhoneNumber").bind("contextmenu", function (e) {
    e.preventDefault();
  });


  var post_val_inputan = 0;
  $("#ex7SliderVal").on("input", function () {
    var thisval = $(this).val(),
      pricelimit = $(this).parent().next().children(".valuemax").text(),
      pricelimitmin = $(this).parent().next().children(".valuemin").text();

    thisval = thisval.replace(/\./g, "");
    pricelimit = pricelimit.replace(/\./g, "");
    pricelimitmin = pricelimitmin.replace(/\./g, "");

    if (thisval !== "") {
      if (isNaN(thisval)) {
        thisval = "";
      } else {
        if (parseInt(thisval) <= parseInt(pricelimit)) {
          thisval = thisval;
        } else {
          thisval = post_val_inputan;
        }
        post_val_inputan = thisval;
      }
    }

    $(this).parents(".sliderGroup").find(".calcslide").slider('setValue', parseInt(thisval));

    var number_string = thisval.toString(),
      sisa = number_string.length % 3,
      rupiah = number_string.substr(0, sisa),
      ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    $(this).val(rupiah);
  });

  if (typeof ($('#ex7SliderVal').parents(".sliderGroup").find(".calcslide").slider()) !== 'undefined') {
    $('#ex7SliderVal').parents(".sliderGroup").find(".calcslide").slider().on('slideStop', function (ev) {
      console.log(ev)
    });
  }

  if ($(".calcslide").length > 0) {
    $(document).on('change', ".calcslide", function (evt) {

      var _elm = $(this)
      var _parent = _elm.parents(".sliderGroup")
      var _ifMoney = _parent.find(".c-input-trans")
      var _ifMonth = _parent.find(".c-custom-select-trans")
      var _thisVal = evt.value.newValue

      // if (_ifMoney.length > 0) {

      var number_string = _thisVal.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      _ifMoney.val(rupiah);

      var _toInt = parseInt(_thisVal);
      _toInt = (_toInt > 0 ? _toInt : 0);
      // objCredits.installment = _toInt;
      // objCredits.funding = _toInt;

      // } else if (_ifMonth.length > 0) {

      //   _ifMonth.val(parseInt(_thisVal))
      //   var customFormInstance = jcf.getInstance(_ifMonth);
      //   customFormInstance.refresh();

      //   // newoptionAsuransi(_thisVal, raw_select);
      //   // objCredits.jangka_waktu = parseInt(_thisVal);
      // }

    });
  }

  $('.otp-number__verify input[type="tel"]').on("keyup", function () {
    console.log(this.value.length, this.maxLength)
    if (this.value.length == this.maxLength) {
      var $next = $(this).next('.input-number');
      if ($next.length) {
        $(this).next('.input-number').focus();
      } else {
        $(this).blur();
      }
    } else {
      var $prev = $(this).prev('.input-number');
      if ($prev.length) {
        $(this).prev('.input-number').focus();
      } else {
        $(this).blur();
      }
    }
  });

})(jQuery);