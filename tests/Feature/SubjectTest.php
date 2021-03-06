<?php

namespace Tests\Feature;

use App\Subject;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TestCase
     */
    private $http;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        \Artisan::call('passport:install');

        $user = factory(User::class)->create();

        $client = DB::table('oauth_clients')
            ->where('password_client', 1)
            ->first();

        $response = $this->post('/oauth/token',
            [
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $user->email,
                'password' => 'secret'
            ]);

        $access_token = json_decode($response->content(), 1)['access_token'];

        $this->http = $this->withHeaders([
            'Authorization' => 'Bearer '.$access_token,
            'Accept' => 'application/json'
        ]);
    }

    /** @test  */
    public function can_list_all_subjects()
    {
        factory(Subject::class, 3)->create();

        $response = $this->http->get('/api/subjects');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test  */
    public function can_create_a_new_subject()
    {
        $record = [
            'name' => 'Maths'
        ];

        $response = $this->http->post('/api/subjects', $record);

        $response->assertStatus(201);
        $response->assertJson($record);
    }

    /** @test  */
    public function can_get_an_existing_subject_details()
    {
        $subject = factory(Subject::class)->create();

        $response = $this->http->get("/api/subjects/{$subject->id}");

        $response->assertStatus(200);

        $response->assertJson($subject->toArray());
    }

    /** @test  */
    public function can_update_an_existing_subject()
    {
        $subject = factory(Subject::class)->create();

        $record = [
            'name' => 'History'
        ];

        $response = $this->http->put("/api/subjects/{$subject->id}", $record);

        $response->assertStatus(200);
        $response->assertJson($record);
    }

    /** @test  */
    public function can_delete_an_existing_subject()
    {
        $subject = factory(Subject::class)->create();

        $response = $this->http->delete("/api/subjects/{$subject->id}");

        $response->assertStatus(200);
        $this->assertEmpty(Subject::find($subject->id));
    }
}
