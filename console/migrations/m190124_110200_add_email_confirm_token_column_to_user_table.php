<?php

use \yii\db\Migration;

class m190124_110200_add_email_confirm_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%users}}', 'email_confirm_token', $this->string()->defaultValue(null)->after('email'));
    }

    public function down()
    {
        $this->dropColumn('{{%users}}', 'email_confirm_token');
    }
}
