<?php

/**
 * Description of ChallengeController
 *
 * @author Peti
 */
class ChallengeController extends GxController
{
    
    public function actions()
    {
        return array(
            'view' => array(
                'class'=>'front_end.components.actions.ChallengeView',
                'submitURL' => 'solutions/view',
            ),
        );
    }
    
    public function actionIndex($quiz_id)
    {
        $quiz = $this->loadModel($quiz_id, 'quiz');
        
        $dataProvider = new CActiveDataProvider('Challenge');
        
        $this->render('index', array(
            'quiz' => $quiz,
            'dataProvider' => $dataProvider,
        ));
    }
    
}