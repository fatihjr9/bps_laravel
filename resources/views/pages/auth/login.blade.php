@extends('layouts.auth')
@section('content')
<form class="w-full">
    <div class="flex flex-col space-y-3 mt-2 mb-4">
        <div>
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required />
        </div>
        <div>
            <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required />
        </div>
    </div>
    <button type="submit" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full py-2.5">Masuk Sekarang</button>
    <p class="text-center text-sm mt-2 text-gray-400">Belum memiliki akun? <a href="{{ route('register') }}" class="font-medium underline transition-all duration-300 hover:text-orange-600">Daftar sekarang</a> </p>
</form>
@endsection
