# Concrete Bloom

Multipage marketing site for handcrafted architectural concrete planters — PHP + Bootstrap 5.

## Pages

- `index.php` — Home (hero, Dallas wind hook, stats, services, catalog preview, process, FAQ)
- `about.php` — Philosophy + Dallas wind / cheap-plastic story
- `service.php` — Craft, materials & guarantees
- `collection.php` — Full planter catalog with configure modal
- `contact.php` — Inquiry form (logs to `storage/inquiries.log`)
- `craft.php` / `planters.php` — 301 redirects to `service.php` / `collection.php`

## Run locally

```bash
php -S localhost:8080
```

Then open http://localhost:8080

## Notes

- Update phone/email/address in `includes/config.php`
- Swap Unsplash images for real product photography when available
- Wire `contact.php` to email/CRM when ready
