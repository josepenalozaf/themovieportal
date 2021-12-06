<header id="masthead" class="site-header">
  <div class="branding">
    <?php the_custom_logo(); ?>

    <a class="title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <?php if ( is_front_page() && is_home() ) : ?>
        <h1><?php bloginfo( 'name' ); ?></h1>
      <?php else : ?>
        <p><?php bloginfo( 'name' ); ?></p>
      <?php endif; ?>
    </a>

    <?php $site_content_description = get_bloginfo( 'description', 'display' ); ?>
    <?php if ( $site_content_description || is_customize_preview() ) : ?>
      <p class="description"><?php echo $site_content_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
    <?php endif; ?>
  </div>
</header>
