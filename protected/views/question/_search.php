<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'question_id'); ?>
		<?php echo $form->textField($model, 'question_id', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'company_id'); ?>
		<?php echo $form->dropDownList($model, 'company_id', GxHtml::listDataEx(Company::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'text'); ?>
		<?php echo $form->textArea($model, 'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'score'); ?>
		<?php echo $form->textField($model, 'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'difficulty'); ?>
		<?php echo $form->textField($model, 'difficulty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_created'); ?>
		<?php echo $form->textField($model, 'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_updated'); ?>
		<?php echo $form->textField($model, 'date_updated'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
