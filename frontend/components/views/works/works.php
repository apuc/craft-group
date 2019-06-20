<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 29.05.19
 * Time: 14:24
 */

use yii\helpers\Url;
Yii::setAlias('@site', \yii\helpers\Url::to(Yii::getAlias('@frontend/'), true) . 'views/site');
$path = \yii\helpers\Url::to('/', true);
$path = substr($path, 0, -1);
?>
<?php if(!empty($portfolio)): ?>
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
                                    <img src="<?= $value->file ?>" alt="">
                                </a>
                                <span></span>
                            </div>
                            <?php $i++;
                            ?>
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

<?php endif; ?>
