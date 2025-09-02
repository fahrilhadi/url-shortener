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
                        <form action="{{ route('shorten.destroy', $link->id) }}" method="POST">
                            <button type="button" onclick="openDeleteModal({{ $link->id }}, '{{ addslashes($link->original_url) }}')" 
                                class="px-3 py-1 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
                                Delete
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 backdrop-blur-sm z-[9999] hidden items-center justify-center">
      <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm text-center">
        <h2 class="text-lg font-semibold mb-2">Delete URL</h2>
        <p class="text-gray-600 text-sm mb-4">Are you sure you want to delete <span id="originalURL" class="font-medium"></span>?</p>
        <form id="deleteForm" method="POST" class="flex justify-center gap-3">
          @csrf
          @method('DELETE')
          <button type="button" onclick="closeDeleteModal()" 
                  class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium hover:border-black transition shadow">
            Cancel
          </button>
          <button type="submit" 
                  class="px-4 py-2 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
            Delete
          </button>
        </form>
      </div>
    </div>
@endsection

@push('addon-script')
  <script>
    function openDeleteModal(originalURLId, originalURL) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const originalURLSpan = document.getElementById('originalURL');

        form.action = '/shorten/' + originalURLId;
        originalURLSpan.textContent = originalURL;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
  </script>
@endpush