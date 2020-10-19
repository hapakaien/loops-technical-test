<div class="flex justify-center px-2 py-5">
    <a class="text-blue-600 hover:text-gray-900" href="{{ route('home') }}"><h1 class="font-bold text-2xl md:text-5xl">{{ config('app.name') }}</h1></a>
</div>
<div class="flex flex-row items-center justify-center space-x-1 px-2" x-data="{ route: '{{ Route::currentRouteName() }}' }">
    <a class="px-2 py-1 hover:underline" :class="{ 'bg-gray-300 text-gray-900 rounded': route === 'home' }" href="{{ route('home') }}">Content Post</a>
    <a class="px-2 py-1 hover:underline" :class="{ 'bg-gray-300 text-gray-900 rounded': route === 'user' }" href="{{ route('user') }}">User List</a>
    <a class="px-2 py-1 hover:underline" :class="{ 'bg-gray-300 text-gray-900 rounded': route === 'comment' }" href="{{ route('comment') }}">Comment Guest</a>
</div>
