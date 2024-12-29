<?php
$account = new Account(null, null, $pdo);
$accounts = $account->readAllAccounts();

foreach ($accounts as $row) {
    echo "<tr>";
    echo "<td class='border border-gray-300 px-10 py-2'>{$row['id']}</td>";
    echo "<td class='border border-gray-300 px-10 py-2'>{$row['titulaire']}</td>";
    echo "<td class='border border-gray-300 px-10 py-2'>{$row['soldeInit']}</td>";
    echo "<td class='border border-gray-300 px-10 py-2'>" . ($row['minimumSolde'] ?? 'null') . "</td>";
    echo "<td class='border border-gray-300 px-10 py-2'>" . ($row['sommeLimit'] ?? 'null') . "</td>";
    echo "<td class='border border-gray-300 px-10 py-2'>" . ($row['limitCredit'] ?? 'null') . "</td>";

    echo "<td class='border border-gray-300 px-10 py-1'>
            <button><a href='afficher.php?id=" . $row['id'] . "' class='edit'>❌</a></button>
            <button><a href='afficher.php?id=" . $row['id'] . "' class='delete-btn'>✏️</a></button>
          </td>";
    echo "</tr>";
}