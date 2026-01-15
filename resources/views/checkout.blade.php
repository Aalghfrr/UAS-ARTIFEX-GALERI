<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artifex Gallery - Checkout</title>
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
            min-height: 100vh;
            padding: 20px;
        }

        /* ===== HEADER ===== */
        .header {
            background: rgba(0, 0, 0, 0.9);
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .logo {
            font-size: 26px;
            font-weight: 900;
            background: linear-gradient(135deg, var(--gold), #FFD700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        /* ===== PAGE TITLE ===== */
        .page-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title h1 {
            font-size: 42px;
            font-weight: 900;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #fff, var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.2);
        }

        .page-subtitle {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
        }

        /* ===== CHECKOUT CONTAINER ===== */
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        @media (max-width: 768px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
        }

        /* ===== ORDER SUMMARY ===== */
        .order-summary {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
            height: fit-content;
        }

        .summary-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .summary-title::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--gold);
        }

        /* ===== ORDER TABLE ===== */
        .order-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 30px;
        }

        .order-table th {
            background: rgba(212, 175, 55, 0.1);
            padding: 18px;
            text-align: left;
            font-weight: 600;
            color: var(--gold);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .order-table td {
            padding: 20px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .order-table tr:last-child td {
            border-bottom: none;
        }

        .order-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        /* ===== TOTAL DISPLAY ===== */
        .total-display {
            background: rgba(212, 175, 55, 0.05);
            border-radius: 16px;
            padding: 25px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            margin-top: 20px;
        }

        .total-label {
            font-size: 18px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }

        .total-amount {
            font-size: 42px;
            font-weight: 900;
            color: var(--gold);
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
        }

        /* ===== BANK ACCOUNTS SECTION ===== */
        .bank-accounts {
            margin-top: 30px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 16px;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .bank-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bank-title i {
            font-size: 22px;
        }

        .bank-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .bank-item {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .bank-item:hover {
            background: rgba(212, 175, 55, 0.05);
            border-color: rgba(212, 175, 55, 0.2);
            transform: translateX(5px);
        }

        .bank-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .bank-name {
            font-size: 18px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bank-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: black;
        }

        .bank-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        @media (max-width: 480px) {
            .bank-details {
                grid-template-columns: 1fr;
            }
        }

        .bank-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .bank-label {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .bank-value {
            font-size: 16px;
            font-weight: 600;
            color: white;
            font-family: 'Courier New', monospace;
            padding: 8px 12px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copy-btn {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .copy-btn:hover {
            background: var(--gold);
            color: black;
        }

        /* ===== PAYMENT UPLOAD SECTION ===== */
        .payment-upload {
            margin-top: 25px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 16px;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }

        .upload-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .upload-title i {
            font-size: 22px;
        }

        .upload-area {
            border: 2px dashed rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.02);
        }

        .upload-area:hover {
            border-color: var(--gold);
            background: rgba(212, 175, 55, 0.05);
        }

        .upload-area.dragover {
            border-color: var(--gold);
            background: rgba(212, 175, 55, 0.1);
            transform: scale(1.02);
        }

        .upload-icon {
            font-size: 48px;
            color: var(--gold);
            margin-bottom: 15px;
        }

        .upload-text {
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.9);
        }

        .upload-subtext {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 20px;
        }

        .browse-btn {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .browse-btn:hover {
            background: var(--gold);
            color: black;
        }

        .file-preview {
            margin-top: 20px;
            display: none;
        }

        .file-preview.active {
            display: block;
            animation: fadeIn 0.5s ease-out;
        }

        .preview-item {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .file-icon {
            font-size: 24px;
            color: var(--gold);
        }

        .file-info {
            flex: 1;
        }

        .file-name {
            font-weight: 600;
            color: white;
            margin-bottom: 5px;
        }

        .file-size {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        .remove-btn {
            background: rgba(230, 0, 35, 0.1);
            border: 1px solid var(--accent);
            color: var(--accent);
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .remove-btn:hover {
            background: var(--accent);
            color: white;
        }

        /* ===== CHECKOUT FORM ===== */
        .checkout-form {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
        }

        .form-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-title::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--gold);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 16px;
            transition: var(--transition);
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.1);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        /* ===== SUBMIT BUTTON ===== */
        .submit-btn {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
            border: none;
            border-radius: 16px;
            font-weight: 800;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .submit-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(212, 175, 55, 0.4);
            background: linear-gradient(135deg, #FFD700, var(--gold));
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* ===== PAYMENT INSTRUCTION ===== */
        .payment-instruction {
            margin-top: 25px;
            padding: 20px;
            background: rgba(212, 175, 55, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .instruction-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .instruction-list {
            padding-left: 20px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            line-height: 1.6;
        }

        .instruction-list li {
            margin-bottom: 8px;
        }

        /* ===== SECURITY SECTION ===== */
        .security-section {
            margin-top: 30px;
            padding: 20px;
            background: rgba(6, 214, 160, 0.1);
            border: 1px solid rgba(6, 214, 160, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .security-icon {
            color: var(--success);
            font-size: 24px;
        }

        .security-text {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .order-table tbody tr {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .order-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .order-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .order-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .order-table tbody tr:nth-child(4) { animation-delay: 0.4s; }

        .bank-item {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .bank-item:nth-child(1) { animation-delay: 0.2s; }
        .bank-item:nth-child(2) { animation-delay: 0.3s; }
        .bank-item:nth-child(3) { animation-delay: 0.4s; }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 14px;
        }

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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- HEADER -->
<header class="header">
    <a href="/" class="logo">
        <span>🎨</span>
        ARTIFEX GALLERY
    </a>
</header>

<!-- PAGE TITLE -->
<div class="page-title">
    <h1>Complete Your Investment</h1>
    <p class="page-subtitle">Finalize your premium art collection with secure checkout</p>
</div>

<!-- CHECKOUT CONTAINER -->
<div class="checkout-container">
    <!-- ORDER SUMMARY -->
    <div class="order-summary">
        <h2 class="summary-title">Order Summary</h2>
        
        <table class="order-table">
            <thead>
                <tr>
                    <th>Artwork</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>Rp {{ number_format($item['price'] * $item['qty']) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-display">
            <div class="total-label">Total Investment</div>
            <div class="total-amount">Rp {{ number_format($total) }}</div>
        </div>

        <!-- BANK ACCOUNTS SECTION -->
        <div class="bank-accounts">
            <h3 class="bank-title">
                <i class="fas fa-university"></i>
                Transfer Payment to:
            </h3>
            
            <div class="bank-list">
                <!-- Bank 1 -->
                <div class="bank-item">
                    <div class="bank-header">
                        <div class="bank-name">
                            <div class="bank-logo">BCA</div>
                            Bank Central Asia
                        </div>
                        <button type="button" class="copy-btn" onclick="copyToClipboard('1234567890')">
                            <i class="far fa-copy"></i>
                            Copy
                        </button>
                    </div>
                    <div class="bank-details">
                        <div class="bank-info">
                            <div class="bank-label">Account Number</div>
                            <div class="bank-value">1234567890</div>
                        </div>
                        <div class="bank-info">
                            <div class="bank-label">Account Name</div>
                            <div class="bank-value">PT. ARTIFEX GALLERY</div>
                        </div>
                    </div>
                </div>

                <!-- Bank 2 -->
                <div class="bank-item">
                    <div class="bank-header">
                        <div class="bank-name">
                            <div class="bank-logo">MDR</div>
                            Bank Mandiri
                        </div>
                        <button type="button" class="copy-btn" onclick="copyToClipboard('0987654321')">
                            <i class="far fa-copy"></i>
                            Copy
                        </button>
                    </div>
                    <div class="bank-details">
                        <div class="bank-info">
                            <div class="bank-label">Account Number</div>
                            <div class="bank-value">0987654321</div>
                        </div>
                        <div class="bank-info">
                            <div class="bank-label">Account Name</div>
                            <div class="bank-value">PT. ARTIFEX GALLERY INDONESIA</div>
                        </div>
                    </div>
                </div>

                <!-- Bank 3 -->
                <div class="bank-item">
                    <div class="bank-header">
                        <div class="bank-name">
                            <div class="bank-logo">BNI</div>
                            Bank Negara Indonesia
                        </div>
                        <button type="button" class="copy-btn" onclick="copyToClipboard('2468135790')">
                            <i class="far fa-copy"></i>
                            Copy
                        </button>
                    </div>
                    <div class="bank-details">
                        <div class="bank-info">
                            <div class="bank-label">Account Number</div>
                            <div class="bank-value">2468135790</div>
                        </div>
                        <div class="bank-info">
                            <div class="bank-label">Account Name</div>
                            <div class="bank-value">ARTIFEX GALLERY DIGITAL</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Instructions -->
            <div class="payment-instruction">
                <div class="instruction-title">
                    <i class="fas fa-info-circle"></i>
                    Payment Instructions
                </div>
                <ul class="instruction-list">
                    <li>Transfer the exact amount: <strong>Rp {{ number_format($total) }}</strong></li>
                    <li>Include your order ID in the transfer description</li>
                    <li>Payments will be verified within 1-2 business hours</li>
                    <li>After payment, upload proof of transfer below</li>
                </ul>
            </div>
        </div>

        <!-- PAYMENT UPLOAD SECTION -->
        <div class="payment-upload">
            <h3 class="upload-title">
                <i class="fas fa-file-upload"></i>
                Upload Payment Proof
            </h3>
            
            <div class="upload-area" id="uploadArea">
                <div class="upload-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <div class="upload-text">
                    <strong>Drop your payment proof here</strong>
                </div>
                <div class="upload-subtext">
                    Supported: JPG, PNG, PDF (Max 5MB)
                </div>
                <button type="button" class="browse-btn" id="browseBtn">
                    <i class="fas fa-folder-open"></i>
                    Browse Files
                </button>
                <input type="file" id="paymentProof" name="payment_proof" accept=".jpg,.jpeg,.png,.pdf,.gif" style="display: none;">
            </div>

            <div class="file-preview" id="filePreview">
                <div class="preview-item">
                    <div class="file-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="file-info">
                        <div class="file-name" id="fileName">payment_proof.jpg</div>
                        <div class="file-size" id="fileSize">2.4 MB</div>
                    </div>
                    <button type="button" class="remove-btn" id="removeFile">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- CHECKOUT FORM -->
    <div class="checkout-form">
        <h2 class="form-title">Delivery Information</h2>
        
        <form method="POST" action="{{ route('checkout.process') }}" id="checkoutForm" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-input" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Delivery Address</label>
                <input type="text" name="address" class="form-input" placeholder="Enter complete delivery address" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-input" placeholder="Enter contact number" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="Enter email for updates" required>
            </div>
            
            <!-- Hidden input for file -->
            <input type="hidden" name="payment_proof_data" id="paymentProofData">
            
            <button type="submit" class="submit-btn" id="submitBtn">
                <i class="fas fa-lock"></i>
                Complete Purchase
            </button>
        </form>
        
        <div class="security-section">
            <div class="security-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="security-text">
                <strong>Secure Transaction</strong><br>
                Your information is protected with 256-bit SSL encryption. All payments are processed securely.
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2024 ARTIFEX GALLERY. All rights reserved. | Premium Digital Art Investment Platform</p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('checkoutForm');
    const submitBtn = document.getElementById('submitBtn');
    const fileInput = document.getElementById('paymentProof');
    const browseBtn = document.getElementById('browseBtn');
    const uploadArea = document.getElementById('uploadArea');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const removeFileBtn = document.getElementById('removeFile');
    const paymentProofData = document.getElementById('paymentProofData');
    
    let selectedFile = null;

    // Browse file button click
    browseBtn.addEventListener('click', function() {
        fileInput.click();
    });

    // File input change
    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            handleFileSelect(e.target.files[0]);
        }
    });

    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        uploadArea.classList.add('dragover');
    }

    function unhighlight() {
        uploadArea.classList.remove('dragover');
    }

    uploadArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const file = dt.files[0];
        if (file) {
            handleFileSelect(file);
        }
    });

    // Handle file selection
    function handleFileSelect(file) {
        // Check file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            showNotification('File size exceeds 5MB limit', 'error');
            return;
        }

        // Check file type
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'application/pdf'];
        if (!validTypes.includes(file.type)) {
            showNotification('Invalid file type. Please upload JPG, PNG, or PDF', 'error');
            return;
        }

        selectedFile = file;
        
        // Update preview
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        filePreview.classList.add('active');

        // Convert file to base64 for form submission
        const reader = new FileReader();
        reader.onload = function(e) {
            paymentProofData.value = e.target.result;
        };
        reader.readAsDataURL(file);

        showNotification('Payment proof uploaded successfully!', 'success');
    }

    // Remove file
    removeFileBtn.addEventListener('click', function() {
        selectedFile = null;
        fileInput.value = '';
        filePreview.classList.remove('active');
        paymentProofData.value = '';
        showNotification('File removed', 'info');
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        const name = form.querySelector('input[name="name"]').value.trim();
        const address = form.querySelector('input[name="address"]').value.trim();
        
        if (!name || !address) {
            e.preventDefault();
            showNotification('Please fill in all required fields', 'error');
            return;
        }
        
        // Check if payment proof is uploaded
        if (!selectedFile) {
            e.preventDefault();
            showNotification('Please upload payment proof before completing purchase', 'error');
            return;
        }
        
        // Button loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        submitBtn.disabled = true;
        submitBtn.style.background = 'linear-gradient(135deg, #4ECDC4, #44A08D)';
    });
    
    // Input focus effects
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-5px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });
    
    // Table row hover effect
    document.querySelectorAll('.order-table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Auto-fill user info if available
    const currentUser = "{{ auth()->user()->name ?? '' }}";
    if (currentUser) {
        const nameInput = form.querySelector('input[name="name"]');
        if (nameInput.value === '') {
            nameInput.value = currentUser;
        }
    }
});

// Copy account number function
function copyToClipboard(text) {
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    
    showNotification('Account number copied to clipboard!', 'success');
}

// Show notification
function showNotification(message, type) {
    const colors = {
        success: '#06D6A0',
        error: '#E60023',
        info: '#D4AF37'
    };
    
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${colors[type] || colors.info};
        color: ${type === 'success' ? 'black' : 'white'};
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        z-index: 1000;
        animation: slideIn 0.3s ease-out;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        gap: 10px;
        max-width: 350px;
    `;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'exclamation' : 'info'}-circle"></i>
        ${message}
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out forwards';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Format file size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Add animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>

</body>
</html>