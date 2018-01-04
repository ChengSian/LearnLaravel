<table>
   @foreach($articles as $article)
        <tr>
            <td>{{$article->name}}</td>
            <td>{{$article->string}}</td>
        </tr>
    @endforeach
</table>