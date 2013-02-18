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
    <?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Cimkék",
	));
	
    ?>
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
    <div data-bind="foreach: tags" >
        &nbsp;<span data-bind="html: name, click: function(){$root.removeTag(this)}" class="badge badge-info">
        </span>
    </div>
    <br/>
    <?php $this->endWidget(); ?>
    <input type="hidden" name="options" data-bind="value: ko.toJSON(questionVM.options)">
    <?php $this->endWidget(); ?>
    <?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Válaszlehetőségek",
	));
	
    ?>
    <form data-bind="submit: $root.addOption">
        <input type="text" class="input-xxlarge" data-bind="value: newOption" placeholder="Új válaszlehetőség" />
        <input type="submit" value="Hozzáad">
    </form>
    <ol data-bind="foreach: options" >
        <li>
            <input type="checkbox" data-bind="checked: correct">
            <input type="text" class="input-xxlarge" data-bind="value: text" />
            <i class="icon icon-remove" data-bind="click: $root.removeQuestion" ></i>
        </li>
    </ol>
    <?php $this->endWidget();?>
    <?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'form_submit',
        'caption' => 'Mentés',
        'value' => 'button1',
        'htmlOptions' => array(
            'class' => 'btn btn-primary',
            'onclick' => '$("#question-form").submit();',
        ),
    ));
    ?>
</div><!-- form -->