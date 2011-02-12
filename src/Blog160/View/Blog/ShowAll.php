<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>blog160 - Ein Projekt von Nils Langner</title>
    <link type="text/css" rel="stylesheet" href="/css/blog160.css">
    <script type="text/javascript" src="/js/jquery/jquery-1.5.min.js"></script>
    <script type="text/javascript" src="/js/blog160.js"></script>
  </head>
  <body>
  
    <div id="blog">
    
      <div id="add_entry">
          <div id="add_entry_message">
            Eintrag hinzuf&uuml;gen<input type="text" name="message" id="blog_entry">
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
      
      <p>
      <a href="http://validator.w3.org/check?uri=referer"><img
         src="http://www.w3.org/Icons/valid-html401"
         alt="Valid HTML 4.01 Transitional" height="31" width="88"></a>
      </p>
    </div>
    
  </body>
</html>