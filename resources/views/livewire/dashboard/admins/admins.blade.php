<div>
    <!-- زر إضافة Admin -->
    <div class="flex justify-end mb-6">
        <a href="{{route('admins.add')}}">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">
            <i class="fas fa-user-plus mr-2"></i> Add Admin
        </button>
        </a>
        
    </div>

    <!-- جدول المستخدمين -->
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Admins
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($users as $user)
                    <tr @if($loop->odd) class="bg-gray-200" @endif>
                        <td class="w-1/3 text-left py-3 px-4">{{ $user->name }}</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
