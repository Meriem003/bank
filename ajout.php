<!doctype html>
<html lang="en">
<head>
  <?php
  include('./config.php');
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="../src/output.css" rel="stylesheet">
  <style>
    .Gk-joueur {
      display: none;
    }
    h1{
      text-align: center;
    }
  </style>
  <title>Dashboard</title>
</head>
<body class="bg-gray-100">
  <div class="flex flex-col md:flex-row h-screen">
    <!-- Sidebar -->
    <aside class="bg-blue-900 text-white w-full md:w-64 flex flex-col">
      <div class="p-4 text-center font-bold text-xl border-b border-blue-700">Dashboard</div>
      <nav class="flex-1 mt-4">
        <ul class="space-y-2">
          <li><a href="./index.php" class="block py-2 px-4 hover:bg-blue-700">les comptes</a></li>
          <li><a href="./ajout.php" class="block py-2 px-4 hover:bg-blue-700"> créer un compte</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 h-max-[100vh] overflow-y-auto">
      <section class="mb-6">
        <h1 class="text-3xl font-bold">Welcome to the Dashboard</h1>
      </section>

      <!-- User Registration Form -->
      <section id="userForm" class="mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        <form id="player-form" method="POST">
    <!-- numero de compte -->
    <div class="mb-4">
        <label for="nrCompte" class="block text-sm font-medium text-gray-700">Entrez le numero de compte</label>
        <input type="number" id="nrCompte" name="nrCompte" placeholder="numero de compte" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- full name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Entrez le nom et prénom</label>
        <input type="text" id="name" name="name" placeholder="nom prénom" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- solde-->
    <div class="mb-4">
        <label for="balance" class="block text-sm font-medium text-gray-700">Entrez balance</label>
        <input type="number" id="balance" name="balance" placeholder="balance" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- type de compte -->
    <div class="mb-4">
        <label for="compte" class="block text-sm font-medium text-gray-700">type compte</label>
        <select id="compte" name="compte" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="CURRENTAccount">current Account</option>
            <option value="SavingAccount">Saving Account</option>
            <option value="businessAccount">business Account</option>
        </select>
    </div>

    <!-- SavingAccount -->
    <div class="mb-4">
        <div id="Saving-Account" class="grid grid-cols-2 gap-4" style="display: none;">
            <div class="form-group">
                <label for="taux_Intert">taux_Intert</label>
                <input type="text" id="taux_Intert" name="taux_Intert" placeholder="Entrez taux_Intert" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
    </div>

    <!-- CURRENTAccount -->
    <div class="mb-4">
        <div id="CURRENT-Account" class="grid grid-cols-2 gap-4" style="display: none;">
            <div class="form-group">
                <label for="retrait">retrait</label>
                <input type="text" id="retrait" name="retrait" placeholder="Entrez retrait" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
    </div>

    <!-- businessAccount -->
    <div class="mb-4">
        <div id="businessAccount" class="grid grid-cols-2 gap-4" style="display: none;">
            <div class="form-group">
                <label for="frias">frias</label>
                <input type="text" id="frias" name="frias" placeholder="Entrez frias" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mb-4">
        <button type="submit" class="w-full px-4 py-2 bg-indigo-500 text-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">Submit</button>
    </div>
</form>
<?php
include 'config.php';
include './classes/classAccount.php';

?>
</div>
</section>
  <script src="../src/scripts/sendRequest.js?v=<?php echo time(); ?>"></script>
  <script src="../src/scripts/deletplayer.js?v=<?php echo time(); ?>"></script>
  <script>
  let compte = document.getElementById("compte");
  compte.addEventListener("change", function (event) {
      const selectedcompte = event.target.value;
      const Saving = document.querySelectorAll("#Saving-Account .form-group");
      const CURRENT = document.querySelectorAll("#CURRENT-Account .form-group");
      const business = document.querySelectorAll("#businessAccount .form-group");

      document.getElementById("Saving-Account").style.display = "none";
      document.getElementById("CURRENT-Account").style.display = "none";
      document.getElementById("businessAccount").style.display = "none";

      if (selectedcompte === "SavingAccount") {
        document.getElementById("Saving-Account").style.display = "block"; 
      } else if (selectedcompte === "CURRENTAccount") {
        document.getElementById("CURRENT-Account").style.display = "block"; 
      } else if (selectedcompte === "businessAccount") {
        document.getElementById("businessAccount").style.display = "block"; 
      }
  });
</script>
</body>
</html>