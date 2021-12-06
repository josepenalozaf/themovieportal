<div class="home-category">
  <h2>Upcoming movies</h2>
  <?php App\Core\Templates\show( 'filter', '', 'views/movies' ); ?>
</div>
<div class="movies-list">
  <?php foreach ( App\Models\Movie::getUpcoming() as $year => $months ) : ?>
    <div class="year">
      <h3>Upcoming in <?php echo $year; ?></h3>
      <?php ksort( $months ); ?>
      <?php foreach ( $months as $month => $movies ) : ?>
        <div class="month">
          <h4>Upcoming in <?php echo DateTime::createFromFormat('!m', $month)->format('F'); ?></h4>
          <div class="cards">
            <?php ksort( $movies ); ?>
            <?php foreach ( $movies as $movieSlug => $movie ) : ?>
              <a class="card-wrapper shown" href="<?php echo get_site_url() . '/?type=movie&id=' . $movie->id; ?>">
                <article class="movie card">
                  <picture>
                    <img src="<?php echo API_IMG_PATH . $movie->poster_path; ?>" alt="<?php echo $movie->title; ?>" />
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
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
