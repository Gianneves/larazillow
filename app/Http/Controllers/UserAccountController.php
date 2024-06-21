<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAccountController extends Controller
{
    public function create()
    {
        return Inertia::render('UserAccount/Create');
    }
}
