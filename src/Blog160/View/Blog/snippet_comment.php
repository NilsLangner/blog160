<div class="comment_date">
  <?php echo date('Y-d-m', strtotime($comment->getDate())); ?> <br />
</div>
<div class="comment_message">
  <?php echo $comment->getMessage(); ?>
</div>