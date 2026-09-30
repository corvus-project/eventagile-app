
# EventAgile: Comprehensive Business Plan & Feature Matrix

## 1. Executive Summary & Vision

- Product Name: EventAgile (https://eventagile.com)
- Core Value Proposition: A high-performance, multi-tenant event scheduling and workshop registration platform built for independent instructors, yoga studios, and workshop hosts. It provides zero-friction student signups, automated waitlists, and isolated subdomains.
- Primary Objective: Build a world-class portfolio piece demonstrating mastery of modern SaaS architecture (Laravel, Livewire, Tenancy, Stripe) while generating a sustainable side-hustle revenue stream (£300 to £1000/mo) with minimal operational overhead.
- Business Structure (UK): Sole Trader. Operates under the UK £1,000 trading allowance initially, registering for Self Assessment once gross side-hustle income crosses that threshold. No VAT registration required until crossing the £90,000 turnover threshold.



## 2. Technical & Architectural Blueprint

To support future growth smoothly up to 1,000+ users without performance decay, EventAgile uses a clean two-layer structure:

* Layer 1: Central Landlord App (Combined Public Site & Admin Control Panel)
* Tech: Laravel, Filament (for admin management), Tailwind CSS, Livewire.
* Purpose: Hosts the public marketing website, user account creation, global Stripe subscription billing, and landlord-level administration.


* Layer 2: Isolated Tenant App (tenancyforlaravel)
* Tech: Single Laravel codebase dynamically routing requests based on subdomains (studio-name.eventagile.com).
* Purpose: Each tenant operates out of a completely isolated database schema containing their specific events, bookings, and customer data.


* Infrastructure: Hosted on a lean, cost-effective VPS (UpCloud) using GitHub Actions for CI/CD automated deployments and a transactional email provider (e.g., Resend).

---

## 3. Subscription Pricing Tiers & Feature Matrix

### Starter (Free)

* Target User: New instructors, hobbyists, 1-year free acquisition tier
* Active Events & Registrations: Unlimited
* Team Access / Users: Single User (1 admin)
* Registration & Booking: Zero-friction booking page
* Instant Confirmations: Basic confirmation
* Automated Email Reminders: None
* Waitlist Management: None
* Registration Exporting: None
* Custom Registration Questions: None
* Check-in / Attendance Tool: None
* Embeddable Website Widget: None
* White-Labeling / Branding: EventAgile branding shown

### Pro (£12 / month)

* Target User: Independent instructors, growing teachers needing automation
* Active Events & Registrations: Unlimited
* Team Access / Users: Multi-User (Up to 3 team members)
* Registration & Booking: Zero-friction booking page
* Instant Confirmations: Included
* Automated Email Reminders: Up to 2,000 reminders / month
* Waitlist Management: Included (FIFO automatic queue)
* Registration Exporting: CSV Export
* Custom Registration Questions: Up to 3 custom fields
* Check-in / Attendance Tool: Included (Digital door check-in)
* Embeddable Website Widget: None
* White-Labeling / Branding: EventAgile branding shown

### Business (£29 / month)

* Target User: Small studios, high-volume event organizers requiring advanced tooling
* Active Events & Registrations: Unlimited
* Team Access / Users: Multi-User (Unlimited team members)
* Registration & Booking: Zero-friction booking page
* Instant Confirmations: Included
* Automated Email Reminders: Unlimited reminders
* Waitlist Management: Included (FIFO automatic queue)
* Registration Exporting: CSV Export
* Custom Registration Questions: Unlimited custom fields
* Check-in / Attendance Tool: Included (Digital door check-in)
* Embeddable Website Widget: Included (iFrame/HTML snippet)
* White-Labeling / Branding: Remove "Powered by EventAgile" & Custom Logo

---

## 4. Legal, Compliance, & Financial Framework

* Billing Engine: Stripe via laravel/cashier. Handles secure credit card processing, SCA compliance, customer billing portals, and automated PDF invoice generation.
* Tax Automation: Stripe Tax enabled to handle localized digital tax rules automatically.
* Required Legal Pages:
* Terms of Service: Explicit "as is" software liability disclaimers and account termination rights.
* Privacy Policy: UK GDPR-compliant storage notices detailing how student and instructor data is handled.


* Accounting Tool: Lightweight cloud bookkeeping (e.g., FreeAgent or QuickBooks Self-Employed) connected to a dedicated business bank account/pot to track expenses and forecast HMRC tax obligations.

---

## 5. Phased Development Roadmap (Derived from this Plan)

Using this plan, you can break your upcoming development sprint into actionable milestones:

* Phase 1: Landlord & Tenant Infrastructure Foundation
* Finalize tenancyforlaravel provisioning on local/staging environments.
* Build the central landing page and authentication flow on the landlord app.


* Phase 2: Core Tenant Features (Starter Level)
* Event creation CRUD.
* Public-facing booking page with zero-friction input (Name & Email).
* Simple attendee dashboard and reporting.


* Phase 3: Billing & Feature-Gating Integration
* Integrate Laravel Cashier with Stripe Checkout for Pro (£12) and Business (£29) plans.
* Implement middleware feature-gating logic to lock/unlock reminders, waitlists, and team accounts based on active subscription status.


* Phase 4: Advanced Pro & Business Features
* FIFO Waitlist automation logic.
* Custom registration questions and CSV exports.
* Check-in mode interface and embeddable widget code generation.


* Phase 5: Soft Launch & Polish
* Connect custom domain and SSL certificates via UpCloud/Nginx.
* Deploy automated GitHub Actions CI/CD pipeline.
* Publish Terms of Service, Privacy Policy, and activate Stripe live mode.

  