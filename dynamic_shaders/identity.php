<?php
/**
 * Identity shader
 */
require_once("init.php");

$samplerName = "tile_data_{$uniqueId}";

$definition = <<<EOF
uniform sampler2D $samplerName;
EOF;

//second shader part, if sampled grayscale value is significant, and above threshold, 
//output the color with threshold opacity decreased intentsity
$execution = <<<EOF
  show(texture2D($samplerName, v_tile_pos));
EOF;

//all other properties are not used

//print output: shader first and second part, the name of the image (required because OSD will program this variable for you)
send($definition, $samplerName, $execution);

?>						