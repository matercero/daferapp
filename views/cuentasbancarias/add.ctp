<?php echo $this->Form->create('Cuentasbancaria'); ?>
<table class="edit">
    <tr>
        <td><?php echo $this->Form->input('nombre'); ?></td>
        <td><?php echo $this->Form->input('numero_entidad',array('label'=>'Nº Entidad')); ?></td>
        <td><?php echo $this->Form->input('numero_sucursal',array('label'=>'Nº Sucursal')); ?></td>
        <td><?php echo $this->Form->input('numero_dc',array('label'=>'D.C')); ?></td>
        <td><?php echo $this->Form->input('numero_cuenta',array('label'=>'Nº CCC')); ?></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $this->Form->input('numero_bicswift',array('label'=>'BIC/SWIFT')); ?></td>
        <td colspan="2"><?php echo $this->Form->input('numero_iban',array('label'=>'IBAN')); ?></td>
    </tr>
</table>
<?php
echo $this->Form->input('proveedore_id', array('type' => 'hidden', 'value' => $proveedore_id));
echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value' => $cliente_id));
?>
<?php echo $this->Form->end(__('Guardar', true)); ?>