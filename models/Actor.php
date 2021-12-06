<?php
namespace App\Models;

class Actor {
  public static function getOne( int $id ) {
    return \App\Controllers\Actors\getOne( $id );
  }

  public static function getImages( int $id, int $limit = 10 ) {
    return \App\Controllers\Actors\getImages( $id, $limit );
  }

  public static function getMovies( int $id ) {
    return \App\Controllers\Actors\getMovies( $id );
  }

  public static function getPopular( int $limit = 10 ) {
    return \App\Controllers\Actors\getOrderedPopular( $limit );
  }
}
