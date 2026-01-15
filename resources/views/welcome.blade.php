<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artifex Gallery - Premium Art Marketplace</title>
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
            overflow-x: hidden;
        }

        /* ===== MINIMAL HEADER ===== */
        .header-minimal {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            animation: slideDown 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        .logo-premium {
            font-size: 26px;
            font-weight: 900;
            letter-spacing: 1px;
            background: linear-gradient(135deg, var(--gold), #FFD700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .logo-premium:hover {
            transform: scale(1.05);
            text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        }

        .logo-icon {
            font-size: 28px;
            filter: drop-shadow(0 0 10px rgba(212, 175, 55, 0.3));
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .cart-icon {
            position: relative;
            color: var(--light);
            font-size: 20px;
            text-decoration: none;
            transition: var(--transition);
        }

        .cart-icon:hover {
            color: var(--gold);
            transform: scale(1.1);
        }

        .user-dropdown {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid var(--gold);
            transition: var(--transition);
        }

        .user-avatar:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.6);
            animation: pulseAvatar 2s infinite;
        }

        @keyframes pulseAvatar {
            0%, 100% { box-shadow: 0 0 20px rgba(212, 175, 55, 0.4); }
            50% { box-shadow: 0 0 30px rgba(212, 175, 55, 0.8); }
        }

        /* ===== LOGOUT BUTTON ===== */
        .logout-btn {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
            margin-left: 10px;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
            background: linear-gradient(135deg, #ff5a4a, #d43c2d);
        }

        /* ===== PURE IMAGE MASONRY ===== */
        .masonry-container {
            padding: 100px 5% 50px;
            columns: 5 280px;
            column-gap: 20px;
        }

        @media (max-width: 1800px) { .masonry-container { columns: 4 280px; } }
        @media (max-width: 1400px) { .masonry-container { columns: 3 280px; } }
        @media (max-width: 1024px) { .masonry-container { columns: 2 280px; } }
        @media (max-width: 640px) { .masonry-container { columns: 1 280px; padding: 90px 15px 30px; } }

        .artwork-pin {
            break-inside: avoid;
            margin-bottom: 20px;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: var(--transition);
            background: var(--secondary);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .artwork-pin:nth-child(2n) {
            animation-delay: 0.1s;
        }

        .artwork-pin:nth-child(3n) {
            animation-delay: 0.2s;
        }

        .artwork-pin:nth-child(4n) {
            animation-delay: 0.3s;
        }

        .artwork-pin:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.7);
        }

        .artwork-pin:hover .art-image {
            transform: scale(1.08);
        }

        .art-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

        .art-image {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .art-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, 
                rgba(0,0,0,0.8) 0%, 
                rgba(0,0,0,0.4) 40%,
                transparent 70%);
            opacity: 0;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 25px;
        }

        .artwork-pin:hover .art-overlay {
            opacity: 1;
        }

        .pin-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: auto;
        }

        .action-btn-small {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            transform: translateY(20px);
            opacity: 0;
        }

        .artwork-pin:hover .action-btn-small {
            transform: translateY(0);
            opacity: 1;
        }

        .artwork-pin:hover .action-btn-small:nth-child(1) {
            transition-delay: 0.1s;
        }

        .artwork-pin:hover .action-btn-small:nth-child(2) {
            transition-delay: 0.2s;
        }

        .action-btn-small:hover {
            background: white;
            transform: scale(1.2) rotate(10deg);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .action-btn-small.save-btn {
            background: var(--accent);
            color: white;
        }

        .action-btn-small.save-btn:hover {
            background: #c00;
            transform: scale(1.2) rotate(-10deg);
        }

        .art-info-minimal {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.95), transparent);
            opacity: 0;
            transform: translateY(10px);
            transition: var(--transition);
        }

        .artwork-pin:hover .art-info-minimal {
            opacity: 1;
            transform: translateY(0);
        }

        .art-title-minimal {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 6px;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .art-artist-minimal {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }

        /* ===== LUXURY MODAL ===== */
        .modal-overlay-luxury {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.96);
            backdrop-filter: blur(40px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .modal-overlay-luxury.active {
            display: flex;
            opacity: 1;
            animation: modalFadeIn 0.5s ease;
        }

        @keyframes modalFadeIn {
            from { 
                opacity: 0;
                backdrop-filter: blur(0);
            }
            to { 
                opacity: 1;
                backdrop-filter: blur(40px);
            }
        }

        .modal-luxury {
            background: rgba(15, 15, 15, 0.98);
            border-radius: 28px;
            width: 95%;
            max-width: 1300px;
            max-height: 92vh;
            overflow: hidden;
            display: flex;
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.8);
            position: relative;
            transform: scale(0.95);
            animation: modalSlideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        @keyframes modalSlideUp {
            to {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .modal-luxury {
                flex-direction: column;
                max-height: 96vh;
            }
        }

        .modal-close-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            background: rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 26px;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(15px);
        }

        .modal-close-btn:hover {
            background: rgba(230, 0, 35, 0.3);
            border-color: var(--accent);
            transform: rotate(180deg) scale(1.1);
            box-shadow: 0 0 25px rgba(230, 0, 35, 0.4);
        }

        .modal-image-section {
            flex: 1.2;
            min-height: 550px;
            background: linear-gradient(135deg, #0a0a0a, #000);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .modal-main-image {
            max-width: 95%;
            max-height: 90vh;
            object-fit: contain;
            animation: imageReveal 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.7));
        }

        @keyframes imageReveal {
            from { 
                opacity: 0;
                transform: scale(0.9) rotate(-2deg);
                filter: blur(10px);
            }
            to { 
                opacity: 1;
                transform: scale(1) rotate(0);
                filter: blur(0);
            }
        }

        .modal-content-luxury {
            flex: 1;
            padding: 45px;
            overflow-y: auto;
            background: linear-gradient(135deg, rgba(20,20,20,0.97), rgba(10,10,10,0.99));
            position: relative;
        }

        .modal-content-luxury::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .modal-header-luxury {
            margin-bottom: 35px;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            position: relative;
        }

        .modal-header-luxury::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .modal-title-luxury {
            font-size: 36px;
            font-weight: 900;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #fff, var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.2);
        }

        .modal-artist-info {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 35px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 16px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: var(--transition);
        }

        .modal-artist-info:hover {
            transform: translateX(10px);
            border-color: var(--gold);
            background: rgba(212, 175, 55, 0.05);
        }

        .artist-avatar-luxury {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #FFD700);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            color: var(--primary);
            border: 4px solid var(--gold);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
            transition: var(--transition);
        }

        .modal-artist-info:hover .artist-avatar-luxury {
            transform: rotate(15deg) scale(1.1);
        }

        .artist-details h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            color: white;
        }

        .artist-details p {
            font-size: 14px;
            color: var(--gray);
        }

        .modal-price-section {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 35px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
        }

        .modal-price-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .price-label {
            font-size: 14px;
            color: var(--gold);
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .modal-price-luxury {
            font-size: 48px;
            font-weight: 900;
            color: var(--gold);
            letter-spacing: 1px;
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.4);
            animation: priceGlow 3s infinite alternate;
        }

        @keyframes priceGlow {
            from { text-shadow: 0 5px 20px rgba(212, 175, 55, 0.4); }
            to { text-shadow: 0 5px 30px rgba(212, 175, 55, 0.8); }
        }

        .modal-description {
            font-size: 17px;
            line-height: 1.9;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 16px;
            border-left: 4px solid var(--gold);
            animation: fadeInText 1s ease-out;
        }

        @keyframes fadeInText {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .modal-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-box:hover {
            transform: translateY(-8px);
            border-color: rgba(212, 175, 55, 0.3);
            background: rgba(212, 175, 55, 0.05);
        }

        .stat-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0;
            transition: var(--transition);
        }

        .stat-box:hover::before {
            opacity: 1;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--gold);
            margin-bottom: 8px;
            transition: var(--transition);
        }

        .stat-box:hover .stat-value {
            transform: scale(1.1);
        }

        .stat-label {
            font-size: 13px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .modal-actions-luxury {
            display: flex;
            gap: 18px;
            margin-bottom: 45px;
        }

        .modal-action-btn {
            flex: 1;
            padding: 20px 35px;
            border-radius: 16px;
            font-weight: 700;
            font-size: 17px;
            border: none;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .modal-action-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .modal-action-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .modal-action-btn.like-btn {
            background: rgba(255, 255, 255, 0.05);
            color: var(--light);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-action-btn.like-btn:hover,
        .modal-action-btn.like-btn.active {
            background: rgba(230, 0, 35, 0.2);
            color: var(--accent);
            border-color: var(--accent);
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(230, 0, 35, 0.2);
        }

        .modal-action-btn.cart-btn {
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .modal-action-btn.cart-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.4);
            animation: cartPulse 0.5s ease;
        }

        @keyframes cartPulse {
            0%, 100% { transform: translateY(-5px) scale(1.05); }
            50% { transform: translateY(-5px) scale(1.1); }
        }

        /* ===== COMMENTS SECTION ===== */
        .modal-comments-section {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .comments-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 30px;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .comments-title::before {
            content: '';
            width: 40px;
            height: 2px;
            background: var(--gold);
        }

        .comment {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.03);
            transition: var(--transition);
            opacity: 0;
            transform: translateY(20px);
            animation: commentFadeIn 0.5s ease-out forwards;
        }

        @keyframes commentFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .comment:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(212, 175, 55, 0.2);
        }

        .comment-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            color: white;
            transition: var(--transition);
        }

        .comment:hover .comment-avatar {
            transform: scale(1.1) rotate(5deg);
        }

        .comment-content {
            flex: 1;
        }

        .comment-author {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 8px;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .author-badge {
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 12px;
            background: rgba(212, 175, 55, 0.2);
            color: var(--gold);
        }

        .comment-text {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .comment-time {
            font-size: 12px;
            color: var(--gray);
        }

        /* ===== COMMENT FORM ===== */
        .comment-form-container {
            margin-top: 30px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .comment-form-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .current-user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            color: var(--primary);
            border: 2px solid var(--gold);
        }

        .current-user-info h4 {
            font-size: 16px;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .current-user-info p {
            font-size: 13px;
            color: var(--gray);
        }

        .comment-input-container {
            position: relative;
            margin-bottom: 15px;
        }

        .comment-textarea {
            width: 100%;
            min-height: 100px;
            padding: 18px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            resize: vertical;
            transition: var(--transition);
        }

        .comment-textarea:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.1);
        }

        .comment-submit-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            float: right;
        }

        .comment-submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.3);
            background: linear-gradient(135deg, #FFD700, var(--gold));
        }

        .comment-submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* ===== ABOUT SECTION LUXURY ===== */
        .about-section {
            padding: 120px 5%;
            background: linear-gradient(135deg, #0a0a0a, #000);
            position: relative;
            overflow: hidden;
        }

        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .about-header {
            text-align: center;
            margin-bottom: 80px;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        .section-subtitle {
            font-size: 14px;
            color: var(--gold);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: block;
        }

        .section-title {
            font-size: 52px;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 25px;
            text-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .section-description {
            font-size: 18px;
            line-height: 1.9;
            color: rgba(255, 255, 255, 0.7);
            max-width: 800px;
            margin: 0 auto 40px;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 35px;
            margin-bottom: 80px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            padding: 45px 35px;
            border-radius: 24px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(40px);
        }

        .feature-card:nth-child(1) { animation: fadeInUp 0.8s ease-out 0.4s forwards; }
        .feature-card:nth-child(2) { animation: fadeInUp 0.8s ease-out 0.6s forwards; }
        .feature-card:nth-child(3) { animation: fadeInUp 0.8s ease-out 0.8s forwards; }

        .feature-card:hover {
            transform: translateY(-15px);
            border-color: var(--gold);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            background: rgba(212, 175, 55, 0.05);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
            opacity: 0;
            transition: var(--transition);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 25px;
            color: var(--gold);
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.2) rotate(10deg);
        }

        .feature-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 18px;
            color: white;
        }

        .feature-desc {
            font-size: 16px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.6);
        }

        .about-stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            flex-wrap: wrap;
            margin-top: 80px;
            padding-top: 80px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .stat-item {
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
        }

        .stat-item:nth-child(1) { animation: fadeInUp 0.8s ease-out 0.5s forwards; }
        .stat-item:nth-child(2) { animation: fadeInUp 0.8s ease-out 0.6s forwards; }
        .stat-item:nth-child(3) { animation: fadeInUp 0.8s ease-out 0.7s forwards; }
        .stat-item:nth-child(4) { animation: fadeInUp 0.8s ease-out 0.8s forwards; }

        .stat-number {
            font-size: 56px;
            font-weight: 900;
            color: var(--gold);
            margin-bottom: 12px;
            line-height: 1;
            text-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
            transition: var(--transition);
        }

        .stat-item:hover .stat-number {
            transform: scale(1.1);
            text-shadow: 0 5px 30px rgba(212, 175, 55, 0.6);
        }

        .stat-text {
            font-size: 14px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* ===== LUXURY FOOTER ===== */
        .footer-luxury {
            background: #000;
            padding: 100px 5% 50px;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            position: relative;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 60px;
            margin-bottom: 80px;
        }

        .footer-logo {
            font-size: 32px;
            font-weight: 900;
            background: linear-gradient(135deg, var(--gold), #FFD700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 25px;
            display: block;
            transition: var(--transition);
        }

        .footer-logo:hover {
            transform: scale(1.05);
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.5);
        }

        .footer-tagline {
            font-size: 17px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 35px;
        }

        .social-links {
            display: flex;
            gap: 18px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.3), transparent);
            transition: left 0.6s;
        }

        .social-link:hover::before {
            left: 100%;
        }

        .social-link:hover {
            background: var(--gold);
            color: var(--primary);
            transform: translateY(-5px) rotate(5deg);
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.3);
        }

        .footer-column h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 30px;
            color: white;
            position: relative;
            padding-bottom: 15px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--gold);
            transition: width 0.3s;
        }

        .footer-column:hover h3::after {
            width: 80px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 15px;
            opacity: 0;
            transform: translateX(-20px);
        }

        .footer-links li:nth-child(1) { animation: slideInRight 0.5s ease-out 0.1s forwards; }
        .footer-links li:nth-child(2) { animation: slideInRight 0.5s ease-out 0.2s forwards; }
        .footer-links li:nth-child(3) { animation: slideInRight 0.5s ease-out 0.3s forwards; }
        .footer-links li:nth-child(4) { animation: slideInRight 0.5s ease-out 0.4s forwards; }
        .footer-links li:nth-child(5) { animation: slideInRight 0.5s ease-out 0.5s forwards; }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 16px;
            display: block;
            padding: 8px 0;
            position: relative;
        }

        .footer-links a:hover {
            color: var(--gold);
            padding-left: 15px;
            transform: translateX(10px);
        }

        .footer-links a::before {
            content: '→';
            position: absolute;
            left: -20px;
            opacity: 0;
            transition: all 0.3s;
        }

        .footer-links a:hover::before {
            opacity: 1;
            left: 0;
        }

        .newsletter-form {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .newsletter-input {
            flex: 1;
            padding: 16px 22px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 15px;
            transition: var(--transition);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.2);
            transform: translateY(-3px);
        }

        .newsletter-btn {
            background: linear-gradient(135deg, var(--gold), #B8860B);
            color: var(--primary);
            border: none;
            padding: 0 30px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
        }

        .newsletter-btn:hover {
            background: linear-gradient(135deg, #FFD700, var(--gold));
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.3);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 50px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 15px;
            opacity: 0;
            animation: fadeIn 1s ease-out 1s forwards;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.2);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--gold), transparent);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #FFD700, var(--gold));
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- MINIMAL HEADER -->
<header class="header-minimal">
    <a href="#" class="logo-premium">
        <span class="logo-icon">🎨</span>
        ARTIFEX GALLERY
    </a>
    
    <div class="header-actions">
        <a href="{{ route('cart') }}" class="cart-icon">
            <i class="fas fa-shopping-bag"></i>
        </a>
        
        <div class="user-dropdown">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
        
        <!-- LOGOUT BUTTON -->
        <a class="logout-btn" href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>

