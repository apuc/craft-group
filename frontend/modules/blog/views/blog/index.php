<?php

use yii\helpers\Html;
use  yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var \frontend\modules\blog\models\Blog[] $blog
 * @var $title string
 * @var $b_cur object
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start blog-page.html-->
<main class="all-news">
	<section class="blog blog__single" id="blog">
		<div class="container">

			<p class="paragraph">наш блог</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Блог</span>
			</nav>

			<div class="wrap wrap-services">

				<div class="tittle">
					<span>актуальное </span>
					<h2>в нашем блоге</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="blog__blocks">
					<?php foreach ($blog as $key => $value): ?>
						<?php if ($value->h1 !== 'current'): ?>
							<article class="blog__block">
								<div class="blog__block-wrap">
									<a href="<?= Url::to(['single-blog', 'slug' => $value->slug]) ?>">
										<!--										--><?php //preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $value['file'], $matches);
										//										$imgSrc = $matches[1];?>
										<img class="blog__block-img" src="<?= $value->file ?>" alt="">
									</a>

									<h2 class="blog__block-title">
										<a class="blog__block-link dotdot"
										   href="<?= Url::to(['single-blog', 'slug' => $value->slug]) ?>"><?= $value->title ?></a>
									</h2>

									<p class="blog__block-text"><?= $value->meta_desc ?></p>
								</div>

								<footer class="blog__block-footer">

									<time
										class="blog__block-time"><?= BlogSlider::getTime(strtotime($value->date)); ?></time>
									<a class="blog__block-more"
									   href="<?= Url::to(['single-blog', 'slug' => $value->slug]) ?>">
										<span>Читать далее</span>
										<span class="blog__block-arrow"></span>
									</a>
								</footer>
							</article>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>

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
					'messageLabel' => 'Сообщение'
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