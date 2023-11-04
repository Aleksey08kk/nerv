<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m231103_080903_add_money_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'money', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('user', 'money');
    }
}
