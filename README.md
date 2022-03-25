Bonjour,

Voici l’api du test (niveau 2) j’ai rencontré quelques difficultés car malgré le fait que vous m’aviez laissé le choix de la stack j’ai voulu en profiter pour découvrir LARAVEL/ELOQUENT.
Le premier constat était que par rapport à Symfony avec lequel j’ai quand même beaucoup plus de facilité, Laravel était complétement différent, presque déroutant sur le début. Après quelques heures j’ai commencé à y voir plus clair.
Par la suite j’ai rencontré un autre « problème » c’est Eloquent, moi qui ai l’habitude de Doctrine, la syntaxe et la manière de coder est encore une fois différente.
J’ai finalement réussi à faire ce que je voulais (les différents points du test 2).

Comme vous allez surement le constater, c’est une approche très « junior » mais j’ai eu un petit feeling avec Laravel, c’est juste qu’il faut le comprendre et le pratiquer encore.

Exercice demandé  : 
* Il existe un utilisateur admin après avoir SEED la bdd pour facilité le teste de l’API.
    * db infos :
        * db_name = myastroapi_db
        * db_username = root
        * db_password = null 
    * cmd a exécuter :
        * php artisan migrate –seed
        * php artisan db:seed --class=UserTableSeeder
    * connexion API infos :
        * login (email) : admin@admin.com
        * password : password

A noter que j'ai utilisé PostMan pour effectuer mes tests. L'authentification choisi est BASIC (mail et password).

Ensuite j'ai : 
* Créé une route ```GET``` /users qui permet de récupérer toutes les infos des utilisateurs en paginant le résultat.
* Créé une route ```GET``` /user/{id} qui permet de récupérer toutes les infos d’un utilisateur en particulier.
* Créé une route ```POST``` /user qui permet après authentification de créer un utilisateur en fournissant :
    * name => string
    * email => email
    * password => string|min 8 caractères
    * birthday_date => date|format(d-m-Y)
    >Lors de la création d’un utilisateur, ses signes astrologiques du Zodiac et Chinois lui sont ajoutés.
* Créé une route ```PUT``` /user/{id} qui permet après authentification de modifier les informations d’un utilisateur.
* Créé une route ```DELETE``` /user/{id} qui permet après authentification de supprimer un utilisateur.

Je tiens à m’excuser d’avance pour les tests unitaires, je n’ai malheureusement encore jamais appris à les faires, dans ma société actuel nous n’en faisons pas, et c’est une choses qui a déjà été remonté. Par contre, il est clair que j’aimerais apprendre et prendre l’habitude d’en faire car je suis conscient que c’est la bonne pratique.

Merci pour l’attention que vous m’accordez.

Cordialement Mr Buzalja.