<!-- PURE IMAGE MASONRY (PINTREST STYLE) -->
<main class="masonry-container">
    @foreach ($artworks as $index => $art)
    <div class="artwork-pin" 
         data-id="{{ $art->id }}"
         data-title="{{ $art->title }}"
         data-artist="{{ $art->artist_name }}"
         data-price="{{ $art->price }}"
         data-image="{{ $art->image }}"
         data-likes="{{ rand(50, 500) }}"
         data-views="{{ rand(1000, 5000) }}"
         data-saves="{{ rand(20, 200) }}"
         data-comments="{{ rand(3, 12) }}"
         data-description="{{ $art->description ?? 'Sebuah mahakarya seni digital yang menggabungkan teknik tradisional dengan teknologi modern, menciptakan pengalaman visual yang tak terlupakan.' }}">
        
        <div class="art-image-wrapper">
            <img src="{{ $art->image }}" alt="{{ $art->title }}" class="art-image">
            
            <div class="art-overlay">
                <div class="pin-actions">
                    <button class="action-btn-small save-btn">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <form action="{{ route('cart.add', $art->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="action-btn-small">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="art-info-minimal">
            <div class="art-title-minimal">{{ $art->title }}</div>
            <div class="art-artist-minimal">by {{ $art->artist_name }}</div>
        </div>
    </div>
    @endforeach
