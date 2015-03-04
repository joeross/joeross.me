<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Parallaxme
 */

get_header(); 
?>

    <?php 
    if( of_get_option('numsection', true) > 0 ) { 
        $numSections = esc_attr( of_get_option('numsection', true) );
        for( $s=1; $s<=$numSections; $s++ ){ 
            $title 		= ( of_get_option('sectiontitle'.$s, true) != '' ) ? esc_html( of_get_option('sectiontitle'.$s, true) ) : '';
            $class		= ( of_get_option('sectionclass'.$s, true) != '' ) ? esc_html( of_get_option('sectionclass'.$s, true) ) : '';
            $content	= ( of_get_option('sectioncontent'.$s, true) != '' ) ? of_get_option('sectioncontent'.$s, true) : ''; ?>
    
            <section id="section<?php echo $s;?>" class="<?php echo ( ($s%2) == 0 ) ? 'cover' : '' ?>">
                <div class="container">
                    <div class="<?php echo $class; ?>">
                        <h1 class="heading"><?php echo $title; ?></h1>
                        <?php echo skt_parallaxme_the_content_format( $content ); ?>
                    </div>
                </div>
            </section><?php 
        }
    }
    ?>



<?php get_footer(); ?>