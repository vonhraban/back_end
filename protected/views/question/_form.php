<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'question-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->dropDownList($model, 'company_id', GxHtml::listDataEx(Company::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'company_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 64)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model, 'text'); ?>
		<?php echo $form->error($model,'text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model, 'score'); ?>
		<?php echo $form->error($model,'score'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'difficulty'); ?>
		<?php echo $form->textField($model, 'difficulty'); ?>
		<?php echo $form->error($model,'difficulty'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model, 'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'date_updated'); ?>
		<?php echo $form->textField($model, 'date_updated'); ?>
		<?php echo $form->error($model,'date_updated'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('options')); ?></label>
		<?php echo $form->checkBoxList($model, 'options', GxHtml::encodeEx(GxHtml::listDataEx(Option::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('tags')); ?></label>
		<?php echo $form->checkBoxList($model, 'tags', GxHtml::encodeEx(GxHtml::listDataEx(Tag::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('quizs')); ?></label>
		<?php echo $form->checkBoxList($model, 'quizs', GxHtml::encodeEx(GxHtml::listDataEx(Quiz::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->