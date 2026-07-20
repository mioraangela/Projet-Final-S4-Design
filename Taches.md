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
- [] Configuration de SQLite.
- [] Création de la base de données.

- [] Création des tables.
    - [] préfixes : id, préfixe.
    - [] clients : id, téléphone, solde.
    - [] types opération : id, nom.
    - [] barèmes frais : id, id type opération, montant minimum, montant maximum, frais.
    - [] opérations : id, id clients, id type opération, destinataire, montant, frais, date opération.

- [] Création des modèles.
    - [] PrefixeModel :
        - [] récupérer les préfixes.
        - [] ajouter un préfixe.
        - [] modifier un préfixe.
        - [] supprimer un préfixe.

    - [] ClientModel :
        - [] rechercher un client par numéro.
        - [] créer un client automatiquement.
        - [] récupérer le solde.
        - [] modifier le solde.

    - [] TypeOperationModel :
        - [] récupérer les types d'opérations.
        - [] ajouter un type d'opération.
        - [] modifier un type d'opération.
        - [] supprimer un type d'opération.

    - [] BaremeFraisModel :
        - [] récupérer les barèmes.
        - [] ajouter un barème.
        - [] modifier un barème.
        - [] supprimer un barème.
        - [] rechercher les frais selon le montant.

    - [] OperationModel :
        - [] enregistrer une opération.
        - [] récupérer l'historique d'un client.
        - [] calculer les gains de l'opérateur.

- [] Création des contrôleurs.
    - [] PrefixeController :
        - [] afficher les préfixes.
        - [] ajouter un préfixe.
        - [] modifier un préfixe.
        - [] supprimer un préfixe.

    - [] ClientController :
        - [] connexion automatique avec le numéro de téléphone.
        - [] afficher le solde du client.

    - [] TypeOperationController :
        - [] afficher les types d'opérations.
        - [] ajouter un type d'opération.
        - [] modifier un type d'opération.
        - [] supprimer un type d'opération.

    - [] BaremeFraisController :
        - [] afficher les barèmes de frais.
        - [] ajouter un barème.
        - [] modifier un barème.
        - [] supprimer un barème.

    - [] OperationController :
        - [] effectuer un dépôt.
        - [] effectuer un retrait.
        - [] effectuer un transfert.
        - [] afficher l'historique des opérations.
        - [] afficher la situation des gains de l'opérateur.
        - [] afficher la situation des comptes clients.

- [] Création des vues.
    - [] login.php :
        - [] formulaire de connexion avec le numéro de téléphone.

    - [] accueil.php :
        - [] menu principal.
        - [] affichage du numéro de téléphone.
        - [] affichage du solde.

    - [] prefixes.php :
        - [] liste des préfixes.
        - [] formulaire d'ajout.
        - [] formulaire de modification.

    - [] types_operations.php :
        - [] liste des types d'opérations.
        - [] formulaire d'ajout.
        - [] formulaire de modification.

    - [] baremes_frais.php :
        - [] liste des barèmes de frais.
        - [] formulaire d'ajout.
        - [] formulaire de modification.

    - [] depot.php :
        - [] formulaire de dépôt.

    - [] retrait.php :
        - [] formulaire de retrait.

    - [] transfert.php :
        - [] formulaire de transfert.

    - [] historique.php :
        - [] liste des opérations effectuées.

    - [] situation_gains.php :
        - [] affichage des gains de l'opérateur.

    - [] situation_comptes.php :
        - [] liste des comptes clients avec leur solde.
        
- [] Gestion de la connexion automatique par numéro de téléphone.

## 004177

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