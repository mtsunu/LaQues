<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DS-KULI
 * Date: 8/19/13
 * Time: 9:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace LaQues\Database\Contracts;


interface SurveyRepositoryInterface
{
    public function find($id);
}