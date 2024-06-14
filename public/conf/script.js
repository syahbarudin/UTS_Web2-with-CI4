
    document.addEventListener('DOMContentLoaded', function () {
        var menuButton = document.getElementById('menuButton');
        var menuDropdown = document.getElementById('menuDropdown');

        menuButton.addEventListener('click', function () {
            menuDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!menuButton.contains(e.target) && !menuDropdown.contains(e.target)) {
                menuDropdown.classList.add('hidden');
            }
        });
    });




document.addEventListener('DOMContentLoaded', function () {
    var absenButton = document.getElementById('absenButton');
    var absenModal = document.getElementById('absenModal');
    var closeModal = document.getElementById('closeModal');
    var tanggalInput = document.getElementById('tanggal');
    var waktuInput = document.getElementById('waktu');
    var mapContainer = document.getElementById('map');

    absenButton.addEventListener('click', function () {
        absenModal.classList.remove('hidden');
        // Ambil tanggal dan waktu saat ini
        var now = new Date();
        var tanggal = now.toISOString().slice(0, 10);
        var waktu = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        tanggalInput.textContent = 'Tanggal: ' + tanggal;
        waktuInput.textContent = 'Waktu: ' + waktu;

        // Inisialisasi peta Leaflet.js
        var map = L.map(mapContainer).setView([-6.2088, 106.8456], 15); // Koordinat Jakarta dengan zoom level 15

        // Tambahkan layer peta dari OSM ke peta Leaflet
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ambil lokasi pengguna menggunakan geolokasi
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Tambahkan marker ke peta
                L.marker(userLocation).addTo(map)
                    .bindPopup('Lokasi Anda')
                    .openPopup();

                // Set nilai lokasi dengan koordinat atau keterangan lain sesuai kebutuhan
                document.getElementById('lokasi').textContent = `Lokasi Anda: ${userLocation.lat}, ${userLocation.lng}`;

                // Set nilai input tersembunyi latitude dan longitude
                document.getElementById('latitude').value = userLocation.lat;
                document.getElementById('longitude').value = userLocation.lng;

                // Posisi peta ke lokasi pengguna
                map.setView(userLocation, 15);
            }, function (error) {
                console.error(error);
                document.getElementById('lokasi').textContent = 'Tidak dapat mengambil lokasi';
            });
        } else {
            document.getElementById('lokasi').textContent = 'Geolokasi tidak didukung oleh browser ini';
        }
    });

    closeModal.addEventListener('click', function () {
        absenModal.classList.add('hidden');
    });

    document.getElementById('absenForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var form = e.target;
        var formData = new FormData(form);

        // Kirim permintaan POST ke backend
        fetch('/dosen/processAbsen', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            absenModal.classList.add('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim data absen.');
        });
    });
});





