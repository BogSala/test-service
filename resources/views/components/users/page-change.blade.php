<div class="page_buttons">
    @if($page > 0)
        <a class="active" href="{{URL::to('users/page/'.$page-1)}}">Prev</a>
    @else
        <a disabled>Prev</a>
    @endif

    @if($lastPage)
        <a disabled>Next</a>
    @else
        <a class="active" href="{{URL::to('users/page/'.$page+1)}}">Next</a>
    @endif

</div>

<style>
    .page_buttons .active:hover {
        cursor: pointer;
    }
</style>
