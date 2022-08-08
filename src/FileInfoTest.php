<?php declare(strict_types = 1);

namespace BrandEmbassy\FileTypeDetector;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use ZipArchive;
use function array_map;
use function assert;
use function fclose;
use function file_get_contents;
use function fopen;
use function fwrite;
use function implode;
use function is_resource;
use function rewind;
use function sprintf;
use function stream_get_meta_data;
use function sys_get_temp_dir;
use function tempnam;

class FileInfoTest extends TestCase
{
    /**
     * @dataProvider extensionDataProvider()
     */
    public function testFileInfoHasFileType(Extension $extension): void {
        $fileInfo = new FileInfo($extension, true);

        Assert::assertNotNull(
            $fileInfo->getFileType(),
            sprintf('Extension "%s" has no file type.', $extension->getValue())
        );
    }

    /**
     * @dataProvider extensionDataProvider()
     */
    public function testFileInfoHasMimeType(Extension $extension): void {
        $fileInfo = new FileInfo($extension, true);

        Assert::assertNotNull(
            $fileInfo->getMimeType(),
            sprintf('Extension "%s" has no mime type.', $extension->getValue())
        );
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
