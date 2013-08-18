<?php
namespace TestGuy;

class ParticipantViewingASurveySteps extends \TestGuy
{
    public function haveASurvey(array $attributes)
    {
        $I = $this;

        $questions = $attributes['questions'];
        unset($attributes['questions']);
        $surveyId = $I->haveInDatabase('surveys', $attributes);
        $result = $attributes;
        $result['id'] = $surveyId;
        foreach($questions as $q) {
            $q['survey_id'] = $surveyId;
            $answers = isset($q['answers']) ? $q['answers'] : array();
            unset($q['answers']);
            $questionId = $I->haveInDatabase('questions', $q);
            $q['answers'] = array();
            foreach($answers as $a) {
                $ans = array(
                    'label' => $a,
                    'question_id' => $questionId
                );
                $I->haveInDatabase('answers', $ans);
                $q['answers'][] = $ans;
            }
            $result['questions'][] = $q;
        }

        return json_decode(json_encode($result));
    }

    public function arrayToObject($array) {
        $obj = new stdClass;
        foreach($array as $k => $v) {
            if(strlen($k)) {
                if(is_array($v)) {
                    $obj->{$k} = array_to_object($v); //RECURSION
                } else {
                    $obj->{$k} = $v;
                }
            }
        }
        return $obj;
    }
}