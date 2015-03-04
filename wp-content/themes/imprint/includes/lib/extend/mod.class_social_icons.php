<?php

class Imprint_Social_Icons {
    
    
    function __construct() {
        global $imprint_options;
        
        if(!$imprint_options['disable_social_icons']):
            add_action('imprint_wrapper_hook', array($this, 'social_container'));
            //add_action( 'wp_enqueue_scripts', array($this, 'social_icon_enqueue' ), 20);
        endif;
    }
    
    private function _show_URL($name = FALSE, $img, $class, $unicode_value){
        global $imprint_options;
        
        if($imprint_options[$name]) {
            ?><div class="social_icon_solo <?php echo 'div-' . $class ?>">
                <a href="<?php echo esc_url( $imprint_options[$name] ) ?>" class="<?php echo 'link-' . $class ?>" target="_blank"><i class="mdf mdf-<?php echo $unicode_value ?>"></i></a><?php
              ?></div><?php
        }
    }
    
    function social_container(){
        $empty = $this->social_icons();
        if($empty === FALSE):
            ?><div class="social-icons"><?php imprint_social_icons_hook() ?></div><?php
        endif;
    }
           
    function add_social_icons($func = FALSE, $priority = FALSE ) {
        add_action('imprint_social_icons_hook', array($this, $func), $priority);
    }

    function social_icons(){
        global $imprint_options;
        
        $empty = TRUE;
        
        if( !empty( $imprint_options['si_facebook'] ) ){
            $this->add_social_icons('attach_facebook', 10);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_twitter'] ) ){
            $this->add_social_icons('attach_twitter', 11);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_linkedin'] ) ){
            $this->add_social_icons('attach_linkedin', 12);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_pinterest'] ) ){
            $this->add_social_icons('attach_pinterest', 13);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_youtube'] ) ){
            $this->add_social_icons('attach_youtube', 14);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_tumblr'] ) ){
            $this->add_social_icons('attach_tumblr', 15);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_gplus'] ) ){
            $this->add_social_icons('attach_gplus', 16);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_skype'] ) ){
            $this->add_social_icons('attach_skype', 17);
            $empty = FALSE;
        }
        if( !empty( $imprint_options['si_flickr'] ) ){
            $this->add_social_icons('attach_flickr', 18);
            $empty = FALSE;
        }
        if( !empty( $imprint_options['si_instagram'] ) ){
            $this->add_social_icons('attach_instagram', 19);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_dribbble'] ) ){
            $this->add_social_icons('attach_dribbble', 20);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_github'] ) ){
            $this->add_social_icons('attach_github', 21);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_bitbucket'] ) ){
            $this->add_social_icons('attach_bitbucket', 22);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_stackoverflow'] ) ){
            $this->add_social_icons('attach_stackoverflow', 23);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_rss'] ) ){
            $this->add_social_icons('attach_rss', 90);
            $empty = FALSE;
        }
        remove_si_hooks();
        
        return $empty;
    }    
    
    function attach_facebook() {
        $this->_show_URL('si_facebook', 'facebook.png', 'facebook', 'facebook');
    }
    function attach_twitter() {
        $this->_show_URL('si_twitter', 'twitter.png', 'twitter', 'twitter');
    }
    function attach_linkedin() {
        $this->_show_URL('si_linkedin', 'linkedin.png', 'linkedin', 'linkedin');
    }
    function attach_pinterest() {
        $this->_show_URL('si_pinterest', 'pinterest.png', 'pinterest', 'pinterest');
    }
    function attach_youtube() {
        $this->_show_URL('si_youtube', 'youtube.png', 'youtube', 'youtube');
    }
    function attach_tumblr() {
        $this->_show_URL('si_tumblr', 'tumblr.png', 'tumblr', 'tumblr');
    }
    function attach_gplus() {
        $this->_show_URL('si_gplus', 'gplus.png', 'gplus', 'google-plus');
    }
    function attach_skype() {
        $this->_show_URL('si_skype', 'skype.png', 'skype', 'skype');
    }
    function attach_flickr() {
        $this->_show_URL('si_flickr', 'flickr.png', 'flickr', 'flickr');
    }
    function attach_instagram() {
        $this->_show_URL('si_instagram', 'instagram.png', 'instagram', 'instagram');
    }
    function attach_dribbble() {
        $this->_show_URL('si_dribbble', 'dribbble.png', 'dribbble', 'dribbble');
    }
    function attach_github() {
        $this->_show_URL('si_github', 'github.png', 'github', 'github');
    }
    function attach_bitbucket() {
        $this->_show_URL('si_bitbucket', 'bitbucket.png', 'bitbucket', 'bitbucket');
    }
    function attach_stackoverflow() {
        $this->_show_URL('si_stackoverflow', 'stackoverflow.png', 'stack-overflow', 'stack-overflow');
    }
    function attach_rss() {
        $this->_show_URL('si_rss', 'rss.png', 'rss', 'rss');
    }
    
    /*
    function social_icon_enqueue(){
        wp_enqueue_style( 'imprint-font-awesome', IMPRINT_ADMIN_CSS . 'font-awesome.css', array(), '4.0.3' );
    }*/
    
}

$Imprint_Social_Icons_Obj = new Imprint_Social_Icons;

/*
 * Example: to remove hooks
 * 
function ksw(){
    global $Imprint_Social_Icons_Obj;
    remove_action('imprint_social_icons_hook', array($Imprint_Social_Icons_Obj, 'attach_facebook'), 10 );
    remove_action('imprint_social_icons_hook', array($Imprint_Social_Icons_Obj, 'attach_youtube'), 14 );
    add_action('imprint_social_icons_hook', array($Imprint_Social_Icons_Obj, 'attach_facebook'), 13);
}

add_action('remove_si_hooks', 'ksw');
 */