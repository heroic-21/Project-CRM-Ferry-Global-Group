<div id="edit{{ $tiket->id_tiket }}" class="w-full h-full fixed top-0 left-0 z-50 transition-all bg-blend-overlay duration-500 hidden">
    <div class="sm:max-w-7xl opacity-100 duration-500 ease-out transition-all sm:w-full m-3 sm:mx-auto flex flex-col bg-white border shadow-[0_40px_70px_-12px_rgba(0,0,0,0.50)] rounded-md dark:bg-slate-800 dark:border-gray-700">
        <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
            <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                Edit Ticket {{ $tiket->user->name }}
            </h3>
            <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200" data-modal-dismiss="#edit{{ $tiket->id_tiket }}" type="button">
                <span class="material-symbols-rounded">close</span>
            </button>
        </div>
        <form action="{{ route('tickets.update', $tiket->id_tiket) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col p-4">
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Rute</label>
					<input type="text" id="rute" value="{{ $tiket->from }} - {{ $tiket->to }}" class="form-input" disabled>
				</div>
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Arah</label>
					<input type="text" id="arah" value="{{ $tiket->way }}" class="form-input" disabled>
				</div>
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Jenis Pembayaran</label>
					<input type="text" id="jenis_pembayaran" value="{{ $tiket->jenis_pembayaran }}" class="form-input" disabled>
				</div>
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Kelas Tiket</label>
					<input type="text" id="arah" value="{{ $tiket->kelas_tiket }}" class="form-input" disabled>
				</div>
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Status Tiket</label>
					<input type="text" id="arah" value="{{ $tiket->status_tiket }}" class="form-input" disabled>
				</div>
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Tanggal Berangkat</label>
					<input type="text" id="arah" value="{{ $tiket->deparature_date }}" class="form-input" disabled>
				</div>
                <div>
					<label for="simpleinput" class="text-gray-800 text-sm font-medium inline-block mb-2">Waktu Berangkat</label>
					<input type="text" id="arah" value="{{ $tiket->deparature_time }}" class="form-input" disabled>
				</div>
            </div>
            <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                <button class="btn dark:text-gray-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-100 hover:dark:bg-slate-700 transition-all" data-modal-dismiss="#edit{{ $tiket->id_tiket }}" type="button">Close</button>
                <button type="submit" class="btn bg-primary text-white">Save</button>
            </div>
        </form>
    </div>
</div>
