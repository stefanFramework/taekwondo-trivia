<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class LoginController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return View::make('login', []);
    }
}