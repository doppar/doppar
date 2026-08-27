<?php

namespace App\Http\Controllers;

use Phaseolies\Utilities\Attributes\Route;
use Phaseolies\Http\Response;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Show the welcome page
     *
     * @return Response
     */
    #[Route(uri: '/', name: 'home')]
    public function welcome(): Response
    {
        return view('welcome');
    }
}
