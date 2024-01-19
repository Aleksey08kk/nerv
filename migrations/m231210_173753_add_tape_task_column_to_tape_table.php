<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tape}}`.
 */
class m231210_173753_add_tape_task_column_to_tape_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tape', 'tape_task', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tape', 'tape_task');
    }
}
