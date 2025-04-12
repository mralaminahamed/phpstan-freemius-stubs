# Contributing Guide

Thank you for your interest in contributing to the Freemius WordPress SDK Stubs! This document provides guidelines and instructions for contributing to this project.

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- Composer
- Git

### Setup

1. Fork the repository on GitHub
2. Clone your fork locally:
   ```bash
   git clone https://github.com/YOUR-USERNAME/phpstan-freemius-stubs.git
   cd phpstan-freemius-stubs
   ```
3. Install dependencies:
   ```bash
   composer install
   ```

## Development Workflow

### Generating Stubs

To generate new stubs based on the latest Freemius SDK:

```bash
composer generate
```

This command:
1. Downloads the latest Freemius SDK
2. Extracts the needed files
3. Generates the stub files

### Testing Your Changes

Before submitting a pull request, make sure to run the following checks:

```bash
# Run all checks at once
composer check

# Or run individual checks
composer cs      # Check coding standards
composer analyze # Run static analysis
composer test    # Run unit tests
```

### File Structure

Our project follows this structure:

```
phpstan-freemius-stubs/
├── bin/                               # Scripts for generating and releasing stubs
├── configs/                           # Configuration files for stub generation
├── docs/                              # Documentation
├── freemius-constants-stubs.stub      # Constants stub file
├── freemius-stubs.stub                # Main stubs file with classes and functions
├── freemius_versions.txt              # Tracks supported Freemius SDK versions
├── lib/                               # Helper libraries
├── phpstan.neon                       # PHPStan configuration
├── source/                            # Source for generating stubs
└── tests/                             # Test files
```

## Pull Request Process

1. Create a new branch for your changes
2. Make your changes and commit them with clear, descriptive commit messages
3. Push your branch to your fork
4. Submit a pull request to the main repository
5. Ensure your PR description clearly describes the problem and solution
6. Reference any relevant issues in your PR description

## Code Style

This project follows PSR-12 coding standards. Please make sure your code follows these standards by running:

```bash
composer cs
```

## Versioning

We use [SemVer](http://semver.org/) for versioning:
- MAJOR version for incompatible API changes
- MINOR version for new functionality in a backward-compatible manner
- PATCH version for backward-compatible bug fixes

## Release Process

Only maintainers can release new versions:

```bash
composer release
```

This command:
1. Generates new stubs
2. Validates them
3. Creates a new version tag
4. Updates version information

## Questions?

If you have any questions about contributing, please open an issue or discussion on the GitHub repository. 