@extends('master')

@section('title')
    URL Shortener App
@endsection

@section('main-content')
    <div class="max-w-3xl mx-auto px-4 py-12">
        <div class="p-6 border border-gray-200 rounded-xl shadow bg-white">
            @if ($links->isEmpty())
                <p class="text-gray-500 text-lg font-medium text-center">No shortened links found yet.</p>
            @else
            <ul class="divide-y divide-gray-200">
                @foreach ($links as $link)
                    <li class="py-4">
                        <div class="flex flex-col">
                            <a href="{{ url($link->slug) }}" target="_blank" 
                                class="text-blue-600 underline break-all text-sm font-medium">
                                {{ url($link->slug) }}
                            </a>
                            <span class="text-gray-500 truncate text-xs">{{ $link->original_url }}</span>
                            <span class="text-gray-400 text-xs mt-1">
                                Created at {{ $link->created_at->format('Y-m-d H:i') }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
@endsection