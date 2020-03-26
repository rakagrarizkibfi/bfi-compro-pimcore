function otpCustom() {
    var timeleft = 90;
    var timer = setInterval(function() {
        document.getElementById("resend").innerHTML =
            "Mohon menunggu <b>" +
            timeleft +
            " seconds </b> untuk mengirim ulang";
        timeleft -= 1;
        if (timeleft <= 0) {
            clearInterval(timer);
            document.getElementById("resend").innerHTML =
                "Tidak menerima 4-digit kode ? <a onclick='resendOTP()'><b>Kirim Ulang</b></a>";
        }
    }, 1000);
  }
  
  function resendOTPCustom() {
    var dataPhone = {
        phone_number: $("#phone-input").val()
    };
    otpCustom();
    requestOTPCustom(dataPhone);
    document.getElementById("resend-notice").textContent =
        "4-digit kode telah dikirimkan ke nomor handphone anda";
  }
  
  function requestOTPCustom(phone) {
    $.ajax({
        type: "POST",
        url: "/user/otp-request",
        data: phone,
        dataType: "json",
        error: function(data) {
            console.log("error" + data);
        },
  
        fail: function(xhr, textStatus, error) {
            console.log("request failed");
        },
  
        success: function(dataObj) {
            console.log(dataObj.result.data);
        }
    });
  }
  
  function verifiedCustom(language) {
    var otpInput = $("input[name='digit[]']")
        .map(function() {
            return $(this).val();
        })
        .get();
    otpInput = otpInput.join("");
  
    var dataOTP = {
        phone_number: $("#phone-input").val(),
        otp_code: otpInput
    };

    console.log(dataOTP);
    verifiedOTP(language, dataOTP);
  }
  
  function diabledFieldCustom(){
    $("#nama_lengkap").attr('disabled','disabled');
    $("#email_pemohon").attr('disabled','disabled');
    $("#no_handphone").attr('disabled','disabled');
    $("#upload-ktp-button").attr('disabled','disabled');
    $("#upload-ktp-button").css("background-color", "#dddddd");
    $("#upload-ktp-button").css("border-color", "#dddddd");
    $("input[type=radio]").attr('disabled','disabled');
    $(".label-cekLogin").removeClass('hide');
    $(".notif-ktp").addClass('hide');
  }
  
  var isKnownNumber = false;
  function checkLoginCustom(){
      var dataPhone = {
        phone_number: $("#no_handphone").val()
      };
      $.ajax({
        type: "POST",
        url: "user/login",
        data: dataPhone,
        dataType: "json",
        success: function(data) {
            if (data.success === true) {
                isKnownNumber = true;
                if (data.result.header.status === 400 ) {
                  goToStep(1);
                } else {
                    $("#getCredit").hide();
                    $("#otp").removeClass("hide");
                    console.log(dataPhone);
                    requestOTPCustom(dataPhone);
                    $("#phone-input").val($("#no_handphone").val());
                    console.log("checklogin true");
                    otpCustom();
                }
              }
          }
        });
    }

  function verifiedOTPCredit() {
    var otpInput = $("input[name='digit[]']").map(function() {
            return $(this).val();
        }).get();
        otpInput = otpInput.join("");

        var dataOTP = {
            phone_number: $("#phone-input").val(),
            otp_code: otpInput
        };
        console.log(dataOTP);
        
    $.ajax({
        type: "POST",
        url: "/user/otp-confirm",
        data: dataOTP,
        dataType: "json",
        error: function(data) {
            console.log("error" + data);
        },
  
        fail: function(xhr, textStatus, error) {
            console.log("request failed");
        },
  
        success: function(dataObj) {
            if (dataObj.success === true) {
                console.log("berhasil verified otp");
                var token = dataObj.result.data.customer_token;
                localStorage.setItem("token", token);
                console.log("token : " + token);
                getCustomerCustom(token);
                $("#otp").addClass("hide");
                $("#getCredit").show();
                goToStep(1);
                diabledFieldCustom();
            } else {
                console.log("otp salah, masukkan otp yang valid");
            }
        }
    });
  }
  
  function getCustomerCustom(token) {
    $.ajax({
        type: "GET",
        url: "/user/data-customer",
        crossDomain: true,
        dataType: "json",
        async: false,
        headers: { sessionId: token },
  
        error: function(data) {
            console.log("error" + data);
        },
  
        fail: function(xhr, textStatus, error) {
            console.log("request failed");
        },
  
        success: function(dataObj) {
            if (dataObj.success === true) {
                var data = dataObj.result.data;
                console.log(data.full_name);
                document.cookie = "customer=" + data.full_name + "; path=/";
            }
        }
    });
  }

  function postOTPCustom(url, data) {
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
        $('#wrongOtp').modal('show');
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

  function requestOTP(cb) {
    var _data = {
      phone_number: $('#no_handphone').val().toString()
    }
    postOTPCustom("/otp/send-otp", _data);
    cb();
  }