

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'validate-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Enter your phone number</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'mobile'); ?>
        <?php echo $form->TextField($model, 'mobile'); ?>
        <?php /*echo $form->error($model,'mobile');*/ ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Accept'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->