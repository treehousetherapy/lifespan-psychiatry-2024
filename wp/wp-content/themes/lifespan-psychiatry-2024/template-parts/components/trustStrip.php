<?php
/**
 * Component: TrustStrip
 * 
 * @package LifespanPsychiatry
 */

// Extract parameters with defaults
$title = $args['title'] ?? '';
$content = $args['content'] ?? '';
?>

<div class="component-trustStrip">
  <?php if ($title): ?>
    <h2 class="component-title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>
  
  <?php if ($content): ?>
    <div class="component-content">
      <?php echo wp_kses_post($content); ?>
    </div>
  <?php endif; ?>
</div>
