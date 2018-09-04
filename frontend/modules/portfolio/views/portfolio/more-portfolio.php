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

$img = Url::to('@web/img/');
$n         = 0;
$home = (Url::home(true));
?>
<?php  foreach($more as $key => $value):?>
	<?php $n++;?>
	<div class="grid-item">
		<a class="grid-item__watch" href="<?=Url::to(['single-portfolio', 'slug' => $value->slug])?>">
			Посмотреть работу
		</a>

		<a class="grid-item__fancybox" href="<?=$value->file?>" data-fancybox="images" data-caption="
			<div class='portfolio__block-caption'>
				<span><?=$value->title?></span>
				<a href='#'>Смотреть работу на <span class='gradient'>behance.ru</span></a>
			</div">

				<span class="magnifier">
					<img src="<?=$img?>/full-size.svg" width="20" height="20" alt="">
				</span>
		</a>
		<?php
			if(getimagesize ($home.$value['file'])[1] > 450)
			{
				$height = 450;
			}else {
				$height = getimagesize ($home.$value['file'])[1];
			}
			$width = 510;
		?>
		<?= EasyThumbnailImage::thumbnailImg(
			$home . $value['file'],
			$width, $height,
			EasyThumbnailImage::THUMBNAIL_OUTBOUND, ['class' => 'grid-item__img']); ?>
		<div class="grid-item__links">
			<a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/" data-pin-custom="true"><img src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png" style="width: 25px; height: 25px; border-radius: 50%;"></a>
		</div>
	</div>
<?php endforeach;?>
		<input type="hidden" id="countItems" data-count="<?=$n?>" value="<?=$n?>">
<?php die();?>