<?php

function remove_tags( $text, $tags = [ "p" ], $replacement = '' ) {
  $string = '';

  foreach ($tags as $tag) {
      $string .= preg_replace("/<\\/?" . $tag . "(.|\\s)*?>/", $replacement, $text);
  }

  return $string;
}
