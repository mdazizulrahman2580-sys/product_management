<nav class="bg-white border border-gray-200 rounded-lg shadow p-4">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Admin Panel</h2>

        <div class="flex items-center gap-4">

            <span class="text-gray-700">{{ auth()->user()->name }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 text-white px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    </div>
</nav>
