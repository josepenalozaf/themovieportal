/* eslint-disable */
( function( $ ) {
  $( window ).on( 'load', function() {
    $( '.loading' ).addClass( 'hidden' );
  } );

  $( '.filter' ).on( 'keyup', 'input', function() {
    $( this ).closest( '.filter' ).find( 'input' ).each( function() {
      const field = $( this ).data( 'field' );
      const search = $( this ).val().toLowerCase().trim();
      const target = $( this ).closest( '.filter' ).hasClass( 'movies-filter' ) ? 'movies' : 'actors';

      if ( target === 'movies' ) {
        $( '.movies-list' ).find( '.movie' ).each( function() {
          if ( field === 'title' ) {
            if ( ! $( this ).find( 'h5' ).text().toLowerCase().includes( search ) ) {
              $( this ).closest( '.card-wrapper' ).addClass( 'dont-show' );
            }
          } else if ( field === 'year' ) {
            const dateParams = $( this ).find( '.date span' ).text().split( '-' );
            if ( ! dateParams[0].includes( search ) ) {
              $( this ).closest( '.card-wrapper' ).addClass( 'dont-show' );
            }
          } else if ( field === 'genre' ) {
            if ( ! $( this ).find( '.genre span' ).text().toLowerCase().includes( search ) ) {
              $( this ).closest( '.card-wrapper' ).addClass( 'dont-show' );
            }
          } else if ( field === 'actor' ) {
            if ( ! $( this ).find( '.actors' ).val().toLowerCase().includes( search ) ) {
              $( this ).closest( '.card-wrapper' ).addClass( 'dont-show' );
            }
          }
        } );
      } else if ( target === 'actors' ) {
        $( '.actors-list' ).find( '.actor' ).each( function() {
          if ( field === 'name' ) {
            if ( ! $( this ).find( 'h5' ).text().toLowerCase().includes( search ) ) {
              $( this ).closest( '.card-wrapper' ).addClass( 'dont-show' );
            }
          } else if ( field === 'movie' ) {
            if ( ! $( this ).find( '.movies' ).val().toLowerCase().includes( search ) ) {
              $( this ).closest( '.card-wrapper' ).addClass( 'dont-show' );
            }
          }
        } );
      }
    } );

    $( '.card-wrapper' ).addClass( 'shown' );
    $( '.card-wrapper.dont-show' ).removeClass( 'shown' );

    $( 'h3, h4' ).each( function() {
      if ( $( this ).parent( '.year, .month' ).find( '.shown' ).length === 0 ) {
        $( this ).addClass( 'hidden' );
      } else {
        $ ( this ).removeClass( 'hidden' );
      }
    } )

    $( '.card-wrapper' ).removeClass( 'dont-show' );
  } );
}( jQuery ) );
