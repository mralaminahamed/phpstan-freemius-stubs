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

- PHP >= 7.4
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
- [freemius-stubs.stub](https://raw.githubusercontent.com/mralaminahamed/phpstan-freemius-stubs/main/freemius-stubs.stub)
- [freemius-constants-stubs.stub](https://raw.githubusercontent.com/mralaminahamed/phpstan-freemius-stubs/main/freemius-constants-stubs.stub)

## 🔧 Basic Configuration

To use these stubs with PHPStan or your IDE, see our [Usage Guide](./docs/usage.md) for detailed instructions.

## 🔍 Quick Usage Example

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

For advanced usage examples, see the [Usage Guide](./docs/usage.md).

## 📁 Package Structure

```
phpstan-freemius-stubs/
├── bin/                               # Scripts for generating and releasing stubs
├── configs/                           # Configuration files for stub generation
├── docs/                              # Detailed documentation
│   ├── usage.md                       # Usage guide
│   └── contributing.md                # Contribution guidelines
├── freemius-constants-stubs.stub      # Constants stub file
├── freemius-stubs.stub                # Main stubs file with classes and functions
├── freemius_versions.txt              # Tracks supported Freemius SDK versions
├── lib/                               # Helper libraries
├── phpstan.neon                       # PHPStan configuration
├── source/                            # Source for generating stubs
└── tests/                             # Test files
    ├── bootstrap.php                  # Test bootstrap
    ├── ConstantsTest.php              # Constants tests
    └── FreemiusTest.php               # Freemius tests
```

## 🛠 Development

For information on building stubs, running tests, and contributing to the project, please see our [Contributing Guide](./docs/contributing.md).

## 📚 Documentation

For more detailed information, check out our documentation:

- [Usage Guide](./docs/usage.md)
- [Contributing Guide](./docs/contributing.md)
- [Freemius SDK Documentation](https://freemius.com/help/documentation/wordpress-sdk/)
- [PHPStan Documentation](https://phpstan.org/user-guide/getting-started)
- [PHP Stubs Generator Documentation](https://github.com/php-stubs/generator)

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
