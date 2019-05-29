<?php
/**
 * @var string $idName
 * @var $widget frontend\components\SendFormWidget
 */
?>
<div class="<?= $widget->upload_file_wrapper_title?>"style="display: inline-flex;">

		<?= $this->render('_delItem', ['widget' => $widget]) ?>

		<div class= "<?php echo $widget->upload_file_container_title ?>" id="upload_file_id"></div>
</div>