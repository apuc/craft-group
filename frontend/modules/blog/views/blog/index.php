<?php

use yii\helpers\Html;
use  yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $blog array
* @var $title string
* @var $b_cur object
*/

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


$img = Url::to('@web/img/');
?>
<!-- start blog-page.html-->
<main class="all-news">
	<section class="blog blog__single" id="blog">
		<div class="container">
			
			<p class="paragraph">наш блог</p>
			
			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to(['/'])?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Блог</span>
			</nav>
			
			<div class="wrap wrap-services">
				
				<div class="tittle">
					<span>актуальное </span>
					<h2>в нашем блоге</h2>
					<p>
						Мы ответственно относимся к любой работе и уделяем достаточно внимания
						всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
						Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
					</p>
				</div>
				
				<div class="blog__blocks">
					<?php foreach ($blog as $key => $value):?>
						<?php if($value['h1']!='current'):?>
							<article class="blog__block">
								<div class="blog__block-wrap">
									<a href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>">
<!--										--><?php //preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $value['file'], $matches);
//										$imgSrc = $matches[1];?>
										<img class="blog__block-img" src="<?=$value['file']?>" alt="">
									</a>
									
									<h2 class="blog__block-title">
										<a class="blog__block-link dotdot" href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>"><?=$value['title']?></a>
									</h2>
									
									<p class="blog__block-text"><?=$value['meta_desc']?></p>
								</div>
								
								<footer class="blog__block-footer">
									
									<time class="blog__block-time"><?=$value['date'] = BlogSlider::getTime(strtotime($value['date']));?></time>
									<a class="blog__block-more"  href="<?=Url::to(['single-blog', 'slug' => $value['slug']])?>">
										<span>Читать далее</span>
										<span class="blog__block-arrow"></span>
									</a>
								</footer>
							</article>
						<?php endif;?>
					<?php endforeach;?>
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
							Перестаньте платить деньги за процесс. Получите гарантированный.
						</p>
					</div>
				</div>
			</div>
			<div class="brief__content">
				<form id="send_form" class="service__form" enctype="multipart/form-data">
					<input type="hidden" name="filePath" id="filePath">
					<div class="service__form-head">
						<div class="service__form-head_item">
							<label for="name">Ваше имя, фамилия *</label>
							<input class="service__form_input"  id="name" name="name" type="text" placeholder="Ваше имя" required >
						</div>

						<div class="service__form-head_item">
							<label for="phone">Ваш номер телефона *</label>
							<input class="service__form_input js_phone-mask" id="phone" type="tel" name="phone" placeholder="Номер телефона" required>
						</div>

						<div class="service__form-head_item">
							<label for="mail">Ваш e-mail *</label>
							<input class="service__form_input" id="mail" type="email" name="email" placeholder="Ваш Email" required>
						</div>

						<div class="service__form-head_item">
							<label for="skype">Ваш skype</label>
							<input class="service__form_input" id="skype" type="text" name="skype" placeholder="Ваш Skype">
						</div>
					</div>

					<div class="service__form-radio">
						<div class="service__form-radio_text">
							<p>Какие услуги Вас интересуют?</p>
						</div>
						<div class="service__form-radio-button">
							<div class="service__form-radio-itemL">
								<div class="service__form-radio-item service__form-radio-item1">
									<label class="checkbox-item">Готовое решение
										<input type="checkbox" name="radio" value="Готовое решение">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Интернет-магазин
										<input type="checkbox" name="radio" value="Интернет-магазин">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item2">
									<label class="checkbox-item">Индивидуальный проект
										<input type="checkbox" name="radio" value="Индивидуальный проект">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Корпоративные системы
										<input type="checkbox" name="radio" value="Корпоративные системы">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item3">
									<label class="checkbox-item">Landing page
										<input type="checkbox" name="radio" value="Landing page">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">UI/UX Design
										<input type="checkbox" name="radio" value="UI/UX Design">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="service__form-radio-itemR">
								<div class="service__form-radio-item service__form-radio-item4">
									<label class="checkbox-item">Поддержка
										<input type="checkbox" name="radio" value="Поддержка">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Логотип
										<input type="checkbox" name="radio" value="Логотип">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item5">
									<label class="checkbox-item">Репутационный маркетинг
										<input type="checkbox" name="radio" value="Репутационный маркетинг">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Полиграфическая продукция
										<input type="checkbox" name="radio" value="Полиграфическая продукция">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item6">
									<label class="checkbox-item">Брендинг и айдентика
										<input type="checkbox" name="radio" value="Брендинг и айдентика">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Digital Design
										<input type="checkbox" name="radio" value="Digital Design">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="service__form-message" lang="ru">
						<div class="service__form-textarea">
							<label for="message">Сообщение</label>
							<textarea id="message" name="message" placeholder="Ваше сообщение"></textarea>
						</div>
						<div class="service__form-file">
							<div class="btn-file__wrap">
								<input type="file" class="input-file">
								<div class="btn-input-file">
									<img src="<?=Url::to('@web/img/clip-black.png');?>" alt="" width="25" height="25">
									<span>Прикрепить файл</span>
								</div>
							</div>
							<span class="service__form-files">jpg, jpeg, png. gif, zip, rar, pdf, doc, xls</span>
						</div>
						<!--						<div id="fine-uploader" class="uploader"></div>-->
					</div>
					<div class="service__form-desc">
						<span class="service__form-desc_span">Нажимая кнопку «Отправить» я даю свое <span class="service__form-desc_red">согласие на обработку персональных данных</span></span>
						<input class="service__form-submit send" id="submit" type="submit" value="Отправить бриф">
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>

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