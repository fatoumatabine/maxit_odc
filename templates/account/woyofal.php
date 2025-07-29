<!-- Formulaire dynamique de paiement -->
<div id="dynamicFormContainer" class="hidden">
    <form id="dynamicWoyofalForm" action="/client/woyofal/payer" method="POST" class="bg-white rounded-xl shadow-lg p-6 space-y-5 max-w-xl mx-auto">
        <input type="hidden" name="service" id="selectedServiceInput">
        
        <!-- En-tête du formulaire -->
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-green-600 flex items-center gap-2">
                <i class="fas fa-bolt"></i>
                <span>Paiement - <span id="formServiceName">Service</span></span>
            </h3>
            <button type="button" class="cancel-form text-gray-400 hover:text-gray-600 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Champs du formulaire -->
        <div>
            <label for="numeroFacture" class="block text-gray-700 font-medium mb-2">
                <i class="fas fa-file-invoice-dollar text-green-500 mr-2"></i>
                Numéro de facture / référence
            </label>
            <input type="text" 
                   id="numeroFacture" 
                   name="numeroFacture" 
                   required 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-400 focus:ring-2 focus:ring-green-200 transition-all duration-300"
                   placeholder="Saisissez le numéro de votre facture">
        </div>
        
        <div id="montantField" class="hidden">
            <label for="montant" class="block text-gray-700 font-medium mb-2">
                <i class="fas fa-money-bill-wave text-green-500 mr-2"></i>
                Montant (CFA)
            </label>
            <input type="number" 
                   id="montant" 
                   name="montant" 
                   min="100" 
                   step="100" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-400 focus:ring-2 focus:ring-green-200 transition-all duration-300"
                   placeholder="Montant à payer">
        </div>
        
        <div>
            <label for="telephone" class="block text-gray-700 font-medium mb-2">
                <i class="fas fa-phone text-green-500 mr-2"></i>
                Numéro de téléphone
            </label>
            <input type="tel" 
                   id="telephone" 
                   name="telephone" 
                   required 
                   pattern="[0-9]{9}" 
                   maxlength="9" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-400 focus:ring-2 focus:ring-green-200 transition-all duration-300" 
                   placeholder="771234567">
            <p class="text-sm text-gray-500 mt-1">Format: 9 chiffres sans l'indicatif (+221)</p>
        </div>
        
        <!-- Boutons -->
        <div class="flex space-x-3 pt-4">
            <button type="button" 
                    class="cancel-form flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-times"></i> 
                Annuler
            </button>
            <button type="submit" 
                    class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-md transition-all duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-credit-card"></i> 
                Payer maintenant
            </button>
        </div>
    </form>
</div>