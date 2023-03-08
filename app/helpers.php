<?php

if(! function_exists('getClassNameForIcons')){
    function getClassNameForIcons($piller_slug){
        switch ($piller_slug)
        {
          case "experienced-team":
                return 'flaticon-team font_35';
                break;
          case "responsible-adventure":
                return 'flaticon-responsible font_35';
                break;
          case "high-quality-services":
                return 'flaticon-illumination font_35';
                break;
          case "flexibility":
                return 'flaticon-flexible font_35';
                break;
          default:
              return 'none';
        }

      }

}



 ?>
