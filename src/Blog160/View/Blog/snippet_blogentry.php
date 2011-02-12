<div class="entry_date"><?php echo htmlentities(date('Y-d-m', strtotime($blogEntry->getDate()))); ?></div>
<div class="entry_message"><?php echo htmlentities($blogEntry->getMessage()); ?></div>

<div class="entry_comments">

  <div class="add_comment">
      <div class="comment_input">
        <input type="text" size="30" name="message" id="add_comment_<?php echo $blogEntry->getId(); ?>">
      </div>
      <div>
        <button class="add_comment_button" onclick="addComment('<?php echo $blogEntry->getId(); ?>')">Kommentieren</button>
      </div>
  </div>  
  
  <div id="comment_error_<?php echo $blogEntry->getId(); ?>" class="comment_error"></div>
  
  <div class="comments" id="comments_<?php echo $blogEntry->getId(); ?>">
  <?php foreach ( $comments[$blogEntry->getId()] as $comment ): ?>
    <div class="comment">
      <?php include 'snippet_comment.php'?>
    </div>
  <?php endforeach; ?>
  </div>
  
</div>