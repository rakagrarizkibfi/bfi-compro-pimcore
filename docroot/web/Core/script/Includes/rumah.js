var lang = document.documentElement.lang;
var submission_id = "";
var phoneNumber = "";
var encrypted_code = "";

window.dataLayer = window.dataLayer || [];

let productType = {
    category: undefined,
};
let dataStep1 = {
    name: undefined,
    no_ktp: undefined,
    phone_number: undefined,
    wa_number: undefined,
    email: undefined,
    encrypt_code_zeals: undefined,
    utm_source: undefined,
    utm_campaign: undefined,
    utm_term: undefined,
    utm_medium: undefined,
    utm_content: undefined,
};
let dataStep2 = {
    submission_id: undefined,
    info_address: {
        province_id: undefined,
        city_id: undefined,
        district_id: undefined,
        subdistrict_id: undefined,
        zipcode_id: undefined,
        rt: undefined,
        rw: undefined,
        address: undefined,
    },
    info_assets: {
        province_id: undefined,
        city_id: undefined,
        district_id: undefined,
        subdistrict_id: undefined,
        zipcode_id: undefined,
        rt: undefined,
        rw: undefined,
        address: undefined,
        disclaimer: undefined,
    },
    profession_id: undefined,
    salary: undefined,
    employee_status: undefined,
    age: undefined,
    marital_status_id: undefined,
    spouse_name: undefined,
    spouse_profession_id: undefined,
    length_of_work: undefined,
};
let dataStep3 = {
    submission_id: undefined,
    property_type_id: undefined,
    certificate_type_id: undefined,
    certificatie_in_the_name_id: undefined,
    where_certificate: undefined,
    is_have_imb: undefined,
    is_pbb_uptodate: undefined,
    is_sales_period_last_year: undefined,
    is_dihuni: undefined,
    asset_location: undefined,
    other_assets: undefined,
    is_vehicle_road: undefined,
    is_near_river: undefined,
    is_near_railroads: undefined,
    is_near_silk_tower: undefined,
    is_near_provider_tower: undefined,
    is_near_grave: undefined,
};

let dataStep4 = {
    submission_id: undefined,
    disclaimer: undefined,
};

let dataFunding = {
    submission_id: undefined,
    estimasi_harga: undefined,
};

let dataCalculate = {
    submission_id: undefined,
    tenor: undefined,
    funding: undefined,
};

$(document).ready(function () {
    lang == "id"
        ? $(".nav-item-1.active").find(".nav-step-tag").text("Sedang Isi")
        : $(".nav-item-1.active").find(".nav-step-tag").text("Onprogress");

    sessionStorage.setItem("loanType", "PBF");
});

$("input[name='is-wa-number']").click(function () {
    var is_WA = $(this).val();
    $(".wa-numbers").find("input").removeAttr("disabled");
    if (is_WA == "false") {
        $(".wa-numbers").removeAttr("hidden");
        // $("#email_pemohon").attr("disabled", true);
    } else {
        $(".wa-numbers").attr("hidden", true);
        $("#email_pemohon").removeAttr("disabled");
    }
});

$("input[name$='addres_same']").click(function () {
    var addresSameVal = $(this).val();
    if (addresSameVal == "false") {
        $(".same-address").removeAttr("hidden");
        $(".same-address")
            .find(".input-step:eq(0), textarea.input-step")
            .removeAttr("disabled");
    } else {
        $(".same-address").attr("hidden", true);
        $(".same-address").find(".input-step:eq(0)").attr("disabled", true);
    }
    $("#occupation").removeAttr("disabled");
});

$("#occupation").on("change", function () {
    $(this).val() == "5865706C-32D0-4BE0-9395-B50887DC8FF0" ||
    $(this).val() == "0A960193-B704-4FA6-85C1-D3EDAE18B6C2"
        ? $(".employee_status").removeAttr("hidden")
        : $(".employee_status").attr("hidden", true);
    employeeStatusCheck();
});

