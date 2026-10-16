# Designo block theme

An independent, build-free WordPress block theme based on `docs/mockups/`. Requires WordPress 6.6+ and PHP 8.0+. Jost is bundled locally under the SIL Open Font License (`assets/fonts/OFL.txt`). Reference artwork comes from this project's supplied assets; verify artwork rights before reuse elsewhere.

## Install

Copy this entire `designo/` directory into `wp-content/themes/` and activate Designo. Activation does **not** create pages, replace content, change roles, or configure plugins.

Optional starter content, run from the project root:

```sh
ddev wp theme activate designo
# Optional but recommended BEFORE importing, for the contact form:
ddev wp plugin install contact-form-7 --activate
ddev wp designo starter-content --dry-run
ddev wp designo starter-content --configure-site
```

For a non-DDEV installation, use `wp` instead of `ddev wp`. Check plugin PHP requirements separately: production currently uses PHP 8.2 and Contact Form 7 6.1.7; Contact Form 7 6.2.2 requires PHP 8.3. On PHP 8.2, use the compatible 6.1.7 release rather than the unversioned install command above. Review compatibility and supported/security releases before future upgrades. Import on the intended environment only. The command publishes seven starter pages and imports their images into Media Library. It skips existing page slugs, preserves edits on subsequent runs, and never deletes content. `--configure-site` explicitly sets the front page, site title, and (if absent) logo. Without it, existing reading settings and branding remain untouched. Existing pages are skipped even when empty: manually insert the relevant pattern if needed. Review possible pre-existing URL conflicts before import.

No database export is included. To deploy, copy only the theme, install/configure the form plugin separately, and create/import content deliberately. Do not deploy local `wp-config.php`, credentials, DDEV files, or the entire local database.

## Editing

- **Pages → Edit**: all page titles, headings, descriptions, projects, addresses, illustrations, images, and links are native blocks. Nothing is locked. List View makes selecting a card or section easier.
- **Projects**: select a Project Card group and Duplicate, move, or remove it. Alternatively insert Patterns → Designo → Project card into a Project Grid group. There is no fixed project count or database-specific custom post type.
- **Locations**: duplicate the entire `location-row` group (office details plus Google Map) and edit the country, address, phone, email, and map settings. Add/remove Location Links cards independently. Maps can be removed without removing office details.
- **Media**: select an Image/Cover and use Replace. Starter page media is imported into Media Library; newly inserted patterns initially use bundled images and remain replaceable. Decorative textures are styling, not editorial content.
- **Global content**: Appearance → Editor → Patterns → Template Parts contains Header, Footer, and Project Call to Action. Edit global navigation, footer office details, footer logo, social links, and CTA there. Navigation links and all text are blocks—not PHP output. The footer social-links block starts empty; add real profiles rather than placeholder social URLs.
- **Branding/styles**: change the header Site Logo block and footer Image block separately (dark/light variants), then use Styles for fonts, palette, typography, and spacing.
- **New pages**: use the default Page template (which displays the page title), or Designo Landing Page when the content already contains its H1. Use the Contact template to omit the project CTA. Keep one meaningful H1 per page.
- **Patterns are starters**, not live content. Editing a pattern file does not change existing pages. Repeated service links, location details, and cards are independent blocks: edit each instance, or make a synced pattern in WordPress when the same content should stay synchronized. The global CTA is a shared template part.

### Permissions

Standard WordPress Editors can manage pages and their content. WordPress restricts site-wide templates, navigation, branding, and global styles to administrators by default. This theme deliberately does not grant `edit_theme_options` or alter existing roles. If non-admin Editors need access to global content, agree a least-privilege role/workflow before launch; do not casually grant all theme-management capabilities. Contact Form 7 configuration is also administrator-managed by default.

### Layout and accessibility

Responsive grid/flex layouts accept additional cards and longer text. Main text is never height-clamped. Navigation uses WordPress's native mobile menu (including keyboard handling). There are visible focus outlines, descriptive image alternatives, labeled contact inputs, and reduced-motion support. Peach panels use dark text, rather than the reference's low-contrast white body text. Accent headings use a darker accessible peach. Supplied SVGs are trusted theme artwork: the CLI import temporarily permits only bundled SVG assets, not arbitrary SVG uploads through wp-admin.

## Contact form

Contact Form 7 owns submissions, validation, mail, and messages; the theme only supplies styles. If active when starter content is created, the command creates a labeled form and inserts its shortcode. Otherwise the Contact page gets a working, editable email link—not a fake form. Installing the plugin later does not overwrite that page: add a form and replace the email link with its Shortcode block manually.

Before launch, review **Contact → Contact Forms → Designo contact**:

- Confirm the recipient (defaults to the WordPress administrator email).
- Configure an authenticated sender on the real domain, SMTP/delivery, and spam protection. Local DDEV mail goes to Mailpit; a local success does not prove production delivery.
- Review field labels, required fields, confirmation/error messages, and any privacy/consent copy with the site owner. Keep visible labels and autocomplete hints.
- Configure permissions if Editors need to change form definitions; do not increase roles automatically.

