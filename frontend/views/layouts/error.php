<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.08.18
 * Time: 10:34
 *
 *
 * @var $content string
 */
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$contacts = \backend\modules\contacts\models\Contacts::find()->asArray()->all();
$phone = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'phone'])->one();
$email = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'email'])->one();
$logo = \backend\modules\contacts\models\Contacts::find()->where(['name' => 'logo'])->one();
$about = \common\models\Menu::find()->where(['page'=>'about'])->all();
$menu = \common\models\Menu::find()->where(['page'=> 'other'])->orderBy(['position'=> SORT_ASC])->all();

\frontend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!-- start html_open.html-->
<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <?php $this->head() ?>
</head>
<body class="">
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

<!-- start header.html-->
<header class="header">
    <div class="header__logo logo"><a href="/">
            <?= $logo->file; ?>
        </a>
    </div>
    <div class="container">
        <div class="header__mobile-btn"><span></span></div>

        <ul class="header__nav">
            <li class="header__logo header__logo_mobile logo">
                <a href="/">
                    <?= $logo->file; ?>
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
                <svg class="header-phone" version="1.1" id="phone" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #FF4834;
                    }
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
                    <span class="header__callback_top"><?=$phone->description?></span>
                    <button class="header__callback_bottom">Заказать обратный звонок</button>
                </div>
            </li>
        </ul>
    </div>
    <div class="header__callback">
        <svg class="header-phone" version="1.1" id="phone" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve">
        <style type="text/css">
            .st0 {
                fill: #FF4834;
            }
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
            <span class="header__callback_top"><?=$phone->description?></span>
            <button class="header__callback_bottom">Заказать обратный звонок</button>
        </div>
    </div>
</header>
<!-- end header.html-->

<!-- start content-404.html-->
<section class="not-found">
    <div class="not-found__error">
        <div class="not-found__error-text">
            <p class="not-found__error-numbers">
                <span class="not-found__error-number not-found__error-number_dark">4</span><span
                    class="not-found__error-number not-found__error-number_light">0</span><span
                    class="not-found__error-number not-found__error-number_dark">4</span>
            </p>
        </div>

        <div class="not-found__error-dog">
            <img src="img/dog.png" alt="">

        </div>
    </div>

    <div class="not-found__desc">
        <p class="not-found__desc-text"><strong class="not-found__desc-text_strong">О нет!</strong> Что-то пошло не так
            и эта ссылка не работает!</p>
        <p class="not-found__desc-text not-found__desc-text_small">Но вы всегда можете <a class="not-found__desc-link"
                                                                                          href="/">вернуться на
                главную</a></p>
    </div>
</section>
<!-- end content-404.html-->

<!-- start html_close.html-->
<a href="#" class="scrollup"></a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<!-- end html_close.html-->
