<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class StrictRequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }
    /**
     * Проверяем что при получении данных неописанных в правилах валидации
     * получаем 422 ошибку и соответствующее сообщение
     *
     * @test
     */
    public function validation_should_failed_with_unavailable_arguments()
    {
        $data = [
            'name'  => 'test',
            'age'   => 12,
            'unavailable_argument' => 'test',
            'unavailable_argument_2' => 'test',
        ];
        $response = $this->post(route('tests.strict-request'), $data);
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
    public function validation_should_passed_with_correct_request()
    {
        $data = [
            'age'   => 12,
        ];
        $response = $this->post(route('tests.strict-request'), $data);
        $response->assertStatus(204);
    }
}
