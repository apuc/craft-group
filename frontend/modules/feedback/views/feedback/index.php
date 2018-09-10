<?php
/**
 * @var $feedback [] \common\models\Feedback
 */
use yii\helpers\Url;

Yii::setAlias('@files', \yii\helpers\Url::to('/', true) . 'uploads/feedback');
?>

<main class="main-service	">
    <!-- start feedback.html-->
    <section class="service-brief feedback-brief" id="brief">

        <div class="container">
            <div class="brief__head">
                <p class="paragraph">резюме</p>

                <nav class="broadcrumbs">
                    <a class="broadcrumbs__link" href="<?= \yii\helpers\Url::to(['/']) ?>">Главная</a>
                    <span class="broadcrumbs__divider"> / </span>
                    <a class="broadcrumbs__link" href="<?= \yii\helpers\Url::to(['/about']) ?>">О нас</a>
                    <span class="broadcrumbs__divider"> / </span>
                    <span class="broadcrumbs__curr">Отзывы</span>
                </nav>

                <div class="wrap feedback-wrap">
                    <div class="tittle">
                        <span>оставьте</span>
                        <h2>свой отзыв</h2>
                    </div>
                </div>
            </div>
            <div class="brief__content">
                <?= \frontend\components\SendFormWidget::widget([
                    'subject' => \frontend\models\SendForm::FEEDBACK,
                    'messageLabel' => 'Текст вашего отзыва',
                    'messagePlaceholder' => 'Ваш отзыв',
                    'textButton' => 'Отправить',
                    'fileExtension' => 'jpg, jpeg, png',
                    'skypeOrSite' => \frontend\components\SendFormWidget::SITE,
                    'fileOrFiles' => \frontend\components\SendFormWidget::FILE
                ]) ?>
            </div>

        </div>

    </section>

    <?php if (!empty($feedback)): ?>
        <section class="blog blog__single blog_feedback feedback-section">
            <div class="container">

                <p class="paragraph paragraph-feedback">отзывы о нас</p>


                <div class="wrap">
                    <div class="tittle">
                        <span>отзывы </span>
                        <h2>наших клиентов</h2>
                        <p>
                            Мы прекрасно понимаем каким должен быть интернет-продукт и как этого добиться.
                            Мы объединяем цифровое мастерство с новаторским мышлением, чтобы
                            реализовать все ваши идеи и пожелания.
                        </p>
                    </div>
                    <div class="feedback-block">
                        <div class="feedback-block-up slider-for">
                            <?php foreach ($feedback as $item): ?>
                                <div class="feedback-up-item">
                                    <img src="img/icons/icon-feedback.png">
                                    <p class="feedback-p">
                                        <?= $item->message ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="feedback-block-down slider-nav">
                            <?php foreach ($feedback as $value): ?>
                                <div class="feedback-down-item">
                                    <img class="feedback-down-img"
                                         src="<?= Yii::getAlias('@files/') . $value->files->name ?>"
                                         style="width: 103px; height: 105px"
                                    >
                                    <div class="feedback-down-wrap">
                                        <p class="feedback-down-name"><?= $value->name ?></p>
                                        <p class="feedback-down-site"><?= $value->site ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <hr class="feedback-hr">
                    </div>
                </div>
            </div>
        </section>
        <!-- end feedback.html-->
    <?php endif; ?>

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
                    'messageLabel' => 'Сообщение',
                    'idForm' => 'send_feedback'
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
    <!-- end brief.html-->
</main>