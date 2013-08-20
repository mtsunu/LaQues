<?php


namespace LaQues\Database\Eloquent;

use Form;


class Question extends \Eloquent
{
    public function answers()
    {
        return $this->hasMany('LaQues\Database\Eloquent\Answer');
    }

    public function renderAnswers()
    {
        $result = '';
        switch($this->type) {
            case 'yesno':
                $result = $this->renderYesNo(); break;
            case 'multiple_choice':
                $result = $this->renderMultipleChoice(); break;
            case 'choice':
                $result = $this->renderChoice(); break;
        }

        return $result;
    }

    private function renderYesNo()
    {
        $result = '<label class="radio-inline"><input type="radio" value="1"> Ya</label><label class="radio-inline"><input type="radio" value="0"> Tidak</label>';

        return $result;
    }

    private function renderMultipleChoice()
    {
        $result = '';
        foreach($this->answers as $answer) {
            $result .= '<div class="checkbox">';
            $result .= '<label>';
            $result .= '<input type="checkbox" name="optionsRadios'.$this->id.'" id="optionsRadios1" value="option1">';
            $result .= $answer->label;
            $result .= '</label>';
            $result .= '</div>';
        }

        return $result;
    }

    private function renderChoice()
    {
        $result = '';
        foreach($this->answers as $answer) {
            $result .= '<div class="radio">';
            $result .= '<label>';
            $result .= '<input type="radio" name="optionsRadios'.$this->id.'" id="optionsRadios1" value="option1">';
            $result .= $answer->label;
            $result .= '</label>';
            $result .= '</div>';
        }

        return $result;
    }
}