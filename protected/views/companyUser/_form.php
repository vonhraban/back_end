<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'company-user-form',
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
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('maxlength' => 128)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'date_created'); ?>
        <?php echo $form->textField($model, 'date_created'); ?>
        <?php echo $form->error($model, 'date_created'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'date_updated'); ?>
        <?php echo $form->textField($model, 'date_updated'); ?>
        <?php echo $form->error($model, 'date_updated'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->