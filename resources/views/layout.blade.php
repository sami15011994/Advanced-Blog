
<!DOCTYPE html>
<html>
<html lang="fr">
<head>
<title>@yield('title','Liste des Posts')</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="{{ mix('css/app.css')}}" rel="stylesheet">
    
</head>
<body>
    <!-- header -->
     <header>
     <nav class="navbar">
        <div class="logo">
            <a href="#">My Blog</a>
            </div>
        <div class="menu">
            <a href="{{route('posts.home')}}">Home</a>
            <a href="{{route('posts.home')}}">Articles</a>
            <a href="{{route('posts.home')}}">Categories</a>
            <a href="{{route('posts.home')}}">About</a>
            <a href="{{route('posts.home')}}">Contact</a>
        </div>
     </nav>
     </header>
     
     
     
     <!-- main -->
      <main>
        @yield('main')
     </main>
      
     
     
     <!-- footer -->
      <footer class="footer">
      <p>&copy; 2024 Mon Entreprise. Tous droits réservés. | <a href="#">Politique de confidentialité</a></p>
      </footer>
      <!--on peut inclure ici de script js-->
      </body>
</html>