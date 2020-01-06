var name_label_element = document.getElementById("name-label");
var email_label_element = document.getElementById("email-label");
var phone_label_element = document.getElementById("phone-label");
var ktp_label_element = document.getElementById("ktp-label");

var default_name_label = name_label_element.textContent;
var default_email_label = email_label_element.textContent;
var default_phone_label = phone_label_element.textContent;
var default_ktp_label = ktp_label_element.textContent;

if ($("li").hasClass("active")){
    $(".active #poin1,#poin2").html("<i class='fa fa-check'></i>");
    $(".active .tool-tip").addClass("hide");
}


function changeLabel(ele_id) {
    if (ele_id == "name-input"){
        name_label_element.textContent = "NAMA LENGKAP";
    }
    else if(ele_id == "email-input"){
        email_label_element.textContent = "EMAIL";
    }
    else if(ele_id == "phone-input"){
        phone_label_element.textContent = "NOMOR HANDPHONE";
    }
    else if(ele_id == "ktp-input"){
        ktp_label_element.textContent = "NOMOR KTP";
    }
}

function deleteLabel(ele_id) {
    if (ele_id == "name-input" && document.getElementById(ele_id).value.length > 0){
        name_label_element.classList.add("exist");
        document.getElementById(ele_id).classList.add("exist-input");
        return name = document.getElementById(ele_id).value;
    }
    else if (ele_id == "email-input" && document.getElementById(ele_id).value.length > 0) {
        email_label_element.classList.add("exist");
        document.getElementById(ele_id).classList.add("exist-input");
        return email = document.getElementById(ele_id).value;
    }
    else if (ele_id == "phone-input" && document.getElementById(ele_id).value.length > 0) {
        phone_label_element.classList.add("exist");
        document.getElementById(ele_id).classList.add("exist-input");
        return phone = document.getElementById(ele_id).value;
    }
    else if (ele_id == "ktp-input" && document.getElementById(ele_id).value.length > 0) {
        ktp_label_element.classList.add("exist");
        document.getElementById(ele_id).classList.add("exist-input");
    }
    else {
        if (ele_id == "name-input"){
            name_label_element.classList.remove("exist");
            name_label_element.textContent = default_name_label;
        }
        else if(ele_id == "email-input"){
            email_label_element.classList.remove("exist");
            email_label_element.textContent = default_email_label;
        }
        else if(ele_id == "phone-input"){
            phone_label_element.classList.remove("exist");
            phone_label_element.textContent = default_phone_label;
        }
        else if(ele_id == "ktp-input"){
            ktp_label_element.classList.remove("exist");
            ktp_label_element.textContent = default_ktp_label;
        }
    }
}

// preview uploaded image //
var title = document.getElementById("upload-text");
var image = document.getElementById('preview-upload');
var button = document.getElementById( 'upload-button' );
var input = document.getElementById( 'file-upload' );
var infoArea = document.getElementById( 'file-upload-filename' );

input.addEventListener( 'change', showFileName );
title.setAttribute("style", "margin-bottom: -15px;");

function showFileName( event ) {    
    var input = event.srcElement;
    var fileName = input.files[0].name;
    title.setAttribute("style", "margin-bottom: 10px;");
    button.textContent = "Ubah File";
    image.src = URL.createObjectURL(event.target.files[0]);
    infoArea.textContent = fileName;
    return photo = fileName;
}

$(document).ready(function(){
    checkStatus()
    checkAssignmentList()

    window.onload = function(){
        var elements = document.querySelectorAll('[id="telat"]');
        for(var i = 0; i < elements.length; i++) {
            elements[i].innerHTML += (
                "<div class='outdate'>TELAT BAYAR</div>" +
                "<div class='outdate-note'>" +
                    "<div class='circle'>" +
                        "<i class='fa fa-exclamation'></i>"+
                    "</div>"+
                    "<span>Anda terlambat membayar 5 hari</span>"+
                "</div>"
            );
        }
    }
});

function checkStatus() {
    var token = window.sessionStorage.getItem("token");
    console.log(token);

    $.ajax({
        type: 'GET',
        url: '/user/check-verify-status',
        crossDomain: true,
        dataType: 'json',
        headers: { 'session_id': token },

        error: function (data) {
            console.log('error' + data);
        },

        fail: function (xhr, textStatus, error) {
            console.log('request failed')
        },

        success: function (dataObj) {
            if (dataObj.success === true) {
                console.log('berhasil get data')
            }
        }
    })
}

function checkAssignmentList() {
    var token = window.sessionStorage.getItem("token");
    console.log(token);

    $.ajax({
        type: 'GET',
        url: '/user/assignment-list',
        crossDomain: true,
        dataType: 'json',
        headers: { 'session_id': token },

        error: function (data) {
            console.log('error' + data);
        },

        fail: function (xhr, textStatus, error) {
            console.log('request failed')
        },

        success: function (dataObj) {
            if (dataObj.success === true) {
                console.log('berhasil get data')
            }
        }
    })
}