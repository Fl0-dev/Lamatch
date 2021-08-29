## FEUILLE DE ROUTE:

(-->jour1)
- Idées autour du projet :
    -
    - matching entre entreprises et candidats
    - se mettre à la place du candidat et du RH
    - App pensée pour les 2
    - comparaison des souhaits des 2 parties
    - Donner des coeff à certains souhaits et valeurs
    - utilisation des Id pour comparer (on évite les strings) 
    - Menu déroulant ou datalist !!!

- Choix des technologies pour ce projet : 
    -
    Pour un résultat rapide et fonctionnel 
    je choisis **Symfony**, couplé à **MySQL** pour la gestion des données
    C'est le combo où je suis le plus à l'aise.
    **Twig** et **Bootstrap** pour le front (à voir si changement avec le temps).


1. Mise en place du modèle conceptuel sur papier : 
    -

    - Recherche sur le recrutement et le matching.
    - Utilisation du modèle DISC pour gérer les traits de caractère (Qualités).
    - Une entity (objet) Souhait regroupera les différentes recherches de l'une et l'autre parties
      afin de faire le matching dessus (points communs).
    - Diagramme de classe pour Symfony avec UMLet.

2. Mise en place de l'environnement de travail:
    -
    - PHPStorm
    - PHP 7.4
    - Serveur Symfony
    - PHPMyAdmin
    - Symfony 5.3
    - Bootstrap 4.0
    - Git/Github

3. Création du projet :
    -
    - installation de la base
    - Dépôt sur Github
    
    - mise en place de l'authentification et de l'enregistrement (-->jour2)
    - gestion des rôles et du remember me en back et front
    - =>Sécurité Ok
    - création volet admin

4. Mise en place des Entity :
    -
    - Création des entity Candidat et Entreprise simple(sans relation)
    - Mise en place d'une relation OneToOne entre User et Candidat/Entreprise
    - L'administrateur peut enregistrer un user et le relier 
      - soit à un candidat
      - soit à une entreprise
    - J'ai pris le parti de laisser le choix si l'on veut que l'email de connexion 
    soit différent que celui de contact. 
    - Création de TypeEntreprise (taille de l'entreprise) en relation ManyToOne avec Entreprise avec en BD 
      - MicroEntreprise
      - PME
      - ETI
      - GE
    