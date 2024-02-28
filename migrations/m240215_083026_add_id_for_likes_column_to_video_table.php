<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%video}}`.
 */
class m240215_083026_add_id_for_likes_column_to_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('video', 'id_for_likes', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('video', 'id_for_likes');
    }
}
