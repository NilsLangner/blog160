<html>
  <head>
    <title>blog160 - Ein Projekt von Nils Langner</title>
    <link type="text/css" rel="stylesheet" href="/css/blog160.css"/> 
  </head>
  <body>
  
    <div id="blog">
    
      <div id="add_entry">
        <form action="?controller=Blog&action=addEntry" method="post">
          Eintrag hinzuf&uuml;gen<input type="text" name="message" />
          <input type="submit" />
        </form>
      </div>
    
      <div id="entries">
        <?php foreach ( $blogEntries as $blogEntry ): ?>
          <div class="entry">
          <?php include 'snippet_blogentry.php'; ?>
          </div>
        <?php endforeach; ?>
      </div>
      
    </div>
  </body>
</html>