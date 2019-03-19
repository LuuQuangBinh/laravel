<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>About Page</h1>
    <h2>
        Địa chỉ: {{$address}}
    </h2>

    <?php
    //$a = 'sinhvien';
    //$$a <=> $sinhvien;

    /*print_r($person);
    foreach ($person as $value)
    {
        echo $value['name'];
        echo "<br>";
    }*/
    
    ?>

    @foreach($person as $value)
        {{$value['name']}}
        <br>
    @endforeach

    @if(1<2) Một bé hơn hai
    @else Một không bé hơn hai
    @endif
</body>
</html>