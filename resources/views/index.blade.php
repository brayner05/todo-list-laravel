<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <main class="h-screen w-full flex flex-col bg-zinc-900">
        <h1 class="text-white uppercase px-7 py-5 text-2xl font-semibold">Todo List</h1>
        <ul class="flex-1 w-full space-y-1.5 overflow-y-auto p-5 lg:px-15">
            @foreach ($items as $item)
            <li class="bg-zinc-700 text-white rounded-xl relative px-5 py-4">
                <form action=" /todos/{{ $item->id }}" method="POST" class="flex items-center" x-data="{ open: false }">
                    @csrf
                    @method('DELETE')
                    <span class="flex-1">{{ $item->content }}</span>
                    <div class="flex space-x-1">
                        <button type="button" class="p-2" @click="open = !open" @click.away="open = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="delete-button p-2 bg-red-600 rounded-full inline-block" x-show="open" x-transition>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </li>
            @endforeach
        </ul>
        <div class="px-7 py-5">
            <form action="/todos" method="POST" class="flex w-full bg-zinc-700 text-white rounded-xl">
                @csrf
                <input class="flex-1 rounded-l-xl focus:outline-0 px-5" required type="text" name="content" id="">
                <button type="submit" class="bg-cyan-400 text-white py-3 px-5 rounded-r-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
        @error('content')
        <div class="absolute top-0 left-0 text-white bg-red-500 w-full p-2">
            <span>{{ $message }}</span>
        </div>
        @enderror
    </main>
    @vite('resources/js/app.js')
</body>

</html>