<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventaris Obat - Management Apotek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased">

    <div class="flex min-h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between p-5 shadow-xl">
            <div>
                <div class="flex items-center gap-3 px-2 mb-8">
                    <div class="bg-blue-600 p-2.5 rounded-xl text-white font-bold"><i class="fa-solid fa-pills text-xl"></i></div>
                    <div>
                        <h1 class="font-bold text-lg leading-tight">Apotek System</h1>
                        <span class="text-xs text-slate-400">Projek Kelompok</span>
                    </div>
                </div>
                <nav class="space-y-1.5">
                    <a href="/pelanggan" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-medium">
                        <i class="fa-solid fa-users w-5"></i> Pelanggan
                    </a>
                    <a href="/staf" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-medium">
                        <i class="fa-solid fa-user-tie w-5"></i> Staf Apotek
                    </a>
                    <a href="/obat" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30">
                        <i class="fa-solid fa-prescription-bottle-medical w-5"></i> Daftar Obat
                    </a>
                </nav>
            </div>
            <div class="text-xs text-slate-500 text-center border-t border-slate-800 pt-4">
                TRKJ &copy; 2026
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Daftar Inventaris Obat</h2>
                    <p class="text-sm text-slate-500">Kelola stok obat-obatan dan tanggal masa kadaluarsa.</p>
                </div>
                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-full"><i class="fa-solid fa-circle text-[8px] mr-1.5 text-blue-500"></i> Stock Monitoring</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- FORM TAMBAH -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80 h-fit">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-square-plus text-blue-600"></i> Tambah Obat Baru
                    </h3>
                    <form action="/api/obat" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Kode Obat</label>
                            <input type="text" name="kode_obat" required placeholder="Contoh: OBT-001" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Nama Obat</label>
                            <input type="text" name="nama_obat" required placeholder="Masukkan nama obat" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Stok Obat</label>
                            <input type="number" name="stock_obat" required placeholder="Jumlah stok" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Tanggal Expired</label>
                            <input type="date" name="tanggal_kadaluaarsa" required class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition shadow-md shadow-blue-600/20">
                            Simpan Data Obat
                        </button>
                    </form>
                </div>

                <!-- TABEL DATA -->
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-boxes-stacked text-blue-600"></i> Daftar Stok Obat
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 bg-slate-50/50 text-slate-500 text-xs font-semibold uppercase">
                                    <th class="py-3 px-4">Kode</th>
                                    <th class="py-3 px-4">Nama Obat</th>
                                    <th class="py-3 px-4">Stok</th>
                                    <th class="py-3 px-4">Kadaluarsa</th>
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                @forelse($obats as $o)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="py-3 px-4 font-semibold text-blue-600">{{ $o->kode_obat }}</td>
                                    <td class="py-3 px-4 font-medium text-slate-900">{{ $o->nama_obat }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            {{ $o->stock_obat }} unit
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-slate-500">{{ $o->tanggal_kadaluaarsa }}</td>
                                    <td class="py-3 px-4 flex justify-center gap-1.5">
                                        <button onclick="openDetail('{{ $o->kode_obat }}', '{{ $o->nama_obat }}', '{{ $o->stock_obat }}', '{{ $o->tanggal_kadaluaarsa }}')" class="p-2 bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-blue-600 rounded-lg text-xs font-medium transition"><i class="fa-solid fa-eye"></i></button>
                                        <button onclick="openEdit('{{ $o->kode_obat }}', '{{ $o->nama_obat }}', '{{ $o->stock_obat }}', '{{ $o->tanggal_kadaluaarsa }}')" class="p-2 bg-amber-50 hover:bg-amber-100 text-amber-600 rounded-lg text-xs font-medium transition"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button onclick="confirmDelete('/api/obat/{{ $o->kode_obat }}')" class="p-2 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg text-xs font-medium transition"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="py-8 text-center text-slate-400">Belum ada obat tersimpan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL DETAIL MODERN -->
    <div id="detailModal" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-2xl space-y-4">
            <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-lg"><i class="fa-solid fa-capsules"></i></div>
                    <h3 class="font-bold text-slate-900">Detail Obat</h3>
                </div>
                <button onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div class="space-y-2.5 text-sm">
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Kode Obat</span><span id="detail_kode" class="font-semibold text-blue-600"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Nama Obat</span><span id="detail_nama" class="font-semibold text-slate-800"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Stok Tersedia</span><span id="detail_stok" class="font-semibold text-emerald-600"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Tanggal Kadaluarsa</span><span id="detail_expired" class="font-semibold text-slate-800"></span></div>
            </div>
            <button onclick="closeDetailModal()" class="w-full py-2 bg-slate-100 text-slate-700 rounded-xl font-medium text-xs">Tutup</button>
        </div>
    </div>

    <!-- MODAL EDIT MODERN -->
    <div id="editModal" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl space-y-4">
            <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg"><i class="fa-solid fa-pen-to-square"></i></div>
                    <h3 class="font-bold text-slate-900">Edit Data Obat</h3>
                </div>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div class="space-y-3">
                <div><label class="text-xs font-semibold text-slate-500">Nama Obat</label><input type="text" id="edit_nama" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
                <div><label class="text-xs font-semibold text-slate-500">Stok Obat</label><input type="number" id="edit_stok" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
                <div><label class="text-xs font-semibold text-slate-500">Tanggal Expired</label><input type="date" id="edit_expired" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button onclick="closeModal()" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold">Batal</button>
                <button onclick="submitEdit()" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-xs font-semibold shadow-md shadow-blue-600/20">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <script>
        let currentEditKode = '';

        function openDetail(kode, nama, stok, expired) {
            document.getElementById('detail_kode').innerText = kode;
            document.getElementById('detail_nama').innerText = nama;
            document.getElementById('detail_stok').innerText = stok + ' Unit';
            document.getElementById('detail_expired').innerText = expired;
            document.getElementById('detailModal').classList.remove('hidden');
        }
        function closeDetailModal() { document.getElementById('detailModal').classList.add('hidden'); }

        function confirmDelete(url) {
            Swal.fire({
                title: 'Hapus Data Obat?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(url, { method: 'DELETE' }).then(res => res.json()).then(data => {
                        Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message || 'Data obat telah dihapus.', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                    });
                }
            });
        }

        function openEdit(kode, nama, stok, expired) {
            currentEditKode = kode;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_stok').value = stok;
            document.getElementById('edit_expired').value = expired;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function submitEdit() {
            fetch('/api/obat/' + currentEditKode, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nama_obat: document.getElementById('edit_nama').value, stock_obat: document.getElementById('edit_stok').value, tanggal_kadaluaarsa: document.getElementById('edit_expired').value })
            }).then(res => res.json()).then(data => {
                Swal.fire({ icon: 'success', title: 'Berhasil Diperbarui!', text: data.message, timer: 1500, showConfirmButton: false }).then(() => location.reload());
            });
        }
        function closeModal() { document.getElementById('editModal').classList.add('hidden'); }
    </script>
</body>
</html>