<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.08.18
 * Time: 16:25
 */
/**
* @var BlogSlider[] $blog
 * @var $b_cur object
 */

use common\models\BlogSlider;
use yii\helpers\Url;
?>

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

                <?php if ($b_cur): ?>
                    <div class="blog__block-link_main">
                        <img src="<?= $b_cur->file ?>">
	                    <a class="blog__link" href="<?= Url::to(['/blog']); ?>">
		                    <span class="blog-link-pc"><?= $b_cur->title ?></span>
		                    <span class="blog-link-mob">Все новости</span>
	                    </a>
                    </div>
                <?php endif; ?>
                <div class="blog__slider--wrap">
                    <?php foreach ($blog as $key => $value): ?>
                        <?php if ($value->options): ?>
                            <div class="blog__slider--slide">
                                <img src="<?= Yii::$app->resizeImage->resizeImage($value->file) ?>">
                                <div class="slide__title">
                                    <h3 class="slide__post-title"><?= $value->title ?></h3>
                                    <time
                                        class="slide__post-time"><?= $value->getTime(); ?></time>
                                </div>
                                <div class="slide__hover">
                                    <span class="dotdot"><?= $value->strCrop() ?></span>
                                    <a href="<?= Url::to(['/blog', 'slug' => $value->slug]) ?>">Читать далее</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </div>

    <div class="animate-circle"></div>

    <img src="<?= Url::to('img/balloon.png', true); ?>" alt="" class="balloon">
    <p class="fill-brief">Покорить вершины легко!</p>
</section>