<?php
/**
 * The template part for header
 *
 * @package VW Medical Care 
 * @subpackage vw_medical_care
 * @since VW Medical Care 1.0
 */
?>
<div class="main-header <?php if( get_theme_mod( 'vw_medical_care_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="container">
    <div class="row m-0">      
      <div class="col-lg-3 col-md-4 col-8">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <p class="site-description">
                <?php echo $description; ?>
              </p>
            <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-4">
        <?php get_template_part( 'template-parts/header/navigation' ); ?>
      </div>
    </div>
  </div>
</div>