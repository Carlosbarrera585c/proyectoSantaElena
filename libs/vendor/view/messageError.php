<?php use mvc\session\sessionClass as session ?>
<?php if (session::getInstance()->hasError($key)): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError($key) ?>
</div>
<?php session::getInstance()->deleteError($key) ?>
<?php endif ?>
