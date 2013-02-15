<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Regisztráció';
$this->breadcrumbs=array(
	'Regisztráció',
);
?>
<div class="page-header">
    <h1>InfiniteLoop <small>regisztráció</small></h1>
</div>
<div class="row-fluid">
	
    <div class="span6 offset3">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Regisztrációs adatok",
	));
	
?>

    <p>Töltsd ki a belépéshez szükséges adatokkal:</p>
    
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'password_confirm'); ?>
            <?php echo $form->passwordField($model,'password_confirm'); ?>
            <?php echo $form->error($model,'password_confirm'); ?>
            <p class="hint">
                Minden mező megadása kötelező!
            </p>
        </div>
    
        <div class="row buttons">
            <?php echo CHtml::submitButton('Regisztráció',array('class'=>'btn btn btn-primary')); ?>
        </div>
        <p class="hint">
            Ha még nincs felhasználó fiókod, akkor <?=  CHtml::link('itt létrehozhatsz egyet', array('site/registraion'))?>.
        </p>
    
    <?php $this->endWidget(); ?>
    </div><!-- form -->

<?php $this->endWidget();?>

    </div>

</div>