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
<x-category />

<!-- Side widget-->
<div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
</div>