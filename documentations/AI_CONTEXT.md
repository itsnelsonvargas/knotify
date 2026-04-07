# KNotify AI Context

## Project Overview
- Project name: `knotify`
- Type: Wedding website and guest management system
- Stack: Laravel (PHP), MySQL-compatible relational database
- Primary goal: Manage wedding guests, invitation groups, roles, affiliations, FAQ entries, and related records.

## Domain Model (Current Migrations)
- `guests`: Core person records (name fields, contact details, invitation metadata, soft delete).
- `groups`: Guest grouping buckets (for families, friend circles, teams).
- `group_guest`: Pivot table for many-to-many between groups and guests.
- `roles`: Labels for guest role/classification.
- `affiliations`: Organization/category of a guest.
- `faqs`: Guest-facing questions and answers.
- `banks`: Bank account details for gift/remittance info.
- `users`: Admin/auth users (default Laravel auth tables also present).

## Relationship Intent
- `guests.affiliation_id` -> `affiliations.id` (nullable, set null on delete)
- `guests.role_id` -> `roles.id` (nullable, set null on delete)
- `group_guest.group_id` -> `groups.id` (cascade on delete)
- `group_guest.guest_id` -> `guests.id` (cascade on delete)
- `group_guest` composite primary key (`group_id`, `guest_id`) prevents duplicate pairings.

## Known Schema Notes
- `faqs.guest_id` should be `foreignId(...)->nullable()->constrained('guests')->nullOnDelete()` instead of `string`, to match `guests.id` type.
- Consider adding unique constraints where business rules require uniqueness (for example `roles.role_name`, `groups.group_name`, `affiliations.affiliation_type`).
- Consider whether pivot metadata is needed in `group_guest` (for example `created_at` or membership status).

## Conventions For Future AI Changes
- Use `foreignId`/`constrained` for FK columns referencing `id()` columns.
- Keep FK data types aligned with parent primary key types.
- Add `nullable()` + `nullOnDelete()` only when orphaned references are acceptable.
- Use `softDeletes()` only for entities that require historical recovery (already applied to `guests`).
- Prefer concise column names and explicit table intent comments in migrations.

## Assistant Guidance
- When generating new migrations, preserve existing naming style and table pluralization.
- Avoid destructive migration rewrites in-place after production use; create follow-up migrations for fixes.
- If modifying relationships, update Eloquent model relations consistently (`belongsTo`, `belongsToMany`, `hasMany`).
