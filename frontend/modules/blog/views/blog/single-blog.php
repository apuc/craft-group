<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
 * @var Blog $blog
 * @var string $slider
 */


use frontend\modules\blog\models\Blog;
use yii\helpers\Url;
use common\models\BlogSlider;
use yii\helpers\Html;

$this->title = $blog->title;
$img = Url::to('@web/img/');
\frontend\assets\SidebarAsset::register($this);
?>

<!-- start content-blog.html-->
<main>
	<!-- start single-blog.html-->
	<main class="single-post">
		<section class="blog blog__single" id="blog">
			<div class="container">

				<p class="paragraph">наш блог</p>

				<nav class="broadcrumbs">
					<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
					<span class="broadcrumbs__divider"> / </span>
					<a class="broadcrumbs__link" href="<?= Url::to(['/blog']) ?>">Блог</a>
					<span class="broadcrumbs__divider"> / </span>
					<span class="broadcrumbs__curr"><?= $blog->title ?></span>
				</nav>

				<div class="wrap wrap-services">

					<div class="blog-single__content main">
						<div class="blog-single__main">
							<h1 class="blog-single-title"><?= $blog->h1 ?></h1>
							<img class="blog-single__main-img" src="<?= $blog->file ?>" alt="">
							<div class="blog-single__text">
								<?= $blog->description ?>

                                <div style="display: flex; justify-content: space-around">
                                    <?= Html::a('Назад в блог','/blog',['class'=>'vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty']) ?>
                                    <?= Html::a('Узнать больше','https://vk.com/web_craft_group',['class'=>'vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty']) ?>
                                </div>
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