<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|-------------------------------------------------------------------------
| Verifique se o aplicativo está em manutenção
|--------------------------------------------------------------------------
|
| Se o aplicativo estiver em modo de manutenção/demonstração por meio do comando "down"
| carregaremos este arquivo para que qualquer conteúdo pré-renderizado possa ser exibido
| em vez de iniciar o framework, o que pode causar uma exceção.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|-------------------------------------------------------------------------
| Registre o carregador automático
|--------------------------------------------------------------------------
|
| O Composer fornece um carregador de classe conveniente e gerado automaticamente para
| este aplicativo. Só precisamos utilizá-lo! Vamos simplesmente exigir isso
| no script aqui para que não precisemos carregar manualmente nossas classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|-------------------------------------------------------------------------
| Execute o aplicativo
|--------------------------------------------------------------------------
|
| Depois que tivermos o aplicativo, podemos lidar com a solicitação de entrada usando
| o kernel HTTP do aplicativo. Então, enviaremos a resposta de volta
| para o navegador deste cliente, permitindo que eles aproveitem nosso aplicativo.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
