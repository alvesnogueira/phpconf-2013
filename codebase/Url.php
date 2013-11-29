<?php

namespace Codebase;

class Url {

  public function base( $add = "" ) {
    $protocol = ( !empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) ? "https://" : "http://";
    $root    = $protocol . $_SERVER['HTTP_HOST'];
    $root   .= str_replace( basename( $_SERVER['SCRIPT_NAME'] ), "", $_SERVER['SCRIPT_NAME'] );
    $out     = rtrim( $root, "/" ) . "/" . $add;

    return $out;
  }

  public function current( $query = array() ) {
    $concat = "";
    if ( !is_array($query) ) {
      $concat = $query;
    } elseif ( is_array($query) && !empty($query) ) {
      parse_str($_SERVER["QUERY_STRING"], $query_string);
      $concat = '?' . http_build_query(array_merge( $query_string, $query));
    }

    $index  = str_replace( $_SERVER["DOCUMENT_ROOT"], "", $_SERVER["SCRIPT_FILENAME"] );
    $route  = trim( str_replace( $index, "", $_SERVER["PHP_SELF"] ), "/" );
    $out    = $this->base( $route . $concat );

    return $out;
  }

  public function segment( $segment, $route = "" ) {
    if ( !empty($route) ) {
      $segments = explode( "/", $route);
    } else {
      $segments = explode( "/", trim( str_replace( $this->base(), '', $this->current() ), "/" ) );
    }
    return  !isset( $segments[ ($segment) ] ) ? '' : @iconv('utf-8', 'utf-8', $segments[ ($segment) ] );
  }

  public function segments( $route = "" ) {
    if ( !empty($route) ) {
      $segments = explode( "/", $route);
    } else {
      $segments = explode( "/", trim( str_replace( $this->base(), '', $this->current() ), "/" ) );
    }
    return  $segments;
  }

}