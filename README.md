# LaraManager - Gerenciador de clientes

Um gerenciador de clientes simples. Feito do zero com Laravel e Template com Twitter Bootstrap. 

# TODO 

* Falta colocar um tratamento de arquivos mais adequado.

## Requirements

* Apache >= 2 
* Mod_rewrite
* PHP >= 7.3.
* MySQL
* Yarn 
* Composer
* Twitter Bootstrap
* Jquery

### Installation

1. Baixar o projeto
    1. Copiar a pasta www para a pasta pública do apache. Em alguns casos renomear para public_html
    2. Copiar os arquivos restantes e a pasta "private" no diretório acima (pai) de www (ou public_html)
2. Entrar na pasta private
    1. copiar o arquivo .env.example para .env
        1. Editar o arquivo com as devidas configurações do servidor (banco de dados e domínio)
    2. Executar o $ composer install
    3. Executar $ php artisan key:generate
    4. Executar $ composer dump-autoload
    5. Executar $ php artisan clear-compiled
    6. Executar $ php artisan migrate
    7. Executar $ php artisan db:seed

🍺 Feito!

## Licence

This project is licensed under MIT License - see [LICENSE.md](LICENSE.md) for details.
