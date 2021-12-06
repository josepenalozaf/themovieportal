<div class="details actor">
  <?php $actor = App\Models\Actor::getOne( $_GET[ 'id' ] ); ?>
  <h2><?php echo $actor->name; ?></h2>
  <div class="description">
    <img src="<?php echo API_IMG_PATH . $actor->profile_path; ?>" alt="<?php echo $actor->name; ?>"/>
    <ul>
      <li>
        <h4>Birthday:</h4>
        <span><?php echo $actor->birthday; ?></span><br />
      </li>
      <li>
        <h4>Place of birth:</h4>
        <p><?php echo $actor->place_of_birth; ?></p>
      </li>
      <?php if ( ! is_null( $actor->deathday ) ) : ?>
        <li>
          <h4>Day of death:</h4>
          <span><?php echo $actor->deathday; ?></span><br />
        </li>
      <?php endif; ?>
      <?php if ( ! is_null( $actor->imdb_id ) ) : ?>
        <li>
          <h4>Website: <a href="<?php echo API_SITE_PATH . $actor->imdb_id . '/';?>" target="_blank">(Visit)</a></h4>
        </li>
      <?php endif; ?>
      <li>
        <h4>Popularity:</h4>
        <span><?php echo $actor->popularity; ?></span><br />
      </li>
      <?php if ( $actor->biography !== '' ) : ?>
        <li>
          <h4>Bio:</h4>
          <p><?php echo $actor->biography; ?></p>
        </li>
      <?php endif; ?>
    </ul>
  </div>
  <h3>Gallery</h3>
  <div class="gallery">
    <?php foreach ( App\Models\Actor::getImages( $_GET[ 'id' ] ) as $image ) : ?>
      <picture>
        <img src="<?php echo API_IMG_PATH . $image->file_path; ?>" alt="<?php echo 'Votes: ' . $image->vote_count; ?>">
      </picture>
    <?php endforeach; ?>
  </div>
  <h3>Movies</h3>
  <div class="actor-movies cards">
    <?php foreach ( App\Models\Actor::getMovies( $_GET[ 'id' ] ) as $movie ) : ?>
      <a class="card-wrapper shown" href="<?php echo get_site_url() . '/?type=movie&id=' . $movie->id; ?>">
        <article class="movie card">
          <picture>
            <?php if ( ! is_null( $movie->poster_path ) ) : ?>
              <img src="<?php echo API_IMG_PATH . $movie->poster_path; ?>" alt="<?php echo $movie->title; ?>" />
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri() . '\img\movie-placeholder.png' ?>" alt="<?php echo $actor->name; ?>" />
            <?php endif; ?>
          </picture>
          <header>
            <h5><?php echo $movie->title; ?></h5>
          </header>
          <footer>
            <p class="date">Release date:<br /><span><?php echo $movie->release_date; ?></span></p>
            <p class="genre">Genre(s):<br /><span><?php echo \App\Models\Genre::getNamesFromMovies( $movie->genre_ids ); ?></span></p>
            <input class="actors" type="hidden" value="<?php
              $movieActors = '';
              foreach ( \App\Models\Movie::getActors( $movie->id ) as $actor ) {
                $movieActors .= $actor->name . ', ';
              }
              echo trim( $movieActors, ', ' );
            ?>" />
          </footer>
        </article>
      </a>
    <?php endforeach; ?>
  </div>
</div>
