<?php

class Quiz extends BaseQuiz
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * Visszadja, hogy az adott időintervallumban, hányan töltötték ki a tesztet,
     * Napi, heti vagy havi bontásban
     * 
     * @param datetime $start Kezdődátum, pl 2013-01-26
     * @param datetime $end Végdátum, pl 2013-02-26
     * @param string $scale Milyen osztásban adja vissza {daily|weekly|monthly}
     * @return string
     */
    public function getStats($start, $end, $scale = 'daily')
    {
        $start_date = explode('-', $start);
        $curr_date = $start;
        $end_date = $end;
        
        $sql = 'SELECT
            count(quiz_result_id) as `count`, date_format(`quiz_result`.date_created, \'%Y-%m-%d\') as `date`
            FROM
            `quiz_result`
            Inner Join `quiz` ON `quiz`.`quiz_id` = `quiz_result`.`quiz_id`
            WHERE
            `quiz_result`.date_created BETWEEN :start AND :end
            AND `quiz`.company_id = ' . $this->quiz_id . '
            GROUP BY `date`
            ORDER BY `date`
            ';
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        $start .= ' 00:00:00';
        $end .= ' 23:59:59';
        $command->bindParam(":start", $start, PDO::PARAM_STR);
        $command->bindParam(":end", $end, PDO::PARAM_STR);
        //Végrehajtjuk a lekérdezést
        $quizResults = $command->queryAll();
        //Azokat a napokat ahol nem adott vissza a lekérdez eredményt feltöltjük 0-val
        $masik = $quizResults;
        $stat = array();
        $i = 0;
        $dates = array();
        foreach ($quizResults as $key => $value) {
            $dates[$value['date']] = $value['count'];
        }
        while ($curr_date <= $end_date) {
            if (!isset($dates[$curr_date])) {
                $stat[] = 0;
            } else {
                $stat[] = $dates[$curr_date];
            }
            $i++;
            $curr_date = date('Y-m-d', mktime(0, 0, 0, $start_date[1]  , $start_date[2]+$i, $start_date[0]));
        }
        return $stat;
    }
    
    public function getDailyStats()
    {
        $ret = $this->getStats(
            date('Y-m-d', mktime(0, 0, 0, date('m')  , date('d') - 6, date('Y'))),
            date('Y-m-d', mktime(0, 0, 0, date('m')  , date('d'), date('Y')))
        );
        return '<span class="inlinebar">' . implode($ret, ',') . '</span>';
    }
    

}