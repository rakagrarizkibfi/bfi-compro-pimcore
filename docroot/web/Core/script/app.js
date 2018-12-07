(function ($) {

	var input = document.getElementById('file_upload');
	var infoArea = document.getElementById('nama-file');

	//input.addEventListener('change', showFileName);

	function showFileName(event) {

		// the change event gives us the input it occurred in 
		var input = event.srcElement;

		// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
		var fileName = input.files[0].name;

		// use fileName however fits your app best, i.e. add it into a div
		infoArea.textContent = fileName;
	}


	$(window).scroll(function () {

		var st = $(this).scrollTop();

		if (st >= 100) {
			$('#site-header').addClass('active');
			$('#site-container').addClass('active');

		}
		else {
			$('#site-header').removeClass('active');
			$('#site-container').removeClass('active');
		}

		lastScrollTop = st;
	});

	var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
	var _marker = '/static/images/icon/marker.png';
	var marker, i, latLngGoogle, _radius;
	var infowindow = null;

	var credits = {
		"angunan": {
			"jenis_angunan": ""
		},

		"pemohon": {
			"nama": "",
			"email": "",
			"no_handphone": ""
		},

		"tempat_tinggal": {
			"provinsi": "",
			"kota": "",
			"kecamatan": "",
			"kelurahan": "",
			"kode_pos": "",
			"alamat": ""
		},

		"kendaraan": {
			"merk_kendaraan": "",
			"model_kendaraan": "",
			"tahun_kendaraan": "",
			"status_pemilik": ""
		}

	}


	$("#herobanner").slick({
		slideToShow: 1,
		dots: true,
		prevArrow: $(".prev-1"),
		nextArrow: $(".next-1")
	})

	$("#herobanner2").slick({
		slideToShow: 1,
		dots: true,
		prevArrow: $(".prev-2"),
		nextArrow: $(".next-2")
	})

	$("#slider-cara--kerja").slick({
		centerMode: true,
		centerPadding: '80px',
		slidesToShow: 1
	})

	$('.slider-author__wrapper').slick({
		dots: true,
		prevArrow: '<i class="fa fa-angle-left prev-arrow" aria-hidden="true"></i>',
		nextArrow: '<i class="fa fa-angle-right next-arrow" aria-hidden="true"></i>'
	});

	if ($('.biaya-agunan').length > 0) {
		jcf.replaceAll();
	}


	var customSelect = $('.c-custom-select-home');

	// Options for custom Select
	jcf.setOptions('Select', {
		wrapNative: false,
		wrapNativeOnMobile: false,
		fakeDropInBody: false,
		maxVisibleItems: 5
	});

	jcf.replace(customSelect);

	var customSelect2 = $('.c-custom-select');

	// Options for custom Select
	jcf.setOptions('Select', {
		wrapNative: false,
		wrapNativeOnMobile: false,
		fakeDropInBody: false,
		maxVisibleItems: 5
	});

	jcf.replace(customSelect2);

	var customSelect3 = $('.c-custom-select-trans');

	// Options for custom Select
	jcf.setOptions('Select', {
		wrapNative: false,
		wrapNativeOnMobile: false,
		fakeDropInBody: false,
		maxVisibleItems: 5
	});

	jcf.replace(customSelect3);

	$(".nav-tabs>li").on("click", function (e) {
		if ($(this).hasClass("disabled")) {
			e.preventDefault();
			return false;
		}
	});

	jQuery.validator.setDefaults({
		debug: true,
		success: "valid"
	});

	$form = $(".form-get--credit");
	$successMsg = $(".alert");


	$form.validate({
		errorPlacement: function (error, element) {
			if (!error) {
				return true;
			}
		},
		onfocusout: false,
		onkeyup: false,
		rules: {
			nama_lengkap: {
				required: true,
				minlength: 5
			},
			email: {
				required: true,
				email: true
			},
			no_handphone: {
				required: true,
				number: true
			},
			file_upload: {
				required: true,
				accept: "image/jpeg, pdf"
			},
			provinsi: {
				required: true
			},
			kota: {
				required: true
			},
			kecamatan: {
				required: true
			},
			kelurahan: {
				required: true
			},
			kode_pos: {
				required: true
			},
			alamat_lengkap: {
				required: true
			},
			merk_kendaraan: {
				required: true
			},
			model_kendaraan: {
				required: true
			},
			tahun_kendaraan: {
				required: true
			},
			status: {
				required: true
			},
		},
		messages: {
			nama_lengkap: "Please specify your name",
			provinsi: "Please input your province"

		},
		submitHandler: function () {

		}
	})

	var inputTargets = [{
		input: '#nama_lengkap',
		target: '#button1'
	}, {
		input: '#email1',
		target: '#button1'
	},
	{
		input: '#no_handphone',
		target: '#button1'
	},
	{
		input: '#file_upload',
		target: '#button1'
	},
	{
		select: '#provinsi',
		target: '#button2'
	},
	{
		select: '#kota',
		target: '#button2'
	},
	{
		select: '#kecamatan',
		target: '#button2'
	},
	{
		select: '#kelurahan',
		target: '#button2'
	},
	{
		select: '#kode_pos',
		target: '#button2'
	},
	{
		select: '#alamat_lengkap',
		target: '#button2'
	},
	{
		trans: '#model_kendaraan',
		target: '#button3'
	},
	{
		trans: '#merk_kendaraan',
		target: '#button3'
	},
	{
		trans: '#tahun_kendaraan',
		target: '#button3'
	},
	{
		trans: '#status',
		target: '#button3'
	},
	];


	// inputTargets.forEach(function (v) {


	//     $(v.input).bind("input change", function (e) {

	//         if ($("#nama_lengkap, #email1, #no_handphone, #file_upload").valid()) {

	//             $("#button1").removeClass("disabled").addClass("done");
	//         } else {
	//             $("#button1").addClass("disabled");
	//         }

	//     });

	//     $(v.select).bind("change input", function () {
	//         if ($("#provinsi, #kota, #kecamatan, #kelurahan, #kode_pos, #alamat_lengkap").valid()) {
	//             $("#button2").removeClass("disabled");
	//         } else {
	//             $("#button2").addClass("disabled");
	//         }
	//     });

	//     $(v.trans).bind("change", function () {
	//         if ($("#merk_kendaraan, #model_kendaraan, #tahun_kendaraan, #status").valid()) {
	//             $("#button3").removeClass("disabled");
	//         } else {
	//             $("#button3").addClass("disabled");
	//         }
	//     });


	// })

	// $(".buttonnext").click(function () {
	//     $idnext = $(this).parent(".button-area").parent(".tab-pane").next(".tab-pane");
	//     $getidnext = $idnext.attr("id");


	//     $('a[href="#' + $getidnext + '"]').parent("li").removeClass("disabled");

	//     $id = $(this).parent(".button-area").parent(".tab-pane").next(".tab-pane");
	//     $getid = $id.attr("id");

	//     $('a[href="#' + $getid + '"]').click();

	// })

	// $(".buttonback").click(function () {
	//     $id = $(this).parent(".button-area").parent(".tab-pane").prev();
	//     $getid = $id.attr("id");

	//     $('a[href="#' + $getid + '"]').click();

	// })

	//Range Form,

	var bilangan = 10000000;

	var number_string = bilangan.toString(),
		sisa = number_string.length % 3,
		rupiah = number_string.substr(0, sisa),
		ribuan = number_string.substr(sisa).match(/\d{3}/g);

	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	// $value = $(".slider-handle").attr("aria-valuenow");

	// console.log($value);

	$("#ex6SliderVal").val(rupiah);

	$(".valuemin").text("Rp 10.000.000");

	$(".valuemax").text("Rp 60.000.000");


	// With JQuery

	$("#ex11").slider();

	$("#ex12").slider();


	$("#ex11").on("slide", function (slideEvt) {

		var bilangan = slideEvt.value;

		var number_string = bilangan.toString(),
			sisa = number_string.length % 3,
			rupiah = number_string.substr(0, sisa),
			ribuan = number_string.substr(sisa).match(/\d{3}/g);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		$("#ex6SliderVal").val(rupiah);
	});


	// js by jaya

	$(".panel").on("show.bs.collapse hide.bs.collapse", function (e) {
		if (e.type == 'show') {
			$(this).addClass('active');
		} else {
			$(this).removeClass('active');
		}
	});

	$.validator.addClassRules({

		formRequired: {
			required: true
		},

		formNumber: {
			required: true,
			number: true
		},

		"checkbox[]": {
			required: true,
			minlength: 1
		},

		submitHandler: function (form) {
			form.submit();
		}
	});

	function validateFormRequired(element) {
		$(element).validate({
			errorPlacement: function (error, element) {
				element.closest('.form-group').find('.error-wrap').html(error);
				setTimeout(function () {
					$('label.error').addClass('show-error');
				}, 200);
			}
		});
	}

	validateFormRequired($('#getCredit'));

	function showTab1() {
		$('#menu1').fadeIn();
	}

	function hideTab1() {
		$('#menu1').fadeOut();
	}

	function showTab2() {
		$('#menu2').fadeIn();
	}

	function hideTab2() {
		$('#menu2').fadeOut();
	}

	function showTab3() {
		$('#menu3').fadeIn();
	}

	function hideTab3() {
		$('#menu3').fadeOut();
	}

	function showTab4() {
		$('#menu4').fadeIn();
	}

	function hideTab4() {
		$('#menu4').fadeOut();
	}

	function showTab5() {
		$('#menu5').fadeIn();
	}

	function hideTab5() {
		$('#menu5').fadeOut();
	}

	function showTab6() {
		$('#menu6').fadeIn();
	}

	function hideTab6() {
		$('#menu6').fadeOut();
	}

	function pushDataPemohon() {
		var nama_lengkap = $('#nama_lengkap').val(),
			email_pemohon = $('#email_pemohon').val(),
			no_telepon = $('#no_handphone').val();

		credits.pemohon.nama = nama_lengkap;
		credits.pemohon.email = email_pemohon;
		credits.pemohon.no_handphone = no_telepon;

	}

	function pushDataTempatTinggal() {
		var provinsi = $('#provinsi').val(),
			kota = $('#kota').val(),
			kecamatan = $('#kecamatan').val(),
			kelurahan = $('#kelurahan').val(),
			kode_pos = $('#kode_pos').val(),
			alamat = $('#alamat_lengkap').val();

		credits.tempat_tinggal.provinsi = provinsi;
		credits.tempat_tinggal.kota = kota;
		credits.tempat_tinggal.kecamatan = kecamatan;
		credits.tempat_tinggal.kelurahan = kelurahan;
		credits.tempat_tinggal.kode_pos = kode_pos;
		credits.tempat_tinggal.alamat = alamat;
	}

	function pushDataKendaraan() {
		var merk_kendaraan = $('#merk_kendaraan').val(),
			model_kendaraan = $('#model_kendaraan').val(),
			tahun_kendaraan = $('#tahun_kendaraan').val(),
			status_pemilik = $('#status_kep').val();


		credits.kendaraan.merk_kendaraan = merk_kendaraan;
		credits.kendaraan.model_kendaraan = model_kendaraan;
		credits.kendaraan.tahun_kendaraan = tahun_kendaraan;
		credits.kendaraan.status_pemilik = status_pemilik;
	}

	function setSummary() {
		//data pemohon
		$('#showFullName').html(credits.pemohon.nama);
		$('#showEmail').html(credits.pemohon.email);
		$('#showPhone').html(credits.pemohon.no_handphone);

		//data tempat tinggal
		$('#showProvinsi').html(credits.tempat_tinggal.provinsi);
		$('#showKota').html(credits.tempat_tinggal.kota);
		$('#showKecamatan').html(credits.tempat_tinggal.kecamatan);
		$('#showKelurahan').html(credits.tempat_tinggal.kelurahan);
		$('#showKodePos').html(credits.tempat_tinggal.kode_pos);

		// data merk kendaraan

		$('#showMerkKendaraan').html(credits.kendaraan.merk_kendaraan);
		$('#showModelKendaraan').html(credits.kendaraan.model_kendaraan);
		$('#showTahunKendaraan').html(credits.kendaraan.tahun_kendaraan);
		$('#showStatusPemilik').html(credits.kendaraan.status_pemilik);
	}

	function stepAction() {
		$('#button1').on('click', function (e) {
			e.preventDefault();

			if ($(this).closest('form').valid()) {
				showTab2();
				hideTab1();
				$('.nav-item-2').addClass('active');

				pushDataPemohon();

			}
		})

		$('#button2').on('click', function (e) {
			e.preventDefault();

			if ($(this).closest('form').valid()) {
				showTab3();
				hideTab2();
				$('.nav-item-3').addClass('active');

				pushDataTempatTinggal();

			}
		})

		$('#button3').on('click', function (e) {
			e.preventDefault();

			if ($(this).closest('form').valid()) {
				showTab4();
				hideTab3();
				$('.nav-item-4').addClass('active');

				pushDataKendaraan();

			}
		})

		$('#button4').on('click', function (e) {
			e.preventDefault();

			if ($(this).closest('form').valid()) {
				showTab5();
				hideTab4();
				$('.nav-item-5').addClass('active');

				setSummary();
			}
		})

		$('#button5').on('click', function (e) {
			e.preventDefault();

			showTab6();
			hideTab5();
			$('.input-number:first-child').focus();
			$('.horizontal-scroll').hide();

		})
	}

	function tabAction() {
		$(document).on('click', '.nav-tabs li.active #tab1', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab1();
		})

		$(document).on('click', '.nav-tabs li.active #tab2', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab2();
		})

		$(document).on('click', '.nav-tabs li.active #tab3', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab3();
		})

		$(document).on('click', '.nav-tabs li.active #tab4', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab4();
		})

		$(document).on('click', '.nav-tabs li.active #tab5', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab5();
		})
	}

	function backAction() {
		$('#buttonback2').on('click', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab1();
		})

		$('#buttonback3').on('click', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab2();
		})

		$('#buttonback4').on('click', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab3();
		})

		$('#buttonback5').on('click', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab4();
		})
	}

	function changeSumary() {
		$('#btnDataPemohon').on('click', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab1();
		})

		$('#btnDataTempatTinggal').on('click', function (e) {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab2();
		})

		$('#btnDataKendaraan').on('click', function () {
			e.preventDefault();
			$('.tab-pane').fadeOut();
			showTab3();
		})
	}

	function keyupOtpAction() {

		$('.input-number').keyup(function () {
			if ($(this).val() > 0) {
				$(this).next().focus();
			}

			else if ($(this).val() == 0) {
				$(this).prev().focus();
			}
		})

		$(".input-number").keypress(function (e) {
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		});
	}


	$('#chooseFile').bind('change', function () {
		var filename = $("#chooseFile").val();
		if (/^\s*$/.test(filename)) {
			$(".file-upload").removeClass('active');
			$("#noFile").text("No file chosen...");
		}
		else {
			$(".file-upload").addClass('active');
			$("#noFile").text(filename.replace("C:\\fakepath\\", ""));
		}
	});



	if (isMobile) {
		$('.sect-step').slick({
			dots: false,
			prevArrow: false,
			nextArrow: false
		})

		$('ul.list-step').slick({
			dots: false,
			prevArrow: false,
			nextArrow: false
		});
	}

	var markers = [];

	function listingLocation(params) {
		var lastInfoWindow, lastMarker;

		$.ajax({
			type: 'GET',
			url: params,
			dataType: 'json',
			success: function (data) {
				$.each(data, function (id, val) {
					var listing = val.data;

					$.each(listing, function (idListing, valListing) {
						if (valListing.latitude != "" || valListing.longitude != "") {

							marker = new google.maps.Marker({
								position: new google.maps.LatLng(valListing.latitude, valListing.longitude),
								map: map,
								icon: _marker
							});

							var contentString = '<div class="col-md-12 parent-brachlist" data-id="' + idListing + '" data-lat="' + valListing.latitude + '"  data-lng="' + valListing.longitude + '">';
								contentString += '<div class="wrapper-branchlist">';
								contentString += '<div class="col-md-2 col-sm-2 col-xs-2 branchlist"><img class="icon-gedung-branchlist" src="/static/images/gedung.png"></div>';
								contentString += '<div class="col-md-8 col-sm-8 col-xs-8 branchlist">';
								contentString += '<p class="title-branch margin-bottom-10">' + valListing.name + '</p>';
								contentString += '<p class="desc-branch">' + valListing.address + '</p>';
								contentString += '<a href="#" class="margin-top-20">PETUNJUK ARAH <i class="fa fa-angle-right arrowlink" aria-hidden="true"></i></a>';
								contentString += '</div>';
								contentString += '</div>';
								contentString += '</div>';

							infowindow = new google.maps.InfoWindow({
								content: ''
							});


							google.maps.event.addListener(marker, 'click', (function (marker, i) {

								return function () {
									infowindow.setContent(contentString);
									infowindow.open(map, marker);
								}

							})(marker, i));


							markers.push(marker);

							google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
								var place = autocomplete.getPlace();

								// if (!place.geometry) {
								// 	window.alert("No details available for input: '" + place.name + "'");
								// 	return;
								// }

								var latComplete = place.geometry.location.lat(),
									lngComplete = place.geometry.location.lng();

								_radius = (13 * 500);
								latLngGoogle = new google.maps.LatLng(latComplete, lngComplete);
								var latLngAPI = new google.maps.LatLng(parseFloat(valListing.latitude), parseFloat(valListing.longitude));
								var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(latLngGoogle, latLngAPI);

								CircleOption = {
									strokeColor: '#0F2236',
									strokeOpacity: 0.5,
									strokeWeight: 2,
									fillColor: '#0F2236',
									fillOpacity: 0.15,
									map: map,
									radius: _radius,
									center: latLngGoogle
								};

								if (cityCircle) {
									cityCircle.setMap(null);
								}

								cityCircle = new google.maps.Circle(CircleOption);

								if (place.geometry.viewport) {
									map.fitBounds(place.geometry.viewport);
								} else {
									map.setCenter(place.geometry.location);
									map.setZoom(25);
								}

								var marker = new google.maps.Marker({
									position: place.geometry.location,
									map: map,
									icon: _marker
								});


								if ((distance_from_location <= _radius)) {

									setTimeout(function () {
										$('#branch').empty();
									}, 10);

									setTimeout(function () {
										var html = '<div class="col-md-12 parent-brachlist" data-id="' + idListing + '" data-lat="' + valListing.latitude + '"  data-lng="' + valListing.longitude + '">';
										html += '<div class="wrapper-branchlist">';
										html += '<div class="col-md-2 col-sm-2 col-xs-2 branchlist"><img class="icon-gedung-branchlist" src="/static/images/gedung.png"></div>';
										html += '<div class="col-md-8 col-sm-8 col-xs-8 branchlist">';
										html += '<p class="title-branch margin-bottom-10">' + valListing.name + '</p>';
										html += '<p class="desc-branch">' + valListing.address + '</p>';
										html += '<a href="#" class="margin-top-20">PETUNJUK ARAH <i class="fa fa-angle-right arrowlink" aria-hidden="true"></i></a>';
										html += '</div>';
										html += '<div class="col-md-2 branchlist"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
										html += '</div>';
										html += '</div>';

										$('.wrapper-parent-branchlist').addClass('active');
										$('#branch').append(html);

										if ($('.parent-brachlist').length > 2) {
											$('.wrapper-parent-branchlist').css('height', 300);
										}

										else {
											$('.wrapper-parent-branchlist').css('height', 'auto');
										}
									}, 100);

								}
								else {

									var html = '<div class="col-md-12 parent-brachlist" data-id="' + idListing + '" data-lat="' + valListing.latitude + '"  data-lng="' + valListing.longitude + '">';
										html += '<div class="wrapper-branchlist">';
										html += '<p>Lokasi Tidak Ditemukan</p>';
										html += '</div>';
										html += '</div>';

									$('#branch').html(html);
									$('.wrapper-parent-branchlist').css('height', 'auto');
								}
							});
						}
					})
				});
			}
		});

		$(document).on('click', '.parent-brachlist', function () {

			var idMarker = $(this).data('id');
			google.maps.event.trigger(markers[parseInt(idMarker)], 'click');
		})
	}


	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 10,
		center: new google.maps.LatLng(-6.21462, 106.84513)
	});

	var input = document.getElementById('searchTextField');

	var cityCircle;
	var autocomplete = new google.maps.places.Autocomplete(input, { types: ["geocode"] });

	autocomplete.bindTo('bounds', map);




	if ($('#map').length) {

		var base_url = '/branch/listJson';

		listingLocation(base_url);

	}

	function countDown() {
		var count = 120;
		var counter = setInterval(function timerDown() {
			count = count - 1;
			if (count === -1) {
				clearInterval(counter);
				return;
			}

			var seconds = count % 60,
				minutes = Math.floor(count / 60),
				hours = Math.floor(minutes / 60);
			minutes %= 60;
			hours %= 60;

			if (minutes < 10) {

				minutes = '0' + minutes;
			}

			if (hours < 10) {

				hours = '0' + hours;
			}

			if (seconds < 10) {

				seconds = '0' + seconds;
			}
			$('.countdown').html(minutes + ":" + seconds);
		}, 1000)

	}

	keyupOtpAction();
	changeSumary();
	stepAction();
	tabAction();
	backAction();
	countDown();

})(jQuery);