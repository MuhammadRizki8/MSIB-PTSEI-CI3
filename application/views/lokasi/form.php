<!DOCTYPE html>
<html>
<head>
    <title><?= isset($lokasi) ? 'Edit' : 'Tambah'; ?> Lokasi</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 400px; margin-top: 20px; }
        .card { padding: 20px; border-radius: 8px; }
        .btn { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="container" style="min-height: 80vh;">
        <h2 class="mb-4"><?= isset($lokasi) ? 'Edit' : 'Tambah'; ?> Lokasi</h2>
        <form method="post" class="card p-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="namaLokasi">Nama Lokasi</label>
                    <input type="text" class="form-control" id="namaLokasi" name="namaLokasi" value="<?= isset($lokasi['namaLokasi']) ? htmlspecialchars($lokasi['namaLokasi']) : ''; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="negara">Negara</label>
                    <input type="text" class="form-control" id="negara" name="negara" value="<?= isset($lokasi['negara']) ? htmlspecialchars($lokasi['negara']) : ''; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= isset($lokasi['provinsi']) ? htmlspecialchars($lokasi['provinsi']) : ''; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" value="<?= isset($lokasi['kota']) ? htmlspecialchars($lokasi['kota']) : ''; ?>" required>
                </div>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary mr-2"><?= isset($lokasi) ? 'Update' : 'Tambah'; ?></button>
                <a href="<?= base_url('lokasi'); ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
        
        <div id="map"></div>
        <form id="location-form">
            <input type="hidden" id="lat" name="lat" value="<?= isset($lokasi['lat']) ? htmlspecialchars($lokasi['lat']) : '-6.9175'; ?>">
            <input type="hidden" id="lng" name="lng" value="<?= isset($lokasi['lng']) ? htmlspecialchars($lokasi['lng']) : '107.6191'; ?>">
            <button type="submit" class="btn btn-primary my-3">Simpan Lokasi di Peta</button>
        </form>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta dengan default Bandung
        var lat = <?= isset($lokasi['lat']) ? htmlspecialchars($lokasi['lat']) : '-6.9175'; ?>;
        var lng = <?= isset($lokasi['lng']) ? htmlspecialchars($lokasi['lng']) : '107.6191'; ?>;

        var map = L.map('map').setView([lat, lng], 13);

        // Menambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Menambahkan marker dengan lokasi default
        var marker = L.marker([lat, lng]).addTo(map);

        // Geocoding dengan Nominatim
        function reverseGeocode(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                .then(response => response.json())
                .then(data => {
                    if (data.address) {
                        document.getElementById('namaLokasi').value = data.address.road || '';
                        document.getElementById('negara').value = data.address.country || '';
                        document.getElementById('provinsi').value = data.address.state || '';
                        document.getElementById('kota').value = data.address.city || '';
                    }
                });
        }

        // Mengatur marker dan form saat peta diklik
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            marker.setLatLng([lat, lng]);
            marker.bindPopup('Lokasi dipilih: ' + lat.toFixed(6) + ', ' + lng.toFixed(6)).openPopup();

            // Update input hidden
            document.getElementById('lat').value = lat.toFixed(6);
            document.getElementById('lng').value = lng.toFixed(6);

            // Geocoding
            reverseGeocode(lat, lng);
        });

        // Update marker dan form dengan data awal
        reverseGeocode(lat, lng);

        // Handle form submission
        document.getElementById('location-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Lokasi disimpan: Latitude ' + document.getElementById('lat').value + ', Longitude ' + document.getElementById('lng').value);
            // Anda dapat menambahkan logika tambahan di sini untuk mengirim data ke server
        });
    </script>
</body>
</html>
