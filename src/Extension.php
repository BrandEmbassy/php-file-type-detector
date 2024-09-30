<?php declare(strict_types = 1);

namespace BrandEmbassy\FileTypeDetector;

use InvalidArgumentException;
use LogicException;
use MabeEnum\Enum;
use function sprintf;
use function trigger_error;
use const E_USER_DEPRECATED;

/**
 * @method string getValue()
 *
 * @final
 */
class Extension extends Enum
{
    public const JPEG = 'jpeg';
    public const BMP = 'bmp';
    public const GIF = 'gif';
    public const PNG = 'png';
    public const TIFF = 'tiff';
    public const PSD = 'psd';
    public const ICO = 'ico';
    public const SVG = 'svg';
    public const CAF = 'caf';
    public const PEM = 'pem';
    public const ARJ = 'arj';
    public const BZIP2 = 'bzip2';
    public const GZIP = 'gzip';
    public const LZMA2 = 'lzma2';
    public const _7ZIP = '7z';
    public const CAB = 'cab';
    public const JAR = 'jar';
    public const RAR = 'rar';
    public const TAR = 'tar';
    public const ZIP = 'zip';
    public const ARC = 'arc';
    public const DAR = 'dar';
    public const ISO = 'iso';
    public const NRG = 'nrg';
    public const VHD = 'vhd';
    public const ACCDB = 'accdb';
    public const MDB = 'mdb';
    public const ODB = 'odb';
    public const SQLITE = 'sqlite';
    public const DOC = 'doc';
    public const DOCX = 'docx';
    public const HTML = 'html';
    public const ODT = 'odt';
    public const PDF = 'pdf';
    public const RTF = 'rtf';
    public const TXT = 'txt';
    public const XML = 'xml';
    public const MARKDOWN = 'markdown';
    public const JSON = 'json';
    public const YAML = 'yaml';
    public const ATOM = 'atom';
    public const RSS = 'rss';
    public const OTF = 'otf';
    public const TTF = 'ttf';
    public const APK = 'apk';
    public const COM = 'com';
    public const EXE = 'exe';
    public const XAP = 'xap';
    public const PPT = 'ppt';
    public const PPTX = 'pptx';
    public const ODP = 'odp';
    public const FLAC = 'flac';
    public const WMA = 'wma';
    public const AMR = 'amr';
    public const MP3 = 'mp3';
    public const AAC = 'aac';
    public const M3U = 'm3u';
    public const OGG = 'ogg';
    public const WAV = 'wav';
    public const MIDI = 'midi';
    public const M4A = 'm4a';
    public const ODS = 'ods';
    public const XLS = 'xls';
    public const XLSX = 'xlsx';
    public const CSV = 'csv';
    public const TSV = 'tsv';
    public const _3GP = '3gp';
    public const ASF = 'asf';
    public const AVI = 'avi';
    public const FLV = 'flv';
    public const M4V = 'm4v';
    public const MKV = 'mkv';
    public const MOV = 'mov';
    public const MPEG = 'mpeg';
    public const MP4 = 'mp4';
    public const SWF = 'swf';
    public const VOB = 'vob';
    public const VCF = 'vcf';
    public const WMV = 'wmv';
    public const WEBM = 'webm';
    public const WEBP = 'webp';
    public const REG = 'reg';
    public const PKPASS = 'pkpass';

    /**
     * @var string[]
     */
    private static $aliases = [
        'jpg' => self::JPEG,
        'tif' => self::TIFF,
        'mpg' => self::MPEG,
        'mpe' => self::MPEG,
        'm4a' => self::AAC,
        'yml' => self::YAML,
        'md' => self::MARKDOWN,
        'mid' => self::MIDI,
        'svg' => self::SVG,
        'pem' => self::PEM,
        'pkpass' => self::PKPASS,
    ];

