<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Sveiki {{ $vardas }}</h2>
    <h4>Jūsų produktų sąrašas</h4>
    @foreach ($sarasas as $produktas) 
        <li>{{ $produktas }}</li>
    @endforeach

    <h4>Jūsų užsakymai</h4>

    @forelse ($uzsakymai as $uzsakymas)
        <li>{{ $uzsakymas }}</li>
    @empty
        <p>Dar neturite jokių užsakymų</p>
    @endforelse 

    @if(count($uzsakymai) === 1)
        <h5>Iš viso turite vieną užsakymą</h5>
    @else
        <h5>Jūsų užsakymų kiekis nėra vienas</h5>
    @endif
</html>