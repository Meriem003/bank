<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="../src/output.css" rel="stylesheet">
  <title>Dashboard</title>
</head>
<body class="bg-gray-100 h-auto">
  <div class="flex flex-col md:flex-row h-auto">
    <!-- Sidebar -->
    <aside class="bg-blue-900 text-white w-full md:w-64 flex flex-col">
      <div class="p-4 text-center font-bold text-xl border-b border-blue-700">La banque NeoBank</div>
      <nav class="flex-1 mt-4">
      <ul class="space-y-2">
          <li><a href="./index.php" class="block py-2 px-4 hover:bg-blue-700">les comptes</a></li>
          <li><a href="./ajout.php" class="block py-2 px-4 hover:bg-blue-700"> créer un compte</a></li>
        </ul>
      </nav>
    </aside>
</section>
      <section id="userInfoRow" class="bg-white p-6 rounded-lg shadow-lg max-w-6xl mx-auto mt-8 h-screen">
          <div>
          <h1 class="text-2xl font-bold mb-4">Liste des comptes</h1>
<table id="players-table" class="table-auto border-collapse border border-gray-300 w-full text-sm">
  <thead>
    <tr class="bg-gray-200 max-w-8xl">
      <th class="border border-gray-300 px-10 py-2">ID</th>
      <th class="border border-gray-300 px-10 py-2">nom prénom</th>
      <th class="border border-gray-300 px-10 py-2">Solde Initial</th>
      <th class="border border-gray-300 px-10 py-2">Min Solde</th>
      <th class="border border-gray-300 px-10 py-2">Som Limit</th>
      <th class="border border-gray-300 px-10 py-2">Lim Credit</th>     
      <th class="border border-gray-300 px-10 py-2">action</th>
    </tr>
  </thead>
  <tbody>
  <?php
include_once './config.php';
include './classes/classAccount.php';
include './crud./readall.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $account = new Account(null, null, $pdo);
  $account->delete($id);
  header("Location: index.php");
  exit();
} else {
  echo "No account ID specified!";
}
?>
</tbody>
</table>
</div>
</div>
</section>