<?php
/**
 * @var $feedback [] \common\models\Feedback
 */

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
                    'textButton' => 'Опубликовать',
                    'fileExtension' => 'jpg, jpeg, png'
                ]) ?>
            </div>

        </div>

    </section>


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
                                    <?= $item->description ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="feedback-block-down slider-nav">
                        <?php foreach ($feedback as $value): ?>
                            <div class="feedback-down-item">
                                <img class="feedback-down-img" src="img/3.png">
                                <div class="feedback-down-wrap">
                                    <p class="feedback-down-name"><?= $value->name ?></p>
                                    <p class="feedback-down-site">www.site.ru</p>
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
            </div>

        </div>

    </section>
    <!-- end brief.html-->

    <!-- start blog.html-->
    <section class="brief brief_footer blog" id="blog">


        <div class="container">

            <p class="paragraph paragraph-blog">наш блог</p>

            <div class="wrap">

                <div class="tittle">
                    <span class="block_span_title">актуальное </span>
                    <h2 class="block_title">в нашием блоге</h2>
                    <p>
                        Мы ответственно относимся к любой работе и уделяем достаточно внимания
                        всем клиентам. Поэтому обратившись за продвижением вашего сайта к нам,
                        Вы можете быть уверены в том, что специалисты позаботятся о вашем ресурсе.
                    </p>
                </div>

                <div class="blog__slider-content">
                    <div class="blog__block-link_main">
                        <img src="img/current.jpg" alt="">
                        <a class="blog__link" href="blog.html"><span
                                class="blog-link-pc">Посмотреть все новости</span><span class="blog-link-mob">Все новости</span></a>
                    </div>

                    <div class="blog__slider--wrap">

                        <div class="blog__slider--slide">
                            <img src="img/blog2.png" alt="">
                            <div class="slide__title">
                                <h3 class="slide__post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Repellendus, repudiandae!</h3>
                                <time class="slide__post-time">7 часов назад</time>
                            </div>
                            <div class="slide__hover">
                                <span class="dotdot">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span>
                                <a href="single-blog.html">Читать далее</a>
                            </div>
                        </div>

                        <div class="blog__slider--slide">
                            <img src="img/blog3.png" alt="">
                            <div class="slide__title">
                                <h3 class="slide__post-title">Lorem ipsum dolor sit amet.</h3>
                                <time class="slide__post-time">7 часов назад</time>
                            </div>
                            <div class="slide__hover">
                                <span class="dotdot">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span>
                                <a href="single-blog.html">Читать далее</a>
                            </div>

                        </div>

                        <div class="blog__slider--slide">
                            <img src="img/blog1.png" alt="">
                            <div class="slide__title">
                                <h3 class="slide__post-title ">Lorem ipsum dolor sit amet.</h3>
                                <time class="slide__post-time">7 часов назад</time>
                            </div>
                            <div class="slide__hover">
                                <span class="dotdot">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span>
                                <a href="single-blog.html">Читать далее</a>
                            </div>
                        </div>

                        <div class="blog__slider--slide">
                            <img src="img/blog2.png" alt="">
                            <div class="slide__title">
                                <h3 class="slide__post-title ">Lorem ipsum dolor sit amet.</h3>
                                <time class="slide__post-time">7 часов назад</time>
                            </div>
                            <div class="slide__hover">
                                <span class="dotdot">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span>
                                <a href="single-blog.html">Читать далее</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="animate-circle"></div>

        <img src="img/balloon.png" alt="" class="balloon">

        <p class="fill-brief">покорить вершины легко!</p>


    </section>
    <!-- end blog.html-->

</main>