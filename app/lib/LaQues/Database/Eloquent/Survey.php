<?php


namespace LaQues\Database\Eloquent;

class Survey extends \Eloquent
{
    public function questions()
    {
        return $this->hasMany('LaQues\Database\Eloquent\Question');
    }
}