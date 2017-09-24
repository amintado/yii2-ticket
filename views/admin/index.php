<?php
/** @var \amintado\ticket\models\TicketHead $dataProvider */
?>

<div class="panel page-block">
    <div class="container-fluid row">
    <a href="<?= \yii\helpers\Url::toRoute(['admin/open']) ?>" class="btn btn-primary" style="margin-left: 15px">نوشتن</a>
    <br><br>
    <div class="container-fluid">
        <div class="col-md-12">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'rowOptions'   => function ($model) {
                    $background = '';
                    if ($model->status == 0 || $model->status == 1) {
                        $background = 'background:#E6E6FA';
                    }
                    return [
                        'style'   => "cursor:pointer;" . $background,
                    ];
                },
                'columns'      => [
                    [
                        'attribute' => 'userName',
                        'value'     => 'userName.username',
                    ],
                    [
                        'attribute' => 'department',
                        'value'     => 'department',
                    ],
                    [
                        'attribute' => 'topic',
                        'value'     => 'topic',
                    ],
                    [
                        'attribute' => 'status',
                        'value'     => function ($model) {
                            switch ($model->body['client']) {
                                case 0 :
                                    if ($model->status == \amintado\ticket\models\TicketHead::CLOSED) {
                                        return '<div class="label label-success">مشتری</div>&nbsp;<div class="label label-default">بسته شده</div>';
                                    }

                                    return '<div class="label label-success">مشتری</div>';
                                case 1 :
                                    if ($model->status == \amintado\ticket\models\TicketHead::CLOSED) {
                                        return '<div class="label label-primary">مدیر</div>&nbsp;<div class="label label-default">بسته شده</div>';
                                    }

                                    return '<div class="label label-primary">مدیر</div>';
                            }
                        },
                        'format'    => 'html',
                    ],
                    [
                        'attribute' => 'date_update',
<<<<<<< HEAD
                        'value'     => function($model){
                            $function= new amintado\base\AmintadoFunctions();
                            return $function->convertdatetime($model->date_update);
=======
                        'value'          => function($model){
                            /**
                             * @var $model TicketHead
                             */
                            if (!empty($model->date_update)){
                                return Yii::$app->functions->convertdatetime($model->date_update);
                            }
>>>>>>> 9ca692f2dcafeaa0b83d13fd8b9007a87d19a6c9
                        },
                    ],
                    [
                        'class'         => 'yii\grid\ActionColumn',
                        'template'      => '{update}&nbsp;{delete}&nbsp;{closed}',
                        'headerOptions' => [
                            'style' => 'width:230px',
                        ],
                        'buttons'       => [
                            'update' => function ($url, $model) {
                                return \yii\helpers\Html::a('پاسخ',
                                    \yii\helpers\Url::toRoute(['admin/answer', 'id' => $model['id']]),
                                    ['class' => 'btn-xs btn-info']);
                            },
                            'delete' => function ($url, $model) {
                                return \yii\helpers\Html::a('حذف',
                                    \yii\helpers\Url::to(['admin/delete', 'id' => $model['id']]),
                                    [
                                        'class'   => 'btn-xs btn-danger',
                                        'onclick' => 'return confirm("آیا از حذف این مورد اطمینان کامل را دارید؟")',
                                    ]
                                );
                            },
                            'closed' => function ($url, $model) {
                                return \yii\helpers\Html::a('بستن',
                                    \yii\helpers\Url::to(['admin/closed', 'id' => $model['id']]),
                                    [
                                        'class'   => 'btn-xs btn-primary',
                                        'onclick' => 'return confirm("آیا برای بستن این تیکت اطمینان دارید؟")',
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]) ?>
        </div>
    </div>