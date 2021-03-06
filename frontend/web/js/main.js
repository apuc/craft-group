$(document).ready(function () { // вся мaгия пoсле зaгрузки стрaницы


    // let modal = new NoActivityModal();
    // modal.showModal(3000,$(".c"));

    $(document).on('click', '.send', function (e) {
        e.preventDefault();

        //создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
        var form_data = new FormData();

        var name = $("input[name='name']").val();
        var phone = $("input[name='phone']").val();
        var file = [];
        $('.fileUp').each(function () {
            file.push($(this).val());
        });

        var skype = $("input[name='skype']").val();
        var email = $("input[name='email']").val();
        var text = $("#message").val();
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        var valid_email = pattern.test(email);

        var service = [];
        $('input[name=radio]:checked').each(function () {
            service.push($(this).val());
        });
        service = service.join(',');

        if (name == '') {
            alert('Введите Ваше имя!');
            return false;
        }
        if (phone == '') {
            alert('Введите номер телефона!');
            return false;
        }

        if (email == '') {
            alert('Введите Ваш Email!');
            return false;
        }

        if (valid_email) {
            output = 'E-mail введен правильно!';
            /*alert(output);*/
        } else {
            output = 'E-mail введен неправильно!';
            alert(output);
            return false;
        }


        if (name != '') {
            form_data.append('action', 'sendForm');
            form_data.append('name', name);
            form_data.append('phone', phone);
            form_data.append('email', email);
            form_data.append('skype', skype);
            form_data.append('text', text);
            form_data.append('file', file);


            form_data.append('service', service);


            $.ajax({
                url: '/site/send-form',
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
                        $('.qq-upload-success').remove();
                    }
                }
            });
            return false;
        } else {
            alert('Вы не заполнили все поля!');
        }
    });

    /*Форма вакансии*/
    $(document).on('click', '.send_vacancy', function (e) {
        e.preventDefault();

        //создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
        var form_data = new FormData();

        var name = $("input[name='name']").val();
        var specialty = $("input[name='specialty']").val();
        var city = $("input[name='city']").val();
        var subject = $("input[name='subject']").val();
        var file = [];
        $('.fileUp').each(function () {
            file.push($(this).val());
        });
        var service_mob = $("input[name='ckeckbox_mob']:checked");
        var service_supp = $("input[name='ckeckbox_supp']:checked");
        var service_site = $("input[name='ckeckbox_site']:checked");
        var service_seo = $("input[name='ckeckbox_seo']:checked");
        var skype = $("input[name='skype']").val();
        var email = $("input[name='email']").val();
        var text = $("#message_vacancy").val();
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        var valid_email = pattern.test(email);

        if (name == '') {
            alert('Введите Ваше имя!');
            return false;
        }

        if (email == '') {
            alert('Введите Ваш Email!');
            return false;
        }

        if (valid_email) {
            output = 'E-mail введен правильно!';
            /*alert(output);*/
        } else {
            output = 'E-mail введен неправильно!';
            alert(output);
            return false;
        }


        if (name != '') {
            form_data.append('action', 'sendForm');
            form_data.append('name', name);
            form_data.append('specialty', specialty);
            form_data.append('email', email);
            form_data.append('city', city);
            form_data.append('text', text);
            form_data.append('file', file);
            form_data.append('subject', subject);

            if (service_mob.length != 0) {
                form_data.append('service_mob', service_mob.val());
            }
            if (service_supp.length != 0) {
                form_data.append('service_supp', service_supp.val());
            }
            if (service_site.length != 0) {
                form_data.append('service_site', service_site.val());
            }
            if (service_seo.length != 0) {
                form_data.append('service_seo', service_seo.val());
            }


            $.ajax({
                url: '/site/send-form',
                type: 'post',
                data: form_data,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    alert(response.message);

                    if (response.result == 'success') {
                        /*form.reset();*/
                        $('#form_vacancy').trigger('reset');
                        $('.qq-upload-success').remove();
                    }
                }
            });
            return false;
        } else {
            alert('Вы не заполнили все поля!');
        }
    });

    /*Форма отзывы*/
    $(document).on('click', '#submit_feedback', function (e) {
        e.preventDefault();

        //создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
        // var form_data = new FormData();

        var name = $("#name_feedback").val();
        var category = $("#feedback-category").val();
        var site = $("#site_feedback").val();
        var city = $("#city_feedback").val();
        var file = [];
        $('#feedback-file').each(function () {
            file.push($(this).val());
        });
        var email = $("#mail_feedback").val();
        var text = $("#message_feedback").val();
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        var valid_email = pattern.test(email);

        if (name == '') {
            alert('Введите Ваше имя!');
            return false;
        }

        if (email == '') {
            alert('Введите Ваш Email!');
            return false;
        }

        if (valid_email) {
            output = 'E-mail введен правильно!';
            /*alert(output);*/
        } else {
            output = 'E-mail введен неправильно!';
            alert(output);
            return false;
        }

        var form = new FormData($('#form_feedback')[0]);


        if (name != '') {
            $.ajax({
                url: '/feedback/feedback/create',
                type: 'post',
                data: form,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    alert(response.message);

                    if (response.result == 'success') {
                        /*form.reset();*/
                        $('#form_feedback').trigger('reset');
                        $('#send_form').trigger('reset');
                        $('.qq-upload-success').remove();
                        $('.fileUp').remove();
                    }
                }
            });
            return false;
        } else {
            alert('Вы не заполнили все поля!');
        }
    });


    $(document).on('submit', '#send_vacancy, #send_feedback', function (e) {
        e.preventDefault();
        var data = $(this).serialize(),
            image = new FormData($(this)[0]);
	    var mess = $(this).attr('id');
        $.ajax({
            url: '/site/send-form',
            type: 'post',
            data: image,
            contentType: false,
            processData: false,
            success: function (response) {
	            if(mess == 'send_vacancy') {
		            if(!$('.brief-massage-active')) {
			            $('#brief__mess').addClass('brief-massage-active');
		            } else {
			            $('#brief__mess').fadeIn(400, function () {
							$(this).css('display','flex');
						});
			            $('#brief__mess').addClass('brief-massage-active');
		            }
		            $('#send_vacancy').trigger('reset');
                }
	            if(mess == 'send_feedback') {
		            if(!$('.brief-massage-active')) {
			            $('#feedback__mess').addClass('brief-massage-active');
		            } else {
			            $('#feedback__mess').fadeIn(400, function () {
							$(this).css('display','flex');
						});
			            $('#feedback__mess').addClass('brief-massage-active');
		            }
		            $('#send_feedback').trigger('reset');
	            }

				$('.itemTitle2').html('');
				$('.itemWrapper[data-id]').remove();

            }
        });
    });

	// close send call-back
	$(document).on('click', '.phone-massage-close', function () {
		$('.phone-brief-overlay').removeClass('phone-massage-active');
		$('body').css('overflow', 'visible')
	});


	/*send phone call_back*/
	$(document).on('submit', '#send_phone', function (e) {
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url: '/site/call-back',
			type: 'post',
			data: data,
			success: function (res) {
				console.log(res.message);
				if(res.result === 'success') {
					$('#send_phone').trigger('reset');
					$('.phone-brief-overlay').addClass('phone-massage-active');
					$('body').css('overflow', 'hidden');
					$.fancybox.close();
				} else {
					alert(res.message);
				}
			}
		});
	});

    $(document).on('click', '.brief-massage-close', function (e) {
	    e.preventDefault();
	    $('.brief-massage').fadeOut();
    });

    $(document).on('click', '.more_portfolio', function (e) {
        e.preventDefault();
        $('#countItems').remove();
        //создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
        var form_data = new FormData();
        var inpage = $('.more_portfolio').data('inpage');
        var count = parseInt($('.more_portfolio').attr('data-page')) + 1;
        $('.more_portfolio').attr('data-page', count);
        form_data.append('inpage', inpage);
        form_data.append('page', count);

        $.ajax({
            url: '/portfolio/portfolio/more',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                var $response = $(response);
                $('.more_portfolio').attr('data-page', count);
                $('.grid_p').append($response).imagesLoaded(function () {
	                $('div.grid-item').removeClass('grid-item_hidden');
	                $('div.sk-fading-circle').removeClass('sk-fading-circle-active');
                    $('.grid_p').masonry('appended', $response, true);
                });
                if ($('#countItems').val() == 0) {
                    $('.more_portfolio').hide();
                }
            }
        });
    });

	$(document).on('click', '.more_blog', function (e) {
		e.preventDefault();
		$('#countItems').remove();
		var page = parseInt($('.more_blog').attr('data-page'));

		$.ajax({
			url: '/blog/blog/more',
			type: 'post',
			data: {page: page},
			success: function (response) {
				var $response = $(response);
				$('.more_blog').attr('data-page', page + 1);
				$('.blog__blocks').append($response)
				$('div.sk-fading-circle').removeClass('sk-fading-circle-active');
				if ($response.length < 6) {
					$('.more_blog').hide();
				}
				if ($('#countItems').val() == 0) {
					$('.more_blog').hide();
				}
			}
		});
	});

});


