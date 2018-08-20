$(function() {
	$(document).on('click', '.js_openLocationModal', function() {
		$('.js_locationModal').fadeIn(400).css('display', 'flex');
	});

	$(document).on('click', '.js_modalClose', function() {
		$('.modal').fadeOut(400);
	});

	$(document).on('mouseenter', '.js_showCategoryList', function() {
		$(this).find('.header__dropdown').slideDown(0).css('display', 'flex');
	});

	$(document).on('mouseleave', '.js_showCategoryList', function() {
		$(this).find('.header__dropdown').slideUp(0);
	});

	$(document).on('click', '.js_nextCategories', function() {
		$('.header__category_hidden').css('display', 'block');
		$(this).toggleClass('.rotateCategoryBtn');
	})
})