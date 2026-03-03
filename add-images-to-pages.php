<?php

/**
 * Update pages with images using direct node IDs.
 * Run with: drush scr add-images-to-pages.php
 */

$img_base = '/themes/custom/compsci/images';

$updates = [
  3 => [ // About Us
    'prepend' => "<div class=\"cs-page-banner\"><img src=\"{$img_base}/gallery-stellenboschcampus.jpg\" alt=\"Stellenbosch University Campus\" style=\"width:100%;max-height:340px;object-fit:cover;border-radius:8px;margin-bottom:24px;\"></div>",
    'after_first_p' => "<div style=\"display:flex;gap:24px;margin:24px 0;flex-wrap:wrap;\"><img src=\"{$img_base}/gallery-campus.jpg\" alt=\"Campus view\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"><img src=\"{$img_base}/gallery-collab.jpg\" alt=\"Collaboration\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"></div>",
  ],
  4 => [ // Research
    'prepend' => "<div class=\"cs-page-banner\"><img src=\"{$img_base}/gallery-research.jpg\" alt=\"Research at Stellenbosch CS\" style=\"width:100%;max-height:340px;object-fit:cover;border-radius:8px;margin-bottom:24px;\"></div>",
    'after_first_p' => "<div style=\"display:flex;gap:24px;margin:24px 0;flex-wrap:wrap;\"><img src=\"{$img_base}/gallery-research2.jpeg\" alt=\"Research lab\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"><img src=\"{$img_base}/awardwinningresearchSU.png\" alt=\"Award winning research\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"></div>",
  ],
  5 => [ // Undergraduate
    'prepend' => "<div class=\"cs-page-banner\"><img src=\"{$img_base}/gallery-undergrad1.jpeg\" alt=\"Undergraduate students\" style=\"width:100%;max-height:340px;object-fit:cover;border-radius:8px;margin-bottom:24px;\"></div>",
    'after_first_p' => "<div style=\"display:flex;gap:24px;margin:24px 0;flex-wrap:wrap;\"><img src=\"{$img_base}/gallery-undergrad2.jpg\" alt=\"Undergraduate life\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"><img src=\"{$img_base}/gallery-lab.jpg\" alt=\"Computer lab\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"></div>",
  ],
  9 => [ // Postgraduate
    'prepend' => "<div class=\"cs-page-banner\"><img src=\"{$img_base}/gallery-postgrad1.jpg\" alt=\"Postgraduate students\" style=\"width:100%;max-height:340px;object-fit:cover;border-radius:8px;margin-bottom:24px;\"></div>",
    'after_first_p' => "<div style=\"display:flex;gap:24px;margin:24px 0;flex-wrap:wrap;\"><img src=\"{$img_base}/postgrad2.jpg\" alt=\"Postgraduate research\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"><img src=\"{$img_base}/gallery-grad.jpg\" alt=\"Graduation\" style=\"width:48%;min-width:260px;border-radius:8px;object-fit:cover;max-height:260px;\"></div>",
  ],
];

$node_storage = \Drupal::entityTypeManager()->getStorage('node');

foreach ($updates as $nid => $images) {
  $node = $node_storage->load($nid);
  if (!$node) {
    echo "Node $nid not found\n";
    continue;
  }

  $body = $node->get('body')->value ?? '';

  // Prepend banner image at the top
  $body = $images['prepend'] . "\n" . $body;

  // Insert image grid after the first </p>
  $first_p_end = strpos($body, '</p>');
  if ($first_p_end !== false) {
    $insert_pos = $first_p_end + 4;
    $body = substr($body, 0, $insert_pos) . "\n" . $images['after_first_p'] . "\n" . substr($body, $insert_pos);
  }

  $node->set('body', [
    'value' => $body,
    'format' => 'full_html',
  ]);
  $node->save();
  echo "Updated: " . $node->getTitle() . " (node/$nid) with images\n";
}

echo "\nDone!\n";
