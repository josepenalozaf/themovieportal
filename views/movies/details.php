<div class="details movie">
  <?php $movie = App\Models\Movie::getOne( $_GET[ 'id' ] ); ?>
  <h2><?php echo $movie->title; ?></h2>
  <?php $movieTrailer = ( App\Models\Movie::getTrailer( $_GET[ 'id' ] ) ); ?>
  <?php if ( ! is_null( $movieTrailer ) ) : ?>
    <div class="trailer">
        <iframe src="https://www.youtube.com/embed/<?php echo App\Models\Movie::getTrailer( $_GET[ 'id' ] )->key; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  <?php endif; ?>
  <h3>Description</h3>
  <div class="description">
    <img src="<?php echo API_IMG_PATH . $movie->poster_path; ?>" alt="<?php echo $movie->title; ?>"/>
    <ul>
      <li>
        <h4>Overview:</h4>
        <p><?php echo $movie->overview; ?></p>
      </li>
      <li>
        <h4>Genre(s):</h4>
        <p><?php
          $movieGenres = '';
          foreach ( $movie->genres as $genre ) {
            $movieGenres .= $genre->name . ', ';
          }
          echo trim( $movieGenres, ', ' );
        ?></p>
      </li>
      <li>
        <h4>Release date:</h4>
        <span><?php echo $movie->release_date; ?><br /></span>
      </li>
      <li>
        <h4>Original language:</h4>
        <span><?php echo $movie->original_language; ?></span>
      </li>
      <li>
        <h4>Popularity:</h4>
        <span><?php echo $movie->popularity; ?></span>
      </li>
    </ul>
  </div>
  <h3>Production companies</h3>
  <div class="companies">
    <?php foreach ( $movie->production_companies as $company ) : ?>
      <?php if ( ! is_null( $company->logo_path ) ) : ?>
        <div class="company">
          <img src="<?php echo API_IMG_PATH . $company->logo_path; ?>" alt="<?php echo $company->name; ?>" />
        </div>
      <?php else : ?>
        <div class="company text">
          <?php echo $company->name; ?>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <h3>Cast</h3>
  <div class="movie-actors cards">
    <?php foreach ( App\Models\Movie::getActors( $_GET[ 'id' ] ) as $actor ) : ?>
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
  <h3>Reviews</h3>
  <div class="reviews">
    <?php foreach ( App\Models\Movie::getReviews( $_GET[ 'id' ] ) as $review ) : ?>
      <div class="review">
        <p class="user"><span class="username"><?php echo $review->author_details->username; ?></span> said:</p>
        <p><?php echo $review->content; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>
