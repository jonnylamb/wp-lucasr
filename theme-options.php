<?php
/**
 * Theme option functions and definitions.
 *
 * @package WordPress
 * @subpackage lucasr
 */


function lucasr_options_init() {
    register_setting( 'lucasr_options', 'lucasr_options' );
}
add_action( 'admin_init', 'lucasr_options_init' );


function lucasr_options_add_page() {
    add_theme_page( __( 'Theme Options', 'lucasr' ),
        __( 'Theme Options', 'lucasr' ),
        'edit_theme_options',
        'lucasr_options',
        'lucasr_options_do_page');
}
add_action( 'admin_menu', 'lucasr_options_add_page' );


function lucasr_options_do_page() {
    if ( ! isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false;

    ?>
    <div class="wrap">
        <?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'lucasr' ) . "</h2>"; ?>

        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
        <div class="updated fade"><p><strong><?php _e( 'Options saved', 'lucasr' ); ?></strong></p></div>
        <?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields( 'lucasr_options' ); ?>
            <?php $options = get_option( 'lucasr_options' ); ?>

            <table class="form-table">
                <tr valign="top"><th scope="row"><?php _e( 'Hide discuss row', 'lucasr' ); ?></th>
                    <td>
                        <input id="lucasr_options[hide_discuss]" name="lucasr_options[hide_discuss]"
                            type="checkbox" value="1" <?php checked( '1', $options['hide_discuss'] ); ?> />
                        <label class="description" for="lucasr[option1]">
                            <?php _e( 'This option decides whether to hide the Twitter & Google+ discuss row.', 'lucasr' ); ?>
                        </label>
                    </td>
                </tr>

            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'lucasr' ); ?>" />
            </p>
        </form>
    </div>
    <?php
}
?>
