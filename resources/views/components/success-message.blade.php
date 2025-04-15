@if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 transition duration-500">
        {{ session('message') }}
    </div>
@endif