$("#employee_status").on("change", function () {
    employeeStatusCheck();
});

$("#marital_status").on("change", function () {
    $(this).val() == "6D710A15-8B62-4217-B1B9-AC33C9737572"
        ? ($(".spouse_name").removeAttr("hidden"),
          $(".spouse_job").removeAttr("hidden"),
          getSpouseProfession())
        : ($(".spouse_name").attr("hidden", true),
          $(".spouse_job").attr("hidden", true));
});

var occupation = $("#occupation").attr("placeholder");
$("#occupation").select2({
    placeholder: occupation,
    dropdownParent: $("#occupation").parent(),
});
var employee_status = $("#employee_status").attr("placeholder");
$("#employee_status").select2({
    placeholder: employee_status,
    dropdownParent: $("#employee_status").parent(),
});
var years_service = $("#years_service").attr("placeholder");
$("#years_service").select2({
    placeholder: years_service,
    dropdownParent: $("#years_service").parent(),
});
var marital_status = $("#marital_status").attr("placeholder");
$("#marital_status").select2({
    placeholder: marital_status,
    dropdownParent: $("#marital_status").parent(),
});
var marital_status = $("#marital_status").attr("placeholder");
$("#marital_status").select2({
    placeholder: marital_status,
    dropdownParent: $("#marital_status").parent(),
});
var spouse_job = $("#spouse_job").attr("placeholder");
$("#spouse_job").select2({
    placeholder: spouse_job,
    dropdownParent: $("#spouse_job").parent(),
});

var certificate_status = $("#certificate_status").attr("placeholder");
$("#certificate_status").select2({
    placeholder: certificate_status,
    dropdownParent: $("#certificate_status").parent(),
});
var asset_type = $("#asset_type").attr("placeholder");
$("#asset_type").select2({
    placeholder: asset_type,
    dropdownParent: $("#asset_type").parent(),
});
var certificate_by_name = $("#certificate_by_name").attr("placeholder");
$("#certificate_by_name").select2({
    placeholder: certificate_by_name,
    dropdownParent: $("#certificate_by_name").parent(),
});
var selectDihuni = $("#selectDihuni").attr("placeholder");
$("#selectDihuni").select2({
    placeholder: selectDihuni,
    dropdownParent: $("#selectDihuni").parent(),
});
var asset_location = $("#asset_location").attr("placeholder");
$("#asset_location").select2({
    placeholder: asset_location,
    dropdownParent: $("#asset_location").parent(),
});
var tenorPbf = $("#tenorPbf").attr("placeholder");
$("#tenorPbf").select2({
    placeholder: tenorPbf,
    dropdownParent: $("#tenorPbf").parent(),
});

$("#next1").on("click", function (e) {
    e.preventDefault();
    if ($(this).closest("form").valid()) {
        pushDataStep1(function (result) {
            if (result.data.is_dupcheck == true) {
                window.location =
                    "/" +
                    lang +
                    "/credit/pengajuan-gagal?dupcheck=true&product=" +
                    sessionStorage.getItem("loanType");
            } else {
                step("next", 1);
                getProfesion();
                getEmployeeStatus();
                getYearsOfService();
                getMaritalStatus();
                getPropertyType();
                window.dataLayer.push({
                    event: "ValidFormStep1",
                });
            }
        });
    } else {
        errorHandling("#menu1", this.id);
    }
});

