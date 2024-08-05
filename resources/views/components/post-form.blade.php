
<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif
    <div>
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
    </div>
    <div>
        <label for="content">Contenu:</label>
        <textarea id="content" name="content" required>{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div>
        <label for="category">Catégorie:</label>
        <select id="category" name="category_id" required>
            <option value="">Sélectionnez une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id') == $category->id || ($post && $post->category_id == $category->id)) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">{{ $method === 'POST' ? 'Créer' : 'Mettre à jour' }}</button>
    </div>
</form>
