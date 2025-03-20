<?php

namespace App\Http\Controllers;

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

        foreach ($databases as $label => $connection) {
            try {
                // Test connessione
                $pdo = DB::connection($connection)->getPdo();
                $server = DB::connection($connection)->select("SELECT @@hostname AS server_name")[0]->server_name;

                $results[] = [
                    'status' => "✅ Connessione riuscita",
                    'message' => "Connessione al database '$label' stabilita con successo.<br>Server: <strong>$server</strong>"
                ];
                // Inserisce un nuovo record di accesso
                DB::table('log_accessi')->insert([
                    'timestamp' => now(),
                ]);
                // Creazione tabella se non esiste
                DB::connection($connection)->statement('
                    CREATE TABLE IF NOT EXISTS attivita_fittizia (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        nome VARCHAR(50),
                        valore INT,
                        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )
                ');

                // Inserimento nuovi record
                for ($i = 0; $i < 10; $i++) {
                    DB::connection($connection)->table('attivita_fittizia')->insert([
                        'nome' => 'Elemento_' . rand(1, 1000),
                        'valore' => rand(1, 100),
                    ]);
                }

                // Aggiornamento casuale di record
                $ids = DB::connection($connection)->table('attivita_fittizia')->inRandomOrder()->limit(5)->pluck('id');
                foreach ($ids as $id) {
                    DB::connection($connection)->table('attivita_fittizia')->where('id', $id)->update([
                        'valore' => rand(1, 500)
                    ]);
                }

                // Eliminazione casuale di alcuni record
                $idsToDelete = DB::connection($connection)->table('attivita_fittizia')->inRandomOrder()->limit(3)->pluck('id');
                if ($idsToDelete->isNotEmpty()) {
                    DB::connection($connection)->table('attivita_fittizia')->whereIn('id', $idsToDelete)->delete();
                }
            } catch (\Exception $e) {
                $results[] = [
                    'status' => "❌ Errore di connessione",
                    'message' => "Database '$label' - Errore #" . $e->getCode() . ": " . $e->getMessage()
                ];
            }
        }

        // **Invio Email**
        try {
            Mail::to(env('MAIL_ADMIN'))->send(new TestConnectionMail($results));
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
