# Design Documentation

This document is the living design reference for the Designo multi-page website implementation.
It starts from the Frontend Mentor/Figma design and grows alongside the WordPress block theme.

## Primary Design Source

- Figma: https://www.figma.com/design/8sbHGgTBpanmXlzhTwqkmC/designo-multi-page-website?node-id=10-87
- Design system PDF: `design/Design System.pdf`
- Local screenshots: `design/`
- Starter assets and copy: `starter-code/`
- Theme implementation: `wp-content/themes/designo/`

Figma access is available. The linked node is the `Design System` canvas and contains a
`Design System` frame sized `1024 x 2802`. Its main sections are Colors, Typography, Buttons,
and Form Elements.

## Product Summary

Designo is a responsive agency website for a digital product and branding studio. The site uses
warm editorial layouts, large image-led sections, compact uppercase navigation, and rounded cards
to present company information, service categories, project examples, locations, and a contact
form.

## Pages

The design covers these public pages:

- Home
- About
- Locations
- Contact
- Web Design
- App Design
- Graphic Design

Local visual references are organized by viewport:

- Desktop screenshots: `design/Desktop-*.jpg`
- Tablet screenshots: `design/Tablet-*.jpg`
- Mobile screenshots: `design/Mobile-*.jpg`
- Active/hover desktop states: `design/Desktop-*-Active.jpg`
- Mobile menu state: `design/Mobile-Menu.jpg`

## Visual System

### Colors

Source design tokens are documented in the Figma design system and exported in
`design/Design System.pdf`. Theme tokens are implemented in
`wp-content/themes/designo/theme.json`.

| Token | Value | Use |
| --- | --- | --- |
| Peach | `#E7816B` / `rgb(231, 129, 107)` / `hsl(11, 73%, 66%)` | Primary brand surfaces, hero backgrounds, accents |
| Light Peach | `#FFAD9B` / `rgb(255, 173, 155)` / `hsl(11, 100%, 80%)` | Button hover and warmer interactive states |
| Black | `#1D1C1E` / `rgb(29, 28, 30)` / `hsl(270, 3%, 11%)` | Footer background and high-contrast text |
| Dark Grey | `#333136` / `rgb(51, 49, 54)` / `hsl(264, 5%, 20%)` | Default body text |
| Light Grey | `#F1F3F5` / `rgb(241, 243, 245)` / `hsl(210, 17%, 95%)` | Neutral supporting surfaces |
| Pale Peach | `#FDF3F0` | Editorial content sections; implementation extension derived from the design's pale section backgrounds |
| White | `#FFFFFF` | Page background and reversed text |

### Typography

- Source font family: Jost.
- Theme font family: Jost, with Arial and sans-serif fallbacks.
- Source body text: Jost Regular, `16px`, `26px` line-height.
- Source H1: Jost Medium, `48px`, `48px` line-height.
- Source H2: Jost Medium, `40px`, `48px` line-height, `2px` letter spacing.
- Source H3: Jost Medium, `20px`, `26px` line-height, `5px` letter spacing.
- Navigation: uppercase, `0.875rem`, wide letter spacing.
- Buttons: uppercase, `0.9375rem`, medium weight, wide letter spacing.

Theme font-size tokens:

| Token | Size |
| --- | --- |
| Small | `0.875rem` |
| Base | `1rem` |
| Lead | fluid from `1.125rem` to `1.25rem` |
| Heading 2 | fluid from `1.75rem` to `2rem` |
| Heading 1 | fluid from `2rem` to `3rem` |

### Layout

- Wide content width: `1110px`.
- Default content width: `690px`.
- Global inline page padding: `24px`.
- Main section wrapper: `.designo-section`.
- Header wrapper: `.designo-site-header`.
- Footer wrapper: `.designo-site-footer`.
- Large rounded surfaces use `15px` radius.
- Buttons use `8px` radius.

Spacing tokens:

| Token | Size |
| --- | --- |
| 20 | `0.5rem` |
| 30 | `1rem` |
| 40 | `1.5rem` |
| 50 | `2rem` |
| 60 | `clamp(3rem, 7vw, 5rem)` |
| 70 | `clamp(4rem, 9vw, 7.5rem)` |
| 80 | `clamp(6rem, 12vw, 10rem)` |

## Components

### Site Header

Implementation:

- Pattern: `wp-content/themes/designo/patterns/site-header.php`
- Template part: `wp-content/themes/designo/parts/header.html`

Behavior and structure:

- Dark logo links to the home page.
- Primary navigation links to About, Locations, and Contact.
- Navigation switches to the WordPress mobile overlay menu.
- Header content is constrained to the wide width.

### Site Footer

Implementation:

- Pattern: `wp-content/themes/designo/patterns/site-footer.php`
- Template part: `wp-content/themes/designo/parts/footer.html`

Behavior and structure:

