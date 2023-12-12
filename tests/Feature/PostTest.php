<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{

    // Permet de reset la BD apres chaque test
    use RefreshDatabase;

    public function testIndexNotAuth(): void
    {

        $response = $this->get('/');

        $response->assertRedirect('/login');
    }
    public function testIndexAuth(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }

    public function testStoreWithValidDataOnlyText()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $postData = [
            'content' => 'Test content',
            'image' => null,
        ];

        $response = $this->post('/', $postData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', ['content' => 'Test content']);
    }

    public function testStoreWithValidDataTextImage()
    {
        $user = User::factory()->create();
        $this->actingAs($user);


        $storagePath = 'public/posts';
        $fakeImage = UploadedFile::fake()->create('test_image.jpg');

        Storage::putFileAs($storagePath, $fakeImage, 'test_image.jpg');

        $postData = [
            'content' => 'Test content',
            'image' => $storagePath . '/test_image.jpg',
        ];

        $response = $this->actingAs($user)->post('/', $postData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', ['content' => 'Test content']);
    }

    public function testStoreWithInvalidData()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invalidPostData = [
            'content' => null
        ];

        $response = $this->post('/', $invalidPostData);
        $response->assertSessionHasErrors(['content', 'image']);
    }

}
