@csrf
<label>
    Titulo del proyecto<br>
    <input type="text" name="title" value="{{ old('title',$project->title) }}"><br>
    {!! $errors->first('title','<small>:message</small><br>') !!}
</label>
<label>
    URL del proyecto<br>
    <input type="text" name="url" value="{{ old('url',$project->url) }}"><br>
    {!! $errors->first('url','<small>:message</small><br>') !!}
</label>
<label>
    Descripción del proyecto<br>
    <textarea name="description">{{ old('description',$project->description) }}</textarea><br>
    {!! $errors->first('description','<small>:message</small><br>') !!}
</label><br>
<button>{{ $btnText }}</button>
