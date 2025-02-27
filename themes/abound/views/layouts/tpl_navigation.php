<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!-- Be sure to leave the brand out there if you want it shown -->
            <a class="brand" href="#">InfiniteLoop <small>v0.1</small></a>

            <div class="nav-collapse">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions' => array('class' => 'pull-right nav'),
                    'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                    'itemCssClass' => 'item-test',
                    'encodeLabel' => false,
                    'items' => array(
                        array('label' => 'Dashboard', 'url' => array('/site/index')),
                        array('label' => 'Jelentkezők', 'url' => array('candidate/index')),
                        array('label' => 'Tesztek', 'url' => array('quiz/index')),
                        array('label' => 'Kérésbank', 'url' => array('question/index')),
                        /* array('label'=>'Gii generated', 'url'=>array('customer/index')), */
                        array('label' => 'My Account <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'My Messages <span class="badge badge-warning pull-right">26</span>', 'url' => '#'),
                                array('label' => 'My Tasks <span class="badge badge-important pull-right">112</span>', 'url' => '#'),
                                array('label' => 'My Invoices <span class="badge badge-info pull-right">12</span>', 'url' => '#'),
                                array('label' => 'Separated link', 'url' => '#'),
                                array('label' => 'One more separated link', 'url' => '#'),
                                array('label' => 'Graphs & Charts', 'url' => array('/site/page', 'view' => 'graphs')),
                                array('label' => 'Forms', 'url' => array('/site/page', 'view' => 'forms')),
                                array('label' => 'Tables', 'url' => array('/site/page', 'view' => 'tables')),
                                array('label' => 'Interface', 'url' => array('/site/page', 'view' => 'interface')),
                                array('label' => 'Typography', 'url' => array('/site/page', 'view' => 'typography')),
                                )),
                                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<div style="height:25px"></div>