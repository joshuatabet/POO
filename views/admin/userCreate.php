<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminUserController">Retour</a>
    <h1>User create</h1>
    <form action="index.php?controller=AdminUserController&create=1" method="post">
      <input type="text" name="nom" placeholder="nom"/>
      <input type="text" name="prenom" placeholder="prenom"/>
      <input type="text" name="pseudo" placeholder="pseudo"/>
      <input type="text" name="email" placeholder="email"/>
      <input type="text" name="pass" placeholder="pass"/>
      <input type="textarea" name="descriptif" placeholder="descriptif"/>
      Admin
      <input type="radio" name="admin" value="1"/>oui
      <input type="radio" name="admin" value="0" checked/>non

      <button type="submit">Create</button>
    </form>
  </body>
</html>
