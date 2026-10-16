#!/usr/bin/env bash
# Read-only browser regression against a rendered site; requires agent-browser + Chrome.
set -euo pipefail
url="${1:-https://designo-multi-page-website.ddev.site/}"
base="designo-card-test-$$"
export AGENT_BROWSER_SESSION="$base-mouse"
trap 'AGENT_BROWSER_SESSION="$base-mouse" agent-browser close >/dev/null 2>&1 || true; AGENT_BROWSER_SESSION="$base-touch" agent-browser close >/dev/null 2>&1 || true' EXIT
card='.service-card:first-child'
# Install assertions in the page only; nothing is saved to WordPress.
checks=$(cat <<'JS'
window.designoCheckServiceCards = function (active) {
  const cards = [...document.querySelectorAll('.service-card')];
  if (!cards.length) throw Error('No service cards found');
  for (const link of document.querySelectorAll('.service-card a')) {
    if (!link.getAttribute('href')) throw Error('Missing destination');
    if (link.getBoundingClientRect().height < 44) throw Error('Target shorter than 44px');
  }
  if (document.documentElement.scrollWidth > innerWidth) throw Error('Horizontal overflow');
  const overlay = getComputedStyle(cards[0], '::after');
  const content = getComputedStyle(cards[0].querySelector('.wp-block-cover__inner-container'));
  if (Number(content.zIndex) <= Number(overlay.zIndex)) throw Error('Highlight covers card text');
  if (Number(overlay.opacity) !== Number(active)) throw Error('Wrong highlight state');
  let contrast = null;
  if (active) {
    const luminance = color => {
      const rgb = color.match(/[\d.]+/g).slice(0, 3).map(v => Number(v) / 255);
      const linear = rgb.map(v => v <= .04045 ? v / 12.92 : ((v + .055) / 1.055) ** 2.4);
      return linear[0] * .2126 + linear[1] * .7152 + linear[2] * .0722;
    };
    const background = luminance(overlay.backgroundColor);
    for (const link of cards[0].querySelectorAll('a')) {
      const foreground = luminance(getComputedStyle(link).color);
      const ratio = (Math.max(background, foreground) + .05) / (Math.min(background, foreground) + .05);
      if (ratio < 4.5) throw Error('Highlighted link contrast below 4.5:1');
      contrast = Math.min(contrast ?? ratio, ratio);
    }
  }
  return { cards: cards.length, active, width: innerWidth, contrast };
};
'assertions ready';
JS
)
# Headless Chrome otherwise reports no hover-capable input on some Linux hosts.
agent-browser --args '--blink-settings=primaryHoverType=2' open "$url" >/dev/null
agent-browser set viewport 1440 1000 >/dev/null
agent-browser eval "$checks" >/dev/null
agent-browser eval 'if (!matchMedia("(hover:hover)").matches) throw Error("Hover emulation unavailable")' >/dev/null
agent-browser scrollintoview "$card" >/dev/null
agent-browser hover "$card" >/dev/null
agent-browser wait --fn 'getComputedStyle(document.querySelector(".service-card"), "::after").opacity === "1"' >/dev/null
agent-browser eval 'designoCheckServiceCards(true)'
agent-browser scrollintoview '.designo-header' >/dev/null
agent-browser hover '.designo-header' >/dev/null
agent-browser focus "$card h2 a" >/dev/null
agent-browser press Tab >/dev/null
agent-browser eval 'if (!document.activeElement.matches(".service-card p a:focus-visible") || parseFloat(getComputedStyle(document.activeElement).outlineWidth) < 3) throw Error("Missing keyboard focus ring"); designoCheckServiceCards(true)'
agent-browser focus '.designo-header .wp-block-site-logo a' >/dev/null
agent-browser scrollintoview '.designo-header' >/dev/null
agent-browser hover '.designo-header' >/dev/null
for width in 375 768 1440; do
  agent-browser set viewport "$width" 1000 >/dev/null
  agent-browser eval 'designoCheckServiceCards(false)'
done
export AGENT_BROWSER_SESSION="$base-touch"
# Explicit coarse-pointer media emulation; device selection sets viewport/UA.
agent-browser --args '--blink-settings=primaryPointerType=2' open "$url" >/dev/null
agent-browser set device 'iPhone 15' >/dev/null
agent-browser eval "$checks" >/dev/null
agent-browser eval 'if (!matchMedia("(hover:none)").matches || !matchMedia("(pointer:coarse)").matches) throw Error("Coarse-pointer emulation unavailable"); designoCheckServiceCards(false)'
destination="$(agent-browser get attr "$card p a" href)"
agent-browser click "$card p a" >/dev/null
agent-browser wait --url "$destination" >/dev/null
printf 'PASS: hover, focus, contrast, touch targets, responsive layout, and coarse-pointer navigation.\n'
