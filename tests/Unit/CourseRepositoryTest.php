<?php

namespace Tests\Unit;

use App\Course;
use App\Repositories\CourseRepository;
use App\Subject;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CourseRepository
     */
    private $repository;

    protected function setUp()
    {
        parent::setUp();

        $this->repository = new CourseRepository();
    }

    /** @test */
    public function can_list_all_courses_in_db()
    {
        factory(Course::class, 3)->create();

        $data = $this->repository->all();

        $this->assertCount(3, $data);
    }

    /** @test */
    public function can_create_new_course_without_subjects()
    {
        $course_subject_idx = [];
        $courseName = 'Programing';

        $this->repository->create($courseName, $course_subject_idx);

        $course = Course::whereName($courseName)->first();

        $this->assertNotEmpty($course);
        $this->assertEmpty($course->subjects);
    }

    /** @test */
    public function can_create_new_course_with_subjects()
    {
        $course_subject_idx = factory(Subject::class, 4)
            ->create()
            ->map(function ($sub) { return $sub->id; })
            ->toArray();

        $courseName = 'Programing';

        $this->repository->create($courseName, $course_subject_idx);

        $course = Course::whereName($courseName)->first();

        $this->assertNotEmpty($course);
        $this->assertCount(4, $course->subjects);
    }

    /** @test */
    public function can_update_existing_course_without_subjects()
    {
        $course = factory(Course::class)->create();

        $newCourseName = 'IT';
        $course_subject_idx = [];

        $this->repository->update($course->id, $newCourseName, $course_subject_idx);

        $course->refresh();

        $this->assertEquals($course->name, $newCourseName);
        $this->assertEmpty($course->subjects);
    }

    /** @test */
    public function can_update_existing_course_with_subjects()
    {
        $course = factory(Course::class)->create();

        $newCourseName = 'IT';
        $course_subject_idx = factory(Subject::class, 4)
            ->create()
            ->map(function ($sub) { return $sub->id; })
            ->toArray();

        $this->repository->update($course->id, $newCourseName, $course_subject_idx);

        $course->refresh();

        $this->assertEquals($course->name, $newCourseName);
        $this->assertCount(4, $course->subjects);
    }

    /** @test */
    public function can_get_a_course_details_from_db()
    {
        $course = factory(Course::class)->create();

        $fetched_data = $this->repository->get($course->id);

        $this->assertTrue(
            $course->id === $fetched_data->id &&
            $course->name === $fetched_data->name
        );
    }

    /** @test */
    public function can_delete_a_course_from_db()
    {
        $course = factory(Course::class)->create();

        $this->repository->delete($course->id);

        $total_count = Course::count();

        $this->assertTrue($total_count === 0);
    }
}
