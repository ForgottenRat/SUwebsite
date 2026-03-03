<?php

namespace Drupal\cs_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\RendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for CS Pages.
 */
class CsPagesController extends ControllerBase {

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * Constructor.
   */
  public function __construct(RendererInterface $renderer) {
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('renderer')
    );
  }

  /**
   * About page callback.
   */
  public function about() {
    return [
      '#theme' => 'compsci_page_about',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Research page callback.
   */
  public function research() {
    return [
      '#theme' => 'compsci_page_research',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Undergraduate page callback.
   */
  public function undergraduate() {
    return [
      '#theme' => 'compsci_page_undergraduate',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Undergraduate Modules page callback.
   */
  public function undergraduateModules() {
    return [
      '#theme' => 'compsci_page_undergraduate_modules',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Undergraduate Programmes page callback.
   */
  public function undergraduateProgrammes() {
    return [
      '#theme' => 'compsci_page_undergraduate_programmes',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Prospective Undergraduate Students page callback.
   */
  public function undergraduateProspective() {
    return [
      '#theme' => 'compsci_page_undergraduate_prospective',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Postgraduate page callback.
   */
  public function postgraduate() {
    return [
      '#theme' => 'compsci_page_postgraduate',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Postgraduate Modules page callback.
   */
  public function postgraduateModules() {
    return [
      '#theme' => 'compsci_page_postgraduate_modules',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Postgraduate Honours page callback.
   */
  public function postgraduateHonours() {
    return [
      '#theme' => 'compsci_page_postgraduate_honours',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Postgraduate Masters page callback.
   */
  public function postgraduateMasters() {
    return [
      '#theme' => 'compsci_page_postgraduate_masters',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Postgraduate PhD page callback.
   */
  public function postgraduatePhd() {
    return [
      '#theme' => 'compsci_page_postgraduate_phd',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Prospective Postgraduate Students page callback.
   */
  public function postgraduateProspective() {
    return [
      '#theme' => 'compsci_page_postgraduate_prospective',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * News page callback.
   */
  /**
   * Research Publications page callback.
   */
  public function researchPublications() {
    return [
      '#theme' => 'compsci_page_research_publications',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  public function events() {
    return [
      '#theme' => 'compsci_page_events',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  public function news() {
    return [
      '#theme' => 'compsci_page_news',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Contact page callback.
   */
  public function contact() {
    return [
      '#theme' => 'compsci_page_contact',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

  /**
   * Student Resources page callback.
   */
  public function studentResources() {
    return [
      '#theme' => 'compsci_page_student_resources',
      '#attached' => [
        'library' => ['compsci/global-styling'],
      ],
    ];
  }

}
