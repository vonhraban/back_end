<?php

class Company extends BaseCompany
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * * Összeszámolja, hogy hány teszt lett kitöltve
     * 
     * @param integer $company_id
     */
    public function countFilledQiuzzes()
    {
        $criteria = new CDbCriteria();
        $criteria->join = 'INNER JOIN quiz ON (quiz.quiz_id = t.quiz_id)';
        $criteria->condition = 'quiz.company_id = :company_id';
        $criteria->params = array(
            ':company_id' => $this->company_id,
        );
        return QuizResult::model()->count($criteria);
    }

}