# Development and deployment

## Source of truth

Repository: https://github.com/ferfalcon/designo-multi-page-website

The custom block theme is in `web/wp-content/themes/designo/`. WordPress core, plugins, uploads, database exports, credentials, and local DDEV settings are intentionally not tracked. See the [theme setup/editor guide](../web/wp-content/themes/designo/README.md).

## Fresh local setup

Install Docker and DDEV, clone the repository, then run from the repository root:

```sh
ddev config --project-type=wordpress --docroot=web --php-version=8.3 --database=mariadb:11.8
ddev start
ddev wp core download --skip-content
ddev launch
```

Complete the WordPress installer in the browser, choosing local-only administrator credentials. Do not copy production configuration or connect the local site directly to a production database.

Then install the theme's optional contact form dependency and starter content:

```sh
ddev wp plugin install contact-form-7 --activate
ddev wp theme activate designo
ddev wp designo starter-content --dry-run
ddev wp designo starter-content --configure-site
```

Check plugin PHP requirements when choosing versions. Production currently uses PHP 8.2 and Contact Form 7 6.1.7, while the local setup uses PHP 8.3. Theme requirements are WordPress 6.6+ and PHP 8.0+. New installations receive maps through starter patterns; existing installations have explicit map upgrade commands documented in the theme guide.

DDEV captures local email in Mailpit; local mail success does not prove production delivery. Keep development enquiries and credentials out of Git.

## GitHub workflow

1. Fetch the latest `main`, create a feature branch, and implement/test locally.
2. Review `git diff`, stage only intended source files, and commit with a descriptive message.
3. Push the feature branch and open a pull request against `main`.
4. GitHub Actions checks PHP syntax, JavaScript syntax, browser-test shell syntax, and JSON files. It does **not** test a full WordPress runtime or deploy anything.
5. Review and merge the PR before deploying future changes. Do not treat a green syntax check as end-to-end approval.
6. Deploy the reviewed revision deliberately, verify the live site, and record the deployed commit privately.

The initial theme and maps were deployed directly over SSH before being brought into GitHub. The first implementation PR records the already-live 1.0.2 source; opening that PR does not deploy again. Future work should use the branch/PR workflow above.

## Verification

```sh
ddev exec bash -c 'find web/wp-content/themes/designo -name "*.php" -print0 | xargs -0 -n1 php -l'
ddev wp eval-file web/wp-content/themes/designo/tests/smoke.php
ddev wp eval-file web/wp-content/themes/designo/tests/maps.php
```

The theme guide also documents real WordPress JavaScript block validation. Its generated HTML is temporary and must be removed, not committed or deployed. Check the editor and responsive layouts, map loading, navigation/keyboard behavior, and contact validation as well. Production mail delivery and spam protection need separate verification.

## Production deployment

Live site: https://designo-multi-page-website.ferfalcon.shop/

There is **no automatic production deployment** configured. SSH keys, account paths, backup locations, and operational history belong in a private runbook, not this public repository. This workspace's detailed notes are retained in the ignored `docs/development-tools.local.md` file; that file is not supplied by a fresh clone.

For an authorized release:

- Review the exact domain, host, remote WordPress root, current theme, and PHP/plugin compatibility.
- Back up the production database and affected theme outside the public document root. Verify backup output before changes.
- Preview a selective theme transfer with `rsync --dry-run`. Deploy only the custom theme; exclude `tests/`. Do not use a broad `--delete` against WordPress, transfer local credentials, or replace the live database with the development database.
- Upload dependencies before enabling code that references them. Run only deliberately approved content migrations; activation never seeds or replaces pages.
- Purge the site's cache, check live HTTP responses and layouts, and verify the deployed revision.
- Preserve a rollback plan. Restoring an entire database can overwrite newer editorial changes or submissions.

Google Maps in 1.0.2 loads automatically and may share visitor information with Google without a click. Review the site's privacy notice and applicable consent requirements. Starter office addresses are sample content and need verification. The theme does not store contact enquiries; Contact Form 7 sends them to its configured recipient unless a storage integration is installed.
