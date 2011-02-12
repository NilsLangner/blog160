<html>
  <head>
    <title>blog160 - Ein Projekt von Nils Langner</title>
    <link type="text/css" rel="stylesheet" href="/css/blog160.css"/> 
    <script type="text/javascript" src="/js/jquery/jquery-1.5.min.js"></script>
    <script type="text/javascript" src="/js/blog160.js"></script>
  </head>
  <body>
  
    <div id="blog">
    
      <div id="add_entry">
          <div id="add_entry_message">
            Eintrag hinzuf&uuml;gen<input type="text" name="message" id="blog_entry" />
          </div>
          <button onclick="addEntry()">Eintrag erstellen</button>
          <div id="error_entry"></div>
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