## Service card interactions (1.0.3)

Service cards on Home and service pages have a peach highlight on hover (where supported) and keyboard focus, with dark high-contrast links, explicit focus outlines, and at least 44px-tall link targets. Touch devices do not require hovering to reveal links. The effect is CSS-only, adds no motion, and leaves existing page content, destinations, and native Cover settings unchanged at rest. Colors use the editable theme palette. Changing palette colors requires rechecking contrast.

Run `bash web/wp-content/themes/designo/tests/service-cards.sh [homepage-url]` with `agent-browser` and its browser installed. It defaults to the local DDEV homepage and checks hover/focus contrast, keyboard focus indicators, target height, state reset, and overflow at 375/768/1440px against the actual rendered page. This is a separate browser test, not part of the static-only GitHub Action.

## Google Maps

Introduced in version 1.0.1 and changed to automatic display in **1.0.2**, per the requested mockup. No additional plugin or API key is used. The Google Map block is available to standard Editors through the block inserter; it does not require Custom HTML or unfiltered HTML privileges.

**Pages → Locations → Edit → select Google Map → block settings:**

- Edit **Office / map title** and **Address to search**. Keep the address in sync with the adjacent office paragraph; they are independent editable blocks, not automatically synchronized.
- By default, the map uses a public Google Maps address-search embed. Verify the search result: supplied starter addresses are demonstration copy, not verified business locations. Google may return approximate locations or multiple results; no coordinates or business listings are invented by the theme.
- For an exact location, open Google Maps, select the correct place, choose **Share → Embed a map**, and copy only the `src` URL from the supplied iframe into **Exact Google Maps embed URL**. It must start with `https://www.google.com/maps/embed?pb=` (also accepts `google.com`). Do not paste the whole iframe or an ordinary share/short link. Clearing this field restores address search. Unsupported URLs are rejected and fall back to address search.
- Edit the external-link label under **Map text**. A map with no address is not shown. There are no load/hide buttons or visitor activation step.
- Preview and click **Load map** to verify the location. The editor preview itself never connects to Google.

Maps are rendered directly as titled Google iframes, with native `loading="lazy"`: they load automatically as they approach the viewport, without a click or theme frontend JavaScript. Office details alternate with maps on desktop and stack on smaller screens, using the mockup's compact spacing and decorative circles. Map areas reserve space to reduce layout shift and office panels grow for longer content. A small **Open in Google Maps** link remains outside each iframe as a fallback, without covering Google's controls or attribution.

**Privacy change:** Google now receives visitor network/browser information automatically when the browser loads each map, and may use cookies. There is no consent gate or stored preference supplied by this theme. Review/update the site's privacy notice and any applicable consent requirements before using automatic third-party embeds. If Google is blocked or JavaScript is unavailable, office details and external links remain usable. Google's availability, terms, search results, and built-in controls are outside the theme's control. Google may render a different area from the reference screenshot when sample addresses do not match a real office.

### Upgrade existing Locations content

Starter patterns include maps for new content. Activation and regular page views never rewrite existing content. To add maps to the existing `locations` page's `location-panel` groups explicitly:

```sh
ddev wp designo maps --dry-run
ddev wp designo maps
```

Use `wp` instead of `ddev wp` on the server. Back up first. The command preserves existing office blocks, wraps each office and new map in a responsive row, and derives initial settings from the current heading/address. It skips already upgraded rows and manually inserted maps, so rerunning does not duplicate maps or undo intentional editor removals. A renamed/missing Locations page or a custom layout should be handled in the editor instead. It does not change other pages, roles, plugins, mail settings, or site options.

For the compact mockup layout on an existing Locations page, run `wp designo maps-layout --dry-run`, then `wp designo maps-layout` (prefix with `ddev` locally). This preserves the H1 text and office/map content while making the page H1 screen-reader-only. New starter patterns already include that class. Editors can select the H1 in List View and remove its `screen-reader-text` class under Advanced to show it again. It is not deleted or hidden from assistive technology.

## Verification

```sh
# PHP lint:
ddev exec bash -c 'find web/wp-content/themes/designo -name "*.php" -print0 | xargs -0 -n1 php -l'
# Read-only structural smoke tests:
ddev wp eval-file web/wp-content/themes/designo/tests/smoke.php
# Read-only map URL/render/content-preservation/idempotency tests:
ddev wp eval-file web/wp-content/themes/designo/tests/maps.php
# Actual WordPress JavaScript block validation (temporary local-only output):
ddev wp eval-file web/wp-content/themes/designo/tests/validate.php > web/designo-validation.html
# Open https://designo-multi-page-website.ddev.site/designo-validation.html
# window.designoValidation.failures should be []
rm web/designo-validation.html
```

Do not publish the generated validation page. Also check the editor visually, a real save/reopen, long/replaced content, all page links, mobile menu keyboard behavior, contact validation and delivery, and desktop/tablet/mobile layouts before launch. Automated accessibility checks cannot verify every contrast over decorative imagery or every editorial change.
