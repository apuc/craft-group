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

use cybercog\yii\googleanalytics\widgets\GATracking;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use backend\modules\contacts\models\Contacts;


$contacts = Contacts::find()->asArray()->all();
$logo = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'logo'])->one();
$phone = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'phone'])->one();
$email = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'email'])->one();
$about = \common\models\Menu::find()->where(['page'=>'about'])->all();
$menu = \common\models\Menu::find()->where(['page'=> 'other'])->orderBy(['position'=> SORT_ASC])->all();

AppAsset::register($this);

$active = Url::to();
if(explode('/',$active)) {
	$active = explode('/',$active); $active = "/".$active[1];
}

?>
<?php $this->beginPage() ?>
<!-- start html_open-index.html-->
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
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
 <?= GATracking::widget([
	 		'trackingId' => 'UA-67894795-1',
    	]) ?>
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
		<div class="header__logo logo">
			<a href="/">
				<?=$logo->file;?>
			</a>
		</div>
		<div class="container">
			<div class="header__mobile-btn"><span></span></div>

			<ul class="header__nav">
				<li class="header__logo header__logo_mobile logo">
					<a href="/">
						<?=$logo->file;?>
					</a>
				</li>
				
				<ul class="header__nav-container">
					<?php foreach ($menu as $value):?>
						<li class="<?= ($active == $value->href) ? 'active-page': ''?> header__nav-li"><a href="<?=Url::to($value->href);?>"><?=$value->title?></a></li>
					<?php endforeach;?>
					<li class="header__nav-li dropdown <?= ($active=='/about') ? 'active-page': ''?>">
						<a href="<?=Url::to('/about');?>">О нас</a>
						<button class="dropdown_mob">></button>
						<ul class="header__submenu header__submenu_mob">
							<?php foreach ($about as $val):?>
								<li><a href="<?=Url::to($val->href);?>"><?=$val->title?></a></li>
							<?php endforeach;?>
						</ul>
					</li>
					<li class="header__nav-li"><a class="scroll" href="#brief">Контакты</a></li>
				</ul>
				<li class="header__callback header__callback_mobile">
