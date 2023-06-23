<?php

/**
 * Title: Fire Picture
 * Description: Loads picture tag and source set using webp with png/jpg fallback
 *
 * Usage: new Fire_Picture('path/to/image.png');
 *
 * @param String $src source of original image
 * @param String $alt alt of image
 * @param String $class classes for image
 * @param Array $sets sets of width/height for image sizes
 * @param Boolean $lazy whether image should lazy load or not. Default = TRUE
 */
class Fire_Picture
{
  public function __construct($src, $alt, $sets, $class = '', $lazy = TRUE, $crop = TRUE, $upscale = TRUE)
  {
    $this->src = $src;
    $this->alt = $alt;
    $this->sets = $sets;
    $this->class = $class;
    $this->lazy = $lazy;
    $this->crop = $crop;
    $this->upscale = $upscale;
    $this->echo_picture();
  }

  public function is_lazy_loaded()
  {
    if ($this->lazy) {
      return 'lazy';
    } else {
      return 'eager';
    }
  }

  public function getImageDim($val){
    return $val === null ? null : $val*1.5;
  }

  /**
   * Renders picture element on the page
   *
   */
  private function echo_picture()
  {
    $isSVG = false;
    $picture = '';

    // Check if image is already webp
    if (strpos($this->src, '.webp') !== false) {
      $this->src = $this->src;
    } elseif(strpos($this->src, '.svg') !== false){
      $isSVG = true;
    } else {
      $this->src = $this->src . '.webp';
    }

    if($isSVG){
      $mobileStyles = '';
      $tabletStyles = '';
      $desktopStyles = '';
      if (isset($this->sets[0])){
        $desktopStyles.='@media (min-width: 1280px) {';
        if(isset($this->sets[0][0]) && $this->sets[0][0] !== null){
          $desktopStyles .= 'width: '.$this->sets[0][0].'px;';
        }
        if(isset($this->sets[0][1]) && $this->sets[0][1] !== null){
          $desktopStyles .= 'width:auto; height: '.$this->sets[0][1].'px;';
        }
        $desktopStyles.='}';
      }
      if (isset($this->sets[1])){
        $tabletStyles.='@media (min-width: 768px) and (max-width: 1279px) {';
        if(isset($this->sets[1][0]) && $this->sets[1][0] !== null){
          $tabletStyles .= 'width: '.$this->sets[1][0].'px;';
        }
        if(isset($this->sets[1][1]) && $this->sets[1][1] !== null){
          $tabletStyles .= 'width:auto; height: '.$this->sets[1][1].'px;';
        }
        $tabletStyles.='}';
      }
      if (isset($this->sets[2])){
        $mobileStyles.='@media (max-width: 767px) {';
        if(isset($this->sets[2][0]) && $this->sets[2][0] !== null){
          $mobileStyles .= 'width: '.$this->sets[2][0].'px;';
        }
        if(isset($this->sets[2][1]) && $this->sets[2][1] !== null){
          $mobileStyles .= 'width:auto; height: '.$this->sets[2][1].'px;';
        }
        $mobileStyles.='}';
      }

      $srcToClassName = str_replace(['/', '.', ':'], '', $this->src);
      $picture .= '
      <style>
        .'.$srcToClassName.'{
            '.$mobileStyles.'
            '.$tabletStyles.'
            '.$desktopStyles.'
        }
      </style>
      <object
        type="image/svg+xml"
        data="'.$this->src.'"
        width="100%"
        height="100%"
        title="'.$this->alt.'"
        class="'.$srcToClassName.'"
        aria-hidden="true"
      ></object>';

    } else {


      $picture .= '<picture>';
      if (isset($this->sets[2])) {
        $image_path = aq_resize($this->src, $this->getImageDim($this->sets[2][0]) , $this->getImageDim($this->sets[2][1]) , $this->crop, true, $this->upscale);
        $image_path_original = aq_resize(str_replace('.webp', '', $this->src), $this->getImageDim($this->sets[2][0]) , $this->getImageDim($this->sets[2][1]) , $this->crop, true, $this->upscale);
        $picture .= "<source media=\"(max-width: 767px)\" srcset=\"{$image_path}\" type=\"image/webp\">";
        $picture .= "<source media=\"(max-width: 767px)\" srcset=\"{$image_path_original}\" type=\"image/jpeg\">";
      }

      if (isset($this->sets[1])) {
        $image_path = aq_resize($this->src, $this->getImageDim($this->sets[1][0]) , $this->getImageDim($this->sets[1][1]) , $this->crop, true, $this->upscale);
        $image_path_original = aq_resize(str_replace('.webp', '', $this->src), $this->getImageDim($this->sets[1][0]) , $this->getImageDim($this->sets[1][1]) , $this->crop, true, $this->upscale);
        $picture .= "<source media=\"(min-width: 767px and max-width: 1279px)\" srcset=\"{$image_path}\" type=\"image/webp\">";
        $picture .= "<source media=\"(min-width: 767px and max-width: 1279px)\" srcset=\"{$image_path_original}\" type=\"image/jpeg\">";
      }
      if ($this->sets[0][0] === null && $this->sets[0][1] === null) {
        $this->sets[0][0] = 600;
        $this->sets[0][1] = 400;
      }

        $image_path = aq_resize($this->src, $this->getImageDim($this->sets[0][0]), $this->getImageDim($this->sets[0][1]), $this->crop, true, $this->upscale);
        $image_path_original = aq_resize(str_replace('.webp', '', $this->src), $this->getImageDim($this->sets[0][0]) , $this->getImageDim($this->sets[0][1]), $this->crop, true, $this->upscale);

        $picture .= "<source media=\"(min-width: 1280px)\" srcset=\"{$image_path}\" type=\"image/webp\">";
        $picture .= "<source media=\"(min-width: 1280px)\" srcset=\"{$image_path_original}\" type=\"image/jpeg\">";


        $picture .= "<img class=\"{$this->class}\" src=\"{$image_path_original}\" alt=\"{$this->alt}\" width=\"{$this->sets[0][0]}\" height=\"{$this->sets[0][1]}\" loading=\"{$this->is_lazy_loaded()}\" />";

      $picture .= '</picture>';
    }

    echo $picture;
  }
}