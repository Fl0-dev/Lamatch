# Test Technique PHP/JS
Bienvenue sur le test technique PHP/JS de Lamacompta ! 🦙 🌞

## Infos utiles
- Ce test technique permet de tester les compétences d'un·e développeur·se lors d'une phase de recrutement.
- Les connaissances testées peuvent être soit le PHP (POO), soit le JS, soit les deux.
- C'est pour tout type de niveau (junior, intermédiaire, sénior...), l'évaluation se fera sur le code fourni (propreté, performances, évolutivité...) et sur notre degré d'exigence en regard du poste proposé chez nous.

## Evaluer les compétences PHP/JS
Lors de l'évaluation, nous porterons une attention particulière à la propreté de ton code et au respect des normes de programmation orientée objet (POO). L'objectif est clairement qu'à la lecture de ton code, à la découverte de tes idées brillantes et/ou farfelues, à l'apparition de chacune des pages somptueuses qui arborent fièrement ton application web, on puisse sentir, au plus profond de nous, qu'on vibrerait à l'idée de travailler avec toi, et que ne pas t'embaucher serait synonyme de faute grave.

Es-tu prêt·e à relever ce (petit) défi ? 😏

## Technologies à utiliser
Sache que tu es libre d'utiliser les technologies que tu souhaites parmi :
- Pour le Back :
    - Code :
        - Symfony
        - API Platform
        - WordPress (en POO !)
        - Vanilla (en POO !)
    - SGBD :
        - Ce que tu veux (PostgreSQL, MySQL/MariaDB, NoSQL...)
- Pour le Front :
    - VueJS (Nuxt, ViteJS... Nous utilisons Nuxt chez Lamacompta 😉)
    - React
    - JS Vanilla (en POO !)

