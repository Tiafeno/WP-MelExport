<?php
class Primary_Walker extends Walker_Nav_Menu {
  
    /** 
    * Tell Walker where to inherit it's parent and id values 
    */
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    function start_lvl( &$output, $depth = 0, $args = []) { //ul
      $indent = str_repeat("\t",$depth);
      $submenu = ($depth > 0) ? ' ' : ' uk-navbar-dropdown-nav';
      $output .= "\n$indent <div class=\"uk-navbar-dropdown\"> <ul class=\"uk-nav$submenu \">\n";  
    } 

    function end_lvl( &$output, $depth = 0, $args = array()) {
      $verify = isset( $args->item_spacing ) && 'discard' === $args->item_spacing;
      $t = $verify ? '' : "\t";
      $n = $verify ? '' : "\n";
      $indent = str_repeat( $t, $depth );
      $output .= "$indent</ul></div>{$n}";
    }

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $verify = isset( $args->item_spacing ) && 'discard' === $args->item_spacing;
      $t = $verify ? '' : "\t";
      $n = $verify ? '' : "\n";
      $indent = ( $depth ) ? str_repeat($t, $depth) : '';
      
      $class_names = $value = '';
  
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = ($item->current || $item->current_item_anchestor) ? 'uk-active' : '';
      if( $args->walker->has_children ){
          $classes[] = '';
      }
  
      $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = ' class="' . esc_attr($class_names) . '"';
  
      $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
      $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
  
      $output .= $indent . '<li' . $id . $value . $class_names . '>';
  
      $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
      $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
      $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
  
      $item_output = $args->before;
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;
  
      $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
    }
}

class Social_Walker extends Walker_Nav_Menu {
    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $verify = isset( $args->item_spacing ) && 'discard' === $args->item_spacing;
      $t = $verify ? '' : "\t";
      $n = $verify ? '' : "\n";
      $indent = ( $depth ) ? str_repeat($t, $depth) : '';
      
      $attributes = !empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
      $item_output = $args->before;
      $item_output .= '<a'.$attributes.' class="uk-icon-button" uk-icon="icon: '.$item->title.'"> </a>';
      $item_output .= $args->after;
  
      $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $verify = isset( $args->item_spacing ) && 'discard' === $args->item_spacing;
      $n = $verify ? '' : "\n";
      $output .= $n;
  }
} 