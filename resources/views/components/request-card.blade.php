@props(['request'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="./requests/{{$request->id}}">{{$request->user->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Start date: {{$request->start_date}}</div>
            <div class="text-xl font-bold mb-4">End date: {{$request->end_date}}</div>
            <div class="text-xl font-bold mb-4">Status: <a href="/?status={{$request->status}}">{{$request->status}}</a></div>
            <div class="text-xl font-bold mb-4">Comment: {{$request->comment}}</div>
        </div>
    </div>
</x-card>