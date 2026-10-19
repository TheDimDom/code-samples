<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crevan Inventory</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <h1>Crevan Collectables - Inventory</h1>
    <input type="text" id="search" placeholder="Search products...">

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr class="product-row">
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>£{{ number_format($product->price, 2) }}</td>

                <td>
                    <form action="/products/{{ $product->id }}/stock" method="POST">
                        @csrf
                        <input type="number" name="stock"
                            value="{{ $product->stock }}"
                            min="0" required style="width: 60px;">
                        <button type="submit">Save</button>
                    </form>
                </td>

                <td>
                    @if($product->stock == 0)
                    Out of Stock
                    @elseif($product->stock <= 4)
                        Low Stock
                        @else
                        In Stock
                        @endif
                        </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const search = document.getElementById('search');
        const rows = document.querySelectorAll('.product-row');

        search.addEventListener('input', function() {
            const searchTerm = search.value.toLowerCase();

            rows.forEach(function(row) {
                const product = row.cells[0].textContent.toLowerCase();
                const sku = row.cells[1].textContent.toLowerCase();

                if (product.includes(searchTerm) || sku.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>