<?php

use yii\db\Migration;

class m170201_005732_add_data_music_genre extends Migration
{

    public  $genres = [
        'African',
        'Asian',
        'Avant-garde',
        'Blues',
        'Caribbean and Caribbean-influenced',
        'Comedy',
        'Country',
        'Easy listening',
        'Electronic',
        'Folk',
        'Hip hop',
        'Jazz',
        'Latin',
        'Pop',
        'R&B and soul',
        'Rock',
    ];

    public function up()
    {
        foreach ($this->genres as $item){
            $this->insert('music_genre', [
                'name' => $item
            ]);
        }

    }

    public function down()
    {
        foreach ($this->genres as $item){
            $this->delete('music_genre', ['name' => $item]);
        }
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
