@extends('layouts.guest')
@section('content')
<div class="flex flex-col gap-y-4">
    <h5 class="font-semibold text-2xl text-center mt-4">Selamat datang di website Perjalanan Dinas milik BPS</h5>
    <a href="{{ route('login') }}" class="w-full text-center rounded-xl bg-orange-600 py-2 text-white">Masuk</a>
</div>
@endsection
