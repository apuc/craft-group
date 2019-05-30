<?php
/**
 * @var \frontend\modules\portfolio\models\Portfolio $portfolio
 */
use yii\helpers\Url;
$home = (Url::home(true));
$img = Url::to('@web/img/');
?>
<div class="wrapper">
	<div class="grid_p">
		<?php if ($portfolio): ?>
			<?php foreach ($portfolio as $key => $value): ?>
				<?php if ($key <= $count - 1): ?>
					<div class="grid-item">
						<figure class="photoGrid">
                        <?php if(file_exists(Yii::getAlias('@frontend/web').$value->getFile())): ?>
							<a href="<?= $value->getFile() ?>"
							   data-size="<?= $value->getImageOriginal()->getWidth() ?>x<?= $value->getImageOriginal()->getHeight() ?>"
							   class="portfolio-open-image"></a>
                            <a href="<?= Url::to(['single-portfolio', 'slug' => $value->slug]) ?>">
                                <img src="<?= $home . $value->getThumbnailUrl() ?>">
                        <?php else: ?>
                            <a href="<?= Url::to(['single-portfolio', 'slug' => $value->slug]) ?>">
                                <img src="<?= '/uploads/global/unknown2.png' ?>">
                        <?php endif;?>
							</a>
						</figure>
										<span class="full-size">
                                            <img src="<?= $img ?>full-size.svg" width="20" height="20" alt="">
                                        </span>
						<div class="grid-item__links">
							<a href="<?= Url::to(['single-portfolio', 'slug' => $value->slug]) ?>"
							   class="dotportfolio"><?= $value->title ?></a>
							<a data-pin-do="buttonPin" data-pin-custom="true"
							   data-pin-log="button_pinit"
							   data-pin-href="https://ru.pinterest.com/pin/create/button?guid=zm1Vh8DTZiLD-1&amp;url=https%3A%2F%2Fweb-artcraft.com%2Fportfolio&amp;media=undefined&amp;description=%D0%9F%D0%BE%D1%80%D1%82%D1%84%D0%BE%D0%BB%D0%B8%D0%BE%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%20%D0%B2%D0%B5%D0%B1-%D1%81%D1%82%D1%83%D0%B4%D0%B8%D0%B8%20Craft%20Group%3A%20%D0%B4%D0%B8%D0%B7%D0%B0%D0%B9%D0%BD%20%D1%81%D0%B0%D0%B9%D1%82%D0%BE%D0%B2%20%D0%B8%20%D1%83%D0%BF%D0%B0%D0%BA%D0%BE%D0%B2%D0%BA%D0%B8%2C%20%D1%81%D0%BE%D0%B7%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5%20%D0%BB%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF%D0%BE%D0%B2%20%D0%B8%20%D0%BB%D0%B5%D0%BD%D0%B4%D0%B8%D0%BD%D0%B3-%D0%BF%D0%B5%D0%B9%D0%B4%D0%B6.">
								<img
									src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png"
									style="width: 25px; height: 25px; border-radius: 50%">
							</a>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>