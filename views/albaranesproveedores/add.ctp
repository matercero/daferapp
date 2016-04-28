<div class="albaranesproveedores">
    <?php echo $this->Form->create('Albaranesproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Albaran de proveedor Nº '.$numero); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="view">
            <tr>
                <td><?php echo $this->Form->input('serie', array('type' => 'select', 'options' => $series, 'default' => $config['Seriesfacturascompra']['serie'])); ?></td>
                <td>
                    <?php echo $this->Form->input('id'); ?>
                    <?php echo $this->Form->input('numero', array('readonly' => true , 'value' => $numero)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('tiposiva_id', array('label' => 'Tipo de Iva','default'=>$config['Config']['tiposiva_id'] ,'selected' => @$pedidosproveedore['Pedidosproveedore']['tiposiva_id'])); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('estadosalbaranesproveedore_id', array('label' => 'Estado')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Pedido de Proveedor</label>
                    <?php
                    echo $pedidosproveedore['Pedidosproveedore']['numero'];
                    echo $this->Form->input('pedidosproveedore_id', array('type' => 'hidden', 'value' => $pedidosproveedore_id));
                    echo $this->Form->input('proveedore_id', array( 'default' => @$pedidosproveedore['Pedidosproveedore']['proveedore_id'],'label'=>'Proveedor','class'=>'chzn-select-required'));
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input('numero_albaran_proporcionado', array('label' => 'Nº Albarán Proporcionado:')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('default' => @$pedidosproveedore['Pedidosproveedore']['almacene_id'], 'label' => 'Almacén', 'class' => 'chzn-select-required')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('confirmado', array('label' => 'Confirmado para Facturar','checked' => True)); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones','default' => @$pedidosproveedore['Pedidosproveedore']['observaciones'])); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('centrosdecoste_id', array('label' => 'Centros de Coste')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albarán escaneado')); ?>
                </td>
            </tr>
        </table>
        <div class="related" style="margin-top: 30px">
            <h3><?php __('Artículos del Albarán a Proveedor'); ?></h3>
            <?php if (!empty($pedidosproveedore['ArticulosPedidosproveedore'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php __('Ref'); ?></th>
                        <th><?php __('Nombre'); ?></th>
                        <th><?php __('Tarea de la Orden'); ?></th>
                        <th><?php __('Cantidad'); ?></th>
                        <th><?php __('Pendiente de Servir'); ?></th>
                        <th><?php __('Cantidad para Albarán'); ?></th>
                        <th><?php __('Precio Proveedor €'); ?></th>
                        <th><?php __('Descuento %'); ?></th>
                        <th><?php __('Neto €'); ?></th>
                        <th><?php __('Total €'); ?></th>
                        <th><?php __('Validar'); ?></th>
                    </tr>
                    <?php
                    if (!empty($pedidosproveedore['ArticulosPedidosproveedore'])) {
                        $i = 0;
                        $j = 0;
                        foreach ($pedidosproveedore['ArticulosPedidosproveedore'] as $articulo_pedidosproveedore):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_pedidosproveedore['Articulo']['ref']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['Articulo']['nombre']; ?></td>
                                <td><?php echo @$articulo_pedidosproveedore['Tarea']['descripcion']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['cantidad']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['pendiente_servir']; ?></td>
                                <td><?php echo $this->Form->input('ArticulosPedidosproveedore.' . $i . '.cantidad_servida', array('label' => False, 'type' => 'text','default' => $articulo_pedidosproveedore['pendiente_servir'] )) ?></td>
                                <td><?php echo $articulo_pedidosproveedore['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['descuento']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['neto']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['total']; ?></td>
                                <td><?php echo $this->Form->input('ArticulosPedidosproveedore.' . $i . '.id', array('label' => 'Validar', 'type' => 'checkbox', 'checked' => true, 'value' => $articulo_pedidosproveedore['id'])) ?></td>
                            </tr>
                            <?php
                            $j++;
                        endforeach;
                    }
                    ?>
                </table>
            <?php endif; ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Nuevo', true)); ?>
</div>
