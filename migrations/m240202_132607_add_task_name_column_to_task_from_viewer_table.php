<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%task_from_viewer}}`.
 */
class m240202_132607_add_task_name_column_to_task_from_viewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task_from_viewer', 'task_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task_from_viewer', 'task_name');
    }
}
