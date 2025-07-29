// Animation du formulaire
document
  .getElementById("registerForm")
  .addEventListener("submit", function (e) {
    const btn = document.getElementById("submitBtn");
    const text = document.getElementById("submitText");

    // Vérifier que la date de naissance n'est pas vide
    const dateNaissance = document.getElementById("date_naissance").value;
    if (!dateNaissance) {
      e.preventDefault();
      alert(
        "Veuillez d'abord valider votre CNI pour récupérer vos informations."
      );
      return;
    }

    text.textContent = "Création en cours...";
    btn.disabled = true;
    btn.classList.add("opacity-60");
  });

// Validation du téléphone sénégalais
document.getElementById("phone").addEventListener("input", function (e) {
  const phone = e.target.value.replace(/\D/g, "");
  const isValid = /^(77|78|76|75|70)\d{7}$/.test(phone);

  if (phone.length > 0) {
    if (isValid) {
      e.target.classList.remove("border-red-500", "bg-red-50");
      e.target.classList.add("border-green-500", "bg-green-50");
    } else {
      e.target.classList.remove("border-green-500", "bg-green-50");
      e.target.classList.add("border-red-500", "bg-red-50");
    }
  } else {
    e.target.classList.remove(
      "border-red-500",
      "bg-red-50",
      "border-green-500",
      "bg-green-50"
    );
  }
});
// nurmero cni
const prenomInput = document.getElementById("prenom");
const spinner = document.getElementById("spinner");
document
  .getElementById("numerosCarteIdentite")
  .addEventListener("input", function (e) {
    const cni = e.target.value;
    const cniPattern = /^[1-2][0-9]{12}$/;
    const successMsg = e.target.parentElement.querySelector(".success-message");
    const errorMsg = e.target.parentElement
      .querySelector(".messages")
      .querySelector(".error-message");

    if (cniPattern.test(cni)) {
      // Cacher tous les messages et afficher le spinner
      successMsg.classList.add("hidden");
      errorMsg.classList.add("hidden");
      spinner.classList.remove("hidden");

      const response = validateCNI(cni);
      response.then((data) => {
        // Cacher le spinner en premier
        spinner.classList.add("hidden");

        if (data.statut === "success") {
          setFormData(data.data);
          successMsg.textContent = data.message;
          successMsg.classList.remove("hidden");
          successMsg.classList.add(
            "text-green-600",
            "bg-green-50",
            "border-green-200"
          );
          successMsg.classList.remove(
            "text-red-600",
            "bg-red-50",
            "border-red-200"
          );
          errorMsg.classList.add("hidden");
        } else {
          errorMsg.textContent = data.message;
          errorMsg.classList.remove("hidden");
          errorMsg.classList.add("text-red-600", "bg-red-50", "border-red-200");
          errorMsg.classList.remove(
            "text-green-600",
            "bg-green-50",
            "border-green-200"
          );
          successMsg.classList.add("hidden");
        }
      });
      // .catch((error) => {
      //   // Gérer les erreurs de réseau/API
      //   spinner.classList.add("hidden");
      //   errorMsg.textContent =
      //     error.message || "Erreur de connexion. Veuillez réessayer.";
      //   errorMsg.classList.remove("hidden");
      //   errorMsg.classList.add("text-red-600", "bg-red-50", "border-red-200");
      //   errorMsg.classList.remove(
      //     "text-green-600",
      //     "bg-green-50",
      //     "border-green-200"
      //   );
      //   successMsg.classList.add("hidden");
      // });
    } else {
      // Cacher le spinner et les messages de succès pour les CNI invalides
      spinner.classList.add("hidden");
      successMsg.classList.add("hidden");
      errorMsg.textContent =
        "Numéro de CNI est invalide (13 chiffres, commence par 1 ou 2)";
      errorMsg.classList.remove("hidden");
      errorMsg.classList.add("text-red-600", "bg-red-50", "border-red-200");
      errorMsg.classList.remove(
        "text-green-600",
        "bg-green-50",
        "border-green-200"
      );
    }
  });

async function validateCNI(cni) {
  try {
    const result = await fetch(
      `https://application-daf.onrender.com/api/v1/citoyens/${cni}`
    );

    const response = await result.json();
    console.log("Réponse API:", response); // Pour le débogage

    // Retourner la réponse dans tous les cas (succès ou échec)
    return response;
  } catch (error) {
    console.error("Erreur lors de la validation CNI:", error);
    throw error;
  }
}
function setFormData(data) {
  console.log("Données reçues de l'API:", data); // Pour débogage

  document.getElementById("prenom").value = data.prenom || "";
  document.getElementById("nom").value = data.nom || "";

  // Formater la date pour l'input de type date (YYYY-MM-DD)
  if (data.date_naissance) {
    console.log("Date de naissance brute:", data.date_naissance); // Pour débogage
    let dateNaissance = "";

    // Si la date est déjà au format YYYY-MM-DD (format ISO)
    if (data.date_naissance.match(/^\d{4}-\d{2}-\d{2}$/)) {
      dateNaissance = data.date_naissance;
    }
    // Si la date est au format YYYY/MM/DD
    else if (data.date_naissance.match(/^\d{4}[\/]\d{2}[\/]\d{2}$/)) {
      dateNaissance = data.date_naissance.replace(/\//g, "-");
    }
    // Si la date est au format DD/MM/YYYY ou DD-MM-YYYY
    else if (
      data.date_naissance.includes("/") ||
      data.date_naissance.includes("-")
    ) {
      const dateParts = data.date_naissance.split(/[\/\-]/);
      if (dateParts.length === 3) {
        // Supposer que c'est DD/MM/YYYY ou DD-MM-YYYY
        const jour = dateParts[0].padStart(2, "0");
        const mois = dateParts[1].padStart(2, "0");
        const annee = dateParts[2];
        dateNaissance = `${annee}-${mois}-${jour}`;
      }
    }

    console.log("Date formatée:", dateNaissance); // Pour débogage
    document.getElementById("date_naissance").value = dateNaissance;
  }

  document.getElementById("lieu_naissance").value = data.lieu_naissance || "";
  document.getElementById("copie_cni").value = data.copie_cni || "";
}

// Validation de la confirmation du mot de passe
// document
//   .getElementById("confirm_password")
//   .addEventListener("input", function (e) {
//     const password = document.getElementById("password").value;
//     const confirmPassword = e.target.value;

//     if (confirmPassword.length === 0) {
//       e.target.classList.remove(
//         "border-red-500",
//         "bg-red-50",
//         "border-green-500",
//         "bg-green-50"
//       );
//     } else if (password !== confirmPassword) {
//       e.target.classList.remove("border-green-500", "bg-green-50");
//       e.target.classList.add("border-red-500", "bg-red-50");
//     } else {
//       e.target.classList.remove("border-red-500", "bg-red-50");
//       e.target.classList.add("border-green-500", "bg-green-50");
//     }
//   });

// Validation des noms
["prenom", "nom"].forEach((fieldId) => {
  document.getElementById(fieldId).addEventListener("input", function (e) {
    const value = e.target.value;
    const isValid = /^[a-zA-ZÀ-ÿ\s\-']+$/.test(value) && value.length >= 2;

    if (value.length === 0) {
      e.target.classList.remove("border-red-500", "border-green-500");
    } else if (isValid) {
      e.target.classList.remove("border-red-500");
      e.target.classList.add("border-green-500");
    } else {
      e.target.classList.remove("border-green-500");
      e.target.classList.add("border-red-500");
    }
  });
});
