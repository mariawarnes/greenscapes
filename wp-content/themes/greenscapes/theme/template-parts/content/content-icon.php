<?php
$icon = get_field('icon');

// Handle if the return type is a string.
if (is_string($icon)) {

  // If the type selected was a Dashicon, the value of $icon will be the dashicon class string.
  // If the type selected was a Media Library image, the value of $icon will be the URL to the image.
  // If the type selected was a URL, the value of $icon will be the URL to the image.
  echo esc_html($icon);
} else {
  // Handle if the return type is an array.

  // If the type selected was a Dashicon, render a div with the dashicon class.
  if ('dashicons' === $icon['type']) { ?>
    <div class="<?php echo esc_attr($icon['value']); ?>”></div>
  <?php }

  // If the type selected was a Media Library image, use the attachment ID to get and render the image.
  if ('media_library' === $icon['type']) {
    $attachment_id = $icon['value'];
    $size = 'full'; // (thumbnail, medium, large, full, or custom size)

    $image_html = wp_get_attachment_image($attachment_id, $size);
    echo wp_kses_post($image_html);
  }

  // If the type selected was a URL, render an image tag with the URL.
  if ('url' === $icon['type']) {
    $url = $icon['value']; ?>
    <img src=" <?php echo esc_url($url); ?>" alt="">
  <?php }
}
