<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%task}}`.
 */
class m231107_075601_add_number_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'number', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'number');
    }
}
