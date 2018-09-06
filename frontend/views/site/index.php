<?php

/* @var $this yii\web\View */
/**
 * @var $blog array
 * @var $portfolio array
 * @var $contacts array
 * @var $title string
 * @var $desc string
 * @var $main object
 * @var $b_cur object
 */
use yii\helpers\Url;
use common\models\BlogSlider;
use himiklab\thumbnail\EasyThumbnailImage;

$home = (Url::home(true));
$this->title = $title;
$this->registerJsFile('/js/fine-uploader.min.js');
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
                        <?php if ($value['h1'] == 'all'): ?>
                            <div class="gallery__block portfolio-link">
                                <img src="<?= $value['file'] ?>">
                                <a class="gallery__block-link"
                                   href="<?= Url::toRoute(['/portfolio']); ?>"><?= $value['title'] ?></a>
                                <span></span>
                            </div>
                        <?php elseif ($value['h1'] != 'brief'): ?>
                            <div class="gallery__block portfolio-<?= $class[$i] ?> portfolio-link">
                                <a href="<?= Url::toRoute(['/portfolio/' . $value['slug']]); ?>">
                                    <?= EasyThumbnailImage::thumbnailImg(
                                        $home . $value['file'],
	                                    getimagesize ($home.$value['file'])[0],
	                                    getimagesize ($home.$value['file'])[1],
                                        EasyThumbnailImage::THUMBNAIL_OUTBOUND); ?>
                                </a>
                                <span></span>
                            </div>
                            <?php $i++; ?>
                        <?php else: ?>
                            <?php if ($value['h1'] == 'brief'): ?>
                                <div class="gallery__block portfolio__brief portfolio-link">
                                    <h2>
                                        <a class="scroll" href="#brief">
                                            <?= $value['title'] ?><span></span>
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
                <!--<form id="send_form" class="service__form" enctype="multipart/form-data">
					<input type="hidden" name="filePath" id="filePath">
					<div class="service__form-head">
						<div class="service__form-head_item">
							<label for="name">Ваше имя, фамилия *</label>
							<input class="service__form_input"  id="name" name="name" type="text" placeholder="Ваше имя" required >
						</div>

						<div class="service__form-head_item">
							<label for="phone">Ваш номер телефона *</label>
							<input class="service__form_input js_phone-mask" id="phone" type="tel" name="phone" placeholder="Номер телефона" required>
						</div>

						<div class="service__form-head_item">
							<label for="mail">Ваш e-mail *</label>
							<input class="service__form_input" id="mail" type="email" name="email" placeholder="Ваш Email" required>
						</div>

						<div class="service__form-head_item">
							<label for="skype">Ваш skype</label>
							<input class="service__form_input" id="skype" type="text" name="skype" placeholder="Ваш Skype">
						</div>
					</div>

					<div class="service__form-radio">
						<div class="service__form-radio_text">
							<p>Какие услуги Вас интересуют?</p>
						</div>
						<div class="service__form-radio-button">
							<div class="service__form-radio-itemL">
								<div class="service__form-radio-item service__form-radio-item1">
									<label class="checkbox-item">Готовое решение
										<input type="checkbox" name="radio" value="Готовое решение">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Интернет-магазин
										<input type="checkbox" name="radio" value="Интернет-магазин">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item2">
									<label class="checkbox-item">Индивидуальный проект
										<input type="checkbox" name="radio" value="Индивидуальный проект">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Корпоративные системы
										<input type="checkbox" name="radio" value="Корпоративные системы">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item3">
									<label class="checkbox-item">Landing page
										<input type="checkbox" name="radio" value="Landing page">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">UI/UX Design
										<input type="checkbox" name="radio" value="UI/UX Design">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="service__form-radio-itemR">
								<div class="service__form-radio-item service__form-radio-item4">
									<label class="checkbox-item">Поддержка
										<input type="checkbox" name="radio" value="Поддержка">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Логотип
										<input type="checkbox" name="radio" value="Логотип">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item5">
									<label class="checkbox-item">Репутационный маркетинг
										<input type="checkbox" name="radio" value="Репутационный маркетинг">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Полиграфическая продукция
										<input type="checkbox" name="radio" value="Полиграфическая продукция">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="service__form-radio-item service__form-radio-item6">
									<label class="checkbox-item">Брендинг и айдентика
										<input type="checkbox" name="radio" value="c">
										<span class="checkmark"></span>
									</label>
									<label class="checkbox-item">Digital Design
										<input type="checkbox" name="radio" value="Digital Design">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="service__form-message" lang="ru">
						<div class="service__form-textarea">
							<label for="message">Сообщение</label>
							<textarea id="message" name="message" placeholder="Ваше сообщение"></textarea>
						</div>
						<div class="service__form-file">
							<div class="btn-file__wrap">
								<input type="file" class="input-file">
								<div class="btn-input-file">
									<img src="<? /*=Url::to('@web/img/clip-black.png');*/ ?>" alt="" width="25" height="25">
									<span>Прикрепить файл</span>
								</div>
							</div>
							<span class="service__form-files">jpg, jpeg, png. gif, zip, rar, pdf, doc, xls</span>
						</div>
						<div id="fine-uploader" class="uploader"></div>
					</div>
					<div class="service__form-desc">
						<span class="service__form-desc_span">Нажимая кнопку «Отправить» я даю свое <span class="service__form-desc_red">согласие на обработку персональных данных</span></span>
						<input class="service__form-submit send" id="submit" type="submit" value="Отправить бриф">
					</div>
				</form>-->
            </div>
        </div>
    </section>
</main>
<!-- end brief.html-->
<!-- start blog.html-->
<?= \frontend\components\BlogWidget::widget()?>