</main>

<!-- LUXURY MODAL DETAIL -->
<div class="modal-overlay-luxury" id="luxuryModal">
    <div class="modal-luxury">
        <button class="modal-close-btn" id="closeLuxuryModal">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-image-section">
            <img src="" alt="" class="modal-main-image" id="modalLuxuryImage">
        </div>
        
        <div class="modal-content-luxury">
            <div class="modal-header-luxury">
                <h1 class="modal-title-luxury" id="modalLuxuryTitle"></h1>
            </div>
            
            <div class="modal-artist-info">
                <div class="artist-avatar-luxury" id="modalLuxuryArtistAvatar"></div>
                <div class="artist-details">
                    <h3 id="modalLuxuryArtist"></h3>
                    <p>Verified Artist</p>
                </div>
            </div>
            
            <div class="modal-price-section">
                <div class="price-label">Investment Value</div>
                <div class="modal-price-luxury" id="modalLuxuryPrice"></div>
            </div>
            
            <div class="modal-description" id="modalLuxuryDescription"></div>
            
            <div class="modal-stats">
                <div class="stat-box">
                    <div class="stat-value" id="modalLikes">0</div>
                    <div class="stat-label">Likes</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value" id="modalViews">0</div>
                    <div class="stat-label">Views</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value" id="modalSaves">0</div>
                    <div class="stat-label">Saves</div>
                </div>
            </div>
            
            <div class="modal-actions-luxury">
                <button class="modal-action-btn like-btn" id="modalLikeBtnLuxury">
                    <i class="fas fa-heart"></i>
                    <span>Like</span>
                </button>
                <form action="" method="POST" style="flex: 1">
                    @csrf
                    <button type="submit" class="modal-action-btn cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Add to Collection</span>
                    </button>
                </form>
            </div>
            
            <div class="modal-comments-section" id="modalCommentsSection">
                <h3 class="comments-title">
                    <span>Collector Insights</span>
                    <span id="commentsCount" style="font-size: 14px; color: var(--gold);">(0)</span>
                </h3>
                <div id="commentsContainer"></div>
                
                <!-- COMMENT FORM FOR LOGGED IN USER -->
                <div class="comment-form-container">
                    <div class="comment-form-header">
                        <div class="current-user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="current-user-info">
                            <h4>{{ auth()->user()->name }}</h4>
                            <p>Add your insight as a collector</p>
                        </div>
                    </div>
                    <form id="userCommentForm">
                        <div class="comment-input-container">
                            <textarea class="comment-textarea" id="userCommentInput" 
                                      placeholder="Share your thoughts about this artwork... (Your comment will be visible to others)" 
                                      maxlength="500"></textarea>
                        </div>
                        <button type="submit" class="comment-submit-btn" id="submitCommentBtn">
                            <i class="fas fa-paper-plane"></i>
                            Post Comment
                        </button>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT ARTIFEX GALLERY SECTION -->
