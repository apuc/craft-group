<?php
/**
 * @var $feedback [] \common\models\Feedback
 */
Yii::setAlias('@files', \yii\helpers\Url::to('/', true) . 'uploads/feedback');
?>
<?php if (!empty($feedback)): ?>
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
									<?= $item->message ?>
								</p>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="feedback-block-down slider-nav">
						<?php foreach ($feedback as $value): ?>
							<div class="feedback-down-item">
								<img class="feedback-down-img"
									 src="<?= Yii::getAlias('@files/') . $value->files->name ?>"
									 style="width: 103px; height: 105px"
								>
								<div class="feedback-down-wrap">
									<p class="feedback-down-name"><?= $value->name ?></p>
									<p class="feedback-down-site"><?= $value->site ?></p>
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
<?php endif; ?>