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
    private $extension;

    /**
     * @var FileType
     */
    private $fileType;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var bool
     */
    private $isCreatedFromFileName;


    public function __construct(Extension $extension, bool $isCreatedFromFileName)
    {
        $this->extension = $extension;
        $this->fileType = FileType::findByExtension($extension);
        $this->mimeType = $extension->findMimeType();
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
