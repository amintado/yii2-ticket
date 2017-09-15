<?php

use amintado\base\AmintadoFunctions;
use yii\helpers\Url;
use amintado\ticket\Translation;
use amintado\ticket\models\TicketHead;

/** @var TicketHead $dataProvider */

$this->title = 'پشتیبانی';

$this->registerJs("

    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
           location.href = '" . Url::toRoute(['ticket/view', 'id' => '']) . "' + id ;
    });

");
?>
<div class="panel page-block">
    <div class="container-fluid row">
        <div class="col-lg-12">
            <a type="button" href="<?= Url::to(['ticket/open']) ?>" class="btn btn-primary pull-right"
               style="margin-right: 10px">باز کردن</a>
            <div class="clearfix" style="margin-bottom: 10px"></div>
            <div>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'rowOptions'   => function ($model) {
                        return ['data-id' => $model->id, 'class' => 'ticket'];
                    },
                    'columns'      => [
                        'department',
                        'topic',
                        [
                            'contentOptions' => [
                                'style' => 'text-align:center;',
                            ],
                            'value'          => function ($model) {
                                switch ($model['status']) {
                                    case TicketHead::OPEN :
                                        return '<div class="label label-default">در انتظار پاسخ</div>';
                                    case TicketHead::WAIT :
                                        return '<div class="label label-warning">پاسخ مشتری</div>';
                                    case TicketHead::ANSWER :
                                        return '<div class="label label-success">پاسخ داده شده</div>';
                                    case TicketHead::CLOSED :
                                        return '<div class="label label-info">بسته شده</div>';
                                }
                            },
                            'format'         => 'html',
                        ],
                        [
                            'contentOptions' => [
                                'style' => 'text-align:right; font-size:13px',
                            ],
                            'attribute'      => 'date_update',
                            'value'          => function($model){
                                /**
                                 * @var $model TicketHead
                                 */
                                if (!empty($model->date_update)){
                                    return AmintadoFunctions::convertdatetime($model->date_update);
                                }
                            },
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

