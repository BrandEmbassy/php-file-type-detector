<?php declare(strict_types = 1);

namespace BrandEmbassy\FileTypeDetector;

use PHPUnit\Framework\TestCase;

class FileInfoTest extends TestCase
{
    /**
     * @dataProvider extensionDataProvider()
     */
    public function testFileInfoHasFileType(Extension $extension): void
    {
        $fileInfo = new FileInfo($extension, true);

        $fileInfo->getFileType();

        $this->expectNotToPerformAssertions();
    }


    /**
     * @dataProvider extensionDataProvider()
     */
    public function testFileInfoHasMimeType(Extension $extension): void
    {
        $fileInfo = new FileInfo($extension, true);

        $fileInfo->getMimeType();

        $this->expectNotToPerformAssertions();
    }


    /**
     * @return Extension[][]
     */
    public function extensionDataProvider(): iterable
    {
        foreach (Extension::getValues() as $value) {
            yield [Extension::get($value)];
        }
    }
}
