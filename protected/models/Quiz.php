<?php

class Quiz extends BaseQuiz
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public function getStats()
    {
        return '<span class="inlinebar">1,4,4,7,5,9,10</span>';
    }

}