<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_characteristics}}`.
 */
class m190810_174855_create_shop_characteristics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%shop_characteristics}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type' => $this->string(16)->notNull(),
            'required' => $this->boolean()->notNull(),
            'default' => $this->string(),
            'variants_json' => 'JSON NOT NULL',
            'sort' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop_characteristics}}');
    }
}
