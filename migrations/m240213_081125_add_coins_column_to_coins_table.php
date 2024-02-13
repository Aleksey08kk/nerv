<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%coins}}`.
 */
class m240213_081125_add_coins_column_to_coins_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('coins', 'coins', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('coins', 'coins');
    }
}
