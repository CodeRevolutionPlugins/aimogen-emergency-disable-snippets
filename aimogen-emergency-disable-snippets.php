<?php
/**
 * Plugin Name: Aimogen Emergency Disable AI Snippets
 * Description: Forces emergency shutdown of Aimogen Snippets Engine by defining AIMOGEN_DISABLE_SNIPPETS.
 * Version: 1.0.0
 * Author: CodeRevolution
 */

if (!defined('ABSPATH')) {
    exit;
}

/*
 * We define the constant as early as possible so it exists
 * before Aimogen_Snippets_Engine::__construct() runs.
 */
if (!defined('AIMOGEN_DISABLE_SNIPPETS')) {
    define('AIMOGEN_DISABLE_SNIPPETS', true);
}

?>