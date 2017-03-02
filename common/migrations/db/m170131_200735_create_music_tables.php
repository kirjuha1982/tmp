<?php

use yii\db\Migration;

class m170131_200735_create_music_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('music_artist', [
            'id' => $this->primaryKey(),
            'letter' => $this->integer(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);


        $this->createTable('music_genre', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);


        $this->createTable('music_tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);


        $this->createTable('music_album', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'year' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
            'views' => $this->string(),
            'active' => $this->smallInteger(1)->defaultValue(1),
        ], $tableOptions);


        $this->createTable('music_album_tag', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ], $tableOptions);



        $this->createTable('music_song', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'description' => $this->text(),
            'file' => $this->string(),
            'length' => $this->integer(),
            'sort' => $this->integer()->defaultValue(0),
            'views' => $this->string(),
            'active' => $this->smallInteger(1)->defaultValue(1),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('music_artist');
        $this->dropTable('music_genre');
        $this->dropTable('music_tag');
        $this->dropTable('music_album');
        $this->dropTable('music_album_tag');
        $this->dropTable('music_song');

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
