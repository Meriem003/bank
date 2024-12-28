<!doctype html>
<html lang="en">
<?php
include('./config.php');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="../src/output.css" rel="stylesheet">
  <title>Dashboard</title>
</head>
<body class="bg-gray-100 h-auto">
  <div class="flex flex-col md:flex-row h-screen">
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
      <section id="userInfoRow" class="bg-white p-6 rounded-lg shadow-lg max-w-6xl mx-auto mt-8 h-auto">
          <div>
          <h1 class="text-2xl font-bold mb-4">Liste des Joueurs</h1>
<table id="players-table" class="table-auto border-collapse border border-gray-300 w-full text-sm">
  <thead>
    <tr class="bg-gray-200 max-w-8xl">
      <th class="border border-gray-300 px-10 py-2">nr compte</th>
      <th class="border border-gray-300 px-10 py-2">full name</th>
      <th class="border border-gray-300 px-10 py-2">solde</th>
      <th class="border border-gray-300 px-10 py-2">type compte</th>
      <th class="border border-gray-300 px-10 py-2">frias/retrait/taux_Intert</th>
    </tr>
  </thead>
  
  <tbody>
  </tbody>
</table>
</div>
</div>
</section>