<?php

class QuizResult extends BaseQuizResult
{
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public function getScore()
    {
        return '10 %';
    }
    
    public function getDuration()
    {
        return '46 perc';
    }

}