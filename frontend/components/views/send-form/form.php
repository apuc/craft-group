<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.08.18
 * Time: 11:23
 *
 * @var $model \frontend\models\SendForm
 * @var $isLabels bool
 * @var $messagePlaceholder string
 * @var $messageLabel string
 * @var $textButton string
 * @var $idForm string
 * @var $widget frontend\components\SendFormWidget
 *
 */
use frontend\components\SendFormWidget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
//    'action' => \yii\helpers\Url::to(['/site/send-form']),
	'id' => $widget->idForm,
	'options' => [
		'class' => 'service__form',
		'enctype' => 'multipart/form-data'
	],
	'validationUrl' => Url::to(['/site/validate']),
	'enableAjaxValidation' => true

]); ?>
	<div class="service__form-head">

		<?= $form->field($model, 'subject', [
			'options' => [
				'class' => 'service__form-head_item hidden', 'style' => 'display:none'
			]
		])->hiddenInput()->label(false) ?>

		<?= $form->field($model, 'name', [
			'options' => [
				'class' => 'service__form-head_item'
			]
		])->textInput(['class' => 'service__form_input', 'placeholder' => 'Ваше имя'])->label() ?>

		<?= $form->field($model, 'phone', [
			'options' => [
				'class' => 'service__form-head_item',
			]
		])->textInput(['class' => 'service__form_input js_phone-mask', 'placeholder' => 'Номер телефона'])->label() ?>

		<?= $form->field($model, 'email', [
			'options' => [
				'class' => 'service__form-head_item'
			]
		])->textInput(['class' => 'service__form_input', 'placeholder' => 'Ваш e-mail'])->label() ?>

		<?= $form->field($model, $widget->field, [
			'options' => [
				'class' => 'service__form-head_item'
			]
		])->textInput(['class' => 'service__form_input', 'placeholder' => $model->attributeLabels()[$widget->field]])->label() ?>

	</div>

<?php if ($widget->isLabels): ?>
	<?= $this->render('_labels', [
		'form' => $form,
		'model' => $model
	]); ?>
<?php endif ?>
	<div class="service__form-message" lang="ru">
		<?= $form->field($model, 'message', [
			'options' => [
				'class' => 'service__form-textarea'
			]
		])->textarea(['placeholder' => $widget->messagePlaceholder])->label($widget->messageLabel) ?>
		<div class="service__form-file">
			<div class="btn-file__wrap">
				<?php if ($widget->fileOrFiles == SendFormWidget::FILES): ?>
					<?= $form->field($model, $widget->fileOrFiles)->fileInput(['multiple' => true, 'class' => 'input-file'])->label(false) ?>
				<?php elseif ($widget->fileOrFiles == SendFormWidget::FILE): ?>
					<?= $form->field($model, $widget->fileOrFiles)->fileInput(['class' => 'input-file'])->label(false) ?>
				<?php endif; ?>
				<div class="btn-input-file">
					<img src="img/clip-black.png" alt="" width="25" height="25">
					<span>Прикрепить файл</span>
				</div>
			</div>
			<span class="service__form-files"><?= $widget->fileExtension ?></span>
			<div id="wrapperCont">
				<div class="itemWrapper" style="display: inline-flex;">
					<div class="delItem">
						<span></span>
						<span></span>
					</div>
					<div class="itemTitle"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="service__form-desc">
                        <span class="service__form-desc_span">Нажимая кнопку «Отправить» я даю свое <span
								class="service__form-desc_red">согласие на обработку персональных данных</span></span>
		<div class="service__submit-block">
			<input class="service__form-submit" id="submit" type="submit" value="<?= $widget->textButton ?>">
			<div class="sk-fading-circle">
				<div class="sk-circle sk-circle-1"></div>
				<div class="sk-circle sk-circle-2"></div>
				<div class="sk-circle sk-circle-3"></div>
				<div class="sk-circle sk-circle-4"></div>
				<div class="sk-circle sk-circle-5"></div>
				<div class="sk-circle sk-circle-6"></div>
				<div class="sk-circle sk-circle-7"></div>
				<div class="sk-circle sk-circle-8"></div>
				<div class="sk-circle sk-circle-9"></div>
				<div class="sk-circle sk-circle-10"></div>
				<div class="sk-circle sk-circle-11"></div>
				<div class="sk-circle sk-circle-12"></div>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>
<div class="brief-massage" id="<?= $widget->id_answer ?>">
	<button class="brief-massage-close">
		<span></span>
		<span></span>
	</button>
	<img src="/img/massage_success.png">
	<h2><?= $widget->answer ?></h2>
	<p>Ожидайте, скоро мы с вами свяжемся.</p>
	<p>А пока вы можете посмотреть <a href="<?= Url::toRoute(['/portfolio']); ?>">наши работы</a></p>
</div>
