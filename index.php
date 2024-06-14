<!-- pobieramy plik header.php -->
<?php get_header(); ?>
<!-- Jeśli są jakieś posty -->
<?php if( have_posts() ):

  while( have_posts() ): the_post(); ?>
<?php get_template_part( 'content', get_post_format()); ?>

<?php endwhile;

  endif; 
   ?>

<?php get_sidebar( ); ?>
<!-- pobieramy plik footer.php -->
<?php get_footer(); ?>