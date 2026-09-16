<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos e Itens</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        header {
            margin-bottom: 30px;
            text-align: center;
        }

        h1 {
            color: var(--primary);
            font-size: 2.2rem;
            margin-bottom: 8px;
        }

        p.subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .product-grid {
            display: grid;
            gap: 20px;
        }

        .product-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 24px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-left: 5px solid var(--primary);
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 12px;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 600;
            color: #059669;
        }

        .product-info {
            font-size: 0.95rem;
            color: var(--text-muted);
            margin-bottom: 15px;
        }

        .items-section-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            background-color: #f9fafb;
            border-radius: 8px;
            overflow: hidden;
        }

        .items-table th, .items-table td {
            padding: 10px 14px;
            text-align: left;
            font-size: 0.9rem;
        }

        .items-table th {
            background-color: #e5e7eb;
            color: #374151;
            font-weight: 600;
        }

        .items-table tr:not(:last-child) td {
            border-bottom: 1px solid var(--border-color);
        }

        .badge-color {
            display: inline-block. ;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            background-color: #e0e7ff;
            color: #3730a3;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 12px;
            color: var(--text-muted);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Lista de Produtos e Itens</h1>
            <p class="subtitle">Trabalho da disciplina de Frameworks de Desenvolvimento WEB</p>
        </header>

        <div class="product-grid">
            @forelse($produtos as $produto)
                <div class="product-card">
                    <div class="product-header">
                        <div>
                            <h3 class="product-title">{{ $produto->nome }}</h3>
                            <span class="product-info">Unidade de Medida: <strong>{{ $produto->unidade_medida }}</strong></span>
                        </div>
                        <div class="product-price">
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </div>
                    </div>

                    <div class="items-section">
                        <div class="items-section-title">Itens de Composição</div>
                        @if($produto->itens->count() > 0)
                            <table class="items-table">
                                <thead>
                                    <tr>
                                        <th>Cor</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitário</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produto->itens as $item)
                                        <tr>
                                            <td><span class="badge-color">{{ $item->cor }}</span></td>
                                            <td>{{ $item->quantidade }}</td>
                                            <td>R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p style="font-size: 0.9rem; color: #6b7280; font-style: italic;">Nenhum item associado a este produto.</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <p>Nenhum produto cadastrado no momento.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
