<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var $portfolio array
 * @var $title string
 * @var $count integer
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start content-portfolio.html-->
<main class="main-portfolio">

	<section class="blog blog__single" id="blog">
		<div class="container">

			<p class="paragraph">наши работы</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Портфолио</span>
			</nav>

			<div class="wrap wrap-services">
				<div class="tittle">
					<span>актуальные </span>
					<h2>работы</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="wrapper">
<!--					<div class="grid-preloader">-->
<!--						<svg viewBox="0 0 1000 200">-->
<!--							<!-- Symbol-->
<!--							<symbol id="s-text">-->
<!--								<text text-anchor="middle" x="50%" y="50%" dy=".35em">Craft Group</text>-->
<!--							</symbol>-->
<!--							<!-- Duplicate symbols-->
<!--							<use class="text" xlink:href="#s-text"></use>-->
<!--							<use class="text" xlink:href="#s-text"></use>-->
<!--							<use class="text" xlink:href="#s-text"></use>-->
<!--						</svg>-->
<!--<!--						<p class="text-preloader">Загружаем галерею</p>-->
<!--					</div>-->

					<div class="grid_p">
						<?php if($portfolio):?>
							<?php $i = 0; foreach ($portfolio as $key => $value):?>
								<?php if($i <= $count - 1):?>
									<div class="grid-item">
										<div class="photoGrid">
											<img class="grid-item__img" src="/img/ballon.png" alt="Шарик">
										</div>
										<span>
											<img src="<?=$img?>full-size.svg" width="20" height="20" alt="">
										</span>
										<div class="grid-item__links">
											<a class="dotportfolio" href="<?=Url::to(['single-portfolio', 'slug' => $value['slug']])?>"><?=$value['title']?></a>
											<a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/" data-pin-custom="true"><img src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png" style="width: 25px; height: 25px;"></a>
										</div>
									</div>
								<?php $i++; endif;?>
							<?php endforeach;?>
						<?php endif;?>
					</div>
				</div>

				<button type="button" class="more_btn" id="curButton"  data-inpage="<?=$count?>"  data-page="1">Загрузить ещё</button>
			</div>

		</div>
	</section>

	<!-- start brief.html-->
	<section class="service-brief" id="brief">

		<div class="container">
			<div class="brief__head">
				<p class="paragraph">наш бриф</p>
				<div class="wrap">
					<div class="tittle">
						<span class="block_span_title">закажите</span>
						<h2 class="block_title">услугу</h2>
						<p>
							Перестаньте платить деньги за процесс. Получите гарантированный результат.
						</p>
					</div>
				</div>
			</div>
			<div class="brief__content">
				<?= \frontend\components\SendFormWidget::widget([
					'subject' => \frontend\models\SendForm::USULUGI,
					'isLabels' => true,
					'messageLabel'=>'Сообщение'
				]) ?>
				<div class="brief-massage">
					<button class="brief-massage-close">
						<span></span>
						<span></span>
					</button>
					<img src="/img/massage_success.png">
					<h2>Бриф отправлен!</h2>
					<p>Ожидайте, скоро мы с вами свяжемся.</p>
					<p>А пока вы можете посмотреть <a href="<?= Url::toRoute(['/portfolio']); ?>">наши работы</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>
<!-- end content-portfolio.html-->