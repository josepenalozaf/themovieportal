<div class="home-category">
  <h2>Popular actors</h2>
  <?php App\Core\Templates\show( 'filter', '', 'views/actors' ); ?>
</div>
<div class="actors-list">
  <div class="cards">
    <?php foreach ( App\Models\Actor::getPopular() as $actor ) : ?>
      <a class="card-wrapper shown" href="<?php echo get_site_url() . '/?type=actor&id=' . $actor->id; ?>">
        <article class="actor card">
          <picture>
            <?php if ( ! is_null( $actor->profile_path ) ) : ?>
              <img src="<?php echo API_IMG_PATH . $actor->profile_path; ?>" alt="<?php echo $actor->name; ?>" />
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri() . '\img\actor-placeholder.png' ?>" alt="<?php echo $actor->name; ?>" />
            <?php endif; ?>
          </picture>
          <header>
            <h5><?php echo $actor->name; ?></h5>
          </header>
          <footer>
            <input class="movies" type="hidden" value="<?php
              $actorMovies = '';
              foreach ( $actor->known_for as $actorMovie ) {
                if ( isset( $actorMovie->title ) ) $actorMovies .= $actorMovie->title . ', ';
                elseif ( isset( $actorMovie->name ) ) $actorMovies .= $actorMovie->name . ', ';
              }
              echo trim( $actorMovies, ', ' );
            ?>" />
          </footer>
        </article>
      </a>
    <?php endforeach; ?>
  </div>
</div>
