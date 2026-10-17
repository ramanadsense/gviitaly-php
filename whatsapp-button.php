<?php
// Floating WhatsApp chat widget, included once from footer.php and common-footer.php.
// Self-contained: its styles and script live here so no other site file needs changing.
$gviWaNumber   = '919821585665'; // country code + number, digits only
$gviWaGreeting = 'Hello 👋 Welcome to GVI Italy. How can we help you today?'; // shown on the website
$gviWaText     = 'Hi GVI Italy team, I’d like to know more about GVI Italy.'; // pre-typed in WhatsApp
$gviWaLink     = 'https://wa.me/' . $gviWaNumber . '?text=' . rawurlencode($gviWaText);
?>
<style>
/* 66px button. It sits in the corner spot of the site's 54px scroll-to-top button
   (#scroll-percentage) and moves up above it (.gvi-wa-raised) while that button is showing. */
.gvi-wa-float {
    position: fixed;
    right: 44px;
    bottom: 44px;
    z-index: 98;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 66px;
    min-width: 66px;
    padding: 0 17px;
    border-radius: 66px;
    background-color: #25D366;
    color: #fff;
    text-decoration: none;
    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease, transform 0.3s ease, bottom 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    animation: gvi-wa-pop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.8s backwards,
               gvi-wa-pulse 2.5s ease-out 1.5s infinite;
}

.gvi-wa-float i {
    font-size: 36px;
    line-height: 1;
}

.gvi-wa-float .gvi-wa-label {
    max-width: 0;
    overflow: hidden;
    white-space: nowrap;
    font-size: 15px;
    font-weight: 500;
    opacity: 0;
    transition: max-width 0.4s ease, opacity 0.3s ease, margin 0.4s ease;
}

.gvi-wa-float:hover,
.gvi-wa-float:focus-visible {
    background-color: #1EBE5A;
    color: #fff;
    transform: translateY(-2px);
}

.gvi-wa-float:hover .gvi-wa-label,
.gvi-wa-float:focus-visible .gvi-wa-label {
    max-width: 140px;
    margin-left: 10px;
    opacity: 1;
}

/* stop the pulse while the chat box is open; gvi-wa-pop stays listed so it doesn't replay */
.gvi-wa-float[aria-expanded="true"] {
    animation: gvi-wa-pop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.8s backwards;
}

.gvi-wa-float[aria-expanded="true"] .gvi-wa-label {
    max-width: 0;
    margin-left: 0;
    opacity: 0;
}

.gvi-wa-float:focus-visible,
.gvi-wa-panel a:focus-visible,
.gvi-wa-panel button:focus-visible {
    outline: 3px solid #128C7E;
    outline-offset: 2px;
}

.gvi-wa-panel {
    position: fixed;
    right: 44px;
    bottom: 122px;
    z-index: 98;
    width: 320px;
    max-width: calc(100vw - 32px);
    max-height: calc(100vh - 138px);
    border-radius: 16px;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #ECE5DD;
    box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.25);
    opacity: 0;
    visibility: hidden;
    transform: translateY(16px) scale(0.85);
    transform-origin: bottom right;
    transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s, bottom 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.gvi-wa-panel.is-open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
    transition: opacity 0.25s ease, transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1), visibility 0s, bottom 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.gvi-wa-float.gvi-wa-raised {
    bottom: 120px;
}

.gvi-wa-panel.gvi-wa-raised {
    bottom: 198px;
    max-height: calc(100vh - 214px);
}

.gvi-wa-panel.is-open .gvi-wa-bubble {
    animation: gvi-wa-bubble 0.45s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s backwards;
}

.gvi-wa-panel.is-open .gvi-wa-start {
    animation: gvi-wa-bubble 0.45s cubic-bezier(0.34, 1.56, 0.64, 1) 0.35s backwards;
}

.gvi-wa-head {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    background-color: #075E54;
    color: #fff;
}

.gvi-wa-head-icon {
    display: grid;
    place-items: center;
    flex: 0 0 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #25D366;
    font-size: 22px;
}

