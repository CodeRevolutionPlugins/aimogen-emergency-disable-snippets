# Aimogen Emergency Disable

A tiny WordPress “kill switch” plugin that disables **Aimogen Snippets Engine** execution instantly, without deleting or altering any snippets.

When active, it defines:

~~~php
define('AIMOGEN_DISABLE_SNIPPETS', true);
~~~

This prevents all snippet execution (PHP) and injection (JS/CSS/HTML) while keeping every snippet stored and intact.

---

## Why this exists

Sometimes you need an immediate, reversible stop button:

- a newly-enabled snippet breaks the frontend
- a snippet causes a fatal error loop
- performance tanks and you need to stabilize first
- you want a safe “maintenance lever” on production

Activate this plugin, confirm the site is stable, then investigate at your pace. Deactivate it when ready.

---

## What it disables

With this plugin active, the Aimogen Snippets Engine should skip:

- PHP snippet execution
- Inline JavaScript injection
- Inline CSS injection
- HTML footer injection

Nothing is removed. Nothing is rewritten. It just prevents runtime execution.

---

## How it works

Aimogen Snippets Engine includes an emergency guard that checks for:

~~~php
defined('AIMOGEN_DISABLE_SNIPPETS') && AIMOGEN_DISABLE_SNIPPETS
~~~

This plugin defines that constant early during the WordPress plugin load cycle. As a result, Aimogen’s runtime hooks return early and do not execute/inject snippets.

Deactivate the plugin to restore normal behavior.

---

## Installation

### Option A: Upload ZIP in wp-admin

1. Download the plugin ZIP from your repository.
2. Go to **Plugins → Add New → Upload Plugin**
3. Upload the ZIP and click **Install Now**
4. Click **Activate**

### Option B: Manual upload

1. Upload the plugin folder to:

   `wp-content/plugins/aimogen-emergency-disable/`

2. Activate it from **Plugins**.

---

## Usage

### Disable Aimogen snippets

Activate **Aimogen Emergency Disable**.

### Re-enable Aimogen snippets

Deactivate **Aimogen Emergency Disable**.

---

## Compatibility notes

- This plugin is designed to be harmless even if Aimogen is not installed.
- If another plugin/theme defines `AIMOGEN_DISABLE_SNIPPETS` first, PHP will not allow redefining it. In that case, the first definition wins.
- If you use persistent object caching or aggressive page caching, purge caches after toggling for fastest visible effect.

---

## FAQ

### Does it delete snippets?

No. It doesn’t touch the database.

### Does it change snippet status (active/inactive)?

No. It only prevents execution/injection at runtime.

### Will this stop admin-side behavior too?

Aimogen snippets are typically frontend-oriented, but the constant is global. If Aimogen checks this constant in admin contexts, it will also prevent those code paths.

---

## Development

This plugin intentionally contains only what’s necessary:

- a plugin header
- an early `define()` guarded by `defined()`

Minimal surface area, maximum reliability.

---

## License

GPL-2.0-or-later

---

## Credits

Built as a safety companion for deployments using the Aimogen Snippets Engine.
