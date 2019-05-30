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
                    Команда Craft Group собирает информацию, которая может стать полезной как клиентам компании, так и тем, кто уделяет внимание формату развлекательных публикаций. Присоединяйся, будет интересно.
                </p>
            </div>

            <div class="blog__slider-content">
                <?php if ($b_cur): ?>
                    <div class="blog__block-link_main">
                        <span class="blog-main__title">актуальное <br> в блоге</span>
                        <a class="blog__link" href="/blog">Все новости</a>
                    </div>
                <?php endif; ?>
                <div class="blog__slider--wrap">
                    <?php foreach ($blog as $key => $value): ?>
                        <?php if ($value->options): ?>
                            <div class="blog__slider--slide">
                                <?php !file_exists($value->file) ? $value->file = '/uploads/global/unknown2.png' : ""; ?>
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
    <p class="fill-brief">Покорять вершины легко!</p>
</section>