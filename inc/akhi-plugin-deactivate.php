
<?php

/**
 * @package akhi-plugin
 */


 class AkhiPluginDeactivate{
     public static function deactivate()
     {
         flush_rewrite_rules();
     }
 }