<?php
namespace App\Models;

class Movie {
  public static function getOne( int $id ) {
    return \App\Controllers\Movies\getOne( $id );
  }

  public static function getTrailer( int $id ) {
    $movieTrailers = self::getTrailers( $id );
    if ( count( $movieTrailers ) > 0 ) return array_pop(array_reverse($movieTrailers));
    return null;
  }

  public static function getTrailers( int $id ) {
    return \App\Controllers\Movies\getTrailers( $id );
  }

  public static function getUpcoming( int $limit = 10 ) {
    return \App\Controllers\Movies\getOrderedUpcoming( $limit );
  }

  public static function getActors( int $id ) {
    return \App\Controllers\Movies\getActors( $id );
  }

  public static function getReviews( int $id ) {
    return \App\Controllers\Movies\getReviews( $id );
  }
}
