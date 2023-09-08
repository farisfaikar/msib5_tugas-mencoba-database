<?php 

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($mysqli, 'SELECT * FROM karyawan');

?>

<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            inter: ['Inter'],
            jetbrains: ['JetBrains Mono'],
          }
        },
      },
    }
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
  <link href="https://cdn-icons-png.flaticon.com/512/666/666201.png" rel="icon">
  <title>MSIB 5 - Tugas Mencoba Database</title>
</head>

<body class="p-2 dark:bg-zinc-900">
  <!-- Start block -->
  <section class="bg-zinc-50 dark:bg-zinc-900 p-3 sm:p-5 antialiased">
    <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
      <div class="bg-white dark:bg-zinc-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col space-y-3 p-4">
          <h2 class="text-lg font-semibold text-left text-zinc-900 bg-white dark:text-white dark:bg-zinc-800">Tabel Karyawan</h2>
          <p class="mt-1 text-sm font-normal text-zinc-500 dark:text-zinc-400">
            Berikut merupakan data karyawan yang bisa
            diedit, ditambah, dan dihapus secara otomatis ke dan data akan diperbarui di database secara otomatis.
          </p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-start mx-4 py-4 border-t dark:border-zinc-700">
          <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <button type="button" id="createProductButton" data-modal-toggle="createProductModal" class="flex items-center justify-center text-zinc-900 dark:text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
              <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
              </svg>
              Tambah Karyawan
            </button>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-zinc-500 dark:text-zinc-400">
            <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
              <tr>
                <th scope="col" class="p-4">Nama</th>
                <th scope="col" class="p-4">Posisi</th>
                <th scope="col" class="p-4">Gaji</th>
                <th scope="col" class="p-4">Alamat</th>
                <th scope="col" class="p-4">Email</th>
                <th scope="col" class="p-4">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while($user_data = mysqli_fetch_array($result)) {
              ?>
              <tr class="dark:border-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-700">
                <th scope="row" class="px-4 py-3 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                  <div class="flex items-center mr-3">
                    <?php echo $user_data['nama']; ?>
                  </div>
                </th>
                <td class="px-4 py-3"><?php echo $user_data['posisi']; ?></td>
                <td class="px-4 py-3">Rp <?php echo number_format($user_data['gaji'], 0, ',', '.'); ?></td>
                <td class="px-4 py-3"><?php echo $user_data['alamat']; ?></td>
                <td class="px-4 py-3"><?php echo $user_data['email']; ?></td>
                <td class="px-4 py-3 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                  <div class="flex items-center space-x-4">
                    <button type="button" data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product" aria-controls="drawer-update-product" class="py-2 px-3 flex items-center text-sm font-medium text-center text-zinc-900 dark:text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                      </svg>
                      Edit
                    </button>
                    <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                      Hapus
                    </button>
                  </div>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- End block -->
  <!-- Create Modal -->
  <div id="createProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative p-4 bg-white rounded-lg shadow dark:bg-zinc-800 sm:p-5">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-zinc-600">
          <h4 id="drawer-label" class="inline-flex items-center text-md font-semibold text-zinc-500 uppercase dark:text-zinc-400">Tambah Karyawan</h4>
          <button type="button" class="text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-zinc-600 dark:hover:text-white" data-modal-toggle="createProductModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form action="#" method="post">
          <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
              <label for="nama" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Nama</label>
              <input type="text" name="nama" id="nama" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan nama karyawan" required="">
            </div>
            <div><label for="posisi" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Posisi</label><select id="posisi" name="posisi" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected="">Pilih posisi</option>
                <option value="Tech Lead">Tech Lead</option>
                <option value="Frontend Developer">Frontend Developer</option>
                <option value="Backend Engineer">Backend Engineer</option>
                <option value="UI/UX Designer">UI/UX Designer</option>
                <option value="Project Manager">Project Manager</option>
                <option value="Scrum Master">Scrum Master</option>
                <option value="Quality Assurance">Quality Assurance</option>
                <option value="Data Analyst">Data Analyst</option>
                <option value="Cloud Architect">Cloud Architect</option>
                <option value="Database Administrator">Database Administrator</option>
                <option value="Software Tester">Software Tester</option>
                <option value="IT Consultant">IT Consultant</option>
                <option value="Network Specialist">Network Specialist</option>
              </select></div>
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Email</label>
              <input type="email" name="email" id="email" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan email karyawan" required="">
            </div>
            <div>
              <label for="gaji" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Gaji</label>
              <input type="number" name="gaji" id="gaji" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp 10.000.000" required="">
            </div>
            <div class="sm:col-span-2">
              <label for="alamat" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Alamat</label>
              <textarea id="alamat" rows="4" name="alamat" class="block p-2.5 w-full text-sm text-zinc-900 bg-zinc-50 rounded-lg border border-zinc-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan alamat karyawan"></textarea>
            </div>
          </div>
          <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <button type="submit" name="submit-create" class="w-full sm:w-auto justify-center text-zinc-900 dark:text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Tambah Karyawan</button>
            <button data-modal-toggle="createProductModal" type="button" class="w-full justify-center sm:w-auto text-zinc-500 inline-flex items-center bg-white hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-zinc-200 text-sm font-medium px-5 py-2.5 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600">
              <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
              Batal
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Edit Drawer -->
  <form action="#" id="drawer-update-product" class="fixed top-0 left-0 z-40 w-full h-screen -translate-x-full max-w-3xl p-4 overflow-y-auto transition-transform bg-white dark:bg-zinc-800" tabindex="-1" aria-labelledby="drawer-update-product-label" aria-hidden="true">
    <div class="mb-3 pb-3 border-b dark:border-zinc-600">
      <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-zinc-500 uppercase dark:text-zinc-400">Edit Karyawan</h5>
    </div>
    <button type="button" data-drawer-dismiss="drawer-update-product" aria-controls="drawer-update-product" class="text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-zinc-600 dark:hover:text-white">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
      <span class="sr-only">Close menu</span>
    </button>
    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
      <div class="space-y-4 sm:col-span-2 sm:space-y-6">
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Nama</label>
          <input type="text" name="name" id="name" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Masukkan nama karyawan" required="">
        </div>
        <div>
          <label for="email" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Email</label>
          <input type="email" id="email" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Masukkan email karyawan" required="">
        </div>
        <div>
          <label for="alamat" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Alamat</label>
          <textarea id="alamat" rows="4" class="block p-2.5 w-full h-full text-sm text-zinc-900 bg-zinc-50 rounded-lg border border-zinc-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan alamat karyawan"></textarea>
        </div>
      </div>
      <div class="space-y-4 sm:space-y-6">
        <div>
          <label for="posisi" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Posisi</label>
          <select id="posisi" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option selected="">Pilih posisi</option>
            <option value="Tech Lead">Tech Lead</option>
            <option value="Frontend Developer">Frontend Developer</option>
            <option value="Backend Engineer">Backend Engineer</option>
            <option value="UI/UX Designer">UI/UX Designer</option>
            <option value="Project Manager">Project Manager</option>
            <option value="Scrum Master">Scrum Master</option>
            <option value="Quality Assurance">Quality Assurance</option>
            <option value="Data Analyst">Data Analyst</option>
            <option value="Cloud Architect">Cloud Architect</option>
            <option value="Database Administrator">Database Administrator</option>
            <option value="Software Tester">Software Tester</option>
            <option value="IT Consultant">IT Consultant</option>
            <option value="Network Specialist">Network Specialist</option>
          </select>
        </div>
        <div>
          <label for="gaji" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Gaji</label>
          <input type="number" name="gaji" id="gaji" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp 10.000.000" required="">
        </div>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mt-6 sm:w-1/2">
      <button type="submit" class="text-zinc-900 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update data</button>
      <button type="button" class="text-red-600 inline-flex justify-center items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
        <svg aria-hidden="true" class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
        Hapus
      </button>
    </div>
  </form>
  <!-- Delete Modal -->
  <div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full h-auto max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-zinc-700">
        <button type="button" class="absolute top-3 right-2.5 text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-zinc-800 dark:hover:text-white" data-modal-toggle="delete-modal">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="p-6 text-center">
          <svg aria-hidden="true" class="mx-auto mb-4 text-zinc-400 w-14 h-14 dark:text-zinc-200" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <h3 class="mb-5 text-lg font-normal text-zinc-500 dark:text-zinc-400">Apakah anda yakin ingin menghapus data karyawan tersebut?</h3>
          <button data-modal-toggle="delete-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Ya, saya yakin</button>
          <button data-modal-toggle="delete-modal" type="button" class="text-zinc-500 bg-white hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-zinc-200 rounded-lg border border-zinc-200 text-sm font-medium px-5 py-2.5 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600">Tidak, batalkan</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

  <!-- Handle permintaan POST dari form diatas -->
  <?php
  if (isset($_POST['submit-create'])) {
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $gaji = $_POST['gaji'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // Memanggil koneksi menuju database
    include_once("connection.php");

    // Query untuk insert data ke database
    $result = mysqli_query(
      $mysqli,
      "INSERT INTO karyawan (nama, email, posisi, alamat, gaji) VALUES ('$nama', '$email', '$posisi', '$alamat', '$gaji')"
    );

    // Refresh halaman dan tampilkan data
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
  }
  ?>

</body>

</html>