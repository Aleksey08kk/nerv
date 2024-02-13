<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%task_from_viewer}}`.
 */
class m240130_164655_drop_count_like_column_from_task_from_viewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('task_from_viewer', 'count_like');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('task_from_viewer', 'count_like', $this->integer());
    }
}
