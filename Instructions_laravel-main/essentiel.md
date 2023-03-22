
### Les routes
    - Route:: classe laravel
    - get: méthode laravel
    - '/' : url
    - function(){ return view('welcome')}: callback function
    - syntax: Route::get('/', function(){ return view('welcome')})
    - NB: En laravel, pour les liens, le '/' est remplacé par '.'
    - Mot clé  '@extends' permet de copier coller le code d'un fichier dans un autre
    - Mot clé '@section('content')' -> dans l'enfant
    - Mot clé '@section('content')' -> dans le parent

### Les controller
    -commande a taper: php artisan make: controller NomDuController ou composer dump-autoload si le controller est créé manuellement
    - Pour appeler la classe et une méthode du controller:
        `Route:: get('/', [NomClass::class, 'Nom méthode')`

### Les blades
    -Pour passer une variable dans une vue, on utilise compact('nomVariable')
    - Les directives
        - @foreach
        - @each
        - @include permet d'incure une vue dans une autre
        -...

### Les commentaires
    Syntax: {{-- --}}

#### À propos de la syntaxe moustache :
    ```blade
        {{ $article['body'] }}
    ```
    Notez que cette syntaxe est équivalente à :
    ```php
        echo htmlspecialchars($article['body']);
    ```

### Le fichier .env
    Il contient les variables d'environnement et de configuration du framework

### Les migrations
    La méthode `$table->id()` créera un champ id, clé primaire, auto-increment.  
    Le champ `email_verified_at` sera un timestamp.  
    La méthode `$table->rememberToken()` créera un booléen qui sera utilisé si  l'utilisateur décide de cliquer l'input radio 'Remember me' au moment du login.  
    Enfin, la méthode `$table->timestamps()` créera un champ created_at `timestamp`     et un champ updated_at `timestamp`

    -Creation: php artisan make:migration create_articles_table puis
    artisan migrate php 

### Les factory 
    Bibliothèque de laravel qui permet de genérer de fausses données dans la base de données
    Syntax: php artisan make:factory ArticleFactory

### Tinker
    Tinker est un outil en ligne de commande qui permet d'interagir avec l'application directement dans le terminal.
    syntax: php artisan tinker puis on ajoute la commande qu'on veut

### Les modèles
    Un ORM est une technique consistant à interagir avec la BDD en utilisant un langage de programmation plutôt que le SQL.
    syntax de modèle: php artisan make: model NomModel

### Database Seeder
    Le `seeder` est l'outil qui va nous permettre d'ajouter des données automatiquement.
    syntax: php artisan db:seed

### Eloquent
    Quelques commandes eloquent
        -User::where('id', $id)->get();
        -User::where('name', 'like', '%Kale%')->get();
        -User::where('id', '>', '4')->get();
        -User::where('admin', true)->get()->toArray();
        -User::where('admin', false)->orderBy('name', 'desc')->take(3)->get();
        -User::where('name', 'Kale Williamson')->first();
        -Article::find($ids);
        -User::findOrFail($id);
        
### Les relations de bases: Eloquent relationship

    -hasMany: ($this->hasMany(Article::class)) veut dire 'cet element peut avoir plusieurs articles'

    -belongsTo: ($this->hasMany(Article::class)) veut dire 'cet element n'a qu'un seul article'
    -Quelques commandes 
        -$user = User::where('id', 1)->with('articles')->get();
        -$user = User::first();
         $user->articles;
         $user->comments;
        -$article = Article::first();
         $article->user()->get();
         $article->comments()->get();

### Les routes 2 
    -<a href="/article/{{ $article->id }}"> === passe l'id de l'article concerné en paramètre

    - Commande pour minimiser les requettes
    $article = Article::with('user')->with(['comments' => function ($query) {
        $query->with('user');
    }])->findOrFail($id);