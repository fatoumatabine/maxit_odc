<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-md overflow-hidden text-white">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Effectuer un dépôt</h3>
                        <p class="text-orange-100 text-sm mb-4">Ajoutez des fonds à votre compte rapidement</p>
                        <a href="/client/depot" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-orange-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all duration-200">
                            <i class="fas fa-plus-circle mr-2"></i> Dépôt rapide
                        </a>
                    </div>
                    <i class="fas fa-money-bill-wave text-4xl opacity-20"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-md overflow-hidden text-white">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Effectuer un transfert</h3>
                        <p class="text-blue-100 text-sm mb-4">Envoyez de l'argent à un bénéficiaire</p>
                        <a href="/client/transfert" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-blue-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all duration-200">
                            <i class="fas fa-paper-plane mr-2"></i> Nouveau transfert
                        </a>
                    </div>
                    <i class="fas fa-exchange-alt text-4xl opacity-20"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-md overflow-hidden text-white">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Payer une facture</h3>
                        <p class="text-green-100 text-sm mb-4">Réglez vos factures en quelques clics</p>
                        <a href="/client/paiement" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-green-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all duration-200">
                            <i class="fas fa-file-invoice-dollar mr-2"></i> Payer maintenant
                        </a>
                    </div>
                    <i class="fas fa-receipt text-4xl opacity-20"></i>
                </div>
            </div>
        </div>
    </div> -->
    <div class="flex justify-between items-center mb-8">
        <a href="/client/index" class="inline-flex items-center text-orange-600 hover:text-orange-500 font-medium transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Retour au tableau de bord
        </a>
        <h1 class="text-3xl font-bold text-gray-900 flex items-center">
            <i class="fas fa-exchange-alt text-orange-500 mr-3"></i>
            Historique des transactions
        </h1>
        <div class="w-24"></div> <!-- Pour l'alignement -->
    </div>

    <!-- Filtres améliorés -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8 border border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-filter text-orange-500 mr-2"></i>
            Filtres avancés
        </h2>
        <form method="get" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500 shadow-sm">
                    <option value="">Tous les statuts</option>
                    <?php foreach($statuts as $statut): ?>
                        <option value="<?= $statut ?>" <?= ($selectedStatus ?? '') === $statut ? 'selected' : '' ?>>
                            <?= ucfirst($statut) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500 shadow-sm">
                    <option value="">Tous les types</option>
                    <?php foreach($types as $type): ?>
                        <option value="<?= $type ?>" <?= ($selectedType ?? '') === $type ? 'selected' : '' ?>>
                            <?= ucfirst($type) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Recherche</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="search" placeholder="" 
                           value="<?= htmlspecialchars($search ?? '') ?>" 
                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500 shadow-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date début</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="far fa-calendar-alt text-gray-400"></i>
                    </div>
                    <input type="date" name="date_debut" value="<?= htmlspecialchars($dateDebut ?? '') ?>" 
                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500 shadow-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date fin</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="far fa-calendar-alt text-gray-400"></i>
                    </div>
                    <input type="date" name="date_fin" value="<?= htmlspecialchars($dateFin ?? '') ?>" 
                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500 shadow-sm">
                </div>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-medium shadow-md transition flex items-center justify-center">
                    <i class="fas fa-filter mr-2"></i> Appliquer
                </button>
            </div>
        </form>
    </div>

    <!-- Tableau amélioré -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date/Heure</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($transactions)): ?>
                        <?php foreach ($transactions as $transaction): ?>
                            <tr class="hover:bg-orange-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?= date('d/m/Y', strtotime($transaction['date'])) ?></div>
                                    <div class="text-sm text-gray-500"><?= date('H:i', strtotime($transaction['date'])) ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        <?php
                                        $status = strtolower($transaction['status']);
                                        if ($status === 'termine' || $status === 'terminer') echo 'bg-green-100 text-green-800';
                                        elseif ($status === 'annuler') echo 'bg-red-100 text-red-800';
                                        elseif ($status === 'en cours') echo 'bg-blue-100 text-blue-800';
                                        else echo 'bg-yellow-100 text-yellow-800';
                                        ?>">
                                        <?= htmlspecialchars($transaction['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <?php $icon = getTransactionIcon($transaction['typetransaction']); ?>
                                        <span class="text-sm font-medium text-gray-900">
                                            <?= htmlspecialchars($transaction['typetransaction']) ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold <?= $transaction['montant'] > 0 ? 'text-green-600' : 'text-red-600' ?>">
                                    <?= number_format($transaction['montant'], 0, ',', ' ') ?> CFA
                                </td>
                               
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <i class="fas fa-exchange-alt text-4xl mb-3"></i>
                                    <h3 class="text-lg font-medium">Aucune transaction trouvée</h3>
                                    <p class="text-sm mt-1">Essayez de modifier vos filtres de recherche</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination améliorée -->
    <?php if (!empty($pagination) && $pagination['pages'] > 1): ?>
    <div class="flex items-center justify-between mt-8 px-4 py-3 bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Affichage de <span class="font-medium"><?= $pagination['start'] ?></span> à <span class="font-medium"><?= $pagination['end'] ?></span> sur <span class="font-medium"><?= $pagination['total'] ?></span> transactions
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <?php if ($pagination['page'] > 1): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $pagination['page'] - 1])) ?>" 
                           class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Précédent</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = max(1, $pagination['page'] - 2); $i <= min($pagination['pages'], $pagination['page'] + 2); $i++): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
                           class="<?= $i == $pagination['page'] ? 'z-10 bg-orange-50 border-orange-500 text-orange-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' ?> relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($pagination['page'] < $pagination['pages']): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $pagination['page'] + 1])) ?>" 
                           class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Suivant</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- Fonction pour les icônes (à placer dans votre helper) -->
<?php 
function getTransactionIcon($type) {
    $icons = [
        'depot' => 'fas fa-money-bill-wave',
        'retrait' => 'fas fa-hand-holding-usd',
        'transfert' => 'fas fa-exchange-alt',
        'paiement' => 'fas fa-credit-card',
        'facture' => 'fas fa-file-invoice-dollar'
    ];
    return $icons[strtolower($type)] ?? 'fas fa-exchange-alt';
}
?>

<script>
function showDetails(transactionId) {
    // Implémentez la logique pour afficher les détails de la transaction
    console.log("Détails de la transaction:", transactionId);
    // Vous pourriez utiliser une modal ou une page séparée ici
}
</script> 