<?php

class QuizResult extends BaseQuizResult
{
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * Visszadja, hogy tag-enként hány százalékot ért el
     */
    public function getScoreByTags()
    {
        $sql = "SELECT
            `tag`.`tag_id`,
            `tag`.`name`,
            sum(`q`.`score`) as `max_score`,
            sum(correct * `q`.`score`) AS `result_score`,
            IFNULL(`answer`.`correct`, 0) as `correct`
            FROM
            `quiz`
            Inner Join `quiz_result` ON `quiz_result`.`quiz_id` = `quiz`.`quiz_id`
            Inner Join `quiz_has_question` AS `qhq` ON `qhq`.`quiz_id` = `quiz`.`quiz_id`
            Inner Join `question` AS `q` ON `qhq`.`question_id` = `q`.`question_id`
            Inner Join `question_has_tag` ON `q`.`question_id` = `question_has_tag`.`question_id`
            Inner Join `tag` ON `tag`.`tag_id` = `question_has_tag`.`tag_id`

            Inner Join `quiz_has_question` ON `quiz_has_question`.`quiz_id` = `quiz`.`quiz_id`
            Inner Join `question` ON `question`.`question_id` = `quiz_has_question`.`question_id`
            Left Join `answer` ON (`answer`.`question_id` = `question`.`question_id` AND answer.quiz_result_id = `quiz_result`.`quiz_result_id`)
            WHERE `quiz_result`.`quiz_result_id` = " . $this->quiz_result_id . " AND
            question.question_id = q.question_id AND
            qhq.question_id = `quiz_has_question`.question_id
            GROUP BY tag.tag_id";
        
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();
        
        return $rows;
    }
    
}