<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $about array
* @var $title string
 * @var $service object
 * @var $feedback array
 * @var $b_cur object
 * @var $blog array
 */
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- start content-about.html-->
<main class="main-about">
	<section class="blog blog__single blog_about">
		<div class="container">

			<p class="paragraph">о нас</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">О нас</span>
			</nav>

			<div class="wrap about-wrap">
				<div class="about">
					<div class="tittle">
						<span>немного</span>
						<h2><?=$about[0]['title']?></h2>
						<p>
							<?=$about[0]['description']?>
						</p>
					</div>

					<div class="about__content">
						<div class="key">
							<div class="key__head">
								<h2 class="key__title">Ключевые</h2>

								<div class="key__head-sub">
									<h3 class="key__sub-title"><span class="red-letter">У</span>слуги</h3>
									<h3 class="key__sub-title"><span class="red-letter">К</span>омпании</h3>
								</div>
							</div>
							<ul class="key__desc">
								<?php foreach ($service as $key => $value):?>
									<li>
										<a class="key__desc-link" href="<?=Url::to(['/service/'.$value->slug])?>">
											<?=$value->title?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>

							<a href="<?=Url::to(['/service'])?>" class="red_btn">Посмотреть все услуги</a>
						</div>

						<div class="pros">
							<h2 class="pros__title">3 наших основных преимущества</h2>
							<ul class="pros__desc">
<!--								--><?php //foreach ($list as $key => $value):?>
<!--									--><?php //if(!empty($value)):?>
<!--										<li class="pros__element">-->
<!--											--><?php //$value = str_replace('<li>', '', $value);
//											$value = str_replace('</li>', '', $value);
//											$value = str_replace('<ul>', '', $value);
//											$value = str_replace('</ul>', '', $value);?>
<!--											<img src="img/icons/results-icon1.png" alt="">-->
<!--											<span class="pros__text">--><?//=$value?><!--</span>-->
<!--										</li>-->
<!--									--><?php //endif;?>
<!--								--><?php //endforeach;?>
								<?=$about[0]['file']?>
							</ul>
						</div>
					</div>
				</div>

				<div class="feedback">
					<div class="tittle">
						<span>Отзывы</span>
						<h2>наших клиентов</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut atque eum, deserunt dolores, veritatis voluptatem sunt cum voluptas porro eaque temporibus voluptatibus obcaecati laudantium placeat a sed. Debitis, doloremque, voluptatibus?
						</p>
					</div>

					<div class="feedback__content">
						<div class="feedback__social">
							<div class="soc__block soc__vk">
								<div class="soc__icon">
									<a href="https://vk.com"><img src="img/vk.svg" width="19" height="19" alt=""></a>
								</div>

								<div class="soc__desc">
									<?php
									$vk = preg_match_all('|<div class="vk">(.*)</div>|isU', $about[1]['file'], $match);
									?>
									<?=$match[1][0];?>
								</div>
							</div>

							<div class="soc__block soc__be">
								<div class="soc__icon">
									<a href="#"><img src="img/be-p.png" alt=""></a>
								</div>

								<div class="soc__desc">
									<?php
									$behance = preg_match_all('|<div class="behance">(.*)</div>|isU', $about[1]['file'], $match);
									?>
									<?=$match[1][0];?>
								</div>
							</div>

							<div class="soc__block soc__ussr">
								<div class="soc__icon">
									<a href="#"><img src="img/sickle-and-hammer.svg" width="19" height="19" alt=""></a>
								</div>

								<div class="soc__desc">
									<?php
									$else = preg_match_all('|<div class="else">(.*)</div>|isU', $about[1]['file'], $match);
									?>
									<?=$match[1][0];?>
								</div>
							</div>
						</div>

						<div class="feedback__slider">
							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="partners">
					<div class="tittle">
						<?=$about[2]['h1']?>
						<p>
							<?=$about[2]['description']?>
						</p>
					</div>

					<div class="partners__blocks">
						<?php
						$img = explode('%', $about[2]['file']);
						foreach ($img as $key => $value):?>
							<div class="partners__block"><?=$value?></div>
						<?php endforeach;?>
					</div>
				</div>

				<div class="vacancies">
					<div class="tittle">
						<span>Мы растём</span>
						<?=$about[3]['h1']?>
						<p>
							<?=$about[3]['description']?>
						</p>
					</div>

					<div class="vacancies__content">
						<ul class="vacancies__list">
							<li class="vacancies__vacancy">
								<img class="vacancies__vacancy-img" src="img/icons/results-icon2.png" width="30" height="30" alt="">
								<?php preg_match_all('|<div class="vacancies__vacancy">(.*)</div>|isU', $about[3]['file'], $match); ?>
								<p class="vacancies__vacancy-text"><?=$match[1][0]?></p>
							</li>

							<li class="vacancies__vacancy vacancies__vacancy_actual">
								<h4 class="vacancies__vacancy-title">Копирайтер</h4>

								<ul class="vacancies__actual">
									<?php $text = preg_match_all('|<div class="vacancies__actual">(.*)</div>|isU', $about[3]['file'], $match);
									$list  = (explode(',' , $match[1][0]));
									?>
									<?php foreach ($list as $key => $value):?>
										<li class="vacancies__vacancy-text_grey"><?=$value?></li>
									<?php endforeach;?>
								</ul>
							</li>

							<li class="vacancies__vacancy">
								<img class="vacancies__vacancy-img" src="img/icons/results-icon2.png" width="30" height="30" alt="">
								<?php preg_match_all('|<div class="vacancies__vacancy_n">(.*)</div>|isU', $about[3]['file'], $match);?>
								<p class="vacancies__vacancy-text"><?=$match[1][0]?></p>
							</li>
						</ul>

						<div class="vacancies__send">
							<img class="vacancies__send-img" src="img/man.png" width="147" height="219" alt="">

							<div class="vacancies__desc">
								<?php preg_match_all('|<div class="vacancies__desc_h2">(.*)</div>|isU', $about[3]['file'], $match); ?>
								<h2 class="vacancies__desc-title"><?=$match[1][0]?></h2>
								<?php preg_match_all('|<div class="vacancies__desc_p">(.*)</div>|isU', $about[3]['file'], $match); ?>
								<p class="vacancies__desc-comment"><?=$match[1][0]?></p>
								<a class="red_btn red_btn_hidden" href="#">Посмотреть все вакансии</a>
							</div>
							<?php preg_match_all('|<div class="vacancies__href">(.*)</div>|isU', $about[3]['file'], $match); ?>
<!--							<a class="red_btn red_btn_shown" href="#">Посмотреть все вакансии</a>-->
							<?=$match[1][0]?>

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
<!-- end blog.html-->