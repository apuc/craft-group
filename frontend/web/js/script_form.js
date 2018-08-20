$(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
		$(document).on('click', '.service__form-submit', function(e){
		e.preventDefault();
		//для отправки файла
		// var file_data = $('#file-2').prop('files')[0];


		//создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
		var form_data = new FormData();
		// присоединяем наш файл
		/*jQuery.each(jQuery('#file')[0].files, function(i, file) {
			data.append('file-'+i, file);
		});*/

		//для отправки файла
		// form_data.append('file', file_data);

		var name = $("input[name='name']").val();
		var phone = $("input[name='phone']").val();
		var service_mob = $("input[name='ckeckbox_mob']:checked");
		var service_supp = $("input[name='ckeckbox_supp']:checked");
		var service_site = $("input[name='ckeckbox_site']:checked");
		var service_seo = $("input[name='ckeckbox_seo']:checked");
		var skype = $("input[name='skype']").val();
		var email = $("input[name='email']").val();
		var text = $("#text").val();
		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		var valid_email = pattern.test(email);
		//var re = /^\d[\d\(\)\ -]{4,14}\d$/;
		//var valid_phone = re.test(phone);

		if (name == '') {
			alert('Введите Ваше имя!');
			return false;
		}
		if (phone == '') {
			alert('Введите номер телефона!');
		 	return false;
		 }
		// if (valid_phone){
		// 	output = 'Номер телефона введен правильно!';
		// 	/*alert(output);*/
		// } else {
		// 	output = 'Номер телефона введен неправильно!';
		// 	alert(output);
		// 	return false;
		// }

		/*if (radio.length == 0) {
			alert('Выберите какие услуги интересуют!');
			return false;
		}*/
		if (email == '') {
			alert('Введите Ваш Email!');
			return false;
		}

		if (valid_email){
			output = 'E-mail введен правильно!';
			/*alert(output);*/
		} else {
			output = 'E-mail введен неправильно!';
			alert(output);
			return false;
		}

		if (skype == '') {
			alert('Введите номер телефона!');
			return false;
		}

		if (text == '') {
			alert('Введите Ваш текс!');
			return false;
		}


		if(name != '') {
			form_data.append('action', 'sendForm');
			form_data.append('name', name);
			form_data.append('phone', phone);
			form_data.append('email', email);
			form_data.append('skype', phone);
			form_data.append('text', text);
			if(service_mob.length != 0){
				form_data.append('service_mob', service_mob);
			}
			if(service_supp.length != 0) {
				form_data.append('service_supp', service_supp);
			}
			if(service_site.length != 0) {
				form_data.append('service_site', service_site);
			}
			if(service_seo.length != 0) {
				form_data.append('service_seo', service_seo);
			}
			// form_data.append('file', file_data);


			$.ajax({
				url: myajax.url,
				type: 'post',
				data: form_data,
				contentType: false,
				processData: false,
				success: function (response) {
					console.log(response);
					alert(response.message);

					if (response.result == 'success') {
						/*form.reset();*/
						$('#send_form').trigger('reset');
					}
				}
			});
			return false;
		} else {
			alert('Вы не заполнили все поля!');
		}
	});
});

var $grid = $('.grid').masonry({
	itemSelector: '.grid-item',
	percentPosition: true
});

$('.grid').imagesLoaded( function() {
	$('.grid-preloader').css('display', 'none');
	$('.grid, .more_btn').css('display', 'block');

	$('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true
	});
});

$(document).on('click', '.more_btn', function(e) {
	e.preventDefault();
	$('.in_active_item').show();
	$('.more_btn').hide();

	$grid.masonry('layout');
});

window.onload = function () {
	$('.page-preloader').hide(400);
}

jQuery(function($){
	$("#phone").mask("+9(999) 999-99-99");
});

