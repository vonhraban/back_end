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
                'caption' => 'Módosít',
                'buttonType' => 'link',
                'value' => 'button1',
                'url' => Yii::app()->createUrl('question/update', array('id' => $data->question_id)),
                'htmlOptions' => array(
                    'class' => 'btn btn-primary',
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
    <div>
        <?php foreach ($data->tags as $tag) { ?>
        <span class="badge badge-info"><?=$tag->name?></span>
        <?php } ?>
    </div>
</div>
</div>