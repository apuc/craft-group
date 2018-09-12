<?php
use  yii\helpers\Url;

/* @var $this yii\web\View
 * @var \frontend\modules\portfolio\models\Portfolio[] $portfolio
 * @var $title string
 * @var $count integer
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
\frontend\assets\PortfolioAsset::register($this);
?>
<!-- start content-portfolio.html-->
<main class="main-portfolio">

	<section class="blog blog__single" id="blog">
		<div class="container">

			<p class="paragraph">наши работы</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
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

				<?= $this->render('_portfolio', [
					'portfolio' => $portfolio,
					'count' => $count
				]) ?>

				<button type="button" class="more_btn" id="curButton" data-inpage="<?= $count ?>" data-page="1">
					Загрузить ещё
					<div class='sk-fading-circle sk-fading-circle-position'>
						<div class='sk-circle sk-circle-1'></div>
						<div class='sk-circle sk-circle-2'></div>
						<div class='sk-circle sk-circle-3'></div>
						<div class='sk-circle sk-circle-4'></div>
						<div class='sk-circle sk-circle-5'></div>
						<div class='sk-circle sk-circle-6'></div>
						<div class='sk-circle sk-circle-7'></div>
						<div class='sk-circle sk-circle-8'></div>
						<div class='sk-circle sk-circle-9'></div>
						<div class='sk-circle sk-circle-10'></div>
						<div class='sk-circle sk-circle-11'></div>
						<div class='sk-circle sk-circle-12'></div>
					</div>
				</button>
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
<!-- end content-portfolio.html-->