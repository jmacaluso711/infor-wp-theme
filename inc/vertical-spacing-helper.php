<?php

  function get_vertical_spacing_classes($verticalSpacing) {
    $vertical_spacing_classes = '';

    if (!empty($verticalSpacing)) {
      if ($verticalSpacing === 'none') {
        $vertical_spacing_classes .= '';
      }
      if ($verticalSpacing === 'sm') {
        $vertical_spacing_classes .= ' my-16';
      }
      if ($verticalSpacing === 'base') {
        $vertical_spacing_classes .= ' my-20';
      }
      if ($verticalSpacing === 'lg') {
        $vertical_spacing_classes .= ' my-24';
      }
      if ($verticalSpacing === 'xl') {
        $vertical_spacing_classes .= ' my-28';
      }
      if ($verticalSpacing === '2xl') {
        $vertical_spacing_classes .= ' my-32';
      }
      if ($verticalSpacing === '3xl') {
        $vertical_spacing_classes .= ' my-36';
      }
    }

    return $vertical_spacing_classes;
  }