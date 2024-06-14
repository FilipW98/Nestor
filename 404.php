<?php get_header(); ?>
<div class="page-404">
    <div class="page-404__outer">
        <div class="page-404__inner">
            <div class="page-404__left">
                <div class="page-404__left-title">
                    <h1>Strona niedostępna</h1>
                </div>
                <div class="page-404__left-info"><span> W adresie jest błąd lub strona została usunięta</span>
                </div>
                <div class="page-404__left-btn"><span><a href="<?php echo home_url(); ?>" class="body-medium">Przejdź na
                            stronę
                            główną</a></span></div>
            </div>
            <div class="page-404__right">
                <img src="/wp-content/uploads/2024/01/404_page.png" alt="404 image">
            </div>
        </div>

    </div>

</div>
</div>
<?php 
 if(have_rows('general_flex_fields',100)):
        while(have_rows('general_flex_fields',100)): the_row(); ?>

<?php $component_name = get_row_layout(); 
    //echo $component_name; 

    get_template_part('/template-parts/components/flex', $component_name ) ?>
<?php endwhile; endif ?>

<?php get_footer(); ?>