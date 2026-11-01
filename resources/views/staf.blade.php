<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staf Apotek - Management Apotek</title>
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
                    <a href="/staf" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30">
                        <i class="fa-solid fa-user-tie w-5"></i> Staf Apotek
                    </a>
                    <a href="/obat" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-medium">
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
                    <h2 class="text-2xl font-bold text-slate-900">Management Staf Apotek</h2>
                    <p class="text-sm text-slate-500">Kelola informasi data pegawai dan kualifikasi staf.</p>
                </div>
                <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full"><i class="fa-solid fa-circle text-[8px] mr-1.5 text-emerald-500"></i> Active Status</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- FORM TAMBAH -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80 h-fit">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-user-plus text-blue-600"></i> Tambah Staf Baru
                    </h3>
                    <form action="/api/staf" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Nama Staf</label>
                            <input type="text" name="nama" required placeholder="Masukkan nama" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Alamat</label>
                            <input type="text" name="alamat" required placeholder="Masukkan alamat" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required placeholder="Masukkan kota lahir" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">No HP</label>
                            <input type="text" name="no_hp" required placeholder="08xxxxxxxxxx" class="w-full px-3.5 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
                        </div>
                        <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition shadow-md shadow-blue-600/20">
                            Simpan Staf
                        </button>
                    </form>
                </div>

                <!-- TABEL DATA -->
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-list text-blue-600"></i> Daftar Data Staf
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 bg-slate-50/50 text-slate-500 text-xs font-semibold uppercase">
                                    <th class="py-3 px-4">ID</th>
                                    <th class="py-3 px-4">Nama</th>
                                    <th class="py-3 px-4">Alamat</th>
                                    <th class="py-3 px-4">TTL</th>
                                    <th class="py-3 px-4">No HP</th>
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                @forelse($stafs as $s)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="py-3 px-4 font-semibold text-blue-600">#{{ $s->id_staff }}</td>
                                    <td class="py-3 px-4 font-medium text-slate-900">{{ $s->nama }}</td>
                                    <td class="py-3 px-4 text-slate-500">{{ $s->alamat }}</td>
                                    <td class="py-3 px-4 text-slate-500">{{ $s->tempat_lahir }}, {{ $s->tanggal_lahir }}</td>
                                    <td class="py-3 px-4 text-slate-500">{{ $s->no_hp }}</td>
                                    <td class="py-3 px-4 flex justify-center gap-1.5">
                                        <button onclick="openDetail('{{ $s->id_staff }}', '{{ $s->nama }}', '{{ $s->alamat }}', '{{ $s->tanggal_lahir }}', '{{ $s->tempat_lahir }}', '{{ $s->no_hp }}')" class="p-2 bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-blue-600 rounded-lg text-xs font-medium transition"><i class="fa-solid fa-eye"></i></button>
                                        <button onclick="openEdit('{{ $s->id_staff }}', '{{ $s->nama }}', '{{ $s->alamat }}', '{{ $s->tanggal_lahir }}', '{{ $s->tempat_lahir }}', '{{ $s->no_hp }}')" class="p-2 bg-amber-50 hover:bg-amber-100 text-amber-600 rounded-lg text-xs font-medium transition"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button onclick="confirmDelete('/api/staf/{{ $s->id_staff }}')" class="p-2 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg text-xs font-medium transition"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="py-8 text-center text-slate-400">Belum ada data staf tersimpan.</td></tr>
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
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-lg"><i class="fa-solid fa-id-badge"></i></div>
                    <h3 class="font-bold text-slate-900">Detail Staf Apotek</h3>
                </div>
                <button onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div class="space-y-2.5 text-sm">
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">ID Staf</span><span id="detail_id" class="font-semibold text-blue-600"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Nama Staf</span><span id="detail_nama" class="font-semibold text-slate-800"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Alamat</span><span id="detail_alamat" class="font-semibold text-slate-800"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">Tempat / Tanggal Lahir</span><span id="detail_ttl" class="font-semibold text-slate-800"></span></div>
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100"><span class="text-xs text-slate-400 block font-medium uppercase">No HP</span><span id="detail_nohp" class="font-semibold text-slate-800"></span></div>
            </div>
            <button onclick="closeDetailModal()" class="w-full py-2 bg-slate-100 text-slate-700 rounded-xl font-medium text-xs">Tutup</button>
        </div>
    </div>

    <!-- MODAL EDIT MODERN -->
    <div id="editModal" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl space-y-4">
            <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg"><i class="fa-solid fa-user-pen"></i></div>
                    <h3 class="font-bold text-slate-900">Edit Data Staf</h3>
                </div>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div class="space-y-3">
                <div><label class="text-xs font-semibold text-slate-500">Nama</label><input type="text" id="edit_nama" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
                <div><label class="text-xs font-semibold text-slate-500">Alamat</label><input type="text" id="edit_alamat" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
                <div><label class="text-xs font-semibold text-slate-500">Tanggal Lahir</label><input type="date" id="edit_tgl" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
                <div><label class="text-xs font-semibold text-slate-500">Tempat Lahir</label><input type="text" id="edit_tempat" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
                <div><label class="text-xs font-semibold text-slate-500">No HP</label><input type="text" id="edit_nohp" class="w-full mt-1 px-3.5 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600 outline-none"></div>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button onclick="closeModal()" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold">Batal</button>
                <button onclick="submitEdit()" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-xs font-semibold shadow-md shadow-blue-600/20">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <script>
        let currentEditId = '';

        function openDetail(id, nama, alamat, tgl, tempat, no_hp) {
            document.getElementById('detail_id').innerText = '#' + id;
            document.getElementById('detail_nama').innerText = nama;
            document.getElementById('detail_alamat').innerText = alamat;
            document.getElementById('detail_ttl').innerText = tempat + ', ' + tgl;
            document.getElementById('detail_nohp').innerText = no_hp;
            document.getElementById('detailModal').classList.remove('hidden');
        }
        function closeDetailModal() { document.getElementById('detailModal').classList.add('hidden'); }

        function confirmDelete(url) {
            Swal.fire({
                title: 'Hapus Data Staf?',
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
                        Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message || 'Data telah dihapus.', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                    });
                }
            });
        }

        function openEdit(id, nama, alamat, tgl, tempat, no_hp) {
            currentEditId = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('edit_tgl').value = tgl;
            document.getElementById('edit_tempat').value = tempat;
            document.getElementById('edit_nohp').value = no_hp;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function submitEdit() {
            fetch('/api/staf/' + currentEditId, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nama: document.getElementById('edit_nama').value, alamat: document.getElementById('edit_alamat').value, tanggal_lahir: document.getElementById('edit_tgl').value, tempat_lahir: document.getElementById('edit_tempat').value, no_hp: document.getElementById('edit_nohp').value })
            }).then(res => res.json()).then(data => {
                Swal.fire({ icon: 'success', title: 'Berhasil Diperbarui!', text: data.message, timer: 1500, showConfirmButton: false }).then(() => location.reload());
            });
        }
        function closeModal() { document.getElementById('editModal').classList.add('hidden'); }
    </script>
</body>
</html>