<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 23.05.2018
 * Time: 10:21
 */
/**
* @var $more object
 */

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;
use tpmanc\imagick\Imagick;

$img = Url::to('@web/img/');
$n         = 0;
$home = (Url::home(true));
?>
<?php  foreach($more as $key => $value):?>
	<?php $n++;?>
	<?php
		$path = str_replace(basename($value['file']), '', $value['file']);
		$image = Yii::getAlias('@frontend/web/'.$path.rawurldecode(basename($value['file'])));
		Imagick::open($image)->resize(300, false)->saveTo(Yii::getAlias('@frontend/web/uploads/thumbnail/'.rawurldecode(basename($value['file']))));
	?>
	<div class="grid-item grid-item_hidden">
		<figure class="photoGrid">
			<?php $w = getimagesize($home.$value['file'])[0] ?? '';
			$h = getimagesize($home.$value['file'])[1] ?? '';
			?>
			<a href="<?=$value['file']?>" class="portfolio-open-image" data-size="<?=$w?>x<?=$h?>"></a>
			<a href="<?=Url::to(['single-portfolio', 'slug' => $value['slug']])?>">
				<img src="<?=$home.'uploads/thumbnail/'.basename($value['file'])?>">
			</a>
		</figure>
		<span class="full-size">
                                            <img src="<?=$img?>full-size.svg" width="20" height="20" alt="">
                                        </span>
		<div class="grid-item__links">
			<a href="<?=Url::to(['single-portfolio', 'slug' => $value['slug']])?>" class="dotportfolio"><?=$value['title']?></a>
			<a data-pin-do="buttonPin" data-pin-custom="true" data-pin-log="button_pinit" data-pin-href="https://ru.pinterest.com/pin/create/button?guid=zm1Vh8DTZiLD-1&amp;url=https%3A%2F%2Fweb-artcraft.com%2Fportfolio&amp;media=undefined&amp;description=%D0%9F%D0%BE%D1%80%D1%82%D1%84%D0%BE%D0%BB%D0%B8%D0%BE%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%20%D0%B2%D0%B5%D0%B1-%D1%81%D1%82%D1%83%D0%B4%D0%B8%D0%B8%20Craft%20Group%3A%20%D0%B4%D0%B8%D0%B7%D0%B0%D0%B9%D0%BD%20%D1%81%D0%B0%D0%B9%D1%82%D0%BE%D0%B2%20%D0%B8%20%D1%83%D0%BF%D0%B0%D0%BA%D0%BE%D0%B2%D0%BA%D0%B8%2C%20%D1%81%D0%BE%D0%B7%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5%20%D0%BB%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF%D0%BE%D0%B2%20%D0%B8%20%D0%BB%D0%B5%D0%BD%D0%B4%D0%B8%D0%BD%D0%B3-%D0%BF%D0%B5%D0%B9%D0%B4%D0%B6.">
				<img src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png" style="width: 25px; height: 25px; border-radius: 50%">
			</a>
		</div>
	</div>
<?php endforeach;?>
		<input type="hidden" id="countItems" data-count="<?=$n?>" value="<?=$n?>">
<?php die();?>