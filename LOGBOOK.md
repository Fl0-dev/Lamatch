## FEUILLE DE ROUTE:

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
    
    - mise en place de l'authentification et de l'enregistrement 
    - gestion des rôles et du remember me en back et front
    - =>Sécurité Ok
    - création volet admin

4. Mise en place des Entities :
    -
    - Création des entities **Candidat** et **Entreprise** simple(sans relation)
    - Mise en place d'une relation OneToOne entre **User** et **Candidat**/**Entreprise**
    - L'administrateur peut enregistrer un user et le relier 
      - soit à un candidat
      - soit à une entreprise
    - J'ai pris le parti de laisser le choix si l'on veut que l'email de connexion 
    soit différent que celui de contact. 
    - Création de **TypeEntreprise** (taille de l'entreprise) en relation ManyToOne avec **Entreprise** avec en BD 
      - MicroEntreprise
      - PME
      - ETI
      - GE
    - Création de l'Entity **Region** avec les 18 régions de France
    - Création de l'Entity **Ville** avec relation 
      - ManyToOne avec **Region**
      - OneToMany avec **Entreprise**
      - OneToMany avec **Candidat**
      - => Pour gagner du temps, je pars du principe qu'une entreprise ou un candidat est présent que dans une seule ville
    - Création de **Niveau**, je choisis <=Bac à Bac+8 
    - Je choisi de séparer Diplome et Formation qui je pense peuvent aujourd'hui être 2 choses différentes (à voir dans la pratique). 
    -Entity **Formation** avec le niveau qui peut être null => simplification 
    - On a donc Un Candidat avec des formations ou pas avec d'un certain niveau ou pas.
    - **Formation** avec Relation ManyToOne avec **Niveau** et ManyToMany avec **Candidat**.
    - Création de l'Entity **QualitesDISC** avec ![](.\public\utils\DISC.png)
    - Création de **TypeQualite** qui regroupe les types de qualité : relation OneToMany (à voir si souci)
    - Relation ManyToMany entre **QualitesDISC** et **Candidat**.
    - Création de **Experience** et **TypeContrat** et leur relation ManyToOne.
    - Relation OneToOne entre **Experience** et **Candidat**.
    - Je voulais mettre une entity Valeur mais candidat et entreprise tendent vers les mêmes choses. Les deux parties se vendrons en choisissant toutes les valeurs.
    Je vais donc faire une entity **ValeurPrincipale** qui donnera un seul choix pour l'employeur (à mettre en avant) et le candidat(recherchée) parmi une liste ( A voir si le temps pour mettre ce système avec une liste à prioriser (de 1 à 5 par ex)) :
      - Travail en équipe
      - Evolution de carrière
      - Faciliter l'intégration
      - Rémunération juste
      - Flexibilité des horaires
      - Ambiance de travail
      - Tutorat
      - Culture d'entreprise
      - Equilibre pro/privé
      - Environnement de qualité
    - Dans mon premier jet de MCD, je partais du principe qu'une entreprise si elle a un secteur d'activité regroupe plusieurs domaines qui regroupe des compétences. 
   Je vais partir plutôt baser mon schéma sur : un candidat a des compétences dans un seul domaine et un seul et une entreprise est dans plusieurs domaines.
    - Création d'une entity **Competence** et d'une entity **Domaine**
    - Relation OneToMany entre **Domaine** et **Competence**
    - Relation ManyToMany entre **Competence** et **Candidat**
    - Relation ManyToOne entre **Formation** et **Domaine**
    - Relation ManyToOne entre **Experience** et **Domaine**
    - Relation ManyToMany entre **Entreprise** et **Domaine**
    - Suppression de etat dans **Candidat** et **Entreprise** et mis dans **User** avec dateModiff. Permettra de désactiver un user et de le supprimer au bout de 30 jours (RGPD). 
   
5. Navigation Home -> Login -> création compte -> accueil:
    -
   On s'écarte de la maquette proposée pour permettre à un nouvel utilisateur de créer son compte directement dès la page de login.
   
* Si nouvel utilisateur :
    1. il crée un compte (bouton créer compte)
    2. il est rediriger vers un formulaire de création où il indique si candidat ou employeur
    3. une fois valider, retour au login
    4. une fois logué il est redirigé vers une page de bienvenue avec formulaire différent selon son type pour compléter son profil (permet de relier l'user avec candidat ou entreprise)
    5. une fois complété il est renvoyé vers la modification de profil où il peut ajouter des formations, des expériences et des compétences.
* Si utilisateur qui a déjà un profil :
    1. Il se logue et arrive sur la page d'accueil
* Si Administrateur
    1. Il se logue et arrive sur la page d'accueil avec un volet admin dans la navBar.
  
6. Page profil = modifier :
    -
- Affichage des informations et possibilité de tout mofifier. 
-  Mise en page moche en attente mais fonctionnelle => modification et ajout fonctionnel en back 
- Possibilitées de modifier pour candidat une formation, une expérience ou la liste de ses compétences(-->jour 6)

7. Gestion des matchings :
    -
- ajout du type de contrat souhaité et proposé selon la partie (relation ManyToOne avec **TypeContrat**)
- Création d'un service **MatchingServices** qui contiendra touts les services permettant le matching entre candidat et entreprise
- Gestion d'un matching simple pour tester le traitement->fonctionnel 
- Je rajoute un à un, un attribut de comparaison 
    - ValeurPrincipale
    - Ville
    - Region
    - TypeDeContrat
    - EnRecherche
    - Domaines
    - Experience
    - Niveau -> si temps
    - Personnalité (=> réduit fortement la compatibilité 😕)
- Affichage des vignettes en fonction du pourcentage et permet d'ouvrir le profil avec toutes les informations
  
8. Côté administrateur/trice
    -
- L'admin peut :
  - ajouter 1 utilisateur
  - gérer tous les candidats
  - gérer toutes les entreprises
  - désactiver un utilisateur qui sera automatiquement supprimer au bout d'un mois
  - réactiver un utilisateur

9. Page d'accueil
    -
 Sur la page d'accueil, il y a un compteur qui s'incrémente pour chaque nouveau matching, 
 ainsi que le nombre d'entreprises et de candidats actifs.
 
10. Ajout Easter Egg 🦄
    -

Bilan :
-
Ça a été un vrai plaisir de travailler sur ce projet. Les conditions n'ont pas été optimales, je n'ai pas pu utiliser tout le temps alloué car je jongle entre les cours (Android Studio,WordPress)et ma préparation de stage (Java).
Mais j'ai, je pense, réussi à présenter un site viable et fonctionnel et ai atteint la plupart des objectifs que je m'étais fixés.
J'ai donc utilisé Symfony 5.3.6 avec Bootstrap 5.1 et PhpMyAdmin, le tout en PHP 7.4 et sur PHPStorm. Il y a à disposition le fichier sql des data (car pas mal de choses doivent être rempli pour utiliser l'application) ainsi que le fichier sql complet à importer pour utiliser déjà ce qui a en base de données. C'est la première fois que je tenais un logbook alors je préfère faire un bilan pour que ça soit plus compréhensible.

- Difficultés rencontrées/ points négatifs :
  -
    - La mise en place du MCD : Je suis parti sur un modèle beaucoup trop lourd, et au fur et à mesure de la mise
    en place des relations, de leur utilisation et du temps imparti, j'ai dû revoir mes objectifs et simplifier. Ce qui au regard du code n'est pas plus mal, le matching est alors devenu plus clair. 
    Sa représentation sous UMLet laisse, je le conçoie, à désirer mais elle me permet de bien visualiser les relations entre Entity. 
    - La gestion de la relation OneToOne entre un Utilisateur et Candidat ou Entreprise : Lors de la création d'un compte utilisateur, j'ai opté pour plusieurs pages. La première me permet d'enregistrer l'utilisateur selon son type, 
    ainsi je peux aiguiller vers une deuxième avec un formulaire spécifique une fois logué qui est du coup la page aussi de modification de profil. J'ai essayé de faire les deux sur la même page, mais la gestion des informations comme l'ajout de formations et d'expériences posaient d'autres problématiques.
    - Je souhaitais que l'ajout de formations, expériences et compétences se fassent aussi sur une même page mais ma méthode enregistrait en base sans relier au Candidat. Gros problème si le candidat voulait revenir en arrière sans vouloir sauvegarder. 
  C'est pourquoi le candidat est envoyé vers une page spécifique pour chaque nouvel ajout.
    - La sélection des domaines où des traits de caractères sans Select2 : La multi-sélection par Ctrl+Click comme montrer dans les templates n'est vraiment pas "user-friendly", le select2 est la meilleure alternative pour permettre de faire plusieurs sélections tout en gardant en visu ses choix.
  Malheureusement, Bootstrap 5 ne semble pas pouvoir l'utiliser à la différence du 4. Si c'est possible, je n'ai pas réussi à faire fonctionner cette feature.
    - La gestion des rôles : Elle peut être largement améliorée si l'on intègre directement un ROLE_CANDIDAT et ROLE_ENTREPRISE mais j'étais déjà trop loin dans mon programme pourchanger mon fusil d'épaule. Malheureusement j'ai remarqué en dernière minute qu'un candidat peut avoir accès à une page entreprise et vice-versa.
      (=>première chose à corriger)
    - Le redimensionnement des photos et logos lors de la sauvegarde en base : mon affichage laisse à désirer lors des résultats. J'avais commencé à installer un bundle (ImageOptimizer) mais par manque de temps je n'ai pas pu le faire fonctionner.
    - Manque de temps : J'aurais souhaité pouvoir mettre l'inscription en base de données par injection de fichier CSV, le changement possible de mot de passe et permettre à une entreprise ou un candidat de modifier sa partie Utilisateur, et à l'administrateur/trice de compléter lui-même les profils d'un utilisateur (déjà fait sur d'autres projets).
    poussez plus loin l'algo de matching en permettant de rajouter la possibilité à l'utilisateur de spécifier grâce à un paramètre de choisir ses critères prioritaires, le matching selon des compétences spécifiques. Et évidemment plus de temps pour gérer les exceptions.
    

- Points positifs:
    -
  - Beaucoup de plaisir à travailler sur ce projet. Le recrutement autrement et sa mise en pratique à travers une application m'a très vite inspiré et il ne m'en faut pas plus pour me motiver.
  - Toutes les instructions demandées ont été respectées : 
    - Le MCD est modélisé (cf. fichier matching.uxf et MCD.png (généré par PhpMyAdmin)).
    - Il a été mis en place selon la POO. 
    - Les routes, pages et contrôleurs sont en place.
    - Le système d'authenfication simple est créé avec l'email comme clef unique.
    - Le matching est fonctionnel et prend en compte le type d'utilisateur.
  - Ce qu'il y a en plus :
    - Le matching étant, à mon avis, le coeur de l'application, j'ai cherché à aller plus loin sur ce domaine spécifique : 
      - Le choix des critères doit être rapide et simple(à la différence des sites de recherches traditionnels) d'où un maximum de listes déroulantes. C'est pourquoi tout ce qui peut l'être est déjà en base de données les villes, régions, domaines, niveau, type de contrat, type d'entreprise, qualités... 
      - Les entreprises comme candidats tendent vers des valeurs communes. Une entreprise se vendra toujours comme une entreprise respectueuse de l'environnement, du temps perso/travail ou du bien-être au travail.
      Et un candidat cherchera toujours toutes ces valeurs. C'est pourquoi j'ai opté pour un choix unique, une valeur principale que l'entreprise veut mettre en avant et le candidat cherche avant tout. Cette valeur est inscrite en base de données et est commune au deux.
      - L'expérience du candidat est calculé directement selon les durées des expériences qu'il a renseignées toujours dans un but de gain de temps et de simplicité pour l'utilisateur/trice.
      - Peu renseigné dans les recherches sur des sites traditionnels, j'ai mis au cœur de mon algorithme de matching la personnalité du candidat. C'est pourquoi il doit se définir selon des qualités préétablies (traits de caractère).
    Ces qualités sont regroupées en 4 grandes familles. L'entreprise devra quant à elle, choisir une famille de qualités qu'elle recherche. L'algo cherche alors si un candidat a des qualités communes et transmet un score qui varie selon le nombre de qualités.
      J'ai fait le choix de certaines qualités selon la classification DISC (cf. voir plus haut) mais on peut changer en base cette classification (car plus il y a de choix, plus le pourcentage de compatibilité est moins élevé).
      - Le matching prend en compte la ville du candidat et de l'entreprise mais aussi sa région (avec valeur différente).
      - Le tout donne un pourcentage plus fin qu'une comparaison domaine = domaine ou en recherche = en recherche.
      - L'affichage des résultats se fait par ordre décroissant. Un simple click donne accès au profil et un lien permet alors de rentrer directement en contact.
    - Un utilisateur/trice une fois qu'il s'est enregistré comme candidat ou entreprise, n'aura accès qu'à des pages spécifiques tout le long de sa navigation.
    - Il peut évidemment modifier ses informations quand il le souhaite.
    - La page d'accueil recense le nombre d'entreprises et de candidats actifs sur le site ainsi que le nombre de matching déjà effectué.   
    - L'administrateur/trice a accès à toutes le pages mais l'utilisateur ne peux avoir accès aux pages admin. Il ou elle a un volet spécifique qui lui permet d'avoir la liste de toutes les entreprises ainsi que la liste de tous les candidats.
    - Je ne laisse pas l'administrateur/trice modifié les profils mais lui laisse la possibilité de rendre inactif l'un ou l'autre (l'utilisateur n'a plus accès aux pages du site et est redirigé vers une page spécifique lors de son identification qui lui indique son état). Son profil n'apparait plus dans le matching.
    Au bout d'un mois, le profil est supprimé comme l'oblige la RGPD. Au cours de ce mois le profil peut être remis en actif.
    - 
  



    