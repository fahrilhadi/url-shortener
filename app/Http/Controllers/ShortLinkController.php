<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index()
    {
        $links = ShortLink::latest()->get();
        return view('shortener.index', compact('links'));
    }
}
