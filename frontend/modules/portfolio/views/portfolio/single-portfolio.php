<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
* @var $portfolio array
 * @var $b_cur object
 * @var $blog array
 */


use  yii\helpers\Url;
use common\models\BlogSlider;

$this->title =  $portfolio['title'];
$img = Url::to('@web/img/');
?>
<main class="main__single-p">
	<section class="blog blog__single" id="blog">
		<div class="container">
			
			<p class="paragraph">наши работы</p>
			
			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?=Url::to('/portfolio')?>">Портфолио</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr"><?=$portfolio['title']?></span>
			</nav>

			<div id="main-content" class="wrap single-p main">
				<div id="content" class="single-p__layout content">
					<a class="single-p__fancybox" href="<?=$portfolio['file']?>" data-fancybox="images" data-caption="
                        <div class='portfolio__block-caption'>
                            <span><?=$portfolio['title']?> </span>
<!--                            <a href='#'>Смотреть работу на <span class='gradient'>behance.ru</span></a>-->
                        </div">
						
						<img src="<?=$portfolio['file']?>" alt="">
					</a>
				</div>

				<div id="sidebar" class="single-p__desc sidebar">
					<div class=" sidebar__inner">
						<h2 class="single-p__title"><?=$portfolio['h1']?></h2>
						<p class="single-p__text"><?=$portfolio['description']?></p>
						<?php $href = explode(',' , $portfolio['href']);?>
						<?php if(!empty($href)):?>
							<div class="single-p__soc">
								<?php if(!empty($href[0])):?>
									<div class="soc__block soc__be">
										<div class="soc__icon">
											<a href="<?=$href[0]?>">
												<img src="<?=$img?>be-p.png" alt="">
											</a>
										</div>
										
										<div class="soc__desc">
											<p>Наша работа на</p>
												<?=\yii\helpers\Html::a('www.behance.net', $href[0],['target'=>'_blank'])?>
										</div>
									</div>
								<?php endif;?>
								<?php if(!empty($href[1])):?>
									<div class="soc__block soc__pin">
										<div class="soc__icon">
											<a href="<?=$href[1]?>">
												<img src="<?=$img?>pinterest.png" alt="">
											</a>
										</div>
										
										<div class="soc__desc">
											<p>Наша работа на</p>
												<?=\yii\helpers\Html::a('www.pinterest.com', $href[1],['target'=>'_blank'])?>
										</div>
									</div>
								<?php endif;?>
							</div>
						<?php endif;?>
						
						<div class="single__order">
							<?= \common\models\KeyValue::getValue('single_portfolio')?>
							
							<a href="#brief" class="order__btn scroll">Заказать</a>
						</div>
						<?php if($portfolio['stock']):?>
							<div class="single-p__stock">
								<h3 class="stock__title">
									<img src="<?=$img?>stock.png" alt=""><span class="stock__red">Акция!</span>
								</h3>
								<?=$portfolio['stock']?>
							</div>
						<?php endif;?>
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
</main>

<!-- end content-single-portfolio.html-->

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

	<img src="<?=Url::to($img.'balloon.png');?>" alt="" class="balloon">
	<p class="fill-brief">Покорить вершины легко!</p>
</section>
<!-- end blog.html-->