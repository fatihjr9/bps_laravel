@extends('layouts.global')
@section('content')
<h5 class="text-2xl font-semibold">Kelola Data Pegawai</h5>

<div class="relative overflow-x-auto mt-8 rounded-xl">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 border rounded-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                   No
                </th>
                <th scope="col" class="px-6 py-3">
                   Nama Pegawai
                </th>
                <th scope="col" class="px-6 py-3">
                    Email Pegawai
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $item)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->email }}
                </td>
                <td class="px-6 py-4">
                    <a href="">Edit</a>
                    <button>Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
