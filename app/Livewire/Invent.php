<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

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

class Invent extends Component
{


    use WithPagination;

    public $perPage = 10;
    public $dir = '';
    public $resguardante = '';
    public $user = '';
    public $gpo = '';
    public $ni = '';
    public $articulo = '';
    public $marca = '';
    public $modelo = '';
    public $NS = '';
    public $nombres = '';
    public $apa = '';
    public $ama = '';
    public $ter = '';
    public $qrCache = [];


    public $filename = '';

    public function updatedName($value)
    {
        $this->filename = 'qr_' . preg_replace('/[^a-zA-Z0-9]/', '_', $value) . '.png';
    }


//    protected $paginationTheme = 'bootstrap'; // O 'tailwind', según uses

    protected $queryString = []; // Nada se pasa por URL

    public function updating($property)
    {
        if (in_array($property, [
            'dir', 'resguardante', 'user', 'gpo', 'ni',
            'articulo', 'marca', 'modelo', 'NS', 'nombres',
            'apa', 'ama', 'ter', 'perPage'
        ])) {
            $this->resetPage();
        }
    }

//----------------------------------------------------------------------------------------------------------------------
    public function mostrarQr($item)
    {
        $ni = preg_replace('/[^a-zA-Z0-9]/', '_', $item->ni);
        $filename = "qr_{$ni}.png";
        $path = public_path("qr/{$filename}");

        $wasJustRegenerated = isset($this->qrTimestamps[$item->ni]);

        // ⚠️ NO retornes base64 nunca más
        if (file_exists($path) && !$wasJustRegenerated) {
            return [
                'src' => asset("qr/{$filename}"),
                'from_file' => true,
            ];
        }

        // 🔁 Siempre guarda en disco, y retorna la URL
        return [
            'src' => $this->getQrCode($item),
            'from_file' => false,
        ];
    }


//----------------------------------------------------------------------------------------------------------------------
    protected $listeners = ['qrRegenerado' => 'regenerateQrTimestamp'];

//----------------------------------------------------------------------------------------------------------------------
    public function regenerateQrTimestamp($ni)
    {
        $this->qrTimestamps[$ni] = now()->timestamp;
    }

//----------------------------------------------------------------------------------------------------------------------
    public $qrTimestamps = [];

    public function regenerarQr($ni)
    {
        $item = Inv::where('ni', $ni)->first();

        if (!$item) return;

        $filename = 'qr_' . preg_replace('/[^a-zA-Z0-9]/', '_', $ni) . '.png';
        $path = public_path("qr/{$filename}");

        if (file_exists($path)) {
            unlink($path); // eliminar QR viejo
        }

        $this->getQrCode($item);

        // 🟢 marcar este QR como recién generado
        $this->qrTimestamps[$ni] = now()->timestamp;
    }

//----------------------------------------------------------------------------------------------------------------------
    public $data;

