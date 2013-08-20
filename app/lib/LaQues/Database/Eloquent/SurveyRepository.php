<?php


namespace LaQues\Database\Eloquent;

use LaQues\Database\Contracts\SurveyRepositoryInterface;

class SurveyRepository implements SurveyRepositoryInterface
{
    public function find($id)
    {
        return Survey::with('questions')->find($id);
    }
}