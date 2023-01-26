<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{pager}<div class="">{items}</div>{pager}',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
        //$item = Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);

            //Создаём карточку товара, которая помещается в переменную $card.
            $card = '<div class="card" style="width: 18rem;">
                        <img class="card-img-top card-image" src="'. Yii::getAlias('@img/Products/'). $model->main_photo_path .'" alt="Card image cap">
                            <p class="card-title">'.Html::a(Html::encode($model->title), ['view', 'id' => $model->id]).'</p>
                            <p class="card-category">'. $model->category->title .'</p>                        
                    </div>';

            //Выводим карточку товара
            return $card;
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
