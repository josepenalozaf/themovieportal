<?php if ( isset( $_GET['type'] ) && isset( $_GET['id'] ) ) : ?>
    <?php if ( 'movie' === $_GET['type'] ) : ?>
    <?php App\Core\Templates\show( 'details', '', 'views/movies' ); ?>
    <?php elseif ( 'actor' === $_GET['type'] ) : ?>
    <?php App\Core\Templates\show( 'details', '', 'views/actors' ); ?>
    <?php endif; ?>
<?php else: ?>
    <?php App\Core\Templates\show( 'upcoming', '', 'views/movies' ); ?>
    <?php App\Core\Templates\show( 'popular', '', 'views/actors' ); ?>
<?php endif; ?>
