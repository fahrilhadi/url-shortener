@extends('master')

@section('title')
    Create | URL Shortener App
@endsection

@section('main-content')
    <div class="w-full">
        <div class="max-w-2xl mx-auto px-4 py-12">
            <div class="p-6 border border-gray-200 rounded-xl shadow bg-white">

                <form action="{{ route('shorten.store') }}" method="POST" class="space-y-4">
                    @csrf
                    {{-- Original URL --}}
                    <div>
                        <label class="block text-sm font-medium mb-2">Original URL</label>
                        <input type="url" 
                            name="original_url" 
                            value="{{ old('original_url') }}"
                            placeholder="https://example.com/your-long-url"
                            autocomplete="off"
                            class="@error('original_url') is-invalid @enderror w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black">
                    </div>

                    {{-- Custom Slug (optional) --}}
                    <div>
                        <label class="block text-sm font-medium mb-2">Custom Slug (optional)</label>
                        <input type="text" 
                            name="slug" 
                            value="{{ old('slug') }}"
                            placeholder="your-custom-slug"
                            autocomplete="off"
                            class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black">
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                            Shorten URL
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection