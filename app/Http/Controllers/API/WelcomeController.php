<?php

namespace App\Http\Controllers\API;

use Phaseolies\Utilities\Attributes\Route;
use App\Http\Controllers\Controller;
use Phaseolies\Http\Response\JsonResponse;

class WelcomeController extends Controller
{
    /**
     * JSON response with a success message and HTTP 200 status code
     *
     * @return JsonResponse
     */
    #[Route(uri: 'api/welcome')]
    public function welcome(): JsonResponse
    {
        return response()->json([
            'message' => 'Welcome to Doppar. build something amazing'
        ], 200);
    }
}
