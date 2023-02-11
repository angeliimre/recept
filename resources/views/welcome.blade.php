<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <form action="/fozes" method="post">
        @csrf
        <select onchange="this.form.submit()" name="kaja">
            <option value="nincs">Válassz!</option>
            @foreach($kaja as $p)
                @if(Session::get("kivalasztott")==intval($p->id))
                    <option value="{{$p->id}}" selected>{{$p->name}}</option>
                @else
                    <option value="{{$p->id}}">{{$p->name}}</option>
                @endif
            @endforeach
            
        </select>
    </form>
    <table>
        <tr>
            <th>Nyersanyag</th>
            <th>Egységár</th>
            <th>Mennyiség</th>
            <th>Mértékegység</th>
        </tr>
    @if(isset($hozzavalok))
        @foreach($hozzavalok->material as $h)
            <tr>
                <td>
                    {{$h->name}}
                </td>
                <td>
                    {{$h->price}}
                </td>
                <td>
                    {{$h->pivot->amount}}
                </td>
                <td>
                    {{$h->measure->name}}
                </td>
                <td>
                    
                    <form action="/del" method="post">
                        @csrf
                        <button name="torlendo" value="{{$h->pivot->id}}">Töröl</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
    </table>
    <div>
    <form action="/hozzaadas" method="post">
        @csrf
        <select onchange="this.form.submit()" name="ingredient">
            <option value="nincs">Válassz!</option>
            @foreach($hozzavalo as $h)
                @if(Session::get("ingr")==intval($h->id))
                    <option value="{{$h->id}}" selected>{{$h->name}}</option>
                @else
                    <option value="{{$h->id}}">{{$h->name}}</option>
                @endif
            @endforeach
        </select>
    </form>
    @if(isset($ingr))
    <form action="/hozzafuzes" method="post">
        @csrf
        <input type="text" name="mennyiseg"/>
        {{$ingr->measure->name}}
        <button>Hozzáad</button>
    </form>
    @endif
    </div>
</body>
</html>
