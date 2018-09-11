<?php
/**
 * @var $feedback [] \common\models\Feedback
 */
use yii\helpers\Url;

Yii::setAlias('@files', \yii\helpers\Url::to('/', true) . 'uploads/feedback');
?>

<main class="main-service	">
	<!-- start feedback.html-->
	<section class="service-brief feedback-brief" id="brief">

		<div class="container">
			<div class="brief__head">
				<p class="paragraph">резюме</p>

				<nav class="broadcrumbs">
					<a class="broadcrumbs__link" href="<?= \yii\helpers\Url::to(['/']) ?>">Главная</a>
					<span class="broadcrumbs__divider"> / </span>
					<a class="broadcrumbs__link" href="<?= \yii\helpers\Url::to(['/about']) ?>">О нас</a>
					<span class="broadcrumbs__divider"> / </span>
					<span class="broadcrumbs__curr">Отзывы</span>
				</nav>

				<div class="wrap feedback-wrap">
					<div class="tittle">
						<span>оставьте</span>
						<h2>свой отзыв</h2>
					</div>
				</div>
			</div>
			<div class="brief__content">
				<?= \frontend\components\SendFormWidget::widget([
					'subject' => \frontend\models\SendForm::FEEDBACK,
					'messageLabel' => 'Текст вашего отзыва',
					'messagePlaceholder' => 'Ваш отзыв',
					'textButton' => 'Отправить',
					'fileExtension' => 'jpg, jpeg, png',
					'skypeOrSite' => \frontend\components\SendFormWidget::SITE,
					'fileOrFiles' => \frontend\components\SendFormWidget::FILE
				]) ?>
			</div>

		</div>

	</section>

	<?php $this->render('_feedback', ['feedback' => $feedback]) ?>

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
					'messageLabel' => 'Сообщение',
					'idForm' => 'send_feedback'
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