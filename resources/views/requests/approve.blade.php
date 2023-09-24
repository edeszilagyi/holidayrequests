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
        <form method="POST" action="/requests/{{$request->id}}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label
                    for="status"
                    class="inline-block text-lg mb-2"
                >
                    Approve or Decline:
                </label>
                <button
                    class="text-green-500 rounded py-2 px-4"
                    name="status"
                    value="approved"
                >
                <i class="fa-solid fa-check"></i>Approve
                </button>
        
                <button
                    class="text-red-500 rounded py-2 px-4"
                    name="status"
                    value="rejected"
                >
                <i class="fa-solid fa-close"></i>Decline
                </button>
            </div>
        </form>
        @endif
        @endauth
    </div>

</x-layout>