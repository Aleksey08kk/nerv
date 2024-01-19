<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tape}}`.
 */
class m231209_181347_add_name_player_column_to_tape_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tape', 'name_player', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tape', 'name_player');
    }
}
