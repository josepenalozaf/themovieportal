<?php
namespace App\Controllers\Actors;

function getOne( int $id ) {
  $actor = file_get_contents( API_URL . "person/$id?api_key=" . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return json_decode( $actor );
}

function getMovies( int $id ) {
  $outputMovies = [];
  $actorMovies = file_get_contents( API_URL . "person/$id/movie_credits?api_key=" . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  $noDateCounter = 0;
  foreach ( json_decode( $actorMovies )->cast as $movie ) {
    $movieKey = '';

    if ( isset( $movie->release_date ) && $movie->release_date !== '' ) {
      $movieKey = $movie->release_date . "-{$noDateCounter}";
    } else {
      $movieKey = "1600-01-01-{$noDateCounter}";
    }

    $noDateCounter++;
    $outputMovies[ $movieKey ] = $movie;
  }

  krsort( $outputMovies );

  return $outputMovies;
}

function getImages( int $id, int $limit = 10 ) {
  $actorImages = file_get_contents( API_URL . "person/$id/images?api_key=" . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return array_slice( json_decode( $actorImages )->profiles, 0, $limit );
}

function getPopular() {
  $popularActors = file_get_contents( API_URL . 'person/popular?api_key=' . API_KEY . '&page=1', false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return json_decode( $popularActors )->results;
}

function getOrderedPopular( int $limit = 10 ) {
  $actors = [];

  foreach ( array_slice( namespace\getPopular(), 0, 10 ) as $actor ) {
    $actors[ sanitize_title( $actor->name ) ] = $actor;
  }

  ksort( $actors );
  return $actors;
}
