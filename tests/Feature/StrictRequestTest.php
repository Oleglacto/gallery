<?php

namespace Tests\Feature;

use Gallery\Images\Http\Requests\ImageStoreRequest;
use Illuminate\Http\UploadedFile;
use Tests\ApiAuthorization;
use Tests\TestCase;

/**
 * Тест к сожалению завязан на реквест
 * применяющийся в ImageStoreRequest
 */
class StrictRequestTest extends TestCase
{
    use ApiAuthorization;

    /**
     * @var array
     */
    protected $rules;

    protected function setUp(): void
    {
        parent::setUp();
        $validationRequest = new ImageStoreRequest();
        $this->rules = $validationRequest->rules();
        $this->auth();
    }
    /**
     * Проверяет что в реквесте присутствуют только параметры,
     * описанные в правилах валидации
     *
     * @test
     */
    public function validation_should_failed_without_validated_data()
    {
        $this->rules += [
            'test' => 'test'
        ];
        $response = $this->post(route('images.store'), $this->rules);
        $response->assertStatus(422);
        $response->assertJson([
            'errors' => [
                'parameters' => [
                    'Unavailable parameters'
                ]
            ]
        ], true);
    }

    /**
     * @test
     */
    public function request_should_passed_with_all_attributes()
    {
        $response = $this->post(route('images.store'), [
            'name' => 'test',
            'file' => UploadedFile::fake()->image('test.jpg')
        ]);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function request_should_passed_with_only_required_attributes()
    {
        $response = $this->post(route('images.store'), [
            'file' => UploadedFile::fake()->image('test.jpg')
        ]);
        $response->assertStatus(200);;
    }
}
