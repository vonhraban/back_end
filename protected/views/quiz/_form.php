<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'quiz-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'company_id'); ?>
        <?php echo $form->dropDownList($model, 'company_id', GxHtml::listDataEx(Company::model()->findAllAttributes(null, true))); ?>
        <?php echo $form->error($model, 'company_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('maxlength' => 64)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'text'); ?>
        <?php echo $form->textArea($model, 'text'); ?>
        <?php echo $form->error($model, 'text'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'active'); ?>
        <?php echo $form->checkBox($model, 'active'); ?>
        <?php echo $form->error($model, 'active'); ?>
    </div><!-- row -->
    <div class="row">
        <label><?php echo 'Link: ' . Yii::app()->createAbsoluteUrl('quiz/takeQuiz', array('hash' => $model->hash))?></label>
    </div>

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->