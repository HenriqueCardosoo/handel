<?php
// Template name: Home
get_header(); ?>

<pre>

<?php
$products_slide = wc_get_products([
  "limit" => 6,
  "tag" => ["slide"],
]);

function format_products($products) {
  $products_final = [];
  foreach($products as $product) {
    $products_final[] = [
      'name' => $product->get_name(),
      'price' => $product->get_price_html(),
      'img' => wp_get_attachment_image_src($product->get_image_id(), "slide")[0],
      'link' => $product->get_permalink(),
    ];
  }
  return $products_final;
}

$slide = format_products($products_slide);

print_r($slide);
?>
</pre>

<?php if(have_posts()) { while (have_posts()) { the_post(); ?>
  
<?php } } ?>

<?php get_footer(); ?>