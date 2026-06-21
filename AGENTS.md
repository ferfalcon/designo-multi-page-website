# Repository Guidelines

## Project Structure & Module Organization

This is a WordPress/DDEV implementation of the Designo multi-page website. WordPress core files live at the repository root. DDEV config is in `.ddev/`, with the project served from the root docroot.

Reference material is kept separate from WordPress runtime code:

- `starter-code/` contains supplied static HTML and image/SVG assets.
- `design/` contains desktop, tablet, and mobile screenshots.
- `wp-content/themes/designo/` is the custom project block theme. Keep theme work scoped there.
- `wp-content/themes/designo/assets/` contains the copied starter assets used by the theme.
- `wp-content/themes/designo/templates/`, `parts/`, and `patterns/` contain block theme templates, template parts, and filesystem block patterns.
- Other directories in `wp-content/themes/` are bundled WordPress themes; do not edit them for project work.
- `wp-content/plugins/` is for plugin code only; avoid editing bundled plugins unless required.

## Build, Test, and Development Commands

Use DDEV for local WordPress development:

```bash
ddev start
ddev describe
ddev wp theme list
ddev wp theme activate designo
ddev exec php -l path/to/file.php
node .agents/skills/wp-block-themes/scripts/detect_block_themes.mjs
```

`ddev start` boots local containers. `ddev describe` shows URLs and services. `ddev wp ...` runs WP-CLI inside the container. `ddev exec php -l` checks PHP syntax. The block theme detector confirms WordPress recognizes `wp-content/themes/designo/` as a block theme.

There is no project-level npm, Composer, or PHPUnit setup. Do not add build tooling unless implementation requires it.

## Coding Style & Naming Conventions

Follow WordPress conventions for PHP, templates, and block themes. Use 4 spaces for PHP and 2 spaces for HTML, CSS, and JSON where practical. Prefer lowercase, hyphenated names for theme files, pattern slugs, handles, and CSS classes, for example `designo-card`.

Keep custom code scoped to the custom theme. Do not modify WordPress core, default themes, or generated DDEV files for feature work.

For theme-owned reusable content, prefer filesystem patterns in `wp-content/themes/designo/patterns/`. Use WordPress Pages for page body content; do not seed or mutate local database content unless specifically requested.

## Testing Guidelines

No automated test suite is configured. For now, verify changes with targeted checks:

- Run `ddev exec php -l` on changed PHP files.
- Use `ddev wp theme list` to confirm theme availability.
- Run `node .agents/skills/wp-block-themes/scripts/detect_block_themes.mjs` after structural theme changes.
- Review key pages against `design/` at mobile, tablet, and desktop widths.
- Check hover, navigation, form validation, and responsive layout behavior before opening a PR.

## Commit & Pull Request Guidelines

Recent commits use short, imperative messages such as `Add initial project files and assets for Designo Agency website`. Keep commits focused.

Pull requests should include a clear summary, verification notes, screenshots for visual changes, and links to related issues or Frontend Mentor requirements. Call out configuration changes, dependencies, or database assumptions.
If the implementation deviates from the screenshots in the `design/` folder because of technical constraints, document the visual differences and the reasoning in the PR summary.

## Security & Configuration Tips

Keep environment-specific settings in DDEV or local WordPress config files. Do not commit secrets, database dumps, private uploads, or credentials. Document any required `wp-config.php` changes.
