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
           location.href = '" . Url::toRoute(['view', 'id' => '']) . "' + id ;
    });

");
?>
<style>
    .circle-btn {
        border-radius: 60%;
        overflow: hidden;
        position: fixed;
        line-height: normal;
        height: 60px;
        min-width: 60px;
        width: 60px;
        background-color: hsl(291.2, 63.7%, 42.2%);
        color: HSL(0, 0%, 100%);
        box-shadow: 0 2px 2px 0 hsla(291.2, 63.7%, 42.2%, 0.1), 0 3px 1px -2px hsla(291.2, 63.7%, 42.2%, 0.2), 0 1px 5px 0 hsla(291.2, 63.7%, 42.2%, 0.1);
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 0;
        will-change: box-shadow, transform;
        transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        white-space: nowrap;
        text-indent: 0;
        text-shadow: none;
        -moz-appearance: button;
        -moz-binding: none;
        font-size: 19px;
        padding: 19px 20px;
        bottom: 56px;
        right: 189px;
        z-index: 99999;
    }
    .circle-btn:hover{
        box-shadow: 0 14px 26px -12px hsla(291.2, 63.7%, 42.2%, 0.4), 0 4px 23px 0px hsla(0, 0%, 0%, 0.1), 0 8px 10px -5px hsla(291.2, 63.7%, 42.2%, 0.2);
        color: white;
    }
</style>
<div class="panel page-block">
    <div class="container-fluid row">
        <div class="col-lg-12">
            <a type="button" href="<?= Url::to(['open']) ?>" class="circle-btn pull-right"
               style="margin-right: 10px"><span class="glyphicon glyphicon-plus"></span> </a>
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
<<<<<<< HEAD:views/default/index.php
                            'attribute' => 'date_update',
                            'value'     => function($model){
                                $function= new amintado\base\AmintadoFunctions();
                                return $function->convertdatetime($model->date_update);
=======
                            'attribute'      => 'date_update',
                            'value'          => function($model){
                                /**
                                 * @var $model TicketHead
                                 */
                                if (!empty($model->date_update)){
                                    return AmintadoFunctions::convertdatetime($model->date_update);
                                }
>>>>>>> 9ca692f2dcafeaa0b83d13fd8b9007a87d19a6c9:views/ticket/index.php
                            },
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

