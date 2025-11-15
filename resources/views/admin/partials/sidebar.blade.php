<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-white border-r border-gray-200" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">

            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ms-3">Users</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ms-3">Settings</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
