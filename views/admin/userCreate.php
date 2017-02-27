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
      <input type="text" name="lastname" placeholder="lastname"/>
      <input type="text" name="firstname" placeholder="firstname"/>
      <input type="text" name="pseudo" placeholder="pseudo"/>
      <input type="text" name="email" placeholder="email"/>
      <input type="text" name="pass" placeholder="pass"/>
      <input type="textarea" name="description" placeholder="description"/>
      Admin
      <input type="radio" name="admin" value="1"/>yes
      <input type="radio" name="admin" value="0" checked/>no

      <button type="submit">Create</button>
    </form>
  </body>
</html>
