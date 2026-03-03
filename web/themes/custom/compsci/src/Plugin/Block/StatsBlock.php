<?php

namespace Drupal\compsci\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Department Stats block.
 *
 * @Block(
 *   id = "compsci_stats_block",
 *   admin_label = @Translation("CS Department Stats"),
 *   category = @Translation("ComSci"),
 * )
 */
class StatsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->getStatsHtml(),
      '#attached' => [
        'library' => ['compsci/counters'],
      ],
    ];
  }

  /**
   * Generate the HTML for stats.
   */
  private function getStatsHtml() {
    return <<<HTML
<section class="cs-stats" aria-label="Department statistics">
  <div class="cs-stats__inner">
    <article class="cs-stat">
      <p class="cs-stat__number" data-count-to="812" data-prefix="+">0</p>
      <p class="cs-stat__label">Postgrad graduates since 2005</p>
    </article>
    <article class="cs-stat">
      <p class="cs-stat__number" data-count-to="27" data-prefix="+">0</p>
      <p class="cs-stat__label">Research groups and labs</p>
    </article>
    <article class="cs-stat">
      <p class="cs-stat__number" data-count-to="149" data-prefix="">0</p>
      <p class="cs-stat__label">Publications since 2018</p>
    </article>
    <article class="cs-stat">
      <p class="cs-stat__number" data-count-to="1972" data-count-from="1800" data-prefix="">1800</p>
      <p class="cs-stat__label">Founded</p>
    </article>
  </div>
</section>
HTML;
  }

}
