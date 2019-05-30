<?php
/**
 * @var $feedback [] \common\models\Feedback
 */
use frontend\components\FeedbackWidget;
use yii\helpers\Url;

?>

<main class="main-service	">
	<!-- start feedback.html-->
	<section class="service-brief feedback-brief" id="brief">

		<div class="container">
			<div class="brief__head">
				<p class="paragraph">оставить отзыв</p>

				<nav class="broadcrumbs">
					<a class="broadcrumbs__link" href="<?= \yii\helpers\Url::to(['/']) ?>">Главная</a>
					<span class="broadcrumbs__divider"> / </span>
					<a class="broadcrumbs__link" href="<?= \yii\helpers\Url::to(['/about']) ?>">О нас</a>
					<span class="broadcrumbs__divider"> / </span>
					<span class="broadcrumbs__curr">Отзывы</span>
				</nav>

				<div class="wrap feedback-wrap">
					<div class="tittle">
						<span>оставь</span>
						<h2>свой отзыв</h2>
					</div>
				</div>
			</div>
			<div class="brief__content">
				<?= \frontend\components\SendFormWidget::widget([
					'subject' => \frontend\models\SendForm::FEEDBACK,
					'messageLabel' => 'Отзыв',
					'messagePlaceholder' => 'Введи текст...',
					'textButton' => 'Отправить',
                    'upload_file_delete_title' => 'delItem delete_item1',
                    'upload_file_submit_id' => 'submit',
                    'upload_file_btn_class' => 'btn-input-file button_input1',
                    'upload_file_wrapper_title' => 'itemWrapper wrapper_item1',
                    'upload_file_container_title' => 'itemTitle title_item1',
					'upload_file_container_id' => 'wrapperCont content_wrapper1',
                    'upload_file_input_class' => 'input-file file_input1',
					'fileExtension' => 'jpg, jpeg, png',
					'skypeOrSite' => \frontend\components\SendFormWidget::SITE,
					'fileOrFiles' => \frontend\components\SendFormWidget::FILE,
					'idForm' => 'send_feedback',
					'id_answer' => 'feedback__mess',
					'answer' => 'Отзыв отправлен!',
				]) ?>
			</div>
		</div>
	</section>

	<?php echo FeedbackWidget::widget() ?>

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
					'upload_file_delete_title' => 'delItem delete_item2',
					'upload_file_btn_class' => 'btn-input-file button_input2',
                    'upload_file_wrapper_title' => 'itemWrapper wrapper_item2',
					'upload_file_container_title' => 'itemTitle title_item2',
                    'upload_file_container_id' => 'wrapperCont content_wrapper2',
                    'upload_file_submit_id' => 'submit2',
					'upload_file_input_class' => 'input-file file_input2',
					'messageLabel' => 'Сообщение',
					'idForm' => 'send_vacancy'
				]) ?>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>