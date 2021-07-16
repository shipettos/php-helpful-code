function updateQuestionnaire(step){
    var q;
    //find correct question (personal_info, tax etc)
    var question = questionnaire.find(  ({name}) => name === step );
    question = question.questions;

    //looping through questions of each step
    for (q = 0; q < question.length; q++){
        //console.log(question[q].name);

        //find the deriving object
        var deriving = question[q].deriving;
        var question_name = question[q].name;

        var d = 0;
        for(d = 0; d < deriving.length; d++){
            var d_question = deriving[d].question;
            var d_answer = deriving[d].answer;
            var d_strategy = deriving[d].strategy;

            if ($("#"+ d_question).val() === d_answer){
                if (d_strategy === "HIDE"){
                    $("." + question_name).css("display", "none");
                    $('#' + question_name).removeAttr('required');
                } else if (d_strategy === "SHOW"){
                    $("." + question_name).css("display", "inline");
                    $('#' + question_name).attr('required', "required")
                }
            }
        }

    }
}
