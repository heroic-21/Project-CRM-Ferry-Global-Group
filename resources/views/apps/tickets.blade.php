@extends('layouts.vertical', ['title' => 'Data Penjualan Tiket', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')
<div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
	<div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-primary/25 ">
					<i class="mgc_tag_line text-4xl text-primary"></i>
				</div>
				<div class="text-right">
					<h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{ $totalTiket }}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Total Tickets</p>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-yellow-100">
					<i class="mgc_alarm_2_line text-4xl text-yellow-500"></i>
				</div>
				<div class="text-right">
					<h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{ $totalTiketTertunda }}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Tertunda</p>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-green-100">
					<i class="mgc_check_line text-4xl text-green-500"></i>
				</div>
				<div class="text-right">
					<h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{ $totalTiketBerangkat }}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Berangkat</p>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-rose-100">
					<i class="mgc_history_line text-4xl text-rose-500"></i>
				</div>
				<div class="text-right">
                <h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{$totalTiketBelum}}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Belum Berangkat</p>
				</div>
			</div>
		</div>
	</div>

    <div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-red-100">
					<i class="mgc_delete_back_line text-4xl text-red-500"></i>
				</div>
				<div class="text-right">
                <h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{$totalTiketBatal}}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Batal</p>
				</div>
			</div>
		</div>
	</div>

    <div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-indigo-100">
					<i class="mgc_bank_card_fill text-4xl text-indigo-500"></i>
				</div>
				<div class="text-right">
					<h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{ $totalTiketPremium }}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Tiket Premium</p>
				</div>
			</div>
		</div>
	</div>

    <div class="card">
		<div class="p-5">
			<div class="flex justify-between">
				<div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-cyan-100">
					<i class="mgc_bank_card_line text-4xl text-cyan-500"></i>
				</div>
				<div class="text-right">
					<h3 class="text-gray-700 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">{{ $totalTiketBiasa }}</h3>
					<p class="text-gray-500 mb-1 truncate dark:text-gray-400">Tiket Biasa</p>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="mt-6">
    <div class="card">
        <div class="flex flex-wrap justify-between items-center gap-2 p-3">
            <div class="flex justify-start">
                <input type="text" id="searchInput" placeholder="Search..." class="hidden border-0 w-[23rem] lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700">
            </div>
            <div class="flex flex-wrap gap-2">
                <a type="button" class="btn bg-success text-sm font-medium text-white hover:text-white hover:bg-success">
                    <i class="mgc_add_circle_fill"></i>
                </a>
                <button type="button" class="btn bg-dark/25 text-sm font-medium text-slate-900 dark:text-slate-200/70 hover:text-white hover:bg-dark/90">Export</button>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full divide-y divide-gray-300 dark:divide-gray-700">
                <thead class="bg-slate-300 bg-opacity-20 border-t dark:bg-slate-800 divide-gray-300 dark:border-gray-700">
                    <tr>
                        <th scope="col" class="py-3.5 ps-4 pe-3 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Id Tiket</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Pelanggan</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Rute</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Arah</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Jenis Pembayaran</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Kelas Tiket</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Tanggal Berangkat</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Waktu Berangkat</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Status Tiket</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700" id="tableBody">
                    @foreach ($dataTiket as $tiket)
                    @csrf
                    <tr>
                        <td class="text-center whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->id_tiket }}</td>
                        <td class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->user->name }}</td>
                        <td class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->from }} - {{ $tiket->to }}</td>
                        <td class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->way }}</td>
                        <td class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->jenis_pembayaran }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            @if($tiket->kelas_tiket == "Biasa")
                                <div class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium bg-blue-700/25 text-blue-700">{{ $tiket->kelas_tiket }}</div>
                            @else
                                <div class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium bg-yellow-700/25 text-yellow-700">{{ $tiket->kelas_tiket }}</div>
                            @endif
                        </td>
                        <td class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->deparature_date }}</td>
                        <td class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{ $tiket->deparature_time }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            @if($tiket->status_tiket == "Batal")
                                <div class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium bg-red-700/25 text-red-700">{{ $tiket->status_tiket }}</div>
                            @elseif($tiket->status_tiket == "Tertunda")
                                <div class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium bg-yellow-700/25 text-yellow-700">{{ $tiket->status_tiket }}</div>
                            @elseif($tiket->status_tiket == "Sudah Berangkat")
                                <div class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium bg-green-700/25 text-green-700">{{ $tiket->status_tiket }}</div>
                            @else
                                <div class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium bg-sky-700/25 text-sky-700">{{ $tiket->status_tiket }}</div>
                            @endif
                        </td>
                        <td class="whitespace-nowrap py-4 px-3 text-center text-sm font-medium">
                            <button class="btn bg-primary text-white me-0.5" data-modal-target="#edit{{ $tiket->id_tiket }}">
                                <i class="mgc_edit_line text-lg"></i>
                            </button>
                            <a class="btn bg-danger text-white me-0.5" href="{{ route('tickets.delete', ['id_tiket' => $tiket->id_tiket]) }}" class="ms-0.5">
                                <i class="mgc_delete_line text-xl"></i>
                            </a>
                        </td>
                    </tr>
                    @include('apps.editTickets', ['tiket' => $tiket])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    @vite(['resources/js/pages/table-gridjs.js'])
    @vite(['resources/js/pages/highlight.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to show modal
            function showModal(modalId) {
                const modal = document.querySelector(modalId);
                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('block');
                }
            }

            // Function to hide modal
            function hideModal(modalId) {
                const modal = document.querySelector(modalId);
                if (modal) {
                    modal.classList.remove('block');
                    modal.classList.add('hidden');
                }
            }

            // Attach event listeners to buttons with data-modal-target attribute
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-target');
                    showModal(modalId);
                });
            });

            // Attach event listeners to buttons with data-modal-dismiss attribute
            document.querySelectorAll('[data-modal-dismiss]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-dismiss');
                    hideModal(modalId);
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('tableBody');
            const rows = tableBody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const filter = searchInput.value.toLowerCase();

                Array.from(rows).forEach(function(row) {
                    const cells = row.getElementsByTagName('td');
                    let match = false;

                    Array.from(cells).forEach(function(cell) {
                        if (cell.textContent.toLowerCase().includes(filter)) {
                            match = true;
                        }
                    });

                    if (match) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
