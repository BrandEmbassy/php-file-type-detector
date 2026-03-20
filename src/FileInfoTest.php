<?php declare(strict_types = 1);

namespace BrandEmbassy\FileTypeDetector;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FileInfoTest extends TestCase
{
    /**
     * @dataProvider extensionDataProvider()
     */
    public function testFileInfoAlwaysHasAllAttributes(Extension $extension, bool $isCreatedFromFileName): void
    {
        $fileInfo = new FileInfo($extension, $isCreatedFromFileName);

        Assert::assertInstanceOf(Extension::class, $fileInfo->getExtension());
        Assert::assertInstanceOf(FileType::class, $fileInfo->getFileType());
        Assert::assertNotEmpty($fileInfo->getMimeType());
        Assert::assertSame($isCreatedFromFileName, $fileInfo->isCreatedFromFileName());
    }


    /**
     * @return iterable<array<Extension|bool>>
     */
    public function extensionDataProvider(): iterable
    {
        foreach (Extension::getValues() as $value) {
            yield [Extension::get($value), true];
            yield [Extension::get($value), false];
        }
    }
}
