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
        - [x] créer automatiquement un client si le numéro n'existe pas.

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

    - [x] situation_comptes.php :
        - [x] liste des comptes clients avec leur solde.

    - [x] operator/login.php :
        - [x] formulaire de connexion opérateur.

    - [x] operator/dashboard.php :
        - [x] tableau de bord opérateur.

- [x] Gestion de la connexion automatique par numéro de téléphone.
- [x] Séparation des accès client/opérateur.

## 004177

- [] Création de l'interface utilisateur.
    - [] Création du template principal (header, navbar, footer).
    - [] Intégration de Bootstrap.
    - [] Mise en place de la navigation.
    - [] Création d'une interface responsive.
    - [] Amélioration de l'expérience utilisateur (UI/UX).

- [] Configuration des préfixes de l'opérateur.
    - [] Interface d'affichage des préfixes.
    - [] Formulaire d'ajout d'un préfixe.
    - [] Formulaire de modification d'un préfixe.
    - [] Bouton de suppression d'un préfixe.
    - [] Validation des formulaires.
    - [] Affichage des messages de succès et d'erreur.

- [] Gestion des dépôts.
    - [] Interface de dépôt.
    - [] Saisie du numéro de téléphone.
    - [] Saisie du montant.
    - [] Affichage automatique des frais.
    - [] Validation des données saisies.
    - [] Confirmation de l'opération.
    - [] Affichage du résultat de l'opération.

- [] Gestion des retraits.
    - [] Interface de retrait.
    - [] Saisie du numéro de téléphone.
    - [] Saisie du montant.
    - [] Affichage automatique des frais.
    - [] Vérification visuelle du solde.
    - [] Validation des données saisies.
    - [] Confirmation de l'opération.
    - [] Affichage du résultat de l'opération.

- [] Gestion des transferts.
    - [] Interface de transfert.
    - [] Saisie du numéro de l'expéditeur.
    - [] Saisie du numéro du destinataire.
    - [] Saisie du montant.
    - [] Affichage automatique des frais.
    - [] Validation des données saisies.
    - [] Confirmation du transfert.
    - [] Affichage du résultat du transfert.

- [] Affichage du solde.
    - [] Création de la page d'accueil client.
    - [] Affichage du numéro de téléphone connecté.
    - [] Affichage du solde actuel.
    - [] Actualisation du solde après chaque opération.

- [] Historique des opérations.
    - [] Création de la page historique.
    - [] Affichage de la liste des opérations.
    - [] Affichage du type d'opération.
    - [] Affichage du montant.
    - [] Affichage des frais.
    - [] Affichage de la date de l'opération.
    - [] Affichage du destinataire (pour les transferts).

- [] Tests et corrections.
    - [] Vérification des interfaces.
    - [] Vérification de la navigation.
    - [] Vérification de l'affichage responsive.
    - [] Correction des erreurs d'affichage.
    - [] Correction des erreurs de validation.
    - [] Tests des scénarios de dépôt.
    - [] Tests des scénarios de retrait.
    - [] Tests des scénarios de transfert.
    - [] Vérification de l'historique.
    - [] Validation finale avant livraison.

---

# Version 2 (Tag : v2)

## 004022

- 

## 004177

- 

---

# Version 3 (Tag : v3)

## 004022

- 

## 004177

- 