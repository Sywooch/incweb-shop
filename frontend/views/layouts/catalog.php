<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Shop\CategoriesWidget;

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>

<section class="section-p-30px pages-in">
    <div class="container">
        <div class="row">



            <!--======= SIDE BAR =========-->
            <div class="col-sm-3 animate fadeInLeft" data-wow-delay="0.2s">
                <div class="side-bar">
                    <h4>Меню</h4>

                    <!-- HEADING -->
                    <div class="heading">
                        <h6>КАТЕГОРИИ</h6>
                    </div>
                    <!-- CATEGORIES -->
                        <?= CategoriesWidget::widget([
                            'active' => $this->params['active_category'] ?? null
                        ]) ?>

                </div>
            </div>

            <?= $content ?>

        </div>
    </div>
</section>
<?php
$script = <<<JS
$("#price-range").noUiSlider({
    range: {
      'min': [ 0 ],
      'max': [ 1000 ]
    },
    start: [80, 940],
        connect:true,
        serialization:{
            lower: [
        $.Link({
          target: $("#price-min")
        })
      ],
      upper: [
        $.Link({
          target: $("#price-max")
        })
      ],
      format: {
      // Set formatting
        decimals: 2,
        prefix: '$'
      }
        }
  })

JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
<?php $this->endContent() ?>





