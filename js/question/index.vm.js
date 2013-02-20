/**
 * Egy tag-et reprezentáló osztály
 * 
 * @param {integer} tag_id
 * @param {string} name
 */
function Tag(tag_id, name)
{
    var self = this;
    
    self.name = name + ' <i class="icon icon-remove" ></i>' + '<input type="hidden" name="Question[tags][]" value="' + tag_id + '" />';
    self.id = tag_id;
}

/**
 * 
 * 
 * @param {integer} option_id
 * @param {string} text
 * @param {boolean} correct
 */
function Option(option_id, text, correct)
{
    var self = this;
    
    self.text = ko.observable(text);
    self.option_id = option_id;
    self.correct = ko.observable(correct == 1);
}

/**
 * Question módosítása
 * 
 * @returns {undefined}
 */
function UpdateViewModel() {
    var self = this;   

    /**
     * Ha valami ajax-os töltés van, ezzel jelöljük
     */
    self.ajaxInProgress = ko.observable();

    /**
     * Ez adja, hozzá és veszi ki a kérdést a quiz-ből
     * 
     * @param {integer} link
     * @param {integer} quiz_id
     * @param {integer} question_id
     */
    self.toggle = function(link, quiz_id, question_id) {
        self.ajaxInProgress(true);
        link = link.replace('replace_quiz_id', quiz_id);
        link = link.replace('replace_question_id', question_id);
        $.get(link, function(data) {
            $('#view_' + question_id).html(data);
            self.ajaxInProgress(false);
        });
        
    }
    
}

var indexVM = new UpdateViewModel();
ko.applyBindings(indexVM);

