<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <title>{{ title }}</title>
 </head>
 <body>
  <header>
  <h1>{{ title }} </h1>
  <h1><a href="/">Главная</a></h1>
    <nav>


    <ul>
   
      <li><a href="login.php">Вход</a></li> 
      <li><a href="register.php">Регистрация</a></li> 
    </ul>
  </nav>
  </header>
  <main>
    <div class="content">
      {{ content }} 
    </div>
    <div class="sidebar">
      {{ adminPanel }}
    </div>
  </main>

  <footer>
       <p>© 2024 Доска обьявлений. Все права защищены.</p>
    <ul>
      <li><a href="/about">О нас</a></li>
      <li><a href="/contact">Контакты</a></li>
      <li><a href="/policy">Политика конфиденциальности</a></li>
    </ul>
</footer>
 </body>
</html>
