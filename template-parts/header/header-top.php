<div class="header-top">
  <div class="uk-grid-match " uk-grid>

    <div class="uk-width-2-3">
      <!-- navigation is here *-->
      <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>

        <?php if ( has_nav_menu( 'top' ) ) : ?>
          <?php
            wp_nav_menu( array(
              'menu_class' => 'uk-navbar-nav',
              'container_class' => '',
              'theme_location' => 'top',
              'container_class' => 'uk-navbar-left',
              'walker' => new Primary_Walker()
              ) );
          ?>
        <?php endif; ?> <!-- .top-navigation -->
           
      </nav>
    </div>
    <div class="uk-width-1-3">
      <!-- search form is here *-->
      <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="uk-margin-auto-vertical">
        <div>
          <div class="uk-inline uk-align-right uk-margin-remove-bottom">
            <button class="uk-form-icon uk-form-icon-flip" type="submit" uk-icon="icon: search; ratio: 0.8"></button>
            <input placeholder="" class="uk-input uk-form-width-medium uk-form-small" type="search" name="s">
          </div>
        </div>
      </form>
    </div>

  </div>
</div>