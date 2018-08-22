<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
* @var $blog array
 * @var $slider array
 * @var $all object
 */


use yii\helpers\Url;
use common\models\BlogSlider;

$this->title =  $blog['title'];
$img = Url::to('@web/img/');
?>

<!-- start content-blog.html-->
<main>
	<!-- start single-blog.html-->
	<main class="single-post">
		<section class="blog blog__single" id="blog">
			<div class="container">

				<p class="paragraph">наш блог</p>

				<nav class="broadcrumbs">
					<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
					<span class="broadcrumbs__divider"> / </span>
					<a class="broadcrumbs__link" href="<?=Url::to(['/blog'])?>">Блог</a>
					<span class="broadcrumbs__divider"> / </span>
					<span class="broadcrumbs__curr"><?=$blog['title']?></span>
				</nav>

				<div class="wrap wrap-services">

					<h1 class="blog-single-title"><?=$blog['h1']?></h1>
					<div class="blog-single__content">
						<div class="blog-single__main">
							<img class="blog-single__main-img" src="<?=$blog['file']?>" alt="">
							<div class="blog-single__text">
								<?=$blog['description']?>
							</div>
						</div>
						<div class="blog-single__aside">
							<?php if($all):?>
								<div class="blog-single__gallery">
									<img class="blog-item-img" src="<?=$all->file?>" height="210"?>
									<a class="blog__link" href="<?=Url::to(['/blog']);?>"><?=$all->title?></a>
								</div>
							<?php endif;?>
							<div class="blog-single__other">
								<h3 class="blog-single__other-title">Другие новости</h3>
								<?php $i=0; foreach ($slider as $key => $value):?>
									<?php if( $value['options'] && $i < 4):?>
										<div class="blog__item blog__item_design blog__slider--slide">
											<img src="<?=$value['file']?>">
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
								<?php $i++; endforeach;?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
	</main>
	<!-- end single-blog.html-->
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
					'message'=>'Сообщение'
				]) ?>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>
<!-- end content-blog.html-->
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
				
				<?php if($all):?>
					<div class="blog__block-link_main">
						<img src="<?=$all->file?>"?>
						<a class="blog__link" href="<?=Url::to(['/blog']);?>"><?=$all->title?></a>
					</div>
				<?php endif;?>
				<div class="blog__slider--wrap">
					<?php foreach ($slider as $key => $value):?>
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

	<img src="<?=Url::to($img.'balloon.png');?>" alt="" class="balloon">
	<p class="fill-brief">Покорить вершины легко!</p>
</section>
<!-- end blog.html-->