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

    <?= \frontend\components\WorksWidget::widget([
            'portfolio' => $portfolio,
    ]) ?>
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