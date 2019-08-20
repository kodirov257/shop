<?php


namespace shop\entities\Shop\Product;


use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $product_id [int(11)]
 * @property string $code
 * @property string $name
 * @property string $price
 */
class Modification extends ActiveRecord
{
    public static function create($code, $name, $price): self
    {
        $modification = new static();
        $modification->code = $code;
        $modification->name = $name;
        $modification->price = $price;
        return $modification;
    }

    public function edit($code, $name, $price): void
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function isCodeEqualTo($code): bool
    {
        return $this->code == $code;
    }

    public static function tableName(): string
    {
        return '{{%shop_modifications}}';
    }
}