<?php
session_start();

$isLoggedIn = isset($_SESSION['user_id']) && (($_SESSION['role'] ?? '') === 'user');
$isGuest = (($_SESSION['role'] ?? '') === 'guest');
$showAccessPopup = !$isLoggedIn && !$isGuest;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YMR International Marketing</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="site-header">

    <div class="container nav">

        <a href="index.php" class="logo">
            <img src="IMAGE/logoYMR.png"
                 alt="YMR International Marketing">
        </a>

        <button class="menu">☰</button>

        <nav class="nav-links">

            <a class="active" href="index.php">HOME</a>
            <a href="about.html">ABOUT</a>
            <a href="business.html">BUSINESS</a>
            <a href="products.html">PRODUCTS</a>
            <a href="team.html">TEAM</a>
            <a href="document.html">DOCUMENTS</a>
            <a href="contact.html">CONTACT</a>

        
            <?php if ($isLoggedIn): ?>
                <span class="nav-auth">HI, <?= htmlspecialchars($_SESSION['user_name'] ?? 'USER', ENT_QUOTES, 'UTF-8') ?></span>
                <a href="logout.php" class="nav-guest">LOG OUT</a>
            <?php elseif ($isGuest): ?>
                <span class="nav-guest">GUEST MODE</span>
                <a href="logout.php" class="nav-auth">EXIT GUEST</a>
            <?php else: ?>
                <a href="login.php" class="nav-auth">LOG IN</a>
                <a href="guest.php" class="nav-guest">GUEST</a>
            <?php endif; ?>
        </nav>

    </div>

</header>


<section class="hero">

    <div class="container hero-grid">

        <div>

            <div class="eyebrow">
                YMR INTERNATIONAL MARKETING SDN. BHD.
            </div>

            <h1>
                BUILDING<br>
                <span class="outline">PRODUCTS</span><br>
                <span class="orange">FOR PEOPLE.</span>
            </h1>

            <p class="hero-text">

                YMR International Marketing Sdn. Bhd.
                is a Malaysian company involved in
                marketing and product-based business,
                with products covering health,
                household and personal care categories.

            </p>

            <div class="hero-buttons">

                <a href="about.html"
                   class="btn btn-orange">
                    DISCOVER YMR →
                </a>

                <a href="products.html"
                   class="btn btn-green">
                    VIEW PRODUCTS
                </a>

            </div>

        </div>


        <div class="hero-art product-slider" aria-label="YMR health products slideshow">
            <div class="hero-circle"></div>
            <div class="hero-product slide-active"><img src="IMAGE/pomegranate-juice.jpg" alt="Al-Rumman Pomegranate Juice"><h3>AL-RUMMAN<br>POMEGRANATE JUICE</h3></div>
            <div class="hero-product"><img src="IMAGE/sachet-delima.jpg" alt="Al-Rumman Pomegranate Sachet"><h3>AL-RUMMAN<br>POMEGRANATE SACHET</h3></div>
            <div class="hero-product"><img src="IMAGE/cocoaa.jpg" alt="Al-Rumman Cocoa"><h3>AL-RUMMAN<br>COCOA</h3></div>
            <div class="hero-product"><img src="IMAGE/madu.jpg" alt="Al-Rumman Madu Pucuk"><h3>AL-RUMMAN<br>MADU PUCUK</h3></div>
            <div class="hero-tag">HEALTH & WELLNESS</div>
        </div>

    </div>

</section>


<div class="marquee">

    <div class="marquee-track">

        <span>YMR INTERNATIONAL ✦</span>
        <span>HEALTH PRODUCTS ✦</span>
        <span>MARKETING ✦</span>
        <span>AL-RUMMAN ✦</span>
        <span>PRODUCT DEVELOPMENT ✦</span>

        <span>YMR INTERNATIONAL ✦</span>
        <span>HEALTH PRODUCTS ✦</span>
        <span>MARKETING ✦</span>
        <span>AL-RUMMAN ✦</span>
        <span>PRODUCT DEVELOPMENT ✦</span>

    </div>

</div>


<section class="section">

    <div class="container">

        <div class="section-head">

            <div>

                <div class="eyebrow">
                    COMPANY AT A GLANCE
                </div>

                <h2 class="section-title">
                    YMR<br>
                    <span>IN NUMBERS.</span>
                </h2>

            </div>

            <p>
                Key information from the YMR International
                Marketing Sdn. Bhd. company profile.
            </p>

        </div>


        <div class="fact-grid">

            <div class="fact">
                <div class="fact-number">2012</div>
                <div class="fact-label">
                    YEAR<br>
                    REGISTERED
                </div>
            </div>

            <div class="fact">
                <div class="fact-number">1005016-H</div>
                <div class="fact-label">
                    BUSINESS<br>
                    REGISTRATION
                </div>
            </div>

            <div class="fact">
                <div class="fact-number">RM500K</div>
                <div class="fact-label">
                    PAID-UP<br>
                    CAPITAL
                </div>
            </div>

            <div class="fact">
                <div class="fact-number">3</div>
                <div class="fact-label">
                    MAIN BUSINESS<br>
                    CATEGORIES
                </div>
            </div>

        </div>

    </div>

