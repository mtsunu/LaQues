<?php namespace LaQues\Controllers;


use LaQues\Database\Contracts\SurveyRepositoryInterface;

class ParticipationController extends \BaseController
{
    protected $surveyRepo;

    public function __construct(SurveyRepositoryInterface $surveyRepo)
    {
        $this->surveyRepo = $surveyRepo;
    }

    public function create($id)
    {
        $survey = $this->surveyRepo->find($id);
        if(NULL == $survey) {
            \App::abort('404');
        }

        return \View::make('participation.create', ['survey' => $survey]);
    }
}