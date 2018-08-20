<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 10.04.2018
 * Time: 17:45
 */
/**
 * @var $content string
*/
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

$contacts = $this->params['contacts'];
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!-- start html_open-index.html-->
<!DOCTYPE html>
<html >
<head lang="<?= Yii::$app->language ?>">
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<script type="text/template" id="qq-template">
		<div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Положить файлы сюда">
			<div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
				<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
			</div>
			<div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
				<span class="qq-upload-drop-area-text-selector"></span>
			</div>
			<div class="qq-upload-button-selector qq-upload-button">
				<div>Загрузить файл</div>
			</div>
			<span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
			<ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
				<li>
					<span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
					<div class="qq-progress-bar-container-selector qq-progress-bar-container">
						<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
					</div>
					<span class="qq-upload-spinner-selector qq-upload-spinner"></span>
					<div class="qq-thumbnail-wrapper">
						<img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
					</div>
					<button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
					<button type="button" class="qq-upload-retry-selector qq-upload-retry">
						<span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
						Retry
					</button>

					<div class="qq-file-info">
						<div class="qq-file-name">
							<span class="qq-upload-file-selector qq-upload-file"></span>
							<span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>
						</div>
						<input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
						<span class="qq-upload-size-selector qq-upload-size"></span>
						<button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
							<span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
						</button>
						<button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
							<span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
						</button>
						<button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
							<span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
						</button>
					</div>
				</li>
			</ul>

			<dialog class="qq-alert-dialog-selector">
				<div class="qq-dialog-message-selector"></div>
				<div class="qq-dialog-buttons">
					<button type="button" class="qq-cancel-button-selector">Close</button>
				</div>
			</dialog>

			<dialog class="qq-confirm-dialog-selector">
				<div class="qq-dialog-message-selector"></div>
				<div class="qq-dialog-buttons">
					<button type="button" class="qq-cancel-button-selector">No</button>
					<button type="button" class="qq-ok-button-selector">Yes</button>
				</div>
			</dialog>

			<dialog class="qq-prompt-dialog-selector">
				<div class="qq-dialog-message-selector"></div>
				<input type="text">
				<div class="qq-dialog-buttons">
					<button type="button" class="qq-cancel-button-selector">Отмена</button>
					<button type="button" class="qq-ok-button-selector">Ok</button>
				</div>
			</dialog>
		</div>
	</script>
	<?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	
	<!-- open .header -->
	<div class="page-preloader">
		<svg viewBox="0 0 1000 200">
			<!-- Symbol-->
			<symbol id="s-text">
				<text text-anchor="middle" x="50%" y="50%" dy=".35em">Craft Group</text>
			</symbol>
			<!-- Duplicate symbols-->
			<use class="text" xlink:href="#s-text"></use>
			<use class="text" xlink:href="#s-text"></use>
			<use class="text" xlink:href="#s-text"></use>
		</svg>
	</div>
	<!-- end html_open.html-->

	<!-- start header-service.html-->
	<header class="header">
		<div class="container">
			<div class="header__mobile-btn"><span></span></div>

			<ul class="header__nav">
				<li class="header__nav-li logo"><a href="/"><img src="<?=Url::to('@web/img/logo_header_red.svg');?>" width="160" height="35" alt=""></a></li>
				
				<ul class="header__nav-container">
					<?php $active = str_replace('site/', '', Url::current(['src' => null]));?>
					<li class="<?= ($active=='/service') ? 'active-page': ''?> header__nav-li"><a href="<?=Url::to('/site/service');?>">Услуги</a></li>
					<li class="<?= ($active=='/portfolio') ? 'active-page': ''?> header__nav-li"><a class="scroll" href="<?=Url::to('/portfolio');?>">Портфолио</a></li>
					<li class="header__nav-li"><a href="#">Распродажи</a></li>
					<li class="<?= ($active=='/blog') ? 'active-page': ''?> header__nav-li"><a class="scroll" href="<?=Url::to('/blog');?>">Блог</a></li>
					<li class="header__nav-li"><a href="#">Развеивание мифов</a></li>
					<li class="header__nav-li dropdown">
						<a class="scroll" href="<?=Url::to('/about');?>">О нас</a>
						<button class="dropdown_mob">></button>
						<ul class="header__submenu header__submenu_mob">
							<li><a href="<?=Url::to('feedback');?>">Отзывы</a></li>
							<li><a href="#">Клиенты</a></li>
							<li><a href="<?=Url::to('vacancy');?>">Вакансии</a></li>
						</ul>
					</li>
					<li class="header__nav-li"><a class="scroll" href="#brief">Контакты</a></li>
				</ul>
			</ul>
		</div>
	</header>

	<!-- end header-service.html-->
	
	<?= $content?>
	<footer class="footer">
		<div class="container">

		<!-- start brief.html-->
		<section class="brief" id="brief">
	
			<div class="container">
				<div class="brief__head">
					<p class="paragraph">наш бриф</p>
					<div class="wrap">
						<div class="tittle">
							<span class="block_span_title">заполните</span>
							<h2 class="block_title">наш бриф</h2>
							<p>
								Хорошо заполненный бриф - первый и очень важный этап успешно и вовремя завершённого проекта.
							</p>
						</div>
					</div>
				</div>
				<div class="brief__content">
					<form id="send_form" class="brief__form" enctype="multipart/form-data">
						<input type="hidden" name="filePath" id="filePath">
						<div class="brief__form-head">
							<div>
								<label for="name">Ваше имя, фамилия *</label>
								<input id="name" name="name" type="text" placeholder="Ваше имя" required >
							</div>
	
							<div>
								<label for="phone">Ваш номер телефона *</label>
								<input id="phone" type="tel" name="phone" placeholder="Номер телефона" required>
							</div>
	
							<div>
								<label for="mail">Ваш e-mail *</label>
								<input id="mail" type="email" name="email" placeholder="Номер телефона" required>
							</div>
	
							<div>
								<label for="skype">Ваш skype</label>
								<input id="skype" type="text" name="skype" placeholder="Номер телефона">
							</div>
						</div>
	
						<div class="brief__form-message" lang="ru">
							<label for="message">Сообщение</label>
							<textarea id="message" name="message" placeholder="Ваше сообщение"></textarea>
	
							<!-- <input type="file" name="file-2[]" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} файла(ов) выбрано" multiple />
							<label for="file-2"><img src="img/clip.png" width="13" height="13" alt=""> <span>Прикрепить файл&hellip;</span></label> -->
							<div id="fine-uploader" class="uploader"></div>
						</div>
	
						<div class="brief__form-services">
							<h3>Какие услуги Вас интересуют?</h3>
	
							<input id="ckeckbox_mob" type="checkbox" name="ckeckbox_mob">
							<label for="ckeckbox_mob"><span></span>Дизайн сайта или дизайн landing-page</label>
	
							<input id="ckeckbox_supp" type="checkbox" name="ckeckbox_supp">
							<label for="ckeckbox_supp"><span></span> Дизайн печатной продукции (все виды)</label>
	
							<input id="ckeckbox_site" type="checkbox" name="ckeckbox_site">
							<label for="ckeckbox_site"><span></span>Посадка сайта на WordPress</label>
	
							<input id="ckeckbox_seo" type="checkbox" name="ckeckbox_seo">
							<label for="ckeckbox_seo"><span></span>Разработка интернет-магазина на платформе YI2</label>
						</div>
						<div class="brief__form-desc">
							<p><span>*</span> обязательные поля</p>
							<input id="submit" type="submit" class="send" value="Отправить бриф">
						</div>
					</form>
					<div class="brief__contacts">
						<h3>Наши контакты</h3>
						<?php foreach ($contacts as $key => $value):?>
							<?php if($value['name'] == 'phone'):?>
								<div class="brief__tel">
									<strong><?=$value['description']?></strong>
								</div>
							<?php endif;?>
						<?php endforeach;?>
						<div class="brief__social">
							<strong>Соц. сети</strong>
							<?php foreach ($contacts as $key => $value):?>
								<?php if($value['name'] == 'social'):?>
									<a href="<?=$value['description']?>"><?=$value['file']?></a>
								<?endif;?>
							<?php endforeach;?>
						</div>
						<div class="brief__messengers">
							<strong>Мессенджеры</strong>
							<?php foreach ($contacts as $key => $value):?>
								<?php if($value['name'] == 'mess' ):?>
									<a href="<?=$value['description']?>"><?=$value['file']?></a>
								<?endif;?>
							<?php endforeach;?>
						</div>
						<div class="brief__email">
							<strong>E-mail</strong>
							<?php foreach ($contacts as $key => $value):?>
								<?php if($value['name'] == 'email'):?>
									<a href="mailto:<?=$value['description']?>"><?=$value['description']?></a>
								<?endif;?>
							<?php endforeach;?>
						</div>
					</div>
				</div>
	
	
			</div>
	
			<div class="animate-circle"></div>
	
			<img src="<?=Url::to('@web/img/balloon.png');?>" alt="" class="balloon">
	
			<p class="fill-brief"><span>покорить вершины легко!</span>Осталось только заполнить бриф</p>
	
		</section>
	
		<!-- end brief.html-->
		</main>
	
		<!-- end content-main.html-->
	
		<!-- start html_close-index.html-->
		</div>
	</footer>
	
	
	
<a href="#" class="scrollup"></a>
	<?php $this->endBody() ?>
</body>
</html>
<!-- end html_close-index.html-->
<?php $this->endPage() ?>
