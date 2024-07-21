@extends('layouts.vertical', ['title' => 'Data Pelanggan', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <div class="flex justify-between items-center">
            <h4 class="card-title">Basic</h4>
        </div>
    </div>
    <div class="p-6">
        <p class="text-sm text-slate-700 dark:text-slate-400 mb-4">Nama Nama Pelanggan Yang Sudah Mendaftar Akan Ditampilkan Di Sini</p>
        <div id="table-gridjs-pelanggan"></div>
    </div>
</div>

@endsection

@section('script')
    @vite(['resources/js/pages/table-gridjs.js'])
    @vite(['resources/js/pages/highlight.js'])

    <script>
        // Mengirimkan data pelanggan ke JavaScript
        window.dataPelanggan = @json($dataPelanggan);
    </script>
@endsection
