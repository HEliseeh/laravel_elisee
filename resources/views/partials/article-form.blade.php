<label for="title" >title:</label><br>
<input type="text"  name= "title" value = "{{ old('title', isset($article->title) ? $article->title : null) }}"> <br>
@error('title')
    <div> {{$message}} </div>
@enderror
<label for="body" >body:</label><br>
<input type="text" name= "body" value = "{{ old('body', isset($article->body) ? $article->body : null) }}"> <br>
@error('body')
    <div> {{$message}} </div>
@enderror
<label for="image"></label>
<input type="file" name="image" id="image">
@error('image')
    <div> {{$message}} </div>
@enderror
<button type= "submit">Valider</button>
