<?php
session_start();
/*
  Template Name: Sidebar Left
 */
?>
<?php
//Valida login
if (is_page('area-restrita') && !is_user_logged_in()) {
    header('Location: ' . home_url());
} else {
    if ($post->post_parent != 0) {
        $user = wp_get_current_user();

        //if ($user->caps['administrator'])
        //{
        //$access = $user->caps['administrator'];
        //}
        //else
        //{
        $cap = strtolower(get_the_title($post->post_parent));

        if ($cap == 'corretores' || $cap == 'investidores')
            $cap = str_replace('res', 'r', $cap);

        $access = $user->caps[$cap];
        //}

        if (!$access) {
            header('Location: ' . home_url());
        }
    }
}
?>
<?php get_header(); ?>
<div id="wrap" class="row">
    <div id="sidebar" class="three columns"> 
<?php get_sidebar(); ?>
    </div>
    <div id="content" class="nine columns">
        <div class="post-container short">		
        <?php if (have_posts()): ?>
    <?php while (have_posts()):the_post(); ?>
        <?php
        if ($post->post_parent != 0)
            $title = get_the_title($post->post_parent);
        else
            $title = get_the_title($post->ID);
        ?>
                    <div class="post-title">
                        <h1><a href="<?php the_permalink(); ?>"><?php echo $title; ?> </a></h1>
                    </div>
                    <div class="featured">
                            <?php echo (has_post_thumbnail()) ? get_the_post_thumbnail($post->ID, array(960, 9999)) : ''; ?>
                    </div> 	
                    <div class="post-content">
        <?php the_content(); ?>
                        <?php
                        if (is_page('area-restrita') && is_user_logged_in()) {
                            if (shortcode_exists('user_file_manager_plus')) {
                                echo do_shortcode('[user_file_manager_plus]');
                            }
                        }
                        ?>
                    </div>
                    <?php endwhile; ?>				
                <?php endif; ?>
                <?php
                //comments_template(''); 
                include(TEMPLATEPATH . '/contact-forms.php');
                ?>
        </div>
    </div>
            <?php get_footer(); ?>