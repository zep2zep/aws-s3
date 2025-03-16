import os
import subprocess
import shutil

def run_command(command):
    try:
        subprocess.run(command, shell=True, check=True)
        print(f"✅ Comando eseguito: {command}")
    except subprocess.CalledProcessError as e:
        print(f"❌ Errore eseguendo {command}: {e}")

def clear_laravel_cache():
    commands = [
        "php artisan cache:clear",
        "php artisan config:clear",
        "php artisan route:clear",
        "php artisan view:clear",
        "php artisan config:cache",
        "php artisan route:cache",
        "php artisan view:cache"
    ]
    for cmd in commands:
        run_command(cmd)

def fix_storage_permissions():
    storage_path = "storage\\framework\\views"
    if not os.path.exists(storage_path):
        os.makedirs(storage_path, exist_ok=True)
        print("✅ Cartella storage\\framework\\views ricreata.")

def update_composer():
    run_command("composer install")
    run_command("composer update")
    run_command("composer dump-autoload")

def update_app_key():
    print("🔑 Generazione di una nuova chiave di applicazione...")
    run_command("php artisan key:generate")
    run_command("php artisan config:clear")
    run_command("php artisan cache:clear")
    run_command("php artisan config:cache")

def main():
    print("🔄 Avvio della procedura di ripristino di Laravel...")
    update_app_key()
    clear_laravel_cache()
    fix_storage_permissions()

    print("✅ Ripristino completato! Prova a eseguire 'php artisan serve'")

if __name__ == "__main__":
    main()
