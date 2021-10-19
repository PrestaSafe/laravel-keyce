<article>
    <!-- Post header-->
    <header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1">
           <a href="{{ route('article',$post->id) }}">{{ $post->title }}</a>
        </h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">{{ $post->created_at }} 
            <strong>by: {{ $post->author->name }}</strong></div>
        <!-- Post categories-->
        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
    </header>
    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
    <!-- Post content-->
    <section class="mb-5">
        <p class="fs-5 mb-4">
            {{ $post->content }}
        </p>
        
    </section>
</article>