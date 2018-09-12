<?php

/* @var $this yii\web\View
 * @var Portfolio[] $portfolio
 * @var $contacts array
 * @var $title string
 * @var $desc string
 * @var Main[] $main
 * @var $b_cur object
 */
use common\models\Main;
use common\models\Portfolio;
use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

$home = (Url::home(true));
$this->title = $title;
?>

<!-- start content-main.html-->
<main>
    <!-- start portfolio.html-->
    <section class="portfolio" id="portfolio">

        <div class="animate-circle">
            <p>
                <a href="https://www.behance.net/CraftGroup" target="_blank"> <img src="img/be.png" alt=""></a>
                <span>Больше уникального дизайна в нашем профиле. Только свежие и качественные работы.</span>
            </p>
        </div>

        <div class="container">
            <p class="paragraph">наши работы</p>

            <div class="wrap">
                <div class="tittle">
                    <span class="block_span_title">портфолио</span>
                    <h2 class="block_title">наши работы</h2>
                    <p>
                        Мы готовы предложить вам все виды наших услуг. <br>
                        Знайте: для каждого клиента у нас есть особое предложение.
                    </p>
                </div>
                <?php $class = ['soc', 'angel', 'scrubb', 'loft', 'chair']; ?>
                <div class="portfolio__gallery">
                    <?php $i = 0;
                    foreach ($portfolio as $key => $value): ?>
                        <?php if ($value->h1 == 'all'): ?>
                            <div class="gallery__block portfolio-link">
                                <img src="<?= $value['file'] ?>">
                                <a class="gallery__block-link"
                                   href="<?= Url::toRoute(['/portfolio']); ?>"><?= $value['title'] ?></a>
                                <span></span>
                            </div>
                        <?php elseif ($value->h1 != 'brief'): ?>
                            <div class="gallery__block portfolio-<?= $class[$i] ?> portfolio-link">
                                <a href="<?= Url::toRoute(['/portfolio/' . $value->slug]); ?>">
                                    <?= EasyThumbnailImage::thumbnailImg(
                                        $home . $value->file,
	                                    getimagesize ($home.$value->file)[0],
	                                    getimagesize ($home.$value->file)[1],
                                        EasyThumbnailImage::THUMBNAIL_OUTBOUND); ?>
                                </a>
                                <span></span>
                            </div>
                            <?php $i++; ?>
                        <?php else: ?>
                            <?php if ($value->h1 == 'brief'): ?>
                                <div class="gallery__block portfolio__brief portfolio-link">
                                    <h2>
                                        <a class="scroll" href="#brief">
                                            <?= $value->title ?><span></span>
                                        </a>
                                    </h2>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end portfolio.html-->
    <!-- start results.html-->
    <section class="results" id="results">
        <div class="container">
            <?= $main[0]->description ?>
        </div>
        <div class="animate-circle"></div>

    </section>
    <!-- end results.html-->
    <!-- start discounts.html-->
    <section class="discounts" id="discounts">
        <?= $main[1]->description ?>
    </section>
    <!-- end discounts.html-->
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
                            Перестаньте платить деньги за процесс. Получите гарантированный результат.
                        </p>
                    </div>
                </div>
            </div>
            <div class="brief__content">
                <?= \frontend\components\SendFormWidget::widget([
                    'subject' => \frontend\models\SendForm::USULUGI,
                    'isLabels' => true,
                    'messageLabel' => 'Сообщение'
                ]) ?>
	            <div class="brief-massage">
		            <button class="brief-massage-close">
			            <span></span>
			            <span></span>
		            </button>
		            <img src="/img/massage_success.png">
		            <h2>Бриф отправлен!</h2>
		            <p>Ожидайте, скоро мы с вами свяжемся.</p>
		            <p>А пока вы можете посмотреть <a href="<?= Url::toRoute(['/portfolio']); ?>">наши работы</a></p>
	            </div>
            </div>
        </div>
    </section>
</main>
<!-- end brief.html-->
<!-- start blog.html-->
<?php $curr_blog = $this->params['curr_blog'] ?? '';
;?>
<?= \frontend\components\BlogWidget::widget(['curr_blog' => $curr_blog]);?>