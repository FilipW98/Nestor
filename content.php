<h1><?php the_title(); ?></h1>
<div class="thumbnail-img"><?php the_post_thumbnail('large'); ?></div>
<span>Opublikowano <?php the_time('F j, Y');?> w <?php the_category() ?></span>
<div class="container"><?php the_content(); ?></div>
<hr>