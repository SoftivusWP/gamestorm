<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gamestorm
 */

$gamestorm_blog_btn = get_theme_mod( 'gamestorm_blog_btn', 'Read More' );
$gamestorm_blog_btn_switch = get_theme_mod( 'gamestorm_blog_btn_switch', true );

?>

<?php if ( !empty( $gamestorm_blog_btn_switch ) ): ?>
<div class="btn-area alt-bg">
    <a href="<?php the_permalink();?>" class="box-style btn-box d-center"><?php print esc_html( $gamestorm_blog_btn );?></a>
</div>
<?php endif;?>