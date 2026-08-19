<?php

declare(strict_types=1);

namespace FreemiusStubs\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Smoke checks over the generated stubs.
 *
 * A stubs package fails quietly: a regeneration truncates the output, or produces a file that no
 * longer parses, and nothing here looks wrong until a consumer's static analysis reports symbols
 * that should exist. These assert the two properties a generated file must hold whatever it
 * contains -- it parses, and it actually declares something.
 */
final class StubsTest extends TestCase
{
    private const ROOT = __DIR__ . '/..';

    /**
     * Every generated stub file in the repository root.
     *
     * Discovered rather than listed, so a repository that grows a second stub file gets it covered
     * without anyone remembering to add it here.
     *
     * @return array<string, array{0: string}>
     */
    public function stubFileProvider(): array
    {
        $cases = [];

        foreach ((array) glob(self::ROOT . '/*.stub') as $path) {
            $cases[basename((string) $path)] = [basename((string) $path)];
        }

        return $cases;
    }

    public function testTheRepositoryShipsAtLeastOneStubFile(): void
    {
        $this->assertNotEmpty($this->stubFileProvider(), 'no .stub files found -- generation produced nothing');
    }

    /**
     * @dataProvider stubFileProvider
     */
    public function testTheStubFileIsValidPhp(string $file): void
    {
        $path = self::ROOT . '/' . $file;

        $this->assertFileExists($path);

        // TOKEN_PARSE makes the tokenizer raise ParseError on invalid source rather than returning a
        // best-effort token list, which is what makes this an actual syntax check.
        token_get_all((string) file_get_contents($path), TOKEN_PARSE);

        $this->addToAssertionCount(1);
    }

    /**
     * @dataProvider stubFileProvider
     */
    public function testTheStubFileDeclaresSomething(string $file): void
    {
        $source = (string) file_get_contents(self::ROOT . '/' . $file);

        // A generated file that parses but contains only its header is the shape a truncated or
        // failed generation takes -- valid PHP, and useless.
        foreach (['function ', 'class ', 'interface ', 'trait ', 'define(', 'const '] as $needle) {
            if (stripos($source, $needle) !== false) {
                $this->addToAssertionCount(1);

                return;
            }
        }

        $this->fail($file . ' parses but declares nothing -- a truncated or empty generation');
    }
}
