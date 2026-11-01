<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek Kelompok - Management Apotek</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px 30px; background-color: #f4f6f9; }
        
        /* Menu Tab Navigasi */
        .tab-navigation { display: flex; gap: 10px; margin-bottom: 25px; background: #ffffff; padding: 10px 15px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .tab-btn { background-color: #e0e0e0; color: #333; border: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 14px; transition: 0.3s; }
        .tab-btn.active { background-color: #4472c4; color: white; }

        .tab-content { display: none; }
        .tab-content.active { display: block; }

        .card { max-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .card-table { max-width: 900px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 40px; }
        
        .form-group { margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="date"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #70ad47; border-radius: 4px; }
        
        .btn { border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: bold; color: white; margin-right: 2px; }
        .btn-simpan { background-color: #4472c4; padding: 8px 25px; }
        .btn-detail { background-color: #17a2b8; }
        .btn-edit { background-color: #ffc107; color: #333; }
        .btn-delete { background-color: #dc3545; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4472c4; color: white; }

        /* Style Modal Dialog */
        .modal { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-content { background: white; margin: 10% auto; padding: 20px; width: 400px; border-radius: 8px; position: relative; }
        .close-btn { position: absolute; right: 15px; top: 10px; cursor: pointer; font-size: 20px; font-weight: bold; }
    </style>
</head>
<body>

    <h2 style="margin-bottom: 15px;">PROJEK KELOMPOK</h2>

    <!-- MENU TAB -->
    <div class="tab-navigation">
        <button class="tab-btn active" onclick="switchTab('pelanggan-tab', this)">Pelanggan</button>
        <button class="tab-btn" onclick="switchTab('staf-tab', this)">Staf Apotek</button>
        <button class="tab-btn" onclick="switchTab('obat-tab', this)">Daftar Obat</button>
    </div>

    <!-- 1. TAB PELANGGAN -->
    <div id="pelanggan-tab" class="tab-content active">
        <div class="card">
            <h3>Pelanggan</h3>
            <form action="/api/pelanggan" method="POST">
                <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
                <div class="form-group"><label>Alamat</label><input type="text" name="alamat" required></div>
                <div class="form-group"><label>No HP</label><input type="text" name="no_hp" required></div>
                <button type="submit" class="btn btn-simpan">simpan</button>
            </form>
        </div>

        <div class="card-table">
            <h3>Daftar Data Pelanggan</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggans as $p)
                    <tr>
                        <td>{{ $p->id_pelanggan }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>
                            <button class="btn btn-detail" onclick="showDetail('Pelanggan', 'ID: {{ $p->id_pelanggan }}\nNama: {{ $p->nama }}\nAlamat: {{ $p->alamat }}\nNo HP: {{ $p->no_hp }}')">Detail</button>
                            <button class="btn btn-edit" onclick="openEditPelanggan('{{ $p->id_pelanggan }}', '{{ $p->nama }}', '{{ $p->alamat }}', '{{ $p->no_hp }}')">Update</button>
                            <button class="btn btn-delete" onclick="deleteData('/api/pelanggan/{{ $p->id_pelanggan }}')">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="text-align:center;">Belum ada data pelanggan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- 2. TAB STAF APOTEK -->
    <div id="staf-tab" class="tab-content">
        <div class="card">
            <h3>Staf Apotek</h3>
            <form action="/api/staf" method="POST">
                <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
                <div class="form-group"><label>Alamat</label><input type="text" name="alamat" required></div>
                <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" required></div>
                <div class="form-group"><label>Tempat lahir</label><input type="text" name="tempat_lahir" required></div>
                <div class="form-group"><label>No HP</label><input type="text" name="no_hp" required></div>
                <button type="submit" class="btn btn-simpan">simpan</button>
            </form>
        </div>

        <div class="card-table">
            <h3>Daftar Data Staf Apotek</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Staff</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tgl Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stafs as $s)
                    <tr>
                        <td>{{ $s->id_staff }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->alamat }}</td>
                        <td>{{ $s->tanggal_lahir }}</td>
                        <td>{{ $s->tempat_lahir }}</td>
                        <td>{{ $s->no_hp }}</td>
                        <td>
                            <button class="btn btn-detail" onclick="showDetail('Staf Apotek', 'ID: {{ $s->id_staff }}\nNama: {{ $s->nama }}\nAlamat: {{ $s->alamat }}\nTgl Lahir: {{ $s->tanggal_lahir }}\nTempat Lahir: {{ $s->tempat_lahir }}\nNo HP: {{ $s->no_hp }}')">Detail</button>
                            <button class="btn btn-edit" onclick="openEditStaf('{{ $s->id_staff }}', '{{ $s->nama }}', '{{ $s->alamat }}', '{{ $s->tanggal_lahir }}', '{{ $s->tempat_lahir }}', '{{ $s->no_hp }}')">Update</button>
                            <button class="btn btn-delete" onclick="deleteData('/api/staf/{{ $s->id_staff }}')">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" style="text-align:center;">Belum ada data staf.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- 3. TAB DAFTAR OBAT -->
    <div id="obat-tab" class="tab-content">
        <div class="card">
            <h3>Daftar Obat</h3>
            <form action="/api/obat" method="POST">
                <div class="form-group"><label>Kode Obat</label><input type="text" name="kode_obat" required></div>
                <div class="form-group"><label>Nama Obat</label><input type="text" name="nama_obat" required></div>
                <div class="form-group"><label>Stock Obat</label><input type="number" name="stock_obat" required></div>
                <div class="form-group"><label>Tanggal Expired</label><input type="date" name="tanggal_kadaluaarsa" required></div>
                <button type="submit" class="btn btn-simpan">simpan</button>
            </form>
        </div>

        <div class="card-table">
            <h3>Daftar Data Obat</h3>
            <table>
                <thead>
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Stok</th>
                        <th>Tanggal Expired</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $o)
                    <tr>
                        <td>{{ $o->kode_obat }}</td>
                        <td>{{ $o->nama_obat }}</td>
                        <td>{{ $o->stock_obat }}</td>
                        <td>{{ $o->tanggal_kadaluaarsa }}</td>
                        <td>
                            <button class="btn btn-detail" onclick="showDetail('Obat', 'Kode: {{ $o->kode_obat }}\nNama: {{ $o->nama_obat }}\nStok: {{ $o->stock_obat }}\nExpired: {{ $o->tanggal_kadaluaarsa }}')">Detail</button>
                            <button class="btn btn-edit" onclick="openEditObat('{{ $o->kode_obat }}', '{{ $o->nama_obat }}', '{{ $o->stock_obat }}', '{{ $o->tanggal_kadaluaarsa }}')">Update</button>
                            <button class="btn btn-delete" onclick="deleteData('/api/obat/{{ $o->kode_obat }}')">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="text-align:center;">Belum ada data obat.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL EDIT POPUP -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h3 id="modalTitle">Edit Data</h3>
            <form id="editForm">
                <div id="modalInputs"></div>
                <br>
                <button type="button" class="btn btn-simpan" onclick="submitEdit()">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIK AKSI CRUD -->
    <script>
        let currentEditUrl = '';

        function switchTab(tabId, element) {
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');
            element.classList.add('active');
        }

        // Fitur Detail
        function showDetail(title, info) {
            alert("DETAIL DATA " + title.toUpperCase() + ":\n\n" + info);
        }

        // Fitur Delete
        function deleteData(url) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                fetch(url, { method: 'DELETE' })
                .then(res => res.json())
                .then(data => {
                    alert(data.message || "Data berhasil dihapus!");
                    location.reload();
                });
            }
        }

        // Fitur Update Pop-Up
        function openEditPelanggan(id, nama, alamat, no_hp) {
            currentEditUrl = '/api/pelanggan/' + id;
            document.getElementById('modalTitle').innerText = 'Edit Pelanggan';
            document.getElementById('modalInputs').innerHTML = `
                <div class="form-group"><label>Nama</label><input type="text" id="edit_nama" value="${nama}"></div>
                <div class="form-group"><label>Alamat</label><input type="text" id="edit_alamat" value="${alamat}"></div>
                <div class="form-group"><label>No HP</label><input type="text" id="edit_nohp" value="${no_hp}"></div>
            `;
            document.getElementById('editModal').style.display = 'block';
        }

        function openEditStaf(id, nama, alamat, tgl, tempat, no_hp) {
            currentEditUrl = '/api/staf/' + id;
            document.getElementById('modalTitle').innerText = 'Edit Staf Apotek';
            document.getElementById('modalInputs').innerHTML = `
                <div class="form-group"><label>Nama</label><input type="text" id="edit_nama" value="${nama}"></div>
                <div class="form-group"><label>Alamat</label><input type="text" id="edit_alamat" value="${alamat}"></div>
                <div class="form-group"><label>Tanggal Lahir</label><input type="date" id="edit_tgl" value="${tgl}"></div>
                <div class="form-group"><label>Tempat Lahir</label><input type="text" id="edit_tempat" value="${tempat}"></div>
                <div class="form-group"><label>No HP</label><input type="text" id="edit_nohp" value="${no_hp}"></div>
            `;
            document.getElementById('editModal').style.display = 'block';
        }

        function openEditObat(kode, nama, stok, expired) {
            currentEditUrl = '/api/obat/' + kode;
            document.getElementById('modalTitle').innerText = 'Edit Obat';
            document.getElementById('modalInputs').innerHTML = `
                <div class="form-group"><label>Nama Obat</label><input type="text" id="edit_nama" value="${nama}"></div>
                <div class="form-group"><label>Stok</label><input type="number" id="edit_stok" value="${stok}"></div>
                <div class="form-group"><label>Tanggal Expired</label><input type="date" id="edit_expired" value="${expired}"></div>
            `;
            document.getElementById('editModal').style.display = 'block';
        }

        function submitEdit() {
            let payload = {};
            if (document.getElementById('edit_nama')) payload.nama = document.getElementById('edit_nama').value;
            if (document.getElementById('edit_alamat')) payload.alamat = document.getElementById('edit_alamat').value;
            if (document.getElementById('edit_nohp')) payload.no_hp = document.getElementById('edit_nohp').value;
            if (document.getElementById('edit_tgl')) payload.tanggal_lahir = document.getElementById('edit_tgl').value;
            if (document.getElementById('edit_tempat')) payload.tempat_lahir = document.getElementById('edit_tempat').value;
            if (document.getElementById('edit_stok')) payload.stock_obat = document.getElementById('edit_stok').value;
            if (document.getElementById('edit_expired')) payload.tanggal_kadaluaarsa = document.getElementById('edit_expired').value;

            fetch(currentEditUrl, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message || "Data berhasil diperbarui!");
                location.reload();
            });
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>

</body>
</html>