    public function getQrCode($data)
    {
        if (empty($data)) {
            return null;
        }

        $datos = is_array($data) || is_object($data) ? json_encode($data) : (string)$data;
        $decoded = json_decode($datos, true);
        $name = $decoded['ni'] ?? 'SinNombre';

        $qrText = 'ID: ' . ($decoded['id'] ?? '') . "\n";
        $qrText .= 'Dir: ' . ($decoded['dir'] ?? '') . "\n";
        $qrText .= 'Resguardante: ' . ($decoded['resguardante'] ?? '') . "\n";
        $qrText .= 'NI: ' . ($decoded['ni'] ?? '') . "\n";
        $qrText .= 'Artículo: ' . ($decoded['articulo'] ?? '') . "\n";
        $qrText .= 'Marca: ' . ($decoded['marca'] ?? '') . "\n";
        $qrText .= 'Modelo: ' . ($decoded['modelo'] ?? '') . "\n";
        $qrText .= 'NS: ' . ($decoded['NS'] ?? '') . "\n";
        $qrText .= 'By L.I. Victor Román Ortiz Abreu, MDIS & MCCC';

        try {
            $qrCode = new QrCode(
                data: $qrText,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 20,
                roundBlockSizeMode: RoundBlockSizeMode::None,
                foregroundColor: new Color(0, 0, 255),
                backgroundColor: new Color(255, 255, 255)
            );

            // 🔳 LOGO con fondo blanco
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

            // 🏷️ LABEL con texto
            $label = new Label($name, textColor: new Color(255, 30, 30));
            $writer = new PngWriter();
            $result = $writer->write($qrCode, $logo, $label);

            // 🗂️ Guardar imagen en disco (public/qr)
            $filename = 'qr_' . preg_replace('/[^a-zA-Z0-9]/', '_', $name) . '.png';
            $fullPath = public_path('qr/' . $filename);

            if (!file_exists(public_path('qr'))) {
                mkdir(public_path('qr'), 0755, true);
            }

            file_put_contents($fullPath, $result->getString());

            // ✅ Retornar URL pública del QR
            return asset('qr/' . $filename);

        } catch (\Exception $e) {
            \Log::error('Error generando QR: ' . $e->getMessage());
            return null;
        }
    }


//----------------------------------------------------------------------------------------------------------------------
//    public $data;

//    public function getQrCode($data)
//    {
//        if (empty($data)) {
//            return null;
//        }
//
//        $tmpDatos = '';
//        $datos = is_array($data) || is_object($data) ? json_encode($data) : (string)$data;
//        $decodedDatos = json_decode($datos, true);
//        $name = $decodedDatos['ni'] ?? 'SinNombre';
//
//        $tmpDatos = 'ID: ' . ($decodedDatos['id'] ?? '') . "\n";
//        $tmpDatos .= 'Dir: ' . ($decodedDatos['dir'] ?? '') . "\n";
//        $tmpDatos .= 'Resguardante: ' . ($decodedDatos['resguardante'] ?? '') . "\n";
//        $tmpDatos .= 'NI: ' . ($decodedDatos['ni'] ?? '') . "\n";
//        $tmpDatos .= 'Artículo: ' . ($decodedDatos['articulo'] ?? '') . "\n";
//        $tmpDatos .= 'Marca: ' . ($decodedDatos['marca'] ?? '') . "\n";
//        $tmpDatos .= 'Modelo: ' . ($decodedDatos['modelo'] ?? '') . "\n";
//        $tmpDatos .= 'NS: ' . ($decodedDatos['NS'] ?? '') . "\n";
//        $tmpDatos .= 'By L.I. Victor Román Ortiz Abreu, MDIS & MCCC ';
//
//        try {
//            $qrCode = new QrCode(
//                data: $tmpDatos,
//                encoding: new Encoding('UTF-8'),
//                errorCorrectionLevel: ErrorCorrectionLevel::High,
//                size: 300,
//                margin: 20,
//                roundBlockSizeMode: RoundBlockSizeMode::None,
//                foregroundColor: new Color(0, 0, 255),
//                backgroundColor: new Color(255, 255, 255)
//            );
//
//            // Logo opcional
//            $logo = null;
//            $logoPath = public_path('favicon.png');
//            if (file_exists($logoPath)) {
//                $logoImage = imagecreatefrompng($logoPath);
//                $width = imagesx($logoImage);
//                $height = imagesy($logoImage);
//                $background = imagecreatetruecolor($width, $height);
//                $white = imagecolorallocate($background, 255, 255, 255);
//                imagefilledrectangle($background, 0, 0, $width, $height, $white);
//                imagecopy($background, $logoImage, 0, 0, 0, 0, $width, $height);
//
//                $tempLogoPath = storage_path('app/temp_logo_with_bg.png');
//                imagepng($background, $tempLogoPath);
//                imagedestroy($logoImage);
//                imagedestroy($background);
//                $logo = new Logo($tempLogoPath, 75);
//            }
//
//            $label = new Label($name, textColor: new Color(255, 30, 30));
//            $writer = new PngWriter();
//            $result = $writer->write($qrCode, $logo, $label);
//
//            // ✅ Guardar en /public/qr
//            $qrPath = public_path('qr');
//            if (!file_exists($qrPath)) {
//                mkdir($qrPath, 0755, true);
//            }
//
//            $filename = 'qr_' . preg_replace('/[^a-zA-Z0-9]/', '_', $name) . '.png';
//            $fullPath = $qrPath . '/' . $filename;
//            file_put_contents($fullPath, $result->getString());
//
//            \Log::info("QR generado en: $fullPath");
//
//            // ✅ Mostrar el base64 también
//            return 'data:image/png;base64,' . base64_encode($result->getString());
//
//        } catch (\Exception $e) {
//            \Log::error('Error generando QR: ' . $e->getMessage());
//            return 'ERROR: ' . $e->getMessage();
//        }
//    }
//----------------------------------------------------------------------------------------------------------------------

//    public function getQrCode($data)
//    {
//        if (empty($data)) {
//            return null;
//        }
//        $tmpDatos = '';
//        // Convertimos `$data` en string
//        $datos = is_array($data) || is_object($data) ? json_encode($data) : (string)$data;
//        $decodedDatos = json_decode($datos, true); // true => convierte en array asociativo
//        $name = $decodedDatos['ni'] ?? 'Sin nombre'; // Usa un valor por defecto si 'nombre' no existe
//        $tmpDatos = 'ID: ' . ($decodedDatos['id'] ?? '') . "\n";
//        $tmpDatos .= 'Dir: ' . ($decodedDatos['dir'] ?? '') . "\n";
//        $tmpDatos .= 'Resguardante: ' . ($decodedDatos['resguardante'] ?? '') . "\n";
//        $tmpDatos .= 'NI: ' . ($decodedDatos['ni'] ?? '') . "\n";
//        $tmpDatos .= 'Artículo: ' . ($decodedDatos['articulo'] ?? '') . "\n";
//        $tmpDatos .= 'Marca: ' . ($decodedDatos['marca'] ?? '') . "\n";
//        $tmpDatos .= 'Modelo: ' . ($decodedDatos['modelo'] ?? '') . "\n";
//        $tmpDatos .= 'NS: ' . ($decodedDatos['NS'] ?? '') . "\n";
//        $tmpDatos .= 'By L.I. Victor Román Ortiz Abreu, MDIS & MCCC ';
////        dd($tmpDatos);
//
//        try {
//            // Crear el código QR con setters (compatible con `6.0.3`)
//            $qrCode = new QrCode(
//                data: $tmpDatos,
//                encoding: new Encoding('UTF-8'),
//                errorCorrectionLevel: ErrorCorrectionLevel::High,
//                size: 300,
//                margin: 20,
//                roundBlockSizeMode: RoundBlockSizeMode::None,  //Que se vean todos "bonitos" y centrados	Margin,
//                //Que ocupen todo el espacio (aunque deformen un poco)	Enlarge,   Uniformidad entre muchos QRs, aunque queden con bordes extra	None
//                foregroundColor: new Color(0, 0, 255),
//                backgroundColor: new Color(255, 255, 255)
//            );
//            // Agregar un logo opcional (verifica que la ruta sea correcta)
//
//
//            $logoPath = public_path('favicon.png');
//            if (file_exists($logoPath)) {
//                $logoImage = imagecreatefrompng($logoPath);
//
//                // Crear un fondo blanco
//                $width = imagesx($logoImage);
//                $height = imagesy($logoImage);
//                $background = imagecreatetruecolor($width, $height);
//                $white = imagecolorallocate($background, 255, 255, 255);
//                imagefilledrectangle($background, 0, 0, $width, $height, $white);
//                // Pegar el logo encima del fondo blanco
//                imagecopy($background, $logoImage, 0, 0, 0, 0, $width, $height);
//
//                // Guardar como imagen temporal con fondo blanco
//                $tempLogoPath = storage_path('app/temp_logo_with_bg.png');
//                imagepng($background, $tempLogoPath);
//                imagedestroy($logoImage);
//                imagedestroy($background);
//                // Ahora sí, usarlo en el QR
//                $logo = new Logo($tempLogoPath, 75);
//            } else {
//                $logo = null;
//            }
//
//
////            $logoPath = public_path('favicon.png'); // Ajusta la ruta según tu Laravel
////            if (file_exists($logoPath)) {
////                $logo = new Logo($logoPath, 100);
////            } else {
////                $logo = null;
////            }
//
////            ------------------------------------------------------------------------------------------------------------
//            // Crear etiqueta
//            $label = new Label($name,
//                textColor: new Color(30, 30, 30));
//            // Generar la imagen en formato PNG
//            $writer = new PngWriter();
//            $result = $writer->write($qrCode, $logo, $label);
//            return 'data:image/png;base64,' . base64_encode($result->getString());
//        } catch (\Exception $e) {
//            return 'Error al generar QR: ' . $e->getMessage();
//        }
//    }
//
//----------------------------------------------------------------------------------------------------------------------
    public function render()
    {
        $query = Inv::query();

        foreach ([
                     'dir', 'resguardante', 'user', 'gpo', 'ni',
                     'articulo', 'marca', 'modelo', 'NS', 'nombres',
                     'apa', 'ama', 'ter'
                 ] as $field) {
            if ($this->$field !== '') {
                $query->where($field, 'like', '%' . $this->$field . '%');
            }
        }

        $inventario = $query->paginate($this->perPage);

        return view('livewire.invent', compact('inventario'));
    }

//----------------------------------------------------------------------------------------------------------------------

}
