<?php
$cs = Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/quiz/view.vm.js', CClientScript::POS_END);
?>

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
    'buttonType' => 'link',
    'caption' => 'Kérdés hozzáadása',
    'value' => 'button1',
    'htmlOptions' => array('class' => 'btn btn-primary'),
    'url' => array('quiz/addQuestion'),
    //'onclick' => new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
));
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th id="yw1_c0">
                <a class="sort-link" href="/infiniteloop/back_end/index.php/quiz/1?question_sort=name">Név</a>
            </th>
            <th id="yw1_c1">
                <a class="sort-link" href="/infiniteloop/back_end/index.php/quiz/1?question_sort=score">Pontszám</a>
            </th>
            <th id="yw1_c2">
                <a class="sort-link" href="/infiniteloop/back_end/index.php/quiz/1?question_sort=difficulty">Nehézség</a>
            </th>
            <th class="link-column" id="yw1_c3">
                Töröl
            </th>
        </tr>
    </thead>
    <tbody data-bind="foreach: questions">
        <tr class="odd">
            <td data-bind="text: name" /></td>
            <td data-bind="text: score" /></td>
            <td data-bind="text: difficulty"></td>
            <td><a href="#" data-bind="click: $root.removeQuestion">Törlés</a></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript">
    //Kezdő adatok
    var initQuestions = <?=CJSON::encode($questions)?>;
</script>