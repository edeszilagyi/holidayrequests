<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
    >

    @unless(count($requests) == null)

    @foreach($requests as $request)
    <x-request-card :request="$request" />
    @endforeach

    @else
    <p>No requests found</p>
    @endunless

    </div>

    <div class="mt-6 p-4">
        {{$requests->links()}}
    </div>
</x-layout>