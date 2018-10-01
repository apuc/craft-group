/*Masonry*/
$('.grid').imagesLoaded(function () {
	$('.grid').masonry({
		itemSelector: '.feedback-item',
		percentPosition: true
	});
});

$('.grid_p').imagesLoaded(function () {
	$('.grid-preloader').css('display', 'none');
	$('.grid_p, .more_btn').css('display', 'block');

	$('.grid_p').masonry({
		itemSelector: '.grid-item',
		// columnWidth: '.grid-sizer',
		percentPosition: true
	});
});