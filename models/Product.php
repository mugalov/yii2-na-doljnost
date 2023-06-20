<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $sku
 * @property int|null $quantity
 * @property int|null $type
 * @property string|null $image
 */
class Product extends \yii\db\ActiveRecord
{

    public $test; 
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'type'], 'integer'],
            [['name', 'sku', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sku' => 'Sku',
            'quantity' => 'Quantity',
            'type' => 'Type',
            'image' => 'Image',
        ];
    }
}
