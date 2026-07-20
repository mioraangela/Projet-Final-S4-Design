# Taches.md

# Projet Final S4 Info et Design
**Thème :** Système de simulation d'un opérateur Mobile Money

## Membres du binôme

### Étudiant 1
- Nom : FANDRESENA
- Prénom : Miora Angela
- ETU : 004022

### Étudiant 2
- Nom : TIANJANAHARY
- Prénom : Ando Nathan
- ETU : 004177

---

# Version 1 (Tag : v1)

## 004022

- [x] Création du projet CodeIgniter 4.
- [x] Configuration de SQLite.
- [x] Création de la base de données.

- [x] Création des tables.
    - [x] préfixes : id, préfixe.
    - [x] clients : id, téléphone, solde.
    - [x] types opération : id, nom.
    - [x] barèmes frais : id, id type opération, montant minimum, montant maximum, frais.
    - [x] opérations : id, id clients, id type opération, destinataire, montant, frais, date opération.

- [x] Création des modèles.
    - [x] PrefixeModel :
        - [x] récupérer les préfixes.
        - [x] ajouter un préfixe.
        - [x] modifier un préfixe.
        - [x] supprimer un préfixe.

    - [x] ClientModel :
        - [x] rechercher un client par numéro.
        - [x] créer un client automatiquement.
        - [x] récupérer le solde.
        - [x] modifier le solde.

    - [x] TypeOperationModel :
        - [x] récupérer les types d'opérations.
        - [x] ajouter un type d'opération.
        - [x] modifier un type d'opération.
        - [x] supprimer un type d'opération.

    - [x] BaremeFraisModel :
        - [x] récupérer les barèmes.
        - [x] ajouter un barème.
        - [x] modifier un barème.
        - [x] supprimer un barème.
        - [x] rechercher les frais selon le montant.

    - [x] OperationModel :
        - [x] enregistrer une opération.
        - [x] récupérer l'historique d'un client.
        - [x] calculer les gains de l'opérateur.

- [x] Création des contrôleurs.
    - [x] PrefixeController :
        - [x] afficher les préfixes.
        - [x] ajouter un préfixe.
        - [x] modifier un préfixe.
        - [x] supprimer un préfixe.

    - [x] ClientController :
        - [x] connexion automatique avec le numéro de téléphone.
        - [x] afficher le solde du client.
<<<<<<< Updated upstream
        - [x] créer automatiquement un client si le numéro n'existe pas.
=======
>>>>>>> Stashed changes

    - [x] TypeOperationController :
        - [x] afficher les types d'opérations.
        - [x] ajouter un type d'opération.
        - [x] modifier un type d'opération.
        - [x] supprimer un type d'opération.

    - [x] BaremeFraisController :
        - [x] afficher les barèmes de frais.
        - [x] ajouter un barème.
        - [x] modifier un barème.
        - [x] supprimer un barème.

    - [x] OperationController :
        - [x] effectuer un dépôt.
        - [x] effectuer un retrait.
        - [x] effectuer un transfert.
        - [x] afficher l'historique des opérations.
        - [x] afficher la situation des gains de l'opérateur.
        - [x] afficher la situation des comptes clients.

<<<<<<< Updated upstream
    - [x] OperatorController :
        - [x] connexion opérateur.
        - [x] accès au tableau de bord opérateur.
        - [x] consultation des gains.
        - [x] consultation des comptes clients.

- [x] Création des vues.
    - [x] login.php :
        - [x] formulaire de connexion avec le numéro de téléphone.

    - [x] accueil.php :
        - [x] menu principal.
        - [x] affichage du numéro de téléphone.
        - [x] affichage du solde.

    - [x] prefixes.php :
        - [x] liste des préfixes.
        - [x] formulaire d'ajout.
        - [x] formulaire de modification.

    - [x] types_operations.php :
        - [x] liste des types d'opérations.
        - [x] formulaire d'ajout.
        - [x] formulaire de modification.

    - [x] baremes_frais.php :
        - [x] liste des barèmes de frais.
        - [x] formulaire d'ajout.
        - [x] formulaire de modification.

    - [x] depot.php :
        - [x] formulaire de dépôt.

    - [x] retrait.php :
        - [x] formulaire de retrait.

    - [x] transfert.php :
        - [x] formulaire de transfert.

    - [x] historique.php :
        - [x] liste des opérations effectuées.

    - [x] situation_gains.php :
        - [x] affichage des gains de l'opérateur.
=======
- [x] Création des vues.
    - [x] login.php :
        - [x] formulaire de connexion avec le numéro de téléphone.

    - [x] accueil.php :
        - [x] menu principal.
        - [x] affichage du numéro de téléphone.
        - [x] affichage du solde.

    - [x] prefixes.php :
        - [x] liste des préfixes.
        - [x] formulaire d'ajout.
        - [x] formulaire de modification.

    - [x] types_operations.php :
        - [x] liste des types d'opérations.
        - [x] formulaire d'ajout.
        - [x] formulaire de modification.

    - [x] baremes_frais.php :
        - [x] liste des barèmes de frais.
        - [x] formulaire d'ajout.
        - [x] formulaire de modification.

    - [x] depot.php :
        - [x] formulaire de dépôt.

    - [x] retrait.php :
        - [x] formulaire de retrait.

    - [x] transfert.php :
        - [x] formulaire de transfert.

    - [x] historique.php :
        - [x] liste des opérations effectuées.

    - [x] situation_gains.php :
        - [x] affichage des gains de l'opérateur.

    - [x] situation_comptes.php :
        - [x] liste des comptes clients avec leur solde.
        
