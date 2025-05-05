<?php
// Configurações básicas
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

// Função para listar a estrutura de diretórios
function listarEstrutura($diretorio, $nivel = 0) {
    $itens = scandir($diretorio);
    $html = '';
    $ignorar = ['.', '..', '.git', 'vendor', 'node_modules'];
    
    foreach($itens as $item) {
        if(!in_array($item, $ignorar)) {
            $caminho = $diretorio . '/' . $item;
            $margin = str_repeat('&nbsp;&nbsp;&nbsp;', $nivel);
            
            if(is_dir($caminho)) {
                $html .= $margin . "📁 <strong>$item</strong><br>";
                $html .= listarEstrutura($caminho, $nivel + 1);
            } else {
                $tamanho = filesize($caminho);
                $html .= $margin . "📄 $item ($tamanho bytes)<br>";
            }
        }
    }
    
    return $html;
}

// Testar conexão com MySQL
function testarMySQL() {
    try {
        $pdo = new PDO(
            "mysql:host=db;dbname=app_db",
            'dev',
            'dev123',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return "✅ Conexão com MySQL estabelecida com sucesso!";
    } catch(PDOException $e) {
        return "❌ Falha na conexão com MySQL: " . $e->getMessage();
    }
}

// Verificar extensões PHP instaladas
function verificarExtensoes() {
    $extensoes = [
        'pdo_mysql',
        'mbstring',
        'gd',
        'xml'
    ];
    
    $resultado = [];
    foreach($extensoes as $ext) {
        $resultado[$ext] = extension_loaded($ext);
    }
    
    return $resultado;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambiente de Estudo PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #2c3e50;
        }
        .success {
            color: #27ae60;
        }
        .error {
            color: #e74c3c;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
        }
        .file-structure {
            font-family: monospace;
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
        .extension-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }
        .extension-item {
            padding: 8px;
            border-radius: 4px;
        }
        .installed {
            background-color: #d5f5e3;
        }
        .missing {
            background-color: #fadbd8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ambiente de Estudo PHP</h1>
        <p class="success">✅ Ambiente configurado e funcionando corretamente!</p>
        
        <div class="info-box">
            <h2>Informações do Servidor</h2>
            <p><strong>Servidor:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?></p>
            <p><strong>PHP Version:</strong> <?= phpversion() ?></p>
            <p><strong>Document Root:</strong> <?= $_SERVER['DOCUMENT_ROOT'] ?></p>
        </div>
        
        <h2>Teste de Conexão com MySQL</h2>
        <p><?= testarMySQL() ?></p>
        
        <h2>Extensões PHP</h2>
        <div class="extension-list">
            <?php foreach(verificarExtensoes() as $ext => $instalada): ?>
                <div class="extension-item <?= $instalada ? 'installed' : 'missing' ?>">
                    <?= $ext ?>: <?= $instalada ? '✅ Instalada' : '❌ Faltando' ?>
                </div>
            <?php endforeach; ?>
        </div>
        
        <h2>Estrutura do Projeto</h2>
        <div class="file-structure">
            <?= listarEstrutura(__DIR__) ?>
        </div>
        
        <h2>Informações do PHP</h2>
        <pre><?php 
            $info = [
                'PHP Version' => phpversion(),
                'Server API' => php_sapi_name(),
                'Memory Limit' => ini_get('memory_limit'),
                'Upload Max Filesize' => ini_get('upload_max_filesize'),
                'Post Max Size' => ini_get('post_max_size'),
                'Timezone' => date_default_timezone_get()
            ];
            print_r($info);
        ?></pre>
    </div>
</body>
</html>