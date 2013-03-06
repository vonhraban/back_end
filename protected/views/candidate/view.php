<?php

$this->breadcrumbs = array(
    Yii::t('app', 'Jelentkezők') => array('candidate/index'),
    Yii::t('app', 'Jelentkező'),
);
?>

<h1><?php echo GxHtml::encode('Jelentkező'); ?></h1>
<div class="row-fluid">
    <div class="span3">
        ########@#####.com
    </div>
    <div class="span5">
        <?php
        $this->widget('zii.widgets.jui.CJuiButton', array(
                'name' => 'edit_' . $model->quiz_result_id,
                'caption' => 'Ki ő?',
                'value' => 'button1',
                'htmlOptions' => array(
                    'class' => ' btn-success ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
                ),
            ));
        ?>
    </div>
    <div class="span3">
        <div><legend><?=$model->quiz->name?></legend></div>
        <div><h1><?=$model->resultPercentage?></h1></div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <table class="table table-striped table-bordered">
          <tbody>
            <?php
            foreach ($tagsScore as $score) {
                $percentage = ($score['result_score'] / $score['max_score']) * 100;
            ?>
              <tr>
              <td width="50%">
                  <span class="badge badge-info"><?=$score['name']?></span>
                  <?=  number_format($percentage)?>%
              </td>
              <td>
              	<div class="progress progress-danger">
                  <div class="bar" style="width: <?=$percentage?>%"></div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        
        
    </div>
</div>
