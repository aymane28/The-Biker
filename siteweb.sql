-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 10 mai 2021 à 21:36
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `marque` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prix` int NOT NULL,
  `consomation` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `type`, `marque`, `prix`, `consomation`, `details`, `image`) VALUES
(2, 'ténéré 700', 'Tout-Terrain', 'Yamaha', 9999, '5', 'Les premières XT de Yamaha ont permis à de nombreux pilotes de partir à la découverte du monde. Aujourd\'hui, la légende continue. La Ténéré 700 vous permet de découvrir l\'aventure grandeur nature et de changer de vie.', '/content/img/ténéré700.jpg'),
(3, 'MT 07', 'Roadster', 'Yamaha', 7299, '5.5', 'Parfaite pour une première moto', '/content/img/mt07.jpg'),
(4, 'MT 09', 'Roadster', 'Yamaha', 9499, '5.2', 'Moto polyvalente pour permis A', '/content/img/mt09.jpg'),
(5, 'MT 10', 'Roadster', 'Yamaha', 13999, '8.01', 'Très inspirée de la YZF-R1, héritière des technologies du MotoGP, la marque aux diapasons ne cache pas son ambition de bousculer à nouveau le monde du Roadster Sportif avec la MT-10. Le 4 cylindres en ligne Crossplane a été optimisé pour atteindre 200 ch : inertie réduite, bielles à tête fracturée en titane, alésage augmenté et course réduite, nouvelle culasse haute compression, volume de la boîte à air augmenté, nouveau système d\'injection, complétés par un embrayage antidribble et un échappement titane... Pour réduire le poids de la machine à 199 kg tous pleins faits, les ingénieurs ont fait appel au magnésium au niveau du cadre mais aussi des jantes. Un rapport poids-puissance qui en dit long sur son potentiel sportif. Elle se dote par ailleurs d\'un système de mesure inertiel à 6 axes jamais vu sur une machine homologuée pour la route. Résultat, une batterie d\'assistances à la conduite : ABS et freinage intégral au levier, Traction control, Launch control, Slide control, Front lift control, Quickshifter, 4 cartographies, 4 modes de pilotage et en option le CCU, une \"unité de communication avec consignation des données et configuration Wi-Fi\". Un écran TFT permet de gérer tout ça.', '/content/img/mt10.jpg'),
(6, 'GL1800 Gold Wing', 'Routière', 'Honda', 27899, '7.8', 'Quel que soit l’endroit que vous ayez envie de découvrir, l’élégante GL1800 Gold Wing est un passeport spécial vers la liberté. Depuis sa création , elle s’est imposée comme la référence en matière de voyage à deux roues. La Gold Wing n’a cessé de s’améliorer, notamment avec une refonte complète en 2018, gagnant en gabarit et en cylindrée, confirmant sa notoriété incontestée de qualité, de luxe et de confort. Vitrine technologique de la gamme moto Honda, la Gold Wing adopte des équipements haut-de-gamme et exclusifs, tels que la dernière génération de la transmission à double embrayage DCT à 7 rapports, ainsi que la connectivité mobile. ', '/content/img/GL1800GoldWing.jpg'),
(7, 'Tracer 700', 'Routière', 'Yamaha', 8799, '5.6', 'Commençons par la génitrice, qui n\'est autre que l\'un des plus gros succès de Yamaha dans le domaine des roadsters. De roadster léger, mutin, et fun, la MT-07 Tracer devient sérieuse, élégante, frondeuse. La greffe d\'une imposante tête de fourche change toute sa physionomie. Et avec quelle réussite ! On sent que les designers de Yam ont bien bossé la question. Moins taillé dans les angles que celui de la 900 Tracer, plus souple dans ses formes, caressé sous les yeux, il réalise le petit coup de magie de s\'apparenter immédiatement au grand frère tout en possédant son identité propre. On est loin des GSX-R 600, 750 et 1000 du début du siècle, véritable génères les uns des autres. Le jeu de phare réplique celui de la 900, avec un toucher de crayon qui n\'est pas sans rappeler le front de la TDM 900. Les connaisseurs apprécieront.', '/content/img/tracer700.jpg'),
(8, 'Tracer 900 GT', 'Routière', 'Yamaha', 13999, '5.03', 'Les principales limites, ou défauts, c\'était la selle dure et la bagagerie dispo en accessoires ; des sacoches semi-rigides pas moyennement top pour partir sereinement dans d\'autres régions. La nouvelle 900 Tracer fait mieux mais... il manque encore quelque chose pour basculer dans l\'horizon. Et c\'est là que la Tracer 900 GT sort de gros arguments. Mieux équipée, plus valorisante, plus apte à partir sur du gros kilométrage, ce crossover de long cours est tentant à plus d\'un titre.\r\n\r\nAlors attention, ne concluez surtout pas tout de suite à ce qui pourrait sembler une évidence : ce n\'est pas une Tracer avec un kit valises. Yamaha a été bien plus loin, afin d\'en faire une moto plus valorisante et aboutie que cette simple conclusion.\r\nLa GT se veut clairement plus haut de gamme. Et cela se ressent tout de suite en montant à bord avec le bel écran TFT couleur. Il n\'affiche rien de plus en infos que le riche double écran de la 900 Tracer std, mais ça a franchement de la gueule. Il se commande depuis une molette sur le commodo droit. Ensuite, les valises. Assorties à la couleur de la moto, elles ont une capacité de 22 litres mais surtout, elles se fixent dans les ancrages de la partie arrière bien plus facilement et élégamment que le kit bâtard en option sur l\'ancienne Tracer. Et si vous avez des valises de FJR qui trainent dans le garage, vous pouvez les inter-changer pour augmenter la capacité de fret.', '/content/img/tracer900gt.jpg'),
(9, 'F800GT', 'Routière', 'BMW', 9000, '4.5', 'Sur la même base que la F800 R et remplaçant la F800 ST, la F800 GT met en avant son bicylindre vertical plus puissant et une ergonomie agréable misant sur le confort et les sensations, mais également les performances. Dotée de guidon demi bracelet et de l\'ABS de série, luxueuse routière de moyenne cylindrée, la GT entend mettre en avant son équilibre et sa stabilité, ainsi que ses atouts : une transmission par courroie sans entretien, un monobras et de superbes jantes, sans oublier un excellent niveau de protection.', '/content/img/F800GT.jpg'),
(10, 'S1000RR', 'Sportive', 'BMW', 19200, '6.4', 'La nouvelle RR a été conçue pour les pôles positions des courses du monde entier. Parallèlement aux modèles précédents, pratiquement chaque composant a été remanié. Le résultat : 100% de performances, de la partie avant jusqu\'à l\'arrière. Découvrez ici tout ce qu’il faut savoir sur les caractéristiques techniques et l’équipement de série.', '/content/img/S1000rr.jpg'),
(11, 'R1', 'Sportive', 'Yamaha', 19299, '7.2', 'La R1 semble plus affûtée que jamais avec son carénage inspiré de la M1. Les flancs du carénage sont parfaitement intégrés ce qui confère à la moto un style encore plus agressif. En vous permettant de piloter au plus près de la moto, ce carénage augmente l&#39;efficacité aérodynamique de plus de 5 % pour de meilleures performances à haute vitesse.', '/content/img/R1.jpg'),
(12, 'GSX-R', 'Sportive', 'Suzuki', 19999, '6.2', 'Au-delà des modifications esthétiques (nouvelle face avant, nouveaux silencieux…), le constructeur d’Hamamatsu a profondément revu les entrailles de son hypersportive. Avec 6 chevaux gagnés par rapport à la précédente version et 5 kilos en moins sur la balance, la GSX-R 1000 millésime 2009 offre le meilleur rapport poids puissance du marché. Des chiffres à donner le vertige : 191 chevaux pour seulement 167 kg à sec. Pour arriver à un tel résultat, le 4-cylindres a été largement modifié.', '/content/img/GSXR.jpg'),
(13, 'CBR 1000 RR', 'Sportive', 'Honda', 21999, '5.64', 'Un quart de siècle a vu défiler les évolutions d\'une des sportives les plus efficaces et singulières sur le segment : la CBR Fireblade. C\'est également un succès commercial aux 470.000 unités vendues depuis 1992. La toute première apparait alors, cubant 893 cc et devenue depuis icône de la famille. Déjà à l’époque, la machine se démarquait, n’atteignant pas le litre des Suzuki GSX-R 1000 et autre FZR 1000. Mais la Honda proposait alors un concept, \"le total control\", base line mais aussi véritable philosophie de conception de ses modèles sportifs. Ce précepte s’appuyait déjà sur le rapport poids-puissance. Ainsi, le 4 cylindres, à double ACT et 16 soupapes, refroidi par eau ne pesait que 68 kg, l’ensemble de la machine 188 kg pour 124 cv. Et l’efficacité était bluffante, tout comme les ventes, ce premier modèle cumulant 26 000 unités.', '/content/img/CBR1000RR.jpg'),
(14, 'LiveWire', 'Cruiser', 'Harley Davidson', 33900, '7', 'La Livewire est une moto à part dans la gamme Harley-Davidson. La définition même d’un électron libre, tant elle ne ressemble à rien de connu en terre américaine. Pour cette moto qui se veut innovante, on sent que les designers ont voulu trancher dans le vif, loin des codes esthétiques chers à la marque. Exit l’acier ou les chromes. Ici, le plastique règne en maître pour les quelques pièces d’habillage, qu’elles soient colorées ou non. Tant pis pour le côté bas de gamme.', '/content/img/livewire.jpg'),
(15, 'Street Bob', 'Cruiser', 'Harley Davidson', 15690, '5.21', 'Avec son Street Bob 2010, Harley-Davidson continue de faire vivre cette machine apparue il y a 4 ans dans la gamme. H-D lui apporte des petites touches destinées à tendre vers le Street Bob idéal. En effet, Harley-Davidson semble avoir pris en considération les remarques des premiers propriétaires sur des détails de style. Ils ne semblent pas nombreux si on se contente d\'une vue d\'ensemble de cette Dyna, mais lorsqu\'on s\'attarde un peu sur les détails, on remarque rapidement que ceux-ci sont essentiels dans l\'allure générale de ce Street Bob.', '/content/img/StreetBob.jpg'),
(16, 'Fat Boy', 'Cruiser', 'Harley Davidson', 24190, '5.5', 'Il fallait oser. Et Harley a osé. Le faciès de cette Fat Boy en secouera plus d\'un. Toujours capoté, le phare bascule clairement dans le modernisme. Avec un léger souvenir de Suzuki VZR 1800 Intruder. Un souffle d\'impertinence qui n\'a effleuré que la fourche, laissant l\'ensemble de la silhouette dans sa confortable ouate de conformisme. Un zeste quand même pour les jantes, fortes d\'une prestance façon muscle-car américaine. Ses pneus deviennent monstrueux : 240 à l\'arrière, et un 160 à l\'avant - le plus large jamais monté sur une H-D de série. Autrefois monture de Terminator, la Fat Boy se siérait de mieux dans Fast & Furious.', '/content/img/FatBoy.jpg'),
(17, 'CMX500 Rebel', 'Cruiser', 'Honda', 6799, '3.7', 'Pas facile d\'être Rebel par les temps qui courent, mais Honda a trouvé la solution. Un bobber sympa et compatible avec le permis A2, un comportement agréable et une facilité de tous instants sont alliés à une hauteur de selle minimale et un équipement simple. Pour 2020, c\'est d\'ailleurs celui-ci qui fait un pas en avant.', '/content/img/CMX500.jpg'),
(18, 'Africa Twin', 'Tout-Terrain', 'Honda', 14499, '5.26', 'Pour sa nouvelle Africa Twin CRF 1000 L, Honda est parti d’une feuille blanche. Les ingénieurs n’ont pas retenu la solution du bicylindre en V, comme sur la première génération d’Africa Twin XRV 650 et 750 cm3, mais un bloc bicylindre vertical (parallèle). A cela, deux motivations : tout d’abord limiter le poids, l’encombrement et centraliser les masses ; ensuite, Honda a conçu ce moteur avec une notion de plate forme car il équipera d’autres motos à l’avenir. De fait, ce moteur a été développé avec la contrainte de convenir parfaitement au concept de l’Africa Twin CRF 1000 L tout en pouvant être adapté à des modèles futurs via quelques aménagements (performances, comportement, évolution de la transmission…). Pour limiter son poids et son encombrement, ce bloc adopte une culasse avec une distribution de type Unicam (un seul arbre à cames en tête mais quatre soupapes par cylindre) comme sur les modèles cross CRF. La culasse se voit donc sensiblement allégée et réduite côté encombrement.', '/content/img/AfricaTwin.jpg'),
(19, 'CB500X', 'Tout-Terrain', 'Honda', 6999, '3.32', 'La CB500X est la déclinaison « trail routier » du roadster emblématique CB500F et évolue cette année en moteur, en équipement et en présentation, mais aussi en philosophie pour apporter une réponse concrète et particulièrement recevable pour les nouveaux permis A2 avides d’Aventure, mais objectivement de grande polyvalence et d’aspects pratiques.\r\n', '/content/img/CB500X.jpg'),
(20, 'GSX-S750', 'Roadster', 'Suzuki', 8999, '5.91', 'Le roadster mid-size du constructeur d’Hamamatsu se voit donc débaptisé pour 2017 : de GSR, il devient GSX-S, comme ses grandes sœurs 1000 cm3 sorties en 2015 (GSX-S 1000 S et GSX-S 1000 F). En bonne et légitime héritière des gènes de Gex. La nouvelle GSX-S 750 reprend la bonne base de la GSR 750, sortie tout début 2011 et qui a remporté un franc succès dans l’Hexagone. Nombreuses sont les évolutions qui devraient lui offrir une seconde jeunesse. ', '/content/img/GSX-S750.jpg'),
(21, '890 DUKE R', 'Roadster', 'KTM', 11900, '5.9', 'Toujours aussi maniable, mais encore plus puissante, la KTM 890 DUKE R prend le meilleur de ce que nous apprécions dans la KTM 790 DUKE en allant encore plus loin. C’est une naked bike de poids intermédiaire qui ne fait aucun compromis, aussi à l’aise sur une route de montagne que sur un circuit ; elle offre plus de puissance et de couple que toutes les autres bicylindres parallèles précédentes, tout en étant encore plus DUKE. ', '/content/img/890DukeR.jpg'),
(22, '690 SMC R', 'Tout-Terrain', 'KTM', 11099, '5.64', 'La KTM 690 SMC R met la barre haute pour les adeptes des supermotos. Châssis léger, moteur LC4 légendaire et électronique de pointe laissent place à un large sourire et une montée subite d’adrénaline dès que tu exploites l’incroyable potentiel de glisse de cette machine sur l’asphalte, les routes de montagne ou les pistes sinueuses. Sa maniabilité a encore été renforcée grâce aux toutes dernières suspensions WP APEX entièrement réglables. Tu peux donc te concentrer entièrement sur la route et taquiner sans crainte la zone rouge.', '/content/img/690SMCR.jpg'),
(23, '1290 Super Duke RR', 'Sportive', 'KTM', 24899, '6.18', 'Inspirée du dernier PROTOTYPE KTM 1290 SUPER DUKE R, la KTM 1290 SUPER DUKE RR est la définition même du concept READY TO RACE. Allégée de 9 kilos par rapport à la KTM 1290 SUPER DUKE R standard, affichant un rapport poids/puissance de 1:1 et dotée d’une carrosserie ultraexclusive et légère en fibre de carbone, la KTM 1290 SUPER DUKE RR s’est renouvelée tout en restant THE BEAST et en se montrant encore plus menaçante.  ', '/content/img/1290Super.jpg'),
(24, 'T12 Massimo', 'Sportive', 'Tamburini', 807500, '9', 'Décédé en 2014, le célèbre designer italien fait encore parler de lui deux ans quasiment jour pour jour après sa mort. Pour preuve, voilà son dernier rêve exaucé au travers de cette T12 Massimo, un prototype de 154,5 kilos à sec pour plus de 230 chevaux…', '/content/img/T12Massimo.jpg'),
(25, 'Niken', 'Routière', 'Yamaha', 16299, '4.22', 'La Yamaha Niken est plus impressionnante dans la réalité que sur les vidéos de communication ou reportages vus sur le net. La largeur de la face avant est étonnante. Elle est soulignée par les tubes de fourche inversée d’un bleu étincelant. La largeur s’explique en jetant un coup d’œil sous le bloc optique. C’est là que la technologie multi-essieux directeurs (LMW, en anglais) prend place. Ce système permet une prise d’angle jusqu’à 45 degrés, selon Yamaha. Le parallélogramme de la direction remonte très haut. Cela lui donne sûrement de la rigidité, et en faisant bras de levier augmente la solidité en diminuant la taille des pièces. Le poids en l’air ne se trouve pas plus important. Ses éléments bleu métallisé sont superbes et leur diamètre frappe l’œil. Le bleu est repris au niveau des jantes.', '/content/img/Niken.jpg'),
(26, 'XSR700', 'Roadster', 'Yamaha', 8999, '4.14', 'La mode Vintage battant son plain, Yamaha ne poursuit le développement de sa gamme Sport Heritage et va chercher l\'inspiration dans sa riche histoire : c\'est ainsi la XT 500 qui donne le \"la\" à cette XSR 700 recarrossée en XTribute. Le parallèle entre les deux modèles à beau être assez lointain, Yamaha a restylé son roadster rétro avec un certain talent : en effet, la peinture grise à filet noir et rouge, comme à l\'époque, les jantes dorées, le logos et lettrages sont des références affirmées à l\'ancêtre. On continue avec les détails : clignotants orangés pour faire plus vintage, guidon plus haut, selle spécifique, soufflets de fourche, repose-pieds crantés et pneus Pirelli MT-60 RS parachèvent le look. Un échappement Akrapovic optionnel, en position haute, donne la touche finale au look scrambler.', '/content/img/XSR700.jpg'),
(27, 's1000R', 'Roadster', 'BMW', 14980, '6.32', 'ne odeur d\'essence flotte dans l\'air. Un moteur monte en régime. Puissance brute de décoffrage. La nouvelle BMW S 1000 R entre en scène ! Roadster musclé à l\'extérieur, ADN de superbike à l\'intérieur. Car son châssis et son moteur ont les gènes d\'une RR. Ultra-agile, ultra-précise. 165 ch pour 195 kg. Une machine encore plus sophistiquée, encore plus offensive que la précédente version. Disponible pour la première fois avec le pack M en option, le coloris M et les roues en carbone M. #NeverStopChallenging.', '/content/img/S1000r.jpg'),
(28, 'Ninja H2', 'Sportive', 'Kawasaki', 25199, '8.5', 'C’est la moto la plus folle que la Terre ait jamais portée. 357 km/h en vitesse de pointe d’origine, 50 000 euros, carénage en carbone, ailerons aérodynamiques pour la plaquer au sol, compresseur… C’est la chose avec deux roues la plus rapide que vous pouvez vous offrir. Sauf qu’elle n’est évidemment pas homologuée pour la route. Raison pour laquelle la H2 existe : c’est une version bridée de la H2R, accessible à n’importe qui ayant un permis A. Tout simplement.', '/content/img/NinjaH2.jpg'),
(29, 'Diavel 1260 S', 'Cruiser', 'Ducati', 23990, '5.4', 'La Diavel S pense sérieusement à la sportivité avec des étriers de frein Brembo M50 et un shifter Up&Down. A une touche de classe supplémentaire avec un insert sur la selle et une signature lumineuse DRL dans le phare. A de l\'interactivité avec un système multimédia embarquée. Une fois le smartphone en accord avec la Diavel, l\'utilisateur peut gérer depuis la moto ses appels, textos et sa musique.\r\nCoté électronique, Diavel et Diavel S sont autant fournis l\'une que l\'autre, avec régulateur de vitesse, 3 modes de conduite, 4 modes d\'affichage au tableau de bord, 3 modes de puissance, ABS cornering, commodos rétro-éclairés, contrôle de traction, anti-wheeling, démarrage sans clé, assistant au départ arrêté, unité de mesure inertielle (I.M.U) Bosch à 6 axes, écran couleur TFT de 3,5 pouces et clignos à arrêt automatique.', '/content/img/Diavel.jpg'),
(30, 'SCRAMBLER 800', 'Roadster', 'Ducati', 9650, '5.2', 'Le Scrambler est solidement implanté dans l\'escarcelle Ducati, riche de multiples déclinaisons ; et dispo en deux cylindrées. Le temps de l\'évolution n\'épargne pas cette catégorie « néo-classic ». Aussi le 800 Icon a pris le parti de procéder à quelque évolution après quatre ans de joyeuseté et de fraicheur motocycliste. Point d\'audace, gaffe à l\'allure, pour la paix des Ducatistes, la marque préserve la sinécure.\r\n\r\nOn dirait que le Scrambler a atteint le stade de son surnom, icône. Ducat\' n\'a pas osé retoucher le design, et semble presque avoir eu peur de changer quoi que ce soit. OK, on préserve la ligne et la légèreté qui font le succès de cette bécane mais.... Mais une petite prise de risque, façon véliplanchiste qui passe au kitesurf, n\'aurait certainement pas déplu. Croisons les yeux et les générations pour débusquer les traits de différences.', '/content/img/Scrambler800.jpg'),
(31, '1100 Panigale V4', 'Sportive', 'Ducati', 23590, '7.6', 'La Panigale V4 attaque sa 4ème année sans perdre une once de son aura. Elle demeure fascinante, d\'un niveau de puissance et d\'efficacité exceptionnels. En plus, elle est magnifique. La norme Euro5 lui arrive dessus ; elle la gobe comme si de rien n\'était. Elle s\'est juste équipée pour satisfaire la norme.', '/content/img/Panigale.jpg'),
(32, 'Multistrada', 'Tout-Terrain', 'Ducati', 19590, '6.5', 'Ducati a repoussé les limites de la motorisation V2 pendant des décennies. Mais maintenant, c’est le V4 qui devient sa mécanique de haut pedigree. Après avoir enflammé la furie sur les Panigale et les Streetfighter, cette architecture imprègne la lignée Multistrada. Toujours plus puissante... Ce serait tellement simple de résumer ainsi l’évolution de la MTS. Ce ne sera pas encore le cas avec la Multistrada V4. Un modèle d’une nouvelle ère, ne reprenant que le concept et l’aspect des anciennes générations. Car techniquement, tout a été chamboulé.', '/content/img/Multistrada.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `num` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `crypto` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_utilisateurs` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateurs` (`id_utilisateurs`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id`, `nom`, `num`, `date`, `crypto`, `id_utilisateurs`) VALUES
(51, 'aymaneafd', '4444444444444444', '4444', '444', 75);

-- --------------------------------------------------------

--
-- Structure de la table `commande_hist`
--

DROP TABLE IF EXISTS `commande_hist`;
CREATE TABLE IF NOT EXISTS `commande_hist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int NOT NULL,
  `id_articles` int NOT NULL,
  `quantité` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `heure` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateurs` (`id_utilisateurs`),
  KEY `id_articles` (`id_articles`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande_hist`
--

INSERT INTO `commande_hist` (`id`, `id_utilisateurs`, `id_articles`, `quantité`, `date`, `heure`) VALUES
(146, 73, 19, '1', '.10-05-21.', '.04:31:04.'),
(145, 73, 2, '2', '.10-05-21.', '.04:31:04.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `type`, `password`) VALUES
(75, 'aymaneafd', 'aymaneafd@gmail.com', 'user', '$2y$12$BYVeWsx4qLhtE/nRdroBauWufoWHMQLCw04Gb7U1waaoMeC.S.tPy'),
(68, 'aymane', 'aymane@gmail.com', 'admin', '$2y$12$B63.WLF8IImste3CInzn1OJ2OfeB59R6lKudeCS6irgnhD576Cx7C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
