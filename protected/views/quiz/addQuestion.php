<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/quiz/addQuestion.vm.js', CClientScript::POS_END);
?>

<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model) => array('quiz/view', 'id' => $model->quiz_id),
    'Kérdés hozzáadása',
);
?>
<h1><?php echo GxHtml::encode(Question::label(2)); ?></h1>
<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $questions,
	'itemView'=>'_question',
        'viewData' => array(
            'quiz' => $model,
        ),
)); 
?>