<?php

/**
 * @package akhi-plugin
 */


 class AkhiPluginActivate{
     public static function activate()
     {
         flush_rewrite_rules();
     }
 }