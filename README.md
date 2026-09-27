# Culture Quiz

Un quiz de culture générale pensé pour l'écran tactile : on choisit une catégorie, on répond à 10 questions à choix multiples avec un minuteur de 30 secondes par question, puis on découvre son score final.

Le projet est composé de deux applications indépendantes qui communiquent en HTTP :

- **`back/`** — API REST Laravel 8 (+ une ancienne interface d'administration en Blade pour gérer les questions/catégories), avec une base de données MySQL.
- **`front/`** — application web (SPA) React 19 + TypeScript (Vite) utilisée par les joueurs.

## Prérequis

- PHP 8.x avec Composer
- MySQL (ou une autre base supportée par Laravel)
- Node.js avec npm

## Installation du backend (`back/`)

```bash
cd back
composer install
cp .env.example .env
php artisan key:generate
```

Configurez votre base de données dans `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, ...), puis lancez les migrations :

```bash
php artisan migrate
```

Démarrez le serveur de l'API :

```bash
php artisan serve
```

L'API est alors disponible sur `http://localhost:8000/api` et expose :

- `GET/POST /questions`, `PUT/DELETE /questions/{id}`
- `GET/POST/PUT/DELETE /users`, `GET /users/{id}`
- `GET /categories`

Une interface d'administration séparée, en Blade (`/listequestions`, `/createQuestion`, `/listecategories`, `/createcategorie`), permet de gérer le contenu du quiz sans passer par l'API.

Pour lancer les tests :

```bash
php artisan test
```

## Installation du frontend (`front/`)

```bash
cd front
npm install
```

Par défaut, l'application pointe vers `http://localhost:8000/api` (voir `front/.env`, variable `VITE_API_URL`). Modifiez-la si votre backend tourne ailleurs.

```bash
npm run dev
```

Autres scripts disponibles :

```bash
npm run build     # vérification des types puis build de production
npm run lint       # lancer oxlint
npm run preview    # prévisualiser le build de production
```

## Fonctionnement

- Sur une `Question`, `reponse1` est toujours la bonne réponse et `reponse2`..`reponse10` sont des réponses erronées (distracteurs). Le frontend sélectionne la bonne réponse ainsi que 3 distracteurs tirés au hasard, puis mélange leur ordre d'affichage pour chaque question.
- Les catégories sont associées par leur nom (chaîne de caractères), et non par une relation de clé étrangère.
- Chaque question dispose d'un minuteur de 30 secondes ; si le temps s'écoule sans réponse, cela compte comme une absence de réponse et le quiz passe automatiquement à la question suivante.
- Les résultats (score, total, catégorie) sont transmis à la page de résultats via l'état du routeur (router state), et non via l'URL.
