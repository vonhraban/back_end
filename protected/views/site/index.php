<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/site/index.vm.js', CClientScript::POS_END);

$this->pageTitle = Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl;
?>
<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id' => 1, 'firstName' => 'Mark', 'lastName' => 'Otto', 'language' => 'CSS', 'usage' => '<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id' => 2, 'firstName' => 'Jacob', 'lastName' => 'Thornton', 'language' => 'JavaScript', 'usage' => '<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id' => 3, 'firstName' => 'Stu', 'lastName' => 'Dent', 'language' => 'HTML', 'usage' => '<span class="inlinebar">1,4,4,7,5,9,10</span>'),
    array('id' => 4, 'firstName' => 'Jacob', 'lastName' => 'Thornton', 'language' => 'JavaScript', 'usage' => '<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id' => 5, 'firstName' => 'Stu', 'lastName' => 'Dent', 'language' => 'HTML', 'usage' => '<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id' => 6, 'firstName' => 'Mark', 'lastName' => 'Otto', 'language' => 'CSS', 'usage' => '<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id' => 7, 'firstName' => 'Jacob', 'lastName' => 'Thornton', 'language' => 'JavaScript', 'usage' => '<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id' => 8, 'firstName' => 'Stu', 'lastName' => 'Dent', 'language' => 'HTML', 'usage' => '<span class="inlinebar">1,4,4,7,5,9,10</span>'),
    array('id' => 9, 'firstName' => 'Jacob', 'lastName' => 'Thornton', 'language' => 'JavaScript', 'usage' => '<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id' => 10, 'firstName' => 'Stu', 'lastName' => 'Dent', 'language' => 'HTML', 'usage' => '<span class="inlinebar">1,3,4,5,3,5</span>'),
        ));
?>
<div class="row-fluid">


    <div class="span6">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '<span class="icon-th-large"></span>Jelentkezők (utóbbi 30 nap)',
            'titleCssClass' => ''
        ));
        ?>

        <div id="quiz_chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>

        <?php $this->endWidget(); ?>
    </div><!--/span-->
    <div class="span3">
        <div class="summary">
            <ul>
                <li>
                    <span class="summary-icon">
                        <img src="<?php echo $baseUrl; ?>/img/credit.png" width="36" height="36" alt="Ki Ő? pont">
                    </span>
                    <span class="summary-number"><?=$company->credit?></span>
                    <span class="summary-title"> Ki Ő? pont</span>
                </li>
                <li>
                    <span class="summary-icon">
                        <img src="<?php echo $baseUrl; ?>/img/page_white_edit.png" width="36" height="36" alt="Összes teszt">
                    </span>
                    <span class="summary-number"><?=count($company->quizs)?></span>
                    <span class="summary-title"> Összes teszt</span>
                </li>
                <li>
                    <span class="summary-icon">
                        <img src="<?php echo $baseUrl; ?>/img/group.png" width="36" height="36" alt="Összes jelentkező">
                    </span>
                    <span class="summary-number"><?=$company->countFilledQiuzzes()?></span>
                    <span class="summary-title"> Összes jelentkező</span>
                </li>

            </ul>
        </div>

    </div>
</div>

<div class="row-fluid">
    <div class="span6">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            /* 'type'=>'striped bordered condensed', */
            'htmlOptions' => array('class' => 'table table-striped table-bordered table-condensed'),
            'dataProvider' => $gridDataProvider,
            'template' => "{items}",
            'columns' => array(
                array('name' => 'id', 'header' => '#'),
                array('name' => 'firstName', 'header' => 'First name'),
                array('name' => 'lastName', 'header' => 'Last name'),
                array('name' => 'language', 'header' => 'Language'),
                array('name' => 'usage', 'header' => 'Usage', 'type' => 'raw'),
            ),
        ));
        ?>
    </div>
    
    <div class="span6">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '<span class="icon-th-list"></span> Visitors Chart',
            'titleCssClass' => ''
        ));
        ?>

        <div class="pieStats" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>

<?php $this->endWidget(); ?>
    </div>
    
</div><!--/row-->
<script>
    var chartData = <?=  CJSON::encode($chartData)?>
</script>