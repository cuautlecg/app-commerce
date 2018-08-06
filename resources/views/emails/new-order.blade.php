<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .table-email{
            border: 1px solid black;
            table-layout:fixed;
            width:60%;
        } 
        th, td{
            border: 1px solid black;
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            text-align: center;
        }
    </style>
    <title>Nueva orden</title>
</head>
<body>

    <h3>Se ha recibido un nuevo pedido</h3>
    <p>Estos son los datos del cliente que realizo la compra:</p>

    <ul>
        <li>
            <strong>Nombre:</strong>
            {{ $user->name }}
        </li>
        <li>
            <strong>Correo Electronico:</strong>
            {{ $user->email }}
        </li>
        <li>
            <strong>Fecha del pedido:</strong>
            {{ $cart->order_date }}
        </li>
    </ul>
    <hr>
    <h3>Detalles del pedido: </h3>
    <table class="table-email">
        <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->details as $detail)
            <tr>
                <td>
                    {{$detail->product->id}}
                </td>
                <td>
                    {{$detail->product->name}}
                </td>
                <td>
                    {{$detail->quantity}}
                </td>
                <td>
                    ${{ $detail->quantity * $detail->product->price }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h4><strong>Total de la compra: </strong>{{$cart->total}}</h4>
    <hr>
    <p>
        <a href="{{url('/admin/orders/'.$cart->id)}}">Haz click aquí</a> para ver el detalle del pedido.
    </p>
    
</body>
</html>