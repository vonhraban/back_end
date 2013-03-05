<?php

class Challenge extends BaseChallenge
{
    
    /**
     * Megnézi, hogy az adott quiz-ben benne van-e
     * 
     * @param integer $quiz_id
     * @return boolean
     */
    public function isInQuiz($quiz_id)
    {
        $quizHasChallenge = QuizHasChallenge::model()->countByAttributes(array(
            'quiz_id' => $quiz_id,
            'challenge_id' => $this->challenge_id
        ));
        
        return $quizHasChallenge != 0;
    }
    
    public function getShortDesc()
    {
        return substr($this->description, 0, 500) . '...';
    }
    
}