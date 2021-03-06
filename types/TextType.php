<?php

namespace extpoint\yii2\types;

use extpoint\yii2\base\Type;
use yii\db\Schema;

class TextType extends Type
{
    public $formatter = 'ntext';

    /**
     * @return array
     */
    public function frontendConfig()
    {
        return [
            'field' => [
                'component' => 'TextAreaField',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function giiDbType($metaItem)
    {
        return Schema::TYPE_TEXT;
    }

    /**
     * @inheritdoc
     */
    public function giiRules($metaItem, &$useClasses = [])
    {
        return [
            [$metaItem->name, 'string'],
        ];
    }
}