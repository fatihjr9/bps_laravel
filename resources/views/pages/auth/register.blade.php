@extends('layouts.auth')
@section('content')
<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="w-full">
    @csrf
    <div class="flex flex-col space-y-3 mt-2 mb-4">
        <div>
            <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Nama</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe" required />
        </div>
        <div>
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required />
        </div>
        @php
            $admin = \App\Models\User::where('role', 'admin')->exists();
            $superAdmin = \App\Models\User::where('role', 'superadmin')->exists();
        @endphp
        @if (!$superAdmin)
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                <select id="role" class="block p-2 mt-1 w-full rounded-md border border-gray-300" type="select" name="role" required    >
                    <option value="superadmin" selected>Super Admin</option>
                </select>
            </div>
        @elseif($superAdmin && !$admin)
            <select id="role" class="block mt-1 p-2 w-full rounded-md border border-gray-300" type="select" name="role" required>
                <option value="admin" selected>Admin</option>
            </select>
        @elseif($superAdmin && $admin)
            <select id="role" class="hidden mt-1 p-2 w-full rounded-md border border-gray-300" type="select" name="role" required>
                <option value="user" selected>User</option>
            </select>
        @endif
        <div>
            <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required />
        </div>
    </div>
    <button type="submit" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full py-2.5">Daftar</button>
    <p class="text-center text-sm mt-2 text-gray-400">Sudah memiliki akun? <a href="{{ route('login') }}" class="font-medium underline transition-all duration-300 hover:text-orange-600">Masuk sekarang</a> </p>
</form>
@endsection
