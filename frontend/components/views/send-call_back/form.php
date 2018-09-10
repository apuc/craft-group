<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.08.18
 * Time: 11:23
 *
 * @var $model \frontend\models\SendCallBack
 * @var $placeholder string
 * @var $messageLabel string
 * @var $textButton string
 * @var $idForm string
 * @var $widget frontend\components\SendCallBackWidget
 *
 */
use frontend\components\SendFormWidget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>
	<div id="phoneMassage" class="fancybox-content">
		<div class="phone-massage">
			<h2>Укажите контактные данные для звонка</h2>
			<p>Наш менеджер по проектам свяжется с вами в течении 10 минут</p>
			<?php $form = ActiveForm::begin([
			//    'action' => \yii\helpers\Url::to(['/site/send-form']),
			    'id' => $widget->idForm,
			    'options' => [
			        'class' => 'phone-massage-form',
			        'enctype' => 'multipart/form-data',
				    'method'=>'post',
			    ],
			]); ?>
				<div class="service__form-head_item phone-massage_item">
					<?= $form->field($model, 'phone')->textInput(['class' => 'service__form_input js_phone-mask phone-massage_input', 'placeholder' => $widget->placeholder, 'autocomplete' => 'off','id' => 'phone'])->label() ?>
					<?= $form->field($model, 'dt_add')->hiddenInput(['value'=> time()])->label(false);?>
				</div>
				<div class="phone-massage-submite">
					<a href='#phoneBrief' rel="nofollow" class="phone-massage-btn js_phoneMassage">
						<?=$widget->textButton?>
					</a>
<!--					--><?php//= Html::submitButton($widget->textButton, ['class' => 'phone-massage-btn js_phoneMassage']);?>
					<div class='sk-fading-circle'>
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
				</div>
			<?php ActiveForm::end(); ?>
			<p class="service__form-desc_span">Нажимая кнопку «Отправить» я даю свое <br><span class="service__form-desc_red">согласие на обработку персональных данных</span>
			</p>
		</div>
	</div>
	<div id="phoneBrief" class="fancybox-content">
		<div class="phone-brief-massage">
			<img src="/img/massage_success.png">
			<h2>Ваш номер отправлен!</h2>
			<p>Ожидайте, скоро мы с вами свяжемся.</p>
			<p>А пока вы можете посмотреть <a href="<?=Url::to(['/portfolio'])?>">наши работы</a></p>
		</div>
	</div>