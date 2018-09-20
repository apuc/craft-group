<?php

use common\models\About;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var About[] $about
 * @var $title string
 * @var $feedback object
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
				<a class="broadcrumbs__link" href="<?= Url::to('/') ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">О нас</span>
			</nav>

			<div class="wrap about-wrap">
				<div class="about">
					<div class="tittle">
						<span>немного</span>
						<h2><?= $about[0]->title ?></h2>
						<p>
							<?= $about[0]->description ?>
						</p>
					</div>

					<div class="about__content">
						<div class="key">
							<img src="/img/about_new.png">
						</div>

						<div class="pros">
							<h2 class="pros__title">3 наших преимущества</h2>

							<ul class="pros__desc">
								<li class="pros__element">
									<img src="img/about_new_item_1.png" alt="">
									<span class="pros__text"><strong>Клиент наш партнёр.</strong> В каждом проекте схема работы над продуктом не изменна. Мы слаженно работаем вместе с клиентом, одной командой. Только так мы можем понять, что именно вы хотите и предложить лучшее решение.</span>
								</li>

								<li class="pros__element">
									<img src="img/about_new_item_2.png" alt="">
									<span class="pros__text"><strong>Высокая компетенция. </strong>Мы выполняем проекты различной степени сложности. Ведь чем сложнее проект, тем больше современных технологий мы используем, а значит, тем интереснее для нас задача.</span>
								</li>

								<li class="pros__element">
									<img src="img/about_new_item_3.png" alt="">
									<span class="pros__text"><strong>Гарантия качества. </strong> Мы знаем, как важны для наших клиентов качество и сроки выполнения работ, поэтому всегда соблюдаем свои обязательства и делаем чуть больше, чем обещано в договоре.</span>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?= \frontend\components\FeedbackWidget::widget()?>

	<section class="blog blog__single partners-block">
		<div class="container">

			<p class="paragraph">партнеры</p>
			
			<div class="wrap about-wrap">
				<div class="partners">
					<div class="tittle">
						<span>Серьёзные</span>
						<h2>партнёры</h2>
						<p>
							<?= $about[2]->description ?>
						</p>
					</div>

					<div class="partners__blocks">
						<?php
						$img = explode('%', $about[2]->file);
						foreach ($img as $key => $value):?>
							<div class="partners__block"><?= $value ?></div>
						<?php endforeach; ?>
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
					'messageLabel' => 'Сообщение'
				]) ?>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>
<!-- end blog.html-->