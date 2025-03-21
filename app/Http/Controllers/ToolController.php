<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use App\Mail\TestConnectionMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail; // ✅ Importa la facade Mail

class ToolController extends Controller
{
    public function testConnections()
    {
        $databases = [
            'PRIMARIO' => 'mysql',
            'SECONDARIO' => 'second_mysql'
        ];

        $results = [];
        $browser = request()->header('User-Agent');
        $ipAddress = request()->ip();

        foreach ($databases as $label => $connection) {
            try {
                $pdo = DB::connection($connection)->getPdo();
                $server = DB::connection($connection)->select("SELECT @@hostname AS server_name")[0]->server_name;

                $results[] = [
                    'status' => "✅ Connessione riuscita",
                    'message' => "Connessione al database '$label' stabilita con successo.<br>Server: <strong>$server</strong>"
                ];

                // Registrazione accesso
                $agent = new Agent();
                $browser = $agent->browser();

                DB::table('log_accessi')->insert([
                    'timestamp' => now(),
                    'ip_address' => request()->ip(),
                    'browser' => $browser,
                ]);
            } catch (\Exception $e) {
                $results[] = [
                    'status' => "❌ Errore di connessione",
                    'message' => "Database '$label' - Errore #" . $e->getCode() . ": " . $e->getMessage()
                ];
            }
        }

        // Invio email
        try {
            Mail::to(env('MAIL_ADMIN'))->send(new TestConnectionMail($results, $ipAddress, $browser));
            session()->flash('success', 'Email inviata con successo! 📩');
        } catch (\Exception $e) {
            session()->flash('error', 'Errore nell\'invio della mail: ' . $e->getMessage());
        }

        return view('testconn', compact('results'));
    }

    public function resetLog()
    {
        $databases = ['mysql', 'second_mysql'];

        foreach ($databases as $connection) {
            DB::connection($connection)->statement('DROP TABLE IF EXISTS log_accessi');
            DB::connection($connection)->statement('
            CREATE TABLE log_accessi (
                id INT AUTO_INCREMENT PRIMARY KEY,
                timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ');
        }

        return redirect()->back()->with('success', "🛠️ Tabella 'log_accessi' resettata su entrambi i database!");
    }
}
