<?php
/**
 * GraphenePHP Configuration
 *
 * This file contains the configuration settings for the GraphenePHP framework.
 * It includes settings such as the application name, database connection details,
 * SMTP configuration for email, SEO settings, and more.
 *
 * @package GraphenePHP
 * @version 1.0.0
 */

$config = [
    'APP_NAME' => 'Smruthi App',
    'APP_TITLE' => 'Smruthi -  Read Ramayanam & Bhagavad Gita',
    'APP_URL' => 'http://localhost/',
    'APP_SLUG' => 'smruthi',
    // If the Graphene App is not hosted in the main directory of the domain add the directory name in APP_SLUG

    'DB_CONNECTION' => 'mysql',
    'DB_HOST' => 'localhost:3309',
    'DB_PORT' => '3309',
    'DB_DATABASE' => 'smruthi',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',

    'SMTP_DRIVER' => 'smtp',
    'SMTP_HOST' => 'host',
    'SMTP_PORT' => 'port',
    'SMTP_USERNAME' => 'username',
    'SMTP_PASSWORD' => 'password',
    'SMTP_ENCRYPTION' => 'tls',

    // SEO
    'APP_DESC' => 'Smruthi App. An app to read and explore Valmiki Ramayanam and Bhagavad Gita. Preserve and explore ancient scriptures from Bharatiya Sanatana Dharma.',
    'APP_SHORT_TITLE' => 'Smruthi',
    'APP_AUTHOR' => 'DharmSetu',
    'APP_ICON' => 'assets/img/SmruthiIcon.png',
    'APP_LOGO' => 'assets/img/Smruthi.png',
    // Size 1000x1000
    'APP_OG_ICON' => 'assets/img/SmruthiIcon.png',
    // Size 600x300
    'APP_OG_ICON_MOBILE' => 'assets/img/SmruthiBanner.png',
    // Size 700x700
    'APP_THEME_COLOR' => '#E1DEEF',
    // Color in HEX Code
    'APP_KEYWORDS' => 'Smruthi App, Smruthi Ramayan, Smruthi Ramayanam, Smruthi Bhagavad Gita, Smruthi Rama, Smruthi Krishna, Amara Vaani Linguistic Technologies',
    // Max 20 Keywords
    'APP_TWITTER_CREATOR' => '@SmruthiApp', // Twitter Username
];
