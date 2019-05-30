<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
 * @var $services object
* @var $service array
 * @var $match array
 */

use  yii\helpers\Url;
\frontend\assets\SidebarAsset::register($this);
$this->title =  $service['title'];
$img = Url::to('@web/img/');
?>
<!-- start content-service-corp.html-->
<main class="main-service main-service-smm">
	<section class="blog blog__single blog_about service-smm">
		<div class="container">

			<p class="paragraph"><?=$service['title']?></p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?=Url::to('/service')?>">Услуги</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr"><?=$service['title']?></span>
			</nav>

			<div class="wrap wrap-services">
				<h1><?=$service['title']?></h1>
				<div class="service-smm__content">
					<div class="service-smm__main">
						<img class="service-smm__main-img" src="<?=$service['img'] ?? $img.'/imgsmm.png'?>" alt="">
						<p class="store__desc-text"><?=$service['description']?></p>
						<a class="gallery__block-link gallery__block-link_audit" href="<?=Url::to('/portfolio')?>">Посмотреть портфолио</a>
					</div>

					<div class="service-smm__aside">
						<div class="service-smm__gallery">
							<img class="smm-item-img" src="<?=$img?>/ssm-gallery.png" height="210">
							<a class="gallery__block-link" href="#">Посмотреть</a>
						</div>
						<div class="service-smm__other">
							<h3 class="service-smm__other-title">Другие услуги нашей студии</h3>
							<?php foreach ($services as $key => $value):?>
								<div class="other__item other__item_design">
									<div class="other-item-block">
										<span class="other__item_desc"><?=$value->title?></span>
										<a class="gallery__block-link" href="<?=Url::to($value->slug)?>">Посмотреть</a>
									</div>
									<img class="smm-item-img" src="<?=($value->img) ? $value->img : $img.'/service1.png'?>" height="170">
								</div>
							<?php endforeach;?>
						</div>
					</div>
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
					'messageLabel'=>'Сообщение',
                    'upload_file_delete_title' => 'delItem delete_item2',
                    'upload_file_btn_class' => 'btn-input-file button_input2',
                    'upload_file_wrapper_title' => 'itemWrapper wrapper_item2',
                    'upload_file_container_title' => 'itemTitle title_item2',
                    'upload_file_container_id' => 'wrapperCont content_wrapper2',
                    'upload_file_submit_id' => 'submit2',
                    'upload_file_input_class' => 'input-file file_input2'
				]) ?>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
	
</main>
<!-- end content-service-smm.html-->