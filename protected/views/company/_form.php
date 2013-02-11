<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'company-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 64)); ?>
		<?php echo $form->error($model,'name'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('companyUsers')); ?></label>
		<?php echo $form->checkBoxList($model, 'companyUsers', GxHtml::encodeEx(GxHtml::listDataEx(CompanyUser::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('questions')); ?></label>
		<?php echo $form->checkBoxList($model, 'questions', GxHtml::encodeEx(GxHtml::listDataEx(Question::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('quizs')); ?></label>
		<?php echo $form->checkBoxList($model, 'quizs', GxHtml::encodeEx(GxHtml::listDataEx(Quiz::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->