<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var $vacancy array
 * @var $all array
 * @var $title string
 * @var $b_cur object
 * @var $blog array
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- start content-vacancy.html-->
<main class="main-service	">
    <!-- start vacancies.html-->
    <section class="vacancies-section blog blog__single all-services-section">
        <div class="container">
            <p class="paragraph">Наши Вакансии</p>

            <nav class="broadcrumbs">
                <a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
                <span class="broadcrumbs__divider"> / </span>
                <a class="broadcrumbs__link" href="<?= Url::to(['/about']) ?>">О нас</a>
                <span class="broadcrumbs__divider"> / </span>
                <span class="broadcrumbs__curr">Вакансии</span>
            </nav>

            <div class="wrap wrap-services">
                <div class="tittle">
                    <span>мы растем</span>
                    <?= $vacancy[0]['h1'] ?>
                    <p class="vacancies-title-p">
                        <?= $vacancy[0]['description'] ?>
                    </p>
                </div>

                <div class="all-services">
                    <div class="services-bottom">
                        <?php $i = 0;
                        foreach ($all as $k => $v): ?>
                            <?php if ($i < 1): ?>
                                <button class="btn_services" onclick="openService(event, '<?= $v['slug'] ?>')"
                                        id="defaultOpen">
                                    <?= $v['title'] ?>
                                </button>
                            <?php else: ?>
                                <button class="btn_services" onclick="openService(event, '<?= $v['slug'] ?>')">
                                    <?= $v['title'] ?>
                                </button>
                            <?php endif; ?>
                            <?php $i++; endforeach; ?>
                    </div>

                    <div class="services-text">
                        <?php foreach ($all as $key => $value): ?>
                            <div id="<?= $value['slug'] ?>" class="services_item tittle">
                                <p class="services_item-p">
                                    <?= $value['description'] ?>
                                </p>
                                <ul class="services_item-ul vacancies_item-ul">
                                    <li class="services_item-li vacancies-item-li">Требыемый опыт работы - <span
                                            class="vacancies-ul-span"> не требуется</span></li>
                                    <li class="services_item-li vacancies-item-li">Полная занятость,<span
                                            class="vacancies-ul-span"> работа в офисе</span></li>
                                    <li class="services_item-li vacancies-item-li">Уровень зарплаты - <span
                                            class="vacancies-ul-span"> от 25 000 до 45 000 руб.</span></li>
                                </ul>
                                <a href="<?= Url::to(['single-vacancy', 'slug' => $value['slug']]) ?>"
                                   class="services_item-more vacancies_item-more">Подробнее</a>
                            </div>
                        <?php endforeach; ?>

                        <?php preg_match('|<div class="conditions">(.*?)</div>|isU', $vacancy[0]['file'], $match);
                        ?>
                        <!--						--><? //=$match[1]?>

                    </div>
                </div>


                <div class="novelty vacancies-novelty">
                    <img class="novelty__img vacancies-novelty-img" src="img/mans.png" width="535" height="500" alt="">

                    <div class="novelty__desc vacancies-novelty-desc">
                        <div class="novelty__head">
                            <h2 class="novelty__big-title novelty-red-title vacancies-novelty-title">Стажировка</h2>
                        </div>
                        <div class="novelty__body">
                            <h3 class="novelty__title vacancies-title"><span class="novelty__title_gray">Учим</span>
                                <span
                                    class="novelty__title_red novelty-black-title">Командная работа, опытный ментор</span>
                            </h3>
                            <h3 class="novelty__title vacancies-title novelty__title_margin">Прокачиваем</h3>
                            <p class="novelty__text novelty-text">В офисе вам дадут индивидуальную программу развития,
                                стол, стул и наставника (свой компьютер приветствуется).
                                Взамен, заберут ваше время и ваши руки. ВАЖНО это не курсы программирования. Технические
                                аспекты вы учите самостоятельно. Мы курируем,
                                даем реальные задачи и обратную связь.</p>
                            <p class="novelty__text vacancies-text">Стажировка это способ примерить вас к команде, к
                                принципам работы,
                                прежде чем брать в команду.</p>
                            <a href="#brief"
                               class="vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty vacancies-novelty-more scroll">Записаться</a>
                        </div>
                    </div>
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
                    'textButton' => 'Хочу в команду'
                ]) ?>
	            <div class="brief-massage">
		            <button class="brief-massage-close">
			            <span></span>
			            <span></span>
		            </button>
		            <img src="/img/massage_success.png">
		            <h2>Резюме отправлено!</h2>
		            <p>Ожидайте, скоро мы с вами свяжемся.</p>
		            <p>А пока вы можете посмотреть <a href="<?= Url::toRoute(['/portfolio']); ?>">наши работы</a></p>
	            </div>
            </div>

        </div>

	</section>
	<!-- end vacancies.html-->
