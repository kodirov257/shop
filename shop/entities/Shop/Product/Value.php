<?php


namespace shop\entities\Shop\Product;


use yii\db\ActiveRecord;

/**
 * @property integer $characteristic_id
 * @property string $value
 * @property int $product_id [int(11)]
 */
class Value extends ActiveRecord
{
    public static function create($characteristicId, $value): self
    {
        $object = new static();
        $object->characteristic_id = $characteristicId;
        $object->value = $value;
        return $object;
    }

    public static function blank($characteristicId): self
    {
        $object = new static();
        $object->characteristic_id = $characteristicId;
        return $object;
    }

    public function change($value): void
    {
        $this->value = $value;
    }

    public function isForCharacteristic($id): bool
    {
        return $this->characteristic_id == $id;
    }

    public static function tableName()
    {
        return '{{%shop_values}}';
    }
}