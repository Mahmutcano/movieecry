<x-template>
    @section('main-content')
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/eindex') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">My Post</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <main role="main">

            <section class="jumbotron text-center mt-1">
                <div class="container">
                    <h1 class="mt-3">{{ $genre->name }}</h1>
                </div>
            </section>

        </main>

    </div>
    @endsection
</x-template>
