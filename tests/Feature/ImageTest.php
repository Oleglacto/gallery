<?php

class ImageTest extends \Tests\TestCase
{
    use \Tests\ApiAuthorization;

    protected function setUp(): void
    {
        parent::setUp();
        $this->auth();
    }

    public function test_validation_fails_without_file()
    {
        $response = $this->post(route('images.store'), [
            'name' => 'Test image'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'errors' => [
                'file_id' => [
                    'The file field is required'
                ]
            ]
        ]);
    }

    public function test_store_image_to_filesystem()
    {

    }
}
