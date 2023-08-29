<?php

namespace Sikessem\UI\Components;

use Sikessem\UI\FormControl;

class Textarea extends FormControl
{
    public string $name;

    public string $id;

    public bool $invalid;

    public ?string $value;

    public function __construct(
        string $name,
        string $id = null,
        string|array $value = null,
        string $current = null,
        string $default = null,
        bool $invalid = false,
        public ?string $icon = null,
    ) {
        parent::__construct('textarea');
        $id ??= $name;
        $value = (array) $value;
        $current ??= $value['current'] ?? $value[0] ?? null;
        $default ??= $value['default'] ?? $value[1] ?? $value[0] ?? null;
        $value = old($name) ?: $current ?? $default;
        $this->name = $name;
        $this->id = $id;
        $this->invalid = $invalid;
        $this->value = $value;
    }
}
