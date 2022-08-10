<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Certificates
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless ($certificates->isempty())

                @foreach ($certificates as $certificate)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="show.html">
                                {{$certificate['title']}}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="/certificates/{{$certificate['id']}}/edit"
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
                            <form method="POST" action="/certificates/{{$certificate->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No certificates to show</p>
                        </td>
                    </tr>
                
            @endunless

        </tbody>
    </table>
</div>