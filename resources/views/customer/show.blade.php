<x-app-layout>
    <div class="relative">
        <!-- Main Content -->
        <div class="pr-[40px]">
            <div class="mb-6">
                <h2 class="font-semibold text-main text-xl">{{$customer->name}}</h2>
            </div>

            <!-- Add your main content sections here -->
        </div>

        <!-- Sidebar -->
        <x-customer-sidebar />
    </div>
</x-app-layout>
