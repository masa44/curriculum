@extends('layouts.main')

@section('title', 'つぶやき')

@section('content')
<div class="box1">
    <h6>ホーム</h>
    <hr>
    <form action="" method="POST">
        <div class="text_area">
            <input type="text" name="content" style="width:430px" placeholder="いまどうしてる？" >
        </div>
        <div class="post_button">
            <input type="submit" value="つぶやく" id="post" name="post">
        </div>
        @csrf
    </form>
</div>
<div class="box2">
    <?php $prev_exist = 'FALSE'; ?>
    @foreach($posts as $post)
        @if ($prev_exist == 'TRUE')
            <hr>
        @endif
        <div class="each_post">
            <div class="box3">
                <div class=post_name>
                    {{ App\User::find($post->user_id)->name }}
                </div>

                <div class=post_time>
                    {{ $post->created_at }}
                </div>
            </div>

            <div class=post_content>
                {{ str_limit($post->body, 255) }}
            </div>

            <div class=delete_button>
                @if ($post->user_id == \Auth::user()->id)
                    <form method='post'>
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="target" value="{{ $post->id }}">
                        <input type="submit" name="delete" value="削除">
                    </form>
                @endif
            </div>
        </div>
        <?php $prev_exist = 'TRUE'; ?>
    @endforeach
</div>
@endsection
