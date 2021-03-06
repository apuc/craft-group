<?php

use yii\helpers\Html;
use  yii\helpers\Url;
use common\models\BlogSlider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var \frontend\modules\blog\models\Blog[] $blog
 * @var $title string
 * @var $count integer
 * @var $blog object
 */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::getAlias('@web') . '/js/lazyload.js', [
//	'depends' => [\frontend\assets\CommonAsset::className()],
	'position' => \yii\web\View::POS_HEAD
]);

$img = Url::to('@web/img/');
?>
<!-- start blog-page.html-->
<main class="all-news">
	<section class="blog blog__single" id="blog">
		<div class="container">

			<p class="paragraph">наш блог</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?= Url::to(['/']) ?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr">Блог</span>
			</nav>

			<div class="wrap wrap-services">

				<div class="tittle">
					<span>актуальное </span>
					<h2>в нашем блоге</h2>
					<p>
                        Команда Craft Group собирает информацию, которая может стать полезной как клиентам компании, так и тем, кто уделяет внимание формату развлекательных публикаций. Присоединяйся, будет интересно.
					</p>
				</div>
				<div class="blog__blocks">
					<?= $this->render('_blog', [
						'blog' => $blog,
						'img'=>'_img'
					]) ?>
				</div>

				<button type="button" class="more_btn more_blog" id="curButton" data-page="0">
					Загрузить ещё
					<div class='sk-fading-circle sk-fading-circle-position'>
						<div class='sk-circle sk-circle-1'></div>
						<div class='sk-circle sk-circle-2'></div>
						<div class='sk-circle sk-circle-3'></div>
						<div class='sk-circle sk-circle-4'></div>
						<div class='sk-circle sk-circle-5'></div>
						<div class='sk-circle sk-circle-6'></div>
						<div class='sk-circle sk-circle-7'></div>
						<div class='sk-circle sk-circle-8'></div>
						<div class='sk-circle sk-circle-9'></div>
						<div class='sk-circle sk-circle-10'></div>
						<div class='sk-circle sk-circle-11'></div>
						<div class='sk-circle sk-circle-12'></div>
					</div>
				</button>

			</div>

		</div>
	</section>

	<!-- start brief.html-->
	<section class="service-brief" id="brief">

		<div class="container">
			<div class="brief__head">
				<p class="paragraph">наш бриф</p>
				<div class="wrap">
					<div class="tittle">
						<span class="block_span_title">закажи</span>
						<h2 class="block_title">услугу</h2>
						<p>
                            Хватит выбрасывать деньги на ветер – плати за результат.
						</p>
					</div>
				</div>
			</div>
			<div class="brief__content">
				<?= \frontend\components\SendFormWidget::widget([
					'subject' => \frontend\models\SendForm::USULUGI,
					'isLabels' => true,
					'messageLabel' => 'Сообщение',
                    'upload_file_delete_title' => 'delItem delete_item2',
                    'upload_file_btn_class' => 'btn-input-file button_input2',
                    'upload_file_wrapper_title' => 'itemWrapper wrapper_item2',
                    'upload_file_container_title' => 'itemTitle title_item2',
                    'upload_file_container_id' => 'wrapperCont content_wrapper2',
                    'upload_file_submit_id' => 'submit2',
                    'upload_file_input_class' => 'input-file file_input2'
				]) ?>
			</div>
		</div>
	</section>
	<!-- end brief.html-->
</main>