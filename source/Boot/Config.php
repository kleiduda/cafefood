<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "kesfInfoM45t3r@2014");
define("CONF_DB_NAME", "dbcurso");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.localhost/cafe");
define("CONF_URL_TEST", "https://www.localhost/cafe");
define("CONF_URL_ADMIN", "/admin");

/**
 * SITE
 */
define("CONF_SITE_NAME", "CafeFood");
define("CONF_SITE_TITLE", "Gerencie seus pedidos de forma tranquila, tão simples quanto tomar um café");
define("CONF_SITE_DESC", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "cafefood.com.br");
define("CONF_BLOG_DESC", "Descrição para o nosso blog");
/*ADDRESS*/
define("CONF_ADDR_STREET", "AV BATISTA MACIEL");
define("CONF_ADDR_NUMBER", "388");
define("CONF_ADDR_COMPLEMENT", "2 ANDAR SALA 10");
define("CONF_ADDR_CITY", "SÃO PAULO");
define("CONF_ADDR_STATE", "SP");
define("CONF_ADDR_ZIPCODE", "04450-110");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@robsonvleite");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@robsonvleite");
define("CONF_SOCIAL_FACEBOOK_APP", "626590460695980");
define("CONF_SOCIAL_FACEBOOK_PAGE", "kleiton");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "kleitofreitas");
define("CONF_SOCIAL_GOOGLE_PAGE", "107305124528362639842");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "103958419096641225872");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);


/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_THEME", "cafe");
define("CONF_VIEW_APP", "cafeadmin");
define("CONF_VIEW_EXT", "php");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "");
define("CONF_MAIL_SENDER", ["name" => "Kleiton Freitas", "address" => ""]);
define("CONF_MAIL_SUPPORT","kleiduda@gmail.com");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");