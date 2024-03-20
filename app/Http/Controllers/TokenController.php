<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function getBaseToken(): array
    {
        return Token::query()->first()->only('name', 'token');
    }
}
