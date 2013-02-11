<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->quiz_id)),
    array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->quiz_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'quiz_id',
        array(
            'name' => 'company',
            'type' => 'raw',
            'value' => $model->company !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->company)), array('company/view', 'id' => GxActiveRecord::extractPkValue($model->company, true))) : null,
        ),
        'name',
        'text',
        'hash',
        'active:boolean',
        'date_created',
        'date_updated',
    ),
));
?>
<?php
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'button1',
    'caption' => 'Kérdés hozzáadása',
    'value' => 'button1',
    'htmlOptions' => array('class' => 'btn btn-primary'),
    'onclick' => new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
));
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    /* 'type'=>'striped bordered condensed', */
    'itemsCssClass' => 'table table-hover',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'name', 'header' => 'Név'),
        array('name' => 'score', 'header' => 'Pontszám'),
        array('name' => 'difficulty', 'header' => 'Nehézség'),
        array(
            'class' => 'CLinkColumn',
            'label' => 'Törlés',
            'header' => 'Töröl',
            'urlExpression' => 'Yii::app()->createUrl("quiz/view",array("id"=>$data->question_id))'
        ),
    ),
));
?>