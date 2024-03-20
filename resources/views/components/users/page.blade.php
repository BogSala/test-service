<div class="users">
    @if(count($users) <= 0)
        <div>Users list is empty</div>
    @else
        @foreach($users as $user)
            <div class="user">
                <div class="inline_block">
                    <img src="{{URL::asset("/images") ."/".$user['image_path']}}" alt="avatar">
                    <h2 style="display:inline">{{ $user['name'] }}</h2>
                </div>
                <div>
                    <em>{{ $user['email'] }}</em>
                </div>
            </div>

            <hr>
        @endforeach
    @endif
</div>

<style>
    .inline_block {
        display : inline-block
    }
    .inline_block * {
        margin-left: 30px;
    }
    em {
        margin-left: 140px;
    }
</style>
