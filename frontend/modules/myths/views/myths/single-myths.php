<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
 * @var \common\models\Myths $myth
 * @var string $slider
 * @var $all object
 */


use yii\helpers\Url;
use common\models\BlogSlider;

\frontend\assets\SidebarAsset::register($this);
$this->title = $myth->title;
$img = Url::to('@web/img/');
?>

<!-- start content-blog.html-->
<main>
	<!-- start single-blog.html-->
	<main class="single-post">
		<section class="blog blog__single" id="blog">
			<div class="container">

				<p class="paragraph">Мифы</p>

				<nav class="broadcrumbs">
					<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
					<span class="broadcrumbs__divider"> / </span>
					<a class="broadcrumbs__link" href="<?= Url::to(['/myths']) ?>">Развеивание мифов</a>
					<span class="broadcrumbs__divider"> / </span>
					<span class="broadcrumbs__curr"><?= $myth->title ?></span>
				</nav>


				<div class="wrap wrap-services">

					<div class="blog-single__content main">
						<div class="blog-single__main">
							<h1 class="blog-single-title"><?= $myth->title ?></h1>
							<div class="blog-single__text">
								<?= $myth->content; ?>
							</div>
						</div>

						<?= $slider ?>
							
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
				<div class="brief-massage">
					<button class="brief-massage-close">
						<span></span>
						<span></span>
					</button>
					<img src="/img/massage_success.png">
					<h2>Бриф отправлен!</h2>
					<p>Ожидайте, скоро мы с вами свяжемся.</p>
					<p>А пока вы можете посмотреть <a href="<?= Url::toRoute(['/portfolio']); ?>">наши работы</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>
<!-- end content-blog.html-->