<?php

// Bootstrap Drupal
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/web/core/includes/bootstrap.inc';

try {
  \Drupal::service('database');
  
  // New content text
  $new_text = "Welcome to the Computer Science Department at Stellenbosch University, a hub of innovative research and exceptional education. Our department is dedicated to advancing computational thinking, developing foundational technologies, and solving real-world problems through computer science. With a commitment to academic excellence, our undergraduate and postgraduate programmes offer comprehensive training in core computer science disciplines, emerging technologies, and practical applications.\n\nJoin us in exploring cutting-edge research areas including artificial intelligence, software engineering, cybersecurity, and computational science, and contribute to technological innovations that shape our future.";
  
  // Update the node body field directly in database
  $query = \Drupal::database()->update('node__body')
    ->fields(['body_value' => $new_text])
    ->condition('entity_id', 1) // Assuming node 1 is the homepage
    ->execute();
    
  // Also update the revision table
  \Drupal::database()->update('node_revision__body')
    ->fields(['body_value' => $new_text])
    ->condition('entity_id', 1)
    ->execute();
  
  echo "Content updated successfully!\n";
  
} catch (Exception $e) {
  echo "Error: " . $e->getMessage() . "\n";
}
