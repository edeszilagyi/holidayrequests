<x-layout>
    <x-card class="!p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Request holiday
            </h2>
        </header>

        <form method="POST" action="/requests">
            @csrf
            <div class="mb-6">
                <label for="start_date" class="inline-block text-lg mb-2"
                    >Start Date</label
                >
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="start_date"
                    value="{{old('start_date')}}"
                />
                @error('start_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="end_date"
                    class="inline-block text-lg mb-2"
                    >End Date</label
                >
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="end_date"
                    value="{{old('end_date')}}"
                />
                @error('end_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="comment"
                    class="inline-block text-lg mb-2"
                >
                    Comment
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="comment"
                    rows="10"
                    placeholder="Reasoning"
                >{{old('comment')}}</textarea>
                @error('comment')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Send Request
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>