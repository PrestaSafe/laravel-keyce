<!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <div class="input-group">
            
            <form method="get" action="{{ url('/search') }}">
                <input class="form-control" name="search" value="@if(isset($search)){{$search}}@endif" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
            </form>
        </div>
    </div>
</div>
<!-- Categories widget-->
<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            @php
                $categories = \App\Models\Category::all();
            @endphp
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
<!-- Side widget-->
<div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
</div>