**A noter que chez Lamacompta nous utilisons principalement les technologies suivantes :**
- API Platform
- Nuxt
- WordPress (en cours d'abandon)

En tous cas n'hésite pas à utiliser toutes les librairies que tu jugerais bon d'utiliser (ACF pour WordPress, Bootstrap, Lodash...).

NB : Si tu utilises le moteur de templating de WordPress, de Symfony, ou de la génération de HTML avec du PHP la partie Front sera considérée comme n'étant pas à évaluer.

## Journal de bord

Nous te prions, lors de la réalisation de ce test, d'écrire ton "journal de bord" dans le fichier LOGBOOK.md à la racine du projet. Écris-y, tout au long de la réalisation du test, ton ressenti, les questions que tu te poses, ce que tu aurais aimé faire mieux avec plus de temps, ce qui te semble dépasser tes compétences...

**Le Journal de bord est d'une réelle importance pour nous comme pour toi :**

- Pour nous, c'est un moyen de voir plus loin que le test et un éventuel blocage, pour faire un choix éclairé.
- Pour toi, c'est une excellente pratique à conserver tout au long de ta carrière !

## Besoin d'aide ?
Si tu as des difficultés à comprendre ce qui est demandé, ou si tu as besoin de précisions quelles qu'elles soient au sujet de ce test, n'hésite pas à nous contacter (ce qui peut paraître clair pour nous ne l'est pas forcément pour tout le monde).

En revanche si tu as des questions sur du code ou tout autre élément sur lequel on doit t'évaluer, évidemment cela ne sert à rien de nous contacter car tu dois être en mesure de te débrouiller sans nous 😊

# Contexte
Tu es en charge de développer une plateforme web innovante sur le recrutement.

## Le problème 🖐
Actuellement le recrutement repose sur cette suite d'étapes :
- L'employeur dépose des offres d'emploi
- Le candidat consulte les offres d'emploi
- Le candidat postule pour une offre d'emploi qui lui correspond

Dans le cas d'une candidature spontanée, c'est le candidat qui a trouvé un employeur et qui postule spontanément.

Dans toute candidature, le candidat dépose à minima son CV et sa lettre de motivation (ou équivalent).

Seulement le temps et l'énergie dépensés du côté de l'employeur et du candidat ne sont pas toujours récompensés par une collaboration qui fonctionne, et ce dysfonctionnement survient souvent par une mauvaise interprétation ou une incompréhension d'au moins une des parties par rapport à ce qu'on pouvait présentir avant de commencer la collaboration 😕

## Ta solution 🦸‍♀️🦸‍♂️

Tu as imaginé le futur du recrutement et de la relation employeur-candidat en concevant une plateforme web innovante, et tu l'as appelée **Lamatch** 🚀 💪 🎈

C'est fini les longues heures pour rédiger une offre d'emploi digne de ce nom ! C'est fini les recherches interminables pour trouver son duo gagnant "entreprise cool et offre d'emploi qui me convient" : tout ceci va se faire automatiquement et sous formes de suggestions intelligentes ! 🤓

Vous êtes un candidat et vous souhaitez trouver le job de vos rêves dans une entreprise qui vous correspond ? 
Il vous suffit de renseigner votre profil dans **Lamatch** et les suggestions se dévoilent devant vous !

Vous êtes employeur et vous souhaitez trouver votre prochain·e collaborateur·rice qui rejoindra votre belle équipe ? Il vous suffit de renseigner votre profil dans **Lamatch** et les suggestions pleuveront comme vache qui [censored] !

# Lamatch
La plateforme web se structure de la façon suivante :

## Pages
### 🚪 Login
Formulaire simple permettant de se connecter à notre application magique 🧙‍♂️

### 🏠 Accueil
Page d'atterrisage après la connexion à Lamatch.

Affiche des stats globales sur les données de Lamatch et permet de lancer un matching.

### ⚙ Mon Profil
C'est ici que l'utilisateur (Candidat ou Employeur), renseigne ses informations :

#### - Vue Candidat
Le Candidat peut renseigner toutes ses informations le concernant (Prénom, Nom...) qu'on retrouve dans la partie "Entités principales" ci-dessous (template fourni).

#### - Vue Employeur
L'Employeur peut renseigner toutes les informations concernant son entreprise (Nom, Logo...) qu'on retrouve dans la partie "Entités principales" ci-dessous (template non fourni).

### ⚡ Matching !
Une page "Matching" permet à l'utilisateur de lancer une recherche de matching et de lui afficher des suggestions pertinentes.

### Détail Employeur
La page de détail de l'employeur liste toutes les informations le concernant.

### Détail Candidat
La page de détail du candidat liste toutes les informations le concernant.

### Admin
Les deux pages d'admin (ainsi que leurs liens de navigation) ne sont accessibles que par les administrateurs.

#### - Gérer les employeurs
Cette page liste les employeurs de la base de données et permet de les modifier, de les supprimer et d'en ajouter.

#### - Gérer les candidats
Cette page liste les candidats de la base de données et permet de les modifier, de les supprimer et d'en ajouter.


## Entités principales
- Candidat
    - Prénom
    - Nom
    - En recherche ? (Oui/Non)
    - Email
    - Photo de profil
    - Date de naissance
    - Niveau d'études
    - Formations
    - Expériences professionnelles
    - Compétences
    - LinkedIn
    - Régions recherchées

- Entreprise
    - Nom
    - Logo
    - Date de création
    - Site web
    - Adresse email RH
    - Présentation de l'entreprise
    - Valeurs de l'entreprise
    - Effectif
    - Domaine métier
    - Régions recherchées

- Utilisateur
    - Nom d'utilisateur
    - Mot de passe
    - Email

N'hésite pas à concevoir ton modèle de données à ta sauce, les champs proposés dans chaque entité sont des exemples, tu es libre de faire parler ta créativité 🐢 (oui une tortue c'est très créatif).

Evidemment charge à toi de créer les autres tables de références qui vont bien (Formations, Compétences...) et de réaliser les relations et jointures nécessaires (#MCD).

## Algorithme de matching

Evidemment Lamatch ne serait rien sans un algorithme de matching employeur-candidat !

Bon on ne te demande pas de faire un algo de ouf hein, mais simplement quelque chose du genre "Jean-Eudes qui est dans le droit des affaires et qui aime le respect de l'environnement cherche une entreprise qui lui ressemble (donc qui fait du droit des affaires et qui a dans ses valeurs "respect de l'environnement").

## Ce qu'on te fournit
### 🖼 Templates
Comme tu peux le voir on te fournit des templates HTML (avec du CSS) pour que tu ne partes pas de 0 (et pour t'aider à comprendre l'objectif et l'articulation de l'application), tu les utilises ou pas, c'est toi qui vois !

### 💿 Data
Tu remarqueras également que des fichiers CSV sont présents dans le répertoire "data", c'est histoire de te filer quelques données d'exemple pour ne pas partir de rien, tu peux les utiliser ou non c'est toi qui choisis 😉

# Instructions

Tu peux choisir d'être évalué·e sur le Back, le Front, ou les deux ! Il suffit de livrer ce qu'il faut et de nous prévenir 😉

## Je souhaite me faire évaluer sur la partie Back
Si tu souhaites te faire évaluer sur la partie Back (PHP), suis ces instructions :
1. Modéliser le MCD (Modèle Conceptuel de Données)
2. Implémenter mon MCD en PHP/POO sur la technologie choisie
3. Créer mes routes, mes pages et mes contrôleurs
4. Créer un système d'authentification simple
5. Implémenter un algorithme simple de matching employeur-candidat qui se base sur l'utilisateur courant (voir description ci-dessus)

Si tu ne souhaites pas te faire évaluer sur la partie Front tu dois utiliser le moteur de templating de la technologie Back choisie (Twig pour Symfony, template WordPress, génération HTML avec du PHP)

## Je souhaite me faire évaluer sur la partie Front
Si tu souhaites te faire évaluer sur la partie Front (JS), suis ces instructions :
1. Ouvrir les templates proposés et reprendre les descriptions ci-dessus des pages de l'application
2. Concevoir un parcours utilisateur intuitif et travailler l'ergonomie
3. Reprendre la charte graphique de Lamacompta (logo, couleur...)
4. Développer une interface utilisateur avec les données proposées dans le répertoire "data" (ou pas) dans la technologie choisie
5. Veiller à ce que tout soit responsive (smartphone, tablette, desktop) 💻 📱

# Je veux en montrer plus 💪
Tu veux montrer que tu es une vraie machine ? 🤖 Aucun problème lâches-toi ! 💩

Des petites idées :
- Mettre en place une gestion de préférences utilisateurs, notamment sur les critères de recherche (soft skills, valeurs, avantages, salaires...)
- Créer un système de notifications lorsqu'un nouveau match a été trouvé (lors de l'inscription d'un nouveau candidat ou employeur par exemple)
- Ajouter des filtres de recherches dans l'admin pour la gestion des Employeurs et des Candidats
- Réaliser un algorithme de matching plus poussé (avec gestion de poids sur les critères, de préférences utilisateur...)
- Lancer des feux d'artifices et autres licornes dans l'application lorsque certaines actions sont réalisées (comme on peut le voir ici : https://youtu.be/7bgvz31MHIw?t=178)
- Proposer une page de statistiques sur différentes données (âge moyen des candidats, nombre d'employeurs par région...)

# A noter
Ce test est volontairement long et peut s'avérer complexe si on pousse le sujet, l'objectif n'est pas de réaliser une application complète qui nécessiterait toute une équipe d'UX/UI designers, de développeurs et autres soldats, l'idée c'est simplement d'aller assez loin pour montrer ce que tu sais faire en termes de technique et de conception, charge à toi d'estimer cela, il n'y a pas de mauvaise idée, n'hésite pas à expliquer tes choix, et même à parler de tes idées d'évolutions qui prendraient trop de temps à réaliser mais qui justifieraient tes choix initiaux.

# Rendu du test

Pour livrer ton projet, partage-moi ton repository (GitLab, GitHub ou autre). Si c'est un repo public tu peux m'envoyer simplement l'URL, s'il est privé ajoute-moi au projet via l'adresse email suivante : killian@lamacompta.co

## Date butoir
Pense bien à respecter la date max annoncée dans le mail/message qui t'a été envoyé 😉
Tu prends le temps que tu juges nécessaires, la seule contrainte de temps c'est cette date max de rendu ⏲

# Contact
Tu peux me contacter soit par mail soit par LinkedIn :
- killian@lamacompta.co
- https://www.linkedin.com/in/killianleroux

# Bon courage ❤
Que la force soit avec toi 💪