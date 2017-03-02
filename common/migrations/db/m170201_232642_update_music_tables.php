<?php

use yii\db\Migration;

class m170201_232642_update_music_tables extends Migration
{
    public function up()
    {
        $this->dropTable('music_tag');
        $this->dropTable('music_album_tag');
        $this->dropColumn('music_album', 'views');

        $this->addColumn('music_album', 'tags', "VARCHAR(255) NULL");
        $this->addColumn('music_album', 'views', "INT  NOT NULL DEFAULT '0'");
    }

    public function down()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('music_tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('music_album_tag', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ], $tableOptions);

        $this->dropColumn('music_album', 'tags');


    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
