<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $Id
 * @property string|null $title Yangilik mavzusi
 * @property string|null $description Yangilik tavsifi
 * @property int|null $views_count Ko'rishlar soni
 * @property string $created_at Yaratilgan vaqti
 * @property string $updated_at Yangilangan vaqti
 * @property string $photo_path Rasm manzili
 * @property int $author Muallif
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['views_count', 'author'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['photo_path', 'author'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['photo_path'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'title' => 'Yangilik mavzusi',
            'description' => 'Yangilik tavsifi',
            'views_count' => 'Ko\'rishlar soni',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Yangilangan vaqti',
            'photo_path' => 'Rasm manzili',
            'author' => 'Muallif',
        ];
    }
}
