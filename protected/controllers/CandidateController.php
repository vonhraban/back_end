<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CandidateController
 *
 * @author Peti
 */
class CandidateController extends GxController
{
    
    /**
     * Kilistázza a kitöltött teszteket időben csökkenő sorrendben
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('QuizResult', array(
            'criteria' => array(
                'condition' => 'quiz.company_id = ' . Yii::app()->user->companyId,
                'order' => '`t`.`date_created` DESC',
                'with' => array('user', 'quiz'),
            )
        ));
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    /**
     * Megjeleníti a teszt eredményt. Ki milyen eredménnyel töltötte ki
     * 
     * @param integer $id quiz_restult_id
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id, 'QuizResult');
        $tagsScore = $model->getScoreByTags();
        
        $this->render('view', array(
            'model' => $model,
            'tagsScore' => $tagsScore,
        ));
    }
    
}