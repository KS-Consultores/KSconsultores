<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'ksc_website');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'ksc_website');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'xEhpQ[78pS6p@)q');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '/}cH7|7w)bsCEWx6LBfq8K|~$R(sy:t~uIQj8$S:o=kOfLIcVi[j@A$|2k^ZqU)a');
define('SECURE_AUTH_KEY', 'D|u!KR2<3$n>$2LKm!r.-Mt0++1H|?^TH)mm=/z2Xuf(5p>@W}z?riLNi7S]uuvB');
define('LOGGED_IN_KEY', '> })}*rCb$f)@a#c!(-(bMcTI J~p3sGC-V3NB:e;GEY8h}dv{73i!g5jDG4=-ae');
define('NONCE_KEY', 'vOj?$7]n/{I3SQq!IG9_:ywU)7$*Lyy9aolm8Rc_%KkOg~gq]Rirb k=1r>~G#$=');
define('AUTH_SALT', '8SLU$n$}|Q:WH?!BWVl{m=+<P!4bC[*ee8n@.w%I[<YiQAJ:_$6MIF8@@)eaQ>O.');
define('SECURE_AUTH_SALT', 'H5p-J+gbX|q_@mC+_C#45F-ZE4Lj:++m[/PdG&:t_?vq>9~R)-GaW|/(q|vMPuja');
define('LOGGED_IN_SALT', '8|uw+ND/q>QAA.lt{4K0=T(Joc~!g/.j-MaIJ;QXBS1uqS{QAQNuM3|%5twWe]DT');
define('NONCE_SALT', '@_a8]c>E<1ws`vH662U}|dlZVe&zdQ%d7g|{Tc[]Ocssd!_,)tzW)uKq>,Jil._b');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'ks_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

