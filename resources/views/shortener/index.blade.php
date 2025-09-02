@extends('master')

@section('title')
    URL Shortener App
@endsection

@section('main-content')
    <div class="max-w-3xl mx-auto px-4 py-12">
        @if ($links->isEmpty())
            <p class="text-gray-500 text-lg font-medium text-center">No shortened links found yet.</p>
        @else
        <div class="p-6 border border-gray-200 rounded-xl shadow bg-white">
            <ul class="divide-y divide-gray-200">
                @foreach ($links as $link)
                    <li class="py-4">
                        <div class="flex flex-col mb-1">
                            <a href="{{ url($link->slug) }}" target="_blank" 
                                class="text-black underline break-all text-md font-medium">
                                {{ url($link->slug) }}
                            </a>
                            <span class="text-gray-500 truncate text-sm">{{ $link->original_url }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
@endsection