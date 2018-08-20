<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
* @var $about array
* @var $title string
 * @var $service object
 * @var $feedback array
 * @var $b_cur object
 * @var $blog array
 */
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- start content-about.html-->
<main class="main-about">
	<section class="blog blog__single blog_about">
		<div class="container">

			<p class="paragraph">о нас</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">О нас</span>
			</nav>

			<div class="wrap about-wrap">
				<div class="about">
					<div class="tittle">
						<span>немного</span>
						<h2><?=$about[0]['title']?></h2>
						<p>
							<?=$about[0]['description']?>
						</p>
					</div>

					<div class="about__content">
						<div class="key">
							<div class="key__head">
								<h2 class="key__title">Ключевые</h2>

								<div class="key__head-sub">
									<h3 class="key__sub-title"><span class="red-letter">У</span>слуги</h3>
									<h3 class="key__sub-title"><span class="red-letter">К</span>омпании</h3>
								</div>
							</div>
							<ul class="key__desc">
								<?php foreach ($service as $key => $value):?>
									<li>
										<a class="key__desc-link" href="<?=Url::to(['/service/'.$value->slug])?>">
											<?=$value->title?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>

							<a href="<?=Url::to(['/service'])?>" class="red_btn">Посмотреть все услуги</a>
						</div>

						<div class="pros">
							<h2 class="pros__title">3 наших основных преимущества</h2>
							<ul class="pros__desc">
<!--								--><?php //foreach ($list as $key => $value):?>
<!--									--><?php //if(!empty($value)):?>
<!--										<li class="pros__element">-->
<!--											--><?php //$value = str_replace('<li>', '', $value);
//											$value = str_replace('</li>', '', $value);
//											$value = str_replace('<ul>', '', $value);
//											$value = str_replace('</ul>', '', $value);?>
<!--											<img src="img/icons/results-icon1.png" alt="">-->
<!--											<span class="pros__text">--><?//=$value?><!--</span>-->
<!--										</li>-->
<!--									--><?php //endif;?>
<!--								--><?php //endforeach;?>
								<?=$about[0]['file']?>
							</ul>
						</div>
					</div>
				</div>

				<div class="feedback">
					<div class="tittle">
						<span>Отзывы</span>
						<h2>наших клиентов</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut atque eum, deserunt dolores, veritatis voluptatem sunt cum voluptas porro eaque temporibus voluptatibus obcaecati laudantium placeat a sed. Debitis, doloremque, voluptatibus?
						</p>
					</div>

					<div class="feedback__content">
						<div class="feedback__social">
							<div class="soc__block soc__vk">
								<div class="soc__icon">
									<a href="https://vk.com"><img src="img/vk.svg" width="19" height="19" alt=""></a>
								</div>

								<div class="soc__desc">
									<?php
									$vk = preg_match_all('|<div class="vk">(.*)</div>|isU', $about[1]['file'], $match);
									?>
									<?=$match[1][0];?>
								</div>
							</div>

							<div class="soc__block soc__be">
								<div class="soc__icon">
									<a href="#"><img src="img/be-p.png" alt=""></a>
								</div>

								<div class="soc__desc">
									<?php
									$behance = preg_match_all('|<div class="behance">(.*)</div>|isU', $about[1]['file'], $match);
									?>
									<?=$match[1][0];?>
								</div>
							</div>

							<div class="soc__block soc__ussr">
								<div class="soc__icon">
									<a href="#"><img src="img/sickle-and-hammer.svg" width="19" height="19" alt=""></a>
								</div>

								<div class="soc__desc">
									<?php
									$else = preg_match_all('|<div class="else">(.*)</div>|isU', $about[1]['file'], $match);
									?>
									<?=$match[1][0];?>
								</div>
							</div>
						</div>

						<div class="feedback__slider">
							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>

							<div class="feedback__slide">
								<p class="feedback__slide-comment">отзывы в группе вк</p>

								<a class="feedback__slide-link" href="https://vk.com">
									<img class="feedback__slide-img" src="img/vk-feedback.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="partners">
					<div class="tittle">
						<?=$about[2]['h1']?>
						<p>
							<?=$about[2]['description']?>
						</p>
					</div>

					<div class="partners__blocks">
						<?php
						$img = explode('%', $about[2]['file']);
						foreach ($img as $key => $value):?>
							<div class="partners__block"><?=$value?></div>
						<?php endforeach;?>
					</div>
				</div>

				<div class="vacancies">
					<div class="tittle">
						<span>Мы растём</span>
						<?=$about[3]['h1']?>
						<p>
							<?=$about[3]['description']?>
						</p>
					</div>

					<div class="vacancies__content">
						<ul class="vacancies__list">
							<li class="vacancies__vacancy">
								<img class="vacancies__vacancy-img" src="img/icons/results-icon2.png" width="30" height="30" alt="">
								<?php preg_match_all('|<div class="vacancies__vacancy">(.*)</div>|isU', $about[3]['file'], $match); ?>
								<p class="vacancies__vacancy-text"><?=$match[1][0]?></p>
							</li>

							<li class="vacancies__vacancy vacancies__vacancy_actual">
								<h4 class="vacancies__vacancy-title">Копирайтер</h4>

								<ul class="vacancies__actual">
									<?php $text = preg_match_all('|<div class="vacancies__actual">(.*)</div>|isU', $about[3]['file'], $match);
									$list  = (explode(',' , $match[1][0]));
									?>
									<?php foreach ($list as $key => $value):?>
										<li class="vacancies__vacancy-text_grey"><?=$value?></li>
									<?php endforeach;?>
								</ul>
							</li>

							<li class="vacancies__vacancy">
								<img class="vacancies__vacancy-img" src="img/icons/results-icon2.png" width="30" height="30" alt="">
								<?php preg_match_all('|<div class="vacancies__vacancy_n">(.*)</div>|isU', $about[3]['file'], $match);?>
								<p class="vacancies__vacancy-text"><?=$match[1][0]?></p>
							</li>
						</ul>

						<div class="vacancies__send">
							<img class="vacancies__send-img" src="img/man.png" width="147" height="219" alt="">

							<div class="vacancies__desc">
								<?php preg_match_all('|<div class="vacancies__desc_h2">(.*)</div>|isU', $about[3]['file'], $match); ?>
								<h2 class="vacancies__desc-title"><?=$match[1][0]?></h2>
								<?php preg_match_all('|<div class="vacancies__desc_p">(.*)</div>|isU', $about[3]['file'], $match); ?>
								<p class="vacancies__desc-comment"><?=$match[1][0]?></p>
								<a class="red_btn red_btn_hidden" href="#">Посмотреть все вакансии</a>
							</div>
							<?php preg_match_all('|<div class="vacancies__href">(.*)</div>|isU', $about[3]['file'], $match); ?>
<!--							<a class="red_btn red_btn_shown" href="#">Посмотреть все вакансии</a>-->
							<?=$match[1][0]?>

						</div>
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