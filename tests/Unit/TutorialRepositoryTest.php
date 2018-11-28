<?php

namespace Tests\Unit;

use App\Tutorial;
use App\Repositories\TutorialRepository;
use App\Subject;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TutorialRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TutorialRepository
     */
    private $repository;

    protected function setUp()
    {
        parent::setUp();

        $this->repository = new TutorialRepository();
    }

    /** @test */
    public function can_list_all_tutorials_in_db()
    {
        factory(Tutorial::class, 3)->create();

        $data = $this->repository->all();

        $this->assertCount(3, $data);
    }

    /** @test */
    public function can_create_new_tutorial()
    {
        $content = 'My Tutorial Content';

        $this->repository->create($content);

        $tutorial = Tutorial::whereContent($content)->first();

        $this->assertNotEmpty($tutorial);
    }


    /** @test */
    public function can_update_existing_tutorial()
    {
        $tutorial = factory(Tutorial::class)->create();

        $content = 'My 2nd Tutorial Content';

        $this->repository->update($tutorial->id, $content);

        $tutorial->refresh();

        $this->assertEquals($tutorial->content, $content);
    }


    /** @test */
    public function can_get_a_tutorial_from_db()
    {
        $tutorial = factory(Tutorial::class)->create();

        $fetched_data = $this->repository->get($tutorial->id);

        $this->assertTrue(
            $tutorial->id === $fetched_data->id &&
            $tutorial->content === $fetched_data->content
        );
    }

    /** @test */
    public function can_delete_a_tutorial_from_db()
    {
        $tutorial = factory(Tutorial::class)->create();

        $this->repository->delete($tutorial->id);

        $total_count = Tutorial::count();

        $this->assertTrue($total_count === 0);
    }
}