$("#next2").on("click", function (e) {
    e.preventDefault();
    if ($(this).closest("form").valid()) {
        pushDataStep2(function (result) {
            if (result.data.is_timeout == true) {
                $("#modal-timeout").modal("show");
            } else {
                if (
                    result.data.leads_status == "UNPROSPECT" ||
                    result.data.leads_status == "RAW"
                ) {
                    window.location =
                        "/" +
                        lang +
                        "/credit/pengajuan-gagal?product=" +
                        sessionStorage.getItem("loanType");
                } else {
                    step("next", 2);
                    getCertificateType();
                    getCertificateOnBehalf();
                    getAssetInHabited();
                    getAssetLocation();
                    window.dataLayer.push({
                        event: "ValidFormStep2",
                    });
                }
            }
        });
    } else {
        errorHandling("#menu2", this.id);
    }
});
$("#next3").on("click", function (e) {
    e.preventDefault();
    if ($(this).closest("form").valid()) {
        pushDataStep3(function (result) {
            if (result.data.is_timeout == true) {
                $("#modal-timeout").modal("show");
            } else {
                if (result.data.leads_status == "UNPROSPECT") {
                    window.location =
                        "/" +
                        lang +
                        "/credit/pengajuan-gagal?product=" +
                        sessionStorage.getItem("loanType");
                } else {
                    step("next", 3);
                    window.dataLayer.push({
                        event: "ValidFormStep3",
                    });
                }
            }
        });
    } else {
        errorHandling("#menu3", this.id);
    }
});

$("#PengajuanBiaya").on("change", function (e) {
    e.preventDefault();
    $(this).val() == 0 || $(this).val() == ""
        ? CalcBtn("hide")
        : CalcBtn("show");
    getTenor();
});
$("#funding").on("change", function (e) {
    e.preventDefault();
    $("#PengajuanBiaya").val() == 0 || $(this).val() == ""
        ? CalcBtn("hide")
        : CalcBtn("show");
    getTenor();
});
$("#tenorPbf").on("change", function (e) {
    $(this).val() == 0 || $(this).val() == ""
        ? CalcBtn("hide")
        : CalcBtn("show");
    e.preventDefault();
    // if ($(this).closest("form").valid()) {
    //     $("#calcLoan").removeAttr("disabled");
    // } else $("#calcLoan").attr("disabled", "true");
});

$("#calcLoan").on("click", function (e) {
    e.preventDefault();
    if (lang === "id") {
        $(this).text("HITUNG ULANG");
    } else {
        $(this).text("RECALCULATE");
    }
    CalcBtn("hide");
    PostCalculate();
    $("#disclaimer").removeAttr("disabled");
});

$("#estimate_price").on("change", function () {
    getFunding();
});

$("#next4").on("click", function (e) {
    e.preventDefault();
    if ($(this).closest("form").valid()) {
        pushDataStep4(function (result) {
            if (result.data.is_timeout == true) {
                $("#modal-timeout").modal("show");
            } else {
                showOtpVer2();
                window.dataLayer.push({
                    event: "ValidFormStep4",
                });
            }
        });
    } else {
        errorHandling("#menu4", this.id);
    }
});
$("#next5").on("click", function (e) {
    e.preventDefault();
    if ($(this).closest("form").valid()) {
        verificationOTP();
    }
});

$("#back2").on("click", function (e) {
    e.preventDefault();
    step("back", 1);
});
$("#back3").on("click", function (e) {
    e.preventDefault();
    step("back", 2);
});
$("#back4").on("click", function (e) {
    e.preventDefault();
    step("back", 3);
});

function pushDataStep1(cb) {
    encrypted_code = sessionStorage.getItem("encrypted_code");

    let result = (dataStep1 = {
        name: $("#nama_lengkap").val(),
        no_ktp: $("#idnumber").val(),
        email: $("#email_pemohon").val(),
        phone_number: $("#no_handphone").val(),
        wa_number: $("#wa_number").val(),
        encrypt_code_zeals:
            encrypted_code === "undefined" ? null : encrypted_code,
        utm_source: sessionStorage.getItem("utm_source"),
        utm_campaign: sessionStorage.getItem("utm_campaign"),
        utm_term: sessionStorage.getItem("utm_term"),
        utm_medium: sessionStorage.getItem("utm_medium"),
        utm_content: sessionStorage.getItem("utm_content"),
    });

    $.ajax({
        type: "POST",
        url: "/credit/save-pbf-leads1",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            if (result.message === "success") {
                submission_id = result.data.submission_id;
                phoneNumber = $("#no_handphone").val();
                cb(result);
            }
        },
    });
}

