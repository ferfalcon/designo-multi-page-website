# Designo agency website

![](./preview.jpg)

WordPress block theme implementation of **Designo agency website**.

## Table of contents

- [Overview](#overview)
  - [The job](#the-job)
  - [Links](#links)
- [My process](#my-process)
  - [Built with](#built-with)
  - [Useful resources](#useful-resources)
- [Author](#author)

## Overview

### The job

Implement a WordPress block theme starting from the provided assets for the **Designo agency website**.

Users should be able to:

- View the optimal layout for each page depending on their device's screen size
- See hover states for all interactive elements throughout the site
- Receive an error message when the contact form is submitted if:
  - The `Name`, `Email Address` or `Your Message` fields are empty should show "Can't be empty"
  - The `Email Address` is not formatted correctly should show "Please use a valid email address"
- **Bonus**: View actual locations on the locations page maps (we recommend [Leaflet JS](https://leafletjs.com/) for this)

### Links

- Solution URL: [https://github.com/ferfalcon/designo-multi-page-website](https://github.com/ferfalcon/designo-multi-page-website)
- Live Site URL: [https://designo-multi-page-website.ferfalcon.shop/](https://designo-multi-page-website.ferfalcon.shop/)

## My process

### Built with

- Semantic HTML5 markup
- CSS custom properties
- Flexbox
- CSS Grid
- Mobile-first workflow
- [WordPress](https://wordpress.org/) - Open source publishing platform
- [DDEV](https://ddev.com/) - Docker-based PHP development environment

### Useful resources

- [Automattic | Agent skills](https://www.skills.sh/automattic/agent-skills) - Skills from Automatic.

- [Automattic | WP Project Triage](https://www.skills.sh/automattic/agent-skills/wp-project-triage) - Use this skill to quickly understand what kind of WordPress repo you’re in and what commands/conventions to follow before making changes.  
```bash
pnpm dlx skills add https://github.com/automattic/agent-skills --skill wp-project-triage
```

- [Automattic | WordPress Router](https://www.skills.sh/automattic/agent-skills/wordpress-router) - Use this skill at the start of most WordPress tasks to:
  - identify what kind of WordPress codebase this is (plugin vs theme vs block theme vs WP core checkout vs full site),
  - pick the right workflow and guardrails,
  - delegate to the most relevant domain skill(s).  
```bash
pnpm dlx skills add https://github.com/automattic/agent-skills --skill wordpress-router
```

- [Automattic | WP-CLI and Ops](https://www.skills.sh/automattic/agent-skills/wp-wpcli-and-ops) - Use this skill when the task involves WordPress operational work via WP-CLI, including:
  - **`wp search-replace`** (URL changes, domain migrations, protocol switch)
  - DB export/import, resets, and inspections (**`wp db *`**)
  - plugin/theme install/activate/update, language packs
  - cron event listing/running
  - cache/rewrite flushing
  - multisite operations (**`wp site *`**, **`--url`**, **`--network`**)
  - building repeatable scripts (**`wp-cli.yml`**, shell scripts, CI jobs)  
```bash
pnpm dlx skills add https://github.com/automattic/agent-skills --skill wp-wpcli-and-ops
```

- [Automattic | WP Block Themes](https://www.skills.sh/automattic/agent-skills/wp-block-themes) - Use this skill for block theme work such as:
  - editing **`theme.json`** (presets, settings, styles, per-block styles)
  - adding or changing templates (**`templates/*.html`**) and template parts (**`parts/*.html`**)
  - adding patterns (**`patterns/*.php`**) and controlling what appears in the inserter
  - adding style variations (**`styles/*.json`**)
  - debugging “styles not applying” / “editor doesn’t reflect theme.json”.
```bash
pnpm dlx skills add https://github.com/automattic/agent-skills --skill wp-block-themes
```

- [Automattic | WP Block Development](https://www.skills.sh/automattic/agent-skills/wp-block-development) - Use this skill for block work such as:
  - creating a new block, or updating an existing one
  - changing **`block.json`** (scripts/styles/supports/attributes/render/viewScriptModule)
  - fixing “block invalid / not saving / attributes not persisting”
  - adding dynamic rendering (**`render.php`** / **`render_callback`**)
  - block deprecations and migrations (**`deprecated`** versions)
  - build tooling for blocks (**`@wordpress/scripts`**, **`@wordpress/create-block`**, **`wp-env`**)
```bash
pnpm dlx skills add https://github.com/automattic/agent-skills --skill wp-block-development
```

- [GitHub | Git Commit with Conventional Commits](https://www.skills.sh/github/awesome-copilot/git-commit) - Standardized git commits using Conventional Commits specification with intelligent diff analysis and message generation.
  - Auto-detects commit type (feat, fix, docs, refactor, perf, test, build, ci, chore, revert) and scope from actual code changes
  - Generates semantic commit messages following conventional format with optional body and footer sections
  - Intelligently stages files for logical grouping when needed, with support for pattern-based and interactive staging~
  - Detects breaking changes and formats them with exclamation mark or BREAKING CHANGE footer
  - Enforces git safety protocols: prevents destructive operations, config changes, and secret commits without explicit user request
```bash
pnpm dlx skills add https://github.com/github/awesome-copilot --skill git-commit
```

- [Google | Build with Modern Web Guidance](https://developer.chrome.com/docs/modern-web-guidance) - Modern Web Guidance is a set of skills that embed web platform expertise, best practices, and browser compatibility data directly into your coding agents.
```bash
pnpm dlx skills add GoogleChrome/modern-web-guidance
```

## Author

* Website: [ferfalcon.com](http://ferfalcon.com/)
* LinkedIn: [Fernando Falcon](https://www.linkedin.com/in/fernandofalcon/)
