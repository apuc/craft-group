<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $service array
* @var $title string
* @var $feedback object
 **/

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
$services = [];
foreach ($service as $key => $value) {
	$services[$value['id']] = $value['title'];
}

?>
<!-- start content-feedback.html-->
<main class="main-feedback">
	<section class="blog blog__single blog_feedback">
		<div class="container">

			<p class="paragraph">отзывы</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Отзывы</span>
			</nav>

			<div class="wrap">
				<div class="tittle">
					<span>отзывы </span>
					<h2>наших клиентов</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="brief__content brief__content_feedback">
					<p class="feedback-form__title">Оставить свой отзыв</p>
					
					<?php $form = ActiveForm::begin(['method' => 'post','id' => 'form_feedback', 'options' => ['class'=> 'brief__form form__feedback', 'enctype' => 'multipart/form-data']]); ?>
					<div class="brief__form-message brief__form-message_nomargin" lang="ru">
						<?= $form->field($model, 'description')->textArea(['placeholder'=>'Ваше сообщение','maxlength' => true, 'id'=>'message_feedback', 'class'=>'', 'required'=> false])->label('Текст вашего отзыва') ?>

					</div>
					<div class="brief__form-head brief__form-head_feedback">
						<?= $form->field($model, 'name')->textInput(['placeholder'=>'Ваше имя','maxlength' => true, 'id'=>'name_feedback', 'class'=>'', 'required'=> true])->label('Ваше имя, фамилия *') ?>
						
						
						<?= $form->field($model, 'site')->textInput(['placeholder'=>'Адрес вашего сайта','maxlength' => true, 'id'=>'site_feedback', 'class'=>'', 'required'=> true])->label('Адрес вашего сайта *') ?>
						
						
						<?= $form->field($model, 'email')->textInput(['placeholder'=>'Ваш e-mail','maxlength' => true, 'id'=>'mail_feedback', 'class'=>'', 'required'=> true])->label('Ваш e-mail *') ?>
						
						
						<?= $form->field($model, 'city')->textInput(['placeholder'=>'Ваш город','maxlength' => true, 'id'=>'city_feedback', 'class'=>'', 'required'=> false])->label('Ваш город') ?>
						
						<?=$form->field($model, 'category')->dropDownList($services,
							['prompt' => 'Выберите услугу']);?>
						
						<?=$form->field($model, 'date')->hiddenInput(['value' => date('Y-m-d H:m:i')])->label(false);?>
						<?= $form->field($model, 'h1')->hiddenInput(['maxlength' => true])->label(false); ?>
						<?= $form->field($model, 'meta_key')->hiddenInput(['maxlength' => true])->label(false); ?>
						<?= $form->field($model, 'meta_desc')->hiddenInput(['maxlength' => true])->label(false); ?>
						<?= $form->field($model, 'file')->hiddenInput(['multiple' => true, 'rows' => 6])->label(false); ?>
						<?php if(!empty($model->logo)){
							echo Html::img($model->logo, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);
						} ?>
						<?= $form->field($model, 'href')->hiddenInput(['rows' => 6])->label(false); ?>
						<?= $form->field($model, 'status')->hiddenInput(['value'=>0])->label(false); ?>
					</div>
					
					<?= $form->field($model, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(Yii::t('feedback', 'File')); ?>
					
					<div class="brief__form-desc">
						<p><span>*</span> обязательные поля</p>
						<div class="form-group">
							<?= Html::submitButton(Yii::t('feedback', 'Send feedback'), ['class' => 'btn btn-success' , 'id' => 'submit_feedback']) ?>
						</div>
					</div>
				</div>
				<?php ActiveForm::end(); ?>

				<div class="feedbacks">
					<h2 class="feedbacks__title">Благодарные отзывы наших клиентов</h2>

					<div class="wrapper">
						<div class="grid grid_feedback">
							<?php if($feedback):?>
								<?php foreach ($feedback as $key => $value):?>
									<div class="feedback-item">
										<header class="feedback-item__header">
											<div class="feedback-item__site">
												<a class="feedback-item__site-link" href="#"><?=$value->site?></a>
											</div>
		
											<div class="feedback-item__name">
												<p class="feedback-item__name-text"><?=$value->name?> (<?=$value->city?>)</p>
											</div>
										</header>
		
										<div class="feedback-item__content">
											<div class="feedback-item__desc">
												<p class="feedback-item__text"><?=$value->description?></p>
												<?php if(explode(',' , $value->file)):?>
													<?php
													$file = explode(',' , $value->file);
													foreach ($file as $k => $val):?>
														<img src="<?=$val?>">
													<?php endforeach;?>
												<?php else:?>
													<img src="<?=$value->file?>">
												<?php endif;?>
											</div>
		
											<div class="feedback-item__from">
												<a class="feedback-item__from-link" href="https://vk.com"><img class="feedback-item__from-img feedback-item__from-img_vk" src="img/vk.svg" alt="">отзыв в группе VK</a>
											</div>
										</div>
									</div>
								<?php endforeach?>
							<?php endif;?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
