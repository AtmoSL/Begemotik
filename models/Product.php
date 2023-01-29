<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $count
 * @property int $category_id
 * @property string $main_photo_path
 * @property int $bought
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'count'], 'required'],
            [['description'], 'string'],
            [['count', 'category_id', 'bought'], 'integer'],
            [['title', 'main_photo_path'], 'string', 'max' => 65],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'count' => 'Count',
            'category_id' => 'Category ID',
            'main_photo_path' => 'Main Photo Path',
            'bought' => 'Bought',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
