<div id="view_<?=$data->question_id?>">
<div class="view" >
    <div class="controls-row">
        <span class="span10">
            <span class="lead">        
                <?php echo GxHtml::encode($data->name); ?>
            </span>
        </span>
        <span class="span1">
            <?php
            $link = Yii::app()->createUrl(
                    'quiz/addQuestionAjax',
                    array(
                        'quiz_id' => 'replace_quiz_id',
                        'question_id' => 'replace_question_id'
                    )
            );
            $this->widget('zii.widgets.jui.CJuiButton', array(
                'name' => 'add_' . $data->question_id,
                'caption' => ($data->isInQuiz($quiz->quiz_id)) ? 'Kivesz' :'Hozzáad',
                'value' => 'button1',
                'htmlOptions' => array(
                    'class' => ($data->isInQuiz($quiz->quiz_id)) ? 'btn btn-danger' :'btn btn-primary',
                    'onclick' => 'questionVM.toggle("' . $link . '",' . $quiz->quiz_id . ' , ' . $data->question_id . ')'
                ),
            ));
            ?>
        </span>
    </div>
    <br />
    <pre><?=GxHtml::encode($data->text)?></pre>
    <div class="controls-row">
        <span class="span1">
            <?php echo GxHtml::encode($data->getAttributeLabel('score')); ?>:
            <?php echo GxHtml::encode(GxHtml::valueEx($data, 'score')); ?>
        </span>
        <span class="span2">
            <?php echo GxHtml::encode($data->getAttributeLabel('difficulty')); ?>:
            <?php echo GxHtml::encode(GxHtml::valueEx($data, 'difficulty')); ?>
        </span>
        <span class="span7">&nbsp;</span>
        <span class="span1">
            Valami
        </span>
    </div>
</div>
</div>