    /**
     * @var string[]
     */
    public static $mimeTypes = [
        self::JPEG => 'image/jpeg',
        self::BMP => 'image/bmp',
        self::GIF => 'image/gif',
        self::PNG => 'image/png',
        self::TIFF => 'image/tiff',
        self::PSD => 'image/vnd.adobe.photoshop',
        self::ICO => 'image/x-icon',
        self::SVG => 'image/svg+xml',
        self::WEBP => 'image/webp',

        self::ARJ => 'application/arj',
        self::BZIP2 => 'application/x-bzip2',
        self::GZIP => 'application/gzip',
        self::_7ZIP => 'application/x-7z-compressed',
        self::LZMA2 => 'application/x-xz',
        self::CAB => 'application/vnd.ms-cab-compressed',
        self::JAR => 'application/java-archive',
        self::RAR => 'application/x-rar-compressed',
        self::TAR => 'application/x-tar',
        self::ZIP => 'application/zip',
        self::ARC => 'application/x-freearc',
        self::DAR => 'application/x-dar',

        self::ISO => 'application/x-iso9660-image',
        self::NRG => 'application/x-nrg',
        self::VHD => 'application/x-vhd',

        self::ACCDB => 'application/x-msaccess',
        self::MDB => 'application/x-msaccess',
        self::ODB => 'application/vnd.oasis.opendocument.database',
        self::SQLITE => 'application/x-sqlite3',

        self::DOC => 'application/msword',
        self::DOCX => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        self::HTML => 'text/html',
        self::ODT => 'application/vnd.oasis.opendocument.text',
        self::PDF => 'application/pdf',
        self::RTF => 'application/rtf',
        self::TXT => 'text/plain',
        self::MARKDOWN => 'text/markdown',
        self::YAML => 'text/yaml',
        self::JSON => 'application/json',
        self::XML => 'application/xml',

        self::ATOM => 'application/atom+xml',
        self::RSS => 'application/rss+xml',

        self::OTF => 'application/x-font-otf',
        self::TTF => 'application/x-font-ttf',

        self::APK => 'application/vnd.android.package-archive',
        self::COM => 'application/x-msdownload',
        self::EXE => 'application/x-msdownload',
        self::XAP => 'application/x-silverlight-app',

        self::PPT => 'application/vnd.ms-powerpoint',
        self::PPTX => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        self::ODP => 'application/vnd.oasis.opendocument.presentation',

        self::FLAC => 'audio/x-flac',
        self::WMA => 'audio/x-ms-wma',
        self::AMR => 'audio/amr',
        self::MP3 => 'audio/mpeg',
        self::AAC => 'audio/x-aac',
        self::M3U => 'audio/x-mpegurl',
        self::OGG => 'audio/ogg',
        self::WAV => 'audio/x-wav',
        self::MIDI => 'audio/midi',
        self::M4A => 'audio/x-m4a',
        self::CAF => 'audio/x-caf',

        self::ODS => 'application/vnd.oasis.opendocument.spreadsheet',
        self::XLS => 'application/vnd.ms-excel',
        self::XLSX => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        self::CSV => 'text/csv',
        self::TSV => 'text/tab-separated-values',

        self::_3GP => 'video/3gpp',
        self::ASF => 'application/vnd.ms-asf',
        self::AVI => 'video/x-msvideo',
        self::FLV => 'video/x-flv',
        self::M4V => 'video/x-m4v',
        self::MKV => 'video/x-matroska',
        self::MOV => 'video/quicktime',
        self::MPEG => 'video/mpeg',
        self::MP4 => 'video/mp4',
        self::SWF => 'application/x-shockwave-flash',
        self::VOB => 'video/x-ms-vob',
        self::WMV => 'video/x-ms-wmv',
        self::WEBM => 'video/webm',

        self::REG => 'text/plain',
        self::VCF => 'text/x-vcard',

        self::PEM => 'application/x-x509-ca-cert',

        self::PKPASS => 'application/vnd.apple.pkpass',
    ];


    /**
     * @throws InvalidArgumentException
     */
    public static function getIncludingAliases(string $value): self
    {
        if (isset(self::$aliases[$value])) {
            return self::get(self::$aliases[$value]);
        }

        return self::get($value);
    }


    public function getMimeType(): string
    {
        if (!isset(self::$mimeTypes[$this->getValue()])) {
            throw new LogicException(sprintf('Mime type for extension "%s" does not exist.', $this->getValue()));
        }

        return self::$mimeTypes[$this->getValue()];
    }


    /**
     * @deprecated use getMimeType instead
     *
     * @see self::getMimeType()
     */
    public function findMimeType(): ?string
    {
        @trigger_error(sprintf('Method %s is deprecated.', __METHOD__), E_USER_DEPRECATED);

        return $this->getMimeType();
    }
}
