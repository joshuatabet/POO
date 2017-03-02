<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminUserController">Return</a>
    <h1>Chest create</h1>
    <form action="index.php?controller=AdminChestController&create=1" method="post">
      <input type="text" name="name" placeholder="name"/>
      <input type="number" name="life" placeholder="life"/>
      <input type="number" name="def" placeholder="def"/>
      <input type="number" name="atk" placeholder="atk"/>
      <input type="number" name="magic" placeholder="magic"/>
      <input type="number" name="speed" placeholder="speed"/>
    
      <button type="submit">Create</button>
    </form>
  </body>
</html>
