<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_photo".
 *
 * @property int $id
 * @property string $photo_path
 * @property int $product_id
 * @property int $hidden
 */
class ProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo_path', 'product_id'], 'required'],
            [['product_id', 'hidden'], 'integer'],
            [['photo_path'], 'string', 'max' => 65],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_path' => 'Photo Path',
            'product_id' => 'Product ID',
            'hidden' => 'Hidden',
        ];
    }
}
