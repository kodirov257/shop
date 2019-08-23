<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_products}}`.
 */
class m190812_074252_create_shop_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%shop_products}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'price_old' => $this->integer(),
            'price_new' => $this->integer(),
            'rating' => $this->decimal(3, 2),
            'meta_json' => $this->text(),
            'created_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_products-code}}', '{{%shop_products}}', 'code', true);

        $this->createIndex('{{%idx-shop_products-category_id}}', '{{%shop_products}}', 'category_id');
        $this->createIndex('{{%idx-shop_products-brand_id}}', '{{%shop_products}}', 'brand_id');

        $this->addForeignKey('{{%fk-shop_products-category_id}}', '{{%shop_products}}', 'category_id', '{{%shop_categories}}', 'id');
        $this->addForeignKey('{{%fk-shop_products-brand_id}}', '{{%shop_products}}', 'brand_id', '{{%shop_brands}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop_products}}');
    }
}
