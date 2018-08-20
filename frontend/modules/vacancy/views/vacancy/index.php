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
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?=Url::to(['/about'])?>">О нас</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Вакансии</span>
			</nav>

			<div class="wrap wrap-services">
				<div class="tittle">
					<span>мы растем</span>
					<?=$vacancy[0]['h1']?>
					<p  class="vacancies-title-p">
						<?=$vacancy[0]['description']?>
					</p>
				</div>
				
				<div class="all-services">
					<div class="services-bottom">
						<?php $i=0; foreach ($all as $k => $v):?>
							<?php if($i < 1):?>
								<button class="btn_services" onclick="openService(event, '<?=$v['slug']?>')"  id="defaultOpen">
									<?=$v['title']?>
								</button>
							<?php else:?>
								<button class="btn_services" onclick="openService(event, '<?=$v['slug']?>')">
									<?=$v['title']?>
								</button>
							<?php endif;?>
						<?php $i++; endforeach;?>
					</div>

					<div class="services-text">
						<?php foreach ($all as $key => $value):?>
							<div id="<?=$value['slug']?>" class="services_item tittle">
								<p class="services_item-p">
									<?=$value['description']?>
								</p>
								<ul class="services_item-ul vacancies_item-ul">
									<li class="services_item-li vacancies-item-li">Требыемый опыт работы - <span class="vacancies-ul-span"> не требуется</span></li>
									<li class="services_item-li vacancies-item-li">Полная занятость,<span class="vacancies-ul-span"> работа в офисе</span></li>
									<li class="services_item-li vacancies-item-li">Уровень зарплаты - <span class="vacancies-ul-span"> от 25 000 до 45 000 руб.</span></li>
								</ul>
								<a href="<?=Url::to(['single-vacancy', 'slug' => $value['slug']])?>" class="services_item-more vacancies_item-more">Подробнее</a>
							</div>
						<?php endforeach;?>
						
						<?php preg_match('|<div class="conditions">(.*?)</div>|isU', $vacancy[0]['file'], $match);
						?>
<!--						--><?//=$match[1]?>
					
					</div>
				</div>


				<div class="novelty vacancies-novelty">
					<img class="novelty__img vacancies-novelty-img" src="img/mans.png" width="535" height="500" alt="">

					<div class="novelty__desc vacancies-novelty-desc">
						<div class="novelty__head">
							<h2 class="novelty__big-title novelty-red-title vacancies-novelty-title">Стажировка</h2>
						</div>
						<div class="novelty__body">
							<h3 class="novelty__title vacancies-title"><span class="novelty__title_gray">Учим</span> <span class="novelty__title_red novelty-black-title">Командная работа, опытный ментор</span></h3>
							<h3 class="novelty__title vacancies-title novelty__title_margin">Прокачиваем</h3>
							<p class="novelty__text novelty-text">В офисе вам дадут индивидуальную программу развития, стол, стул и наставника (свой компьютер приветствуется).
								Взамен, заберут ваше время и ваши руки. ВАЖНО это не курсы программирования. Технические аспекты вы учите самостоятельно. Мы курируем,
								даем реальные задачи и обратную связь.</p>
							<p class="novelty__text vacancies-text">Стажировка это способ примерить  вас к команде, к принципам работы,
								прежде чем брать в команду.</p>
							<a href="#" class="vacancies-p__vacancy-more vacancies-p__vacancy-more_novelty vacancies-novelty-more">Записаться</a>
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
						<!--Перестаньте платить деньги за процесс. Получите гарантированный.-->
						<!--</p>-->
					</div>
				</div>
			</div>
			<div class="brief__content">
				<form id="form" class="service__form" enctype="multipart/form-data">
					<div class="service__form-head">
						<div class="service__form-head_item">
							<label for="name">Ваше имя, фамилия *</label>
							<input class="service__form_input" id="name" type="text" placeholder="Ваше имя" required >
						</div>

						<div class="service__form-head_item">
							<label for="phone">Ваш номер телефона *</label>
							<input class="service__form_input js_phone-mask" id="phone" type="tel" placeholder="Номер телефона" required>
						</div>

						<div class="service__form-head_item">
							<label for="mail">Ваш e-mail *</label>
							<input class="service__form_input" id="mail" type="email" placeholder="Ваш e-mail" required>
						</div>

						<div class="service__form-head_item">
							<label for="skype">Ваш skype</label>
							<input class="service__form_input" id="skype" type="text" placeholder="Ваш Skype">
						</div>
					</div>

					<div class="service__form-message" lang="ru">
						<div class="service__form-textarea">
							<label for="message">Напишите немного о себе</label>
							<textarea id="message" placeholder="Ваше сообщение"></textarea>
						</div>
						<div class="service__form-file">
							<div class="btn-file__wrap">
								<input type="file" class="input-file">
								<div class="btn-input-file">
									<img src="img/clip-black.png" alt="" width="25" height="25">
									<span>Прикрепить файл</span>
								</div>
							</div>
							<span class="service__form-files">jpg, jpeg, png. gif, zip, rar, pdf, doc, xls</span>
						</div>
					</div>
					<div class="service__form-desc">
						<span class="service__form-desc_span">Нажимая кнопку «Отправить» я даю свое <span class="service__form-desc_red">согласие на обработку персональных данных</span></span>
						<input class="service__form-submit" id="submit" type="submit" value="Хочу в команду">
					</div>
				</form>
			</div>

		</div>

	</section>
	<!-- end vacancies.html-->

	<!-- start blog.html-->
	<section class="brief brief_footer blog" id="blog">
		<div class="container">

			<p class="paragraph paragraph-blog">наш блог</p>

			<div class="wrap">

				<div class="tittle">
					<span class="block_span_title">актуальное </span>
					<h2 class="block_title">в нашем блоге</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>

				<div class="blog__slider-content">
					
					<?php if($b_cur):?>
						<div class="blog__block-link_main">
							<img src="<?=$b_cur->file?>"?>
							<a class="blog__link" href="<?=Url::to(['/blog']);?>"><?=$b_cur->title?></a>
						</div>
					<?php endif;?>
					<div class="blog__slider--wrap">
						<?php foreach ($blog as $key => $value):?>
							<?php if( $value['options']):?>
								<div class="blog__slider--slide">
									<img src="<?=$value['file']?>"?>
									<div class="slide__title">
										<h3 class="slide__post-title"><?=$value['title']?></h3>
										<time class="slide__post-time"><?=$value['date'] = BlogSlider::getTime(strtotime($value['date']));?></time>
									</div>
									<div class="slide__hover">
										<span class="dotdot"><?=$value['description']?></span>
										<a href="<?=Url::to(['/blog', 'slug' => $value['slug']])?>">Читать далее</a>
									</div>
								</div>
							<?php endif;?>
						<?php endforeach;?>
					</div>

				</div>

			</div>

		</div>

		<div class="animate-circle"></div>

		<img src="<?=Url::to('img/balloon.png');?>" alt="" class="balloon">
		<p class="fill-brief">Покорить вершины легко!</p>
	</section>
	<!-- end blog.html-->
