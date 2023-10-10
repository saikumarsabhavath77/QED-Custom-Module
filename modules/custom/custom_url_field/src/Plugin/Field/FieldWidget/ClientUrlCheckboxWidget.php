// File: modules/custom/custom_url_field/src/Plugin/Field/FieldWidget/ClientUrlCheckboxWidget.php

namespace Drupal\custom_module\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'client_url_checkbox' widget.
 *
 * @FieldWidget(
 *   id = "client_url_checkbox",
 *   label = @Translation("Client URL Checkbox"),
 *   field_types = {
 *     "client_url"
 *   }
 * )
 */
class ClientUrlCheckboxWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $options = [
      'googe.com' => 'googe.com',
      'www.google.com' => 'www.google.com',
      'google.co.in' => 'google.co.in',
      'test.google.co.in' => 'test.google.co.in',
      'bing.com' => 'bing.com',
      'qed42.net' => 'qed42.net',
      'test.qed42.net' => 'test.qed42.net',
      'two.qed42.net' => 'two.qed42.net',
    ];

    $value = isset($items[$delta]->value) ? $items[$delta]->value : [];

    $element['value'] = [
      '#type' => 'checkboxes',
      '#options' => $options,
      '#default_value' => $value,
    ];

    return $element;
  }
}

