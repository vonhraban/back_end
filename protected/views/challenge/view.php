<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/codemirror.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/util/loadmode.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/mode/clike/clike.js', CClientScript::POS_HEAD); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl . '/js/codemirror.css'; ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl . '/js/twilight.css'; ?>"/>

<?php
$testLink = Yii::app()->createUrl('challenges/testSolution');

$this->breadcrumbs = array(
    Quiz::label(2),
    Yii::t('app', 'Index'),
);

?>
<h1><?=$model->name?></h1>

<?=$model->description?>
<?php
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'button1',
    'caption' => 'Vissza',
    'buttonType' => 'link',
    'value' => 'button1',
    'url' => Yii::app()->createUrl('challenge/index', array('quiz_id' => $_GET['quiz_id'])),
    'htmlOptions' => array(
        'class' => ' btn-success ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
    ),
));
?>