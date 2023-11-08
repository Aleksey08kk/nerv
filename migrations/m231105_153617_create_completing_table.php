<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%completing}}`.
 */
class m231105_153617_create_completing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%completing}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'video_first'=>$this->string(),
            'video_second'=>$this->string(),
            'video_third'=>$this->string(),
            'video_fourth'=>$this->string(),
            'video_fifth'=>$this->string(),
            'video_sixth'=>$this->string(),
            'video_seventh'=>$this->string(),
            'video_eighth'=>$this->string(),
            'video_ninth'=>$this->string(),
            'video_tenth'=>$this->string(),
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%completing}}');
    }
}
