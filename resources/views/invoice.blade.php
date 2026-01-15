<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artifex Gallery - Investment Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* ===== VARIABLES & RESET ===== */
        :root {
            --primary: #000000;
            --secondary: #111111;
            --gold: #D4AF37;
            --light: #f8f8f8;
            --gray: #767676;
            --success: #06D6A0;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0a0a0a, #000);
            color: var(--light);
            padding: 40px 20px;
            min-height: 100vh;
        }

        /* ===== INVOICE CONTAINER ===== */
        .invoice-container {
            max-width: 1000px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 50px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .invoice-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--gold), #FFD700, var(--gold));
        }

        /* ===== HEADER SECTION ===== */
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 50px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        .brand-section {
            flex: 1;
        }

        .logo {
            font-size: 36px;
            font-weight: 900;
            background: linear-gradient(135deg, var(--gold), #FFD700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-tagline {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.7);
            max-width: 400px;
            line-height: 1.6;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-title {
            font-size: 42px;
            font-weight: 900;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #fff, var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.2);
        }

        .invoice-number {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
        }

        .invoice-number span {
            font-weight: 700;
            color: var(--gold);
            font-size: 20px;
        }

        .invoice-date {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.6);
        }

        /* ===== CLIENT INFO SECTION ===== */
        .client-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--gold);
        }

        .client-info {
            line-height: 1.8;
        }

        .info-item {
            margin-bottom: 12px;
            display: flex;
        }

        .info-label {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            min-width: 120px;
        }

        .info-value {
            color: rgba(255, 255, 255, 0.7);
            flex: 1;
        }

        /* ===== ITEMS TABLE ===== */
        .items-section {
            margin-bottom: 50px;
        }

        .items-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .items-table th {
            background: rgba(212, 175, 55, 0.1);
            padding: 25px;
            text-align: left;
            font-weight: 700;
            color: var(--gold);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            font-size: 16px;
        }

        .items-table td {
            padding: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .items-table tr:last-child td {
            border-bottom: none;
        }

        .items-table tr:hover td {
            background: rgba(255, 255, 255, 0.03);
        }

        .item-title {
            font-weight: 600;
            color: white;
            font-size: 17px;
        }

        .item-qty {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
        }

        .item-subtotal {
            font-weight: 800;
            color: var(--gold);
            font-size: 18px;
        }

        /* ===== TOTAL SECTION ===== */
        .total-section {
            background: rgba(212, 175, 55, 0.05);
            border-radius: 16px;
            padding: 40px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .total-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .total-label {
            font-size: 24px;
            font-weight: 700;
            color: white;
        }

        .total-amount {
            font-size: 56px;
            font-weight: 900;
            color: var(--gold);
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
        }

        /* ===== FOOTER SECTION ===== */
        .footer-section {
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-column {
            padding: 20px;
        }

        .footer-title {
            font-size: 16px;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
        }

        .footer-text {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.6;
        }

        .verification-badge {
            display: inline-block;
            padding: 8px 16px;
            background: rgba(6, 214, 160, 0.2);
            color: var(--success);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 10px;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            gap: 15px;
            z-index: 100;
        }

        .print-btn, .home-btn {
            padding: 16px 32px;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            text-decoration: none;
        }

        .print-btn {
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
        }

        .home-btn {
            background: linear-gradient(135deg, #4a5568, #2d3748);
            color: white;
        }

        .print-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(212, 175, 55, 0.4);
            background: linear-gradient(135deg, #FFD700, var(--gold));
        }

        .home-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(66, 153, 225, 0.4);
            background: linear-gradient(135deg, #5a67d8, #4a5568);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .invoice-container > * {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .items-table tbody tr {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .items-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .items-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .items-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .items-table tbody tr:nth-child(4) { animation-delay: 0.4s; }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 8px;
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

        /* ===== PRINT STYLES ===== */
        @media print {
            body {
                background: white;
                color: black;
                padding: 20px;
            }
            
            .invoice-container {
                box-shadow: none;
                border: 2px solid #000;
                background: white;
                color: black;
            }
            
            .action-buttons {
                display: none;
            }
            
            .logo, .invoice-title, .total-amount {
                -webkit-print-color-adjust: exact;
                color: #D4AF37 !important;
            }
            
            .items-table th {
                background: #f8f8f8 !important;
                color: #D4AF37 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- INVOICE CONTAINER -->
<div class="invoice-container">
    <!-- HEADER -->
    <div class="invoice-header">
        <div class="brand-section">
            <div class="logo">
                <span>🎨</span>
                ARTIFEX GALLERY
            </div>
            <p class="brand-tagline">
                Premium Digital Art Investment Platform<br>
                Where Masterpieces Meet Discerning Collectors
            </p>
        </div>
        
        <div class="invoice-meta">
            <h1 class="invoice-title">INVESTMENT INVOICE</h1>
            <p class="invoice-number">Invoice #: <span>{{ $invoice['invoice_number'] }}</span></p>
            <p class="invoice-date">Date: {{ $invoice['date'] }}</p>
        </div>
    </div>

    <!-- CLIENT INFO -->
    <div class="client-section">
        <div>
            <h2 class="section-title">Collector Information</h2>
            <div class="client-info">
                <div class="info-item">
                    <span class="info-label">Name:</span>
                    <span class="info-value">{{ $invoice['name'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Address:</span>
                    <span class="info-value">{{ $invoice['address'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Invoice Date:</span>
                    <span class="info-value">{{ $invoice['date'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status:</span>
                    <span class="info-value">
                        <span class="verification-badge">
                            <i class="fas fa-check-circle"></i>
                            Payment Confirmed
                        </span>
                    </span>
                </div>
            </div>
        </div>
        
        <div>
            <h2 class="section-title">Investment Details</h2>
            <div class="client-info">
                <div class="info-item">
                    <span class="info-label">Portfolio:</span>
                    <span class="info-value">{{ count($invoice['items']) }} Artworks</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Certificate:</span>
                    <span class="info-value">Blockchain-Verified</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Authentication:</span>
                    <span class="info-value">Gallery Certified</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Insurance:</span>
                    <span class="info-value">12 Months Included</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ITEMS TABLE -->
    <div class="items-section">
        <h2 class="section-title">Artwork Portfolio</h2>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Artwork Title</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice['items'] as $item)
                <tr>
                    <td class="item-title">{{ $item['title'] }}</td>
                    <td class="item-qty">{{ $item['qty'] }} unit</td>
                    <td class="item-subtotal">Rp {{ number_format($item['price'] * $item['qty']) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- TOTAL SECTION -->
    <div class="total-section">
        <div class="total-row">
            <span class="total-label">TOTAL INVESTMENT</span>
            <span class="total-amount">Rp {{ number_format($invoice['total']) }}</span>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer-section">
        <div class="footer-column">
            <h3 class="footer-title">Payment Information</h3>
            <p class="footer-text">
                Payment processed successfully via secure gateway.<br>
                Transaction ID: TXN-{{ strtoupper(substr(md5($invoice['invoice_number']), 0, 12)) }}
            </p>
        </div>
        
        <div class="footer-column">
            <h3 class="footer-title">Delivery Details</h3>
            <p class="footer-text">
                White-glove delivery service included.<br>
                Estimated delivery: 7-10 business days<br>
                Tracking will be provided via email.
            </p>
        </div>
        
        <div class="footer-column">
            <h3 class="footer-title">Authenticity Guarantee</h3>
            <p class="footer-text">
                All artworks are certified and authenticated.<br>
                100% authenticity guarantee with lifetime verification.
            </p>
        </div>
    </div>
</div>

<!-- ACTION BUTTONS -->
<div class="action-buttons">
    <a href="/gallery" class="home-btn">
        <i class="fas fa-home"></i>
        Back to Gallery
    </a>
    <button class="print-btn" onclick="window.print()">
        <i class="fas fa-print"></i>
        Print Invoice
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add page load animation
    const elements = document.querySelectorAll('.invoice-container > *');
    elements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Auto-generate PDF filename
    const invoiceNumber = "{{ $invoice['invoice_number'] }}";
    document.title = `Artifex_Invoice_${invoiceNumber}`;
    
    // Add watermark effect for print
    const style = document.createElement('style');
    style.textContent = `
        @media print {
            .invoice-container::after {
                content: 'ARTIFEX GALLERY - CERTIFIED INVOICE';
                position: fixed;
                bottom: 20px;
                right: 20px;
                font-size: 12px;
                color: rgba(0,0,0,0.1);
                transform: rotate(-45deg);
                pointer-events: none;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>

</body>
</html>