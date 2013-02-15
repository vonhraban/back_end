<?php
$this->breadcrumbs = array(
    Question::label(2),
    Yii::t('app', 'Index'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Question::label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage') . ' ' . Question::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Question::label(2)); ?></h1>

<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'question-form',
        'method' => 'get',
        'action' => Yii::app()->createUrl('question/index'),
	'enableAjaxValidation' => false,
)); ?>
    <label><input type="radio" name="category" onClick="$('#question-form').submit()" value="all" <?=$all_checked?> /> Minden kérdés</label>
    <label><input type="radio" name="category" onClick="$('#question-form').submit()" value="private" <?=$private_checked?> /> Saját kérdések</label>
    <label><input type="radio" name="category" onClick="$('#question-form').submit()" value="public" <?=$public_checked?> /> Beépített kérdések</label>
<?php $this->endWidget(); ?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
