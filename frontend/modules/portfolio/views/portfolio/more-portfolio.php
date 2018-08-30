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

$img = Url::to('@web/img/');
$n         = 0;
?>
	<?php  foreach($more as $key => $value):?>
		<?php $n++;?>
		<div class="grid-item">
			<div class="photoGrid">
				<img class="grid-item__img" src="<?=$value->file?>">
			</div>
			<span>
												<img src="<?=$img?>full-size.svg" width="20" height="20" alt="">
											</span>
			<div class="grid-item__links">
				<a class="dotportfolio" href="<?=Url::to(['single-portfolio', 'slug' => $value->slug])?>"><?=$value->title?></a>
				<a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/" data-pin-custom="true"><img src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png" style="width: 25px; height: 25px;"></a>
			</div>
		</div>
	<?php endforeach;?>
		<input type="hidden" id="countItems" data-count="<?=$n?>" value="<?=$n?>">
<?php die();?>