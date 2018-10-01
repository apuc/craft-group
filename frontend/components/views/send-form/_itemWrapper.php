<?php
/**
 * @var string $idName
 * @var $widget frontend\components\SendFormWidget
 */
?>
<div class="<?= $idName?>" style="display: inline-flex;">
	<?php if ($widget->subject === \frontend\models\SendForm::FEEDBACK): ?>
		<?= $this->render('_delItem', ['className' => 'delItem2', 'widget' => $widget]) ?>
	<?php else: ?>
		<?= $this->render('_delItem', ['className' => 'delItem', 'widget' => $widget]) ?>
	<?php endif; ?>
	
	<?php if ($widget->subject === \frontend\models\SendForm::FEEDBACK): ?>
		<div class="itemTitle2"></div>
	<?php else: ?>
		<div class="itemTitle"></div>
	<?php endif; ?>
</div>