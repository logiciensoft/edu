<?php

namespace Tests\Unit;

use App\Question;
use App\Quiz;
use App\Repositories\QuizRepository;
use App\Tutorial;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var QuizRepository
     */
    private $repository;

    protected function setUp()
    {
        parent::setUp();

        $this->repository = new QuizRepository();
    }

    /** @test */
    public function can_list_all_quizzes_in_db()
    {
        factory(Quiz::class, 3)->create();

        $data = $this->repository->all();

        $this->assertCount(3, $data);
    }

    /** @test */
    public function can_create_new_quiz()
    {
        $quizName = '1st Evaluation';
        $questions = [
            [
                "question" => "What is the fastest car in the world?",
                "responses" => ["Lamborgnini", "Mercedes", "Trotro"]
            ]
        ];

        $this->repository->create($quizName, $questions);

        $quiz = Quiz::whereName($quizName)->first();

        $this->assertNotEmpty($quiz);
        $this->assertCount(1, $quiz->questions);
    }

    /** @test */
    public function can_update_existing_quiz()
    {
        $quiz = factory(Quiz::class)->create();

        $newQuizName = '2nd Evaluation';
        $questions = [
            [
                "question" => "What is the fastest car in the world?",
                "responses" => ["Lamborgnini", "Mercedes", "Trotro"]
            ]
        ];

        $this->repository->update($quiz->id, $newQuizName, $questions);

        $quiz->refresh();

        $this->assertEquals($quiz->name, $newQuizName);
        $this->assertCount(1, $quiz->questions);
    }

    /** @test */
    public function can_get_a_quiz_from_db()
    {
        $quiz = factory(Quiz::class)->create();

        $fetched_data = $this->repository->get($quiz->id);

        $this->assertTrue(
            $quiz->id === $fetched_data->id &&
            $quiz->name === $fetched_data->name
        );
    }

    /** @test */
    public function can_delete_a_quiz_from_db()
    {
        $quiz = factory(Quiz::class)->create();

        $this->repository->delete($quiz->id);

        $total_count = Quiz::count();

        $this->assertTrue($total_count === 0);
    }
}
