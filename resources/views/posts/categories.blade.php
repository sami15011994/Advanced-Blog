@extends('layout')

@section('main')
    <h1>Choisir une catégorie</h1>
 
    <form id="categoryForm" action="{{ route('categories.show') }}" method="GET">
        @csrf  
        <label for="category">Sélectionner une catégorie :</label>
        <select name="category" id="category">
            <option value="">Choisir une catégorie</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Afficher les sous-postes</button>
    </form>

    <div id="postsContainer">
        
    </div>

    <div id="paginationControls">
       
    </div>

@endsection
<link href="{{ mix('css/pages/categories.css') }}" rel="stylesheet">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentPage = 1; 
        var categoryId = '';

        document.getElementById('categoryForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            categoryId = document.getElementById('category').value;
            currentPage = 1; 
           
            loadPosts(categoryId, currentPage);
        });

        function loadPosts(categoryId, page) {
            if (categoryId) {
                fetch(`/categories/show?category=${categoryId}&page=${page}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('La réponse du réseau n\'était pas correcte : ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        displayPosts(data);

                        setupPagination(data);
                    })
                    .catch(error => console.error('Erreur lors de la récupération des sous-postes :', error));
            } else {
                document.getElementById('postsContainer').innerHTML = '';
                document.getElementById('paginationControls').innerHTML = '';
            }
        }

        function displayPosts(data) {
            var postsContainer = document.getElementById('postsContainer');
            postsContainer.innerHTML = '<h2>Posts pour la catégorie sélectionnée :</h2>';
            var ul = document.createElement('ul');
            data.data.forEach(function(post) {
                var li = document.createElement('li');
                li.textContent = post.title;
                ul.appendChild(li);
            });
            postsContainer.appendChild(ul);
        }

        function setupPagination(data) {
            var paginationControls = document.getElementById('paginationControls');
            paginationControls.innerHTML = '';

            var totalPages = data.last_page;
            for (let i = 1; i <= totalPages; i++) {
                var button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', function() {
                    currentPage = i;
                    loadPosts(categoryId, currentPage);
                });
                paginationControls.appendChild(button);
            }
        }
    });
</script>


