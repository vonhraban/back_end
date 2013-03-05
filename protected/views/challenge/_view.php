<div id="view_<?=$data->challenge_id?>">
<div class="view" >
    <div class="controls-row">
        <span class="span9">
            <span class="lead">        
                <?php echo GxHtml::encode($data->name); ?>
            </span>
        </span>
        <span class="span1">
            <?php
            if ($quiz_id) {
                $link = Yii::app()->createUrl(
                    'quiz/toggleChallengeAjax',
                    array(
                        'quiz_id' => 'replace_quiz_id',
                        'challenge_id' => 'replace_challenge_id'
                    )
                );
                $this->widget('zii.widgets.jui.CJuiButton', array(
                    'name' => 'add_' . $data->challenge_id,
                    'caption' => ($data->isInQuiz($quiz_id)) ? 'Kivesz' :'Hozzáad',
                    'value' => 'button1',
                    'htmlOptions' => array(
                        'class' => ($data->isInQuiz($quiz_id)) ?
                            'btn-danger ui-button ui-widget ui-state-default ui-corner-all' :
                            'btn-primary ui-button ui-widget ui-state-default ui-corner-all',
                        'onclick' => 'indexVM.toggle("' . $link . '",' . $quiz_id . ' , ' . $data->challenge_id . ')'
                    ),
                ));
            }
            ?>
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
                'name' => 'edit_' . $data->challenge_id,
                'caption' => 'Megnéz',
                'buttonType' => 'link',
                'value' => 'button1',
                'url' => Yii::app()->createUrl('challenge/view', array('id' => $data->challenge_id, 'quiz_id' => $quiz_id)),
                'htmlOptions' => array(
                    'class' => ' btn-success ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
                ),
            ));
            ?>
        </span>
    </div>
    <br />
    <?=$data->getShortDesc()?>
    <br/>
    <br/>
    <div class="controls-row">
        <span class="span2">
            <?php echo GxHtml::encode($data->getAttributeLabel('difficulty')); ?>:
            <?php echo GxHtml::encode(GxHtml::valueEx($data, 'difficulty')); ?>
        </span>
        <span class="span7">&nbsp;</span>
    </div>
</div>
</div>
