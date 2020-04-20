<?php
?>
<div class="info-card" 
    <?php
    if ( has_post_thumbnail() ){ ?>

        style="background-color:
        <?php echo get_post_meta( get_the_ID() , "card-bg-color", true) ?>
        ;background-image:linear-gradient(to bottom, transparent, black),
        url(' <?php echo get_the_post_thumbnail_url( get_the_ID() ,'full' ) ?> ');
        background-repeat:no-repeat;
        background-size: cover;
        background-position: bottom;"
        <?php
    }
    ?>
    > 
    <a href=" <?php echo the_permalink() ?>" class="ajax page-<?php echo get_the_ID() ?>"> 
    <div class="info-card-content">
    <h3 class="info-card-heading">
    <?php echo get_the_title() ?> </h3>
    <p><?php echo get_the_excerpt()?> </p>
    <?php
    if ( get_post_type() == 'tribe_events'){
    echo tribe_get_start_date() ;
    } ?>
    </div>
    </a>
    </div> <!-- end info-card div -->