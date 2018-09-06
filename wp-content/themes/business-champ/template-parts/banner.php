<?php 
/*Banner for Front and inner pages */

 $front_banner = business_champ_front_banner_type();
 $site_banner = business_champ_site_banner_type(); 

 /* Variables Returns banner types */

 if( is_front_page() || is_home()){ 

     if( $front_banner == 'video-banner' ){

      business_champ_banner_video();

    }else if(  $front_banner == 'image-banner' ){

      business_champ_banner_image();

    }
  
 }else{

    if( $site_banner == 'video-banner' ){

      business_champ_banner_video();
    }
    else if(  $site_banner == 'image-banner' ){

      business_champ_banner_image();
      
    }
    
 
 }