<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class TableController extends Controller
{

 public function hoy()
    {
        $citas = [
            ['nombre' => 'Rafael', 'numero' => '001', 'fecha' => '2025-12-10', 'hora' => '9:00 AM', 'doctor' => 'Dr. Silva'],
            ['nombre' => 'Maria', 'numero' => '002', 'fecha' => '2025-12-10', 'hora' => '11:00 AM', 'doctor' => 'Dra. Luna'],
        ];

        return view('inicio', [
            'citas' => $citas,
            'dia' => 'hoy'
        ]);
    }

    public function manana()
    {
        $citas = [
            ['nombre' => 'Pedro', 'numero' => '010', 'fecha' => '2025-12-11', 'hora' => '10:00 AM', 'doctor' => 'Dr. Torres'],
            ['nombre' => 'Lucia', 'numero' => '011', 'fecha' => '2025-12-11', 'hora' => '1:00 PM', 'doctor' => 'Dra. Vega'],
        ];

        return view('inicio', [
            'citas' => $citas,
            'dia' => 'manana'
        ]);
    }

    public function pasado()
    {
        $citas = [
            ['nombre' => 'Jorge', 'numero' => '020', 'fecha' => '2025-12-12', 'hora' => '8:30 AM', 'doctor' => 'Dr. Solis'],
            ['nombre' => 'Ana', 'numero' => '021', 'fecha' => '2025-12-12', 'hora' => '2:00 PM', 'doctor' => 'Dra. Rivera'],
        ];

        return view('inicio', [
            'citas' => $citas,
            'dia' => 'pasado'
        ]);
    }

    public function verhoy()
{
    $citas = [
        ['nombre' => 'Luis Rojas', 'numero' => 'A-300', 'fecha' => '2025-12-09', 'hora' => '3:00 PM', 'doctor' => 'Dr. Gómez'],
        ['nombre' => 'Ana Torres', 'numero' => 'A-301', 'fecha' => '2025-12-09', 'hora' => '4:00 PM', 'doctor' => 'Dra. Suárez']
    ];

            return view('vercitas', [
            'citas' => $citas,
            'dia' => 'hoy'
        ]);
}

    public function vermanana()
{
    $citas = [
         ['nombre' => 'Pedro', 'numero' => '010', 'fecha' => '2025-12-11', 'hora' => '10:00 AM', 'doctor' => 'Dr. Torres'],
            ['nombre' => 'Lucia', 'numero' => '011', 'fecha' => '2025-12-11', 'hora' => '1:00 PM', 'doctor' => 'Dra. Vega'],
    ];

            return view('vercitas', [
            'citas' => $citas,
            'dia' => 'hoy'
        ]);
}


    public function verpasado()
{
    $citas = [
            ['nombre' => 'Jorge', 'numero' => '020', 'fecha' => '2025-12-12', 'hora' => '8:30 AM', 'doctor' => 'Dr. Solis'],
            ['nombre' => 'Ana', 'numero' => '021', 'fecha' => '2025-12-12', 'hora' => '2:00 PM', 'doctor' => 'Dra. Rivera'],
    ];

            return view('vercitas', [
            'citas' => $citas,
            'dia' => 'hoy'
        ]);
}

}