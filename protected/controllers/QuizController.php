<?php

class QuizController extends GxController
{

    public function actionView($id)
    {
        if (isset($_GET['question_sort'])) {
            switch ($_GET['question_sort']) {
                case 'score' : $sort = 't.score'; break;
                case 'difficulty' : $sort = 't.difficulty'; break;
                default : $sort = 't.name';
            }
        } else {
            $sort = 't.name';
        }
        
        $criteria = new CDbCriteria();
        $criteria->with = 'quizs';
        $criteria->condition = 'quizs.quiz_id = :quiz_id';
        $criteria->order = $sort;
        $criteria->params = array(
            ':quiz_id' => $id,
        );
        $criteria->together = true;
        $questions = Question::model()->findAll($criteria);
        
        $criteria = new CDbCriteria();
        $criteria->with = 'quizs';
        $criteria->condition = 'quizs.quiz_id = :quiz_id';
        $criteria->order = $sort;
        $criteria->params = array(
            ':quiz_id' => $id,
        );
        $criteria->together = true;
        $challenges = Challenge::model()->findAll($criteria);
        
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Quiz'),
            'questions' => $questions,
            'challenges' => $challenges,
        ));
    }
    
    public function actionCreate()
    {
        $model = new Quiz;


        if (isset($_POST['Quiz'])) {
            $model->setAttributes($_POST['Quiz']);
            $relatedData = array(
                'questions' => !isset($_POST['Quiz']['questions']) ? null : $_POST['Quiz']['questions'],
            );

            if ($model->saveWithRelated($relatedData)) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->quiz_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Quiz');


        if (isset($_POST['Quiz'])) {
            $model->setAttributes($_POST['Quiz']);
            $relatedData = array(
                'questions' => !isset($_POST['Quiz']['questions']) ? null : $_POST['Quiz']['questions'],
            );

            if ($model->saveWithRelated($relatedData)) {
                $this->redirect(array('view', 'id' => $model->quiz_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Quiz')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Quiz');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new Quiz('search');
        $model->unsetAttributes();

        if (isset($_GET['Quiz']))
            $model->setAttributes($_GET['Quiz']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    /**
     * Ajax-al hozzáad egy kérdést a quiz-hez, vagy elvesz.
     * Ha már benne volt az adott kérdés a quiz-ben, akkor elvesz.
     * Egyébként pedig hozzáadja.
     * 
     * @param integer $quiz_id
     * @param integer $question_id
     */
    public function actionAddQuestionAjax($quiz_id, $question_id)
    {
        $question = Question::model()->findByPk($question_id);
        $quiz = Quiz::model()->findByPk($quiz_id);
        if ($question->isInQuiz($quiz_id)) {
            $question->deleteElements('quizs', array($quiz_id));
        } else {
            $question->addElements('quizs', array($quiz_id));
        }
        
        echo $this->renderPartial('//question/_view', array(
            'data' => $question,
            'quiz_id' => $quiz->quiz_id,
            'btn' => 'btn',
        ));
    }
    
}