<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .kv-grid-container {
        overflow-x: auto !important;
    }

    .dropdown.open ul.dropdown-menu {
        display: flex;
        flex-wrap: wrap;
        min-width: 700px;
    }
</style>
<div class="product-index">

    


    <div class="row">
        <div class="col-md-4 mb-1">
        <h1><?= Html::encode($this->title) ?></h1>
            <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
      
    </div>


    <?php 
    $gridColumns = [
      
        [
            'ru' => 'name',
            'en' => 'name',
        ],
        [
            'ru' => 'sku',
            'en' => 'sku',
        ],
        [
            'ru' => 'quantity',
            'en' => 'quantity',
        ],
        [
            'ru' => 'type',
            'en' => 'type',
        ],
        [
            'ru' => 'image',
            'en' => 'image',
        ],

    ];

    $checkedCols = [ 
        'name',
        'sku',
        'type',
        'quantity',
        'image', 
        ]

    ?>

    



<div class="d-flex justify-content-between">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                View checked column
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php
                        $i = 0;
                        $dataKey = 1;
                        foreach ($gridColumns as $column) {
                            if(in_array($column['en'], $checkedCols)) $checked = "checked"; else $checked = " ";?>
                            <li class="dropdown-item">
                                <div class="checkbox" style="padding: 2px 5px;">
                                    <label for="check_<?= $column['en'] ?>" style="font-weight: normal;">
                                        <input class="checkSort form-check-input" id="check_<?= $column['en'] ?>" data-key="<?= $dataKey; ?>"
                                            column="<?= $column['en'] ?>" <?= $checked ?>
                                            type="checkbox"><?= $column['ru'] ?>
                                    </label>
                                </div>

                            </li>
                            <?php $i++;
                            $dataKey++;
                        } ?>

                    </ul>
            </div>

    <div> 
        <p class="delete btn btn-danger">Delete checked</p>
    </div>

</div>
        
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      
        'columns' => [
             
               
            ['class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['width' => '5%'],  
        ],
          

            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<div data-col='name'>$data->name</div>";
                }
            ],
            [
                'attribute' => 'sku',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<div data-col='sku'>$data->sku</div>";
                }
            ],
            [
                'attribute' => 'quantity',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<div data-col='quantity'>$data->quantity</div>";
                }
            ],
         
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<div data-col='type'>$data->type</div>";
                }
            ],

            [
                'attribute' => 'image',
                'format' => 'raw',
                'headerOptions' => ['width' => '100px'], 
                'value' => function ($data) {
                    return "<div data-col='image'><img width='100' src='/uploads/product/".$data->image."'></div>";
                }
            ],

            // 'name',
            // 'sku',
            // 'quantity',
            // 'type',
            // [
            //     'attribute' => 'image',
            //     'value' => function ($data){
            //         return '/uploads/product/'.$data->image;
            //     },
            //     'format' => ['image',['height' => 100]]
            // ],
            [
                // 'label' =>'Action',
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'header'=>"Actions",
                 'headerOptions' => ['width' => '7%'],  
            ],

            [    
                'label' =>'Check',
                'headerOptions' => ['width' => '5%'],    
                'format' => 'raw',    
                'value' => function ($data) {       
                 return Html::checkbox('Product[id][]', false, ['value' => $data['id'], 'class' => 'register_id form-check-input']);    }],
        ],
    ]); ?>


<?php 

$this->registerJsFile(
    'scripts/product.js',
    ['depends' => 'app\assets\AppAsset']
);
?>





</div>
