-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 août 2023 à 20:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `image_profil`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$MwkfWZ5NF74xX6PPdEdb5.s/qgDZb62xLqGG558KM46qK9xJ9HlDK', 'Pascal', 'Adechinan', 'customers_images/pacco.png');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_predesc` varchar(800) NOT NULL,
  `blog_description` varchar(5000) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_predesc`, `blog_description`, `blog_image`, `blog_date`, `blog_author`) VALUES
(1, 'La montre Rolex : l\'essence du luxe et de la qualité horlogère', 'La montre Rolex est l\'une des marques les plus célèbres et les plus prestigieuses de l\'industrie horlogère. Depuis plus d\'un siècle, les montres Rolex ont été synonymes de qualité, de fiabilité et de style. La marque a été fondée en 1905 par Hans Wilsdorf et son beau-frère Alfred Davis à Londres, sous le nom de \"Wilsdorf and Davis\".', 'La montre Rolex est l\'une des marques les plus célèbres et les plus prestigieuses de l\'industrie horlogère. Depuis plus d\'un siècle, les montres Rolex ont été synonymes de qualité, de fiabilité et de style. La marque a été fondée en 1905 par Hans Wilsdorf et son beau-frère Alfred Davis à Londres, sous le nom de \"Wilsdorf and Davis\". Elle a ensuite été renommée Rolex en 1908 et est devenue une entreprise suisse en 1919. Aujourd\'hui, Rolex est une marque de montres de luxe internationale qui est reconnue dans le monde entier pour ses montres haut de gamme et ses innovations.  La montre Rolex est réputée pour sa qualité de fabrication, son design intemporel et sa précision. Les montres Rolex sont fabriquées à partir des matériaux les plus nobles, tels que l\'or, le platine, l\'acier inoxydable et les diamants, et sont équipées de mouvements mécaniques de haute qualité. Chaque montre Rolex est fabriquée à la main avec un soin méticuleux pour assurer la qualité et la fiabilité.  La marque Rolex propose une large gamme de modèles, chacun avec son propre style et sa propre fonctionnalité. Les montres Rolex sont souvent associées aux sports et aux activités de plein air, mais elles sont également très populaires auprès des hommes et des femmes d\'affaires en raison de leur élégance intemporelle. Les montres Rolex sont disponibles en différentes tailles et couleurs, avec des bracelets en cuir, en acier inoxydable ou en or.  Les montres Rolex sont également connues pour leur valeur durable. Les montres Rolex ont tendance à conserver leur valeur au fil du temps, voire à augmenter de valeur. Les montres Rolex sont souvent considérées comme un investissement judicieux car elles sont fabriquées à partir de matériaux de haute qualité et sont extrêmement durables. En outre, Rolex est une marque très recherchée, ce qui signifie que les montres Rolex sont souvent vendues à un prix élevé sur le marché de la revente.  Les montres Rolex ont également une longue histoire d\'innovation. Rolex a été la première entreprise à créer une montre étanche en 1926 avec la création de la Rolex Oyster. Depuis lors, Rolex a continué à innover avec des fonctionnalités telles que les complications chronométriques, les lunettes tournantes et les mouvements automatiques.  En conclusion, la montre Rolex est l\'un des symboles les plus prestigieux de l\'industrie horlogère. Les montres Rolex sont réputées pour leur qualité de fabrication, leur design intemporel et leur précision. Les montres Rolex sont disponibles dans une variété de styles et de fonctionnalités pour convenir à chaque personne. En raison de leur qualité durable, les montres Rolex sont souvent considérées comme un investissement judicieux. Avec leur longue histoire d\'innovation, il n\'est pas étonnant que Rolex soit l\'une des marques de montres les plus respectées et les plus connues dans le monde entier.', '../blog_images/Montre4.jpg', '2023-04-29 10:37:56', 'Pacca'),
(2, 'Le T-shirt Dior : l\'alliance de l\'élégance et du confort en toute simplicité', 'Le T-shirt est un vêtement universel, simple et pratique. Mais lorsqu\'il est associé à une marque prestigieuse comme Dior, il devient un symbole de mode et de luxe. Le T-shirt Dior est un classique intemporel qui incarne parfaitement l\'alliance de l\'élégance et du confort.', 'Le T-shirt est un vêtement universel, simple et pratique. Mais lorsqu\'il est associé à une marque prestigieuse comme Dior, il devient un symbole de mode et de luxe. Le T-shirt Dior est un classique intemporel qui incarne parfaitement l\'alliance de l\'élégance et du confort. Dans ce blog, nous allons explorer l\'histoire du T-shirt Dior, sa qualité exceptionnelle et les raisons pour lesquelles il est considéré comme un incontournable de la garde-robe.  Le T-shirt Dior a été introduit pour la première fois en 1955 par le créateur de mode français Christian Dior. À l\'époque, les T-shirts étaient considérés comme des vêtements de travail ou de sport, mais Dior a décidé d\'ajouter une touche de sophistication à cette pièce de base en y apposant son logo. Depuis lors, le T-shirt Dior est devenu un incontournable de la mode de luxe.  L\'une des caractéristiques les plus remarquables du T-shirt Dior est sa qualité exceptionnelle. Chaque T-shirt est fabriqué à partir de coton 100% biologique, ce qui garantit un confort optimal tout en préservant l\'environnement. Le T-shirt Dior est également doté de finitions impeccables, telles que des coutures parfaitement alignées et des ourlets soignés, qui reflètent la maîtrise de l\'artisanat français.  Le T-shirt Dior est également très polyvalent et peut être porté de différentes manières. Il peut être associé à un pantalon habillé pour un look décontracté-chic, ou porté avec un jean pour un style plus décontracté. Le T-shirt Dior est également disponible en différentes couleurs et motifs, ce qui permet de l\'adapter à toutes les occasions et tous les goûts.  Enfin, le T-shirt Dior est devenu un véritable objet de collection pour les amateurs de mode. Avec son logo emblématique, le T-shirt Dior est devenu un symbole de luxe et de prestige. Les éditions limitées et les collaborations avec d\'autres marques de mode font du T-shirt Dior un objet de désir pour les collectionneurs.  En conclusion, le T-shirt Dior est un vêtement iconique qui allie élégance et confort. Fabriqué à partir de matériaux de qualité supérieure, le T-shirt Dior est un incontournable de la garde-robe qui peut être porté de différentes manières pour s\'adapter à tous les styles. En tant qu\'objet de collection, le T-shirt Dior est un symbole de luxe et de prestige qui a su conquérir les amateurs de mode du monde entier.', '../blog_images/jolie-femme-tshirt.jpg', '2023-04-29 10:38:09', 'Leonaldo'),
(4, 'Rapport d\'activité de la journée 25/04/2023', 'Au cours de la journée du 25/04/2023 j\'ai continué dans la programmation d\'une plateforme de boutique en ligne. Du côté de Dashboard de l\'administrateur j\'ai implémenté les fonctionnalité suivantes:', 'Au cours de la journée du 25/04/2023 j\'ai continué dans la programmation d\'une plateforme de boutique en ligne. Du côté de Dashboard de l\'administrateur j\'ai implémenté les fonctionnalité suivantes: supprimer un produit préalablement ajouté; modifier les informations d\'un produit et l\'enregistrer; supprimer une catégorie de produit préalablement ajouté; modifier les informations d\'une catégorie de produit; ajouter, supprimer et modifier les informations d\'un coupon de réduction d\'achat.\r\n\r\nDu côté des clients j\'ai réalisé la page permettant au client de se connecter et la page pour s\'enregistrer.\r\n\r\nEnsuite j\'ai créé dans la base de données un table \"customers\" qui va me permettre d\'enregistrer les clients souhaitant s\'abonner à la boutique à travers leurs mail, nom complet, sexe, adresse, ville, département, pays de résidence, code postale et un mot de passe leurs permettant de se connecter de façcon unique.\r\n\r\nEnfin j\'ai implémenter la fonctionnalité qui va me permettre de stocker dans la base de données les informations des clients récupérées dans la page signup.php. Avec la fonction add_customer() j\'ai récupérer les informations du client dans des variable, j\'ai haché le mot de passe du client avec l\'option SA-256 de la fonction hash(): hash(\"sa256\", $password).', '../blog_images/blog_wordpress.jpg', '2023-04-29 10:38:20', 'Pascal'),
(5, 'Sac', 'Sac', 'Sac', '../blog_images/sac1.jpg', '2023-05-03 13:17:37', 'PAcca');

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Christian Dior'),
(2, 'Adiddas'),
(3, 'Nike'),
(4, 'Gucci'),
(5, 'Balanciaga');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_address`, `quantity`) VALUES
(5, '::1', 1),
(3, '::1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'T-Shirt'),
(2, 'Pantalon-Tissu'),
(3, 'Chemise longue'),
(4, 'Sac-sortie'),
(5, 'Basket'),
(6, 'Accessoire-habillement');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` varchar(900) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_percentage` varchar(255) NOT NULL,
  `coupon_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_title`, `coupon_percentage`, `coupon_author`) VALUES
