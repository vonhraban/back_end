<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('question_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->question_id), array('view', 'id' => $data->question_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('company_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->company)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('text')); ?>:
	<?php echo GxHtml::encode($data->text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('score')); ?>:
	<?php echo GxHtml::encode($data->score); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('difficulty')); ?>:
	<?php echo GxHtml::encode($data->difficulty); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_created')); ?>:
	<?php echo GxHtml::encode($data->date_created); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('date_updated')); ?>:
	<?php echo GxHtml::encode($data->date_updated); ?>
	<br />
	*/ ?>

</div>