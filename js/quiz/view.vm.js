/**
 * 
 * @param {string} name
 * @param {integer} score
 * @param {integer} difficulty
 * @param {string} type 
 */
function Question(question_id, name, score, difficulty, type)
{
    var self = this;
    self.name = ko.observable(name);
    self.score = score;
    self.difficulty = difficulty;
    self.question_id = question_id;
    self.challenge = (type == 'challenge');
    if (self.challenge) {
        self.name(self.name() + ' - feladat');
    }
}

// Overall viewmodel for this screen, along with initial state
function QuestionsViewModel() {
    var self = this;   

    // Editable data
    self.questions = ko.observableArray([]);
    self.challenges = ko.observableArray([]);

    self.removeQuestion = function(link, question) {
        self.questions.destroy(question);
        link = link.replace('replace_question_id', question.question_id);
        $.get(link);
    }
    
    //Kezdő adatok beállítása
    
    var mappedQuestions = $.map(
        initChallenges,
        function(item) {
            return new Question(
                item.challenge_id,
                item.name,
                50,
                item.difficulty,
                'challenge'
            );
        }
    );
    self.questions(mappedQuestions);
    
    //Erre nem tudom, hogy van-e jobb megoldás
    $.map(
        initQuestions,
        function(item) {
            self.questions.push(
                new Question(
                    item.question_id,
                    item.name,
                    item.score,
                    item.difficulty,
                    'question'
                )
            );
        }
    );
    
    
}
var questionVM = new QuestionsViewModel();
ko.applyBindings(questionVM);