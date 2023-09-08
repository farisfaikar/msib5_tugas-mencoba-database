<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $position = $_POST['position'];
  $salary = $_POST['salary'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  // Memanggil koneksi menuju database
  include_once("connection.php");

  // Query untuk insert data ke database
  $result = mysqli_query(
    $mysqli,
    "INSERT INTO employees (name, email, position, address, salary) VALUES ('$name', '$email', '$position', '$address', '$salary')"
  );

  // Redirect
  header("Location: index.php");
  exit();
}
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
            jetbrains: ['JetBrains Mono'],
          }
        },
      },
    }
  </script>
  <link href="https://cdn-icons-png.flaticon.com/512/666/666201.png" rel="icon">
  <title>Add Employee | MSIB 5 - Tugas Mencoba Database</title>
</head>

<body class="bg-zinc-200 dark:bg-zinc-900">
  <section class="dark:sm:bg-[url('https://images.unsplash.com/photo-1653163061406-730a0df077eb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1392&q=80')] dark:bg-zinc-800 bg-cover bg-no-repeat bg-center sm:flex justify-center items-center h-screen">
    <!-- Card -->
    <div class="relative w-full sm:max-w-xl p-4 bg-white sm:rounded-lg shadow dark:bg-zinc-800 sm:p-5">
      <!-- Card header -->
      <div class="flex justify-center items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-zinc-600">
        <h4 class="text-center text-md font-semibold text-zinc-500 uppercase dark:text-zinc-400">Add Employee</h4>
      </div>
      <!-- Card body -->
      <form action="#" method="post">
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter employee name" required="">
          </div>
          <div class="sm:col-span-2">
            <label for="email" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter employee email address" required="">
          </div>
          <div>
            <label for="position" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Position</label>
            <select id="position" name="position" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
              <option value="" selected="" disabled>Choose a position</option>
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
            <label for="salary" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Salary</label>
            <input type="number" name="salary" id="salary" class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$100,000" required="">
          </div>
          <div class="sm:col-span-2">
            <label for="address" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Address</label>
            <textarea id="address" rows="4" name="address" class="block p-2.5 w-full text-sm text-zinc-900 bg-zinc-50 rounded-lg border border-zinc-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter employee address" required=""></textarea>
          </div>
        </div>
        <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
          <button type="submit" name="submit" class="w-full sm:w-auto justify-center text-zinc-900 dark:text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Add Employee</button>
          <a href="index.php" class="w-full justify-center sm:w-auto text-zinc-500 inline-flex items-center bg-white hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-zinc-200 text-sm font-medium px-5 py-2.5 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600">
            Go Back
          </a>
        </div>
      </form>
    </div>
  </section>
</body>

</html>