<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="../src/output.css" rel="stylesheet">
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
        <form method="POST"> 
    <!-- full name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Entrez le nom et prénom</label>
        <input type="text" id="name" name="name" placeholder="Nom Prénom" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- solde-->
    <div class="mb-4">
        <label for="balance" class="block text-sm font-medium text-gray-700">Entrez le solde initial</label>
        <input type="number" id="balance" name="balance" placeholder="Solde initial" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- type de compte -->
    <div class="mb-4">
        <label for="compte" class="block text-sm font-medium text-gray-700">Type de compte</label>
        <select id="compte" name="compte" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="SavingAccount">Saving Account</option>
            <option value="CURRENTAccount">Current Account</option>
            <option value="businessAccount">Business Account</option>
        </select>
    </div>

    <!-- Champs spécifiques -->
    <div id="Saving-Account" style="display: none;">
        <div class="mb-4">
            <label for="minimumBalance" class="block text-sm font-medium text-gray-700">Minimum Balance</label>
            <input type="number" id="minimumBalance" name="minimumBalance" placeholder="Minimum Balance" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
        </div>
    </div>

    <div id="CURRENT-Account" style="display: none;">
        <div class="mb-4">
            <label for="withdrawalLimit" class="block text-sm font-medium text-gray-700">Withdrawal Limit</label>
            <input type="number" id="withdrawalLimit" name="withdrawalLimit" placeholder="Withdrawal Limit" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
        </div>
    </div>

    <div id="businessAccount" style="display: none;">
        <div class="mb-4">
            <label for="creditLimit" class="block text-sm font-medium text-gray-700">Credit Limit</label>
            <input type="number" id="creditLimit" name="creditLimit" placeholder="Credit Limit" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
        </div>
    </div>

    <div class="mb-4">
        <button type="submit" name="envoyer" class="w-full px-4 py-2 bg-indigo-500 text-white rounded-lg shadow-sm focus:outline-none">Créer le compte</button>
    </div>
</form>
<?php
include_once './config.php';
include './classes/classAccount.php';
include './crud./addAccount.php';
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