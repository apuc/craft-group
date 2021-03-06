<?php

use common\models\Vacancy;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var Vacancy[] $vacancy
 * @var Vacancy[] $all
 * @var $title string
 * @var $b_cur object
 * @var $blog array
 */
\frontend\assets\ServiceAsset::register($this);
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
//var_dump($vacancy);
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
                    <?= $vacancy[0]->h1 ?>
                    <p class="vacancies-title-p">
                        <?= $vacancy[0]->description ?>
                    </p>
                </div>

                <div class="all-services">
                    <div class="services-bottom">
                        <?php $i = 0;
                        foreach ($all as $k => $v): ?>
                            <?php if ($i < 1): ?>
                                <button class="btn_services" onclick="openService(event, '<?= $v['slug'] ?>')"
                                        id="defaultOpen" style="margin-bottom: 10px;">
                                    <?= $v['title'] ?>
                                </button>
                            <?php else: ?>
                                <button style="margin-bottom: 10px"; class="btn_services" onclick="openService(event, '<?= $v['slug'] ?>')" >
                                    <?= $v['title'] ?>
                                </button>
                            <?php endif; ?>
                            <?php $i++; endforeach; ?>
                    </div>

                    <div class="services-text">
	                    <?php foreach ($all as $key => $value):?>
		                    <div id="<?=$value->slug?>" class="services_item tittle">
			                    <p class="services_item-p">
				                    <?php if(explode('*' , $value->description)):?>
					                    <?php $serv = explode('*' , $value->description);?>
					                    <?= $serv[0]?>
				                    <?php else:?>
					                    <?= strip_tags($value->description);?>
				                    <?php endif;?>
			                    </p>
			                    <ul class="services_item-ul vacancies_item-ul">
				                    <li class="services_item-li vacancies-item-li">Опыт работы:  <span class="vacancies-ul-span"> <?=$serv[1] ?? '';?></span></li>
				                    <li class="services_item-li vacancies-item-li">Ззанятость:<span class="vacancies-ul-span"> <?=$serv[2] ?? '';?></span></li>
				                    <li class="services_item-li vacancies-item-li">Зарплата:  <span class="vacancies-ul-span"> <?=$serv[3] ?? '';?></span></li>
			                    </ul>
			                    <a href="<?=Url::to(['single-vacancy', 'slug' => $value->slug])?>" class="services_item-more vacancies_item-more" style="margin: 0 auto;">Подробнее</a>
		                    </div>
	                    <?php endforeach;?>

                        <?php preg_match('|<div class="conditions">(.*?)</div>|isU', $vacancy[0]->file, $match);
                        ?>
	                    
                    </div>
                </div>

	            <div class="services-mobile">
		            <?php foreach ($all as $key => $value):?>
			            <div class="btn_services-mob">
				            <h2><?=$value->title?></h2>
			            </div>
			            <div class="services_item-mob flipIn">
				            <p class="services_item-p">
					            <?php if(explode('*' , $value->description)):?>
						            <?php $serv = explode('*' , $value->description);?>
						            <?= $serv[0]?>
					            <?php else:?>
						            <?=$value->description;?>
					            <?php endif;?>
				            </p>
				            <div class="services_item-mob mt-1">
					            <p>Опыт работы:</p>
					            <p><?=$serv[1] ?? '';?></p>
				            </div>
				            <div class="services_item-mob">
					            <p>Занятость:</p>
					            <p><?=$serv[2] ?? '';?></p>
				            </div>
				            <div class="services_item-mob mb-1">
					            <p>Зарплата:</p>
					            <p><?=$serv[3] ?? '';?></p>
				            </div>
				            <a href="<?=Url::to(['single-vacancy', 'slug' => $value->slug])?>" class="services_more-mob">Подробнее</a>
			            </div>
		            <?php endforeach;?>
	            </div>


                <div class="novelty vacancies-novelty">
                    <img class="novelty__img vacancies-novelty-img" src="img/mans.png" width="535" height="500" alt="">

                    <div class="novelty__desc">
                        <div class="novelty__head">
                            <h2 class="novelty__big-title novelty-red-title vacancies-novelty-title">Стажировка</h2>
                        </div>
                        <div class="novelty__body vacancies-body">
                            <h3 class="novelty__title vacancies-title"><span class="novelty__title_gray">Учим</span>
                                <span
                                    class="novelty__title_red novelty-black-title">Командная работа, опытный ментор</span>
                            </h3>
                            <h3 class="novelty__title vacancies-title novelty__title_margin">Прокачиваем</h3>
                            <p class="novelty__text vacancies-text">В офисе тебе дадут индивидуальную программу развития, стол, стул и наставника. Взамен придется пораскинуть мозгами и потратить время. Важно: это не курсы программирования. Технические аспекты ты должен выучить самостоятельно. Мы курируем, даем реальные задачи и обратную связь. Стажировка – это идеальный способ начать работу бок о бок с опытными специалистами Craft Group, прежде чем стать полноправным членом нашей команды.</p>

                            <a href="#brief"
                               class="vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty vacancies-novelty-more portfolio-scroll">Записаться</a>
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
                        <span>отправь</span>
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
                    'upload_file_input_class' => 'input-file file_input2',
                    'messageLabel' => 'Сообщение',
                    'idForm' => 'send_vacancy'
                ]) ?>
            </div>

        </div>

	</section>
	<!-- end vacancies.html-->
