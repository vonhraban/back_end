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
    
    /**
     * Visszadja, hogy a kérdés publikus-e vagy sem
     * 
     * @return boolean
     */
    public function isPublic()
    {
        return $this->company_id == null;
    }
    
    
    public function getDifficulties()
    {
        return array(
            1 => 'Nagyon könnyű',
            2 => 'Könnyű',
            3 => 'Közepes',
            4 => 'Nehéz',
            5 => 'Nagyon nehéz',
        );
    }
    
    /**
     * 
     * @todo: Ki kell emelni egy behavior-be
     * @param type $json
     */
    public function saveFromJSON($json)
    {
        $items = CJSON::decode($json);
        print_r($items);
        foreach ($items as $item) {
            if ($item['option_id'] != null && isset($item['_destroy'])) {
                $option = Option::model()->findByPk($item['option_id']);
                $option->delete();
            }
            else if ($item['option_id'] == null && !isset($item['_destroy'])) {
                $option = new Option();
                $option->question_id = $this->question_id;
                $option->text = $item['text'];
                $option->correct = $item['correct'];
                $option->save();
            } else if ($item['option_id'] != null && !isset($item['_destroy'])) {
                $option = Option::model()->findByPk($item['option_id']);
                $option->text = $item['text'];
                $option->save();
            }
        }
    }

}