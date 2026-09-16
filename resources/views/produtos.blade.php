<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos e Itens</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; }
        h1 { color: #333; }
        .product-card { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        ul { margin-top: 10px; }
    </style>
</head>
<body>

    <h1>Lista de Produtos e Itens</h1>

    @forelse($produtos as $produto)
        <div class="product-card">
            <h3>{{ $produto->nome }}</h3>
            <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p><strong>Unidade de Medida:</strong> {{ $produto->unidade_medida }}</p>
            
            <p><strong>Itens de Composição:</strong></p>
            <ul>
                @foreach($produto->itens as $item)
                    <li>Cor: {{ $item->cor }} | Quantidade: {{ $item->quantidade }} | Valor: R$ {{ number_format($item->valor, 2, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
    @empty
        <p>Nenhum produto cadastrado.</p>
    @endforelse

</body>
</html>