function pushDataStep2(cb) {
    var addres_same = $("input[name='addres_same']:checked").val();
    var KARYAWAN_SWASTA_ID = "5865706C-32D0-4BE0-9395-B50887DC8FF0",
        KARYAWAN_BUMN_ID = "0A960193-B704-4FA6-85C1-D3EDAE18B6C2",
        SET_PERKERJAAN_STATUS_TETAP_ID = "595D0BAA-60E7-45B8-AA6A-6443749D7069";
    var employeeStatus = SET_PERKERJAAN_STATUS_TETAP_ID;

    if (
        $("#occupation").val() == KARYAWAN_SWASTA_ID ||
        $("#occupation").val() == KARYAWAN_BUMN_ID
    ) {
        employeeStatus = $("#employee_status").val().toString();
    }

    let result = (dataStep2 = {
        submission_id: submission_id,
        info_address: {
            province_id: $("#provinsi").val().toString(),
            city_id: $("#kota").val().toString(),
            district_id: $("#kecamatan").val().toString(),
            subdistrict_id: $("#kelurahan").val().toString(),
            rt: $("#rt").val(),
            rw: $("#rw").val(),
            zipcode_id: $("#kode_pos").data("value"),
            address: $("#alamat_lengkap").val(),
        },
        info_assets: {
            province_id:
                addres_same == "false"
                    ? $("#provinsi_sertificate").val().toString()
                    : $("#provinsi").val().toString(),
            city_id:
                addres_same == "false"
                    ? $("#kota_sertificate").val().toString()
                    : $("#kota").val().toString(),
            district_id:
                addres_same == "false"
                    ? $("#kecamatan_sertificate").val().toString()
                    : $("#kecamatan").val().toString(),
            subdistrict_id:
                addres_same == "false"
                    ? $("#kelurahan_sertificate").val().toString()
                    : $("#kelurahan").val().toString(),
            rt:
                addres_same == "false"
                    ? $("#rt_sertificate").val()
                    : $("#rt").val(),
            rw:
                addres_same == "false"
                    ? $("#rw_sertificate").val()
                    : $("#rw").val(),
            zipcode_id:
                addres_same == "false"
                    ? $("#kode_pos_sertificate").data("value")
                    : $("#kode_pos").data("value"),
            address:
                addres_same == "false"
                    ? $("#alamat_sertificate").val()
                    : $("#alamat_lengkap").val(),
            disclaimer:
                $("input[name='disclaimer-1']:checked").val() == "true"
                    ? true
                    : false,
        },
        profession_id: $("#occupation").val().toString(),
        salary: clearDot($("#penghasilan").val()),
        employee_status_id: employeeStatus,
        age: $("#umur").val(),
        marital_status_id: $("#marital_status").val().toString(),
        spouse_name: $("#spouse_name").val(),
        spouse_profession_id: $("#spouse_job").val().toString(),
        length_of_work:
            $("#years_service").val().toString() === ""
                ? 0
                : $("#years_service").val().toString(),
    });
    $.ajax({
        type: "POST",
        url: "/credit/save-pbf-leads2",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            if (result.message === "success") {
                cb(result);
            }
        },
    });
}