</section>


<section class="section">

    <div class="container about-preview">

        <div class="about-image">

            <img src="IMAGE/LOGOYMR FULL.png"
                 alt="YMR International Organisation Chart">

        </div>


        <div class="about-copy">

            <div class="eyebrow">
                ABOUT YMR
            </div>

            <h2 class="section-title">
                A COMPANY<br>
                WITH A<br>
                <span>VISION.</span>
            </h2>

            <p>
                YMR International Marketing Sdn. Bhd.
                was registered on 06 June 2012 and is
                registered in Dungun, Terengganu.
            </p>

            <p>
                The company profile describes three main
                business categories: health products,
                household products, and cosmetics and
                skincare products.
            </p>

            <a href="about.html"
               class="btn btn-brown">
                READ COMPANY PROFILE →
            </a>

        </div>

    </div>

</section>


<section class="section dark-section">

    <div class="container">

        <div class="section-head">

            <div>

                <div class="eyebrow">
                    BUSINESS
                </div>

                <h2 class="section-title">
                    BEST<br>
                    <span>SELLER.</span>
                </h2>

            </div>

            <p>
                Recommended products.
            </p>

        </div>


        <div class="card-grid">
            <div class="info-card"><div class="best-seller-image"><img src="IMAGE/pomegranate-juice.jpg" alt="Al-Rumman pomegranate juice"></div><div class="card-number">01</div><h3>POMEGRANATE</h3><p>Al-Rumman pomegranate juice and pomegranate-based health beverages.</p><a class="btn btn-green" href="products.html">VIEW PRODUCT →</a></div>
            <div class="info-card"><div class="best-seller-image"><img src="IMAGE/cocoaa.jpg" alt="Al-Rumman coffee beverage range"></div><div class="card-number">02</div><h3>COFFEE</h3><p>Al-Rumman coffee beverage range.</p><a class="btn btn-green" href="products.html">VIEW PRODUCT →</a></div>
            <div class="info-card"><div class="best-seller-image"><img src="IMAGE/madu.jpg" alt="Madu Pucuk honey"></div><div class="card-number">03</div><h3>MADU PUCUK</h3><p>Honey product included in the company product documentation.</p><a class="btn btn-green" href="products.html">VIEW PRODUCT →</a></div>
        </div>
    </div>
</section>


<footer>

    <div class="container footer-row">

        <div class="footer-logo">
            YMR INTERNATIONAL
        </div>

        <p>
            © 2026 YMR International Marketing Sdn. Bhd.
        </p>

    </div>

</footer>


<script src="script.js"></script>


<?php if ($showAccessPopup): ?>
<!-- Welcome access popup: choose to log in or continue as a guest -->
<div id="access-popup" class="access-popup" role="dialog" aria-modal="true" aria-labelledby="access-popup-title">
  <div class="access-popup-card">
    <img src="IMAGE/logoYMR.png" alt="YMR International Marketing" class="access-popup-logo">
    <p class="eyebrow">WELCOME TO YMR</p>
    <h2 id="access-popup-title">How would you like to continue?</h2>
    <p>Choose how you would like to continue.</p>
    <div class="access-popup-actions">
      <a class="btn btn-orange" href="login.php">LOG IN</a>
      <a class="btn btn-green" href="register.php">SIGN UP</a>
      <a class="btn btn-green" href="guest.php">GUEST</a>
    </div>
  </div>
</div>
<style>
.access-popup{position:fixed;inset:0;z-index:99999;display:flex;align-items:center;justify-content:center;padding:20px;background:rgba(8,25,17,.72);backdrop-filter:blur(5px)}
.access-popup-card{width:min(100%,460px);padding:34px 30px;text-align:center;background:#fff;border-radius:22px;box-shadow:0 24px 70px rgba(0,0,0,.28)}
.access-popup-logo{width:92px;height:92px;object-fit:contain;margin:0 auto 14px}
.access-popup-card h2{margin:8px 0 12px;font-size:clamp(1.5rem,4vw,2rem);line-height:1.2;color:#173d2b}
.access-popup-card>p:not(.eyebrow){color:#53645a;line-height:1.6;margin:0 0 24px}
.access-popup-actions{display:flex;flex-direction:column;gap:12px}
.access-popup-actions .btn{display:flex;align-items:center;justify-content:center;width:100%;min-height:48px;border:0;cursor:pointer;text-decoration:none;font:inherit;font-weight:700}
@media(max-width:480px){.access-popup-card{padding:28px 20px}.access-popup-logo{width:76px;height:76px}}
</style>
<?php endif; ?>
<script>

</script>

</body>
</html>