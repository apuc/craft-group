<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;
use common\models\BlogSlider;
use himiklab\thumbnail\EasyThumbnailImage;
use tpmanc\imagick\Imagick;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var $portfolio array
 * @var $title string
 * @var $count integer
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

$home = (Url::home(true));

$img = Url::to('@web/img/');
?>
<!-- start content-portfolio.html-->
<main class="main-portfolio">

	<section class="blog blog__single" id="blog">
		<div class="container">

			<p class="paragraph">наши работы</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Портфолио</span>
			</nav>

			<div class="wrap wrap-services">
				<div class="tittle">
					<span>актуальные </span>
					<h2>работы</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="wrapper">
					<div class="grid_p">
						<?php if ($portfolio): ?>
							<?php $i = 0;
							foreach ($portfolio as $key => $value): ?>
								<?php if ($i <= $count - 1): ?>
									<?php
									$path = str_replace(basename($value['file']), '', $value['file']);
									$imagePathOriginal = Yii::getAlias('@frontend/web/' . $path . rawurldecode(basename($value['file'])));
									if (file_exists($imagePathOriginal)) {
										$imagePathThumbnail = Yii::getAlias('@frontend/web/uploads/thumbnail/' . rawurldecode(basename($value['file'])));
										$imageOriginal = Imagick::open($imagePathOriginal);
										$imageOriginal->resize(300, false)->saveTo($imagePathThumbnail);
										$thumbnail = Imagick::open($imagePathThumbnail);
										$file = $value['file'];
									} else {
										$imagePathThumbnail = Yii::getAlias('@frontend/web/uploads/thumbnail/blog3.png');
										$imageOriginal = Imagick::open(Yii::getAlias('@frontend/web/images/new/blog3.png'));
										$imageOriginal->resize(300, false)->saveTo($imagePathThumbnail);
										$thumbnail = Imagick::open($imagePathThumbnail);
										$file = '/images/new/blog3.png';
									} ?>
									?>
									<div class="grid-item">
										<figure class="photoGrid">

											<a href="<?= $file ?>"
											   data-size="<?= $imageOriginal->getWidth() ?>x<?= $imageOriginal->getHeight() ?>"></a>
											<a href="<?= Url::to(['single-portfolio', 'slug' => $value['slug']]) ?>">
												<?php if (file_exists($imagePathOriginal)): ?>
													<img
														src="<?= $home . 'uploads/thumbnail/' . basename($value['file']) ?>">
												<?php else: ?>
													<img src="<?= $home . 'uploads/thumbnail/blog3.png' ?>">
												<?php endif; ?>
											</a>
										</figure>
										<span class="full-size">
                                            <img src="<?= $img ?>full-size.svg" width="20" height="20" alt="">
                                        </span>
										<div class="grid-item__links">
											<a href="<?= Url::to(['single-portfolio', 'slug' => $value['slug']]) ?>"
											   class="dotportfolio"><?= $value['title'] ?></a>
											<a data-pin-do="buttonPin" data-pin-custom="true"
											   data-pin-log="button_pinit"
											   data-pin-href="https://ru.pinterest.com/pin/create/button?guid=zm1Vh8DTZiLD-1&amp;url=https%3A%2F%2Fweb-artcraft.com%2Fportfolio&amp;media=undefined&amp;description=%D0%9F%D0%BE%D1%80%D1%82%D1%84%D0%BE%D0%BB%D0%B8%D0%BE%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%20%D0%B2%D0%B5%D0%B1-%D1%81%D1%82%D1%83%D0%B4%D0%B8%D0%B8%20Craft%20Group%3A%20%D0%B4%D0%B8%D0%B7%D0%B0%D0%B9%D0%BD%20%D1%81%D0%B0%D0%B9%D1%82%D0%BE%D0%B2%20%D0%B8%20%D1%83%D0%BF%D0%B0%D0%BA%D0%BE%D0%B2%D0%BA%D0%B8%2C%20%D1%81%D0%BE%D0%B7%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5%20%D0%BB%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF%D0%BE%D0%B2%20%D0%B8%20%D0%BB%D0%B5%D0%BD%D0%B4%D0%B8%D0%BD%D0%B3-%D0%BF%D0%B5%D0%B9%D0%B4%D0%B6.">
												<img
													src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png"
													style="width: 25px; height: 25px; border-radius: 50%">
											</a>
										</div>
									</div>
									<?php $i++; endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>

				<button type="button" class="more_btn" id="curButton" data-inpage="<?= $count ?>" data-page="1">
					Загрузить ещё
					<div class='sk-fading-circle sk-fading-circle-position'>
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
				</button>
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
<!-- end content-portfolio.html-->