function pushDataStep3(cb) {
    let result = (dataStep3 = {
        submission_id: submission_id,
        property_type_id: $("#asset_type").val().toString(),
        certificate_type_id: $("#certificate_status").val().toString(),
        certificatie_in_the_name_id: $("#certificate_by_name").val().toString(),
        where_certificate: $("input[name='where_certificate']:checked").val(),
        is_have_imb:
            $("input[name='is_have_imb']:checked").val() == "true"
                ? true
                : false,
        is_pbb_uptodate:
            $("input[name='is_pbb_uptodate']:checked").val() == "true"
                ? true
                : false,
        is_sales_period_last_year: $(
            "input[name='is_sales_period_last_year_not']:checked"
        ).val(),
        is_dihuni: $("#selectDihuni").val().toString(),
        asset_location: $("#asset_location").val().toString(),
        other_assets: $("input[name='other_assets']:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(", "),
        is_vehicle_road:
            $("input[name='is_vehicle_road']:checked").val() == "true"
                ? true
                : false,
        is_near_river:
            $("input[name='is_near_river']:checked").val() == "true"
                ? true
                : false,
        is_near_railroads:
            $("input[name='is_near_railroads']:checked").val() == "true"
                ? true
                : false,
        is_near_silk_tower:
            $("input[name='is_near_silk_tower']:checked").val() == "true"
                ? true
                : false,
        is_near_provider_tower:
            $("input[name='is_near_provider_tower']:checked").val() == "true"
                ? true
                : false,
        is_near_grave:
            $("input[name='is_near_grave']:checked").val() == "true"
                ? true
                : false,
    });
    $.ajax({
        type: "POST",
        url: "/credit/save-pbf-leads3",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            if (result.message === "success") {
                cb(result);
            }
        },
    });
}

function pushDataStep4(cb) {
    let result = (dataStep4 = {
        submission_id: submission_id,
        disclaimer:
            $("input[name='disclaimer']:checked").val() == "true"
                ? true
                : false,
    });
    $.ajax({
        type: "POST",
        url: "/credit/save-pbf-leads4",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            if (result.message === "success") {
                cb(result);
            }
        },
    });
}

function pushDataStep5() {
    $.ajax({
        type: "POST",
        url: "/credit/save-pbf-leads5",
        data: { submission_id: submission_id },
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            if (result.message === "success") {
                window.dataLayer.push({
                    event: "ValidFormStepOTP",
                });
                if (encrypted_code != "undefined") {
                    CbTransactionZeals();
                }
                submissionRegister(submission_id);
                $("#menu5").removeClass("active");
                $("#success").addClass("active");
            }
        },
    });
}

