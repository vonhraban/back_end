<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="page-header">
    <h1><small>Bejelentkezés az </small>InfinitLoop<small> fiókodba</small></h1>
</div>
<div class="row-fluid">
	
    <div class="span6 offset3">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Belépési adatok",
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
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
            <p class="hint">
                Minden mező megadása kötelező!
            </p>
        </div>
    
        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>
    
        <div class="row buttons">
            <?php echo CHtml::submitButton('Login',array('class'=>'btn btn btn-primary')); ?>
        </div>
        <p class="hint">
            Ha még nincs felhasználó fiókod, akkor <?=  CHtml::link('itt létrehozhatsz egyet', array('site/registration'))?>.
        </p>
    
    <?php $this->endWidget(); ?>
    </div><!-- form -->

<?php $this->endWidget();?>

    </div>

</div>