<?php

namespace App\Http\Controllers;

use Tests\data\StrictRequest;

class TestingController
{
    public function strictRequest(StrictRequest $request)
    {
        return response(null, 204);
    }
}
