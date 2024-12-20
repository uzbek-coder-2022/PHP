<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $id
 * @property string|null $title Yangilik mavzusi
 * @property string|null $description Yangilik tavsifi
 * @property int|null $views_count Ko'rishlar soni
 * @property int $created_at Yaratilgan vaqti
 * @property int $updated_at Yangilangan vaqti
 * @property string $photo_path Rasm manzili
 * @property int $author Muallif
 * @property string $category Kategoriya
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
            [['views_count', 'created_at', 'updated_at', 'author'], 'integer'],
            [['created_at', 'updated_at', 'photo_path', 'author', 'category'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['photo_path'], 'string', 'max' => 100],
            [['category'], 'string', 'max' => 20],
            [['photo_path'], 'file', 'extensions' => 'jpg, png, jpeg', 'maxSize' => 1024 * 1024 * 2], // Maksimal o'lcham 2MB
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Yangilik mavzusi',
            'description' => 'Yangilik tavsifi',
            'views_count' => 'Ko\'rishlar soni',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Yangilangan vaqti',
            'photo_path' => 'Rasm manzili',
            'author' => 'Muallif',
            'category' => 'Kategoriya',
        ];
    }
}
