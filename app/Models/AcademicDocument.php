<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AcademicDocument extends Model
{
    protected $fillable = ['name', 'file_path', 'file_extension', 'year'];

    /**
     * Cek apakah dokumen ini merupakan tautan eksternal (Google Drive / Docs / URL)
     */
    public function isExternal(): bool
    {
        return Str::startsWith($this->file_path, ['http://', 'https://']);
    }

    /**
     * Accessor untuk mendapatkan URL dokumen yang siap dibuka/diunduh
     */
    public function getUrlAttribute(): string
    {
        if ($this->isExternal()) {
            return $this->file_path;
        }

        return asset('storage/' . $this->file_path);
    }

    /**
     * Accessor untuk label format dokumen yang rapi
     */
    public function getFormatLabelAttribute(): string
    {
        $ext = strtolower($this->file_extension ?? 'gdrive');
        return match ($ext) {
            'pdf' => 'PDF',
            'doc', 'docx', 'word' => 'DOCX',
            'xls', 'xlsx', 'excel', 'sheet', 'sheets' => 'XLSX',
            'ppt', 'pptx', 'presentation', 'slides' => 'PPTX',
            'gdrive', 'docs', 'google_drive', 'drive' => 'Google Docs',
            default => strtoupper($ext),
        };
    }
}
