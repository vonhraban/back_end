<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('company_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->company_id), array('view', 'id' => $data->company_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_created')); ?>:
	<?php echo GxHtml::encode($data->date_created); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_updated')); ?>:
	<?php echo GxHtml::encode($data->date_updated); ?>
	<br />

</div>