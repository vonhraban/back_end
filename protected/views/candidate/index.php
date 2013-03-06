<?php

$this->breadcrumbs = array(
    Yii::t('app', 'Jelentkezők'),
);
?>

<h1><?php echo GxHtml::encode('Jelentkezők'); ?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'viewData' => array(
    ),
));