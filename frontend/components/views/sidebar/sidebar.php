<?php
use common\models\BlogSlider;
use yii\helpers\Url;

/**
 * @var BlogSlider[] $slider
 * @var BlogSlider $all
 */

?>
<div id="sidebar" class="blog-single__aside sidebar">
	<div class="sidebar__inner sidebarBlog">
		<?php if ($all): ?>
			<div class="blog-single__gallery">
				<img class="blog-item-img" src="<?= $all->file ?>" height="210"/>
				<a class="blog__link" href="<?= Url::to(['/blog']); ?>"><span
						class="blog-link-pc"><?= $all->title ?></span><span
						class="blog-link-mob">Все новости</span></a>
			</div>
		<?php endif; ?>
		<div class="blog-single__other">
			<h3 class="blog-single__other-title">Другие новости</h3>
			<?php foreach ($slider as $key => $value): ?>
				<?php if ($value->options): ?>
					<div class="blog__item blog__item_design blog__slider--slide">
						<img src="<?= Yii::$app->resizeImage->resizeImage($value->file) ?>">
						<div class="slide__title">
							<h3 class="slide__post-title"><?= $value->title ?></h3>
							<time
								class="slide__post-time"><?= BlogSlider::getTime(strtotime($value->date)); ?></time>
						</div>
						<div class="slide__hover">
							<span class="dotdot"><?= $value->strCrop() ?></span>
							<a href="<?= Url::to(['/blog', 'slug' => $value->slug]) ?>">Читать
								далее</a>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>