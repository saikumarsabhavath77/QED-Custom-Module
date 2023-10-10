// File: modules/custom/custom_url_field/src/Plugin/Field/FieldFormatter/ClientUrlDomainFormatter.php

namespace Drupal\custom_module\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'client_url_domain' formatter.
 *
 * @FieldFormatter(
 *   id = "client_url_domain",
 *   label = @Translation("Client URL Domain"),
 *   field_types = {
 *     "client_url"
 *   }
 * )
 */
class ClientUrlDomainFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $url = $item->value;
      $parsed_url = parse_url($url);
      $domain = isset($parsed_url['host']) ? $parsed_url['host'] : '';

      $elements[$delta] = [
        '#markup' => $domain,
      ];
    }

    return $elements;
  }
}
