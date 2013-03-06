<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/site/index.vm.js', CClientScript::POS_END);

$this->pageTitle = Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl;
?>
<h1>Dashboard</h1>
<div class="row-fluid">


    <div class="span8">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '<span class="icon-th-large"></span>Jelentkezők (utóbbi 30 nap)',
            'titleCssClass' => ''
        ));
        ?>

        <div id="quiz_chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>

        <?php $this->endWidget(); ?>
    </div><!--/span-->
    <div class="span4">
        <div class="summary">
            <ul>
                <li>
                    <div class="row-fluid">
                        <div class="span7">
                            <span class="summary-icon">
                                <img src="<?php echo $baseUrl; ?>/img/credit.png" width="36" height="36" alt="Ki Ő? pont">
                            </span>
                            <span class="summary-number"><?=$company->credit?></span>
                            <span class="summary-title"> Ki ő? pont</span>
                        </div>
                        <div class="span4">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiButton', array(
                                'name' => 'deposit',
                                'caption' => 'Feltölt',
                                'buttonType' => 'link',
                                'url' => Yii::app()->createUrl('question/index'),
                                'value' => 'button1',
                                'htmlOptions' => array(
                                    'class' => 'btn-primary ui-button ui-widget ui-state-default ui-corner-all',
                                ),
                            ));
                            ?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row-fluid">
                        <div class="span7">
                            <span class="summary-icon">
                                <img src="<?php echo $baseUrl; ?>/img/page_white_edit.png" width="36" height="36" alt="Összes teszt">
                            </span>
                            <span class="summary-number"><?=count($company->quizs)?></span>
                            <span class="summary-title"> Összes teszt</span>
                        </div>
                        <div class="span4">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiButton', array(
                                'name' => 'update',
                                'caption' => 'Módosít',
                                'buttonType' => 'link',
                                'url' => Yii::app()->createUrl('quiz/index'),
                                'value' => 'button1',
                                'htmlOptions' => array(
                                    'class' => 'btn-primary ui-button ui-widget ui-state-default ui-corner-all',
                                ),
                            ));
                            ?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row-fluid">
                        <div class="span7">
                            <span class="summary-icon">
                                <img src="<?php echo $baseUrl; ?>/img/group.png" width="36" height="36" alt="Összes jelentkező">
                            </span>
                            <span class="summary-number"><?=$company->countFilledQiuzzes()?></span>
                            <span class="summary-title"> Összes jelentkező</span>
                        </div>
                        <div class="span4">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiButton', array(
                                'name' => 'view',
                                'caption' => 'Megnéz',
                                'buttonType' => 'link',
                                'url' => Yii::app()->createUrl('candidate/index'),
                                'value' => 'button1',
                                'htmlOptions' => array(
                                    'class' => 'btn-primary ui-button ui-widget ui-state-default ui-corner-all',
                                ),
                            ));
                            ?>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</div>
<legend>Legutóbbi teszt kitöltések</legend>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            /* 'type'=>'striped bordered condensed', */
            'htmlOptions' => array('class' => 'table table-striped table-bordered table-condensed'),
            'dataProvider' => $dataProvider,
            'template' => "{items} {pager}",
            'columns' => array(
                array('name' => 'ResultPercentage', 'header' => 'Eredmény'),
                array('name' => 'quiz.name', 'header' => 'Kitöltött teszt'),
                array('name' => 'duration', 'header' => 'Időtartam'),
                array('name' => 'date_created', 'header' => 'Dátum'),
                array(
                    'class'=>'CLinkColumn',
                    'header'=> 'Ki ő?',
                    'label' => 'Részletek',
                    'url'=> Yii::app()->createUrl('site/index'),
                ),
            ),
        ));
        ?>
    </div>
    
</div><!--/row-->
<script>
    var chartData = <?=  CJSON::encode($chartData)?>
</script>