- Black full-width background.
- Light logo and repeated primary navigation.
- Central office address and contact details.
- Social icon links aligned to the end on wider layouts.

### Hero Sections

Implementation classes:

- `.designo-hero`
- `.designo-page-hero`

Design behavior:

- Primary hero surfaces use Peach background and white text.
- Home hero includes a product phone image.
- Inner pages use either editorial media/text layouts or split content/form layouts.
- Rounded corners are removed on narrow screens where heroes bleed to the viewport edge.

### Design Category Cards

Implementation:

- `.designo-design-card`
- Patterns such as `design-links-web-graphic.php`, `design-links-app-web.php`, and
  `design-links-app-graphic.php`

Design behavior:

- Image-backed cards with dark overlays.
- Centered title and uppercase "View Projects" link.
- Hover/focus states brighten and warm the image treatment.

### Project Cards

Implementation:

- `.designo-project-card`
- `web-design-projects.php`
- `app-design-projects.php`
- `graphic-design-projects.php`

Design behavior:

- Rounded image cards with Light Peach backgrounds.
- Project title, short description, and image are grouped as repeated portfolio entries.

### Location Links

Implementation:

- Pattern: `wp-content/themes/designo/patterns/location-links.php`

Design behavior:

- Repeated country callouts for Canada, Australia, and United Kingdom.
- Uses shared illustration assets.
- Links users toward the Locations page.

### Contact Form

Implementation:

- Pattern: `wp-content/themes/designo/patterns/contact-page.php`
- Form class: `.designo-contact-form`

Design behavior:

- Transparent fields on Peach background.
- Bottom-border input treatment.
- Focus state thickens the bottom border.
- Error state includes an inline "Can't be empty" message and error icon in the source design.
- Native HTML validation is currently used.

### Buttons

Source design:

- Button size: `152px x 56px`.
- Border radius: `8px`.
- Label example: "Learn More".
- Dark-surface default: white background with dark text.
- Dark-surface hover: Light Peach background with white text.
- Light-surface default: Peach background with white text.
- Light-surface hover: Light Peach background with white text.

Theme implementation:

- Global button styles are defined in `theme.json`.
- Default implementation currently uses white background and dark text, with Light Peach hover.

## WordPress Theme Structure

The custom block theme lives in `wp-content/themes/designo/`.

Important files:

- `theme.json`: design tokens, typography, color palette, spacing, and global styles.
- `style.css`: theme metadata and scoped custom CSS.
- `templates/front-page.html`: front page template.
- `templates/page.html`: default page template.
- `parts/header.html`: header template part.
- `parts/footer.html`: footer template part.
- `patterns/*.php`: reusable filesystem block patterns for page sections and full page starter content.

Theme work should remain scoped to `wp-content/themes/designo/`.

## Assets

Copied starter assets are stored in `wp-content/themes/designo/assets/`.

Asset groups:

- `shared/`: logos, social icons, common background patterns, country illustrations.
- `home/`: home hero phone, service category images, value illustrations.
- `about/`: about page editorial images and background patterns.
- `web-design/`, `app-design/`, `graphic-design/`: project card images and intro backgrounds.
- `locations/`: map images.
- `contact/`: contact page backgrounds and form error icon.

## Responsive Notes

The local design set includes desktop, tablet, and mobile screenshots. Current implementation uses
WordPress block layout controls, fluid theme tokens, and focused CSS overrides rather than a custom
layout framework.

Known responsive rules:

- The global minimum viewport width is `320px`.
- Main content wrappers use `min(100% - 48px, 1110px)`.
- Mobile heroes and page heroes remove border radius and extend to the viewport edge.
- Grid and column blocks collapse using WordPress block behavior and minimum column widths.

## Interaction Notes

- Links inherit text color by default and shift to Peach on hover globally.
- Buttons shift to Light Peach background and white text on hover.
- Design category images get a warmer, brighter hover/focus treatment.
- Focus-visible outlines use Peach with a `4px` offset.
- Contact form fields use visible focus changes.

## Open Design Tasks

- Compare implemented pages against the `design/` screenshots at desktop, tablet, and mobile widths.
- Document any intentional deviations from the Figma/screenshots.
- Confirm hover states from the active desktop screenshots.
- Expand the page-level sections with exact layout notes after visual QA.
- Decide whether contact form error UI should reproduce the supplied error icon asset.
- Reconcile source button variants with the current single global WordPress button style.

## Verification Checklist

- Run `ddev wp theme list` and confirm the `designo` theme is available.
- Run `node .agents/skills/wp-block-themes/scripts/detect_block_themes.mjs` after structural theme changes.
- Run `ddev exec php -l` for changed PHP pattern files.
- Review Home, About, Locations, Contact, Web Design, App Design, and Graphic Design at mobile,
  tablet, and desktop widths.
- Check header navigation, mobile menu, hover/focus states, contact form validation, and footer links.
