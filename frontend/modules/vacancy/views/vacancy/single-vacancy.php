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

$this->title =  $vacancy['title'];
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
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?=Url::to('/vacancy')?>">Вакансии</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr"><?=$vacancy['title']?></span>
			</nav>
			
			<div class="wrap">
				<div class="tittle">
					<span>craft group</span>
					<h2>
						<?=$vacancy['h1']?>
					</h2>
					<p>
						
						Обновлено <?= date('d '.mb_strtolower($monthes[(date('n'))]).' Y', strtotime($vacancy['date']));?> , <?=$vacancy['views']?> просмотров
					</p>
				</div>
				
				<p><?=$vacancy['description']?></p>
				
				<div class="vacancy__describe">
					<?php if($vacancy['demands']):?>
						<div class="vacancy__demand">
							<h3 class="vacancy__describe-title">Требования к начальным знаниям:</h3>
							<?=$vacancy['demands']?>
						</div>
					<?php endif;?>
					<?php if($vacancy['conditions']):?>
						<div class="vacancy__conditions">
							<h3 class="vacancy__describe-title">Условия:</h3>
							<?=$vacancy['conditions']?>
						</div>
					<?php endif;?>
				</div>
				
				<div class="brief__content_vacancy brief__content_feedback">
					<p class="feedback-form__title">Отправить своё резюме</p>
					
					<form id="form_vacancy" class="brief__form form__feedback">
						<div class="brief__form-message brief__form-message_nomargin" lang="ru">
							<label for="message_vacancy">Напишите немного о себе</label>
							<textarea id="message_vacancy" placeholder="Напишите немного о себе"></textarea>
						</div>
						
						<div class="brief__form-head brief__form-head_feedback">
							<div>
								<label for="name_vacancy">Ваше имя, фамилия *</label>
								<input id="name_vacancy" name="name" type="text" placeholder="Ваше имя" required >
							</div>
							
							<div>
								<label for="speciality_vacancy">Ваша специальность</label>
								<input id="speciality_vacancy" name="specialty" type="text" placeholder="Ваша специальность" required>
								<input name="subject" type="text" value="Заявка на работу <?=$vacancy['title']?>" hidden>
							</div>
							
							<div>
								<label for="mail_vacancy">Ваш e-mail *</label>
								<input id="mail_vacancy" type="email" name="email" placeholder="Ваш e-mail" required>
							</div>
							
							<div>
								<label for="city_vacancy">Ваш город</label>
								<input id="city_vacancy" name="city" type="text" placeholder="Ваш город">
							</div>
						</div>
						
						<div id="uploader" class="uploader"></div>
						
						<div class="brief__form-desc">
							<p><span>*</span> обязательные поля</p>
							<input id="submit_feedback" class="send_vacancy" type="submit" value="Хочу в команду">
						</div>
					</form>
				</div>
				
				<div class="vacancies-p__wrap">
					<h2 class="vacancies-p__title">Больше вакансий, которые вас заинтересуют</h2>
					
					<div class="vacancies-p">
						<!-- тут не больше 3х вакансий -->
						<?php foreach ($all as $key => $value):?>
							<div class="vacancies-p__vacancy">
								<header class="vacancies-p__vacancy-header">
									<img class="vacancies-p__vacancy-img" src="img/programmer.png" alt="">
									<h3 class="vacancies-p__vacancy-title"><?=$value['title']?></h3>
								</header>
								
								<div class="feedback-item__content">
									<div class="feedback-item__desc">
										<p class="feedback-item__text"><?=$value['description']?></p>
										<a class="vacancies-p__vacancy-more" href="<?=Url::to(['single-vacancy', 'slug' => $value['slug']])?>">подробнее</a>
									</div>
								</div>
							</div>
						<?php endforeach;?>
					</div>
				</div>
			
			</div>
		
		</div>
	</section>