.gvi-wa-head-text {
    flex: 1;
    line-height: 1.3;
}

.gvi-wa-head-text strong {
    display: block;
    font-size: 16px;
    color: #fff;
}

.gvi-wa-head-text span {
    font-size: 13px;
    opacity: 0.85;
}

.gvi-wa-close {
    display: grid;
    place-items: center;
    width: 32px;
    height: 32px;
    padding: 0;
    border: 0;
    border-radius: 50%;
    background: transparent;
    color: #fff;
    font-size: 22px;
    line-height: 1;
    cursor: pointer;
}

.gvi-wa-close:hover {
    background-color: rgba(255, 255, 255, 0.15);
}

.gvi-wa-body {
    padding: 20px 16px;
}

.gvi-wa-bubble {
    position: relative;
    max-width: 90%;
    margin: 0;
    padding: 10px 14px;
    border-radius: 0 10px 10px 10px;
    background-color: #fff;
    color: #111;
    font-size: 15px;
    line-height: 1.5;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

.gvi-wa-foot {
    padding: 0 16px 16px;
}

.gvi-wa-start {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 12px 16px;
    border-radius: 30px;
    background-color: #25D366;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.gvi-wa-start:hover,
.gvi-wa-start:focus-visible {
    background-color: #1EBE5A;
    color: #fff;
}

.gvi-wa-start i {
    font-size: 20px;
}

@keyframes gvi-wa-pop {
    0% {
        opacity: 0;
        transform: scale(0) rotate(-45deg);
    }
    100% {
        opacity: 1;
        transform: scale(1) rotate(0);
    }
}

@keyframes gvi-wa-bubble {
    0% {
        opacity: 0;
        transform: translateY(10px) scale(0.9);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes gvi-wa-pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.55), 0px 8px 30px rgba(0, 0, 0, 0.3);
    }
    70% {
        box-shadow: 0 0 0 16px rgba(37, 211, 102, 0), 0px 8px 30px rgba(0, 0, 0, 0.3);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0), 0px 8px 30px rgba(0, 0, 0, 0.3);
    }
}

@media only screen and (max-width: 992px) {
    .gvi-wa-float,
    .gvi-wa-panel {
        right: 24px;
    }

    .gvi-wa-float {
        bottom: 24px;
    }

    .gvi-wa-panel {
        bottom: 102px;
        max-height: calc(100vh - 118px);
    }

    .gvi-wa-float.gvi-wa-raised {
        bottom: 100px;
    }

    .gvi-wa-panel.gvi-wa-raised {
        bottom: 178px;
        max-height: calc(100vh - 194px);
    }
}

@media only screen and (max-width: 767px) {
    .gvi-wa-float {
        right: 17px;
        bottom: 77px;
        height: 60px;
        min-width: 60px;
        padding: 0 13px;
        border-radius: 60px;
    }

    .gvi-wa-float i {
        font-size: 34px;
    }

    .gvi-wa-float:hover .gvi-wa-label {
        max-width: 0;
        margin-left: 0;
        opacity: 0;
    }

    .gvi-wa-panel {
        right: 16px;
        bottom: 149px;
        max-height: calc(100vh - 165px);
    }

    .gvi-wa-float.gvi-wa-raised {
        bottom: 146px;
    }

    .gvi-wa-panel.gvi-wa-raised {
        bottom: 218px;
        max-height: calc(100vh - 234px);
    }
}

/* hide while the site's sidebar menu is open */
body.open-sidebar .gvi-wa-float,
body.open-sidebar .gvi-wa-panel {
    visibility: hidden;
    opacity: 0;
}

