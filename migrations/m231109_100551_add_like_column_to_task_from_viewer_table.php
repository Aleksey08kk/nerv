<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%task_from_viewer}}`.
 */
class m231109_100551_add_like_column_to_task_from_viewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task_from_viewer', 'like', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task_from_viewer', 'like');
    }
}
