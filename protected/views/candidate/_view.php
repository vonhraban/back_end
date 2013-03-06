<div id="view_<?=$data->quiz_result_id?>">
<div class="view" >
    <div class="controls-row">
        <span class="span9">
            <span class="lead">        
                <?php echo $data->resultPercentage; ?>
            </span>
        </span>
        <span class="span1">
            <?php
            $link = Yii::app()->createUrl(
                    'quiz/addQuestionAjax',
                    array(
                        'quiz_id' => 'replace_quiz_id',
                        'challenge_id' => 'replace_challenge_id'
                    )
            );
            $this->widget('zii.widgets.jui.CJuiButton', array(
                'name' => 'edit_' . $data->quiz_result_id,
                'caption' => 'Megnéz',
                'buttonType' => 'link',
                'value' => 'button1',
                'url' => Yii::app()->createUrl('candidate/view', array('id' => $data->quiz_result_id)),
                'htmlOptions' => array(
                    'class' => ' btn-success ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
                ),
            ));
            ?>
        </span>
    </div>
    <br />
    <?=$data->quiz->name?>
    <br/>
    <br/>
    <div class="controls-row">
        <span class="span9">
            <?php echo GxHtml::encode($data->getAttributeLabel('duration')); ?>:
            <?php echo GxHtml::encode(GxHtml::valueEx($data, 'duration')) . ' perc'; ?>
        </span>
        <span class="span2"><?=$data->date?></span>
    </div>
</div>
</div>
