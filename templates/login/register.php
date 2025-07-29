<?php
$title = 'Inscription - MAXITSA';
$showNavbar = false;
ob_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-primary': '#E67514',
                        'custom-light': '#fff5f2',
                        'custom-dark': '#374151',
                        'custom-darker': '#1f2937',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-black from-custom-light to-orange-200 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-6 flex-col items-center">
                    <img src="/uploads/images/LOG.png" alt="MAXITSA" class="w-24 h-24 object-contain mb-2" style="background: #fff; border-radius: 50%; box-shadow: 0 2px 8px #e6751440;">

                </div>
                <h2 class="text-3xl font-extrabold text-black-900 mb-2">
                    Créer votre compte
                </h2>
                <p class="text-sm text-custom-dark">
                    Rejoignez MAXITSA pour accéder à votre espace personnel
                </p>
            </div>

            <!-- Messages d'erreur/succès -->
            <?php if (isset($error) && $error): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success) && $success): ?>
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire -->
            <form class="space-y-6" method="POST" action="/register" enctype="multipart/form-data" id="registerForm">
                <div>
                    <label for="numerosCarteIdentite" class="block text-sm font-medium text-custom-dark mb-1">
                        Numéro de CNI

                        <span class="text-xs text-gray-500"></span>
                    </label>

                    <div class="relative">
                        <div role="status" class=" absolute hidden  right-3 top-3" id="spinner">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>

                        <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                            <i class="text-custom-primary fa fa-id-card"></i>

                        </div>

                        <input
                            id="numerosCarteIdentite"
                            name="numerosCarteIdentite"
                            type="text"
                            class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                            placeholder=""
                            pattern="^[1-2][0-9]{12}$"
                            title="CNI sénégalais " />
                        <div class="messages">
                            <p class="error-message hidden text-green-800 text-xs mt-1"></p>
                            <p class="success-message hidden text-red-800 text-xs mt-1"></p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>

                        <label for="prenom" class="block text-sm font-medium text-dark mb-1">
                            Prénom
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="fa fa-user text-custom-primary"></i>
                            </div>
                            <input

                                id="prenom"
                                name="prenom"
                                type="text"
                                value=""

                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Prénom" />
                        </div>
                    </div>

                    <div>
                        <label for="nom" class="block text-sm font-medium text-custom-dark mb-1">
                            Nom
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="fa fa-user text-custom-primary"></i>
                            </div>
                            <input
                                readonly
                                id="nom"
                                name="nom"
                                type="text"

                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Nom" />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date_naissance" class="block text-sm font-medium text-dark mb-1">
                            Date de naissance
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="fa fa-calendar text-custom-primary"></i>
                            </div>
                            <input
                                readonly
                                id="date_naissance"
                                name="date_naissance"
                                type="date"

                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Date de naissance" />
                        </div>
                    </div>

                    <div>
                        <label for="lieu_naissance" class="block text-sm font-medium text-custom-dark mb-1">
                            Lieu de naissance
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="fa fa-user text-custom-primary"></i>
                            </div>
                            <input
                                readonly
                                id="lieu_naissance"
                                name="lieu_naissance"
                                type="text"

                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Lieu de naissance" />
                        </div>
                    </div>
                </div>



                <!-- Mot de passe -->
                <div>
                    <label for="password" class="block text-sm font-medium text-custom-dark mb-1">
                        Mot de passe
                        <span class="text-xs text-gray-500">(8+ caractères)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3 top-3 text-dark opacity-60">
                            <i class="text-custom-primary fa fa-lock"></i>
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"


                            class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                            placeholder="Créer un mot de passe fort" />
                    </div>
                    <div id="password-strength" class="mt-1 text-xs"></div>
                </div>

                <!-- Confirmation mot de passe -->


                <!-- CNI et Adresse -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Téléphone -->
                    <div>

                        <label for="phone" class="block text-sm font-medium text-dark mb-1">
                            Numéro de téléphone
                            <span class="text-xs text-gray-500"></span>
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-dark opacity-60">
                                <i class="text-custom-primary fa fa-phone"></i>
                            </div>
                            <input
                                id="phone"
                                name="phone"
                                type="tel"

                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder=""
                                title="" />
                        </div>
                    </div>


                    <div>
                        <label for="adresse" class="block text-sm font-medium text-dark mb-1">
                            Adresse
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="text-custom-primary fa fa-map-marker-alt"></i>
                            </div>
                            <input
                                id="adresse"
                                name="adresse"
                                type="text"

                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Votre adresse complète" />
                        </div>
                    </div>
                </div>

                <!-- Upload des photos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <!-- <label class="block text-sm font-medium text-dark mb-1">
                            Photo carte d'identité
                        </label> -->
                        <input
                            id="copie_cni"
                            type="hidden"
                            name="copie_cni"

                            class="block w-full text-sm text-custom-dark file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-custom-primary hover:file:bg-orange-100 border border-gray-300 rounded-lg" />
                    </div>



                </div>

                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="w-[50%] bg-custom-primary hover:bg-orange-800 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center"
                        id="submitBtn">
                        <span id="submitText">Créer le compte</span>
                    </button>
                </div>

                <!-- Lien de connexion -->
                <div class="text-center">
                    <p class="text-sm text-custom-dark">
                        Vous avez déjà un compte ?
                        <a href="/login" class="font-medium text-custom-primary hover:text-orange-800 transition-colors">
                            Se connecter
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/register.js"></script>

</body>

</html>

<?php
$content = ob_get_clean();
echo $content;
?>