- [x] Gestion de la connexion automatique par numéro de téléphone.
>>>>>>> Stashed changes

    - [x] situation_comptes.php :
        - [x] liste des comptes clients avec leur solde.

    - [x] operator/login.php :
        - [x] formulaire de connexion opérateur.

    - [x] operator/dashboard.php :
        - [x] tableau de bord opérateur.

- [x] Gestion de la connexion automatique par numéro de téléphone.
- [x] Séparation des accès client/opérateur.

## 004177

- [x] Création de l'interface utilisateur.
    - [x] Création du template principal (header, navbar, footer).
    - [x] Intégration de Bootstrap.
    - [x] Mise en place de la navigation.
    - [x] Création d'une interface responsive.
    - [x] Amélioration de l'expérience utilisateur (UI/UX).

- [x] Configuration des préfixes de l'opérateur.
    - [x] Interface d'affichage des préfixes.
    - [x] Formulaire d'ajout d'un préfixe.
    - [x] Formulaire de modification d'un préfixe.
    - [x] Bouton de suppression d'un préfixe.
    - [x] Validation des formulaires.
    - [x] Affichage des messages de succès et d'erreur.

- [x] Gestion des dépôts.
    - [x] Interface de dépôt.
    - [x] Saisie du numéro de téléphone.
    - [x] Saisie du montant.
    - [x] Affichage automatique des frais.
    - [x] Validation des données saisies.
    - [x] Confirmation de l'opération.
    - [x] Affichage du résultat de l'opération.

- [x] Gestion des retraits.
    - [x] Interface de retrait.
    - [x] Saisie du numéro de téléphone.
    - [x] Saisie du montant.
    - [x] Affichage automatique des frais.
    - [x] Vérification visuelle du solde.
    - [x] Validation des données saisies.
    - [x] Confirmation de l'opération.
    - [x] Affichage du résultat de l'opération.

- [x] Gestion des transferts.
    - [x] Interface de transfert.
    - [x] Saisie du numéro de l'expéditeur.
    - [x] Saisie du numéro du destinataire.
    - [x] Saisie du montant.
    - [x] Affichage automatique des frais.
    - [x] Validation des données saisies.
    - [x] Confirmation du transfert.
    - [x] Affichage du résultat du transfert.

- [x] Affichage du solde.
    - [x] Création de la page d'accueil client.
    - [x] Affichage du numéro de téléphone connecté.
    - [x] Affichage du solde actuel.
    - [x] Actualisation du solde après chaque opération.

- [x] Historique des opérations.
    - [x] Création de la page historique.
    - [x] Affichage de la liste des opérations.
    - [x] Affichage du type d'opération.
    - [x] Affichage du montant.
    - [x] Affichage des frais.
    - [x] Affichage de la date de l'opération.
    - [x] Affichage du destinataire (pour les transferts).

- [x] Tests et corrections.
    - [x] Vérification des interfaces.
    - [x] Vérification de la navigation.
    - [x] Vérification de l'affichage responsive.
    - [x] Correction des erreurs d'affichage.
    - [x] Correction des erreurs de validation.
    - [x] Tests des scénarios de dépôt.
    - [x] Tests des scénarios de retrait.
    - [x] Tests des scénarios de transfert.
    - [x] Vérification de l'historique.
    - [x] Validation finale avant livraison.

---

# Version 2 (Tag : v2)

## 004022

- [x] Modification de la base de données.
    - [x] ajout de la colonne opérateur dans la table prefixes.
    - [x] ajout de la colonne commission_autre_operateur dans la table baremes_frais.

- [x] Mise à jour des modèles.
    - [x] PrefixeModel :
        - [x] gestion des préfixes des autres opérateurs.
    - [x] BaremeFraisModel :
        - [x] gestion du pourcentage de commission supplémentaire.
    - [x] OperationModel :
        - [x] calcul des frais pour un transfert vers un autre opérateur.
        - [x] calcul des gains de notre opérateur.
        - [x] calcul des montants à envoyer aux autres opérateurs.

- [x] Mise à jour des contrôleurs.
    - [x] PrefixeController :
        - [x] ajout des préfixes des autres opérateurs.
        - [x] modification des préfixes.
    - [x] BaremeFraisController :
        - [x] gestion du pourcentage de commission supplémentaire.
    - [x] OperationController :
        - [x] calcul des frais selon l'opérateur du destinataire.
        - [x] affichage des gains par opérateur.
        - [x] affichage des montants à envoyer à chaque opérateur.


- [x] Mise à jour des vues.
    - [x] prefixes.php :
        - [x] ajout du champ opérateur.
    - [x] baremes_frais.php :
        - [x] ajout du champ commission supplémentaire.
    - [x] transfert.php :
        - [x] option « Inclure les frais de retrait ».
        - [x] transfert vers plusieurs numéros.
        - [x] partage automatique du montant entre les destinataires.
    - [x] situation_gains.php :
        - [x] séparation des gains entre notre opérateur et les autres opérateurs.
    - [x] situation_comptes.php :
        - [x] affichage des montants à envoyer à chaque opérateur.

- [x] Tests et corrections.
    - [x] test des transferts vers les autres opérateurs.
    - [x] test du calcul des commissions.
    - [x] test des transferts multiples.
    - [x] correction des erreurs détectées.
    - [x] mise à jour du fichier Taches.md.

---

# Version 3 (Tag : v3)

## 004022

- 

## 004177

- 