<?php


use frontend\modules\myths\models\Myths;
use yii\helpers\Url;

/**
 * @var Myths[] $myths
 * @var $this yii\web\View
 */

$this->title = Yii::t('myths', 'Myths');
$this->params['breadcrumbs'][] = $this->title;
$img = Url::to('@web/img/');
\frontend\assets\ServiceAsset::register($this);
?>
<main class="main-service	">
	<!-- start content-myths.html-->
	<section class="myths-section blog blog__single all-services-section">
		<div class="container">
			<p class="paragraph">развеивание мифов</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Общие вопросы</span>
			</nav>

			<div class="wrap wrap-services">
				<div class="tittle">
					<span>вся правда о нас</span>
					<h2>и немного больше</h2>
					<p>
                        Команда Craft Group реализует проекты с нуля, а также берется за редизайн и развитие сайтов, от которых ты хотел бы получить большего.
					</p>
				</div>

				<div class="all-services">
					<div class="services-bottom">
						<?php $i = 0;
						foreach ($myths as $myth): ?>
							<button class="btn_services" onclick="openService(event, '<?= $myth->slug ?>')"
									id="<?= ($i == 0) ? 'defaultOpen' : ''; ?>" style="margin-bottom: 10px">
								<?= $myth->title ?>
							</button>
							<?php $i++; endforeach; ?>
					</div>
					<div class="services-text">
						<?php foreach ($myths as $myth): ?>
							<div id="<?= $myth->slug ?>" class="services_item title-element">
								<p class="services_item-p">
                                    <?= $myth->getText() ?>

                                </p>
                                <a href="<?= Url::to(['single-myths', 'slug' => $myth->slug]) ?>"
                                   class="vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty" style="margin: 0 auto">Подробнее</a>

							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="services-mobile">
					<?php foreach ($myths as $myth): ?>
						<div class="btn_services-mob">
							<h2><?= $myth->title ?></h2>
						</div>
						<div class="services_item-mob flipIn">
							<p class="services_item-p"> <?= $myth->description; ?></p>
							<a href="<?= Url::to(['single-myths', 'slug' => $myth->slug]) ?>"
							   class="services_item-more vacancies_item-more">Подробнее</a>
						</div>
					<?php endforeach; ?>
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
					'messageLabel' => 'Сообщение',
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