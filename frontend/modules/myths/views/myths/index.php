<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\BlogSlider;
use yii\helpers\Url;

/**
 * @var $b_cur object
 * @var $blog array
 * @var $myths
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
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
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
						<?php $i=0; foreach ($myths as $myth):?>
							<button class="btn_services" onclick="openService(event, '<?=$myth->slug?>')"  id="<?=($i == 0) ? 'defaultOpen':'';?>">
								<?=$myth->title?>
							</button>
						<?php $i++; endforeach;?>
					</div>
					<div class="services-text">
						<?php foreach ($myths as $myth):?>
							<div id="<?=$myth->slug?>" class="services_item tittle">
								<p class="services_item-p"><?=$myth->description?></p>
							</div>
						<?php endforeach;?>
					</div>
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
							Перестаньте платить деньги за процесс. Получите гарантированный.
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
			</div>
		</div>
	</section>
	<!-- end brief.html-->

	<!-- start blog.html-->
	<section class="brief brief_footer blog" id="blog">
		<div class="container">

			<p class="paragraph paragraph-blog">наш блог</p>

			<div class="wrap">

				<div class="tittle">
					<span class="block_span_title">актуальное </span>
					<h2 class="block_title">в нашем блоге</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="blog__slider-content">
					
					<?php if($b_cur):?>
						<div class="blog__block-link_main">
							<img src="<?=$b_cur->file?>"?>
							<a class="blog__link" href="<?=Url::to(['/blog']);?>"><?=$b_cur->title?></a>
						</div>
					<?php endif;?>
					<div class="blog__slider--wrap">
						<?php foreach ($blog as $key => $value):?>
							<?php if( $value['options']):?>
								<div class="blog__slider--slide">
									<img src="<?=$value['file']?>"?>
									<div class="slide__title">
										<h3 class="slide__post-title"><?=$value['title']?></h3>
										<time class="slide__post-time"><?=$value['date'] = BlogSlider::getTime(strtotime($value['date']));?></time>
									</div>
									<div class="slide__hover">
										<span class="dotdot"><?=$value['description']?></span>
										<a href="<?=Url::to(['/blog', 'slug' => $value['slug']])?>">Читать далее</a>
									</div>
								</div>
							<?php endif;?>
						<?php endforeach;?>
					</div>

				</div>

			</div>

		</div>

		<div class="animate-circle"></div>

		<img src="<?=Url::to('img/balloon.png');?>" alt="" class="balloon">
		<p class="fill-brief">Покорить вершины легко!</p>
	</section>
	<!-- end blog.html-->
</main>