<!--					<img class="header__callback_img" src="--><?//=Url::to('img/phone-ico.png')?><!--" alt="">-->
					<svg class="header-phone" version="1.1" id="phone" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve">
                <style type="text/css">
	                .st0{fill:#FF4834;}
                </style>
						<path class="st0" d="M20,0C9,0,0,8.9,0,20c0,11,9,20,20,20s20-9,20-20C40,8.9,31,0,20,0z M29.6,26.5l-2.8,2.8
                  c-0.1,0.1-0.3,0.3-0.5,0.4c-0.2,0.1-0.4,0.2-0.6,0.2c0,0-0.1,0-0.1,0c-0.1,0-0.2,0-0.3,0c-0.3,0-0.7,0-1.3-0.1
                  c-0.6-0.1-1.3-0.3-2.2-0.7c-0.9-0.4-1.8-0.9-2.9-1.6c-1.1-0.7-2.3-1.7-3.5-2.9c-1-1-1.8-1.9-2.4-2.8c-0.6-0.9-1.2-1.7-1.6-2.4
                  c-0.4-0.7-0.7-1.4-0.9-2c-0.2-0.6-0.3-1.1-0.4-1.6c-0.1-0.4-0.1-0.8-0.1-1c0-0.3,0-0.4,0-0.4c0-0.2,0.1-0.4,0.2-0.6
                  c0.1-0.2,0.2-0.4,0.4-0.5l2.8-2.8c0.2-0.2,0.4-0.3,0.7-0.3c0.2,0,0.3,0.1,0.5,0.2c0.1,0.1,0.3,0.2,0.4,0.4l2.2,4.3
                  c0.1,0.2,0.2,0.5,0.1,0.7c-0.1,0.3-0.2,0.5-0.4,0.7l-1,1c0,0-0.1,0.1-0.1,0.1c0,0.1,0,0.1,0,0.2c0.1,0.3,0.2,0.6,0.4,1
                  c0.2,0.3,0.4,0.7,0.8,1.2c0.3,0.5,0.8,1,1.5,1.7c0.6,0.6,1.2,1.1,1.7,1.5c0.5,0.4,0.9,0.6,1.2,0.8c0.3,0.2,0.6,0.3,0.8,0.3l0.3,0.1
                  c0,0,0.1,0,0.1,0s0.1,0,0.1-0.1l1.2-1.2c0.3-0.2,0.5-0.3,0.9-0.3c0.2,0,0.4,0,0.6,0.1h0l4.1,2.4c0.3,0.2,0.5,0.4,0.5,0.7
                  C29.9,26,29.9,26.3,29.6,26.5z"/>
                </svg>
					<div class="header__callback_text">
						<span class="header__callback_top"><?=$phone->description ?? ''?></span>
						<button class="header__callback_bottom">Заказать обратный звонок</button>
					</div>
				</li>
			</ul>
		</div>
		<div class="header__callback">
<!--			<img class="header__callback_img" src="--><?//=Url::to('img/phone-ico2.png')?><!--" width="50px" height="50px" alt="">-->
			<svg class="header-phone" version="1.1" id="phone" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve">
	        <style type="text/css">
		        .st0{fill:#FF4834;}
	        </style>
				<path class="st0" d="M20,0C9,0,0,8.9,0,20c0,11,9,20,20,20s20-9,20-20C40,8.9,31,0,20,0z M29.6,26.5l-2.8,2.8
		          c-0.1,0.1-0.3,0.3-0.5,0.4c-0.2,0.1-0.4,0.2-0.6,0.2c0,0-0.1,0-0.1,0c-0.1,0-0.2,0-0.3,0c-0.3,0-0.7,0-1.3-0.1
		          c-0.6-0.1-1.3-0.3-2.2-0.7c-0.9-0.4-1.8-0.9-2.9-1.6c-1.1-0.7-2.3-1.7-3.5-2.9c-1-1-1.8-1.9-2.4-2.8c-0.6-0.9-1.2-1.7-1.6-2.4
		          c-0.4-0.7-0.7-1.4-0.9-2c-0.2-0.6-0.3-1.1-0.4-1.6c-0.1-0.4-0.1-0.8-0.1-1c0-0.3,0-0.4,0-0.4c0-0.2,0.1-0.4,0.2-0.6
		          c0.1-0.2,0.2-0.4,0.4-0.5l2.8-2.8c0.2-0.2,0.4-0.3,0.7-0.3c0.2,0,0.3,0.1,0.5,0.2c0.1,0.1,0.3,0.2,0.4,0.4l2.2,4.3
		          c0.1,0.2,0.2,0.5,0.1,0.7c-0.1,0.3-0.2,0.5-0.4,0.7l-1,1c0,0-0.1,0.1-0.1,0.1c0,0.1,0,0.1,0,0.2c0.1,0.3,0.2,0.6,0.4,1
		          c0.2,0.3,0.4,0.7,0.8,1.2c0.3,0.5,0.8,1,1.5,1.7c0.6,0.6,1.2,1.1,1.7,1.5c0.5,0.4,0.9,0.6,1.2,0.8c0.3,0.2,0.6,0.3,0.8,0.3l0.3,0.1
		          c0,0,0.1,0,0.1,0s0.1,0,0.1-0.1l1.2-1.2c0.3-0.2,0.5-0.3,0.9-0.3c0.2,0,0.4,0,0.6,0.1h0l4.1,2.4c0.3,0.2,0.5,0.4,0.5,0.7
		          C29.9,26,29.9,26.3,29.6,26.5z"/>
            </svg>
			<div class="header__callback_text">
				<span class="header__callback_top"><?=$phone->description ?? ''?></span>
				<button class="header__callback_bottom">Заказать обратный звонок</button>
			</div>
		</div>
	</header>

	<!-- end header-service.html-->
	
	<?= $content?>
	
	<section class="footer-section">

		<div class="footer-copyri">
			<div class="footer-copyright">
				<div class="footer-copyright-left">
					<?php foreach ($contacts as $key => $value){?>
						<?php if($value['name'] == 'footer'){?>
							<?=$value['file']?>
						<?php }?>
					<?php }?>
				</div>
				<div class="footer-copyright-right">
					<div class="footer-phone">
						<p><?=$phone->description ?? '';?></p>
						<p><?=$email->description ?? ''?></p>
					</div>
				</div>
				<div class="footer-socmenu">
					<?php $vk = '<svg class="fab" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <path class="path-fab" d="M256,512c-68.38,0-132.667-26.629-181.019-74.981S0,324.38,0,256S26.629,123.333,74.981,74.981
          S187.62,0,256,0s132.667,26.629,181.019,74.981S512,187.62,512,256s-26.629,132.667-74.981,181.019S324.38,512,256,512z M256,9.827
          C120.26,9.827,9.827,120.26,9.827,256S120.26,502.173,256,502.173S502.173,391.74,502.173,256S391.74,9.827,256,9.827z"/>
        <path d="M408.543,338.24c-0.387-0.834-0.745-1.519-1.081-2.076c-5.525-9.946-16.09-22.159-31.671-36.636
          l-0.326-0.338l-0.17-0.16l-0.168-0.168h-0.16c-7.074-6.746-11.557-11.279-13.434-13.594c-3.429-4.421-4.202-8.904-2.325-13.434
          c1.33-3.429,6.299-10.661,14.925-21.722c4.531-5.853,8.128-10.554,10.771-14.09c19.13-25.428,27.418-41.676,24.874-48.75
          l-0.984-1.651c-0.667-0.992-2.373-1.908-5.136-2.732c-2.763-0.834-6.301-0.974-10.613-0.417l-47.758,0.328
          c-0.766-0.267-1.877-0.249-3.309,0.089c-1.44,0.328-2.165,0.496-2.165,0.496l-0.824,0.42l-0.656,0.496
          c-0.557,0.328-1.163,0.903-1.829,1.737c-0.656,0.827-1.211,1.798-1.648,2.902c-5.207,13.376-11.109,25.807-17.748,37.303
          c-4.093,6.856-7.85,12.798-11.277,17.827c-3.429,5.027-6.301,8.736-8.616,11.109c-2.325,2.376-4.421,4.284-6.301,5.713
          c-1.888,1.442-3.317,2.048-4.312,1.829c-0.995-0.229-1.938-0.448-2.821-0.667c-1.552-0.992-2.793-2.345-3.727-4.063
          c-0.944-1.709-1.58-3.867-1.908-6.469c-0.328-2.595-0.527-4.831-0.588-6.708c-0.048-1.877-0.02-4.541,0.089-7.96
          c0.109-3.429,0.17-5.754,0.17-6.965c0-4.205,0.079-8.766,0.239-13.683c0.168-4.92,0.308-8.814,0.417-11.687
          c0.109-2.872,0.168-5.912,0.168-9.122c0-3.2-0.198-5.713-0.585-7.543c-0.379-1.819-0.964-3.587-1.74-5.306
          c-0.776-1.709-1.908-3.04-3.399-3.973c-1.491-0.944-3.338-1.689-5.546-2.246c-5.861-1.323-13.325-2.038-22.386-2.157
          c-20.559-0.219-33.767,1.114-39.631,3.986c-2.325,1.211-4.421,2.872-6.299,4.968c-1.987,2.435-2.267,3.765-0.834,3.984
          c6.637,0.995,11.328,3.371,14.101,7.125l0.992,1.997c0.776,1.432,1.552,3.976,2.318,7.621c0.773,3.648,1.272,7.682,1.488,12.104
          c0.557,8.069,0.557,14.976,0,20.73c-0.544,5.742-1.071,10.224-1.57,13.424c-0.496,3.21-1.241,5.802-2.236,7.799
          c-0.992,1.989-1.659,3.2-1.997,3.648c-0.328,0.438-0.605,0.715-0.824,0.824c-1.44,0.557-2.93,0.834-4.482,0.834
          c-1.539,0-3.419-0.773-5.635-2.325c-2.206-1.549-4.5-3.676-6.876-6.39c-2.373-2.702-5.057-6.487-8.049-11.356
          c-2.981-4.861-6.07-10.603-9.28-17.242l-2.653-4.808c-1.661-3.091-3.925-7.593-6.797-13.515c-2.872-5.912-5.416-11.625-7.621-17.161
          c-0.885-2.315-2.216-4.083-3.986-5.306l-0.824-0.496c-0.557-0.438-1.44-0.906-2.653-1.412c-1.221-0.496-2.483-0.855-3.816-1.074
          l-45.431,0.328c-4.64,0-7.792,1.053-9.45,3.149l-0.667,0.995c-0.328,0.557-0.496,1.44-0.496,2.653c0,1.224,0.328,2.712,0.995,4.482
          c6.637,15.581,13.841,30.615,21.641,45.092c7.792,14.49,14.558,26.146,20.302,34.988c5.754,8.845,11.605,17.191,17.578,25.031
          c5.973,7.85,9.926,12.88,11.854,15.095c1.938,2.216,3.46,3.864,4.561,4.968l4.144,3.984c2.653,2.653,6.548,5.833,11.697,9.529
          c5.136,3.706,10.832,7.354,17.072,10.951c6.25,3.587,13.513,6.517,21.811,8.784c8.288,2.267,16.357,3.18,24.207,2.732h19.069
          c3.864-0.328,6.797-1.549,8.784-3.645l0.656-0.824c0.445-0.666,0.862-1.692,1.241-3.073c0.387-1.379,0.585-2.9,0.585-4.559
          c-0.109-4.752,0.249-9.033,1.073-12.849c0.824-3.806,1.768-6.678,2.824-8.616c1.053-1.938,2.234-3.567,3.566-4.889
          c1.32-1.33,2.267-2.127,2.821-2.404c0.547-0.28,0.984-0.468,1.323-0.588c2.653-0.883,5.772-0.018,9.369,2.574
          c3.589,2.605,6.957,5.802,10.117,9.618c3.149,3.816,6.937,8.1,11.348,12.849c4.431,4.749,8.298,8.288,11.605,10.613l3.32,1.987
          c2.216,1.333,5.088,2.544,8.626,3.648c3.536,1.112,6.627,1.391,9.28,0.834l42.452-0.666c4.192,0,7.461-0.695,9.776-2.076
          c2.325-1.381,3.699-2.903,4.144-4.551c0.448-1.661,0.468-3.538,0.089-5.645C409.308,340.538,408.922,339.067,408.543,338.24
          L408.543,338.24z"/>
      </svg>';
					$fb = '<svg class="fab" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
        <path class="path-fab" d="M207,653c-68.38,0-132.667-26.629-181.019-74.981C-22.371,529.667-49,465.38-49,397
          s26.629-132.667,74.981-181.019C74.333,167.629,138.62,141,207,141s132.667,26.629,181.019,74.981
          C436.371,264.333,463,328.62,463,397s-26.629,132.667-74.981,181.019C339.667,626.371,275.38,653,207,653z M207,150.827
          C71.26,150.827-39.173,261.26-39.173,397S71.26,643.173,207,643.173S453.173,532.74,453.173,397S342.74,150.827,207,150.827z"/>
        <path d="M280.252,250.556l-38-0.057c-42.686,0-70.28,28.307-70.28,72.109v33.252h-38.209
          c-3.288,0-5.967,2.663-5.967,5.967v48.181c0,3.288,2.679,5.967,5.967,5.967h38.209v121.559c0,3.288,2.679,5.967,5.982,5.967h49.831
          c3.303,0,5.982-2.679,5.982-5.967V415.975h44.668c3.304,0,5.971-2.679,5.971-5.967l0.027-48.181c0-1.577-0.64-3.094-1.756-4.226
          c-1.116-1.116-2.633-1.741-4.226-1.741h-44.683v-28.188c0-13.545,3.231-20.423,20.869-20.423l25.601-0.015
          c3.304,0,5.967-2.678,5.967-5.967v-44.725C286.204,253.235,283.541,250.572,280.252,250.556L280.252,250.556z M280.252,250.556"/>
      </svg>';
					$inst = '<svg class="fab" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
      <g>
        <path class="path-fab" d="M256,512c-68.38,0-132.667-26.629-181.019-74.981S0,324.38,0,256S26.629,123.333,74.981,74.981
          S187.62,0,256,0s132.667,26.629,181.019,74.981S512,187.62,512,256s-26.629,132.667-74.981,181.019S324.38,512,256,512z M256,9.827
          C120.26,9.827,9.827,120.26,9.827,256S120.26,502.173,256,502.173S502.173,391.74,502.173,256S391.74,9.827,256,9.827z"/>
        <g>
          <path d="M298.458,142.778h-84.917c-39.076,0-70.764,31.688-70.764,70.764v84.917
            c0,39.076,31.688,70.764,70.764,70.764h84.917c39.076,0,70.764-31.688,70.764-70.764v-84.917
            C369.222,174.466,337.534,142.778,298.458,142.778z M347.993,298.458c0,27.315-22.22,49.535-49.535,49.535h-84.917
            c-27.315,0-49.535-22.22-49.535-49.535v-84.917c0-27.315,22.22-49.535,49.535-49.535h84.917c27.315,0,49.535,22.22,49.535,49.535
            V298.458z"/>
          <path d="M256,199.389c-31.263,0-56.611,25.348-56.611,56.611s25.348,56.611,56.611,56.611
            s56.611-25.348,56.611-56.611S287.263,199.389,256,199.389z M256,291.382c-19.503,0-35.382-15.879-35.382-35.382
            c0-19.517,15.879-35.382,35.382-35.382s35.382,15.865,35.382,35.382C291.382,275.503,275.503,291.382,256,291.382z"/>
          <circle style="fill:#FFFFFF;" cx="316.857" cy="195.143" r="7.543"/>
        </g>
      </g>
      </svg>';
					$inst = '<svg class="fab" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
      <g>
        <path class="path-fab" d="M256,512c-68.38,0-132.667-26.629-181.019-74.981S0,324.38,0,256S26.629,123.333,74.981,74.981
          S187.62,0,256,0s132.667,26.629,181.019,74.981S512,187.62,512,256s-26.629,132.667-74.981,181.019S324.38,512,256,512z M256,9.827
          C120.26,9.827,9.827,120.26,9.827,256S120.26,502.173,256,502.173S502.173,391.74,502.173,256S391.74,9.827,256,9.827z"/>
        <g>
          <path d="M298.458,142.778h-84.917c-39.076,0-70.764,31.688-70.764,70.764v84.917
            c0,39.076,31.688,70.764,70.764,70.764h84.917c39.076,0,70.764-31.688,70.764-70.764v-84.917
            C369.222,174.466,337.534,142.778,298.458,142.778z M347.993,298.458c0,27.315-22.22,49.535-49.535,49.535h-84.917
            c-27.315,0-49.535-22.22-49.535-49.535v-84.917c0-27.315,22.22-49.535,49.535-49.535h84.917c27.315,0,49.535,22.22,49.535,49.535
            V298.458z"/>
          <path d="M256,199.389c-31.263,0-56.611,25.348-56.611,56.611s25.348,56.611,56.611,56.611
            s56.611-25.348,56.611-56.611S287.263,199.389,256,199.389z M256,291.382c-19.503,0-35.382-15.879-35.382-35.382
            c0-19.517,15.879-35.382,35.382-35.382s35.382,15.865,35.382,35.382C291.382,275.503,275.503,291.382,256,291.382z"/>
          <circle style="fill:#FFFFFF;" cx="316.857" cy="195.143" r="7.543"/>
        </g>
      </g>
      </svg>';
					?>
					<?php foreach ($contacts as $key => $value){?>
						<?php if($value['name'] == 'social'){?>
							<?php switch($value['file']){
								case 'vk':
									echo '<a href="'.$value['description'].'" class="fab">'.$vk.'</a>';
									break;
								case 'facebook':
									echo '<a href="'.$value['description'].'" class="fab">'.$fb.'</a>';
									break;
								case 'instagram':
									echo '<a href="'.$value['description'].'" class="fab">'.$inst.'</a>';
									break;
							}
							?>
						<?php }?>
					<?php }?>
					<!--							<a href="#" class="fab fa-vk"></a>-->
					<!--							<a href="#" class="fab fa-facebook-f"></a>-->
					<!--							<a href="#" class="fab fa-instagram"></a>-->
				</div>
			</div>
		</div>

	</section>
	<!-- end footer-copyright.html-->
	
	<?php $this->endBody() ?>
	<a href="#" class="scrollup"></a>
</body>
</html>
<!-- end html_close-index.html-->
<?php $this->endPage() ?>