<section class="about-section">
    <div class="about-container">
        <div class="about-header">
            <span class="section-subtitle">Premium Art Marketplace</span>
            <h2 class="section-title">ARTIFEX GALLERY</h2>
            <p class="section-description">
                Sebuah platform kurasi digital yang menghubungkan kolektor dengan seniman terbaik dunia. 
                Setiap karya di Artifex adalah investasi seni yang dipilih dengan standar kurasi tertinggi, 
                menjamin keaslian, kualitas, dan potensi apresiasi nilai.
            </p>
        </div>
        
        <div class="about-features">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 class="feature-title">Kurasi Premium</h3>
                <p class="feature-desc">
                    Hanya 1 dari 100 karya yang lolos seleksi ketat kurator kami. 
                    Setiap artwork menjamin kualitas museum-grade.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="feature-title">Sertifikasi NFT</h3>
                <p class="feature-desc">
                    Setiap karya dilengkapi sertifikat keaslian digital berbasis blockchain 
                    yang menjamin kepemilikan eksklusif.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Garansi Investasi</h3>
                <p class="feature-desc">
                    Program buy-back guarantee untuk karya terpilih. 
                    Lindungi investasi seni Anda dengan jaminan kami.
                </p>
            </div>
        </div>
        
        <div class="about-stats">
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-text">Seniman Premium</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">$25M+</div>
                <div class="stat-text">Volume Transaksi</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-text">Kepuasan Kolektor</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-text">Negara</div>
            </div>
        </div>
    </div>
