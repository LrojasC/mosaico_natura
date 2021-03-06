<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'usuarios-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'class'=>'form-horizontal',
        ),
    )); ?>

    <h3 class="text-info note">Campos con <strong>* son requeridos</strong>.</h3>

    <?php echo $form->errorSummary($model, "", "", array('class' => "alert alert-danger btn-lg text-left")); ?>

    <?php if(Usuarios::deboActualizarFechaNac($model->fecha_nac) && !$model->isNewRecord) { ?>
        <hr />
        <div class="form-group">
            <div class="col-sm-12">
                <h4 class="alert alert-warning">Actualiza tu fecha de nacimiento para poder determinar tu categoría correctamente, recuerda que una vez ingresada, este campo sera inamovible</h4>
            </div>
            <?php echo $form->labelEx($model,'fecha_nac', array('class'=>'col-sm-3 control-label ')); ?>
            <div class="col-sm-8">
                <?php echo $form->dateField($model,'fecha_nac',array('class' => 'form-control')); ?>
            </div>
        </div>
        <hr />
    <?php } ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nombre', array('class'=>'col-sm-2 control-label ')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'nombre',array('class'=>'form-control')); ?>
        </div>

        <?php echo $form->labelEx($model,'apellido', array('class'=>'col-sm-2 control-label ')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model,'apellido',array('class' => 'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'estado', array('class'=>'col-sm-1 control-label ')); ?>
        <div class="col-sm-3">
            <?php echo $form->dropDownList($model, 'estado', Usuarios::estados(), array('prompt'=>'--Seleccionar--', 'class' => 'form-control')); ?>
        </div>

        <?php echo $form->labelEx($model,'municipio', array('class'=>'col-sm-2 control-label ')); ?>
        <div class="col-sm-3">
            <?php echo $form->textField($model,'municipio',array('class' => 'form-control')); ?>
        </div>

        <?php echo $form->labelEx($model,'telefonos', array('class'=>'col-sm-1 control-label ')); ?>
        <div class="col-sm-2">
            <?php echo $form->textField($model,'telefonos',array('class' => 'form-control')); ?>
        </div>
    </div>

    <?php if ($model->isNewRecord) { ?>
        <h3 class="text-danger">Los siguientes campos <strong>no pueden</strong> ser modificados una vez creado el registro.</h3>


        <div class="form-group">
            <?php echo $form->labelEx($model,'fecha_nac', array('class'=>'col-sm-2 control-label ')); ?>
            <div class="col-sm-3">
                <?php echo $form->dateField($model,'fecha_nac',array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-7">
                <h4 class="text-warning">(Dependiendo tu edad al momento del cierre del concurso es la categor&iacute;a en la que ingresas; menores de 18 a&ntilde;os para categor&iacute;a <b>J&oacute;venes</b> y de 18 a&ntilde;os en adelante para categor&iacute;a <b>Adultos</b>)</h4>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'correo', array('class'=>'col-sm-2 control-label ')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'correo',array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'passwd', array('class'=>'col-sm-2 control-label ')); ?>
            <div class="col-sm-4">
                <?php echo $form->passwordField($model,'passwd',array('class' => 'form-control')); ?>
            </div>

            <?php echo $form->labelEx($model,'confirma_passwd', array('class'=>'col-sm-2 control-label ')); ?>
            <div class="col-sm-4">
                <?php echo $form->passwordField($model,'confirma_passwd',array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'compromiso', array('class'=>'col-sm-2 control-label ')); ?>
            <div class="col-sm-10">
                <h4 class="text-info">Como es que tu aportas al cuidado de la naturaleza y ¿a qué te comprometes para seguir cuidandola?</h4>
                <?php echo $form->textArea($model,'compromiso',array('class' => 'form-control', 'rows'=>10)); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'difusion', array('class'=>'col-sm-3 control-label ')); ?>
            <div class="col-sm-9">
                <?php echo $form->dropDownList($model, 'difusion', Usuarios::difusiones(), array('prompt'=>'--Seleccionar--','class' => 'form-control')); ?>
            </div>
        </div>

        <div id="terminos">
            <?php include('protected/views/site/terminos_condiciones.php'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'acepto_terminos', array('class'=>'col-sm-11 text-right')); ?>
            <div class="col-sm-1">
                <?php echo $form->checkBox($model,'acepto_terminos'); ?>
            </div>
        </div>
    
    <?php } else { //pone la confirmación del passwd ?>
        <br>Si no deseas cambiar tu contrase&ntilde;a por favor deja estos campos vac&iacute;os.
        <div class="form-group">
            <?php echo $form->labelEx($model,'passwd'); ?>
            <?php echo $form->passwordField($model,'passwd',array('class' => 'form-control','value'=>'')); ?>
            <?php //echo $form->error($model,'passwd'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'confirma_passwd'); ?>
            <?php echo $form->passwordField($model,'confirma_passwd',array('class' => 'form-control','value'=>'')); ?>
        </div>
    <?php } ?>

    <div class="buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear cuenta' : 'Guardar cambios', array('class' =>
            'btn btn-lg btn-success')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
