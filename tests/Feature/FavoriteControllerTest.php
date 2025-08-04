<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Favorite;
use Tests\TestCase;

class FavoriteControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');

        $data = [
            'tmdb_id' => 1,
            'title' => 'title',
            'poster_path' => 'poster_path',
            'genre_ids' => [1, 2, 3],
        ];

        $this->post('/api/favorites', $data);
    }

    public function test_it_should_be_able_validate_favorite_unique_tmdb_id(): void
    {
        $data = [
            'tmdb_id' => 1,
            'title' => 'title 2',
            'poster_path' => 'poster_path 2',
            'genre_ids' => [1, 2, 3],
        ];

        $response = $this->post('/api/favorites', $data);

        $response->assertStatus(302);
    }

    public function test_it_should_be_able_create_favorite(): void
    {
        $data = [
            'tmdb_id' => 2,
            'title' => 'title 2',
            'poster_path' => 'poster_path_2',
            'genre_ids' => [1, 2, 3],
        ];

        $response = $this->post('/api/favorites', $data);

        $response->assertStatus(201);
    }

    public function test_it_should_be_able_filter_favorite(): void
    {
        $response = $this->get('/api/favorites?genre_ids=1');

        $response->assertStatus(200);
    }

    public function test_it_should_be_able_list_favorite(): void
    {
        $response = $this->get('/api/favorites');

        $response->assertStatus(200);
    }

    public function test_it_should_be_able_destroy_favorite(): void
    {
        $favorite = Favorite::first();

        $response = $this->delete('/api/favorites/' . $favorite->id);

        $response->assertStatus(204);
    }
}
