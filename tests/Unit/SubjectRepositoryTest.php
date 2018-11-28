<?php

namespace Tests\Unit;

use App\Question;
use App\Quiz;
use App\Subject;
use App\Repositories\SubjectRepository;
use App\Tutorial;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var SubjectRepository
     */
    private $repository;

    protected function setUp()
    {
        parent::setUp();

        $this->repository = new SubjectRepository();
    }

    /** @test */
    public function can_list_all_subjects_in_db()
    {
        factory(Subject::class, 3)->create();

        $data = $this->repository->all();

        $this->assertCount(3, $data);
    }

    /** @test */
    public function can_create_new_subject_without_quiz_and_tutorial()
    {
        $subject_tutorial_idx = [];
        $subject_quiz_idx = [];
        $subjectName = 'Maths';

        $this->repository->create($subjectName, $subject_quiz_idx, $subject_tutorial_idx);

        $subject = Subject::whereName($subjectName)->first();

        $this->assertNotEmpty($subject);
        $this->assertEmpty($subject->quizzes);
        $this->assertEmpty($subject->tutorials);
    }

    /** @test */
    public function can_create_new_subject_with_quiz_and_tutorial()
    {
        $subjectName = 'Maths';
        $subject_quiz_idx = factory(Quiz::class, 4)
            ->create()
            ->each(function ($quiz) {
                $quiz->questions()->save(
                    factory(Question::class)->make()
                );
            })
            ->map(function ($quiz) {
                return $quiz->id;
            })
        ;
        $subject_tutorial_idx = factory(Tutorial::class, 4)
            ->create()
            ->map(function ($tut) {
                return $tut->id;
            });


        $this->repository->create($subjectName, $subject_quiz_idx, $subject_tutorial_idx);

        $subject = Subject::whereName($subjectName)->first();

        $this->assertNotEmpty($subject);
        $this->assertCount(4, $subject->quizzes);
        $this->assertCount(4, $subject->tutorials);
    }

    /** @test */
    public function can_update_existing_subject_without_quiz_and_tutorial()
    {
        $subject = factory(Subject::class)->create();

        $newSubjectName = 'History';
        $subject_tutorial_idx = [];
        $subject_quiz_idx = [];

        $this->repository->update($subject->id, $newSubjectName, $subject_quiz_idx, $subject_tutorial_idx);

        $subject->refresh();

        $this->assertEquals($subject->name, $newSubjectName);
        $this->assertEmpty($subject->quizzes);
        $this->assertEmpty($subject->tutorials);
    }

    /** @test */
    public function can_update_existing_subject_with_with_quiz_and_tutorial()
    {
        $subject = factory(Subject::class)->create();

        $newSubjectName = 'History';
        $subject_quiz_idx = factory(Quiz::class, 4)
            ->create()
            ->each(function ($quiz) {
                $quiz->questions()->save(
                    factory(Question::class)->make()
                );
            })
            ->map(function ($quiz) {
                return $quiz->id;
            })
        ;
        $subject_tutorial_idx = factory(Tutorial::class, 4)
            ->create()
            ->map(function ($tut) {
                return $tut->id;
            });

        $this->repository->update($subject->id, $newSubjectName, $subject_quiz_idx, $subject_tutorial_idx);

        $subject->refresh();

        $this->assertEquals($subject->name, $newSubjectName);
        $this->assertCount(4, $subject->quizzes);
        $this->assertCount(4, $subject->tutorials);
    }

    /** @test */
    public function can_get_a_subject_details_from_db()
    {
        $subject = factory(Subject::class)->create();

        $fetched_data = $this->repository->get($subject->id);

        $this->assertTrue(
            $subject->id === $fetched_data->id &&
            $subject->name === $fetched_data->name
        );
    }

    /** @test */
    public function can_delete_a_subject_from_db()
    {
        $subject = factory(Subject::class)->create();

        $this->repository->delete($subject->id);

        $total_count = Subject::count();

        $this->assertTrue($total_count === 0);
    }
}
