<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    @foreach ($orders as $order)
    <div class="card mb-3">
        <div class="card-body">
            <h5>Order #{{ $order->id }}</h5>
            <p>User: {{ $order->user->name }}</p>
            <p>Status: {{ $order->status }}</p>
            <p>Total: Rp {{ number_format($order->total_price) }}</p>

            <ul>
                @foreach ($order->items as $item)
                    <li>
                        {{ $item->service->name }} ({{ $item->qty }})
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach

</body>
</html>