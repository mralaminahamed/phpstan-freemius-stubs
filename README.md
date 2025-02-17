# Freemius WordPress SDK Stubs

[![Latest Version](https://img.shields.io/packagist/v/mralaminahamed/freemius-stubs.svg?color=4CC61E&style=flat-square)](https://packagist.org/packages/mralaminahamed/freemius-stubs)
[![Downloads](https://img.shields.io/packagist/dt/mralaminahamed/freemius-stubs.svg?style=flat-square)](https://packagist.org/packages/mralaminahamed/freemius-stubs/stats)
[![License](https://img.shields.io/packagist/l/mralaminahamed/freemius-stubs.svg?style=flat-square)](./LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/mralaminahamed/freemius-stubs.svg?style=flat-square)](./composer.json)
[![Tweet](https://img.shields.io/badge/Tweet-share-1da1f2?style=flat-square&logo=twitter)](https://twitter.com/intent/tweet?text=Check%20out%20Freemius%20WordPress%20SDK%20Stubs%20for%20IDE%20completion%20and%20static%20analysis%20https%3A%2F%2Fgithub.com%2Fmralaminahamed%2Fphpstan-freemius-stubs)

PHP stub declarations for the [Freemius WordPress SDK](https://github.com/freemius/wordpress-sdk) to enhance IDE completion and static analysis capabilities. Generated using [php-stubs/generator](https://github.com/php-stubs/generator) directly from the source code.

## 🚀 Features

- Complete function, class, and interface declarations
- Constant definitions for proper static analysis
- IDE autocompletion support
- PHPStan integration
- Regular updates with latest Freemius SDK versions

## 📋 Requirements

- PHP >= 7.1
- Composer for dependency management

## 📦 Installation

### Via Composer (Recommended)

```bash
# Install as a development dependency
composer require --dev mralaminahamed/freemius-stubs

# Or specify a version
composer require --dev mralaminahamed/freemius-stubs:^2.0
```

### Manual Installation

Download the stub files directly:
- [freemius-stubs.php](https://raw.githubusercontent.com/mralaminahamed/phpstan-freemius-stubs/main/freemius-stubs.php)
- [freemius-constants-stubs.php](https://raw.githubusercontent.com/mralaminahamed/phpstan-freemius-stubs/main/freemius-constants-stubs.php)

## 🔧 Configuration

### PHPStan Integration

Add the stubs to your `phpstan.neon` configuration:

```yaml
parameters:
    bootstrapFiles:
        - vendor/mralaminahamed/freemius-stubs/freemius-constants-stubs.stub
        - vendor/mralaminahamed/freemius-stubs/freemius-stubs.stub
```

### IDE Configuration

Most modern IDEs will automatically detect the stubs when installed via Composer. For manual installation, add the stub files to your IDE's include path.

#### PhpStorm
1. Go to `Settings` → `PHP` → `Include Path`
2. Add the directory containing the stub files

#### VS Code
Add to your `settings.json`:
```json
{
    "php.stubs": [
        "vendor/mralaminahamed/freemius-stubs/freemius-stubs.stub",
        "vendor/mralaminahamed/freemius-stubs/freemius-constants-stubs.stub"
    ]
}
```

## 🔍 Usage Example

```php
<?php

// Your code will now have full IDE support
$fs = Freemius::instance();

// Constants are properly defined
if (WP_FS__SDK_VERSION) {
    // Your implementation
}

// Interfaces and classes are available
class MyIntegration implements Freemius_Api_Interface {
    // Your implementation
}
```

## 🛠 Development

### Building Stubs

```bash
# Clone the repository
git clone https://github.com/mralaminahamed/phpstan-freemius-stubs.git
cd phpstan-freemius-stubs

# Install dependencies
composer install

# Generate stubs
composer generate

# Release new version
composer release
```

### Running Tests

```bash
# Run all checks
composer check

# Individual checks
composer cs      # Coding standards
composer analyze # Static analysis
composer test    # Unit tests
```

## 📚 Documentation

- [Freemius SDK Documentation](https://freemius.com/help/documentation/wordpress-sdk/)
- [PHPStan Documentation](https://phpstan.org/user-guide/getting-started)
- [PHP Stubs Generator Documentation](https://github.com/php-stubs/generator)

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) file for details.

## 🙏 Acknowledgments

- [Freemius](https://freemius.com) for the WordPress SDK
- [php-stubs/generator](https://github.com/php-stubs/generator) for the stub generation tools
- All [contributors](https://github.com/mralaminahamed/phpstan-freemius-stubs/graphs/contributors) to this project

## 💬 Support

For bug reports and feature requests, please use the [GitHub Issues](https://github.com/mralaminahamed/phpstan-freemius-stubs/issues).

For questions and discussions, please use the [GitHub Discussions](https://github.com/mralaminahamed/phpstan-freemius-stubs/discussions).

---
