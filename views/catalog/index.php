<?php

/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

if (!empty($brand_title)) {
    $this->params['breadcrumbs'][] = $brand_title;
    if (!empty($model_title)) {
        $this->params['breadcrumbs'][] = $model_title;
    }
}
?>
<div class="site-catalog">
    <h1><?= Html::encode($title) ?></h1>

    <div class="row">
        <div class="col-md-4">
            <div class="row">
<!--                --><?php /*//Pjax::begin([
//
//                ]); ?>
<!--                --><?php //$form = ActiveForm::begin([
//                'options' => ['data' => ['pjax' => true]],
//                // more ActiveForm options
//                ]); ?>
<!---->
<!--                --><?//= $form->field($searchModel, 'engine_type_id')
//                        ->radioList(ArrayHelper::map($engines, 'id', 'name')); ?>
<!---->
<!--                --><?//= $form->field($searchModel, 'drive_id')
//                    ->radioList(ArrayHelper::map($drives, 'id', 'name')); ?>
<!---->
<!--                --><?php //ActiveForm::end();
//                Pjax::end();?>
<!---->
<!--                --><?//= Html::activeDropDownList($searchModel, 'brand_id',
//                    ArrayHelper::map($brands, 'id', 'name')); */?>

            </div>

            <ul class="nav nav-pills nav-stacked">
                <?php foreach ($brands as $brand) : ?>
                    <li <?= ($brand['seo_name'] !== $filters['brand_id']) ?: 'class="active"'; ?>>
                        <a href="<?= Url::to(['catalog/index','brand_id'=>$brand['seo_name']]);?>"><?= $brand['name']; ?></a>
                        <?php if (!empty($brand['models'])):?>
                        <ul class="nav nav-pills nav-stacked">
                            <?php foreach ($brand['models'] as $model) : ?>
                            <li <?= ($model['seo_name'] !== $filters['model_id']) ?: 'class="active"'; ?>>
                                <a href="<?= Url::to(['catalog/index','brand_id'=>$brand['seo_name'], 'model_id' => $model['seo_name']]);?>"><?= $model['name']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
        <div class="col-md-8">
            <div class="row">
                <?php  if ($dataProvider->getTotalCount() > 0):?>
                <?php foreach ($dataProvider->getModels() as $catalog) : ?>
                <div class="col-md-4">
                    <h3><?= $catalog->brand->name .' '. $catalog->model->name ?></h3>
                    <h4>Привод: <span><?= $catalog->drive->name ?></span></h4>
                    <h4>Двигатель: <span><?= $catalog->engine->name ?></span></h4>
                </div>
                <?php endforeach; ?>
                <?php else:?>
                    <h2>Нет подходящих автомобилей</h2>
                <?php endif;?>
            </div>
        </div>
    </div>

<!--    --><?php /*= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
////            'model_id',
////            'engine_type_id',
//            [
//                'attribute' => 'brand_id',
//                'value' => 'brand.name'
//            ],
//            [
//                'attribute' => 'model_id',
//                'value' => 'model.name'
//            ],
//            [
//                'attribute' => 'engine_type_id',
//                'value' => 'engine.name'
//            ],
//            [
//                'attribute' => 'drive_id',
//                'value' => 'drive.name'
//            ],
//
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); */?>
</div>
