<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach ($categories->take(3) as $category)                        
                        <li>
                            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach ($categories->skip(3)->take(3) as $category)                        
                        <li>
                            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>