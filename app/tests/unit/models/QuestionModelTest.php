<?php
namespace models;

use LaQues\Database\Eloquent\Question;

class QuestionModelTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    // tests
    public function testShouldRenderYesNoAnswer()
    {
        $q = new Question();
        $q->type = 'yesno';

        $result = $q->renderAnswers();

        $expected = '<label class="radio-inline"><input type="radio" value="1"> Ya</label><label class="radio-inline"><input type="radio" value="0"> Tidak</label>';
        $this->assertEquals($expected, $result);
    }

}