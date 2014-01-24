<?php
/**  Gforge Backle plugin
 *
 * Copyright 2014, Sebastian Mancke
 *
 */

global $gfplugins;
require_once $gfplugins.'backle/common/BacklePlugin.class.php' ;

$pluginObject = new BacklePlugin();

register_plugin ($pluginObject) ;

?>
