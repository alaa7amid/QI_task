<div>
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    
    <div class="flex flex-wrap mt-6">
        <!-- كارت عدد المستخدمين -->
        <div class="w-full lg:w-1/3 pr-0 lg:pr-2 mb-6">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-users mr-3"></i> Total Users
                </p>
                <p class="text-3xl">{{ $userCount }}</p>
            </div>
        </div>

        <!-- كارت عدد المنتجات -->
        <div class="w-full lg:w-1/3 pr-0 lg:pr-2 mb-6">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-cogs mr-3"></i> Total Products
                </p>
                <p class="text-3xl">{{ $productCount }}</p>
            </div>
        </div>

        <!-- كارت عدد الطلبات -->
        <div class="w-full lg:w-1/3 pr-0 lg:pr-2 mb-6">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-box mr-3"></i> Total Orders
                </p>
                <p class="text-3xl">{{ $orderCount }}</p>
            </div>
        </div>
    </div>

    <!-- جدول المستخدمين -->
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Latest Users
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last Name</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($users as $user)
                    <tr @if($loop->odd) class="bg-gray-200" @endif>
                        <td class="w-1/3 text-left py-3 px-4">{{ $user->name }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $user->last_name }}</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
