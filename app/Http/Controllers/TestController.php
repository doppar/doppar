<?php

namespace App\Http\Controllers;

use Phaseolies\Support\Facades\Mail;
use App\Models\User;
use App\Mail\TestMail;
use App\Http\Controllers\Controller;
use Phaseolies\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return $request->cookies->get('PHPSESSID');
    }
}