document.addEventListener('DOMContentLoaded', function(){
	var up = new Uploader();
	up.init({
        btnSelect: '.button_input1',
        itemContainer: '.content_wrapper1',
		fileInput: '.file_input1',
        itemWrapper: '.wrapper_item1',
        itemTitle: '.title_item1',
		btnLoad: '#submit',
        delItem: '.delete_item1',
		maxCount: 10,
		filesExt: ['psd', 'jpg', 'jpeg', 'png', 'gif', 'zip', 'rar', 'pdf', 'doc', 'xls'],
		maxSize: 5,
		itemsCount: 0,
		maxSizeError: function (name, size) {
			document.querySelector('.service__form-files').style.color = 'red';
			console.log('Файл слишком большой', name, Math.round((size / 1024 / 1024)*100)/100 + ' мб.' );
		},
		fileAdded: function (e) {
			document.querySelector('.service__form-files').style.color = 'black';
		}
	});
	up.indexItems();


});

document.addEventListener('DOMContentLoaded', function(){
    var up2 = new Uploader();
    up2.init({
        btnSelect: '.button_input2',
        itemContainer: '.content_wrapper2',
        fileInput: '.file_input2',
        itemWrapper: '.wrapper_item2',
        itemTitle: '.title_item2',
        btnLoad: '#submit2',
        delItem: '.delete_item2',
        maxCount: 10,
        filesExt: ['psd', 'jpg', 'jpeg', 'png', 'gif', 'zip', 'rar', 'pdf', 'doc', 'xls'],
        maxSize: 5,
        itemsCount: 0,
        maxSizeError: function (name, size) {
            document.querySelector('.service__form-files').style.color = 'red';
            console.log('Файл слишком большой', name, Math.round((size / 1024 / 1024)*100)/100 + ' мб.' );
        },
        fileAdded: function (e) {
            document.querySelector('.service__form-files').style.color = 'black';
        }
    });
    up2.indexItems();


});
