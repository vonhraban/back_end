<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/challenge/index.vm.js', CClientScript::POS_END);

$this->breadcrumbs = array(
    Quiz::label(2),
    Yii::t('app', 'Index'),
);
?>

<h1><?php echo GxHtml::encode('Programozási faladatok'); ?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'viewData' => array(
            'quiz_id' => $quiz->quiz_id,
            'btn' => '',
        ),
));