(1, 'ADECHINAN', '0.13', 'Adechinan Léonaldo'),
(2, 'ODJO', '0.24', 'Johnson Odjo'),
(3, 'Ram24', '0.11', 'Ramadane Oyedekpo');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `complete_name` varchar(400) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `address` varchar(400) NOT NULL,
  `city` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `email`, `complete_name`, `profile_image`, `sexe`, `address`, `city`, `department`, `country`, `zip_code`, `phone`, `password`, `date`) VALUES
(1, 'adechinanpascal@gmail.com', 'Pascal Léonaldo Adechinan', 'customers_images/pacco.png', 'Homme', 'Rue Bidossessi, Pharmacie La Fleuve', 'Abomey-Calavi', 'Atlantique', 'Bénin', '2020', '+22951954404', '$2y$10$lDhkI4Nz3WeqeA1uNWG9WuCYsSKK873cze1qqlIdBV1Z1OnVOmkbu', '2023-05-02 11:10:21'),
(2, 'francisdele@gmail.com', 'Francis Bamidele', 'customers_images/mr dele.jpg', 'Homme', 'Rue Tankpè', 'Abomey-Calavi', 'Atlantique', 'Bénin', 'BP 290', '+22966776778', '$2y$10$vzw7sj8VH0ZfzKSNXoqwJOWx6DXhbqwEIbQfoYnNgPldcqkyWopiS', '2023-04-29 11:18:15'),
(3, 'charlotte@gmail.com', 'Charlotte Dipanda', 'customers_images/charlotte.jpg', 'Femme', 'Rue Paris', 'Paris', '5e Département', 'France', 'BF 098', '+330167876545', '$2y$10$KJK4gBPxkMWnIXNNjzKHdOFGGUf8DzltiUKxmF4EMFMe1dI69DhFm', '2023-04-29 11:19:55'),
(4, 'elisabeth@gmail.com', 'Elisabeth Kin', 'customers_images/miranda.jpg', 'Femme', 'Rue barcelone', 'Barcelone', 'Qatar', 'Espagne', 'BP 290', '+237898742331', '$2y$10$bJuocvCTFjLaPxKbGyQWze0jGL2ILgDc/h83eEReOnF45OFQJ6a8K', '2023-04-29 11:21:42'),
(5, 'jeandupont@gmail.com', 'Jean Dupont', 'customers_images/istockphoto-1364842586-612x612.jpg', 'Homme', 'Rue Nice', 'Nice', '9e Département', 'France', 'BF 098', '+330909876543', '$2y$10$PTCII5QhNBFEiv267PCbcuw.KQJQhNne2EHqI3x4BS3O7O1oQn8fe', '2023-04-29 11:22:59'),
(6, 'karamath@gmail.com', 'Karamath Odjemi', 'customers_images/client1.jpg', 'Femme', 'Rue ceg2 Savè', 'Savè', 'Collines', 'Bénin', '150', '+22966776778', '$2y$10$8HlQiubfyd7bWET0jkl0EuTazhgh2or20WKh/.hhoLHoCHDvc4PYu', '2023-04-29 11:24:43'),
(7, 'viviane@gmail.com', 'Viviane Keita', 'customers_images/dodo.jpg', 'Femme', 'Rue bamako', 'Bamako', 'Bamako', 'Mali', 'BP 1050', '+237898742331', '$2y$10$huujyY6UabsyinCaa3dJQe88gUDPVBTI4qBFc6CP.J5u9hJZqqz0u', '2023-04-29 11:26:23'),
(8, 'roseline@gmail.com', 'Roseline Akin', 'customers_images/fouette.jpg', 'Femme', 'Rue Ondo', 'Ondo', 'Ondo State', 'Nigéria', 'BN 890', '+2347899876543', '$2y$10$8NJYdnw/cKwAdfprQasotuiutUfga8w6IBeH.RfRl6qWojwryxqt6', '2023-04-29 11:28:14'),
(9, 'miranda@gmail.com', 'Mirando Gankpo', 'customers_images/choco.jpg', 'Femme', 'Rue cotonou', 'Cotonou', 'Littoral', 'Bénin', 'BP 333', '+22965656453', '$2y$10$IKyYs/fV.jlQKZloWViAZeYy2NXFYB/T5.r/4Yu5N7CwZ3uMERyTG', '2023-04-29 11:29:56');

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `blog_id`, `ip_address`) VALUES
(2, 1, '::1'),
(3, 2, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_number` varchar(255) NOT NULL,
  `product_list` varchar(900) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `total_unique` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `total_coupon` varchar(255) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(900) NOT NULL,
  `customer_zipcode` varchar(100) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `facturation_address` varchar(900) NOT NULL,
  `name_card` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_cvv` varchar(255) NOT NULL,
  `date_expiration_card` varchar(255) NOT NULL,
  `facturation_address_card` varchar(900) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'En cour',
  `payment` varchar(255) NOT NULL DEFAULT 'Inpaye'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `product_number`, `product_list`, `coupon`, `total_unique`, `shipping`, `total_coupon`, `total_price`, `customer_id`, `customer_name`, `customer_email`, `customer_address`, `customer_zipcode`, `customer_phone`, `facturation_address`, `name_card`, `card_number`, `card_cvv`, `date_expiration_card`, `facturation_address_card`, `date`, `status`, `payment`) VALUES
