<?php get_header(); ?>

<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="fade animate" id="breadcrumbs">','</p>' );
}
?>

<div class="row row-404">
    <div class="textblock-404 slide-to-right animate">
        <div class="title-404">
            <h1 class="h3">Strona niedostępna</h1>
        </div>
        <div class="text-404">
            <span class="bodytext-16-regular2">W adresie jest błąd lub strona została usunięta</span>
        </div>
        <div class="back-404"><span><a class="button-brown bodytext-16-regular1" href="<?php echo home_url(); ?>">PRZEJDŹ NA STRONĘ GŁÓWNĄ</a></span></div>
    </div>
    <div class="image-block slide-to-left animate">
        <img src="/wp-content/uploads/2024/05/404_page.png" alt="404 image">
    </div>
</div>
</div>
<?php get_footer(); ?>