<?php

namespace NormanHuth\SecretField;

use Laravel\Nova\Fields\Text as Field;

class SecretField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'secret-field';

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->withMeta([
            'showCopyToClipboard' => true,
            'copiedMsg' => __('Copied'),
            'failedMsg' => __('Copying failed'),
        ]);
    }

    public function copiedMsg(string $message)
    {
        return $this->withMeta(['copiedMsg' => __('Copied')]);
    }

    public function failedMsg(string $message)
    {
        return $this->withMeta(['failedMsg' => __('Copied')]);
    }

    public function disableClipboard(): SecretField
    {
        return $this->withMeta(['showCopyToClipboard' => false]);
    }
}
