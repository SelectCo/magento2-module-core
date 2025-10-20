# SelectCo Core Module

Utility core module for SelectCo Magento 2 extensions. It provides shared helpers and services used across SelectCo modules, including:

- Config helper for safely reading/writing config and clearing caches
- Store helper for retrieving common Store Information and email sender identities
- Simple email Sender service wrapping Magento's TransportBuilder

This module is intended to reduce duplication between SelectCo modules.

## Features
- Read configuration values with sensible defaults
- Programmatically write configuration values to specific scopes and IDs
- Clear cache types and reinit Magento configuration
- Convenience methods for Store Information (name, address, hours, VAT, etc.)
- Convenience methods for email identities (general, sales, support, custom1, custom2)
- Utility to send templated emails with minimal boilerplate

## Requirements
- Magento 2 (tested with 2.3.5)
- PHP version compatible with your Magento installation

## Installation
You can install this module either via Composer or by placing it in app/code.

### Composer (preferred)
1. Require the package:
   - If available via your satis/packagist: `composer require select-co/module-core`
   - If using this repository directly, add a VCS repository entry in your root composer.json and then `composer require select-co/module-core`.
2. Enable and set up the module:
   - `bin/magento module:enable SelectCo_Core`
   - `bin/magento setup:upgrade`
   - In production mode: `bin/magento setup:di:compile` and `bin/magento setup:static-content:deploy -f`

### Manual installation (app/code)
1. Copy this directory to `app/code/SelectCo/Core`.
2. Run:
   - `bin/magento module:enable SelectCo_Core`
   - `bin/magento setup:upgrade`
   - In production mode: `bin/magento setup:di:compile` and `bin/magento setup:static-content:deploy -f`

## License
MIT. See LICENSE.

## Support
If you have a feature request or spotted a bug or a technical problem, create a GitHub issue.
