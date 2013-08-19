<?php

use Mockery;
use Woodling\Woodling;

class ParticipationControllerTest extends TestCase
{
    protected $mock;

    public function setUp()
    {
        parent::setUp();

        $this->mock = $this->mock('LaQues\Database\Contracts\SurveyRepositoryInterface');
    }

    protected function mock($class)
    {
        $mock = Mockery::mock($class);

        $this->app->instance($class, $mock);

        return $mock;
    }

    // tests
    public function testShouldRouteToCreate()
    {
        $survey = Woodling::retrieve('Survey');
        $this->mock->shouldReceive('find')
                    ->once()
                    ->with($survey->id)
                    ->andReturn($survey);

        $response = $this->call('get', 'survey/'.$survey->id.'/participate');

        $this->assertResponseOk();
        $this->assertViewHas('survey');
        $this->assertInstanceOf('Survey', $response->original->getData()['survey']);
        $this->assertSame($survey, $response->original->getData()['survey']);
    }

    /**
     * @expectedException Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testShouldThrowNotFoundExceptionWhenSurveyIsNotFound()
    {
        $this->mock->shouldReceive('find')
                    ->once()
                    ->with(Mockery::any())
                    ->andReturn(NULL);

        $this->call('get', 'survey/1/participate');
    }
}