<div class="entry_date"><?php echo htmlentities(date('Y-d-m', strtotime($blogEntry->getDate()))); ?></div>
<div class="entry_message"><?php echo htmlentities($blogEntry->getMessage()); ?></div>
<div class="entry_comments">
  <div class="add_comment">
    <form method="POST" action="?controller=Blog&action=AddComment&blog_entry_id=<?php echo $blogEntry->getId(); ?>">
      <input type="text" name="message" />
      <input type="submit" value="Kommentar hinzuf&uuml;gen"/>
    </form>
  </div>  
  <?php foreach ( $comments[$blogEntry->getId()] as $comment ): ?>
    <div class="comments">
    <?php include 'snippet_comment.php'?>
    </div>
  <?php endforeach; ?>
</div>