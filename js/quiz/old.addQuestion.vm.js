/**
 * A gombot így jelenítettem meg a view-ban
 * <?php
 *  $this->widget('zii.widgets.jui.CJuiButton', array(
 *      'name' => 'add_' . $data->question_id,
 *      'caption' => 'Hozzáad',
 *      'value' => 'button1',
 *      'htmlOptions' => array(
 *          'data-bind' => 'value: questionVM.questions()[' . $data->question_id . '].caption,'
 *              . ' click: function() {toggle(' . $data->question_id . ')},'
 *              . ' attr: {"class": questions()[' . $data->question_id . '].class}'
 *      ),
 *  ));
 *  ?>
 */

/**
 * A kiválasztható kérdések
 * 
 * @param {data.active} data
 */
function Question(data)
{
    var self = this;
    
    /**
     * Ki van-e jelölve az adott kérdés.
     * Ha true, akkor hozzá van adva a quiz-hez
     */
    self.active = ko.observable(data.active);
    
    /**
     * A gomb css class-a
     */
    self.class = ko.computed(function() {
        if (self.active()) {
            return 'btn btn-danger ui-button ui-widget ui-state-default ui-corner-all';
        } else {
            return 'btn btn-primary ui-button ui-widget ui-state-default ui-corner-all';
        }
    });
    
    /**
     * A gombhoz tartozó felírat
     */
    self.caption = ko.computed(function() {
        if (self.active()) {
            return 'Kivesz';
        } else {
            return 'Hozzáad';
        }
    });    
    
    /**
     * Ezt a függvényt meghívval lehet átkapcsolni a gombot.
     */
    self.toggle = function () {
        self.active(!self.active());
    }
}

function QuestionViewModel()
{
    var self = this;
    
    self.questions = ko.observableArray([
        new Question({active: false}),
        new Question({active: false}),
        new Question({active: false}),
        new Question({active: false}),
        new Question({active: false}),
        new Question({active: false}),
    ]);
    
    self.toggle = function(id) {
        self.questions()[id].toggle();
    }
}

var questionVM = new QuestionViewModel();

// Activates knockout.js
ko.applyBindings(questionVM);
