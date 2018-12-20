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
					<a class="broadcrumbs__link" href="<?= Url::to(['/myths']) ?>">Общие вопросы</a>
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
						<span class="block_span_title">закажи</span>
						<h2 class="block_title">услугу</h2>
						<p>
                            Хватит выбрасывать деньги на ветер – плати за результат.
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
<!-- end content-blog.html-->