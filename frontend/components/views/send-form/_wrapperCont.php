<?php
/**
 * @var string $idName
 * @var $widget frontend\components\SendFormWidget
 */
?>
<div id="<?= $idName ?>">
	<?php if ($widget->subject === \frontend\models\SendForm::FEEDBACK): ?>
		<?= $this->render('_itemWrapper', ['idName' => 'itemWrapper2', 'widget' => $widget]) ?>
	<?php else: ?>
		<?= $this->render('_itemWrapper', ['idName' => 'itemWrapper', 'widget' => $widget]) ?>
	<?php endif; ?>
</div>