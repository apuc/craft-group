<?php

/* @var $this yii\web\View
 * @var Portfolio[] $portfolio
 * @var $contacts array
 * @var $title string
 * @var $desc string
 * @var Main[] $main
 */
use common\models\Main;
use common\models\Portfolio;
use yii\helpers\Url;

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
                        Наилучшее подтверждение высокого качества реализации <br> проектов – сотни ярких работ, выполненных командой Craft Group.
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
                                   href="<?= Url::toRoute(['/portfolio']); ?>"><?= $value->title ?></a>
                                <span></span>
                            </div>
                        <?php elseif ($value->h1 != 'brief'): ?>
                            <div class="gallery__block portfolio-<?= $class[$i] ?> portfolio-link">
                                <a href="<?= Url::toRoute(['/portfolio/' . $value->slug]); ?>">
                                    <?= $this->render('_thumbnail', ['value'=>$value])?>
                                </a>
                                <span></span>
                            </div>
                            <?php $i++; ?>
                        <?php else: ?>
                            <?php if ($value->h1 == 'brief'): ?>
                                <div class="gallery__block portfolio__brief portfolio-link">
                                    <h2>
                                        <a class="portfolio-scroll" href="#brief">
                                           Заполнить <br> бриф<span></span>
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
                        <span class="block_span_title">закажи</span>
                        <h2 class="block_title">услугу</h2>
                        <p>
                            Хватит выбрасывать деньги на ветер – плати за результат.
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
            </div>
        </div>
    </section>

</main>
<!-- end brief.html-->
<!-- start blog.html-->
<?php $curr_blog = $this->params['curr_blog'] ?? '';
;?>
<?= \frontend\components\BlogWidget::widget(['curr_blog' => $curr_blog]);?>