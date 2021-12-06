<?php
namespace App\Models;

class Genre {
  public static function getAllFromMovies() {
    return \App\Controllers\Genres\getAllFromMovies();
  }

  public static function getAllFromTV() {
    return \App\Controllers\Genres\getAllFromTV();
  }

  public static function getNamesFromMovies( array $genresIds = [] ) {
    $output = '';
    $genres = \App\Controllers\Genres\getAllFromMovies();

    foreach ( $genresIds as $genreId ) {
      if ( isset( $genres[ $genreId ] ) ) {
        $output .= $genres[ $genreId ]->name . ', ';
      }
    }

    return trim( $output, ', ' );
  }
}
