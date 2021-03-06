<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
 * @var $vacancy array
 * @var $all array
 */


use  yii\helpers\Url;

$this->title = $vacancy['title'];
$monthes = array(
	1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
	5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
	9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
);
$img = Url::to('@web/img/');
?>
<!-- start content-single-vacancy.html-->
<main class="main-vacancy">
	<section class="blog blog__single blog_feedback">
		<div class="container">

			<p class="paragraph">вакансии/стажировки</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to('/') ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?= Url::to('/vacancy') ?>">Вакансии</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr"><?= $vacancy['title'] ?></span>
			</nav>

			<div class="wrap wrap-services">
				<div class="tittle">
					<span>craft group</span>
					<h2>
						<?= $vacancy['h1'] ?>
					</h2>
					<p>

						Обновлено <?= date('d ' . mb_strtolower($monthes[(date('n'))]) . ' Y', strtotime($vacancy['date'])); ?>
						, <?= $vacancy['views'] ?> просмотров
					</p>
				</div>

				<p><?= $vacancy['description'] ?></p>

				<div class="vacancy__describe">
					<?php if ($vacancy['demands']): ?>
						<div class="vacancy__demand">
							<h3 class="vacancy__describe-title">Требования к начальным знаниям:</h3>
							<?= $vacancy['demands'] ?>
						</div>
					<?php endif; ?>
					<?php if ($vacancy['conditions']): ?>
						<div class="vacancy__conditions">
							<h3 class="vacancy__describe-title">Условия:</h3>
							<?= $vacancy['conditions'] ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<section class="service-brief vacancies-brief" id="brief">

		<div class="container">
			<div class="brief__head">
				<p class="paragraph">резюме</p>
				<div class="wrap">
					<div class="tittle">
						<span>отправьте</span>
						<h2>свое резюме</h2>
						<!--<p>-->
						<!--Перестаньте платить деньги за процесс. Получите гарантированный результат.-->
						<!--</p>-->
					</div>
				</div>
			</div>
			<div class="brief__content">
				<?= \frontend\components\SendFormWidget::widget([
					'subject' => \frontend\models\SendForm::VACANCY,
					'messageLabel' => 'Напишите немного о себе',
					'textButton' => 'Хочу в команду',
					'answer' => 'Резюме отправлено!',
                    'upload_file_delete_title' => 'delItem delete_item2',
                    'upload_file_btn_class' => 'btn-input-file button_input2',
                    'upload_file_wrapper_title' => 'itemWrapper wrapper_item2',
                    'upload_file_container_title' => 'itemTitle title_item2',
                    'upload_file_container_id' => 'wrapperCont content_wrapper2',
                    'upload_file_submit_id' => 'submit2',
                    'upload_file_input_class' => 'input-file file_input2'
				]) ?>
			</div>
			<div class="vacancies-p__wrap">
				<h2 class="vacancies-p__title">Больше вакансий, которые вас заинтересуют</h2>

				<div class="vacancies-p">
					<!-- тут не больше 3х вакансий -->
					<?php foreach ($all as $key => $value): ?>
						<div class="vacancies-p__vacancy">
							<header class="vacancies-p__vacancy-header">
								<img class="vacancies-p__vacancy-img" src="img/programmer.png" alt="">
								<h3 class="vacancies-p__vacancy-title"><?= $value['title'] ?></h3>
							</header>

							<div class="feedback-item__content">
								<div class="feedback-item__desc">
									<p class="feedback-item__text"><?= $value['description'] ?></p>
									<a class="vacancies-p__vacancy-more"
									   href="<?= Url::to(['single-vacancy', 'slug' => $value['slug']]) ?>">подробнее</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
</main>
