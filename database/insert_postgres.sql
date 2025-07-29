

INSERT INTO compte (numeros, typecompte, solde, user_id) VALUES ('CPT002', 'Secondaire', 5000.00, 1);


INSERT INTO transaction (compte_id, montant, typetransaction, status) VALUES (1, 2000.00, 'Retrait', 'En_cours');
INSERT INTO transaction (compte_id, montant, typetransaction, status) VALUES (1, 1500.00, 'Paiement', 'terminer');


INSERT INTO transaction (compte_id, montant, typetransaction, status) VALUES (1, 1000.00, 'Depos', 'Annuler');
INSERT INTO role (nom) VALUES ('Administrateur');

INSERT INTO "users" (prenom, nom, login, password, role_id, adresse, nin, photorecto, photoverso)
VALUES ('Sylla', 'Talla', 'Tsylla', '1234', 1, 'Dakar', '123456789', 'recto.jpg', 'verso.jpg');

INSERT INTO compte (numeros, typecompte, solde, user_id)
VALUES ('CPT001', 'Principal', 10000.00, 1);


INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (1, 5000.00, 'Depos', 'En_cours');

-- 2. Retrait validé
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (1, 1000.00, 'Retrait', 'Annuler');

-- 3. Transfert en attente
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (2, 2500.50, 'Paiement', 'En_cours');

-- 4. Dépôt rejeté
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (3, 7500.75, 'Depos', 'En_cours');

-- 5. Paiement facture validé
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (2, 1200.00, 'Retrait', 'En_cours');

-- 6. Virement interne en cours
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (4, 3000.25, 'Paiement', 'En_cours');

-- 7. Retrait en échec
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (5, 500.00, 'Retrait', 'terminer');

-- 8. Dépôt mobile validé
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (3, 1500.00, 'Depos', 'Annuler');

-- 9. Prêt remboursé
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (6, 4500.90, 'Depos', 'Annuler');

-- 10. Frais bancaires appliqués
INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (1, 10.50, 'Depos', 'terminer');