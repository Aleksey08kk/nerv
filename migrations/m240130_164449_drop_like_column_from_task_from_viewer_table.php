<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%task_from_viewer}}`.
 */
class m240130_164449_drop_like_column_from_task_from_viewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('task_from_viewer', 'like');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('task_from_viewer', 'like', $this->integer());
    }
}
