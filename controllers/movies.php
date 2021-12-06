<?php
namespace App\Controllers\Movies;

function getOne( int $id ) {
  $movie = file_get_contents( API_URL . "movie/$id?api_key=" . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return json_decode( $movie );
}

function getTrailers( int $id ) {
  $movieVideos = file_get_contents( API_URL . "movie/$id/videos?api_key=" . API_KEY, false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return array_filter( json_decode( $movieVideos )->results, function( $video ) {
    return $video->type === 'Trailer';
  } );
}

function getUpcoming() {
  $upcomingMovies = file_get_contents( API_URL . 'movie/upcoming?api_key=' . API_KEY . '&page=1', false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return json_decode( $upcomingMovies )->results;
}

function getOrderedUpcoming( int $limit = 10 ) {
  $movies = [];

  foreach ( array_slice( namespace\getUpcoming(), 0, 10 ) as $movie ) {
    $movieDate = explode( '-', $movie->release_date );

    if ( ! isset( $movies[ $movieDate[0] ] ) ) $movies[ $movieDate[0] ] = [];
    if ( ! isset( $movies[ $movieDate[0] ][ $movieDate[1] ] ) ) $movies[ $movieDate[0] ][ $movieDate[1] ] = [];

    $movies[ $movieDate[0] ][ $movieDate[1] ][ sanitize_title( $movie->title ) ] = $movie;
  }

  ksort( $movies );
  return $movies;
}

function getActors( int $id ) {
  $movieStaff = file_get_contents( API_URL . "movie/{$id}/credits?api_key=" . API_KEY , false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return array_filter( json_decode( $movieStaff )->cast, function( $moviePerson ) {
    return $moviePerson->known_for_department === 'Acting';
  } );
}

function getReviews( int $id ) {
  $movieReviews = file_get_contents( API_URL . "movie/{$id}/reviews?api_key=" . API_KEY , false,
    stream_context_create( array(
      'http' => array( 'method' => 'GET' )
    ))
  );

  return json_decode( $movieReviews )->results;
}
