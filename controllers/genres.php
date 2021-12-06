<?php
namespace App\Controllers\Genres;

function getAllFromMovies() {
  $outputGenres = [];
  $moviesGenres = file_get_contents( API_URL . 'genre/movie/list?api_key=' . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  foreach ( json_decode( $moviesGenres )->genres as $genre ) {
    $outputGenres[ $genre->id ] = $genre;
  }

  return $outputGenres;
}

function getAllFromTV() {
  $outputGenres = [];
  $tvGenres = file_get_contents( API_URL . 'genre/tv/list?api_key=' . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  foreach ( json_decode( $tvGenres )->genres as $genre ) {
    $outputGenres[ $genre->id ] = $genre;
  }

  return $outputGenres;
}
