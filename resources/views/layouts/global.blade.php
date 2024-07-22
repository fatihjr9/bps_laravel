<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi SI-NANAS</title>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>
<body>

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
       <span class="sr-only">Open sidebar</span>
       <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
       <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
       </svg>
    </button>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
       <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-slate-800">
          <img src= "{{ asset('/bps.png') }}" class="w-28 pb-4" />
          <div class="flex flex-col justify-between">
              <ul class="space-y-2 font-medium border-t border-gray-700 py-2">
                  @if(Auth::user()->role == 'superadmin')
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Kelola Pengajuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Laporan Perjadin</span>
                        </a>
                    </li>
                  @elseif(Auth::user()->role == 'admin')
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-pegawai-index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin-pegawai-index') ? 'bg-gray-700 p-2' : '' }}">
                            <span class="">Kelola Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-pengajuan-index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin-pengajuan-index') ? 'bg-gray-700 p-2' : '' }}">
                            <span class="">Kelola Pengajuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Kelola Dokumen</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Kelola Anggaran</span>
                        </a>
                    </li>
                  @else
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Pengajuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="">Cetak File</span>
                        </a>
                    </li>
                  @endif
              </ul>
              <ul class="space-y-2 bg-slate-700 rounded-xl p-2 font-medium border-t border-gray-700 pt-2">
                 <li>
                     <p class="p-2 text-white">Halo, {{ Auth::user()->name }}</p>
                 </li>
                 <li>
                     <form method="POST" action="{{ route('logout') }}" class="p-2 hover:bg-slate-600 rounded-xl">
                       @csrf
                       <button type="submit" class="text-white w-full text-left">Logout</button>
                     </form>
                 </li>
              </ul>
          </div>
       </div>
    </aside>

    <div class="p-4 sm:ml-64">
       <div class="p-4">
          @yield('content')
       </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>
