<?php
/**
 * Standalone seeder: wipes categories/questions and inserts a rich,
 * varied dataset (8 categories x 10 questions x 10 answers).
 * Convention: the first answer in each `reponses` array is always correct.
 *
 * Run with: php database/seed_full.php
 */

$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=culturequizz;charset=utf8mb4', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

$categories = ['Histoire', 'Cinema', 'Sport', 'Musique', 'Geographie', 'Sciences', 'Litterature', 'Jeux Video'];

$questions = [
    // ---------------- Histoire ----------------
    ['Histoire', "En quelle année a eu lieu la Révolution française ?",
        ['1789', '1815', '1848', '1870', '1918', '1945', '1958', '1804', '1701', '1789 av. J.-C.']],
    ['Histoire', "Qui a été le premier président de la Ve République française ?",
        ['Charles de Gaulle', 'François Mitterrand', 'Georges Pompidou', "Valéry Giscard d'Estaing", 'Jacques Chirac', 'Nicolas Sarkozy', 'Vincent Auriol', 'Félix Faure', 'Raymond Poincaré', 'Alain Poher']],
    ['Histoire', "En quelle année le mur de Berlin est-il tombé ?",
        ['1989', '1991', '1961', '1975', '1985', '1990', '1993', '1979', '1969', '2001']],
    ['Histoire', "Quel empereur romain a fait construire le Colisée ?",
        ['Vespasien', 'Néron', 'Auguste', 'Jules César', 'Trajan', 'Hadrien', 'Caligula', 'Constantin', 'Marc Aurèle', 'Dioclétien']],
    ['Histoire', "Quelle bataille a marqué la défaite finale de Napoléon en 1815 ?",
        ['Waterloo', 'Austerlitz', 'Trafalgar', 'Iéna', 'Leipzig', 'Wagram', 'Verdun', 'Marengo', 'Borodino', 'Rivoli']],
    ['Histoire', "Qui a découvert l'Amérique en 1492 ?",
        ['Christophe Colomb', 'Vasco de Gama', 'Magellan', 'Marco Polo', 'Amerigo Vespucci', 'Jacques Cartier', 'James Cook', 'Hernan Cortés', 'John Cabot', 'Ferdinand de Soto']],
    ['Histoire', "Quel traité a mis fin à la Première Guerre mondiale ?",
        ['Traité de Versailles', 'Traité de Rome', 'Traité de Vienne', 'Traité de Yalta', 'Traité de Westphalie', 'Traité de Paris', 'Traité de Nankin', 'Traité de Tordesillas', 'Traité de Maastricht', "Traité d'Utrecht"]],
    ['Histoire', "Quel pharaon égyptien est célèbre pour son masque funéraire en or ?",
        ['Toutânkhamon', 'Ramsès II', 'Akhenaton', 'Khéops', 'Thoutmôsis III', 'Amenhotep III', 'Horemheb', 'Séthi Ier', 'Psousennès Ier', 'Djéser']],
    ['Histoire', "En quelle année a débuté la Seconde Guerre mondiale ?",
        ['1939', '1914', '1941', '1945', '1918', '1936', '1929', '1950', '1933', '1937']],
    ['Histoire', "Quel roi de France est surnommé le \"Roi Soleil\" ?",
        ['Louis XIV', 'Louis XVI', 'Louis XIII', 'Louis XV', 'François Ier', 'Henri IV', 'Charlemagne', 'Philippe Auguste', 'Louis IX', 'Louis XI']],

    // ---------------- Cinema ----------------
    ['Cinema', "Qui a réalisé le film \"Titanic\" (1997) ?",
        ['James Cameron', 'Steven Spielberg', 'Christopher Nolan', 'Martin Scorsese', 'Ridley Scott', 'Quentin Tarantino', 'Peter Jackson', 'George Lucas', 'James Wan', 'Tim Burton']],
    ['Cinema', "Quel acteur incarne Iron Man dans l'univers Marvel ?",
        ['Robert Downey Jr.', 'Chris Evans', 'Chris Hemsworth', 'Mark Ruffalo', 'Tom Holland', 'Jeremy Renner', 'Paul Rudd', 'Benedict Cumberbatch', 'Chadwick Boseman', 'Samuel L. Jackson']],
    ['Cinema', "Quel film a remporté l'Oscar du meilleur film en 1995 (pour l'année 1994) ?",
        ['Forrest Gump', 'Pulp Fiction', 'Le Roi Lion', 'Quatre Mariages et un enterrement', 'Léon', 'Speed', 'Le Fugitif', 'Interview avec un vampire', 'Nell', 'Philadelphia']],
    ['Cinema', "Dans quelle saga trouve-t-on le personnage \"Dark Vador\" ?",
        ['Star Wars', 'Star Trek', 'Dune', 'Blade Runner', 'Alien', 'Terminator', 'Matrix', 'Avatar', 'Le Cinquième Élément', 'Gardiens de la Galaxie']],
    ['Cinema', "Qui joue le rôle du Joker dans le film \"Joker\" (2019) ?",
        ['Joaquin Phoenix', 'Heath Ledger', 'Jared Leto', 'Jack Nicholson', 'Christian Bale', 'Ryan Gosling', 'Leonardo DiCaprio', 'Joseph Gordon-Levitt', 'Adam Driver', 'Robert Pattinson']],
    ['Cinema', "Quel studio a produit \"Toy Story\" ?",
        ['Pixar', 'DreamWorks', 'Disney Animation', 'Universal', 'Warner Bros', 'Illumination', 'Sony Pictures', '20th Century Fox', 'Blue Sky Studios', 'Aardman']],
    ['Cinema', "En quelle année est sorti le premier film Harry Potter au cinéma ?",
        ['2001', '1999', '2003', '1997', '2005', '2000', '2002', '2004', '1998', '2006']],
    ['Cinema', "Quel réalisateur est connu pour des films comme \"Inception\" et \"Interstellar\" ?",
        ['Christopher Nolan', 'David Fincher', 'Denis Villeneuve', 'James Cameron', 'Ridley Scott', 'Steven Spielberg', 'Alfonso Cuarón', 'Michael Bay', 'Paul Thomas Anderson', 'Guillermo del Toro']],
    ['Cinema', "Quel film d'animation met en scène un poisson-clown nommé Marin ?",
        ['Le Monde de Nemo', 'Shrek', 'Vice-Versa', 'Rio', "L'Âge de Glace", 'Madagascar', 'Ratatouille', 'Là-haut', 'Wall-E', 'Coco']],
    ['Cinema', "Qui a réalisé la trilogie \"Le Seigneur des Anneaux\" ?",
        ['Peter Jackson', 'Guillermo del Toro', 'James Cameron', 'Ridley Scott', 'George Lucas', 'David Yates', 'Zack Snyder', 'Denis Villeneuve', 'Sam Raimi', 'Tim Burton']],

    // ---------------- Sport ----------------
    ['Sport', "Quel pays a remporté la Coupe du Monde de football 2018 ?",
        ['France', 'Croatie', 'Belgique', 'Angleterre', 'Brésil', 'Allemagne', 'Argentine', 'Espagne', 'Portugal', 'Uruguay']],
    ['Sport', "Combien de joueurs une équipe de basketball aligne-t-elle sur le terrain ?",
        ['5', '6', '7', '4', '8', '9', '10', '11', '3', '12']],
    ['Sport', "Dans quel sport utilise-t-on un \"smash\" comme coup offensif emblématique ?",
        ['Badminton', 'Golf', 'Bowling', 'Escrime', 'Natation', 'Tir à l\'arc', 'Rugby', 'Boxe', 'Judo', 'Athlétisme']],
    ['Sport', "Au tennis en Grand Chelem messieurs, combien de sets faut-il remporter pour gagner le match ?",
        ['3', '2', '4', '5', '1', '6', '7', '8', '9', '10']],
    ['Sport', "Sur quelle surface de combat se déroule un match de boxe ?",
        ['Un ring', 'Un tatami', 'Un octogone', 'Une piste', 'Un dojo', 'Un terrain', 'Une arène', 'Un ring de catch', 'Un stade', 'Un gymnase']],
    ['Sport', "Combien de temps dure le temps réglementaire d'un match de football ?",
        ['90 minutes', '80 minutes', '100 minutes', '60 minutes', '120 minutes', '70 minutes', '45 minutes', '105 minutes', '75 minutes', '95 minutes']],
    ['Sport', "Quel athlète jamaïcain détient le record du monde du 100 mètres ?",
        ['Usain Bolt', 'Justin Gatlin', 'Tyson Gay', 'Carl Lewis', 'Yohan Blake', 'Asafa Powell', 'Andre De Grasse', 'Noah Lyles', 'Christian Coleman', 'Ben Johnson']],
    ['Sport', "Dans quel sport évolue Lionel Messi ?",
        ['Football', 'Basketball', 'Tennis', 'Rugby', 'Golf', 'Cyclisme', 'Handball', 'Volleyball', 'Baseball', 'Cricket']],
    ['Sport', "Combien d'anneaux compte le symbole olympique ?",
        ['5', '4', '6', '3', '7', '8', '2', '9', '10', '1']],
    ['Sport', "Dans quel pays le rugby moderne est-il né ?",
        ['Angleterre', 'France', 'Nouvelle-Zélande', 'Afrique du Sud', 'Australie', 'Écosse', 'Pays de Galles', 'Irlande', 'États-Unis', 'Argentine']],

    // ---------------- Musique ----------------
    ['Musique', "Quel groupe a interprété \"Bohemian Rhapsody\" ?",
        ['Queen', 'The Beatles', 'Pink Floyd', 'Led Zeppelin', 'The Rolling Stones', 'ABBA', 'AC/DC', 'The Who', 'Genesis', 'Fleetwood Mac']],
    ['Musique', "Quel chanteur est surnommé le \"Roi de la Pop\" ?",
        ['Michael Jackson', 'Elvis Presley', 'Prince', 'Justin Timberlake', 'Usher', 'Stevie Wonder', 'James Brown', 'Chris Brown', 'Bruno Mars', 'Freddie Mercury']],
    ['Musique', "De quel pays le groupe ABBA est-il originaire ?",
        ['Suède', 'Norvège', 'Danemark', 'Finlande', 'Islande', 'Pays-Bas', 'Allemagne', 'Royaume-Uni', 'Belgique', 'Autriche']],
    ['Musique', "Quel instrument de musique compte 88 touches ?",
        ['Le piano', 'La guitare', 'Le violon', "L'accordéon", 'La harpe', "L'orgue", 'Le clavecin', 'Le xylophone', 'Le synthétiseur', 'La flûte']],
    ['Musique', "Qui a composé l'opéra \"La Flûte enchantée\" ?",
        ['Mozart', 'Beethoven', 'Bach', 'Haydn', 'Chopin', 'Vivaldi', 'Schubert', 'Verdi', 'Wagner', 'Brahms']],
    ['Musique', "Quelle chanteuse française a interprété \"La Vie en rose\" ?",
        ['Édith Piaf', 'Dalida', 'France Gall', 'Mireille Mathieu', 'Barbara', 'Juliette Gréco', 'Françoise Hardy', 'Sylvie Vartan', 'Zaz', 'Nana Mouskouri']],
    ['Musique', "Dans quel pays se déroule le célèbre festival de musique de Glastonbury ?",
        ['Royaume-Uni', 'France', 'États-Unis', 'Allemagne', 'Espagne', 'Belgique', 'Irlande', 'Pays-Bas', 'Écosse', 'Italie']],
    ['Musique', "Quel est le vrai nom du rappeur Eminem ?",
        ['Marshall Mathers', 'Curtis Jackson', 'Aubrey Graham', 'Shawn Carter', 'Calvin Broadus', 'Andre Young', 'Robert Van Winkle', "O'Shea Jackson", 'Tracy Marrow', 'Christopher Wallace']],
    ['Musique', "Combien de cordes possède une guitare classique standard ?",
        ['6', '4', '5', '7', '8', '12', '3', '9', '10', '2']],
    ['Musique', "Quel groupe britannique a sorti l'album \"Abbey Road\" ?",
        ['The Beatles', 'The Rolling Stones', 'Queen', 'Pink Floyd', 'The Who', 'Led Zeppelin', 'Oasis', 'The Kinks', 'The Clash', 'Radiohead']],

    // ---------------- Geographie ----------------
    ['Geographie', "Quelle est la capitale de l'Australie ?",
        ['Canberra', 'Sydney', 'Melbourne', 'Perth', 'Brisbane', 'Adélaïde', 'Auckland', 'Wellington', 'Darwin', 'Hobart']],
    ['Geographie', "Quel est le plus long fleuve du monde ?",
        ['Le Nil', "L'Amazone", 'Le Mississippi', 'Le Yangtsé', 'Le Congo', "L'Ob", 'Le Mékong', 'Le Danube', 'La Volga', 'Le Gange']],
    ['Geographie', "Quel pays compte le plus grand nombre d'habitants au monde ?",
        ['Inde', 'Chine', 'États-Unis', 'Indonésie', 'Pakistan', 'Brésil', 'Nigeria', 'Bangladesh', 'Russie', 'Mexique']],
    ['Geographie', "Quelle chaîne de montagnes sépare traditionnellement l'Europe de l'Asie ?",
        ["L'Oural", 'Les Alpes', 'Les Carpates', "L'Himalaya", 'Les Pyrénées', 'Le Caucase', 'Les Andes', 'Les Rocheuses', 'Le Zagros', 'Les Balkans']],
    ['Geographie', "Quel est le plus petit État du monde ?",
        ['Le Vatican', 'Monaco', 'Saint-Marin', 'Liechtenstein', 'Malte', 'Andorre', 'Nauru', 'Tuvalu', 'Palaos', 'Saint-Christophe-et-Niévès']],
    ['Geographie', "Dans quel pays se trouve la ville de Marrakech ?",
        ['Maroc', 'Algérie', 'Tunisie', 'Égypte', 'Libye', 'Mauritanie', 'Sénégal', 'Jordanie', 'Liban', 'Arabie Saoudite']],
    ['Geographie', "Quel est le plus grand océan du monde ?",
        ['Pacifique', 'Atlantique', 'Indien', 'Arctique', 'Austral', 'Méditerranée', 'Mer Rouge', 'Golfe du Mexique', 'Mer Noire', 'Mer Caspienne']],
    ['Geographie', "Quelle est la capitale du Canada ?",
        ['Ottawa', 'Toronto', 'Montréal', 'Vancouver', 'Québec', 'Calgary', 'Winnipeg', 'Edmonton', 'Halifax', 'Victoria']],
    ['Geographie', "Quel est le plus grand désert chaud du monde ?",
        ['Le Sahara', 'Le Kalahari', 'Le Gobi', "Le désert d'Arabie", "L'Atacama", 'Le Namib', 'Le désert de Mojave', 'Le Thar', 'Le désert de Syrie', 'Le Sonoran']],
    ['Geographie', "Combien de continents compte-t-on généralement ?",
        ['7', '5', '6', '8', '4', '9', '3', '10', '2', '12']],

    // ---------------- Sciences ----------------
    ['Sciences', "Quel est le symbole chimique de l'argent ?",
        ['Ag', 'Fe', 'Pb', 'Cu', 'Sn', 'Al', 'Ni', 'Zn', 'Pt', 'Au']],
    ['Sciences', "Quelle planète du système solaire est surnommée la \"planète rouge\" ?",
        ['Mars', 'Vénus', 'Jupiter', 'Saturne', 'Mercure', 'Neptune', 'Uranus', 'Pluton', 'la Terre', 'le Soleil']],
    ['Sciences', "Combien d'os compte le squelette d'un adulte humain ?",
        ['206', '208', '200', '210', '195', '215', '220', '190', '230', '198']],
    ['Sciences', "Qui a formulé la théorie de la relativité ?",
        ['Albert Einstein', 'Isaac Newton', 'Galilée', 'Stephen Hawking', 'Niels Bohr', 'Max Planck', 'Nikola Tesla', 'Marie Curie', 'Charles Darwin', 'Werner Heisenberg']],
    ['Sciences', "Quel gaz les plantes absorbent-elles principalement lors de la photosynthèse ?",
        ['Le dioxyde de carbone', "L'oxygène", "L'azote", "L'hydrogène", 'Le méthane', "L'ozone", "L'hélium", 'Le chlore', "L'argon", "La vapeur d'eau"]],
    ['Sciences', "Quelle est l'unité de mesure de la force dans le Système international ?",
        ['Le Newton', 'Le Joule', 'Le Watt', 'Le Pascal', 'Le Volt', "L'Ampère", 'Le Kelvin', 'Le Hertz', 'Le Bar', 'Le Ohm']],
    ['Sciences', "Combien de chromosomes possède une cellule humaine normale ?",
        ['46', '44', '48', '23', '42', '50', '24', '52', '40', '36']],
    ['Sciences', "Quel scientifique est crédité de la découverte de la radioactivité naturelle ?",
        ['Henri Becquerel', 'Marie Curie', 'Pierre Curie', 'Ernest Rutherford', 'Niels Bohr', 'Albert Einstein', 'Max Planck', 'Louis Pasteur', 'Antoine Lavoisier', 'Dmitri Mendeleïev']],
    ['Sciences', "Quel est l'élément chimique le plus abondant dans l'univers ?",
        ["L'hydrogène", "L'hélium", "L'oxygène", 'Le carbone', "L'azote", 'Le fer', 'Le silicium', 'Le néon', "L'argon", 'Le soufre']],
    ['Sciences', "Combien de temps la Terre met-elle pour faire un tour complet sur elle-même ?",
        ['24 heures', '12 heures', '48 heures', '365 jours', '1 heure', '6 heures', '36 heures', '18 heures', '30 heures', '8 heures']],

    // ---------------- Litterature ----------------
    ['Litterature', "Qui a écrit le roman \"Les Misérables\" ?",
        ['Victor Hugo', 'Émile Zola', 'Gustave Flaubert', 'Honoré de Balzac', 'Alexandre Dumas', 'Stendhal', 'Molière', 'Voltaire', 'Jean-Paul Sartre', 'Albert Camus']],
    ['Litterature', "Quel auteur a créé le personnage de Sherlock Holmes ?",
        ['Arthur Conan Doyle', 'Agatha Christie', 'Edgar Allan Poe', 'Charles Dickens', 'Mark Twain', 'H.G. Wells', 'Jules Verne', 'Robert Louis Stevenson', 'Oscar Wilde', 'Bram Stoker']],
    ['Litterature', "Quel est le titre du premier tome de la saga \"Harry Potter\" ?",
        ["Harry Potter à l'école des sorciers", 'Harry Potter et la Chambre des secrets', "Harry Potter et le Prisonnier d'Azkaban", 'Harry Potter et la Coupe de feu', "Harry Potter et l'Ordre du Phénix", 'Harry Potter et le Prince de sang-mêlé', 'Harry Potter et les Reliques de la Mort', "Harry Potter et l'Enfant maudit", 'Les Animaux fantastiques', 'Le Quidditch à travers les âges']],
    ['Litterature', "Qui a écrit la pièce \"Roméo et Juliette\" ?",
        ['William Shakespeare', 'Molière', 'Christopher Marlowe', 'Oscar Wilde', 'Charles Dickens', 'Jane Austen', 'Victor Hugo', 'Homère', 'Dante Alighieri', 'Miguel de Cervantès']],
    ['Litterature', "Quel roman de Jules Verne raconte un voyage vers le centre de la Terre ?",
        ['Voyage au centre de la Terre', 'Vingt Mille Lieues sous les mers', 'Le Tour du monde en 80 jours', 'De la Terre à la Lune', "L'Île mystérieuse", 'Cinq semaines en ballon', 'Robur le Conquérant', 'Michel Strogoff', 'Les Enfants du capitaine Grant', 'Nautilus']],
    ['Litterature', "Qui est l'auteur du roman \"1984\" ?",
        ['George Orwell', 'Aldous Huxley', 'Ray Bradbury', 'Franz Kafka', 'Philip K. Dick', 'H.G. Wells', 'Isaac Asimov', 'J.R.R. Tolkien', 'Ernest Hemingway', 'John Steinbeck']],
    ['Litterature', "Dans quelle œuvre trouve-t-on le personnage de Gavroche ?",
        ['Les Misérables', 'Notre-Dame de Paris', 'Le Comte de Monte-Cristo', 'Les Trois Mousquetaires', 'Germinal', 'Madame Bovary', 'Le Rouge et le Noir', 'Candide', 'Les Fleurs du mal', 'La Peste']],
    ['Litterature', "Qui a écrit \"Le Petit Prince\" ?",
        ['Antoine de Saint-Exupéry', 'Jules Verne', 'Victor Hugo', 'Marcel Pagnol', 'Albert Camus', 'Jean de La Fontaine', 'Charles Perrault', 'Colette', 'Marguerite Duras', 'René Goscinny']],
    ['Litterature', "Quel poète français est l'auteur du recueil \"Les Fleurs du mal\" ?",
        ['Charles Baudelaire', 'Arthur Rimbaud', 'Paul Verlaine', 'Victor Hugo', 'Stéphane Mallarmé', 'Guillaume Apollinaire', 'Paul Éluard', 'Louis Aragon', 'Alphonse de Lamartine', 'Jacques Prévert']],
    ['Litterature', "Quel écrivain russe a écrit \"Guerre et Paix\" ?",
        ['Léon Tolstoï', 'Fiodor Dostoïevski', 'Anton Tchekhov', 'Nicolas Gogol', 'Ivan Tourgueniev', 'Alexandre Pouchkine', 'Vladimir Nabokov', 'Boris Pasternak', 'Mikhaïl Boulgakov', 'Maxime Gorki']],

    // ---------------- Jeux Video ----------------
    ['Jeux Video', "Quelle entreprise a créé la console PlayStation ?",
        ['Sony', 'Microsoft', 'Nintendo', 'Sega', 'Atari', 'Konami', 'Capcom', 'Square Enix', 'Ubisoft', 'Electronic Arts']],
    ['Jeux Video', "Quel est le plombier le plus célèbre des jeux vidéo ?",
        ['Mario', 'Luigi', 'Sonic', 'Link', 'Kirby', 'Yoshi', 'Wario', 'Bowser', 'Toad', 'Donkey Kong']],
    ['Jeux Video', "Dans quelle saga incarne-t-on le personnage Link ?",
        ['The Legend of Zelda', 'Super Mario', 'Metroid', 'Kirby', 'Pokémon', 'Star Fox', 'Fire Emblem', 'Animal Crossing', 'Splatoon', 'Donkey Kong']],
    ['Jeux Video', "Quel jeu vidéo de construction et de survie utilise des blocs cubiques ?",
        ['Minecraft', 'Terraria', 'Roblox', 'Fortnite', 'Rust', 'Stardew Valley', 'Valheim', 'ARK', "No Man's Sky", 'Subnautica']],
    ['Jeux Video', "Quelle entreprise a développé la licence \"Call of Duty\" ?",
        ['Activision', 'Electronic Arts', 'Ubisoft', 'Rockstar Games', 'Bethesda', 'Valve', 'Epic Games', '2K Games', 'Square Enix', 'CD Projekt']],
    ['Jeux Video', "Quel jeu met en scène le personnage Master Chief ?",
        ['Halo', 'Gears of War', 'Destiny', 'Doom', 'Titanfall', 'Metroid Prime', 'Half-Life', 'Crysis', 'Star Wars Battlefront', 'Mass Effect']],
    ['Jeux Video', "Quel jeu de Rockstar Games se déroule dans la ville fictive de Los Santos ?",
        ['Grand Theft Auto V', 'Red Dead Redemption', 'Bully', 'Max Payne', "L.A. Noire", 'Watch Dogs', 'Saints Row', 'Mafia', 'Sleeping Dogs', 'Cyberpunk 2077']],
    ['Jeux Video', "Quelles créatures emblématiques doit-on éviter dans \"Pac-Man\" ?",
        ['Les fantômes', 'Les champignons', 'Les tortues', 'Les zombies', 'Les araignées', 'Les extraterrestres', 'Les squelettes', 'Les serpents', 'Les chauves-souris', 'Les robots']],
    ['Jeux Video', "Quel studio a créé la licence \"The Witcher\" ?",
        ['CD Projekt Red', 'Bethesda', 'BioWare', 'Bungie', 'Ubisoft', 'Naughty Dog', 'FromSoftware', 'Rockstar Games', 'Square Enix', 'Insomniac Games']],
    ['Jeux Video', "Dans quel jeu peut-on aménager une île et pêcher aux côtés de villageois animaux ?",
        ['Animal Crossing', 'Stardew Valley', 'Minecraft', 'The Sims', 'Terraria', 'Harvest Moon', 'My Time at Portia', 'Farming Simulator', 'Dragon Quest Builders', 'Story of Seasons']],
];

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE questions');
$pdo->exec('TRUNCATE TABLE categories');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$insertCategory = $pdo->prepare(
    'INSERT INTO categories (categorie, created_at, updated_at) VALUES (?, NOW(), NOW())'
);
foreach ($categories as $categorie) {
    $insertCategory->execute([$categorie]);
}

$insertQuestion = $pdo->prepare(
    'INSERT INTO questions (categorie, question, reponse1, reponse2, reponse3, reponse4, reponse5, reponse6, reponse7, reponse8, reponse9, reponse10, created_at, updated_at)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())'
);
foreach ($questions as [$categorie, $question, $reponses]) {
    if (count($reponses) !== 10) {
        throw new RuntimeException("La question \"$question\" n'a pas exactement 10 réponses.");
    }
    $insertQuestion->execute([$categorie, $question, ...$reponses]);
}

echo 'Catégories insérées : ' . count($categories) . "\n";
echo 'Questions insérées : ' . count($questions) . "\n";
