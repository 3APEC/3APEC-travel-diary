<!-- layouts/searchview.blade.php -->
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Search Box -->
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Search</h3>
                <p class="mt-1 text-sm text-gray-600">Find what you're looking for.</p>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                                <input type="text" name="search" id="search" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <!-- TODO: Artur reperier das -->
                            <div class="flex space-x-14">
                                <div class="flex items-center space-y-4">
                                    <label for="withoutEntries" class="m-3 p-2">Entries</label>
                                    <input type="checkbox" class="h-2 w-2 rounded-md" name="withoutEntries">
                                </div>
                                <div class="flex space-y-3 items-center">
                                    <label for="withoutUsers" class="m-3 p-2">User</label>
                                    <input type="checkbox" class="h-2 w-2 rounded-md" name="withoutUsers">
                                </div>
                                <div class="flex space-y-3 items-center">
                                    <label for="withoutDestinations" class="m-3 p-2">Destinations</label>
                                    <input type="checkbox" class="h-2 w-2 rounded-md" name="withoutDestinations">
                                </div>
                            </div>
                        </div>

                        @error('withoutEntries')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @enderror
                    
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Lists -->
    <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2">
        <!-- List 1 -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Trends</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Here are the locationtrends.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Belgrad</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about Belgrad</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Amsterdam</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about Amsterdam</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Moscow</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about Moscow</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Wien</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about Wien</dd>
                    </div>
                </dl>
            </div>
        </div>
        <!-- List 2 -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Most Searched</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">What is the most searched.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">MrBeast</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about MrBeast</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">London Eye</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about London Eye</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Tokio</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about Tokio</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Vorarlberg</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Details about Vorarlberg</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
