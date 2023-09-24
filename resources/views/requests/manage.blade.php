<x-layout>
    <x-card class="!p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Requests
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($requests->isEmpty())
                    @foreach($requests as $request)
                        <tr class="border-gray-300">
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a href="/requests/{{$request->id}}">
                                   Start date: {{$request->start_date}} <br> End date: {{$request->end_date}} <br> Status: {{$request->status}}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 date-lg"
                            >
                                <a
                                    href="/requests/{{$request->id}}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                    ><i
                                        class="fa-solid fa-pen-to-square"
                                    ></i>
                                    Edit</a
                                >
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <form method='POST' action="/requests/{{$request->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="tex-cernter">No Requests Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>