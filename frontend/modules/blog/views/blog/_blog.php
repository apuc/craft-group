<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 13.09.2018
 * Time: 11:38
 * @var \frontend\modules\blog\models\Blog[] $blog
 * @var string $img
 *
 */

use yii\helpers\Html;
use  yii\helpers\Url;
use common\models\BlogSlider;
?>

<?php if ($blog): ?>
	<?php foreach ($blog as $key => $value): ?>
		<article class="blog__block">
			<div class="blog__block-wrap">
				<a href="<?= Url::to(['single-blog', 'slug' => $value->slug]) ?>">
					<?= $this->render($img, ['value' => $value]) ?>
				</a>
				<h2 class="blog__block-title">
					<a class="blog__block-link dotdot"
					   href="<?= Url::to(['single-blog', 'slug' => $value->slug]) ?>"><?= $value->title ?></a>
				</h2>
				<p class="blog__block-text"><?= $value->strCrop(220) ?></p>
			</div>
			<footer class="blog__block-footer">
				<time
					class="blog__block-time"><?= BlogSlider::getTime(strtotime($value->date)); ?></time>
				<a class="blog__block-more"
				   href="<?= Url::to(['single-blog', 'slug' => $value->slug]) ?>">
					<span>Читать далее</span>
					<span class="blog__block-arrow"></span>
				</a>
			</footer>
		</article>

	<?php endforeach; ?>
<?php endif; ?>
