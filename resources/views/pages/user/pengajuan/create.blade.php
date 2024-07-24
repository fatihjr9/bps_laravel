@extends('layouts.global')

@section('content')
<h5 class="text-2xl font-bold">Tambah Pengajuan Perjalanan Dinas</h5>
<form action="{{ route('user-pengajuan-store') }}" method="POST" enctype="multipart/form-data" class="mt-6 bg-white border p-4 gap-4 rounded-xl shadow-sm space-y-6">
    @csrf
    <div class="flex flex-col space-y-4 border-b pb-6">
        <h5 class="text-2xl font-medium">Pengajuan</h5>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div>
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                <input type="text" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Judul" required />
            </div>
            <div>
                <label for="tujuan" class="block mb-2 text-sm font-medium text-gray-900">Tujuan</label>
                <input type="text" name="tujuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tujuan" required />
            </div>
            <div>
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <input type="text" name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Deskripsi" required />
            </div>
            <div>
                <label for="user_ids" class="block mb-2 text-sm font-medium text-gray-900">Pilih Anggota</label>
                <select name="user_ids[]" id="user_ids" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" multiple required>
                    @foreach($user as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-4 border-b pb-6">
        <h5 class="text-2xl font-medium">Durasi Perjalanan Dinas</h5>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div>
                <label for="lama_hari" class="block mb-2 text-sm font-medium text-gray-900">Lamanya Hari</label>
                <input type="number" name="lama_hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Lamanya hari" required />
            </div>
            <div>
                <label for="tgl_mulai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Mulai dan Selesai</label>
                <div class="flex flex-row gap-x-2">
                    <input type="date" name="tgl_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required />
                    <input type="date" name="tgl_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required />
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-4">
        <h5 class="text-2xl font-medium">Akomodasi</h5>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div>
                <label for="akomodasi_perorangan" class="block mb-2 text-sm font-medium text-gray-900">Akomodasi Perorangan</label>
                <input type="number" name="akomodasi_perorangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Akomodasi Perorangan" required />
            </div>
            <div>
                <label for="akomodasi_transportasi" class="block mb-2 text-sm font-medium text-gray-900">Akomodasi Transportasi</label>
                <input type="number" name="akomodasi_transportasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Akomodasi Transportasi" required />
            </div>
            <div>
                <label for="akomodasi_penginapan" class="block mb-2 text-sm font-medium text-gray-900">Akomodasi Penginapan</label>
                <input type="number" name="akomodasi_penginapan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Akomodasi Penginapan" required />
            </div>
            <div>
                <label for="akomodasi_lainnya" class="block mb-2 text-sm font-medium text-gray-900">Akomodasi Lainnya</label>
                <input type="number" name="akomodasi_lainnya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Akomodasi Lainnya" />
            </div>
        </div>
    </div>
    <button type="submit" class="px-4 py-2 bg-black text-white rounded-xl w-full">Tambahkan</button>
</form>
@endsection