</section>

<!-- LUXURY FOOTER -->
<footer class="footer-luxury">
    <div class="footer-content">
        <div class="footer-column">
            <div class="footer-logo">ARTIFEX GALLERY</div>
            <p class="footer-tagline">
                The world's premier digital art marketplace. 
                Where masterpieces meet discerning collectors.
            </p>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-discord"></i></a>
                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        
        <div class="footer-column">
            <h3>Marketplace</h3>
            <ul class="footer-links">
                <li><a href="#">Digital Paintings</a></li>
                <li><a href="#">Generative Art</a></li>
                <li><a href="#">Photography</a></li>
                <li><a href="#">3D Sculptures</a></li>
                <li><a href="#">AI Art</a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h3>Resources</h3>
            <ul class="footer-links">
                <li><a href="#">Art Investment Guide</a></li>
                <li><a href="#">Artist Directory</a></li>
                <li><a href="#">Authentication</a></li>
                <li><a href="#">Shipping & Handling</a></li>
                <li><a href="#">Tax & Legal</a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h3>Stay Updated</h3>
            <p style="color: rgba(255,255,255,0.6); margin-bottom: 20px; font-size: 14px;">
                Dapatkan kurasi eksklusif dan insight pasar seni digital.
            </p>
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Your email address">
                <button type="submit" class="newsletter-btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>© 2024 ARTIFEX GALLERY. All rights reserved. | Premium Digital Art Marketplace</p>
        <p style="margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.3);">
            This is a premium platform. All artworks are authenticated and certified.
        </p>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const luxuryModal = document.getElementById('luxuryModal');
    let currentArtworkId = null;
    
    // ===== USER DATA =====
    const currentUser = {
        name: "{{ auth()->user()->name }}",
        initial: "{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}",
        badge: "Collector"
    };
    
    // ===== DUMMY COMMENTS DATA =====
    const dummyComments = [
        {
            names: ["Budi Santoso", "Siti Rahayu", "Agus Wijaya", "Dewi Lestari", "Rudi Hartono", "Maya Sari", "Ahmad Fauzi", "Linda Permata", "Hendra Kurniawan", "Rina Anggraeni"],
            comments: [
                "Karya yang luar biasa! Detailnya sangat memukau.",
                "Warnanya sangat hidup dan kontras, benar-benar masterpiece.",
                "Teknik yang digunakan sangat inovatif dan fresh.",
                "Potensi investasi yang sangat baik untuk kolektor.",
                "Artist ini selalu konsisten dengan kualitasnya.",
                "Karya ini layak untuk museum internasional.",
                "Sudah lama mencari karya seindah ini, worth it!",
                "Detail kecilnya benar-benar bikin takjub.",
                "Kombinasi warna yang sangat berani dan elegan.",
                "Setiap kali melihat, selalu menemukan detail baru.",
                "Karya yang akan terus naik nilainya.",
                "Teknik blendingnya benar-benar sempurna.",
                "Membuat saya terpukau sejak pertama kali melihat.",
                "Artist ini punya ciri khas yang sangat kuat.",
                "Karya yang cocok untuk investasi jangka panjang.",
                "Komposisinya sangat seimbang dan harmonis.",
                "Teknologi dan seni tradisional berpadu sempurna.",
                "Karya yang bercerita tanpa kata-kata.",
                "Setiap stroke kuas punya makna yang dalam.",
                "Layak menjadi centerpiece di gallery mana pun."
            ],
            badges: ["Premium Collector", "Art Investor", "Gallery Owner", "Curator", "Art Enthusiast"],
            times: ["1 hour ago", "2 hours ago", "Yesterday", "3 days ago", "1 week ago", "2 weeks ago"]
        }
    ];
    
    // ===== GENERATE RANDOM COMMENTS =====
    function generateRandomComments(count) {
        const data = dummyComments[0];
        const comments = [];
        
        for (let i = 0; i < count; i++) {
            const randomName = data.names[Math.floor(Math.random() * data.names.length)];
            const randomComment = data.comments[Math.floor(Math.random() * data.comments.length)];
            const randomBadge = data.badges[Math.floor(Math.random() * data.badges.length)];
            const randomTime = data.times[Math.floor(Math.random() * data.times.length)];
            const colorGradients = [
                "linear-gradient(135deg, #FF6B6B, #EE5A52)",
                "linear-gradient(135deg, #4ECDC4, #44A08D)",
                "linear-gradient(135deg, #FFD166, #FFB347)",
                "linear-gradient(135deg, #06D6A0, #059B8A)",
                "linear-gradient(135deg, #118AB2, #0A6C8F)",
                "linear-gradient(135deg, #EF476F, #D43D63)",
                "linear-gradient(135deg, #7209B7, #5A08A3)",
                "linear-gradient(135deg, #F15BB5, #D14A9E)"
            ];
            
            const randomColor = colorGradients[Math.floor(Math.random() * colorGradients.length)];
            
            comments.push({
                name: randomName,
                comment: randomComment,
                badge: randomBadge,
                time: randomTime,
                color: randomColor,
                initial: randomName.charAt(0)
            });
        }
        
        return comments;
    }
    
    // ===== CLICK PIN TO OPEN MODAL =====
    document.querySelectorAll('.artwork-pin').forEach(pin => {
        pin.addEventListener('click', function(e) {
            if (e.target.closest('button') || e.target.closest('form')) {
                return;
            }
            
            const artwork = this.dataset;
            currentArtworkId = artwork.id;
            
            // Fill modal with artwork data
            document.getElementById('modalLuxuryTitle').textContent = artwork.title;
            document.getElementById('modalLuxuryArtist').textContent = artwork.artist;
            document.getElementById('modalLuxuryArtistAvatar').textContent = artwork.artist.charAt(0);
            document.getElementById('modalLuxuryPrice').textContent = 'Rp ' + 
                parseInt(artwork.price).toLocaleString('id-ID');
            document.getElementById('modalLuxuryImage').src = artwork.image;
            document.getElementById('modalLuxuryDescription').textContent = artwork.description;
            
            // Stats
            document.getElementById('modalLikes').textContent = artwork.likes;
            document.getElementById('modalViews').textContent = artwork.views;
            document.getElementById('modalSaves').textContent = artwork.saves;
            
            // Generate random comments for this artwork
            const commentCount = parseInt(artwork.comments) || 5;
            const comments = generateRandomComments(commentCount);
            
            // Update comments count
            document.getElementById('commentsCount').textContent = `(${commentCount})`;
            
            // Clear and add comments
            const commentsContainer = document.getElementById('commentsContainer');
            commentsContainer.innerHTML = '';
            
            comments.forEach((comment, index) => {
                const commentEl = document.createElement('div');
                commentEl.className = 'comment';
                commentEl.style.animationDelay = `${index * 0.1}s`;
                
                commentEl.innerHTML = `
                    <div class="comment-avatar" style="background: ${comment.color}">
                        ${comment.initial}
                    </div>
                    <div class="comment-content">
                        <div class="comment-author">
                            ${comment.name}
                            <span class="author-badge">${comment.badge}</span>
                        </div>
                        <div class="comment-text">"${comment.comment}"</div>
                        <div class="comment-time">${comment.time}</div>
                    </div>
                `;
                
                commentsContainer.appendChild(commentEl);
            });
            
            // Update form action
            const cartForm = luxuryModal.querySelector('form[method="POST"]');
            cartForm.action = `/cart/add/${artwork.id}`;
            
            // Clear comment input
            document.getElementById('userCommentInput').value = '';
            
            // Show modal
            luxuryModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });
    
    // ===== CLOSE MODAL =====
    document.getElementById('closeLuxuryModal').addEventListener('click', closeModal);
    luxuryModal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && luxuryModal.classList.contains('active')) {
            closeModal();
        }
    });
    
    function closeModal() {
        luxuryModal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    // ===== LIKE FUNCTIONALITY =====
    document.getElementById('modalLikeBtnLuxury').addEventListener('click', function() {
        this.classList.toggle('active');
        const likesElement = document.getElementById('modalLikes');
        let likes = parseInt(likesElement.textContent);
        likes = this.classList.contains('active') ? likes + 1 : likes - 1;
        likesElement.textContent = likes;
        
        // Animation
        const heartIcon = this.querySelector('i');
        heartIcon.style.animation = 'none';
        setTimeout(() => {
            heartIcon.style.animation = 'pulse 0.5s ease';
        }, 10);
        
        if (currentArtworkId) {
            fetch('/like/toggle', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ artwork_id: currentArtworkId })
            });
        }
    });
    
    // ===== CART FUNCTIONALITY =====
    document.querySelectorAll('form[action*="cart.add"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.stopPropagation();
            
            // If in modal, close after delay
            if (this.closest('.modal-content-luxury')) {
                const cartBtn = this.querySelector('.modal-action-btn');
                cartBtn.innerHTML = '<i class="fas fa-check"></i><span>Added!</span>';
                cartBtn.style.background = 'linear-gradient(135deg, #06D6A0, #059B8A)';
                
                setTimeout(() => {
                    cartBtn.innerHTML = '<i class="fas fa-shopping-cart"></i><span>Add to Collection</span>';
                    cartBtn.style.background = 'linear-gradient(135deg, var(--gold), #B8860B)';
                    setTimeout(closeModal, 500);
                }, 1500);
            } else {
                const cartBtn = this.querySelector('.action-btn-small');
                cartBtn.innerHTML = '<i class="fas fa-check" style="color: #06D6A0;"></i>';
                cartBtn.style.background = 'rgba(6, 214, 160, 0.2)';
                
                setTimeout(() => {
                    cartBtn.innerHTML = '<i class="fas fa-shopping-cart"></i>';
                    cartBtn.style.background = 'rgba(255, 255, 255, 0.95)';
                }, 1000);
            }
        });
    });
    
    // ===== SAVE BUTTON =====
    document.querySelectorAll('.save-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
            
            if (this.classList.contains('active')) {
                this.innerHTML = '<i class="fas fa-bookmark" style="color: #e60023;"></i>';
                this.style.background = 'rgba(230, 0, 35, 0.2)';
                this.style.transform = 'scale(1.2) rotate(-10deg)';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1.15)';
                }, 300);
            } else {
                this.innerHTML = '<i class="fas fa-bookmark"></i>';
                this.style.background = 'var(--accent)';
                this.style.transform = 'scale(1) rotate(0)';
            }
        });
    });
    
    // ===== USER COMMENT FUNCTIONALITY =====
    document.getElementById('userCommentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const commentInput = document.getElementById('userCommentInput');
        const commentText = commentInput.value.trim();
        
        if (!commentText) {
            alert('Please write a comment before posting.');
            return;
        }
        
        if (commentText.length > 500) {
            alert('Comment is too long. Maximum 500 characters.');
            return;
        }
        
        // Disable button while posting
        const submitBtn = document.getElementById('submitCommentBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Posting...';
        
        // Simulate API call delay
        setTimeout(() => {
            // Add user's comment to the list
            addUserComment(commentText);
            
            // Clear input
            commentInput.value = '';
            
            // Re-enable button
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Post Comment';
            
            // Show success animation
            submitBtn.style.background = 'linear-gradient(135deg, #06D6A0, #059B8A)';
            setTimeout(() => {
                submitBtn.style.background = 'linear-gradient(135deg, var(--gold), #B8860B)';
            }, 1000);
            
            // Send to backend (simulated)
            if (currentArtworkId) {
                fetch('/comment/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        artwork_id: currentArtworkId,
                        comment: commentText,
                        user_id: "{{ auth()->user()->id }}"
                    })
                }).then(response => {
                    console.log('Comment saved to backend');
                });
            }
        }, 800);
    });
    
    function addUserComment(commentText) {
        const commentsContainer = document.getElementById('commentsContainer');
        const commentsCount = document.getElementById('commentsCount');
        
        // Get current count and increment
        const currentCount = parseInt(commentsCount.textContent.replace(/[()]/g, ''));
        commentsCount.textContent = `(${currentCount + 1})`;
        
        // Create new comment element
        const commentEl = document.createElement('div');
        commentEl.className = 'comment';
        commentEl.style.animationDelay = '0s';
        commentEl.style.background = 'rgba(212, 175, 55, 0.05)';
        commentEl.style.borderColor = 'rgba(212, 175, 55, 0.3)';
        
        commentEl.innerHTML = `
            <div class="comment-avatar" style="background: linear-gradient(135deg, var(--gold), #B8860B)">
                ${currentUser.initial}
            </div>
            <div class="comment-content">
                <div class="comment-author">
                    ${currentUser.name}
                    <span class="author-badge" style="background: rgba(212, 175, 55, 0.3); color: var(--gold);">
                        ${currentUser.badge}
                    </span>
                    <span style="font-size: 11px; color: var(--gold); margin-left: 5px;">(You)</span>
                </div>
                <div class="comment-text">"${commentText}"</div>
                <div class="comment-time">Just now</div>
            </div>
        `;
        
        // Add to top of comments
        commentsContainer.insertBefore(commentEl, commentsContainer.firstChild);
        
        // Add animation
        setTimeout(() => {
            commentEl.style.animation = 'commentFadeIn 0.5s ease-out forwards';
        }, 10);
    }
    
    // ===== NEWSLETTER FORM =====
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const input = this.querySelector('.newsletter-input');
        if (input.value.trim()) {
            const btn = this.querySelector('.newsletter-btn');
            const originalHTML = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-check"></i>';
            btn.style.background = 'linear-gradient(135deg, #06D6A0, #059B8A)';
            
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = 'linear-gradient(135deg, var(--gold), #B8860B)';
                input.value = '';
            }, 1500);
        }
    });
    
    // ===== LOGOUT CONFIRMATION =====
    document.querySelector('.logout-btn').addEventListener('click', function(e) {
        if (!e.defaultPrevented) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logout-form').submit();
            }
        }
    });
    
    // ===== SCROLL ANIMATIONS =====
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for scroll animations
    document.querySelectorAll('.feature-card, .stat-item').forEach(el => {
        observer.observe(el);
    });
});
</script>

</body>
</html>