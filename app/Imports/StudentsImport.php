<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentsImport
{
    public $errors = [];
    public $imported = 0;
    public $skipped = 0;

    /**
     * Importar archivo Excel/CSV
     * @param string $filePath
     * @return array
     */
    public function import($filePath)
    {
        $this->errors = [];
        $this->imported = 0;
        $this->skipped = 0;

        try {
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            if ($extension === 'csv') {
                $data = $this->readCSV($filePath);
            } else {
                // Para .xls o .xlsx
                $data = $this->readExcel($filePath);
            }

            if (empty($data)) {
                $this->errors[] = 'El archivo está vacío o no tiene datos válidos';
                return ['success' => false, 'errors' => $this->errors];
            }

            // Procesar cada fila
            foreach ($data as $index => $row) {
                $rowNumber = $index + 2; // +2 porque índice empieza en 0 y primera fila es encabezado

                try {
                    $result = $this->processRow($row, $rowNumber);
                    if ($result === 'imported') {
                        $this->imported++;
                    } elseif ($result === 'skipped') {
                        $this->skipped++;
                    }
                } catch (\Exception $e) {
                    $this->errors[] = "Fila {$rowNumber}: " . $e->getMessage();
                }
            }

            return [
                'success' => true,
                'imported' => $this->imported,
                'skipped' => $this->skipped,
                'errors' => $this->errors
            ];

        } catch (\Exception $e) {
            $this->errors[] = 'Error al procesar archivo: ' . $e->getMessage();
            return ['success' => false, 'errors' => $this->errors];
        }
    }

    /**
     * Procesar una fila del archivo
     */
    private function processRow($row, $rowNumber)
    {
        // Solo requiere los campos 'name' y 'email'
        $name = trim($row['name'] ?? $row['nombre'] ?? '');
        $email = trim($row['email'] ?? $row['correo'] ?? '');

        if (!$name) {
            $this->errors[] = "Fila {$rowNumber}: El nombre es obligatorio";
            return 'skipped';
        }

        if (!$email) {
            $this->errors[] = "Fila {$rowNumber}: El email es obligatorio";
            return 'skipped';
        }

        // Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Fila {$rowNumber}: El email '{$email}' no es válido";
            return 'skipped';
        }

        // Validar que no exista usuario con mismo email
        if (User::where('email', $email)->exists()) {
            $this->errors[] = "Fila {$rowNumber}: Ya existe un usuario con el email '{$email}'";
            return 'skipped';
        }

        // Crear estudiante con valores por defecto
        User::create([
            'name' => $name,
            'email' => $email,
            'phone' => '',                          // Vacío por defecto
            'password' => Hash::make('Student@123'), // Contraseña por defecto
            'status' => 'enable',                   // Habilitado por defecto
            'email_verified_at' => now(),           // Verificado automáticamente
            'school_id' => null,                    // Sin colegio por defecto
        ]);

        return 'imported';
    }

    /**
     * Leer archivo CSV
     */
    private function readCSV($filePath)
    {
        $data = [];
        $headers = [];

        if (($handle = fopen($filePath, 'r')) !== false) {
            // Leer encabezados
            $headers = fgetcsv($handle, 1000, ',');
            if (!$headers) {
                fclose($handle);
                return [];
            }

            // Leer datos
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $rowData = [];
                foreach ($headers as $index => $header) {
                    $rowData[strtolower(trim($header))] = $row[$index] ?? '';
                }
                $data[] = $rowData;
            }
            fclose($handle);
        }

        return $data;
    }

    /**
     * Leer archivo Excel (simple XML parsing)
     */
    private function readExcel($filePath)
    {
        // Intentar leer como XML (formato .xls simple)
        $content = file_get_contents($filePath);

        if (strpos($content, '<?xml') === 0) {
            return $this->parseXMLExcel($content);
        }

        // Si no es XML, intentar convertir a CSV temporalmente
        return $this->convertExcelToArray($filePath);
    }

    /**
     * Parsear Excel en formato XML
     */
    private function parseXMLExcel($content)
    {
        $data = [];

        try {
            $xml = simplexml_load_string($content);
            if (!$xml) return [];

            $xml->registerXPathNamespace('ss', 'urn:schemas-microsoft-com:office:spreadsheet');
            $rows = $xml->xpath('//ss:Row');

            if (empty($rows)) return [];

            // Primera fila = encabezados
            $headers = [];
            $headerCells = $rows[0]->xpath('.//ss:Data');
            foreach ($headerCells as $cell) {
                $headers[] = strtolower(trim((string)$cell));
            }

            // Resto de filas = datos
            for ($i = 1; $i < count($rows); $i++) {
                $cells = $rows[$i]->xpath('.//ss:Data');
                $rowData = [];

                foreach ($headers as $index => $header) {
                    $rowData[$header] = isset($cells[$index]) ? trim((string)$cells[$index]) : '';
                }

                $data[] = $rowData;
            }

        } catch (\Exception $e) {
            // Si falla el parseo XML, retornar vacío
            return [];
        }

        return $data;
    }

    /**
     * Convertir Excel a array (fallback para .xlsx)
     */
    private function convertExcelToArray($filePath)
    {
        // Intentar leer .xlsx sin ZipArchive usando función nativa
        if (class_exists('ZipArchive')) {
            return $this->readXLSX($filePath);
        }

        // Si no hay ZipArchive, intentar leer como texto plano
        $content = file_get_contents($filePath);
        $data = [];

        // Buscar strings en el archivo binario
        if (preg_match_all('/<t[^>]*>([^<]+)<\/t>/', $content, $matches)) {
            $strings = $matches[1];

            // Verificar que tenga los headers esperados
            if (count($strings) >= 2 &&
                (strtolower(trim($strings[0])) === 'name' || strtolower(trim($strings[0])) === 'nombre')) {

                // Procesar pares de nombre-email
                for ($i = 1; $i < count($strings); $i += 2) {
                    if (isset($strings[$i]) && isset($strings[$i + 1])) {
                        $data[] = [
                            'name' => trim($strings[$i]),
                            'email' => trim($strings[$i + 1])
                        ];
                    }
                }
            }
        }

        if (!empty($data)) {
            return $data;
        }

        throw new \Exception('No se pudo leer el archivo. Por favor, usa formato .xls (Excel 97-2003) o .csv');
    }

    /**
     * Leer archivo .xlsx usando ZipArchive
     */
    private function readXLSX($filePath)
    {
        $zip = new \ZipArchive();

        if ($zip->open($filePath) !== true) {
            throw new \Exception('No se pudo abrir el archivo .xlsx');
        }

        // Leer sharedStrings.xml
        $sharedStringsXML = $zip->getFromName('xl/sharedStrings.xml');
        $sharedStrings = [];

        if ($sharedStringsXML) {
            $xml = simplexml_load_string($sharedStringsXML);
            if ($xml) {
                foreach ($xml->si as $si) {
                    $sharedStrings[] = (string)$si->t;
                }
            }
        }

        // Leer sheet1.xml
        $sheetXML = $zip->getFromName('xl/worksheets/sheet1.xml');
        $zip->close();

        if (!$sheetXML) {
            throw new \Exception('No se encontró la hoja de datos en el archivo .xlsx');
        }

        $xml = simplexml_load_string($sheetXML);
        if (!$xml) {
            throw new \Exception('Error al parsear el archivo .xlsx');
        }

        $data = [];
        $headers = [];
        $rowIndex = 0;

        foreach ($xml->sheetData->row as $row) {
            $rowData = [];
            $colIndex = 0;

            foreach ($row->c as $cell) {
                $value = '';

                // Si es string compartido
                if (isset($cell['t']) && (string)$cell['t'] === 's') {
                    $stringIndex = (int)$cell->v;
                    $value = isset($sharedStrings[$stringIndex]) ? $sharedStrings[$stringIndex] : '';
                } else {
                    $value = (string)$cell->v;
                }

                if ($rowIndex === 0) {
                    $headers[$colIndex] = strtolower(trim($value));
                } else {
                    $rowData[$headers[$colIndex]] = trim($value);
                }

                $colIndex++;
            }

            if ($rowIndex > 0 && !empty($rowData)) {
                $data[] = $rowData;
            }

            $rowIndex++;
        }

        return $data;
    }
}
