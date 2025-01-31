@extends('layouts.global')

@section('content')
<div class="flex flex-row items-center justify-between">
    <h5 class="text-2xl font-bold">Pengajuan Perjalanan Dinas</h5>
    <a href="{{ route('user-pengajuan-create') }}" class="px-4 py-2 bg-black text-white rounded-xl">+ Tambah Pengajuan</a>
</div>
<div class="grid grid-cols-1 lg:grid-cols-1 gap-4 mt-6">
    @foreach($pengajuans as $pengajuan)
    <div class="bg-slate-50 p-4 rounded-md border shadow-sm border-slate-200">
        <div class="flex flex-row items-center justify-between mb-2 border-slate-200">
            <h5 class="text-2xl font-semibold">{{ $pengajuan->judul }}</h5>
            <div class="flex flex-row items-center">
                <h5 class="pr-4">Lama Kunjungan : {{ $pengajuan->tgl_mulai }} - {{ $pengajuan->tgl_selesai }}</h5>
                @if($pengajuan->status === "Menunggu Persetujuan")
                    <div class="w-fit pl-4 bg-orange-50 text-orange-600 p-2 rounded-xl text-center">{{ $pengajuan->status }}</div>
                @elseif($pengajuan->status === "Ditolak")
                    <div class="w-fit pl-4 bg-red-50 text-red-600 p-2 rounded-xl text-center">{{ $pengajuan->status }}</div>
                @else
                    <div class="w-fit pl-4 bg-green-100 text-green-600 p-2 rounded-xl text-center">{{ $pengajuan->status }}</div>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 divide-x py-4 border-t">
            <div class="flex flex-col pr-2">
                <h5 class="text-xl font-semibold">Tujuan Perjalanan Dinas</h5>
                <p class="text-slate-700 text-justify">{{ $pengajuan->tujuan }}</p>
            </div>
            <div class="flex flex-col pl-4">
                <h5 class="text-xl font-semibold">Deskripsi</h5>
                <p class="text-slate-700 text-justify">{{ $pengajuan->deskripsi }}</p>
            </div>
        </div>
        <div class="flex flex-col py-4 border-t">
            <h5 class="text-xl font-semibold">Anggota</h5>
            <div class="grid grid-cols-2 gap-2 mt-2">
                @foreach($pengajuan->users as $user)
                    <p class="text-slate-700 text-justify">• {{ $user->name }} ( {{ $user->email }} )</p>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col py-4 border-t">
            <h5 class="text-xl font-semibold">Akomodasi</h5>
            <div class="grid grid-cols-2 gap-2 mt-2">
                <div>
                    <h5 class="font-medium">Akomodasi Individu</h5>
                    <p class="text-slate-700 text-justify">{{ $pengajuan->akomodasi_perorangan }}</p>
                </div>
                <div>
                    <h5 class="font-medium">Akomodasi Transportasi</h5>
                    <p class="text-slate-700 text-justify">{{ $pengajuan->akomodasi_transportasi }}</p>
                </div>
                <div>
                    <h5 class="font-medium">Akomodasi Penginapan</h5>
                    <p class="text-slate-700 text-justify">{{ $pengajuan->akomodasi_penginapan }}</p>
                </div>
                <div>
                    <h5 class="font-medium">Akomodasi Lainnya</h5>
                    <p class="text-slate-700 text-justify">{{ $pengajuan->akomodasi_lainnya }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
