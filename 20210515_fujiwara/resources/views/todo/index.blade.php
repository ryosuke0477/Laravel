<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('reset.css') }}">
  <link rel="stylesheet" href="{{ asset('index.min.css') }}">
</head>
<body>
  <div class="background">
    <div class="background__bord">
      <div class="background__bord__content">
        <h1>Todo List</h1>
        <form class="background__bord__content__form" action="/todo/create" method="post">
          @csrf
          <input class="background__bord__content__form--text" type="text" name="content">
          <input class="background__bord__content__form--submit" type="submit" value="追加">
        </form>
        <table class="background__bord__content__table">
          <tr class="background__bord__content__table__tr">
            <th class="background__bord__content__table__tr--create">作成日</th>
            <th class="background__bord__content__table__tr--task">タスク名</th>
            <th class="background__bord__content__table__tr--update">更新</th>
            <th class="background__bord__content__table__tr--delete">削除</th>
          </tr>
          @foreach($items as $item)
          <tr class="background__bord__content__table__tr2">
            <td class="background__bord__content__table__tr2--create">{{$item->created_at}}</td>
            <form action="/todo/update" method="post">
              @csrf
              <td>
                <input class="background__bord__content__table__tr2--task" type="text" name="content" value="{{$item->content}}">
                <input type="hidden" name="id" value="{{$item->id}}">
              </td>
              <td>
                <input class="background__bord__content__table__tr2--update" type="submit" value="更新" formaction="/todo/update">
              </td>
              <td>
                <input class="background__bord__content__table__tr2--delete" type="submit" value="削除" formaction="/todo/delete">
              </td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>

</html>