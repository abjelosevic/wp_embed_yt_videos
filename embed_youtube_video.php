<?php
/**
 * Embed YT Videos
 *
 * Plugin Name: Embed YT Videos
 * Plugin URI:  https://aleksandar.bjelosevic.info
 * Description: Find all youtube links in the text and if there are youtube links embed the video using iframe
 * Version:     1.0.0
 * Author:      Aleksandar Bjelosevic
 * Author URI:  https://aleksandar.bjelosevic.info
 * License:     GPLv2 or later
 */
 
 function embed_youtube_video( $content ) {
  // Pronađi sve youtube linkove u tekstu
  preg_match_all('/(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9._%-]*)(\&\S+)?/', $content, $matches);

  // Ako postoje youtube linkovi
  if( ! empty( $matches[4] ) ) {
    // Uzmi samo prvi link
    $youtube_id = $matches[4][0];

    // Ugradi video koristeći iframe
    $embed_code = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube_id . '" frameborder="0" allowfullscreen></iframe>';

    // Zamijeni youtube link s iframe kodom
    $content = preg_replace( '/(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)' . $youtube_id . '(\&\S+)?/', $embed_code, $content );
  }

  return $content;
}

add_filter( 'the_content', 'embed_youtube_video' );

 
 
 ?>
