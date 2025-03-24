<?php

namespace App\Livewire;

use Livewire\Component;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf;  //esta libreria es para generar el reporte con doom pdf

use App\Models\Inv;

class QrList extends Component
{
    public $items = [];
    public $indexActual = 0;
    public $progreso = 0;
    public $total = 0;
    public $ultimoProgreso = 0;
    public $listo = false;

    public function mount()
    {
        $this->items = Inv::all();
        $this->total = $this->items->count();
    }

    public function procesarPaso()
    {
        if ($this->indexActual < $this->total) {
            $item = $this->items[$this->indexActual];

            // Procesar (si querés)
            // $this->getQrCode($item);

            $this->indexActual++;

            $nuevoProgreso = intval(($this->indexActual / $this->total) * 100);

            if (
                $nuevoProgreso >= $this->ultimoProgreso + 8 ||
                $this->ultimoProgreso === 0
            ) {
                $this->progreso = $nuevoProgreso;
                $this->ultimoProgreso = $nuevoProgreso;
            }
        }

        // ✅ Forzar 100% al final
        if ($this->indexActual >= $this->total) {
            $this->progreso = 100;
            $this->listo = true;
        }
    }


//if (this->progreso === 100) {
//return redirect()->route('dashboard');
//}

//return redirect()->route('dashboard');
//    -----------------------------------------------------------------------------------------------------------------------
    public function regenerarQr($ni)
    {
        $item = Inv::where('ni', $ni)->first();

        if (!$item) {
            \Log::warning("No se encontró el item con ni: $ni");
            return;
        }

        // Borra el archivo viejo si existe
        $filename = 'qr_' . preg_replace('/[^a-zA-Z0-9]/', '_', $ni) . '.png';
        $path = public_path("qr/{$filename}");

        if (file_exists($path)) {
            unlink($path);
        }

        // Fuerza la regeneración del QR
        $this->getQrCode($item);
    }

//    -----------------------------------------------------------------------------------------------------------------------

    public $data;

    public function getQrCode($data)
    {
        if (empty($data)) {
            return null;
        }

        $tmpDatos = '';
        $datos = is_array($data) || is_object($data) ? json_encode($data) : (string)$data;
        $decodedDatos = json_decode($datos, true);
        $name = $decodedDatos['ni'] ?? 'SinNombre';

        $tmpDatos = 'ID: ' . ($decodedDatos['id'] ?? '') . "\n";
        $tmpDatos .= 'Dir: ' . ($decodedDatos['dir'] ?? '') . "\n";
        $tmpDatos .= 'Resguardante: ' . ($decodedDatos['resguardante'] ?? '') . "\n";
        $tmpDatos .= 'NI: ' . ($decodedDatos['ni'] ?? '') . "\n";
        $tmpDatos .= 'Artículo: ' . ($decodedDatos['articulo'] ?? '') . "\n";
        $tmpDatos .= 'Marca: ' . ($decodedDatos['marca'] ?? '') . "\n";
        $tmpDatos .= 'Modelo: ' . ($decodedDatos['modelo'] ?? '') . "\n";
        $tmpDatos .= 'NS: ' . ($decodedDatos['NS'] ?? '') . "\n";
        $tmpDatos .= 'By L.I. Victor Román Ortiz Abreu, MDIS & MCCC ';

        try {
            $qrCode = new QrCode(
                data: $tmpDatos,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 20,
                roundBlockSizeMode: RoundBlockSizeMode::None,
                foregroundColor: new Color(0, 0, 255),
                backgroundColor: new Color(255, 255, 255)
            );

            // Logo opcional
            $logo = null;
            $logoPath = public_path('favicon.png');
            if (file_exists($logoPath)) {
                $logoImage = imagecreatefrompng($logoPath);
                $width = imagesx($logoImage);
                $height = imagesy($logoImage);
                $background = imagecreatetruecolor($width, $height);
                $white = imagecolorallocate($background, 255, 255, 255);
                imagefilledrectangle($background, 0, 0, $width, $height, $white);
                imagecopy($background, $logoImage, 0, 0, 0, 0, $width, $height);

                $tempLogoPath = storage_path('app/temp_logo_with_bg.png');
                imagepng($background, $tempLogoPath);
                imagedestroy($logoImage);
                imagedestroy($background);
                $logo = new Logo($tempLogoPath, 75);
            }

            $label = new Label($name, textColor: new Color(255, 30, 30));
            $writer = new PngWriter();
            $result = $writer->write($qrCode, $logo, $label);

            // ✅ Guardar en /public/qr
            $qrPath = public_path('qr');
            if (!file_exists($qrPath)) {
                mkdir($qrPath, 0755, true);
            }

            $filename = 'qr_' . preg_replace('/[^a-zA-Z0-9]/', '_', $name) . '.png';
            $fullPath = $qrPath . '/' . $filename;
            file_put_contents($fullPath, $result->getString());

            \Log::info("QR generado en: $fullPath");

            // ✅ Mostrar el base64 también
            return 'data:image/png;base64,' . base64_encode($result->getString());

        } catch (\Exception $e) {
            \Log::error('Error generando QR: ' . $e->getMessage());
            return 'ERROR: ' . $e->getMessage();
        }
    }

//    -----------------------------------------------------------------------------------------------------------------------

    public function render()
    {
        if ($this->listo) {
            return redirect()->route('dashboard');
        }

        return view('livewire.qr-list');
    }
}
