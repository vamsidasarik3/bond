{{--
    NAVAGRUHA Global Page Loader

    Displays ONLY the standalone graphical N mark (navagruha-n-mark.png).
    Asset is a programmatically-cropped 332×220px PNG — mark only, alpha transparent bg.
    Contains: green stroke (#71b644) + red stroke (#dc3526). Zero text pixels.

    Animation:
      Ghost layer : same mark at 10% opacity  (pre-fill "hollow" state)
      Fill layer  : same mark at 100% opacity, revealed bottom→top via clip-path (2.2s ease)
      Entrance    : spring-scale-in 0.45s
      Dismiss     : waits for fill to complete, then fades out 0.5s
--}}

<div id="site-loader" role="status" aria-label="Loading">

    <div class="ngl-stage">
        <div class="ngl-mark-wrap">

            {{-- Fill: standalone brand mark, animated bottom→top via CSS clip-path --}}
            <div class="ngl-fill" id="ngl-fill" aria-hidden="true"></div>

        </div>
    </div>

</div>

<style>
/* ──────────────────────────────────────────────────
   NAVAGRUHA Page Loader  ·  scoped under #site-loader
   ────────────────────────────────────────────────── */

#site-loader {
    position: fixed;
    inset: 0;
    z-index: 999999;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #234159;
    opacity: 1;
    visibility: visible;
    transition:
        opacity   0.5s cubic-bezier(0.4, 0, 0.2, 1),
        visibility 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: opacity;
}

#site-loader.ngl-done {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

/* Stage: centre of screen */
#site-loader .ngl-stage {
    display: flex;
    align-items: center;
    justify-content: center;
}

/*
   Mark container — sized to the cropped asset proportions.
   Cropped PNG: 332 × 220 px  →  ratio 332:220 ≈ 1.509:1
   Desktop 180px wide → height = 220/332 × 180 = 119px
*/
#site-loader .ngl-mark-wrap {
    position: relative;
    width: 180px;
    height: 119px;

    /* Entrance: spring-scale-in */
    animation: ngl-enter 0.45s cubic-bezier(0.34, 1.4, 0.64, 1) both;
}

@keyframes ngl-enter {
    from { opacity: 0; transform: scale(0.78); }
    to   { opacity: 1; transform: scale(1.00); }
}

/* Fill layer: brand mark asset, animated bottom→top via CSS clip-path */
#site-loader .ngl-fill {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset("images/navagruha-n-mark.png") }}');
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
    clip-path: inset(100% 0 0 0);
    -webkit-clip-path: inset(100% 0 0 0);
    transition:
        clip-path         2.2s cubic-bezier(0.4, 0, 0.2, 1),
        -webkit-clip-path 2.2s cubic-bezier(0.4, 0, 0.2, 1);
}

#site-loader .ngl-fill.ngl-filling {
    clip-path: inset(0% 0 0 0);
    -webkit-clip-path: inset(0% 0 0 0);
}

/* ── Mobile breakpoint ── */
@media (max-width: 480px) {
    #site-loader .ngl-mark-wrap {
        width: 120px;
        height: 80px;   /* 220/332 × 120 = 79.5 → 80px */
    }
}
</style>

<script>
(function () {
    'use strict';

    var loader = document.getElementById('site-loader');
    var fill   = document.getElementById('ngl-fill');

    if (!loader || !fill) return;

    /* ── Timing ──────────────────────────────────────────────────────────── */
    var FILL_DELAY    = 120;   // ms — brief pause before fill starts
    var FILL_DURATION = 2200;  // ms — matches CSS transition
    var DISMISS_PAUSE = 350;   // ms — pause at end before fade
    var FADE_DURATION = 500;   // ms — matches CSS fade transition
    var SAFETY_MS     = 6000;  // ms — absolute maximum loader lifetime

    var startTime = Date.now();
    var dismissed = false;

    /* ── 1. Trigger fill animation ───────────────────────────────────────── */
    // Double rAF ensures browser has painted before transition fires
    requestAnimationFrame(function () {
        requestAnimationFrame(function () {
            setTimeout(function () {
                fill.classList.add('ngl-filling');
            }, FILL_DELAY);
        });
    });

    /* ── 2. Dismiss (fade out + DOM removal) ─────────────────────────────── */
    function dismiss() {
        if (dismissed) return;
        dismissed = true;

        var elapsed    = Date.now() - startTime;
        // Minimum time before dismiss:
        //   entrance (450ms) + fill delay (120ms) + fill (2200ms) + pause (350ms) = 3120ms
        var minElapsed = 450 + FILL_DELAY + FILL_DURATION + DISMISS_PAUSE;
        var delay      = Math.max(minElapsed - elapsed, DISMISS_PAUSE);

        setTimeout(function () {
            loader.classList.add('ngl-done');
            setTimeout(function () {
                if (loader && loader.parentNode) {
                    loader.parentNode.removeChild(loader);
                }
            }, FADE_DURATION + 60);
        }, delay);
    }

    /* ── 3. Dismiss when page fully loads ────────────────────────────────── */
    if (document.readyState === 'complete') {
        dismiss();
    } else {
        window.addEventListener('load', dismiss, { once: true });
    }

    /* ── 4. Safety fallback ──────────────────────────────────────────────── */
    setTimeout(function () {
        if (!dismissed) dismiss();
    }, SAFETY_MS);

})();
</script>
