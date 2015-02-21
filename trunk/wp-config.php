<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'db559310345');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'dbo559310345');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Denys177Ioppie');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'db559310345.db.1and1.com');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9|v_cI(Bu9-oek{gW=~v8I^xD7/d:I4$gG|tDZkweAV3_x1j]-u#8Qc%:7=.+u3d');
define('SECURE_AUTH_KEY',  '-`VWkSZ$UY=3Htg7yN1))} ri1lVRqd=`*_xoBYVK|JsHJ]4[/?G4B80,s30 bD%');
define('LOGGED_IN_KEY',    '$|HhtN6=P5nIXITv[S`i2SU{_N!~9-&/@s[L?U]Pb6E;Tk!),r8x<PF&3+P|tE2S');
define('NONCE_KEY',        '`(MU-`d]lUfO+*H3B;nccfnv;12WHvqj} cW?_kN WPBu_&a)+]1B5HMySTS!C:(');
define('AUTH_SALT',        '8q^$N;s;(zwspu{K-O,C:<?!<K&EQ#fW^*%BYOg<|3:6&T1bne64C(Ro2be+=%/H');
define('SECURE_AUTH_SALT', 'q{Dm Es1-+wF$ INoxm9VlGe3%aYp)XSux v*,CxJ#V}Ku_CJ%d-p{=HkT|_O+rZ');
define('LOGGED_IN_SALT',   'gC0BQ%L<z3~MMi{,.8dEwrO?nxR3re<ei-*z]7EuI3u+MvZ<Dy[N}-7+ |o}Onm|');
define('NONCE_SALT',       '|bGO,zQ+5ZZ,dkT04i0S@xv0S>w~-|0gA}<W>r+m&ROI_`mF A{}!Lf<N{b4w:^v');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
