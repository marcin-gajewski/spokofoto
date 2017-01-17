<?php get_header(); ?>
<body>
  <section class="main-wrapper">
    <div class="container"><img src="<?php bloginfo('template_directory'); ?>/img/spokofoto-logo.png" class="logo">
      <p>Ta strona co prawda nie jest gotowa,<br>ale możesz już obejrzec swoje zdjęcia</p>
      <form name="login">
        <div class="form">
          <?php
            global $user_login;
            // In case of a login error.
              if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
      	            <div class="aa_error">
      		            <p><?php _e( 'FAILED: Try again!', 'AA' ); ?></p>
      	            </div>
              <?php
              endif;
            // If user is already logged in.
              if ( is_user_logged_in() ) : ?>
                <div class="aa_logout">
                    <?php
                        _e( 'Witaj ', 'AA' );
                        echo $user_login;
                    ?>
                    </br>
                    <?php _e( 'Jesteś już zalogowany.', 'AA' ); ?>
                </div>
                <a id="wp-submit" href="<?php echo wp_logout_url(); ?>" title="Logout">
                    <?php _e( 'Wyloguj się', 'AA' ); ?>
                </a>

            <?php
                // If user is not logged in.
                else:

                    // Login form arguments.
                    $args = array(
                        'echo'           => true,
                        'redirect'       => home_url( '/wp-admin/' ),
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Username' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Pstryk!' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => false,
                        'value_username' => NULL,
                        'value_remember' => true
                    );

                    // Calling the login form.
                    wp_login_form( $args );
                endif;
        ?>
      </form>
    </div>
  </section>
</body>
<?php get_footer(); ?>
