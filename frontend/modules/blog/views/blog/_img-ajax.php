<?php
/**
 * @var \frontend\modules\blog\models\Blog $value
 */
use yii\helpers\Url;

?>
<img class="blog__block-img lazy"
	 src="<?= Url::to(Yii::$app->resizeImage->resizeImage($value->file)) ?>"
	 alt=""
>
