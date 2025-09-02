<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShortLinkController extends Controller
{
    public function index()
    {
        $links = ShortLink::latest()->get();
        return view('shortener.index', compact('links'));
    }

    public function create()
    {
        return view('shortener.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'original_url' => 'required|url|max:2048',
            'slug' => 'nullable|alpha_dash|unique:short_links,slug|max:50',
        ], [
            'original_url.required' => 'URL is required',
            'original_url.url' => 'URL must be valid',
            'slug.unique' => 'This slug is already taken',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data tervalidasi
        $validated = $validator->validated();

        // Jika slug kosong, generate random
        $slug = $validated['slug'] ?? Str::random(6);

        // Pastikan slug unik (double-check)
        while (ShortLink::where('slug', $slug)->exists()) {
            $slug = Str::random(6);
        }

        // Simpan ke database
        ShortLink::create([
            'original_url' => $validated['original_url'],
            'slug' => $slug,
        ]);

        return redirect()
            ->route('shorten.index')
            ->with('success', 'Short link created successfully');
    }

    public function redirect($slug)
    {
        $link = ShortLink::where('slug', $slug)->first();

        if (!$link) {
            return redirect()
                ->route('shorten.index')
                ->with('error', 'Link not found');
        }

        return redirect($link->original_url);
    }
}
