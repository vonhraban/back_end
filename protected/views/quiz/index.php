<?php
$this->breadcrumbs = array(
    Quiz::label(2),
    Yii::t('app', 'Index'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Quiz::label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage') . ' ' . Quiz::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Quiz::label(2)); ?></h1>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "CGridview - Row hovering",
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
                array('name' => 'active', 'header' => 'Aktív'),
                array('name' => 'date_updated', 'header' => 'Utolsó módosítás'),
                array('name' => 'dailyStats', 'header' => 'Próbálkozások (utóbbi 1 hét)', 'type' => 'raw'),
                array(
                    'class' => 'CLinkColumn',
                    'label' => 'Megtekint',
                    'header' => 'Részletek',
                    'urlExpression' => 'Yii::app()->createUrl("quiz/view",array("id"=>$data->quiz_id))'
                ),
                array(
                    'class' => 'CLinkColumn',
                    'label' => 'Szerkesztés',
                    'header' => 'Módosít',
                    'urlExpression' => 'Yii::app()->createUrl("quiz/update",array("id"=>$data->quiz_id))'
                ),
            ),
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>