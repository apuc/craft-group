<?php


use frontend\modules\myths\models\Myths;
use yii\helpers\Url;

/**
 * @var $b_cur object
 * @var $blog array
 * @var Myths[] $myths
 */


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('myths', 'Myths');
$this->params['breadcrumbs'][] = $this->title;
$img = Url::to('@web/img/');
?>
<main class="main-service	">
	<!-- start content-myths.html-->
	<section class="myths-section blog blog__single all-services-section">
		<div class="container">
			<p class="paragraph">развеивание мифов</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Развеивание мифов</span>
			</nav>

			<div class="wrap wrap-services">
				<div class="tittle">
					<span>вся правда о нас</span>
					<h2>и немного больше</h2>
					<p>
						Мы разрабатываем проекты с нуля, а также берем на редизайн
						и развитие сайты, от которых вы хотели бы большего.
					</p>
				</div>

				<div class="all-services">
					<div class="services-bottom">
						<?php $i = 0;
						foreach ($myths as $myth): ?>
							<button class="btn_services" onclick="openService(event, '<?= $myth->slug ?>')"
									id="<?= ($i == 0) ? 'defaultOpen' : ''; ?>">
								<?= $myth->title ?>
							</button>
							<?php $i++; endforeach; ?>
					</div>
					<div class="services-text">
						<?php foreach ($myths as $myth): ?>
							<div id="<?= $myth->slug ?>" class="services_item tittle">
								<p class="services_item-p"><?= $myth->getText() ?></p>
								<a href="<?= Url::to(['single-myths', 'slug' => $myth->slug]) ?>"
								   class="services_item-more vacancies_item-more">Подробнее</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="services-mobile">
					<?php foreach ($myths as $myth): ?>
						<div class="btn_services-mob">
							<h2><?= $myth->title ?></h2>
						</div>
						<div class="services_item-mob flipIn">
							<p class="services_item-p"> <?= $myth->description; ?></p>
							<a href="<?= Url::to(['single-myths', 'slug' => $myth->slug]) ?>"
							   class="services_item-more vacancies_item-more">Подробнее</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- end content-myths.html-->

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