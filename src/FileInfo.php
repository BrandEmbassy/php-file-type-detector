<?php declare(strict_types = 1);

namespace BrandEmbassy\FileTypeDetector;

/**
 * @final
 */
class FileInfo
{
    /**
     * @var Extension
     */
    private Extension $extension;

    /**
     * @var FileType
     */
    private FileType $fileType;

    /**
     * @var string
     */
    private string $mimeType;

    /**
     * @var bool
     */
    private bool $isCreatedFromFileName;


    public function __construct(Extension $extension, bool $isCreatedFromFileName)
    {
        $this->extension = $extension;
        $this->fileType = FileType::getByExtension($extension);
        $this->mimeType = $extension->getMimeType();
        $this->isCreatedFromFileName = $isCreatedFromFileName;
    }


    public function getExtension(): Extension
    {
        return $this->extension;
    }


    public function getFileType(): FileType
    {
        return $this->fileType;
    }


    public function getMimeType(): string
    {
        return $this->mimeType;
    }


    public function isCreatedFromFileName(): bool
    {
        return $this->isCreatedFromFileName;
    }
}
