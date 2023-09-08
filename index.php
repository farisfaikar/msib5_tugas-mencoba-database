<?php
// Include connection through the database
include_once("connection.php");

// Call data from the database
$result = mysqli_query($mysqli, 'SELECT * FROM employees');
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

<body class="dark:bg-zinc-900 bg-zinc-200">
  <section class="dark:sm:bg-[url('https://images.unsplash.com/photo-1653163061406-730a0df077eb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1392&q=80')] dark:bg-zinc-800 bg-cover bg-no-repeat bg-center h-screen sm:p-5 antialiased">
    <div class="mx-auto max-w-screen-2xl">
      <div class="bg-white dark:bg-zinc-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col space-y-3 p-4">
          <h2 class="text-lg font-semibold text-center sm:text-left text-zinc-900 bg-white dark:text-white dark:bg-zinc-800">Employee Table</h2>
          <p class="mt-1 text-sm font-normal text-zinc-500 dark:text-zinc-400">
            The table below shows data from all the employees in this company. You as admin can create, edit, and delete employee data and changes will automatically be saved into the database.
          </p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center sm:space-x-3 space-y-3 sm:space-y-0 justify-start mx-4 py-4 border-t dark:border-zinc-700">
          <div class="w-full sm:w-auto flex flex-col sm:flex-row space-y-2 sm:space-y-0 items-stretch sm:items-center justify-end md:space-x-3 flex-shrink-0">
            <a type="button" id="createProductButton" href="add.php" class="flex items-center justify-center text-zinc-900 dark:text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
              <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
              </svg>
              Add Employee
            </a>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-zinc-500 dark:text-zinc-400">
            <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
              <tr>
                <th scope="col" class="p-4">Name</th>
                <th scope="col" class="p-4">Position</th>
                <th scope="col" class="p-4">Salary</th>
                <th scope="col" class="p-4">Address</th>
                <th scope="col" class="p-4">Email</th>
                <th scope="col" class="p-4">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Add an empty row if there are no records
              if (mysqli_num_rows($result) === 0) {
                ?>
                <tr class="dark:border-zinc-600">
                  <td colspan="6" class="px-4 py-3 text-center text-zinc-900 dark:text-white">
                    The table is empty.
                  </td>
                </tr>
                <?php
              } else {
                while ($user_data = mysqli_fetch_array($result)) {
                  ?>
                  <tr class="dark:border-zinc-600">
                    <th scope="row" class="px-4 py-3 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                      <div class="flex items-center mr-3">
                        <?= $user_data['name'] ?>
                      </div>
                    </th>
                    <td class="px-4 py-3">
                      <?= $user_data['position'] ?>
                    </td>
                    <td class="px-4 py-3">
                      $<?= number_format($user_data['salary'], 0, ',', '.') ?>
                    </td>
                    <td class="px-4 py-3">
                      <?= $user_data['address'] ?>
                    </td>
                    <td class="px-4 py-3">
                      <?= $user_data['email'] ?>
                    </td>
                    <td class="px-4 py-3 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                      <div class="flex items-center space-x-4">
                        <a href="edit.php?id=<?= $user_data['id'] ?>" class="py-2 px-3 flex items-center text-sm font-medium text-center text-zinc-900 dark:text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                          </svg>
                          Edit
                        </a>
                        <button type="button" data-modal-target="delete-modal-<?= $user_data['id'] ?>" data-modal-toggle="delete-modal-<?= $user_data['id'] ?>" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          Delete
                        </button>
                      </div>
                    </td>
                  </tr>

                  <!-- Delete Modal -->
                  <div id="delete-modal-<?= $user_data['id'] ?>" aria-hidden="true" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full h-auto max-w-md max-h-full">
                      <div class="relative bg-white rounded-lg shadow dark:bg-zinc-700">
                        <button type="button" class="absolute top-3 right-2.5 text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-zinc-800 dark:hover:text-white" data-modal-toggle="delete-modal-<?= $user_data['id'] ?>">
                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                          <svg aria-hidden="true" class="mx-auto mb-4 text-zinc-400 w-14 h-14 dark:text-zinc-200" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          <h3 class="mb-5 text-lg font-normal text-zinc-500 dark:text-zinc-400">Are you sure you want to delete this employee record?</h3>
                          <a href="delete.php?id=<?= $user_data['id'] ?>" data-modal-toggle="delete-modal-<?= $user_data['id'] ?>" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes, I'm sure</a>
                          <button data-modal-toggle="delete-modal-<?= $user_data['id'] ?>" type="button" class="text-zinc-500 bg-white hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-zinc-200 rounded-lg border border-zinc-200 text-sm font-medium px-5 py-2.5 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600">No, cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>