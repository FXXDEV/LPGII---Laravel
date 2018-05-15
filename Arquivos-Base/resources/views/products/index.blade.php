<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
    </tr>

    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nome }}</td>
            <td>{{ $product->preco }}</td>
        </tr>
    @endforeach

</table>