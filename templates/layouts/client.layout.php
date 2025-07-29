<?php
$errors = $_SESSION['errors'] ?? null;
$user = $_SESSION['user'] ?? null;
$comptePrincipal = $comptePrincipal ?? null;
$comptesSecondaires = $comptesSecondaires ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - Dashboard Bancaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'orange-primary': '#FF8303',
                        'orange-light': '#FFB366',
                        'gray-dark': '#2C2C2C',
                        'black-dark': '#1A1A1A',
                    },
                    // --- Added custom border width here ---
                    borderWidth: {
                        '10': '10px', // Custom border width of 10px
                    }
                    // ------------------------------------
                }
            }
        }
    </script>
    <style>
        /* No custom scrollbar needed if scrolling is removed */
    </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">
    <nav class="bg-white shadow-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="bg-orange-primary p-2 rounded-lg shadow-sm">
                        <i class="fas fa-university text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-extrabold text-orange-primary tracking-tight">Espace Client</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-circle text-gray-dark text-xl"></i>
                        <?php if($user): ?>
                        <span class="text-gray-dark font-semibold text-lg"><?= htmlspecialchars($user['prenom']) ?></span>
                        <?php endif; ?>
                    </div>
                    <form action="/logout" method='POST'>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-full text-base font-medium transition-all duration-300 ease-in-out shadow-md hover:shadow-lg">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 min-h-screen"> <!-- Ajout de min-h-screen ici -->
        <aside class="w-64 bg-black-dark min-h-screen shadow-2xl relative pt-6 flex-shrink-0">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-8 pb-6 border-b border-gray-700/50">
                    <div class="w-14 h-14 bg-orange-primary rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-white text-xl"></i>
                    </div>
                    <div>
                        <?php if($user && $comptePrincipal): ?>
                        <h3 class="text-white font-bold text-lg leading-tight"><?= htmlspecialchars($user['prenom']) ?></h3>
                        <p class="text-gray-300 text-sm mt-0.5"><?= htmlspecialchars($comptePrincipal['typecompte']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <nav class="space-y-3">
                    <a href="/client/index" class="flex items-center space-x-4 text-white bg-orange-primary px-5 py-3 rounded-xl font-semibold transition-all duration-300 ease-in-out hover:bg-orange-light transform hover:scale-105 group shadow-lg">
                        <i class="fas fa-wallet text-white text-lg group-hover:text-white"></i>
                        <span>Mes comptes</span>
                    </a>
                    <!-- <a href="/account/create" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-plus-circle text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Créer un compte</span>
                    </a> -->
                    <a href="/client/transactions" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-exchange-alt text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Transactions</span>
                    </a>
                    <a href="#profile" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-user text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Mon profil</span>
                    </a>
                    <!-- <a href="/client/paiement" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-cog text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Paiement</span>
                    </a> -->
                    <a href="/client/woyofal" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-green-700 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group shadow-md">
                        <i class="fas fa-bolt text-green-400 text-lg group-hover:text-yellow-300"></i>
                        <span>Paiement</span>
                    </a>
                </nav>
            </div>
        </aside>
  

         <?php echo $content; ?>
    </div>


<script>
     
        // Gestion du formulaire de dépôt (if it were present on this page)
        document.getElementById('depositForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const account = document.getElementById('account').value;
            const amount = document.getElementById('amount').value;
            
            if (!account || !amount) {
                alert('Veuillez remplir tous les champs');
                return;
            }
            
            // Here, you'd add the logic to send the deposit request to the server
            console.log(`Dépôt de ${amount} CFA sur le compte ${account}`);
            
            // Simulation of success
            alert(`Dépôt de ${amount} CFA effectué avec succès sur votre compte ${account === 'En-cour' ? 'principal' : 'secondaire'}`);
            this.reset();
        });

function showTransactionDetails(transactionId) {
    // Implémentez la logique pour afficher les détails de la transaction
    console.log("Détails de la transaction:", transactionId);
    // Vous pourriez utiliser une modal ou une page séparée ici
}
</script>
 
</body>
</html>