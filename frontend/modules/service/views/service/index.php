<?php

use yii\helpers\Html;
use yii\grid\GridView;
use  yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var $service array
 * @var $all array
 * @var $title string
 * @var $blog array
 * @var $b_cur object
 */


$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start content-service.html-->
<main class="main-service">
    <section class="blog blog__single all-services-section">
        <div class="container">

            <p class="paragraph">Услуги</p>

            <nav class="broadcrumbs">
                <a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
                <span class="broadcrumbs__divider"> / </span>
                <span class="broadcrumbs__curr">Услуги</span>
            </nav>

            <div class="wrap wrap-services">
                <div class="tittle">
                    <span>что мы можем</span>
                    <h2>услуги компании</h2>
                    <?= $service[0]['description'] ?>
                </div>

                <div class="all-services">
                    <div class="services-bottom">
                        <?php foreach ($all as $key => $value): ?>
                            <button class="btn_services" onclick="openService(event, '<?= $value['slug'] ?>')"
                                    id="defaultOpen"><?= $value['title'] ?></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="services-text">
                        <?php foreach ($all as $k => $v): ?>
                            <div id="<?= $v['slug'] ?>" class="services_item tittle">
                                <p class="services_item-p"><?= $v['meta_desc'] ?></p>
                                <ul class="services_item-ul">
                                    <li class="services_item-li">Оформление группы Вконтакте <a
                                            href="<?= Url::to(['single-service', 'slug' => $v['slug']]) ?>"
                                            class="services_item-more">Подробнее</a></li>
                                    <li class="services_item-li">Живые обложки <a
                                            href="<?= Url::to(['single-service', 'slug' => $v['slug']]) ?>"
                                            class="services_item-more">Подробнее</a></li>
                                    <li class="services_item-li">Оформление сообществ в Facebook <a
                                            href="<?= Url::to(['single-service', 'slug' => $v['slug']]) ?>"
                                            class="services_item-more">Подробнее</a></li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="novelty">
                    <?= $service[2]['file'] ?>

                    <div class="novelty__desc">
                        <div class="novelty__head">
                            <h2 class="novelty__big-title novelty-red-title"><?= $service[2]['h1'] ?></h2>
                        </div>
                        <div class="novelty__body">
                            <h3 class="novelty__title">
                                <?= $service[2]['meta_key'] ?>
                            </h3>
                            <h3 class="novelty__title novelty__title_margin">
                                <?= $service[2]['meta_desc'] ?>
                            </h3>
                            <p class="novelty__text"><?= $service[2]['description'] ?></p>
                            <a href="<?= $service[2]['href'] ?>"
                               class="vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty">подробнее</a>
                        </div>
                    </div>
                </div>


                <div class="technologies">
                    <div class="tittle">
                        <span>Используем</span>
                        <h2>новые технологии</h2>
                        <p>
                            <?= $service[1]['description'] ?>
                        </p>
                    </div>

                    <div class="technologies__cards">
                        <?= $service[1]['file'] ?>
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
                    'messageLabel'=>'Сообщение'
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
<!-- end content-main.html-->