(1, '4', '<br><br><strong> 1-</strong>  T-Shirt Cowboy <br>    Prix Unitaire : $128 <br>     Quantité : 1 <br>    Prix total produit : $128<br><br><strong> 2-</strong>  Montre Rolex <br>    Prix Unitaire : $500 <br>     Quantité : 1 <br>    Prix total produit : $500<br><br><strong> 3-</strong>  Jordan Air <br>    Prix Unitaire : $98 <br>     Quantité : 1 <br>    Prix total produit : $98<br><br><strong> 4-</strong>  Chemise Manche longue <br>    Prix Unitaire : $166 <br>     Quantité : 1 <br>    Prix total produit : $166', '0.13', '892', '35', '115.96', '811.04', 3, 'Charlotte Dipanda', 'charlotte@gmail.com', 'Rue Paris, Paris, 5e Département, France', 'BF 098', '+330167876545', 'Rue Paris, Paris, 5e Département, France', 'ADECHINAN ADEDOYIN', '5678-6542-1324-6666', '121', '12-11', 'Rue Paris, Paris, 5e Département, France', '2023-05-02 14:34:46', 'Livrer', 'Paye'),
(3, '2', '<br><br><strong> 1-</strong>  T-Shirt Cowboy <br>    Prix Unitaire : $128 <br>     Quantité : 1 <br>    Prix total produit : $128<br><br><strong> 2-</strong>  Chemise Manche longue <br>    Prix Unitaire : $166 <br>     Quantité : 1 <br>    Prix total produit : $166', '0', '294', '35', '0', '329', 1, 'Pascal Léonaldo Adechinan', 'adechinanpascal@gmail.com', 'Rue Bidossessi Abomey-Calavi, Atlantique, Bénin', '2020', '+22951954404', 'Rue Bidossessi, à 50 mètres de L\'ONG BIDOSSESSI / AbomeyCalavi, Bénin, Abomey-Calavi, Atlantique, Bénin', 'ADECHINAN PASCAL', '1234-2425-6666-7899', '898', '01-01', 'Rue Bidossessi, à 50 mètres de L\'ONG BIDOSSESSI / AbomeyCalavi, Bénin, Abomey-Calavi, Atlantique, Bénin', '2023-05-02 11:11:44', 'En cour', 'Inpaye'),
(4, '2', '<br><br><strong> 1-</strong>  Chemise Manche longue <br>    Prix Unitaire : $166 <br>     Quantité : 1 <br>    Prix total produit : $166<br><br><strong> 2-</strong>  Sac en cuir <br>    Prix Unitaire : $223 <br>     Quantité : 1 <br>    Prix total produit : $223', '0.13', '389', '35', '50.57', '373.43', 4, 'Elisabeth Kin', 'elisabeth@gmail.com', 'Rue barcelone, Barcelone, Qatar, Espagne', 'BP 290', '+237898742331', 'Rue barcelone, Barcelone, Qatar, Espagne', 'ELISABATH KIN', '8987-7890-24565-7867', '111', '01-23', 'Rue barcelone, Barcelone, Qatar, Espagne', '2023-05-02 10:56:46', 'En cour', 'Inpaye'),
(5, '1', '<br><br><strong> 1-</strong>  T-Shirt Cowboy <br>    Prix Unitaire : $128 <br>     Quantité : 1 <br>    Prix total produit : $128', '0', '128', '35', '0', '163', 5, 'Jean Dupont', 'jeandupont@gmail.com', 'Rue Nice, Nice, 9e Département, France', 'BF 098', '+330909876543', 'Rue Nice, Nice, 9e Département, France', 'JEAN DUPONT', '5759-7815-7121-6789', '221', '02-22', 'Rue Nice, Nice, 9e Département, France', '2023-05-02 16:01:06', 'Livrer', 'Paye'),
(6, '2', '<br><br><strong> 1-</strong>  T-Shirt Cowboy <br>    Prix Unitaire : $128 <br>     Quantité : 1 <br>    Prix total produit : $128<br><br><strong> 2-</strong>  Montre Rolex <br>    Prix Unitaire : $500 <br>     Quantité : 1 <br>    Prix total produit : $500', '0.13', '628', '35', '81.64', '581.36', 6, 'Karamath Odjemi', 'karamath@gmail.com', 'Rue ceg2 Savè, Savè, Collines, Bénin', '150', '+22966776778', 'Rue ceg2 Savè, Savè, Collines, Bénin', 'ODJEMI KARAMATH', '6767-5442-7665-1112', '788', '07-12', 'Rue ceg2 Savè, Savè, Collines, Bénin', '2023-05-02 11:01:46', 'En cour', 'Inpaye'),
(7, '2', '<br><br><strong> 1-</strong>  Montre Rolex <br>    Prix Unitaire : $500 <br>     Quantité : 1 <br>    Prix total produit : $500<br><br><strong> 2-</strong>  Jordan Air <br>    Prix Unitaire : $98 <br>     Quantité : 1 <br>    Prix total produit : $98', '0', '598', '35', '0', '633', 7, 'Viviane Keita', 'viviane@gmail.com', 'Rue bamako, Bamako, Bamako, Mali', 'BP 1050', '+237898742331', 'Rue bamako, Bamako, Bamako, Mali', 'VIVIANE KEITA', '7656-6677-1256-0098', '219', '11-11', 'Rue bamako, Bamako, Bamako, Mali', '2023-05-02 17:40:17', 'Livrer', 'Paye'),
(8, '3', '<br><br><strong> 1-</strong>  Montre Rolex <br>    Prix Unitaire : $500 <br>     Quantité : 1 <br>    Prix total produit : $500<br><br><strong> 2-</strong>  Jordan Air <br>    Prix Unitaire : $98 <br>     Quantité : 1 <br>    Prix total produit : $98<br><br><strong> 3-</strong>  Sac en cuir <br>    Prix Unitaire : $223 <br>     Quantité : 1 <br>    Prix total produit : $223', '0.13', '821', '35', '106.73', '749.27', 8, 'Roseline Akin', 'roseline@gmail.com', 'Rue Ondo, Ondo, Ondo State, Nigéria', 'BN 890', '+2347899876543', 'Rue Ondo, Ondo, Ondo State, Nigéria', 'ROSELINE AKIN', '2727-6716-0909-8911', '900', '12-01', 'Rue Ondo, Ondo, Ondo State, Nigéria', '2023-05-02 11:05:57', 'En cour', 'Inpaye');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(900) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'T-Shirt Cowboy', 'Ce produit est une invention de la marque Dior pour les amoureux de style de cowboy.', 'T-Shirt, Dior, Tenu', 1, 1, 'f1.jpg', 'f3.jpg', 'f4.jpg', '128', '2023-04-27 11:25:58', 'true'),
(2, 'Chemise Manche longue', 'Le potentiel d’un blog pour une entreprise ou un particulier n’est pas à négliger. Le terme « blog » a beaucoup évolué depuis sa création et ses premiers usages. On pourrait aujourd’hui surtout assimiler cela à une publication d’articles sur un site web, qu’il soit dédié à ce blog ou non. Intérêts commerciaux, monétisation, développement de compétences ou référencement naturel, la création d’un blog peut vous amener à beaucoup d’opportunités qu’il est important de considérer pour votre marketing digital.', 'Chemise longue, T-Shirt', 3, 4, 'n1.jpg', 'n2.jpg', 'n3.jpg', '166', '2023-04-25 08:40:06', 'true'),
(3, 'Sac en cuir', 'Vous souhaitez télécharger des produits dans votre boutique WooCommerce avec un professionnel hautement expérimenté et qualifié ? Alors vous êtes au bon endroit ! Nous téléchargerons des produits dans votre boutique WooCommerce avec la plus grande précision. ', 'Sac-sortie, sac, femme, accessoire, habillement', 4, 4, 'sac1.jpg', 'sac2.jpg', 'sac3.jpg', '223', '2023-04-25 08:45:20', 'true'),
(4, 'Montre Rolex', 'Avez-vous besoin d\'un document Microsoft Word bien conçu et correctement formaté qui vous aide à mettre en évidence les informations vitales ? Vous êtes au bon endroit ! Nous sommes là pour vous aider à atteindre vos objectifs. Nous allons effectuer la mise en page de votre document Microsoft Word pour vous démarquer, vous aidant à obtenir l\'éclat souhaité pour votre document. Nous disposons d’une équipe hautement qualifiée et très dynamique pour ce projet.', 'Montre, Rolex, Accessoire-habillement', 6, 2, 'Montre3.jpg', 'Montre2.jpg', 'Montre4.jpg', '500', '2023-04-25 08:49:53', 'true'),
(5, 'Jordan Air', 'Elementor est un constructeur de pages visuels qui est considéré par plus de 11 millions de sites Web. Mais il peut s\'agir d\'un outil de test nerveux pour les débutants sans antécédents éprouvés. Les résultats possibles pourraient être une vitesse lente, une mauvaise optimisation ou une conception incohérente. Nous pouvons vous aider à l’éviter grâce à l’expertise en Elementor pro de notre équipe. Créer des pages de votre site Web comme vous le souhaitez ! Exprimez votre marque et conduisez d’avantage à votre entreprise avec des pages d’un site Web qui le dit de la bonne façon. Nous vous aiderons à créer des pages de site Web de votre rêve.', 'Basket, Chaussure', 5, 3, 'baskets-montantes-blanches-mode-chaussures-unisexes-removebg-preview.png', 'baskets-montantes-blanches-mode-chaussures-unisexes-removebg-preview.png', 'nouvelle-paire-baskets-blanches-isolated-on-white-removebg-preview.png', '98', '2023-04-25 11:13:15', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `sells`
--

CREATE TABLE `sells` (
  `sell_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sells`
--

INSERT INTO `sells` (`sell_id`, `order_id`, `price`, `date`) VALUES
(1, 1, '811.04', '2023-05-02 15:55:42'),
(2, 5, '163', '2023-05-02 16:07:58'),
(3, 7, '633', '2023-05-02 17:41:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sells`
--
ALTER TABLE `sells`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
