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
 * @property int|null $category_id
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
            [['title', 'description', 'count', 'category_id'], 'required'],
            [['description'], 'string'],
            [['count', 'category_id'], 'integer'],
            [['title'], 'string', 'max' => 65],
            [['category_id'], 'exist', 'skipOnError' => false, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
