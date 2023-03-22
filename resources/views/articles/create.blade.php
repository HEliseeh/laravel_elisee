<form  action="articles/create" enctype="multipart/form-data">
    @csrf
        {{-- OU --}}
        {{ csrf_field() }}
    @method('post')
    @include('partials.article-form')
</form>