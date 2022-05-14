# Etape 1:

Taper la commande pour créer un projet et pout l'installation du serveur web de symfony

`symfony new --webapp miniProjetSymfony`

---

# Etape 2:

Lancer le serveur web par la commande:

`symfony serve:start -d`

# Etape 3:

Configuration de la base de données (sqlite). Ouvrir le fichier projet/.env et commenter les autres deux choix de mysql et postgresql. Et puis remplacer la valeur de DATABASE_URL par sqlite:///%kernel.project_dir%/var/dminiProjetSymfony.db.

---

# Etape 4:

la création de la base de données se fait par la commande:

`symfony console doctrine:database:create`

---

# Etape 5:

créer l'entité Utilisateur avec la commande:

`symfony console make:user`

Nous répondons aux questions suivantes:

_The name of the security user class (e.g. User)_

> Utilisateurs

_Do you want to store user data in the database (via Doctrine)? (yes/no)_

> yes

_Enter a property name that will be the unique "display" name for the user (e.g. email, username, uuid)_

> email (qui est UNIQUE lorsqu'il est créé)

_Does this app need to hash/check user passwords? (yes/no)_

> yes

---

Des autres attributs (champs) d'Utilisateurs tels que _role_ et _password_ sont déjà crées lorsque nous créons la commande précédente.

---

# Etape 6 :

la création des différentes entités dans le cahier de charge, les relations entre les entités, des validateurs sur certaines propriétés de vos entités.

![MCD](/documents/DiaMCD.png)

---

### Entité Commentaires

relation entre les entités User et commentaire:
$ php bin/console make:entity

_Class name of the entity to create or update (e.g. AgreeableChef):_

> Commentaires

_New property name (press <return> to stop adding fields):_

> contenu

_Field type (enter ? to see all types) [string]:_

> string

_Field length [255]:_

> 255
> _Can this field be null in the database (nullable) (yes/no) [no]:_

> yes

_Add another property? Enter the property name (or press <return> to stop adding fields):_

> date_de_creation

_Field type (enter ? to see all types) [string]:_

> datetime

_Can this field be null in the database (nullable) (yes/no) [no]:_

> no

---

### Entité Articles

_Class name of the entity to create or update (e.g. BraveKangaroo):_

> Articles

_New property name (press <return> to stop adding fields):_

> titre

_ Field type (enter ? to see all types) [string]:_

> string

_Can this field be null in the database (nullable) (yes/no) [no]:_

> no

_ Add another property? Enter the property name (or press <return> to stop adding fields):_

> contenu

_Field type (enter ? to see all types) [string]:_

> string

_Field length [255]:_

> 255

_Can this field be null in the database (nullable) (yes/no) [no]:_

> yes

_ Add another property? Enter the property name (or press <return> to stop adding fields):_

> date_de_creation

_ Field type (enter ? to see all types) [string]:_

> datetime

_ Can this field be null in the database (nullable) (yes/no) [no]:_

> no

_ Add another property? Enter the property name (or press <return> to stop adding fields):_

> date_de_modification

_ Field type (enter ? to see all types) [string]:_

> datetime

_ Can this field be null in the database (nullable) (yes/no) [no]:_

> no

---

### Relation entre Commentaires avec Utilisateurs et Articles

_New property name (press <return> to stop adding fields):_

> utilisateurs

_Field type (enter ? to see all types) [string]:_

> relation

_What class should this entity be related to?:_

> Utilisateurs

_Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:_

> ManyToOne

_Is the Commentaires.utilisateurs property allowed to be null (nullable)? (yes/no) [yes]:_

> no

_Do you want to add a new property to Utilisateurs so that you can access/update Commentaires objects f
rom it - e.g. $utilisateurs->getCommentaires()? (yes/no) [yes]:_

> yes

_New field name inside Utilisateurs [commentaires]:_

> commentaires

_ Do you want to automatically delete orphaned App\Entity\Commentaires objects (orphanRemoval)? (yes/no) [no]:_

> yes

_Add another property? Enter the property name (or press <return> to stop adding fields):_

> articles

_Field type (enter ? to see all types) [string]:_

> relation

_What class should this entity be related to?:_

> Articles

_Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:_

> ManyToOne

_Is the Commentaires.utarticles property allowed to be null (nullable)? (yes/no) [yes]:_

> no

_Do you want to add a new property to Articles so that you can access/update Commentaires objects f
rom it - e.g. $articles->getCommentaires()? (yes/no) [yes]:_

> yes

_New field name inside Utilisateurs [commentaires]:_

> commentaires

_ Do you want to automatically delete orphaned App\Entity\Commentaires objects (orphanRemoval)? (yes/no) [no]:_

> yes

---

### Entité Categories et sa relation avec Articles

_ Class name of the entity to create or update (e.g. FierceElephant):_

> Categories

_New property name (press <return> to stop adding fields):_

> categorie

_Field type (enter ? to see all types) [string]:_

> string

_Field length [255]:_

> 20

_ Can this field be null in the database (nullable) (yes/no) [no]:_

> no

_Add another property? Enter the property name (or press <return> to stop adding fields):_

> articles

_ Field type (enter ? to see all types) [string]:_

> relation

_What class should this entity be related to?:_

> Articles

_Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:_

> ManyToMany

\_Do you want to add a new property to Articles so that you can access/update Categories objects from it

- e.g. $articles->getCategories()? (yes/no) [yes]:\_
  > yes

_ New field name inside Articles [categories]:_

> categories

---

### Entité MotsCles et sa relation avec Articles

_Class name of the entity to create or update (e.g. AgreeableElephant):_

> MotsCles

_New property name (press <return> to stop adding fields):_

> mot_cle

_ Field type (enter ? to see all types) [string]:_

> string

_ Field length [255]:_

> 25

_ Can this field be null in the database (nullable) (yes/no) [no]:_

> no

_Add another property? Enter the property name (or press <return> to stop adding fields):_

> articles

_Field type (enter ? to see all types) [string]:_

> relation

_What class should this entity be related to?:_

> Articles

_ Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:_

> ManyToMany

_ Do you want to add a new property to Articles so that you can access/update MotsCles objects from it -
e.g. $articles->getMotsCles()? (yes/no) [yes]:_

> yes

_ New field name inside Articles [motsCles]:_

> motsCles

---

# Etape 7

Mise en place des templates et des assets CSS et JS

`symfony console make:controller MainController`

qui crée un dossier _main_ dans le dossier _templates_
avec le fichier _index.html.twig_.

---

# Etape 8:

Mettre en place un back-end sur chaque entité au moyen de la commande:

`symfony console make:crud`

## Nous pouvons créer le crud de votre entité **Utilisateurs** (`php bin/console make:crud`) et modifier _UtilisateursController_ pour prendre en compte l’encodage du mot de passe pour les action new et edit en ajoutant les lignes suivantes:

# Etape 8 :

la correspondance entre vos entités et les tables en BD se fait au moyen de migrations par les deux commandes:

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

# Etape 9:

création du service d’authentification avec la commande:

`php bin/console make:auth`
Nous répondons aux questions suivantes:

_What style of authentication do you want? [Empty authenticator]:_
_[0] Empty authenticator_
_[1] Login form authenticator_ 1

_The class name of the authenticator to create_

> UtilisateurAuthenticator

_Choose a name for the controller class_

> SecurityController

_Do you want to generate a '/logout' URL?_

> yes

# Etape 10:

Ensuite nous ajoutons le formulaire s'inscription _Utilisateurs_ avec la commande:
`symfony console make:registration-form`

_Do you want to add a @UniqueEntity validation annotation on your Utilisateurs class to make sure duplicate accounts aren't created? (yes/no) [yes]:_

> yes

_Do you want to send an email to verify the user's email address after registration? (yes/no) [yes]:_

> no

_Do you want to automatically authenticate the user after registration? (yes/no) [yes]:_

# Etape 11:

La dernière étape consiste à ajouter une route de redirection dans la méthode `onAuthenticationSuccess()` de la classe UserAuthenticator (i.e. `return new RedirectResponse($this->urlGenerator->generate('index'));`) à adapter en fonction de votre route choisie. Le test au dessus indique simplement que vous allez retourner vers la page qui demandait une authentification afin d’y accéder.
