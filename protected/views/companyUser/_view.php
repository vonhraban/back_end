<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('company_user_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->company_user_id), array('view', 'id' => $data->company_user_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('company_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->company)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_created')); ?>:
	<?php echo GxHtml::encode($data->date_created); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_updated')); ?>:
	<?php echo GxHtml::encode($data->date_updated); ?>
	<br />

</div>