<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artifex Gallery - Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* ===== VARIABLES & RESET ===== */
        :root {
            --primary: #000000;
            --secondary: #111111;
            --accent: #e60023;
            --gold: #D4AF37;
            --light: #f8f8f8;
            --gray: #767676;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--primary);
            color: var(--light);
            padding: 20px;
            min-height: 100vh;
        }

        /* ===== HEADER ===== */
        .header {
            background: rgba(0, 0, 0, 0.9);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .logo {
            font-size: 24px;
            font-weight: 900;
            background: linear-gradient(135deg, var(--gold), #FFD700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cart-link {
            color: var(--light);
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* ===== CART TITLE ===== */
        .cart-title {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .cart-title h1 {
            font-size: 36px;
            font-weight: 900;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #fff, var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* ===== EMPTY CART ===== */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .empty-cart h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: var(--light);
        }

        .empty-cart p {
            color: var(--gray);
            margin-bottom: 25px;
        }

        /* ===== CART TABLE ===== */
        .cart-table {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .cart-table th {
            background: rgba(212, 175, 55, 0.1);
            padding: 20px;
            text-align: left;
            font-weight: 600;
            color: var(--gold);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .cart-table td {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .cart-table tr:last-child td {
            border-bottom: none;
        }

        .cart-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        /* ===== QUANTITY CONTROLS ===== */
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .qty-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: rgba(212, 175, 55, 0.2);
            border-color: var(--gold);
            transform: scale(1.1);
        }

        .qty-value {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
        }

        /* ===== PRICE STYLING ===== */
        .price {
            font-weight: 700;
            font-size: 18px;
        }

        .subtotal {
            font-weight: 800;
            font-size: 20px;
            color: var(--gold);
        }

        /* ===== TOTAL SECTION ===== */
        .total-section {
            text-align: right;
            padding: 30px;
            background: rgba(212, 175, 55, 0.05);
            border-radius: 16px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            margin-bottom: 30px;
        }

        .total-amount {
            font-size: 42px;
            font-weight: 900;
            color: var(--gold);
            margin-bottom: 20px;
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
        }

        /* ===== CHECKOUT BUTTON ===== */
        .checkout-btn {
            display: inline-block;
            padding: 18px 40px;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 18px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            float: right;
        }

        .checkout-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.3);
            background: linear-gradient(135deg, #FFD700, var(--gold));
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .cart-table {
                display: block;
                overflow-x: auto;
            }
            
            .cart-table th,
            .cart-table td {
                padding: 15px 10px;
                font-size: 14px;
            }
            
            .total-amount {
                font-size: 32px;
            }
            
            .checkout-btn {
                padding: 15px 30px;
                font-size: 16px;
            }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .cart-table tbody tr {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .cart-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .cart-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .cart-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .cart-table tbody tr:nth-child(4) { animation-delay: 0.4s; }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.2);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--gold), transparent);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #FFD700, var(--gold));
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- HEADER -->
<header class="header">
    <div class="logo">
        <span>🎨</span>
        ARTIFEX GALLERY
    </div>
    
    <div class="user-info">
        <a href="gallery" class="cart-link">
            <i class="fas fa-arrow-left"></i>
            Back to Gallery
        </a>
    </div>
</header>

<!-- CART TITLE -->
<div class="cart-title">
    <h1>🛒 Your Collection</h1>
</div>

@if(empty($cart))
    <!-- EMPTY CART -->
    <div class="empty-cart">
        <h2>Your collection is empty</h2>
        <p>Start building your art portfolio with premium digital artworks</p>
        <a href="gallery" class="checkout-btn" style="float: none; display: inline-block;">
            <i class="fas fa-compass"></i>
            Explore Artworks
        </a>
    </div>

@else
    <!-- CART TABLE -->
    <table class="cart-table">
        <thead>
            <tr>
                <th>Artwork</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $item)
            @php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            @endphp
            <tr>
                <td>
                    <strong>{{ $item['title'] }}</strong>
                </td>
                <td class="price">Rp {{ number_format($item['price']) }}</td>
                <td>
                    <div class="quantity-control">
                        <form action="{{ route('cart.decrease', $item['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="qty-btn">
                                <i class="fas fa-minus"></i>
                            </button>
                        </form>
                        
                        <span class="qty-value">{{ $item['qty'] }}</span>
                        
                        <form action="{{ route('cart.increase', $item['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="qty-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </form>
                    </div>
                </td>
                <td class="subtotal">Rp {{ number_format($subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- TOTAL SECTION -->
    <div class="total-section">
        <div class="total-amount">Rp {{ number_format($total) }}</div>
        <a href="{{ route('checkout') }}" class="checkout-btn">
            <i class="fas fa-lock"></i>
            Proceed to Checkout
        </a>
        <div style="clear: both;"></div>
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Button animations
    document.querySelectorAll('.qty-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Animation
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
    
    // Checkout button animation
    const checkoutBtn = document.querySelector('.checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function(e) {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            this.style.background = 'linear-gradient(135deg, #4ECDC4, #44A08D)';
        });
    }
    
    // Table row hover effect
    document.querySelectorAll('.cart-table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});
</script>

</body>
</html>