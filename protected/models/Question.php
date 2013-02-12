<?php

class Question extends BaseQuestion
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    
    /**
     * Megnézi, hogy az adott quiz-ben benne van-e
     * 
     * @param integer $quiz_id
     * @return boolean
     */
    public function isInQuiz($quiz_id)
    {
        $quizHasQuestion = QuizHasQuestion::model()->countByAttributes(array(
            'quiz_id' => $quiz_id,
            'question_id' => $this->question_id
        ));
        
        return $quizHasQuestion != 0;
    }

}