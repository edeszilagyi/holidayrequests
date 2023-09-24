<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{asset('images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$request->user->name}}</h3>
                <div class="text-xl font-bold mb-4">Start date: {{$request->start_date}}</div>
                <div class="text-xl font-bold mb-4">End date: {{$request->end_date}}</div>
                <div class="text-xl font-bold mb-4">Status: <a href="/?status={{$request->status}}">{{$request->status}}</a></div>
                <div class="text-xl font-bold mb-4">Comment: {{$request->comment}}</div>
            </div>
        </x-card>
        @auth
        @if (auth()->user()->role == 'manager' && $request->status == 'pending')
            <x-card class="mt-4 p-2 flex space-x-6">
                <a
                    href="/requests/{{$request->id}}/approve"
                    class="text-blue-400 px-6 py-2 rounded-xl"
                    ><i class="fa-solid fa-check"></i>Approve</a>
            </x-card>
        @endif
        @endauth
    </div>

</x-layout>