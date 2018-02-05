<?php

class ProductHelper {
  public static function get_price ( $id ) {
    return get_post_meta( $id, '_regular_price', true);
  }

  public static function get_product_photo( $id ) {
    return get_the_post_thumbnail_url( $id, 'full' );
  }
}
