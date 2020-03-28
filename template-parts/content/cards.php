<?php

echo '<div class="info-card"';
    if ( has_post_thumbnail() ){
        echo 'style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.25), rgba(0, 0, 0, 0.73)),';
        echo 'url(' . get_the_post_thumbnail_url( get_the_ID() ,'medium' ) . ');' ;
        echo 'background-repeat:no-repeat;';
        echo 'background-size: cover;';
        echo 'background-position: bottom;"';
    }
    echo '>'; 
    echo '<a href="'. baktun_get_card_link(get_the_ID()) . '" class="ajax modal-'  . get_the_ID() . '">'; # link to content modal
    echo '<div class="info-card-content">';
    echo '<h3 class="info-card-heading">' ;
    echo get_the_title() . ' </h3>' ;
    echo '<p>' . get_the_excerpt() . '</p>';
    if ( get_post_type() == 'tribe_events'){
    echo tribe_get_start_date() ;
    }
    echo '</div>';
    echo '</a>';
echo '</div>';#end info-card div