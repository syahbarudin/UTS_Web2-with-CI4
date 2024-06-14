<?php $title = 'Dosen';
include(APPPATH . 'Views/template/header.php'); ?>

<div class="container mx-auto p-4">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-3xl font-bold mb-4"><?= esc($greeting) ?>, <?= esc($username) ?>!</h1>
        <p class="text-lg">Selamat datang di SIAKAD. Ini adalah halaman home Anda.</p>
        <!-- Tombol untuk membuka modal absen -->
        <button id="absenButton" class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Absen
        </button>
    </div>
</div>

<!-- Modal Absen -->
<div id="absenModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Konten modal -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" id="absenForm">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Absen</h3>
                        <div class="mt-2">
                            <p id="tanggal" class="text-sm font-medium text-gray-700"></p>
                            <p id="waktu" class="text-sm font-medium text-gray-700 mb-4"></p>
                            <div class="map-container">
                                <div id="map" class="rounded-lg shadow-md"></div>
                            </div>
                            <p id="lokasi" class="text-sm font-medium text-gray-700 mt-4"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="closeModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
                <button id="absenButton" class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Absen
                </button>
            </div>
        </div>
    </div>
</div>

<?php include(APPPATH . 'Views/template/footer.php'); ?>
