<?php
$add_link = Yii::app()->createUrl('question/addAjax', array('id'));
?>
<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'question-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('maxlength' => 64)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'text'); ?>
        <?php echo $form->textArea($model, 'text', array('class' => 'input-block-level', 'rows' => '5')); ?>
        <?php echo $form->error($model, 'text'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'score'); ?>
        <?php echo $form->textField($model, 'score'); ?>
        <?php echo $form->error($model, 'score'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'difficulty'); ?>
        <?php
        echo $form->dropDownList(
                $model, 'difficulty', $model->getDifficulties()
        );
        ?>
        <?php echo $form->error($model, 'difficulty'); ?>
    </div><!-- row -->
    <div class="row">
    <label>Új tag hozáadása:</label>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'city',
        'source' => $this->createUrl('/tag/lookupAjax'),
        // additional javascript options for the autocomplete plugin
        'options' => array(
            'minLength' => '2',
            'select' => 'js:function(event, ui){questionVM.addTag(ui.item.tag_id, ui.item.value);}',
        ),
        'htmlOptions' => array(
            'style' => 'height:20px;'
        ),
    ));
    ?>
    </div>
    <br />
    <div data-bind="foreach: tags" >
        <span data-bind="html: name, click: function(){$root.removeTag(this)}" class="badge badge-info">
        </span> &nbsp;
    </div>
    <label><?php echo GxHtml::encode($model->getRelationLabel('quizs')); ?></label>
    <?php echo $form->checkBoxList($model, 'quizs', GxHtml::encodeEx(GxHtml::listDataEx(Quiz::model()->findAllAttributes(null, true)), false, true)); ?>

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->