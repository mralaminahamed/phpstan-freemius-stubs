# Usage Guide

This guide provides detailed information on how to use the Freemius WordPress SDK stubs in your projects.

## Basic Usage

Once you've installed the stubs via Composer, they will be available for your IDE and static analysis tools to use.

### In PHPStan

Make sure your `phpstan.neon` file includes:

```yaml
parameters:
    bootstrapFiles:
        - vendor/mralaminahamed/freemius-stubs/freemius-constants-stubs.stub
    scanFiles:
        - vendor/mralaminahamed/freemius-stubs/freemius-stubs.stub
```

### In Your Code

The stubs provide type information for IDE completion without actually implementing the functionality:

```php
<?php
// Initialize Freemius
$fs = Freemius::instance();

// Use constants
if (WP_FS__SDK_VERSION >= '2.4.0') {
    // SDK version-specific code
}

// Use interfaces
class MyClass implements Freemius_Api_Interface {
    // Your implementation
}
```

## Advanced Usage

### With WordPress Plugins

When developing WordPress plugins that use Freemius:

```php
<?php
// Check if Freemius is active
if (class_exists('Freemius')) {
    // Use Freemius features
    $fs = fs_dynamic_init([
        'id'             => 'your_plugin_id',
        'slug'           => 'your-plugin-slug',
        'type'           => 'plugin',
        'public_key'     => 'public_key',
        'is_premium'     => false,
        'has_addons'     => false,
        'has_paid_plans' => true,
        'menu'           => [
            'slug'    => 'your-plugin-slug',
            'contact' => false,
            'support' => false,
            'account' => true,
        ],
    ]);
}
```

### Debug Methods

The stubs include all debug methods that are helpful during development:

```php
<?php
$fs->get_site_info();
$fs->get_current_or_network_user();
$fs->get_current_user();
```

## Known Limitations

- Stubs only provide type information and don't implement actual functionality
- Some dynamic features of Freemius might not be fully captured in static analysis
- Version-specific features depend on which version of the stubs you're using 