/* hide while the site's side menu, mobile menu or search popup is open */
body:has(.side-menu-wrapper.is-open) .gvi-wa-float,
body:has(.mobile-side-menu.is-open) .gvi-wa-float,
body:has(#popup-search-box.toggled) .gvi-wa-float,
body:has(.side-menu-wrapper.is-open) .gvi-wa-panel,
body:has(.mobile-side-menu.is-open) .gvi-wa-panel,
body:has(#popup-search-box.toggled) .gvi-wa-panel {
    visibility: hidden;
    opacity: 0;
}

@media (prefers-reduced-motion: reduce) {
    .gvi-wa-float,
    .gvi-wa-float[aria-expanded="true"],
    .gvi-wa-float .gvi-wa-label,
    .gvi-wa-panel,
    .gvi-wa-panel.is-open,
    .gvi-wa-panel.is-open .gvi-wa-bubble,
    .gvi-wa-panel.is-open .gvi-wa-start {
        animation: none;
        transition: none;
    }

    .gvi-wa-panel {
        transform: none;
    }
}

@media print {
    .gvi-wa-float,
    .gvi-wa-panel {
        display: none;
    }
}
</style>

<div class="gvi-wa-panel" id="gvi-wa-panel" role="dialog" aria-label="Chat with GVI Italy on WhatsApp" aria-hidden="true">
    <div class="gvi-wa-head">
        <span class="gvi-wa-head-icon"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></span>
        <div class="gvi-wa-head-text">
            <strong>GVI Italy</strong>
            <span>Chat with us on WhatsApp</span>
        </div>
        <button type="button" class="gvi-wa-close" aria-label="Close chat" tabindex="-1">&times;</button>
    </div>
    <div class="gvi-wa-body">
        <p class="gvi-wa-bubble"><?php echo htmlspecialchars($gviWaGreeting, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="gvi-wa-foot">
        <a href="<?php echo htmlspecialchars($gviWaLink, ENT_QUOTES, 'UTF-8'); ?>" class="gvi-wa-start" target="_blank" rel="noopener noreferrer" tabindex="-1">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> Start Chat
        </a>
    </div>
</div>

<a href="<?php echo htmlspecialchars($gviWaLink, ENT_QUOTES, 'UTF-8'); ?>"
   class="gvi-wa-float"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Chat with GVI Italy on WhatsApp"
   aria-controls="gvi-wa-panel"
   aria-expanded="false"
   title="Chat with us on WhatsApp">
    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
    <span class="gvi-wa-label">Chat with us</span>
</a>

<script>
(function () {
    // Without this script the button still opens WhatsApp directly through its href.
    var toggle = document.querySelector('.gvi-wa-float');
    var panel = document.getElementById('gvi-wa-panel');
    if (!toggle || !panel) return;

    var closeBtn = panel.querySelector('.gvi-wa-close');
    var startLink = panel.querySelector('.gvi-wa-start');

    // Move up while the site's scroll-to-top button is showing so the two never overlap.
    var scrollBtn = document.getElementById('scroll-percentage');
    function syncRaised() {
        var raised = !!scrollBtn && scrollBtn.classList.contains('active');
        toggle.classList.toggle('gvi-wa-raised', raised);
        panel.classList.toggle('gvi-wa-raised', raised);
    }
    if (scrollBtn && window.MutationObserver) {
        new MutationObserver(syncRaised).observe(scrollBtn, { attributes: true, attributeFilter: ['class'] });
    }
    syncRaised();

    function setOpen(open) {
        panel.classList.toggle('is-open', open);
        panel.setAttribute('aria-hidden', open ? 'false' : 'true');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        closeBtn.tabIndex = open ? 0 : -1;
        startLink.tabIndex = open ? 0 : -1;
        if (open) startLink.focus();
    }

    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        setOpen(!panel.classList.contains('is-open'));
    });

    closeBtn.addEventListener('click', function () {
        setOpen(false);
        toggle.focus();
    });

    startLink.addEventListener('click', function () {
        setOpen(false);
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && panel.classList.contains('is-open')) {
            setOpen(false);
            toggle.focus();
        }
    });

    document.addEventListener('click', function (e) {
        if (panel.classList.contains('is-open') && !panel.contains(e.target) && !toggle.contains(e.target)) {
            setOpen(false);
        }
    });
})();
</script>