function getProfesion() {
    let result = (productType = {
        category: "PBF",
    });
    $.ajax({
        type: "POST",
        url: "/credit/get-list-profession",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            var listOccupation = [];
            if (result.success === "1") {
                $.each(result.data, function (id, val) {
                    if (val.desc != "") {
                        listOccupation.push({
                            id: val.id,
                            text: val.desc,
                        });
                    }
                });
                $("#occupation").select2({
                    placeholder: $("#occupation").attr("placeholder"),
                    dropdownParent: $("#occupation").parent(),
                    data: listOccupation,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function getEmployeeStatus() {
    let result = (productType = {
        category: "PBF",
    });
    $.ajax({
        type: "POST",
        url: "/credit/get-list-employee-status",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            var listEmployeeStatus = [];
            if (result.success === "1") {
                $.each(result.data, function (id, val) {
                    if (val.desc != "") {
                        listEmployeeStatus.push({
                            id: val.id,
                            text: val.desc,
                        });
                    }
                });
                $("#employee_status").select2({
                    placeholder: $("#employee_status").attr("placeholder"),
                    dropdownParent: $("#employee_status").parent(),
                    data: listEmployeeStatus,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function getMaritalStatus() {
    let result = (productType = {
        category: "PBF",
    });
    $.ajax({
        type: "POST",
        url: "/credit/get-list-marital-status",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            var listMaritalStatus = [];
            if (result.success === "1") {
                $.each(result.data, function (id, val) {
                    if (val.desc != "") {
                        listMaritalStatus.push({
                            id: val.id,
                            text: val.desc,
                        });
                    }
                });
                $("#marital_status").select2({
                    placeholder: $("#marital_status").attr("placeholder"),
                    dropdownParent: $("#marital_status").parent(),
                    data: listMaritalStatus,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function getSpouseProfession() {
    let result = (productType = {
        category: "PBF",
    });
    $.ajax({
        type: "POST",
        url: "/credit/get-list-spouse-profession",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            var listSpouseProfession = [];
            if (result.success === "1") {
                $.each(result.data, function (id, val) {
                    if (val.desc != "") {
                        listSpouseProfession.push({
                            id: val.id,
                            text: val.desc,
                        });
                    }
                });
                $("#spouse_job").select2({
                    placeholder: $("#spouse_job").attr("placeholder"),
                    dropdownParent: $("#spouse_job").parent(),
                    data: listSpouseProfession,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function getPropertyType() {
    $.ajax({
        type: "GET",
        url: "/credit/get-pbf-property-type",
        dataType: "json",
        error: function (data) {
            // console.log("error" + data);
        },
        fail: function (xhr, textStatus, error) {
            // console.log("request failed");
        },
        success: function (result) {
            if (result.success === "1") {
                var typeProperty = [];
                $.each(result.data, function (idx, val) {
                    if (val.desc != "") {
                        typeProperty.push({
                            id: val.id,
                            text: val.desc,
                        });
                        $("#asset_type").select2({
                            placeholder: $("#asset_type").attr("placeholder"),
                            dropdownParent: $("#asset_type").parent(),
                            data: typeProperty,
                            language: {
                                noResults: function () {
                                    return lang === "id"
                                        ? "Tidak Ada Hasil yang Ditemukan"
                                        : "No Result Found";
                                },
                            },
                        });
                    }
                });
            }
        },
    });
}

function getCertificateType() {
    $.ajax({
        type: "GET",
        url: "/credit/get-pbf-certificate-type",
        dataType: "json",
        error: function (data) {
            // console.log("error" + data);
        },
        fail: function (xhr, textStatus, error) {
            // console.log("request failed");
        },
        success: function (result) {
            if (result.success === "1") {
                var certificateType = [];
                $.each(result.data, function (idx, val) {
                    if (val.desc != "") {
                        certificateType.push({
                            id: val.id,
                            text: val.desc,
                        });
                    }
                });
                $("#certificate_status").select2({
                    placeholder: $("#certificate_status").attr("placeholder"),
                    dropdownParent: $("#certificate_status").parent(),
                    data: certificateType,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function getCertificateOnBehalf() {
    $.ajax({
        type: "GET",
        url: "/credit/get-pbf-certificate-on-behalf",
        dataType: "json",
        error: function (data) {
            // console.log("error" + data);
        },
        fail: function (xhr, textStatus, error) {
            // console.log("request failed");
        },
        success: function (result) {
            if (result.success === "1") {
                var certificateType = [];
                $.each(result.data, function (idx, val) {
                    if (val.desc != "") {
                        certificateType.push({
                            id: val.id,
                            text: val.desc,
                        });
                    }
                });
                $("#certificate_by_name").select2({
                    placeholder: $("#certificate_by_name").attr("placeholder"),
                    dropdownParent: $("#certificate_by_name").parent(),
                    data: certificateType,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function getAssetInHabited() {
    $("#selectDihuni").select2({
        placeholder: $("#selectDihuni").attr("placeholder"),
        dropdownParent: $("#selectDihuni").parent(),
        data: [
            { id: "dihuni", text: "Dihuni" },
            { id: "dihuni saudara", text: "Dihuni Saudara" },
            { id: "di kontrakan", text: "Di Kontrakan" },
            { id: "tidak dihuni", text: "Tidak Dihuni" },
        ],
        language: {
            noResults: function () {
                return lang === "id"
                    ? "Tidak Ada Hasil yang Ditemukan"
                    : "No Result Found";
            },
        },
    });
}

function getAssetLocation() {
    $("#asset_location").select2({
        placeholder: $("#asset_location").attr("placeholder"),
        dropdownParent: $("#asset_location").parent(),
        data: [
            { id: "Cluster", text: "Cluster" },
            { id: "Komplek", text: "Komplek" },
            { id: "Perumahan Umum", text: "Perumahan Umum" },
        ],
        language: {
            noResults: function () {
                return lang === "id"
                    ? "Tidak Ada Hasil yang Ditemukan"
                    : "No Result Found";
            },
        },
    });
}

function getYearsOfService() {
    var placeholder = $("#years_service").attr("placeholder");
    let data_occupation = [
        {
            id: 0,
            text: "Kurang dari 1 Tahun",
        },
        {
            id: 1,
            text: "Lebih dari 1 Tahun",
        },
    ];

    $("#years_service").select2({
        placeholder: placeholder,
        data: data_occupation,
    });
}

function employeeStatusCheck() {
    let occupation = $("#occupation").val();
    let employeeStatus = $("#employee_status").val();
    const KARYAWAN_SWASTA_ID = "5865706C-32D0-4BE0-9395-B50887DC8FF0";
    const STATUS_KONTRAK_ID = "38A446DA-39A2-445B-A493-D5D2D7CE02DD";

    occupation == KARYAWAN_SWASTA_ID && employeeStatus == STATUS_KONTRAK_ID
        ? $(".years_service").removeAttr("hidden")
        : $(".years_service").attr("hidden", true),
        $("#years_service").val(null);
}

function getFunding() {
    let result = (dataFunding = {
        submission_id: submission_id,
        estimasi_harga: clearDot($("#estimate_price").val()),
    });

    $.ajax({
        type: "POST",
        url: "/credit/get-pbf-funding",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            var rawMinPrice = parseInt(result.data.minimum_funding),
                rawMaxPrice = parseInt(result.data.maximum_funding);

            if ($("#funding").length > 0) {
                $("#funding").slider({
                    min: rawMinPrice,
                    max: rawMaxPrice,
                    value: rawMinPrice,
                    step: 100000,
                });
            }
            $("#PengajuanBiaya").removeAttr("disabled");
            $("#PengajuanBiaya").val(currency(rawMinPrice));
            $(".valuemin").text("Rp " + currency(rawMinPrice));
            $(".valuemax").text("Rp " + currency(rawMaxPrice));
        },
    });
}

function getTenor() {
    $.ajax({
        type: "POST",
        url: "/credit/get-pbf-tenor",
        data: { submission_id: submission_id },
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            var listTenor = [];
            if (result.success === "1") {
                $.each(result.data, function (id, val) {
                    if (val.desc != "") {
                        listTenor.push({
                            id: val.tenor,
                            text: val.desc,
                        });
                    }
                });
                $("#tenorPbf").removeAttr("disabled");
                $("#tenorPbf").select2({
                    placeholder: $("#tenorPbf").attr("placeholder"),
                    dropdownParent: $("#tenorPbf").parent(),
                    data: listTenor,
                    language: {
                        noResults: function () {
                            return lang === "id"
                                ? "Tidak Ada Hasil yang Ditemukan"
                                : "No Result Found";
                        },
                    },
                });
            }
        },
    });
}

function PostCalculate() {
    let result = (dataCalculate = {
        submission_id: submission_id,
        tenor: $("#tenorPbf").val().toString(),
        funding: clearDot($("#PengajuanBiaya").val()),
    });

    $.ajax({
        type: "POST",
        url: "/credit/pbf-calculate",
        data: result,
        dataType: "json",
        tryCount: 0,
        retryLimit: retryLimit,
        error: function (xhr, textStatus, errorThrown) {
            retryAjax(this, xhr);
        },
        fail: function (xhr, textStatus, error) {
            retryAjax(this, xhr);
        },
        success: function (result) {
            if (result.success === 1) {
                $(".total").text(currency(result.data.monthly_installment));
            }
        },
    });
}

function currency(x) {
    var x = new Intl.NumberFormat("id-Id").format(x);
    return x;
}

function CalcBtn(action) {
    if (action == "hide") {
        $("#calcLoan").attr("disabled", "disabled");
    } else $("#calcLoan").removeAttr("disabled");
}

$("#btn-check").on("click", (e) => {
    e.preventDefault();
    submissionLogin(dataStep1.phone_number);
});
